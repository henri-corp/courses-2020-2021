---
title: "Les commandes"
description: "Syntaxe et instructions de base"
light: true
---

## Une commande c'est quoi ?

--

Une commande est une instruction exécutée par le système.

Cette instruction va lancer un programme.

--

### Syntaxe

```sh
$ CMD [--OPTS[=...]] [ARGS...]
```

--

- `CMD` : le programme que l'on veut exécuter --

- `OPT` : les options de la commande --

- `CMD` : les arguments de la commande

--

Une analogie avec la programmation :

```js
function CMD(ARG1, ARG2, OPTS

...)
```

---

### Syntaxe

```sh
$ CMD [--OPTS[=...]] [ARGS...]
```

-- Par exemple :

- une commande pour lister tous les fichiers dans un dossier

```shell
ls -a -l /home
```

-- commande : `ls`, arguments : `/home`, options : `a`, `l`
--

- une commande pour copier un dossier

```shell
cp -R folder1 folder2
```

-- commande : `cp`, arguments : `folder1`, `folder2`, options : `R`
--


---

## Les arguments

- Un argument est une valeur simple
- **L'ordre des arguments est important !**

```shell
cp source destination
```

Ici la commande `cp` permet de copier un fichier `source` vers une `destination`.

--

## Les options

- L'ordre des options n'est (généralement) pas important
  `ls -a -l` ➡ `ls -l -a`

- Les options peuvent être (généralement) groupées
  `-a -l` ➡ `-al`

- Les options peuvent être courtes (et donc groupées) ou non réduites
  `-v`  ➡ `--verbose`

- Peuvent avoir des valeurs
  `--format=JSON` / `-f JSON` (dans le 2ème cas, l'ordre devient important)

---
class: first-slide

# Les commandes à connaitre

Commandes de base

---
### `ls`
--

Affiche la liste des fichiers d'un dossier

Arguments :

- Le(s) dossier(s) à lister, **défaut:** le dossier courant

Options utiles :

* `-a`: affiche les fichiers masqués
* `-l`: affiche le détail des fichiers (permissions, propriétaire, groupe propriétaire, taille et date)
* `-h`: affiche la taille en mode `human readable`.

---
### `cd`
--

Change le dossier courant

Arguments :

- Le chemin du dossier vers lequel aller, **défaut:** le home directory


---
### `cp`
--

Copie le(s) fichier(s) vers un autre endroit

Arguments :

- Le chemin du fichier à copier
- Le chemin de destination

Options :

- `-r`: Copie de manière récusrive les dossiers

---
### `pwd`
--

Affiche le dossier courant

---
### `mv`
--

Déplace un(des) fichier(s) (également utilisé pour renommer un fichier)

Arguments :

- Le(s) chemin(s) du(des) fichier(s) à déplacer
- Le chemin de destination (Le dossier de destination si plusieurs fichiers sont à déplacer)

---
### `rm`
--

Supprime un(des) fichier(s)

Arguments :

- Le(s) chemin(s) de(s) fichier(s) à supprimer

Options :

- `-r`: Supprime de manière récursive les dossiers
- `-f`: Force la suppression sans demander confirmation

---
### `mkdir`
--

Créé un(des) dossier(s)

Arguments :

- Le(s) dossier(s) (ou chemin(s)) à créer

Options :

- `-p`: Créé les dossiers parents 

---
### `touch`
--

Change l'horodatage du(des) fichier(s). Est souvent utiliser pour créer un(des) fichiers

Arguments :

- Liste de(s) fichier(s) à mettre à jour/créer

---

class: first-slide

# Les commandes à connaitre

Commandes sur le texte

---
### `wc`
--

Affiche le nombre de lignes, de mots et de caractères dans le fichier

Arguments :

- Le(s) fichier(s) pour le(s)quel(s) on souhaite connaitre ces informations (Si plusieurs fichiers sont précisés, le total est renvoyé) 

---
### `cat`, `more` or `less`
--

- `cat` concatène le(s) fichier(s) passés en paramètre et renvoie le résultat 

- `more` affiche le contenu d'un (ou plusieurs) fichier(s) en permettant de scroller

- `less` is more

Arguments :

- Le(s) fichier(s) à afficher

---

### `head` & `tail`
--

Permet d'afficher les premières ou dernières lignes d'un fichier

Arguments :

- Le(s) fichier(s) à afficher

Option(s) : 

- `n`: Le nombre de lignes à afficher

---
# Éditeurs de texte

Les 3 éditeurs en lignes de commande les plus connus:
- nano : Éditeur de texte simple en lignes de commande 
    - `^X` : quitter
    - `^W` : rechercher
    - `Alt + U` : copier
    - [et quelques autres](https://www.nano-editor.org/dist/latest/cheatsheet.html)
- vim : Éditeur de texte avancé en lignes de commande
    - `i` : taper du texte 
    - `echap` : repasser en mode commande
    - `w` : sauvegarder
    - `q` : quitter
    - `wq` ou `x` ou `ZZ` : sauvegarder et quitter
    - [et plein d'autres](https://devhints.io/vim)
- emacs : Éditeur de texte avancé en lignes de commande avec possibilité d'avoir un GUI
    - `^X + ^C` : quitter
    - `Alt + W` : copier
    - `Ctrl + Y` : coller
    - [et plein d'autres](https://www.gnu.org/software/emacs/refcards/pdf/refcard.pdf)

---
