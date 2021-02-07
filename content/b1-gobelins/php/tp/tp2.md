---
title: TP2 - Tic-tac toe
weight: 20002
---
> Les points abordés dans ce TP sont : 
> - Déclarer une fonction
> - Manipuler des tableaux

---
>
> Rendu : Via Github, un "fork" du projet decima/tic-tac-toe
>
> N'oubliez pas de commit à la fin du TP.


Voici une partie de morpion ! 
Chaque joueur met une `X` ou un `O` à tour de rôle dans une grille de 3 * 3.
Le premier des deux joueurs à aligner 3 X en ligne, colonne ou diagonale à gagner.
Si la grille est pleine le match est nul. 


## Partie 1 - Initialisation du projet

Via la plateforme github, effectuez un "fork" du projet, avec le bouton fork.
Cette fonctionnalité va créer une copie du projet sur votre compte github. 

Pour lancer le jeu, rendez-vous dans le projet et exécutez 
```shell
php index.php
```
C'est le fichier `index.php` qui devra être modifié.

Le second fichier `functions.php` est un fichier qui contient des fonctions utilitaires, il ne doit pas être modifié.

> **Lancez la commande.**

> Une erreur est survenue :
> ```
> PHP Warning:  foreach() argument must be of type array|object, null given
> ```

Le problème vient de la variable `$game`. 

Modifiez la déclaration de la variable pour qu'elle soit un tableau en 2 dimensions (un tableau qui contient des tableaux) de 3x3 cases. Toutes les valeurs de ce tableau doivent être déclarées à `null`.

## Partie 2 - Affichage

![img.png](../img.png)

La grille actuelle affiche des `~`. Pour corriger ce problème, il faut créer une fonction nommée `showCharacter` qui 
prend un paramètre de type `?string` et retourner un `string`.
Cette fonction passe le contenu de la fonction en paramètre, ce contenu peut être `null` ou `1` ou `2`.

- Si la fonction reçoit 1, elle devra retourner `X`, 
- Si elle reçoit 2, elle devra retourner `O`,
- Si elle reçoit `null`, elle devra retourner une chaine de caractère contenant un espace `" "`.

Si tout a été fait correctement, voici le résultat de la grille.

![img_1.png](../img_1.png)

## Partie 3 - Choix des cases

C'est le moment de jouer.
En tapant la coordonnée de son choix, le script va appeler une fonction `isEmpty` qui prendra la grille de jeu,
ainsi que les coordonnées de Ligne et Colonne, et renvoyer, si la case est vide, `true`, sinon `false`.

Il existe également une seconde fonction qui s'appellera `hasAnyEmptyCell` qui prendra la grille de jeu en paramètre.
Cette fonction aura pour objectif de vérifier s'il reste au minimum une case vide dans la grille.
S'il ne reste pas de case vide, il faudra renvoyer `false`, sinon `true`.

## Partie 4 - Partie en solo

Il manque une dernière fonction ! La fonction `changePlayer` qui est la fonction magique qui permet d'alterner un joueur ou l'autre.

Cette fonction prend en paramètre le numéro du joueur actuel 1 ou 2.
Si le joueur `1` est passé en paramètre renvoie `2`. Si le joueur `2` est passé en paramètre renvoie `1`.


## Partie 5 - Documentation

La partie 5 consiste à créer une documentation pour le code source.

Créez un fichier "README.md" qui donne les informations suivantes : 
- Quels sont les pré-requis ? (PHP 8 par exemple)
- Comment lancer le projet ?
- Comment jouer ?

## Partie 6 - Bonus

La partie 6 consiste à modifier le fichier pour permettre de faire un robot pour jouer en solitaire.
Pour ça, on va laisser le joueur jouer en premier, et le robot choisira une case au hasard pour jouer à son tour.

**modifiez** la fonction `play` de `functions.php` pour permettre de faire jouer un ordinateur de manière aléatoire. 