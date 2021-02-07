---
title: 3 - HTTP
weight: 3
type: presentations

---
# HTTP
Le protocol HTTP est un protocole de communication Client-Serveur inventé dans les années 90 pour le World-Wide-Web. La plupart des clients utilisant ce protocol sont les navigateurs web.

---

HTTP Version
- 1991:	0.9
- 1996:	1.0
- 1997:	1.1
- 2015:	2.0
- 2018:	3.0

----
## Pourquoi HTTP

---

- Simple : 
Les messages sont compréhensibles par les humains.

- Extensible : 
À partir de HTTP/1.0, les en-têtes HTTP permettent d'étendre facilement le protocole. De nouvelles fonctionnalités peuvent même être introduites par un simple accord entre le client et le serveur.

----
## Flux HTTP
Lorsqu'un client veut communiquer avec un serveur, il réalise les étapes suivantes :

---
Il ouvre une connexion TCP : la connexion TCP va être utilisée pour envoyer une ou plusieurs requêtes et pour recevoir une réponse. Le client peut ouvrir une nouvelle connexion, réutiliser une connexion existante ou ouvrir plusieurs connexions TCP vers le serveur.

---
Il envoie un message HTTP : les messages HTTP (avant HTTP/2) sont lisibles par les humains. Avec HTTP/2, ces simples messages sont en-capsulés dans des trames, rendant la lecture directe impossible, mais le principe reste le même.
```http
GET / HTTP/1.1
Host: developer.mozilla.org
Accept-Language: fr
```

---
Il lit la réponse envoyée par le serveur :

```http
HTTP/1.1 200 OK
Date: Sat, 09 Oct 2010 14:28:02 GMT
Server: Apache
Last-Modified: Tue, 01 Dec 2009 20:18:22 GMT
ETag: "51142bc1-7449-479b075b2891b"
Accept-Ranges: bytes
Content-Length: 29769
Content-Type: text/html

<!DOCTYPE html>
<html>.....
```

---
Il ferme ou réutilise la connexion pour les requêtes suivantes.

----
## Message HTTP

---
### Requete

---

```http
POST / HTTP/1.1
Host: perdu.com
User-Agent: curl/7.58.0
Accept: */*
Content-Type: application/x-www-form-urlencoded

username=Henri&password=Henri
```

- Méthode : POST
- Path: / 
- Protocol : HTTP/1.1
- Headers: Host, User-Agent,Accept, Content-Type
- Body: Le reste

---

#### Methodes

- GET: Récupérer une ressource
- HEAD: Récupérer les métadata de la ressource
- POST: Ajouter une ressource
- PUT: Écraser la ressource
- PATCH: Mettre à jour partiellement la ressource
- DELETE: Supprimer la ressource

---

#### Mime-types

- text/plain: 							Texte
- text/html: 							Contenu HTML
- image/jpeg: 							image JPEG
- multipart/form-data: 					Form post avec fichier
- application/x-www-form-urlencoded:	Form post
- application/xml:						XML
- application/json:						JSON
- application/octet-stream: 				Flux

---


![](https://mdn.mozillademos.org/files/13687/HTTP_Request.png)

---
### Reponse

---

```http
HTTP/1.1 200 OK
Date: Sun, 26 Jan 2020 16:29:16 GMT
Last-Modified: Thu, 02 Jun 2016 06:01:08 GMT
Content-Length: 204
Content-Type: text/html

<html><head><title>Vous Etes Perdu ?...
```

- Version: HTTP/1.1
- Code: 200 - OK
- Headers: Content-Type, Content-Length…

Body: le reste

---

#### Code HTTP

- 2XX Succès
  - 200 - OK
  - 201 - CREATED
  - 204 - NO CONTENT (tout s'est bien passé mais le serveur n'a pas de contenu à nous renvoyer)

---

- 3XX Redirection
	- 301 - MOVED PERMANENTLY (la ressource a été déplacée de manière permanente)

---

- 4XX Erreur Client
	- 400 - BAD REQUEST
	- 401 - UNAUTHORIZED
	- 403 - FORBIDDEN
	- 404 - NOT FOUND
	- 405 - METHOD NOT ALLOWED
	- 409 - CONFLICT
	- 418 - I'M A TEAPOT (la ressource demandée est une téillère et non une caftière)

---

- 5XX Erreur Serveur
	- 500 - INTERNAL SERVER ERROR (générique)
	- 501 - NOT IMPLEMENTED

[iana.org - HTTP Status Codes](https://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml)

---
![](https://mdn.mozillademos.org/files/13691/HTTP_Response.png)

