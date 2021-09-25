---
title: "TP3 - Structures"

weight: 2021021106
---

Chaque exercice est indépendant.

# Exercice 1

Pour une pile donnée Main qui contient les 1000 premiers nombres dans l'ordre croissant (1 -> 1000).

Dans le langage de votre choix, proposez une solution algorithmique pour retourner la liste et la stocker dans Main en
vous limitant aux fonction pop, count et push.

## PHP

fonctions autorisées :

- [`array_pop`](https://www.php.net/manual/en/function.array-pop.php)
  et [`array_push`](https://www.php.net/manual/en/function.array-push.php)
- `while` / `do while`
- [`count`](https://www.php.net/manual/en/function.count.php)
- pour créer une nouvelle liste : `$newList = arrray();`

```php
// charger les valeurs de 1 à 1000 dans un tableau
$main = range(1,1000);
```

## JS

fonctions autorisées :

- [`array.pop`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/pop)
  et [`array.push`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/push)
- `while` / `do while`
- [`array.length`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/length)
- pour créer une liste = `let newList = []`

```js
// charger les valeurs de 1 à 1000 dans un tableau
let main = Array.from({length: 1000}, (_, i) => i + 1)
```

# Exercice 2

L'exercice 2 est le même que l'exercice 1 mais la différence est qu'on ne va pas utiliser de pile ici, mais une file
d'attente. Pour une file d'attente donnée Main qui contient les 1000 premiers nombres dans l'ordre croissant (1 -> 1000)
.

Dans le langage de votre choix, proposez une solution algorithmique pour retourner la liste et la stocker dans Main en
vous limitant aux fonction shift, count et push.

## PHP

fonctions autorisées :

- [`array_shift`](https://www.php.net/manual/en/function.array-shift.php)
  et [`array_push`](https://www.php.net/manual/en/function.array-push.php)
- `while` / `do while`
- [`count`](https://www.php.net/manual/en/function.count.php)
- pour créer une nouvelle liste : `$newList = arrray();`

```php
// charger les valeurs de 1 à 1000 dans un tableau
$main = range(1,1000);
```

## JS

fonctions autorisées :

- [`array.shift`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/shift)
  et [`array.push`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/push)
- `while` / `do while`
- [`array.length`](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/length)
- pour créer une liste = `let newList = []`

```js
// charger les valeurs de 1 à 1000 dans un tableau
let main = Array.from({length: 1000}, (_, i) => i + 1)
```

# Exercice 3

téléchargez le fichier [e5.csv](../tp3-resources/e5.csv). Ce CSV contient la description d'un arbre : Un identifiant de
noeud et son noeud parent. Pour faciliter les choses, l'id `n` a forcément un parent compris entre 0 et `n-1`.

> Astuce : cet exercice demande de la récursivité et des références.

1. construire un json qui contiendra toutes les données sous forme d'arbre, voici le début des données attendues :

```json
{
  "id": "0",
  "nodes": [
    {
      "id": "1",
      "nodes": [
        {
          "id": "235",
          "nodes": [
            {
              "id": "523",
              "nodes": [
                {
                  "id": "812"
                }
              ]
            },
            {
              "id": "677"
            }
          ]
        },
        {
          "id": "645"
        },
        {
          "id": "887"
        }
      ]
    }
  ]
}
```

2. Construire les chaines de tous les éléments du tableau suivant le format suivant :

```csv
0
0,1
0,2
0,3
0,4
0,5
0,4,6
0,4,7
0,2,8
0,4,6,9
0,3,10
0,4,6,11
0,4,12
0,13
0,4,12,14
0,4,6,15
0,4,6,16

```

3. Quelle est la profondeur maximale de l'arbre ? Combien de chaines ont cette longueur ?

# Exercice 4

Voici un arbre généalogique :

- Je m'appelle U et j'ai 4 demi-sœurs (A,B,C,D) et 1 demi-frère (E).
- A,B et C ont toutes la même mère (F) et nous avons le même père (G).
- D et moi avons la même mère (J) mais pas le même père, le père de D s'appelle L.
- E et moi avons le même père. La mère (K) de E n'est pas ma mère ni la mère de A B et C.
- E a eu 2 femmes EF1 et EF2 et chacune a eu 2 enfants avec E : E11,E12 et E21,E22.
- Mon père (G) a 2 sœurs (H1, H2) et une demi-sœur (H3) du côté de son père (H) et respectivement de (HF1) et (HF2).
- Respectivement les 2 sours de G ont eu 3 enfants (H11, H12, H13) et 2 enfants (H21 et H22).
- Concernant mes demi-sœurs A, B et C, elles ont toutes eu des enfants, respectivement A1, A2, B1, B2, B3, C1 et C2.


1. La structure arbre vous semble-t-elle adaptée à la résolution de ce problème ? pourquoi ?
2. Proposez une (ou plusieurs) structure(s) de données pour représenter le problème.
3. En vous basant sur les données de base ET sur les différentes structures proposées, définissez le JSON contenant les
   différentes données.

> FYI, B3 s'appelle Mickey




<!--
# Exercice 5

Mon entreprise Pondz-E, est un fond de placement qui rapporte beaucoup d'argent et qui propose à qui le souhaite
investir 1000 euros dans la société, et tous les ans, Pondz-E lui reverse 450 euros de dividendes. Une seconde force de
l'entreprise est la mécanique de parrainage : si un investisseur actuel amène un nouvel investisseur à investir 1000
euros, le nouvel investisseur gagnera 450 euros et le parrain gagnera 25 euros supplémentaires, dans la limite de 2
filleuls.

1. On vous demande de réaliser une modélisation de ce modèle financier. Quelle structure choisiriez-vous ?
2. Si chaque investisseur amène 2 filleuls, à partir de quelle profondeur ce modèle financer ne marche plus en partant
   sur la base de 100 millions d'investisseurs potentiels ?

-->
