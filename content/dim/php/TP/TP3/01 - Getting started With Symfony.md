---
title: Getting Started

weight: 31
---

Ce projet va se dérouler sur plusieurs séances et aura pour objectif de réaliser un système de blog avec Symfony. 

{{< hint info >}}
Les blocs quote (ce bloc par exemple), sont des **questions à répondre** qui pourraient apparaître dans l'évaluation finale.

Répondre aux questions dans le fichier **README.md** du projet.

{{< /hint >}}

## Installation du Framework

Pour installer le Framework, il faut d'abord installer Symfony CLI.

Cette invite de commande, [disponible ici](https://symfony.com/download), permet de : 
- Créer de nouveaux projets Symfony
- ...

{{< hint info >}}
Quelles sont les fonctionnalités principales du Symfony CLI ?
{{< /hint >}}

Créez un projet symfony avec la commande suivante : 

```
 symfony new --full symfony_tp
```

Cela va créer un dossier symfony_tp qui contiendra votre projet Symfony. Ce projet est également un environnement GIT prêt à l'emploi.

À partir de maintenant, vous commiterez directement **dans le projet**. 

Créez un projet vide sur Github, et suivez l'instruction "…or push an existing repository from the command line" : 
![git example](../git.png)



## Console

Pour exécuter des commandes Symfony, vous avez l'utilitaire console qui se trouve dans le dossier bin. Pour l'exécuter, lancer simplement la commande 
```
bin/console
```
Depuis l'ajout du symfony CLI, vous pouvez lancer vos commandes en tappant : 
```
symfony console
```

Et vous aurez la liste des commandes possibles. 

## Server Web
Lancez le serveur avec la commande suivante : 
```
symfony serve
```
Si vous allez sur l'URL fournie par la commande, vous pourrez voir :

![img.png](../img.png)

