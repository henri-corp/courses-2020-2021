---
title: "Redis"
weight: 2021022202
---

# TP2 - Redis

## Ressources

Un project a été mis à disposition pour votre usage afin de réaliser les différents exercices
<a href="https://github.com/henri-corp/tp-redis-js-skeleton" target="_blank">
github.com/henri-corp/tp-redis-js-skeleton</a>

La bibliothèque Redis utilisée est
<a href="https://github.com/NodeRedis/node-redis" target="_blank">node redis</a>, elle contient toute la documentation
nécessaire.

## Tutoriel

Avant de commencer à réaliser les exercices, redis a mis à disposition un tutoriel interactif :
<a href="https://try.redis.io/" target="_blank">try.redis.io</a>.

## Exercice 1

En reprenant la logique de
l'[exercice 1 du TP3-structures](/2021-2022/b2-gobelins/data-structures/tp/3-structures/#exercice-1)
,

1. À l'aide d'une boucle et d'un `RPUSH`, insérer dans une liste redis nommée `students_ex1`
   - Roxane
   - Loïc
   - Yohan
   - Max
   - Alexandre
   - Arthur
   - Léa

Pour éviter les doublons d'insertion, vous pouvez utiliser les fonction `LTRIM` pour vider la liste et `LLEN` pour en
connaitre la taille.

2. En vous aidant uniquement des fonctions redis `RPUSH`, `RPOP` et `LLEN`,sans utiliser de variables et en utilisant
   uniquement les listes redis, inversez l'ordre des étudiants. de la liste.
3. en utilisant `LRANGE`, afficher la liste avant le tri et après le tri.

```json lines
[
   'Roxane',
   'Loïc',
   'Yohan',
   'Max',
   'Alexandre',
   'Arthur',
   'Léa'
]
[
   'Léa',
   'Arthur',
   'Alexandre',
   'Max',
   'Yohan',
   'Loïc',
   'Roxane'
]
```

## Exercice 2

En reprenant la logique de
l'[exercice 2 du TP3-structures](/2021-2022/b2-gobelins/data-structures/tp/3-structures/#exercice-2)
,

1. À l'aide d'une boucle et d'un `RPUSH`, insérer dans une liste redis nommée `students_ex2`
   - Max
   - Roxane
   - Loïc
   - Yohan
   - Alexandre
   - Arthur
   - Léa

2. En vous aidant uniquement des fonctions redis `RPUSH`, `LPOP` et `LLEN`,sans utiliser de variables locales et en
   utilisant uniquement les listes redis, inversez l'ordre des étudiants.
3. en utilisant `LRANGE`, afficher la liste avant le tri et après le tri.

```json lines
[
   'Roxane',
   'Loïc',
   'Yohan',
   'Max',
   'Alexandre',
   'Arthur',
   'Léa'
]
[
   'Léa',
   'Arthur',
   'Alexandre',
   'Max',
   'Yohan',
   'Loïc',
   'Roxane'
]
```

## Données

La suite des exercices va porter sur le fichier [superheroes.json](../superheroes.json). Pour utiliser le fichier,
enregistrez le dans le dossier exercices et ce fichier json est utilisable directement avec l'instruction `require` :

```javascript
    const data = require('./superheroes.json');
console.log(data);
```

## Exercice 3

À partir du fichier `superheroes.json`, créer 4 sets :

- `champion:creation:gender` qui contiendra tous les gens possibles stockés dans le json.
- `champion:creation:race`  qui contiendra toutes les races possibles stockés dans le json.
- `champion:creation:eye`  qui contiendra toutes les couleurs d'yeux possibles stockés dans le json.
- `champion:creation:hair`  qui contiendra toutes les couleurs de cheveux possibles stockés dans le json.
- `champion:creation:alignment` qui contiendra tous les alignements possibles des héros.
- `champion:creation:name` qui contiendra tous les mots possible de super héro (pour cela il va faloir séparer les noms
  de chaque héro en fonction des espaces et autres caractères). Puis afficher toutes les valeurs pour chaque set.

> Attention ! certaines valeurs peuvent être inexistantes ou contenir "-" comme données.

## Exercice 4

À partir du fichier `superheroes.json`, pour chaque alignement, créer un set `hero:ALIGNMENT` qui contiendra les id des
différents personnages du fichier.

On va également créer une Hasmap par `hero:profile:{id}` qui contiendra le nom du héro, son alignement, et toutes les
powerstats

Voici les données à stocker par exemple.

| Key | Value |
|--------------|-------|
| name         | Blade |
| alignment    | good  |
| combat       | 90    |
| durability   | 50    |
| intelligence | 63    |
| power        | 40    |
| speed        | 38    |
| strength     | 28    |

## Exercice 5

À partir des données stockées dans les sets de `champion:creation:*` sélectionnez de manière aléatoire (`SRANDMEMBER`)
pour chaque propriété une valeur. Pour le nom du héro il sera composé de 3 noms tirés aléatoirement et mis bout à bout,
par exemple : `Quantum Isis Stargirl`. Pour les différentes statistiques du héro, il faudra générer des nombre aléatoire
entre 1 et 100. Il faut enfin lui générer un ID (on utilisera le `current timestamp`). Enfin, il faudra stocker le héro
dans une hashmap `champion:profile:{ID}`. puis on stockera l'id du dernier héro créé à la clé `champion:current`. A
chaque fois qu'on voudra jouer un autre héro, on executera ce script qui créera un nouveau champion.

## Exercice 6

On va entamer un combat. En fonction de l'alignement du champion courant on va selectionner un héro d'un autre
alignement. La phase de combat va opposer ce champion et le héro.

Comment va se dérouler le combat ? Chaque personnage a un nombre de point égal à sa durabilité.

à tour de rôle en commençant par le champion, chaque personnage va lancer 1dX (X la capacité de combat), pour définir la
force de l'attaque. Si la force est inconnue, alors la base de l'attaque sera de 25.

Nous venons de créer un héro :

```json
{
   "intelligence": 90,
   "strength": 75,
   "speed": 70,
   "durability": 80,
   "power": 100,
   "combat": 40
}
```

Ce héro devra lancer un dé entre 1 et 40.

Par exemple, le héro Spiderman :

```json
{
   "intelligence": 90,
   "strength": 55,
   "speed": 67,
   "durability": 75,
   "power": 74,
   "combat": 85
}
```

Les points de vie de spiderman sont de 75. il perdra donc au pire 40 points de vie.

Enfin quand le combat finit, en fonction du vainqueur on va stocker le nombre de victoires du personnage ainsi que son
nom dans un set trié `leaderboard`.

## Exercice 7

Afficher le leaderboard avec tout en haut le meilleur combatant.
> hint : utiliser `sendCommand`.

Le resultat attendu est :

```markdown
| Fighter                        | Victories  |
|--------------------------------|------------|
| Rhino Corsair Kraven           | 146        |
| Mogo Wonder Poison             | 38         |
| Bizarro                        | 23         |
| Living Tribunal                | 19         |
| Deathstroke                    | 17         |
| Sinestro                       | 16         |
| Sentry                         | 16         |
| Robin VI                       | 16         |
| Lobo                           | 16         |
| Deadpool                       | 16         |
| Sandman                        | 15         |
| Red Hulk                       | 15         |
| Gladiator                      | 15         |
| Juggernaut                     | 14         |
| The Comedian                   | 13         |
| Galactus                       | 13         |
| Etrigan                        | 13         |
| Copycat                        | 13         |
| Black Flash                    | 13         |
| Man-Bat                        | 12         |
| Toad                           | 11         |
| Indigo                         | 9          |
```