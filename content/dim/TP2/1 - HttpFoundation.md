---
title: 1 - Http Foundation

weight: 21
---


## Initialisation du projet

----

Maintenant que vous avez installé Composer, on va créer une structure de dossiers adaptée au projet.

```
.
├── public
│   └── index.php
└── src
│   └── Controller

```

On va laisser le fichier index.php vide pour le moment. 

La première étape va être d'appeler la commande  `composer init` qui va initialiser le projet Composer. Une série de questions seront posées. On peut ignorer chaque question pour le moment et passer à la suite.

Le fichier `composer.json` a été créé. 
La structure de ce fichier est la suivante :

```json
{
    "name": "henri/tp2",
    "authors": [
        {
            "name": "Henri",
            "email": "henri@larget.fr"
        }
    ],
    "require": {}
}
```

Ce fichier contient toutes les informations du projet : les dépendances `require`, l'`autoload`

On va donc commencer par ajouter la totalité des bibliothèques que nous avons besoin pour notre projet, à savoir [`symfony/http-foundation`](https://packagist.org/packages/symfony/http-foundation). Pour cela, il faut juste faire `composer require ` suivi du nom du package souhaité. 

On va également ajouter une dépendance au package [`symfony/var-dumper`](https://packagist.org/packages/symfony/var-dumper) qui est une dépendance à utiliser en environnement de dev en modifiant la commande précédente et en ajoutant l'argument `require --dev `. 

2 valeurs ont été ajoutées au fichier composer.json :

```json
...
"require": {
    "symfony/http-foundation": "^5.0"
},
"require-dev": {
    "symfony/var-dumper": "^5.0"
}
...
```

> Dans le cas où on prendrait le fichier déjà existant, il faut faire un `composer install`. 

Le composant var-dumper offre deux fonctions pratiques pour le développement : 
```php

dump($foo); //affiche le contenu d'une variable

dd($foo); //affiche le contenu d'une variable et arrête l'execution du code
```

La structure du dossier a changé :

```
.
├── bin
│   └── composer
├── composer.json
├── composer.lock
├── public
│   └── index.php
├── src
│   └── Controller
└── vendor
    ├── autoload.php
    ├── bin
    ├── composer ...
    └── symfony ...
```

Le fichier Composer.lock ainsi que le dossier vendor se sont ajoutés. Le Composer.lock est un fichier qui permet de s'assurer que les versions installées sont toujours conservées dans l'état. Le dossier vendor, quant à lui, contient un dossier bin, un fichier autoload.php ainsi que des sous dossiers organisés par sous-dossiers. 

Le fichier autoload est le seul fichier qu'il faudra par la suite inclure en utilisant la constante `__DIR__ . "/path/to/vendor/autoload.php"`  dans notre point d'entrée, et s'occupera des différents autoloads. Notre point d'entrée de site se trouve dans le dossier public, donc il faudra faire un chemin avec `__DIR__ . "/../vendor/autoload.php"`.

----

Pour continuer dans la configuration de Composer, nous allons mettre en place l'autoload intégré.

Pour cela, on ajoute dans le fichier Composer.json à la suite des `require` une clé `autoload` qui contient :
```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
```

Cela signifie qu'à partir de maintenant, le dossier `src/` est le namespace `App\`. pour que les changements soient pris en compte, il faut faire un `composer dump-autoload` qui va regénérer l'autoload. 


Maintenant que tout est bon, on va ajouter au fichier index.php du dossier public une première ligne de `require` vers le fichier autoload.php comme indiqué plus haut. 

De cette manière, toutes les classes écrites ensuite seront automatiquement chargées et les dépendances seront accessibles. 


## Mon premier Controller
Dans le namespace `App\Controller` créer une classe HomeController. 
Cette classe aura une méthode index, et prendra en paramètre un objet de type :`Symfony\Component\HttpFoundation\Request` nommé `$request` et renverra un objet `Symfony\Component\HttpFoundation\Response` qui aura pour premier argument lors de l'instanciation une chaine de caractère `"it works"`.





## La classe App\Kernel

Créez une classe PHP dans le namespace `App` qui va s'appeler `Kernel`, qui aura un attribut privé `$request` et aura un constructeur, une méthode publique qui s'appellera `run`, deux méthodes privées  `function route(Request $request): Response` et ` function parametersResolver($className, $method): array`.

Dans le constructeur, en utilisant les `use` comme vu dans les exemples précédents, on ajoutera :

```php
$this->request = Request::createFromGlobals();
```

Dans la méthode parametersResolver, il faut ajouter le code suivant :
```php
//this code gives you the ability to see if a method should have a parameter
//if so, set it as object or value. 
$reflexion = new \ReflectionMethod($className, $method);

$params = $reflexion->getParameters();
$autoInject = [
    Request::class => $this->request
];
$paramValues = [];
foreach ($params as $param) {
    if ($param->hasType() && isset($autoInject[$param->getType()->getName()])) {
        $paramValues[$param->getPosition()] = $autoInject[$param->getType()->getName()];
    } else {
        $paramValues[$param->getPosition()] = $this->request->get($param->getName(), null);
    }
}

return $paramValues;
```
La méthode Route :

```php
private function route(Request $request): Response
{
  $defaultController = HomeController::class;

//we get the route here and clean it
    $path = $request->getPathInfo();
    $path = trim($path, "/");

    $className = $defaultController;
    $method = "index";
    if (strlen($path) > 0) {
        // if subroute is not specified, it is merged to /index
        list($controller, $method) = array_merge(explode("/", $path), ["index"]);
        
        $className = "App\\Controller\\" . ucfirst($controller) . "Controller";
        if ($className === $defaultController && $method === "index") {
           /** @todo we called index of $defaultController, make a redirection to / here WITHOUT using the header function. */ 
        }
    }

    if (!class_exists($className)
        || !method_exists($className, $method)) {
        /** @todo return a not found response here (status code 404) */
    }

    $resolvedArguments = $this->parametersResolver($className, $method);
    return call_user_func_array([new $className(), $method], $resolvedArguments);
    }
```

Le comportement attendu de la route est le suivant :

| Route  | Méthode de controller appelée  |
|---|---|
|/|HomeController  index|
|/about|AboutController index|
|/about/contact|AboutController contact|
|/home/index|=> /|

Et la méthode run :
```php
$response = $this->route($this->request);
$response->send();

```

Enfin, ajouter les bons uses.


Dans le fichier public/index.php ajoutez les lignes suivantes à la suite du require :
```php
...

use App\Kernel;
$kernel = new Kernel();
$kernel->run();
```

La méthode Run de notre Kernel va s'occuper de faire la suite des opérations.





Une fois tous les todos fixés, on va lancer le serveur intégré à PHP pour le développement.

À la raçine du projet, il faut tapper la commande suivante :

```bash
php -S 0.0.0.0:8000 -t public
```

Et aller sur http://localhost:8000/
Si tout se passe bien, "le site affiche it works".


## Abstraction du controller



Pour la suite du TP, on va créer une classe abstraite `App\Controller\AbstractController`.

Le code de la classe abstraite est la suivante : 
```php
namespace App\Controller;
use \Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{
    public function render($templateName, $data = [])
    {
        ob_start();
        foreach ($data as $k => $v) $$k = $v; // worst line ever
        include(__DIR__ . "/../../templates/layout.php");
        $content = ob_get_contents();
        ob_end_clean();
        return new Response($content);
    }
}
```

Cette classe abstraite sera la base de nos controlleurs.

On va également créer un dossier templates à la racine de notre projet et lui donner cet aspect : 

```
.
├── bin
├── composer.json
├── public
├── templates
│   ├── home
│   │   └── index.php   
│   └── layout.php
├── src
│   └── Controller
│       └── AbstractController.php
└── vendor
    ├── autoload.php
    ├── bin
    ├── composer ...
    └── symfony ...
```

Dans le fichier layout.php, on va mettre le code suivant :
```php
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Mon super Site</title>
</head>
<body>
<main role="main">
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="#">My website</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </header>
        <?php include $templateName.".php"; ?>
    </div>
</main>
<footer class="container">
    <p>&copy; Nom Prenom 2019</p>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

</body>
</html>

```

Dans le fichier `templates/home/index.php` on va ajouter : 
```php
<h1>Hello <?php echo $name; ?></h1>
```

La classe App\Controller\HomeController doit étendre la classe App\Controller\AbstractController, et dans la méthode index, on met le code suivant : 
```php
    return $this->render(
        "home/index", 
        [
            "name"=>$request->query->get('name')
        ]
    );
```

De cette manière, en allant sur http://localhost:8000?name=Bob vous devriez voir "Hello Bob".


> Votre objectif maintenant est de rajouter un formulaire sur la page qui pointe vers la même page (`<form method="POST" action="action=#">`) avec un champ name vide, et de récupérer la variable passée en POST dans la requête pour l'afficher sur la page.


   **Travail à terminer et à rendre via github (invitez-moi dans votre projet github: decima)**

