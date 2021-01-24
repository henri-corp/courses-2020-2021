---
title: Intro
weight: 10001
show_previous: false
presentation: php101/1-intro
---

## PHP, c'est quoi ? 🐘

PHP (officiellement, ce sigle est un acronyme récursif pour PHP Hypertext Preprocessor) est un langage de scripts généraliste et Open Source, spécialement conçu pour le développement d'applications web. Il peut être intégré facilement au HTML.


**TOP !** mais... ça veut dire quoi 🤷 ? Un exemple :

Exemple #1 Exemple d'introduction
```phtml
<!DOCTYPE html>
<html>
  <head>
    <title>Exemple</title>
  </head>
  <body>
    <?php
      echo "Bonjour, je suis un script PHP !";
    ?>
  </body>
</html>
```

Les pages PHP contiennent des fragments HTML dont du code qui fait "quelque chose" (dans ce cas, il va afficher "Bonjour, je suis un script PHP !"). Le code PHP est inclus entre une balise de début `<?php` et une balise de fin `?>` qui permettent au serveur web de passer en mode PHP.

Ce qui distingue PHP des langages de script comme le Javascript, est que le code est exécuté sur le serveur, générant ainsi le HTML, qui sera ensuite envoyé au client. Le client ne reçoit que le résultat du script, sans aucun moyen d'avoir accès au code qui a produit ce résultat. Vous pouvez configurer votre serveur web afin qu'il analyse tous vos fichiers HTML comme des fichiers PHP. Ainsi, il n'y a aucun moyen de distinguer les pages qui sont produites dynamiquement des pages statiques.

---

## Pourquoi apprendre PHP ?

![](https://i.imgur.com/A33rnuM.png)

PHP est donc, d'après Internet, un langage en fin de vie . Alors pourquoi l'apprendre ?
{{< block "important" >}}
Aujourd'hui plus de 75% du web tourne sous PHP
{{< /block >}}
![PHP Can't die](https://i.imgur.com/rpOJpyWl.png)

### Qui l'utilise ?

- Facebook
- Wikipedia
- Baidu (Google chinois = 189M utilisateurs/jour)
- ...

![Facebook, Wikipedia and others...](https://i.imgur.com/KhtFCaz.png)

---

## Un peu d'histoire

PHP a été créé en 1994 👶 par Rasmus Lerdorf pour son site web. À l'époque, faire du web c'était utiliser du C pour générer de l'HTML. Rasmus voulait faire un langage simple pour faire un site web, basé sur le C. en 1995, il le rend Open-Source. Le projet grossit avec une gestion de la base de données.

En 1998, sort PHP 3.0, Zeev Suraski et Andi Gutmans réécrivent entièrement la base du langage. En 1998 apparait également la mascotte php, l'**Elephpant**.
![](https://i.imgur.com/S3PocCb.png)

En 2000 sort la version 4.0, avec le Zend Engine (**Ze**ev & A**nd**i), Le moteur traite le code en deux temps : il analyse puis l'execute.

En 2004 la version 5.0 de PHP avec un nouveau modèle objet. en même temps, le développement de PHP 6 commence, qui avait pour objectif d'ajouter le support unicode (pouvoir coder avec des emoji 🤷🏻‍♀️).

Entre 2008 et 2012,  Facebook développe sa propre version de PHP baptisée [HackLang](https://hacklang.org/) pour ajouter des fonctionnalités manquantes, et gagner en performances.

En 2010, PHP 6 est totalement abandonné ⚰️ 🪦, car les performances de l'unicode ne sont pas au rendez-vous.

PHP 5.6 sort en 2014, ce qui marque la dernière version 5 de PHP, avec des correctifs jusqu'en 2018.

En 2015 sort PHP 7, avec une réécriture du système, et des performances incomparable avec les autres versions.

[![](https://i.imgur.com/O1FkDeR.png)](https://www.commitstrip.com/fr/2015/05/26/php-7-twice-faster-than-php-5/)

Puis très rapidement :
- PHP 7.2 (2017)
- PHP 7.3 (2018)
- PHP 7.4 (novembre 2019)

{{< block "important" >}}
PHP 8.0 est sorti le 26 Novembre 2020. Ce cours sera basé sur cette version.
{{< /block >}}
