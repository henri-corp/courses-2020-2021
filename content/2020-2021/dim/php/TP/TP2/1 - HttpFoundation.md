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
    "symfony/http-foundation": "^5.2"
},
"require-dev": {
    "symfony/var-dumper": "^5.2"
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

Créez une classe PHP dans le namespace `App` qui va s'appeler `Kernel`, qui aura un attribut privé `$request` de type Request et aura un constructeur, une méthode publique qui s'appellera `run`, deux méthodes privées  `function route(Request $request): Response` et ` function parametersResolver($className, $method): array`.

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
        list($controller, $method) = [...explode("/", $path), "index"];
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
```phtml
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Mon super Site</title>
</head>
<body class="flex flex-col min-h-screen">
<div>
    <nav class="bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex items-center justify-between h-16">
                <div class="w-full justify-between flex items-center">
                    <a class="flex-shrink-0 text-white" href="/">My App</a>
                    <div class="md:block">
                            <a class="text-gray-300  hover:text-white px-3 py-2 rounded-md text-sm font-medium" href="/">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<main class="flex-grow bg-gray-100 flex flex-col" role="main">
    <div class="flex-grow bg-white 	 w-full max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 z-20">
            <?php include $templateName . ".php"; ?>
        </div>
    </div>
</main>

<footer class="bg-gray-800 w-full py-8">
    <div class="max-w-screen-xl mx-auto px-4">
        <ul class="max-w-screen-md mx-auto text-lg font-light flex flex-wrap justify-between">
            <li class="my-2">
                <a class="text-gray-400 hover:text-gray-100 dark:text-gray-300 dark:hover:text-white transition-colors duration-200"
                   href="#">
                    &copy prénom NOM - 2021
                </a>
            </li>
        </ul>
    </div>
</footer>

</body>
</html>


```

Dans le fichier `templates/home/index.php` on va ajouter : 
```phtml
<h1>
    Hello <?php echo $name; ?>
</h1>
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

