
---
title: 3 - Types
weight: 10003
---

Le PHP est un langage faiblement typé. Un langage faiblement typé est un langage qui autorise les changements de type. Il existe néanmoins des types définis par le langage.

## Types simples (primitifs)

Les différents types du langage sont les suivants :

| Type               | Description                                      | Valeurs possibles                                                                                                      |
|--------------------|--------------------------------------------------|------------------------------------------------------------------------------------------------------------------------|
| bool               | Un Bouléen                                       | `true`, `false`                                                                                                        |
| int                | Un entier                                        | `-1203123`, `0`, `22`, `39451829`,...                                                                                     |
| float ( ou double) | Un nombre à virgule                              | `-7.4423124`, `-102.0`, `0.0`, `58.6`,...                                                                                 |
| string             | Une chaine de caractères                         | `"bonjour"`, `"2.3"`, `'A'`, `'Banana for scale'`                                                                         |
| NULL               | Une valeur vide                                  | `null`                                                                                                                 |


Les types complexes sont des types non-scalaires.

## Tableaux

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

