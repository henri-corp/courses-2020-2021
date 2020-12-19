---
title: Doctrine
weight: 32
---



## Modele

### Ressources

- [Doctrine and Symfony](https://symfony.com/doc/current/doctrine.html)

### Create entities

En utilisant la commande `make:entity`, on va créer 3 entités : 

_tooltip: le type "relation" permet d'être assisté pour la création de relations_

- User (id,username, isActive, isBlocked)
- Post (id, content, author, createdAt, isPublished, isDeleted)
- Comment (id, author,content, createdAt, isDeleted)

Contraintes : 

- Post a un `author` qui est un User
- Post a des Comments
- User a des Posts
- User a des Comments
- Comment est attaché à un Post
- Comment a un author qui est User

> Quelles relations existent entre les entités (Many To One/Many To Many/...) ? Faire un schéma de la base de données.

### Connexion a la base

Modifier le connecteur à la base pour qu'il utilise SQLite

> Expliquer ce qu'est le fichier .env



> Expliquer pourquoi il faut changer le connecteur à la base de données

### Migrations

L'objectif de cette partie est de découvrir les migrations avec Symfony.

> Expliquer l'intérêt des migrations d'une base de données

Réaliser une migration de la base de donnée et l'appliquer.