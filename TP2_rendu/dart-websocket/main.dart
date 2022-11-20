import 'dart:convert';
import "dart:io";

import 'package:args/args.dart';
import 'package:mongo_dart/mongo_dart.dart';

Map<WebSocket, String> allWebsocket = {};

Future<void> main(List<String> args) async {
  var parser = ArgParser();
  parser.addOption(
    "port",
    abbr: "p",
    mandatory: true,
    help: "need port",
  );
  parser.addOption(
    "db",
    abbr: "d",
    mandatory: true,
    help: "need db address",
  );
  final result = parser.parse(args);
  print("Port : " + result["port"]);
  print("Db : " + result["db"]);

  var db = await Db.create(result["db"]);
  await db.open();
  final messageCollection = db.collection("messages");
  final userCollection = db.collection("users");
  if ((await userCollection.count()) == 0) {
    userCollection.insertOne({"name": "admin"});
  }

  var server = await HttpServer.bind(
    InternetAddress.anyIPv4,
    int.parse(result["port"]),
  );
  server.listen(
    (HttpRequest req) async {
      var socket = await WebSocketTransformer.upgrade(req);
      if (req.uri.queryParameters.containsKey("user")) {
        allWebsocket[socket] = req.uri.queryParameters["user"];
        if ((await userCollection.findOne(where.eq("name", req.uri.queryParameters["user"]))) == null) {
          userCollection.insertOne({"name": req.uri.queryParameters["user"]});
        }
        broadcast("${req.uri.queryParameters["user"]} connection : ${allWebsocket.length} connected");

        socket.listen(
          (message) async {
            final json = jsonDecode(message);
            userCollection.findOne({"name": req.uri.queryParameters["user"]}).then((user) {
              return messageCollection.insertOne({"userId": user["_id"], "content": json["message"]});
            });
              broadcast(jsonEncode({"name": req.uri.queryParameters["user"],"message" :json["message"]}));

          },
          onError: (error) => print("error " + error),
          onDone: () {
            allWebsocket.remove(socket);
            broadcast("${req.uri.queryParameters["user"]} quit : ${allWebsocket.length} connected");
          },
        );
      } else {
        socket.close(401, "user parameter");
      }
    },
  );
}

broadcast(String message) {
  print(message);
  Future.forEach(
    allWebsocket.keys,
    (WebSocket socket) {
      socket.add(message);
    },
  );
}
