---
title: TP1 - Prise en main du langage
weight: 20001
---
> Objectif du TP :
> - Savoir installer l'environnement de travail
> - Bases du langage
    >

- Déclarer des variables, et boucles et conditions

> Rendu : Créer un projet sur Github nommé : `bddi1-php-tp1`
>
> Chaque étape fera l'objet d'un commit au minimum.

## Installer l'environnement de travail

- Installez PHP 8 avec `XAMPP`.

## Exercice 1 - hello Yourname

Créer un script nommé `hello.php` qui affichera le message `Hello World`.

Il existe 2 variables globales `$argv` et `$argc`.

> Que contiennent ces variables ?

Le script hello.php doit prendre un paramètre de nom, et afficher "hello NOM".

Pour tester :

```shell
php ./hello.php Henri
```

devra afficher

```text
hello Henri
```

⚠️ Si l'argument n'est pas passé, il faut que le script continue à fonctionner.

Vérifiez que l'argument est passé paramètre et si ce n'est pas le cas, retournez par défaut "hello World".

## Exercice 2 - Calculatrice

L'objectif de cette partie est de faire une calculatrice simple.

La calculatrice aura 4 opérations simples : addition / soustraction / division / multiplication.

Exemples d'usage :

```shell
php ./calculator.php add 1 4       #affichera 5
php ./calculator.php + 1 4       #affichera 5
php ./calculator.php / 1 4       #affichera 0.25
```

Les opérations à implémenter :

| Opération      | Opérateur   |
|----------------|-------------|
| addition       |  `+`, `add` |
| soustraction   | `-`,`sub`   |
| multiplication | `*`,`mult`  |
| division       | `/`,`div`   |
| modulo         | `%`,`mod`   |

À l'aide de la fonction `die`, gérez le cas où l'opération ne figure pas dans la liste des opérations autorisées : affichez le message `unknown operation`.

Que se passe-t-il dans le cas de cette opération : 
```shell
php ./calculator.php / 5 0
```
Ajoutez une condition qui affichera `invalid division`.

Cette calculatrice sera améliorée dans la dernière partie.

## Exercice 3 - Devine Le nombre

Le but de cet exercice est de faire un jeu ou l'ordinateur choisira un nombre, et il faudra proposer un nombre pour trouver le juste nombre.

Nous allons utiliser la fonction [rand](https://www.php.net/manual/fr/function.rand.php) pour choisir un nombre.

La première étape sera d'apprendre à lire l'entrée standard (STDIN).

> Qu'est-ce que l'entrée standard `STDIN` ? 

Pour cette étape on peut utiliser la fonction fscanf ou fgets
```
$line = trim(fgets(STDIN)); // lit une ligne depuis STDIN
fscanf(STDIN, "%d\n", $number); // lit des nombres depuis STDIN
```

Le jeu se déroulera dans une boucle, et l'objectif sera de compter le nombre de tentatives pour afficher ce nombre à l'utilisateur quand il aura trouvé.
Et comme cela risque de se compliquer, il faudrait pouvoir indiquer à l'utilisateur si le nombre est plus haut que ce qu'il propose ou non.

Le script s'appellera `guessNumber.php`.

## Exercice 3 - Partie 2 - Jeu amélioré

L'objectif de cet exercice est de fournir une version améliorée du jeu.

Nous avons décidé de rendre la partie plus difficile, il ne faut plus indiquer au joueur si la valeur est plus haute ou plus basse que celle proposée.
À la place, il faudra dire au joueur s'il se rapproche de la valeur ou s'éloigne. Utilisez la fonction `abs` si besoin.

De plus, Nous souhaitons pouvoir permettre à l'utilisateur de choisir le nombre maximum pour l'interval (entre 0 et X).







