---
title: Doctrine
weight: 32
---



## Modèle

### Ressources

- [Doctrine and Symfony](https://symfony.com/doc/current/doctrine.html)

### Créer les entités

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

{{< hint info >}}
 Quelles relations existent entre les entités (Many To One/Many To Many/...) ? Faire un schéma de la base de données.
{{< /hint >}}

### Connexion à la base

Modifier le connecteur à la base pour qu'il utilise SQLite

{{< hint info >}}
Expliquer ce qu'est le fichier .env
{{< /hint >}}



{{< hint info >}}
Expliquer pourquoi il faut changer le connecteur à la base de données
{{< /hint >}}

### Migrations

L'objectif de cette partie est de découvrir les migrations avec Symfony.

{{< hint info >}}
Expliquer l'intérêt des migrations d'une base de données
{{< /hint >}}

Réaliser une migration de la base de donnée et l'appliquer.