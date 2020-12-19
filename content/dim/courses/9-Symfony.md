---
title: 9 - Symfony
weight: 9
---
Symfony est un Framework **~~MVC~~** Requête/ Réponse Créé en 2005 par Fabien Potencier pour l'entreprise SensioLabs. 

Symfony -> SF -> Sensio Framework

Symfony, c'est avant tout une série de composants utilisables indépendamment et le Framework est la glue qui les lie.

----

Un Framework MVC standard se compose de ces différentes parties :

![](https://i.imgur.com/fip7lfe.png)

----

> Le protocole HTTP est un protocole de communication entre un client et un serveur. C'est un protocole de Requête/Rêponse.

> Un Routeur intercepte la Requête HTTP, l'envoie vers le Controleur qui correspond. Celui-ci ira communiquer avec le Modèle de données et génèrera la Vue qu'il renverra en Réponse HTTP.

----

Dans le cas de Symfony, il n'existe pas de couche Modèle créée par le framework, celui-ci n'est donc pas MVC.

![](https://i.imgur.com/n4id5dD.png)