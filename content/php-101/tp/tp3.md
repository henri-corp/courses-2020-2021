---
title: TP3 - Mon portefolio
weight: 20003
---

## Mise en place du projet

Cette étape est à faire avec le professeur.
Faites un `fork` du projet `henri-corp/fake-portefolio`. 
Clonez votre version du projet dans le dossier de votre http de votre installation xampp
et lancez le serveur XAMPP.

Ce projet devra être commité au 22 février au soir et servira à évaluer le module.

Voici le "faux" site de présentation de `Marie-Louise Bourreau`.

la page index.html

![img_2.png](https://i.imgur.com/XjaKQ09l.png)

la page realisations.html

![img_3.png](https://i.imgur.com/gs5dW3ql.png)

la page contact.html

![img_4.png](https://i.imgur.com/F7oIhgDl.png)

Le but du TP3 est d'améliorer le site grâce à PHP.

## Étape 1 - mutualiser les haut et pieds de page

La première étape va consister à regarder, et comprendre le code source en commun entre toutes les pages.

On constate que le menu est commun aux trois pages ainsi que le pied de page.

Créez un fichier `header.php` qui contiendra tout le code html de l'en-tête ainsi que le menu du haut.

Crée également un fichier qui s'appellera `footer.php` et qui contiendra la totalité du pied de page.

Ces deux fichiers doivent êtres intégrés aux 3 fichiers de base, avec la fonction `require_once` de PHP.

> le menu et le css ont disparus. Une erreur survient, que s'est-il passé ? 
> corrigez l'erreur sur les 3 fichiers et n'oubliez pas de modifier le chemin dans le menu.

> **hint :** si tout est bien fait, le menu n'aura a être changé qu'à un seul endroit.

> **hint 2 :** si tout est bien fait, vous n'aurez **pas** plusieurs balise <html>. 

## Étape 2 - arrières plans dynamiques

Cette étape simple consiste à fournir un arrière plan dynamique sur chaque page, en utilisant la fonction `rand`.
changez dans le code du header la ligne correspondante.

## Étape 3 - Données dynamiques

La page réalisation peut contenir plus cartes. Je souhaite pouvoir facilement modifier ces cartes, sans avoir à modifier l'HTML.

Créez un fichier `data.php` avec le contenu suivant : 
```php
<?php
$realisations = [
    [
        "title" => "Linux",
        "description" => "Linux is a family of open-source Unix-like operating systems based on the Linux kernel, an operating system kernel first released on September 17, 1991. Linux is typically packaged in a Linux distribution.",
        "image" => "https://p4.wallpaperbetter.com/wallpaper/980/964/908/linux-minimalism-foxyriot-tux-wallpaper-preview.jpg",
        "link" => "https://github.com/torvalds/linux"
    ],
    [
        "title" => "PHP",
        "description" => "PHP is a popular general-purpose scripting language that is especially suited to web development. Fast, flexible and pragmatic, PHP powers everything from your blog to the most popular websites in the world.",
        "image" => "https://www.live-rates.com/system/blogs/attachments/000/000/026/original/php1.jpg?1547433041",
        "link" => "https://www.php.net/"
    ],
    [
        "title" => "Laravel",
        "description" => "Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. ",
        "image" => "https://i.pinimg.com/originals/0b/07/e6/0b07e6c038ceecfb02d3b96bda9c8738.png",
        "link" => "https://github.com/laravel/laravel"
    ],
];
```

Il faudra faire une boucle dans le code de la page des réalisations pour afficher les différentes données directement dans chaque carte.

> **Quel est l'intérêt ?**
>

Pour tester, il est également possible d'ajouter un 4ᵉ élément au tableau `$realisations` :
```php
[
    "title" => "Git",
    "description" => "Git is a distributed version-control system for tracking changes in any set of files, originally designed for coordinating work among programmers cooperating on source code during software development.[8] Its goals include speed, data integrity, and support for distributed, non-linear workflows (thousands of parallel branches running on different systems).",
    "image" => "https://upload.wikimedia.org/wikipedia/commons/e/e0/Git-logo.svg",
    "link" => "https://git-scm.com/"
]
```

> **hint:** Vous devez sortir la carte dans un fichier PHP à part et en utilisant la fonction `include`, vous pouvez 
> l'inclure plusieurs fois dans un autre fichier : une boucle par exemple.

## Étape 4 - Pied de page
Le Pied de page est celui de l'année actuelle. Il serait plus intéressant si celui-ci pouvait changer en fonction de l'année courrante. 

> **hint:** La fonction `date` permet de manipuler des dates et des formats. `now` c'est le moment présent.

## Étape 5 - Carte de profil

Dans data.php créez une variable `$user` qui contiendra les clés suivantes : 
```php
[
    "name" => "Marie-Louise Bourreau",
    "job"=> "Développeuse / Photographe",
    "url"=> "https://images.unsplash.com/photo-1474978528675-4a50a4508dc3?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
]
```

Assurez-vous que le footer, ainsi que la page d'accueil utilisent ces variables au lieu des valeurs en dur dans le code html.

> **hint**: si vous remplacez le contenu de la clé name par votre nom, vous devriez voir votre nom partout sur le site : dans le footer, sur la page d'accueil,... 
## Étape 6 - Aller au bout

Comme dans l'étape 3, sortez les données de formations et de passion.

## Étape 7 - bonus
Dans cette partie l'objectif est de remplacer les données par des données qui vous sont propres : vos formations, vos loisirs, etc etc...
Si vous avez **parfaitement** fait tout le projet, vous devriez vous retrouver à modifier uniquement le fichier `data.php`
