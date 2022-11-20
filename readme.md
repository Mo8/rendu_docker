TP1 avec : 
- swag configurer pour tout sauf pour ma stack qui consiste en une websocket ( pas réussis à utiliser swag pour le protocol ws) , utilisation de duck dns
- heimdall avec des urls déjà configurer
- projet perso serveur websocket de message en dart testé via le site https://websocketking.com/ avec l'url ws://localhost:8080 ( se lance grâce à un dockerfile que je compte faire évoluer plus tard quand je voudrais avoir une persistence des messages surement avec un mongodb)
- nextcloud configurer avec mariadb comme db. login/pass = admin/admin
- phpmyadmin -> login/pass = root/root pour mysql et mariadb
- gitea (rien à dire)
- plik (rien a dire)
- wordpress (rien à dire)
- openldap + openldap-ui -> login/pass = JulianCautela/Motdepasse
- screen montrant que ce qui est décris au dessus marche bien dans TP1_rendu
- Vous aviez dis en classe que collabora, mattermost et tuleap pouvait être compliqué à mettre en place donc j'ai préféré ne pas plus m'y attardé pour avoir quelque choses de clean pour le TP1. Parcontre à l'heure où j'écris cela je suis en train d'avancer sur mon projet perso des websocket pour essayer d'avoir une persistance des messages et donc intégrer ça dans la TP2 avec un mongodb qui serais aussi dockeriser.

TP2 : 
    J'ai pas eu beaucoup de temps pour avancer, et j'ai eu un problème avec git ( des fichiers que ne pouvait pas indexer git à cause de caractères je crois).
    J'ai rajouté ma stack plus avancé que le TP1 ( on à une persistence des messages en base et je gère mes messages via des json ) , j'ai donc rajouté un docker mongo et un docker mongo express pour voir les données et connecter à mon serveur
    J'ai remis un ldap+gui 
    J'ai ajouter bind9 et zabbix
    Je n'ai pas pu aller plus loin fautes de temps 
    Les screens pour le TP2 sont dans le dossier TP2_rendu
