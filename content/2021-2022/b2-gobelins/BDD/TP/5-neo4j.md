---
title: "Neo4J"
weight: 2021022205
---

# TP5 - Neo4J


## Tutoriel

Connectez vous à l'instance neo4j `https://PRENOM.neo4j.henri.run/browser/` et connectez vous avec les identifiants suivants :

![](../tp5-neo4j.png)

Une fois cela fait, lancez le tutoriel `Try Neo4j with live data`.

## Exercice 1
1. En utilisant la base utilisée pour la partie tutorial, créez un noeud `Student` avec votre nom et prénom et un id numérique.
2. Créez un noeud `Course` avec un nom `BDD`.
3. Créez un noeud `Teacher` avec le nom et prénom de votre enseignant et l'identifiant 42.  
   ⚠️ _Avec un I, pas un Y_ ⚠️
4. Liez le cours et l'enseignant `TEACH`.
5. Liez le cours à l'étudiant `LEARN`. Dans la liaison, ajouter la valeur `appreciation`, entre 0 et 100 qui donnera l'appreciation du cours par l'étudiant.

![](../tp5-ex1-final.png)

## Exercice 2
Pour l'exercice 2, on va se connecter à une base Neo4J de la même manière que pour les premiers exercices :
`https://lego.neo4j.henri.run/browser/`. 
Il s'agit de la base LEGO trouvé ici [rebrickable.com/downloads](https://rebrickable.com/downloads/).  

La liste des noeuds : 
- Category : La catégorie des pièces (plate, brick, etc...)
- Color : La couleur de la brique (blue, red, bluish gray,...)
- Inventory : Un groupe de pièces qui constitue le set pour sa version (version 1)
- InventoryPart : une quantité de pièces (Color, Part, Quantity) pour un inventaire.
- Material : La matière de la pièce (plastic,...)
- Part : Le nom de la pièce (brick 2x2)
- Set : Une boite lego (exemple : L'étoile noire)
- Theme : Le thème de la boite (exemple : Lego starwars)

1. Lister tous les noeuds Material.
2. Trouver le noeud Material qui a pour `name:Metal`.
3. Trouver le nombre de sets.
4. Lister les noms de tous les Set du Theme nommé `Police`.
5. Lister toutes les couleurs du set nommé `Medieval Blacksmith` et les trier par ordre alphabétique
|"color"              |
|---------------------|
|"Black"              |
|"Blue"               |
|"Bright Green"       |
|"Bright Light Orange"|
|"Dark Azure"         |
|"Dark Blue"          |
|"Dark Bluish Gray"   |
|"Dark Brown"         |
|"Dark Orange"        |
|"Dark Red"           |

6. Lister toutes les couleurs et le nombre de pièces, puis trier le resultat par ordre décroissant du set nommé `Medieval Blacksmith`

|"color"              | "total" |
|---------------------|---------|
|"Reddish Brown"      |  655    |
|"Black"              |  238    |
|"Light Bluish Gray"  |  237    |
|"Dark Bluish Gray"   |  158    |
|"White"              |  157    |
...

7. Retrouvez les 2 ID des sets `Elf Boy` et `Elf Girl`.

|"BOY"|"GIRL"|
|---|---|
|10165-1|10166-1|


8. Retrouvez toutes les briques aui sont en commun entre le set `Elf Boy` et `Elf Girl` et donner leur noms distinct.

|"Brick 1 x 2 with Eyes and Smile Print"|
|---------------------------------------|
|"Brick 1 x 2"                          |
|"Plate 2 x 2"                          |
|"Slope Inverted 45° 2 x 1"             |
|"Slope 45° 2 x 1 with Bottom Pin"      |
|"Slope 45° 2 x 2"                      |
|"Plate Round 1 x 1 with Solid Stud"    |
|"Plate 2 x 4"                          |    

9. Comme à la question d'avant, mais cette fois ci, avec la même couleur et le même nombre de pièces dans le set.

|"name"                       |"quantity"|"color"|
|---------------------------------------|----------------|---------------|
|"Brick 1 x 2 with Eyes and Smile Print"|1               |"Yellow"       |
|"Brick 1 x 2"                          |1               |"Red"          |
|"Plate 2 x 2"                          |1               |"Black"        |
|"Brick 1 x 2"                          |2               |"Blue"         |
|"Plate Round 1 x 1 with Solid Stud"    |1               |"Yellow"       |
|"Plate Round 1 x 1 with Solid Stud"    |2               |"Yellow"       |
|"Plate Round 1 x 1 with Solid Stud"    |1               |"White"        |
|"Plate Round 1 x 1 with Solid Stud"    |1               |"White"        |
|"Plate Round 1 x 1 with Solid Stud"    |1               |"White"        |
|"Plate Round 1 x 1 with Solid Stud"    |1               |"White"        |
|"Plate 2 x 4"                          |1               |"White"        |

10. Trouver la quantité totale de pièces de tous les sets confondus de la base.

11. Donner la moyenne arrondie à 2 chiffre après la virgule du nombre de pièces par set.

12. Donner la moyenne arrondie à 2 chiffre après la virgule du nombre de pièces différentes par set.

13. En utiliser les statistiques d'avant, donner la moyenne du nombre de pièces de types différent dans les sets.

14. Vérifier ce calcul en calculant la moyenne des quantités. Les resultats sont-ils identiques ? Quelle valeur utiliseriez-vous?

## Aller plus loin
- JS https://neo4j.com/developer/javascript/
- PHP https://neo4j.com/developer/php/
- Python https://neo4j.com/developer/python/