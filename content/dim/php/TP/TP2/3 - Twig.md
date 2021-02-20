---
title: 3 - Twig
draft: false
weight: 23
---

En repartant du TP précédent, l'objectif est de remplacer dans le tp2 les fichiers HTML par des
fichiers twig, en utilisant obligatoirement les fonctionnalités suivantes :

- Syntaxe `for else`
- Héritage
- Inclusion
- Filtres

Le cache de notre application n'ira pas dans le dossier `src` mais dans un dossier à la racine du projet qui
s'appellera `var/cache` et la totalité du dossier var **ne doit pas être commit**.


## Installation des dépendances et renommage des fichiers twig

Installez la dépendance `twig/twig`, et remplacez tous les fichiers de templates PHP en `.html.twig`.

Modifiez la fonction render du `AbstractController` avec le code suivant :

```php
public function render($templateName, $data = []): Response
{
    $loader = new FilesystemLoader(__DIR__ . "/../../templates");
    $twig = new Environment($loader, [
        'cache' => __DIR__ . "/../../var/cache/",
        'debug' => true,
    ]);
    
    return new Response($twig->render($templateName, $data));
}
```
Enfin, modifiez tous les appels à cette méthode dans les différents controlleurs, en remplaçant `"home/index"` par `"home/index.html.twig"` 


> Le site a perdu son CSS, PARFAIT !

## Blocks

Allez dans le fichier `layout.html.twig` et remplacez la ligne suivante : 
```phtml
    <?php include $templateName . ".php"; ?>
```
par 
```twig
    {% block body %}{% endblock %}
```

Modifiez le fichier `home/index.html.twig` en remplaçant son contenu par
```
{% extends "layout.html.twig" %}
{% block body %}
    <h1>Scoring App.</h1>
{% endblock %}
```

Modifiez tous les fichiers comme fait précédemment. 


## Site fonctionnel

Rendez le site fonctionnel en remplaçant les boucles par des syntaxes `for else` et les variables par leur appel en twig.
