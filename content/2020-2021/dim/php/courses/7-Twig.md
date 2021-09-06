---
title: 7 - Twig

weight: 7

---

## Templating

Un Template est un fichier texte qui permet de générer n'importe quel format de fichier texte (HTML, XML, CSV, LaTeX...). Le PHP est le format le plus populaire pour faire du templating - en utilisant la syntaxe alternative :

```phtml
<!doctype html>
<html>
    <head>
        <title><?= $title ?></title>
    </head>
    <body>
        <h1>List Of Users</h1>
        <table>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->getId();?></td>
                    <td><?= $user->getName();?></td>
                </tr>
            <?php endforeach;?>
    </body>
</html>
```

## Twig

Twig est un moteur de templating moderne pour PHP développé par Symfony.
- Rapide avec son système de cache
- Sécurisé avec son contenu encodé
- Moderne avec sa syntaxe courante, concise et flexible

Voici le même code que vu précédemment avec twig :

```twig
<!doctype html>
<html>
    <head>
        <title>{{ title }}</title>
    </head>
    <body>
        <h1>List Of Users</h1>
        <table>
            {% for user in users %}
                <tr>
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                </tr>
            {% endfor %}
    </body>
</html>
```

La vraie différence se retrouve là : 

```twig
//PHP
<?php echo htmlspecialchars($variables, ENT_QUOTES,'UTF-8'); ?>

//Twig
{{ variable }}
```

### Syntaxe de base

```twig
{# ...Ici un commentaire   ... #}
{% ...faire quelquechose   ... %}
{{ ...afficher quelquechose... }}
```

### Filtres

Les filtres appliquent des transformations aux variables, voici des exemple de d'usage : 
```twig
{{ post.createdAt|date('d/m/y') }}
{{ post.title|lower }}
{{ post.title|upper }}
{{ post.title|capitalize }}
{{ post.title|title }}
{{ post.tags|sort|join(', ') }}
{{ post.author|default('anon.') }}
```

### Functions

Les fonctions Twig peuvent générer ou extraire des valeurs ou des listes de valeurs : 
```twig
{{ min(1, 3, 2) }}
{{ random(['apple', 'orange', 'citrus']) }}
```

### Controle Structures

Les structures de contrôle se limitent à 4 mots clés : 
```twig
if, else, elseif, for
```

exemple d'usage:

```twig
{% if product.stock > 10 %}
available
{% elseif product.stock > 0 %}
only {{ product.stock }} left!
{% else %}
Sold-out!
{% endif %}
```

Boucles  avec la syntaxe `for else`:

```twig
{% for post in posts if post.active %}
    <h2>{{ post.title }}</h2>
    {{ post.body }}
{% else %}
    No published posts yet.
{% endfor %}
```

### Operateur de comparaison

```twig
== != < > <= >=
starts with
ends with
matches
not
```

https://twig.symfony.com/doc/3.x/templates.html#expressions

## Inclusion

L'inclusion permet d'intégrer une page dans une autre de la manière suivante : 
```twig
{{ include("menu.html.twig") }}

```

## Heritage

L'une des fonctionnalités les plus performante de Twig est l'héritage de templates; Cela permet de réaliser une base "skeleton" qui contiendra tous les éléments de votre site et définir des blocks que les templates enfants pour venir modifier : 

Voici un exemple squelette `base.html.twig` de notre site : 
```twig
<!DOCTYPE html>
<html>
    <head>
        {% block head %}
            <link rel="stylesheet" href="style.css" />
            <title>{% block title %}{% endblock %} - My Webpage</title>
        {% endblock %}
    </head>
    <body>
        <div id="content">{% block content %}{% endblock %}</div>
        <div id="footer">
            {% block footer %}
                &copy; Copyright 2011 by <a href="http://domain.invalid/">you</a>.
            {% endblock %}
        </div>
    </body>
</html>
```

De cette manière on peut étendre le fichier de base de la manière suivante :
```twig
{% extends "base.html" %}

{% block title %}Index{% endblock %}
{% block head %}
    {{ parent() }} {# parent va reprendre le contenu du bloc du parent pour l'ajouter à l'endroit voulu dans le bloc enfant #}
    <style type="text/css">
        .important { color: #336699; }
    </style>
{% endblock %}
{% block content %}
    <h1>Index</h1>
    <p class="important">
        Welcome to my awesome homepage.
    </p>
{% endblock %}
``` 

## Ressources

- [Documentation Twig](https://twig.symfony.com/doc/3.x/)
- [Installation de Twig](https://twig.symfony.com/doc/3.x/intro.html#installation)
- [Twig usage](https://twig.symfony.com/doc/3.x/templates.html)