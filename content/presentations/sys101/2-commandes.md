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


---
### `cp`
--


---
### `pwd`
--


---
### `mv`
--


---
### `rm`
--


---
### `mkdir`
--


---
### `touch`
--


---

class: first-slide

# Les commandes à connaitre

Commandes sur le texte

---
### `wc`
--


---
### `cat`, `more` or `less`
--


---

### `head` & `tail`
--

---
# Éditeurs de texte

Les 3 éditeurs en lignes de commande les plus connus:
- nano 
- vim 
- emacs

// Décrire ici un peu chacuns

---
