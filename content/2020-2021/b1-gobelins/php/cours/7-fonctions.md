---
title: 7 - Les fonctions
weight: 10007
---

Une fonction peut être définie en utilisant la syntaxe suivante :

```php
<?php
function foo($arg_1, $arg_2, /* ..., */ $arg_n)
{
    echo "Exemple de fonction.\n";
    return $retval;
}
```

Tout code PHP, correct syntaxiquement, peut apparaître dans une fonction.

Les fonctions n'ont pas besoin d'être définies avant d'être utilisées, SAUF lorsqu'une fonction est définie conditionnellement, comme montré dans les deux exemples suivants.

Lorsqu'une fonction est définie de manière conditionnelle, comme dans les exemples ci-dessous, leur définition doit précéder leur utilisation.

```php
foo();
echo "bar";
/*
   La fonction foo est déclarée après son appel.
*/
function foo(){
    echo "foo";
}
```


```php
$makefoo = true;
/* Impossible d'appeler foo() ici, car cette fonction n'existe pas. */
if ($makefoo) {
  function foo()
  {
    echo "Je n'existe pas tant que le programme n'est pas passé ici.\n";
  }
}
/* Maintenant, nous pouvons appeler foo() car $makefoo est évalué à vrai */
```
Si `return` est omis, la valeur `null` sera retournée.


## Typage

Depuis php 7, il est possible de typer les arguments d'une fonction et les valeurs de retour. Ce typage assure que les 
arguments de la fonction sont du bon type et que la fonction renvoie exactement les bons arguments.

```php
function IsTheUserAnAdult(int $age) : bool
{
  return $age >= 18;
}
```

Depuis PHP 8, il est également possible de passer plusieurs types : 
```php
function IsTheUserAnAdult(int|float $age) : bool
{
  return $age >= 18.0;
}
```

