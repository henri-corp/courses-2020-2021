---
title: 4 - HTTP Foundation
weight: 4
---
# Symfony/HTTP-Foundation

Symfony est une suite de composants qui a pour but de repondre aux besoins des developpeurs et ajouter une couche d'abstraction au langage PHP.

En PHP on peut accéder aux différentes données d'une requête en utilisant la variable `$GLOBALS` et ses filles `$_GET`, `$_POST`, `$_SERVER`, `$_SERVER`, `$_FILES`, `$_ENV`, `$_SESSION`, `$_COOKIE`

Le problème de l'usage de ces variables, c'est le fait que ça rend le code vite illisible et non-réutilisable. 

---
Symfony a créé une bibliothèque d'objets permettant de manipuler le protocole HTTP de manière propre. Cette bibliothèque appelée HttpFoundation est au coeur de **TOUS** les frameworks PHP modernes.

----

## Request

---

La classe [Request](https://api.symfony.com/5.0/Symfony/Component/HttpFoundation/Request.html) est le lien direct avec toutes les variables de `$GLOBALS`.

Un lien direct est fait avec des classes de type [ParameterBag](https://api.symfony.com/5.0/Symfony/Component/HttpFoundation/ParameterBag.html), et ainsi :

---


| PHP | $request |
| --- | --- |
| `$_GET` | `$request->query` |
| `$_POST` | `$request->request` |
| `$_FILES` | `$request->files` |
| `$_COOKIES` | `$request->cookies` |
| `$_SERVER` | `$request->server`& `$request->headers`  |

---

Voici quelques exemples d'usage : 

```php
if(isset($_GET["id"])){
  $id = $_GET["id"];
}else{
  $id = 42;
}
```
```php
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();
$id = $request->query->get("id",42);
```

---

```php
$name = "";
if(isset($_POST["name"])){
  $name = $_POST["name"];
}
```
```php
$name = $request->request->get("name","");
```

---

```php
if(isset($_POST["submit"])){

}
```
```php
if($request->request->has("submit")){

}
```

----

## Response

---

La classe [Response](https://api.symfony.com/5.0/Symfony/Component/HttpFoundation/Response.html) est une classe qui permet de réaliser une réponse HTTP tout en évitant de faire des appels aux fonctions `header` et autres du php.

---

En pratique :

```php
echo "hello world";
```
```php
use \Symfony\Component\HttpFoundation\Response;

$response = new Response("hello world!");
$response->send();
```

---
Renvoyer une page d'erreur :
```php
header("HTTP/1.0 404 Not Found");

echo "Page not found!";
```
```php
$response = new Response("Page not found!", Response::HTTP_NOT_FOUND);
$response->send();
```

---

Redirection :
```php
header("Location: /login");
```
```php
use \Symfony\Component\HttpFoundation\RedirectResponse;

$response = new RedirectResponse("/login");
$response->send();
```

---

Réponse JSON :
```php
header('Content-Type: application/json');

echo json_encode(['key' => 'value']);
```
```php
use \Symfony\Component\HttpFoundation\JsonResponse;

$response = new JsonResponse(["key"=>"value"]);
$response->send();
```

---

Forcer le téléchargement d'un fichier :

```php
header('Content-Description: File Transfer');
header('Content-Type: text/plain');
header('Content-Disposition: inline; filename=file.txt');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filePath));
readfile("file.txt");
```
```php
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

$response = new BinaryFileResponse("file.txt");
$response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT);

return $response;
```
