
---
title: Basic Syntax
weight: 10003
---
## Scripts et Fichiers PHP

Le PHP est un langage **interprété** comme le javascript. Lors de l'execution le code source est lu puis executé par l'interpréteur PHP. Aucun executable n'est produit donc seul le code source est distribué.

La manière la plus simple d'executer du code PHP est de créer un fichier avec l'extension `.php` et de lancer la commande suivante :
```bash
php monScript.php
```

la balise PHP s'utilise ainsi

```phtml
<?php

// ICI tout votre code PHP.
?>
```

La balise fermante `?>` n'est pas obligatoire — voir à éviter — dans le cas où vous n'avez que du code PHP dans un fichier.   


Tout ce qui est en dehors de la balise est interprété comme du texte par l'interpréteur PHP et est affiché tel quel.

Par exemple :

```phtml
Bonjour <?php echo "le monde"; ?> magique
```

affichera :

```php
Bonjour le monde magique
```

Chaque ligne d'instruction doit se terminer par un `;`.

### Commentaires

Il existe 3 types de Commentaires

```php
<?php
# Je suis un commentaire mais plus personne ne m'utilise

// Je suis également un commentaire

/*
Je suis un commentaire
sur plusieurs lignes
pour apporter plus d'informations
*/
```

## Types, Variables et Operations

### Typage
Le PHP est un langage faiblement typé. Un langage faiblement typé  est un langage qui autorise les changements de type. Il existe neánmoins des types définis par le langage.

#### Types simples (primitifs)

Les différents types du langage sont les suivants :

| Type               | Description                                      | Valeurs possibles                                                                                                      |
|--------------------|--------------------------------------------------|------------------------------------------------------------------------------------------------------------------------|
| bool               | Un Bouléen                                       | `true`, `false`                                                                                                        |
| int                | Un entier                                        | `-1203123`, `0`, `22`, `39451829`,...                                                                                     |
| float ( ou double) | Un nombre à virgule                              | `-7.4423124`, `-102.0`, `0.0`, `58.6`,...                                                                                 |
| string             | Une chaine de caractères                         | `"bonjour"`, `"2.3"`, `'A'`, `'Banana for scale'`                                                                         |
| NULL               | Une valeur vide                                  | `null`                                                                                                                 |


Les types complexes sont des types non-scalaires.

#### Tableaux

le type Array est utilisé pour manipuler des tableaux : ce type permet de stocker des valeurs ou des associations de valeurs. PHP étant un langage faiblement typé, on peut utiliser plusieurs types différents dans le même tableau.

Voici plusieurs exemples de déclarations de tableaux :
```php
// Tableaux indexés
array('I','love','PHP',8);
// Tableaux Associatifs
array(
    'username' => "Decima",
    'identity' => array(
      "firstname" => "Henri",
      "age" => 29
    ),
);
// Tableau Indexés en syntaxe courte
[ 
    "Henri", 
    123, 
    -88.81, 
    null 
];
// Tableaux associatifs syntaxe courte
[
    "firstname" => "Henri", 
    "friends" => ["Benjamin", "Nadia",],
    "drivingLicence" => false, 
    "kids" => []    
];
// des tableaux vides
[];
array();
```

La syntaxe `[clé => valeur]` est dite associative, tandis que la syntaxe `["A","B","C"]` est dite indexées. 
Chaque clé est unique.

L'indexation va attribuer de manière implicite une séquence de clés du tableau de `0` à `nombre d'éléments du tableau - 1`.
Par exemple on peut écrire de deux manières : 
```php
[ "I" , "Love" , "PHP" , 8.0 ]
[
    0 => "I",
    1 => "Love",
    2 => "PHP",
    3 => 8.0
]
```


### Variables

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

#### Assignation
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

{{< block "important" >}}
Bien que cela soit possible, c'est FORTEMENT DÉCONSEILLÉ car cela fait perdre au code de sa visibilité. 
{{< /block>}}

##### Déassignation
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


### Operations
Voici la liste des opérations et un exemple de leur usages en fonction du type de variables.

#### Arithmétiques

| Exemple    | Nom            | Résultat                                         |
|------------|----------------|--------------------------------------------------|
| `-$a`      | Négation       | Opposé de $a.                                    |
| `$a + $b`  | Addition       | Somme de $a et $b.                               |
| `$a - $b`  | Soustraction   | Différence de $a et $b.                          |
| `$a * $b`  | Multiplication | Produit de $a et $b.                             |
| `$a / $b`  | Division       | Quotient de $a et $b.                            |
| `$a % $b`  | Modulo         | Reste de $a divisé par $b.                       |
| `$a ** $b` | Exponentielle  | Résultat de l'élévation de $a à la puissance $b. |

Il n'est pas obligatoire d'utiliser des variables, on peut utiliser des valeurs directement ou combiner des valeurs et variables. L'odre des opérations s'effectue comme en Mathématiques et on peut ajouter également des parenthèses pour privilégier des calculs : 

```php
$a = 2;
$b = 3;
$c = 4;
$a + $b; //vaut 5
$a * $b; //vaut 6
$a + $b * $c; // vaut 2 + 3 * 4 = 14
($a + $b) * $c; // vaut (2 + 3) * 4 = 20
-($a + $b) * $c/2; // vaut -(2+3) * 4/2 = -10 
```
C'est l'équivalent d'une fonction en mathématiques, on peut voir ça comme la fonction `f(x) = 3x + 2` qui donnerait `3 * $x + 2` ou `g(x) = x² + 3x - 2` qui donnerait ` $x**2 + 3 * $x - 2 `

Il existe des également des opérateurs d'assignation rapide : 

| Exemple    | Equivalent     | Opération      |
|------------|----------------|----------------|
| `$a += $b` | `$a = $a + $b` | Addition       |
| `$a -= $b` | `$a = $a - $b` | Soustraction   |
| `$a *= $b` | `$a = $a * $b` | Multiplication |
| `$a /= $b` | `$a = $a / $b` | Division       |
| `$a %= $b` | `$a = $a % $b` | Modulo         |
| `$a++`     | `$a = $a + 1`  | Incrémentation |
| `$a--`     | `$a = $a - 1`  | Décrémentation |

par exemple : 

```php
$a = 1;
$a = $a + 2;
$a = $a - 3;
```
peut s'écrire : 
```php
$a = 1;
$a += 2;
$a -= 3;
```

## Fonctions

### Affichage

Il existe plusieurs fonctions d'affichage en PHP, la plus utilisée est la fonction `echo`.

##### Echo
