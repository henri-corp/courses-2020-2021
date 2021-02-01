---
title: 6 - Structures de contrôles 
weight: 10006
---

Tous les scripts PHP sont une suite d'instructions. Une instruction peut être une assignation, un appel de fonction, une
instruction conditionnelle ou bien une instruction qui ne fait rien (une instruction vide). Une instruction se termine
habituellement par un point virgule (";"). De plus, plusieurs instructions peuvent être regroupées en bloc, délimité par
des accolades ("{}"). Un bloc est considéré comme une instruction.
## Conditions
### if, else, elseif if

L'instruction if est une des plus importantes instructions de tous les langages, PHP inclus. Elle s'écrit :

```
if (expression)
  commandes
```

Par exemple :

```php
if ($a > $b)
  echo "a est plus grand que b";

```

Si plusieurs expressions doivent être exécutées dans la condition, on peut les grouper avec des `{}`.

```php
if ($a > $b) {
  echo "a est plus grand que b";
  $b = $a;
}
```

Souvent, on a besoin d'ajouter une condition contraire à l'opération, on utilise le mot clé `else`:

```php
if ($a > $b) {
  echo "a est plus grand que b";
}else{
  echo "b est plus grand que a";
}
```

On peut également ajouter des conditions supplémentaires avec un `elseif`:

```php
if ($a > $b) {
  echo "a est plus grand que b";
} elseif ($a == $b) {
    echo "a est égal à b";
} else{
  echo "b est plus grand que a";
}
```

### Switch
L'instruction `switch` équivaut à une série d'instructions `if`. 
En de nombreuses occasions, vous aurez besoin de comparer la même variable (ou expression) avec un grand nombre de 
valeurs différentes, et d'exécuter différentes parties de code suivant la valeur à laquelle elle est égale. 

C'est exactement à cela que sert l'instruction switch.

Par exemple : 
```php
if ($i == 0) {
    echo "i égal 0";
} elseif ($i == 1) {
    echo "i égal 1";
} elseif ($i == 2) {
    echo "i égal 2";
}
```
Peut s'écrire : 
```php
switch ($i) {
    case 0:
        echo "i égal 0";
        break;
    case 1:
        echo "i égal 1";
        break;
    case 2:
        echo "i égal 2";
        break;
}
```

### Match

L'instruction `match` est similaire à l'instruction `switch`.
```php
$i = 0;
$selectedValue = match ($i) {
    1, 2 => "1 OU 2",
    3, 4 => "3 OU 4",
    5 => "5",
    default => "unknown value",
};
echo $selectedValue;
```


## Boucles

### While vs Do While

La boucle while est le moyen le plus simple d'implémenter une boucle en PHP. Cette boucle se comporte de la même manière
qu'en C. L'exemple le plus simple d'une boucle while est le suivant :

```
while (expression)
    commandes
```

La signification d'une boucle `while` est très simple. PHP exécute l'instruction tant que l'expression de la boucle
while est évaluée comme true. La valeur de l'expression est vérifiée à chaque début de boucle, et, si la valeur change
durant l'exécution de l'instruction, l'exécution ne s'arrêtera qu'à la fin de l'itération (chaque fois que PHP exécute
l'instruction, on appelle cela une itération). Si l'expression du while est false avant la première itération,
l'instruction ne sera jamais exécutée.

Comme avec le `if`, vous pouvez regrouper plusieurs instructions dans la même boucle while en les regroupant à
l'intérieur d'accolades `{}`.

```php
$i = 1;
while ($i <= 10) {
    echo $i++;  /* La valeur affichée est $i avant l'incrémentation
                   (post-incrémentation)  */
}
```

Les boucles `do-while` ressemblent beaucoup aux boucles `while`, mais l'expression est testée à la fin de chaque
itération plutôt qu'au début. La principale différence par rapport à la boucle `while` est que la première itération de
la boucle `do-while` est toujours exécutée :

```php
$i = 0;
do {
  echo $i;
} while($i>0);
```

#### For
Les boucles `for` sont les boucles les plus complexes en PHP. La syntaxe des boucles `for` est la suivante :
```
for (expr1; expr2; expr3)
    commandes
```
La première expression (`expr1`) est évaluée (exécutée), quoi qu'il arrive au début de la boucle.

Au début de chaque itération, l'expression `expr2` est évaluée. 
Si l'évaluation vaut `true`, la boucle continue et les commandes sont exécutées. Si l'évaluation vaut `false`, l'exécution de la boucle s'arrête.

À la fin de chaque itération, l'expression `expr3` est évaluée (exécutée).

```php
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}
```
Aucune des 3 expressions n'est obligatoire, voici es exemples de la même boucle :
```php
for ($i = 1; ; $i++) {
    if ($i > 10) {
        break;
    }
    echo $i;
}
```

```php
$i = 1;
for (; ; ) {
    if ($i > 10) {
        break;
    }
    echo $i;
    $i++;
}
```
#### Foreach
La structure de langage `foreach` fournit une façon simple de parcourir des tableaux.
`foreach` ne fonctionne que pour les tableaux et les objets, et émettra une erreur si vous tentez de l'utiliser sur une variable de type différent ou une variable non initialisée. Il existe deux syntaxes :
```
foreach (iterable_expression as $value){
    //commandes
}
```
La première forme passe en revue le tableau iterable_expression.
À chaque itération, la valeur de l'élément courant est assignée à $value.

```
foreach (iterable_expression as $key => $value){
    //commandes
}
```

La seconde forme assignera en plus la clé de l'élément courant à la variable $key à chaque itération.



```php
$arr = array(1, 2, 3, 4);
$result = array();
foreach ($arr as $value) {
    $result[] = $value * 2;
}
// $result vaut array(2, 4, 6, 8)
```

Avec la clé : 
```php
$arr = array("un"=>1,"deux"=> 2,"trois"=> 3,"quatre"=> 4);
$result = array();
foreach ($arr as $key=>$value) {
    $result[$key] = $value * 2;
}
// $result vaut array("un"=>2,"deux"=> 4,"trois"=> 6,"quatre"=> 8)
```

#### Instructions supplémentaires

L'instruction `break` permet de sortir d'une structure `for`, `foreach`, `while`, `do-while` ou `switch`.
L'instruction `continue` est utilisée dans une boucle afin d'éluder les instructions de l'itération courante et de 
continuer l'exécution à la condition de l'évaluation et donc, de commencer la prochaine itération.



