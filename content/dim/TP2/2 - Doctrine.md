---
title: 2 - Doctrine
weight: 22
---
Téléchargez le code disponible ici : [tp3.zip](tp3.zip) et décompressez l'archive. Faire une nouvelle branche appelée `p2` sur le projet du TP2 et mettre son code dans cette branche.

Allez ensuite avec votre terminal dans le dossier en question, et avant de continuer il va falloir installer les dépendances composer. L'archive contient déjà un dossier composer mais de dossier vendor, la première étape consiste à faire `php bin/composer install`. 
Une fois les dépendances installées, vous pouvez démarrer le serveur comme au premier TP. 

Le code fourni correspond à la correction améliorée du sujet numéro 1 du TD et l'intégration de doctrine connecté à une base SQLite.

La base sera stockée à la racine du projet, dans un fichier `db.sqlite`.

Le sujet portera sur la manipulation d'une base de donnée de jeux, joueurs scores.

![](https://i.imgur.com/79OT8T3.png)

Un joueur possède un jeu. Chaque joueurs peut enregistrer plusieurs scores. Un jeu peut avoir plusieurs scores d'enregistrés.
On pourra ainsi suivre la progression du joueur et de son score. 


## Creation des Entities et Repositories

Contrairement à un cours de base de données classiques, nous allons commencer par créer notre modèle de données.

Pour cela, nous allons créer trois classes, `App\Entity\Player`, `App\Entity\Game` et `App\Entity\Score` qui contiendront chacunes les champs privés listés dans le schéma ci-dessus avec leurs annotations.

Dès lors que les entitées sont écrites, on va exécuter la commande qui va s'occuper de mettre à jour la base de données.

```bash
php bin/doctrine orm:schema-tool:update --force
```

## Implementer les fonctionnalites de la plateforme

Dans les routes du controlleur, vous pouvez passer un nouveau paramètre :
typé `Doctrine\ORM\EntityManagerInterface` comme suit:

```php
public function index(Request $request, EntityManagerInterface $entityManager){


}
```

----

Les pages sont découpées en 3 controlleurs : on veut faire un CRUD sur les jeux, les joueurs, et afficher un tableau des derniers scores avec la possibilité d'en ajouter un.

----

La classe `App\FakeData` génère des fausses données. Implémentez les différentes fonctionnalités en vous basant sur ce qui a été vu lors du TP1 et du TP2. Les interfaces graphiques devront être adaptées. Aucun Entity Manager ni Repository ne doit être utilisé dans les vues, c'est le rôle des Controllers. 

----

## Aller plus loin

 - Sur la homepage, afficher un classement des jeux populaires (en fonction du nombre de scores rentrés) pour la semaine et tout temps.
 - Ajouter le classement des joueurs dans la page du jeu
 - Ajouter le rang du joueur pour chaque jeu sur son profil
 - Ajouter l'affichage des scores par jeu et leur évolution par rapport à la semaine dernière