import "dart:io";

import 'package:args/args.dart';

List<WebSocket> allWebsocket = [];

Future<void> main(List<String> args) async {
  var parser = ArgParser();
  parser.addOption(
    "port",
    abbr: "p",
    mandatory: true,
    help: "need address",
  );
  final result = parser.parse(args);
  var server = await HttpServer.bind(
    InternetAddress.anyIPv4,
    int.parse(result["port"]),
  );
  server.listen((HttpRequest req) async {
    var socket = await WebSocketTransformer.upgrade(req);
    allWebsocket.add(socket);
    broadcast("New connection : ${allWebsocket.length} connected");
    socket.listen(handler(socket),
        onError: (error) => print("error " + error),
        onDone: () {
          allWebsocket.remove(socket);
          broadcast("Someone quit : ${allWebsocket.length} connected");
        });
  });
}

broadcast(String message) {
  print(message);
  Future.forEach(
    allWebsocket,
    (WebSocket socket) {
      socket.add(message);
    },
  );
}

handler(WebSocket socket) {
  return (event) {
    print(event);
    broadcast(event);
  };
}
