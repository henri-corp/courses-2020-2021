
---
title: 4 - Variables
weight: 10004
---

Une variable est un symbole qui associe un nom à une valeur. Une variable PHP doit commencer par un `$` et son nom peut contenir des chiffres, des lettres (majuscules ou minuscules) et le caractères `_`. Le nom d'une variable ne peut pas commencer par un chiffre.

Voici un exemple de noms de variables :
```php
$name
$nameOfTheCurrentUser // syntaxe camelCase
$name_of_the_current_user //syntaxe snakeCase
$pass123
$GLOBALS
$user1
$_GET
$i
```

La convention PHP la plus appliquée (PSR2) suggère de privilégier la syntaxe dite `camelCase` :
```php
$firstname
$userId
$age
$companyName
```
mais d'autres en revenche suggèrent l'usage du `snake_case` (par exemple Wordpress).

Pour ma part, je suggère vivement le **camelCase**.

## Assignation
Pour assigner une valeur à une variable, il faut utiliser le symbole `=`.

Par exemple :
```php
$name = "Henri";
$age = 29;
$children = null;
$mark = 10.53;
$anotherAge = $age;
$isMyCourseInterresting=false;
$friends = ["Benjamin", "Nadia"];
```

De la même manière, il est possible de manipuler des tableaux :
```php
$friends = array("Nadia");
$addressBook = [
   "Nadia" => [ "phone" => "0147200001" ]
];
```
Ajouter un élément à un index particulier du tableau ou à une clé :
```php
$friends[1]="Benjamin"; 
$addressBook["Benjamin"] = [ "phone" => "0123456789" ];
```

Ou Ajouter automatiquement à la suite dans le tableau :
```php
$friends[]="John";
```

PHP, contrairement à beaucoup de langages est faiblement typé, ce qui permet d'effectuer les transformations suivantes :
```php
$variable = "Henri";
$variable = 29;
$variable = 8.0;
$variable = null;
```
Ce qui aura pour effet d'écraser la valeur précédente contenue dans la variable.

> Bien que cela soit possible, c'est FORTEMENT DÉCONSEILLÉ car cela fait perdre au code de sa visibilité.

## Déassignation
Pour désasigner la variable, il faut la passer dans une fonction unset :
```php
$username = "Henri";
unset($username);
```
ou encore avec un tableau :
```php
$friends = [];
$friends = ["Nadia","Benjamin","Dylan"];
unset($friends[2]);
// friends vaut alors ["Nadia", "Benjamin"]
```