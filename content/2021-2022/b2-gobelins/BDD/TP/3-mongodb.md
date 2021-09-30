---
title: "MongoDB"
weight: 2021022203
---

# TP3 - MongoDB

## Ressources

Un project a été mis à disposition pour votre usage afin de réaliser les différents exercices
<a href="https://github.com/henri-corp/tp-mongodb-js-skeleton" target="_blank">
github.com/henri-corp/tp-mongodb-js-skeleton</a>

La bibliothèque MongoDB utilisée est la bibliothèque officielle
<a href="https://docs.mongodb.com/drivers/node/current/usage-examples/" target="_blank">mongoDB</a>.

Je recommande également l'usage de la bibliothèque csvtojson pour lire des csv et dayjs pour la conversion de chaines en dates.


## Exercice 1
En partant du fichier [solarsystem.csv](../solarsystem.csv) que vous ajouterez dans le dossier exercices, parcourir les différentes données, les convertir au bon format
(`parseFloat` pour les nombres, dayjs pour les dates et des conversions booléennes) avant de les insérer dans une collection nommée "solarsystem".

## Exercice 2
En partant de la collection solarsystem, effectuer les recherches suivantes : 

1. Listez toutes les planètes qui font partie du système solaire.
2. Trouver la Terre
3. Combien de satellites a Saturne ?
4. Compter le nombre de satellites de la terre
5. Quel est le rayon de la terre ?
6. Combien d'astres sont plus grands que la terre ?
7. Combien d'astres ont été découvert entre le 1er janvier 2005 et le 31 décembre 2004?

## Exercice 3
Importer les données du fichier [Steam.json](../steam.json) dans une collection mongodb nommée `steam`.
Attention, il faut changer le type du champs `release_date`.
Ignorez les erreurs s'il y en a, il doit y avoir environ 74360 documents dans votre base après import.

## Exercice 4

En utilisant la commande de find :
1. Combien y-a-t'il de documents dans la base ?
2. Combien y-a-t'il de documents qui sont du genre `documentary` ?
3. Lister les noms et steam App Id des documents qui ne sont pas de type `dlc` et qui ont un prix compris entre 100 et 120 euros ?

En utilisant la commande aggregate :

4. Combien y-a-t'il de documents dans la base ? 
5. Combien y-a-t'il de documents qui sont du genre `documentary` ?
6. Lister les noms et steam App Id des documents qui ne sont pas de type `dlc` et qui ont un prix compris entre 100 et 120 euros ?
7. Lister les différents genres de jeux
8. Lister les différents genre de jeux et les trier par nombre de jeux décroissant
9. Quelle est la moyenne des prix des jeux ?
10. Quelle est la moyenne des prix des jeux pour chaque plateforme ?
11. donner le nombre de jeu par plateformes.
12. donner le prix le plus cher par plateformes.





