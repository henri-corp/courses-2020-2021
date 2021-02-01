
---
title: 5 - Opérations
weight: 10005
---

Voici la liste des opérations et un exemple de leur usages en fonction du type de variables.

## Arithmétiques

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

Il existe également des opérateurs d'assignation rapide :

| Exemple    | Equivalent     | Opération      |
|------------|----------------|----------------|
| `$a += $b` | `$a = $a + $b` | Addition       |
| `$a -= $b` | `$a = $a - $b` | Soustraction   |
| `$a *= $b` | `$a = $a * $b` | Multiplication |
| `$a /= $b` | `$a = $a / $b` | Division       |
| `$a %= $b` | `$a = $a % $b` | Modulo         |
| `$a++`     | `$a = $a + 1`  | Incrémentation |
| `$a--`     | `$a = $a - 1`  | Décrémentation |

Par exemple :

```php
$a = 1;
$a = $a + 2;
$a = $a - 3;
```
Peut s'écrire :
```php
$a = 1;
$a += 2;
$a -= 3;
```

## Comparaisons

| Exemple   | Nom               | Résultat                                                                                                               |
|-----------|-------------------|------------------------------------------------------------------------------------------------------------------------|
| `$a == $b` | Egal              | `true` si `$a` est égal à `$b`.                                                                                       |
| `$a === $b`| Identique         | `true` si `$a` est égal à `$b` et qu'ils sont de même type.                                                           |
| `$a != $b` | Différent         | `true` si `$a` est différent de `$b`.                                                                                 |
| `$a <> $b` | Différent         | `true` si `$a` est différent de `$b`.                                                                                 |
| `$a !== $b`| Différent         | `true` si `$a` est différent de `$b` ou bien s'ils ne sont pas du même type.                                          |
| `$a < $b`  | Plus petit que    | `true` si `$a` est strictement plus petit que `$b`.                                                                   |
| `$a > $b`  | Plus grand        | `true` si `$a` est strictement plus grand que `$b`.                                                                   |
| `$a <= $b` | Inférieur ou égal | `true` si `$a` est plus petit ou égal à `$b`.                                                                         |
| `$a >= $b` | Supérieur ou égal | `true` si `$a` est plus grand ou égal à `$b`.                                                                         |
| `$a <=> $b`| Combiné           | Un entier inférieur, égal ou supérieur à zéro lorsque `$a` est inférieur, égal, ou supérieur à `$b` respectivement.   |

## Logiques

| Exemple     | Nom       | Résultat                                                            |
|-------------|-----------|---------------------------------------------------------------------|
| `$a and $b` | And (Et)  | `true` si `$a` ET `$b` valent `true`.                               |
| `$a or $b`  | Or (Ou)   | `true` si `$a` OU `$b` valent `true`.                               |
| `$a xor $b` | XOR       | `true` si `$a` OU `$b` est `true`, mais pas les deux en même temps. |
| `! $a`      | Not (Non) | `true` si `$a` n'est pas `true`.                                    |
| `$a && $b`  | And (Et)  | `true` si `$a` ET `$b` sont `true`.                                 |
| `$a || $b`  | Or (Ou)   | `true` si `$a` OU `$b` est `true`.                                  |

## Chaines de caractères

### Concatenation

Pour concaténer (mettre bout-à-bout), l'opérateur de chaine est `.`.
```php
echo "Hello "."World";
```
affichera `Hello World`.

### Interpolation de chaine de caractères

On peut également intégrer des variables dans une chaine de caractère.
```php
$age = 29;
echo "J'ai {$age} ans";
```
affichera `j'ai 29 ans`.


## Tableaux

| Exemple     | Nom           | Résultat                                                                                           |
|-------------|---------------|----------------------------------------------------------------------------------------------------|
| `$a + $b`   | Union         | Union de `$a` et `$b`.                                                                             |
| `$a == $b`  | Égalité       | true si `$a` et `$b` contiennent les mêmes paires clés/valeurs.                                    |
| `$a === $b` | Identique     | true si `$a` et `$b` contiennent les mêmes paires clés/valeurs dans le même ordre et du même type. |
| `$a != $b`  | Inégalité     | true si `$a` n'est pas égal à `$b`.                                                                |
| `$a <> $b`  | Inégalité     | true si `$a` n'est pas égal à `$b`.                                                                |
| `$a !== $b` | Non-identique | true si `$a` n'est pas identique à `$b`.                                                           |

## Null coalescent

L'opérateur Null coalescent (`??`) a été ajouté comme un sucre syntaxique pour les cas de besoin le plus commun d'utiliser une troisième conjonction avec la fonction `isset()`. Il retourne le premier opérande s'il existe et n'a pas une valeur `null`; et retourne le second opérande sinon.
```php
$array=[];
$result = "not found";
if (isset($array[0])){
    $result = $array[0];
}
```
```php
$array=[];
$result = $array[0] ?? "not found";
```


