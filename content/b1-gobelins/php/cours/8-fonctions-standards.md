---
title: 8 - Fonctions standards
weight: 10008
---

## Affichage

La fonction pour effectuer un affichage est `echo`.

`echo` n'est pas vraiment une fonction (c'est techniquement une structure du langage), cela fait que vous n'êtes pas
obligé d'utiliser des parenthèses. echo (contrairement à d'autres structures de langage) ne se comporte pas comme une
fonction, il ne peut donc pas être utilisé dans le contexte d'une fonction. De même, si vous voulez passer plusieurs
paramètres à echo, les paramètres ne doivent pas être entourés de parenthèses.

```php
echo "Bonjour","Le","Monde";
```

affichera `BonjourLeMonde`.

```php
echo 2 + 2;
```

affichera `4`;

Il existe plusieurs autres fonctions pour afficher du texte, moins courantes, comme `print`, `printf`.

### Debug

La fonction `echo` ne permet pas d'afficher des tableaux ni les types complexes.
Pour cela, on peut utiliser la fonction `print_r` ou `var_dump`.

#### print_r
```php
$user = ["username"=>"decima","identity"=>["firstname"=>"Henri","lastname"=>"LARGET"]];
print_r($user);
```
affichera : 
```
Array
(
    [username] => decima
    [identity] => Array
        (
            [firstname] => Henri
            [lastname] => LARGET
        )

)
```
#### var_dump
```php
$user = ["username"=>"decima","identity"=>["firstname"=>"Henri","lastname"=>"LARGET"]];
var_dump($user);
```
affichera :
```
array(2) {
  ["username"]=>
  string(6) "decima"
  ["identity"]=>
  array(2) {
    ["firstname"]=>
    string(5) "Henri"
    ["lastname"]=>
    string(6) "LARGET"
  }
}
```

## Inclusion de scripts

Les fonctions d'inclusion de scripts permettent d'inclure un fichier PHP dans un autre fichier. Elles prennent en
paramètre le script à inclure et l'incluent à l'endroit exact de l'appel.

Les 4 fonctions sont : `include`, `require`, `include_once`, `require_once`.

Exemple d'usage :

Fichier `vars.php`

---

```php
$couleur = 'verte';
$fruit = 'pomme';
```

Fichier `script.php`

---

```php
echo "Une $fruit $couleur"; // Une
include 'vars.php';
echo "Une $fruit $couleur"; // Une pomme verte
```

| Fonction     | Particularité                                                                                                                                    |
|--------------|--------------------------------------------------------------------------------------------------------------------------------------------------|
| include      | Inclut un fichier. Si le fichier n'existe pas, fera un "warning"                                                                                 |
| require      | Inclut un fichier. Si le fichier n'existe pas, fera une "fatal error"                                                                            |
| include_once | Inclut un fichier une seule fois. Comme pour include, fera un "warning" si le fichier n'existe pas. L'instruction est ignorée si déjà inclus     |
| require_once | Inclut un fichier une seule fois. Comme pour require, fera un "fatal error" si le fichier n'existe pas. L'instruction est ignorée si déjà inclus |

## Constantes

La fonction `define` permet de définir une constante.

```php
define("ANSWER_TO_LIFE", 42);
echo ANSWER_TO_LIFE;
```
Depuis PHP 7+ : 
```php
define("SEASONS", array("Spring","Summer","Autumn","Winter"));
echo SEASONS[0];
```


