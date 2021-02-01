---
title: 1 - Installation et Prérequis
weight: 10001
---

La seule chose qui sera requise pour cette partie du cours sera PHP 8 installé sur votre machine.
## La solution "universelle"
[XAMPP](https://www.apachefriends.org/download.html) est la solution "clé en main" pour tous les systèmes.


## Linux 🐧

### Ubuntu (avec APT)

Il faut dabord ajouter le [PPA PHP de Ondrej Sury](https://deb.sury.org/), le PPA le plus maintenu à jour avec PHP.
```
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
```

Une fois les bibliothèques mises à jour, il ne reste plus qu'à installer php :
```
sudo apt-get install php8.0-common php8.0-cli
```



## Mac OSX 🍏

Le plus simple pour installer PHP 8 sur Mac OSX est d'installer d'abord [Homebrew](https://brew.sh/index_fr).

Une fois installé, lancez la commande dans le terminal :
```
brew install php
```

## Windows 🤮

### Via XAMPP (simple)

[XAMPP](https://www.apachefriends.org/fr/download.html) est une suite logicielle qui intègre Apache, MariaDB et PHP (et Perl). Cette solution intègre un Système de Gestion de Base de Données populaire (MariaDB), Un serveur Web (Apache) et l'executable PHP. Pour ce cours, il n'est pas nécessaire d'avoir toute la suite logicielle, il suffit juste d'avoir PHP, mais on peut gagner un peu de temps en installant MySQL avec.

### PHP seul (recommandé) 👍

Téléchargez l'archive ZIP de la version correspondant à votre système d'exploitation sur [windows.php.net](https://windows.php.net/download/)
(très probablement la version PHP 8 x64 Thread Safe [ici](https://windows.php.net/downloads/releases/php-8.0.0-Win32-vs16-x64.zip)).

Désarchivez le dossier à la racine de votre disque C:/ dans un dossier PHP. Le dossier C:/PHP doit contenir pleins de fichiers et notamment un fichier `php.exe`.

Il faut ensuite mettre à jour la variable d'environnement PATH à jour :
- Dans Rechercher, lancez une recherche et sélectionnez : Système (Panneau de configuration)
- Cliquez sur le lien Paramètres système avancés.
- Cliquez sur Variables d'environnement. Dans la section Variables système recherchez la variable d'environnement PATH et sélectionnez-la. Cliquez sur Modifier. Si la variable d'environnement PATH n'existe pas, cliquez sur Nouvelle.
- Dans la fenêtre Modifier la variable système (ou Nouvelle variable système), indiquez la valeur de la variable d'environnement PATH vers C:/PHP. Cliquez sur OK. Fermez toutes les fenêtres restantes en cliquant sur OK.

### Via Chocolatey (OK-tier) 🍫

Installez [Chocolatey](https://chocolatey.org/) puis lancez la commande d'installation du [packet PHP](https://chocolatey.org/packages/php) suivante dans l'invite de commande:
```
choco install php
```

## ENFIN....
Si tout se passe bien, ouvrez votre invite de commande/terminal et saisissez la commande suivante :
```
php -v
```
