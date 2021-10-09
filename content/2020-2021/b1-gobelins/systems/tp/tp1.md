---
title: TP1 - Installation d'une machine virtuelle
weight: 10
---
> **Objectif du TP** :
> - Apprendre les commandes de bases de linux
    >
- navigation dans les dossiers : ls, cd,...
>   - lire un fichier : cat, more
>
> **Programme** :
> - naviguer dans le système et lancer un terminal
>
> **Rendu** :
> - Répondre aux questions mise en commentaire au format qui vous semble le plus adapté :
    >
- markdown ? doc ? google doc ? fichier texte ?
>   - classeur excel ?
      > Le document devra être envoyé par email.

## Travail de recherche préparatoire

Cette partie concerne des questions auxquelles vous devez répondre avant d'attaquer le travail.
> Qu'est ce qu'un système d'exploitation ?
> Qu'est ce que Ubuntu ?
> Pourquoi avoir choisi ubuntu pour ce cours ?

Pour les besoins du cours, il a été mis à disposition des machines ubuntu en SSH.
> Qu'est ce que SSH ?


Pour accéder à la machine il faut ouvrir un terminal et taper la commande suivante :

```shell
ssh ubuntu@VOTREPRENOM.tp1.henri.run
```

> Qu'est-ce que "ubuntu" dans la ligne de commande saisie précédemment ?

le message suivant doit s'afficher :

```text
The authenticity of host 'VOTREPRENOM.tp1.henri.run (1.2.3.4)' can't be established.
ECDSA key fingerprint is SHA256:adjwEA8qrkxYRniJKq8XmKoQtkmAuwMBoNMHUviAgoM.
Are you sure you want to continue connecting (yes/no/[fingerprint])? 
```

> Pourquoi ce message s'affiche-t-il ?
>
> Qu'est-ce que `1.2.3.4` ?
>
> Quelle est la réponse appropriée à ce message ?

Le mot de passe à saisir est : `n3rt4sRs`

> Le mot de passe ne s'affiche pas quand il est saisit : pourquoi ?

Puis appuyer sur Entrée.

## Welcome to Ubuntu 20.04

Dès lors que vous êtes connectés, voici ce qui apparait :

```
Welcome to Ubuntu 20.04.1 LTS (GNU/Linux 5.4.0-1026-kvm x86_64)
* Documentation:  https://help.ubuntu.com
* Management:     https://landscape.canonical.com
* Support:        https://ubuntu.com/advantage
```

L'information importante de cette partie est :

```
Welcome to Ubuntu 20.04.1 LTS (GNU/Linux 5.4.0-1026-kvm x86_64)
```

> Quelle est la différence entre le 20.04.1 et le 5.4.0-1026-kvm ?

### Les informations systèmes

```
System information as of Mon Jan 25 23:26:06 UTC 2021

System load:  0.01              Processes:             82
Usage of /:   7.5% of 17.88GB   Users logged in:       0
Memory usage: 7%                IPv4 address for ens2: 1.2.3.4
Swap usage:   0%                IPv6 address for ens2: aaaa.bbbb.cccc.dddd::1
```

> - Qu'est-ce que le SWAP ?
> - Que représentent `/` dans le `Usage of /` ?
> - Qu'est-ce que sont les processus ?
> - Qu'est-ce qu'une IPv4? et une IPv6 ?
>

### Informations de mises à jour

```
14 updates can be installed immediately.
6 of these updates are security updates.
To see these additional updates run: apt list --upgradable

The list of available updates is more than a week old.
To check for new updates run: sudo apt update
```

### Prompt

```
Last login: Mon Jan 25 20:13:40 2021 from 4.3.2.1
ubuntu@b1-tp1-USERNAME:~$ 
```

Vous êtes prêts à taper des commandes.

![](https://media.giphy.com/media/YQitE4YNQNahy/giphy-downsized-large.gif)

## Les commandes utiles

L'objectif de ce TP est de découvrir et se préparer un lexique des commandes que vous pouvez saisir. On va détailler
chaque étape après, mais voici le planning :

- Découvrir le manuel
- Naviguer dans le dossier `/var`
- Créer un dossier `learning` dans var
- Écrire dans un fichier `cours-1` (sans extension)

### Découverte du manuel

Le manuel linux est un manuel accessible en ligne de commande :

```shell
man <commande>
```

Par exemple, vous voulez en savoir plus sur la première commande saisie :

```shell
man ssh
```
> *Q pour quitter, les flèches pour naviguer.*

Il existe une page de manuel pour **toutes** les commandes, même `man`.

> - Quelles informations trouve-t-on généralement dans le manuel

### Naviguer dans le système

Avant de commencer il faut définir plusieurs notions :
> - root dir (`/`)
> - home dir (`~`)
> - parent dir (`..`)
> - working dir (`.`)

>  qui est root ?
>

> Que font les commandes suivantes ?
> - `pwd`
> - `cd`
> - `ls`
> - `mkdir`
> - `sudo`
>
> **tooltip: pensez à la commande `man`**


Pour commencer, on va simplement afficher le chemin courant. On va remonter dans le dossier parent,
récupérer de nouveau son chemin puis remonter de nouveau dans le dossier parent.

L'objectif après est de récupérer le contenu du dossier courant, ainsi que son chemin. Puis se rendre dans `/var`.

Enfin, on va créer le dossier `learning` et entrer dedans.

### Écrire dans un fichier

> Que font les commandes suivantes ?
> - `nano`
> - `touch`
> - `mv`
> - `cp`
> - `rm`
>
> n.b. `^C` signifie `ctrl` + `c`

Pour écrire le fichier `COURT-1` on va commencer par créer un fichier vide. Puis l'ouvrir avec l'éditeur de texte en
ligne de commande. Ajouter un petit texte qui donnera votre avis sur le cours puis fermez le fichier.

> Comment enregistrer le fichier ?

Renommez le fichier `COURT-1` en `COURS-1`.

Retournez rapidement (pas plus de 4 caractères la commande) dans le dossier de départ

> Quelle est l'instruction à renseigner pour retourner rapidement dans le dossier de départ ?

Effectuez une copie du dossier `/var/learning` dans un sous-dossier `cours` du dossier de base.
Supprimez enfin le dossier contenu `learning` de `/var` sans changer de dossier.

## Aller plus loin

> Qu'est-ce que apt-get ?
>
On va installer le paquet `cmatrix`.

Une fois qu'il sera installé, lancez la commande `cmatrix`.
Pour quitter la commande, faite un `^C`

> Qu'est ce que `^C`
