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
function CMD(ARG1, ARG2, OPTS...)
```

---
### Syntaxe
```sh
$ CMD [--OPTS[=...]] [ARGS...]
```

--
Par exemple :

- une commande pour lister tous les fichiers dans un dossier
```shell
ls -a -l /home
```
--
commande : `ls`, arguments : `/home`, options : `a`, `l`
--


- une commande pour copier un dossier
```shell
cp -R folder1 folder2
```
--
commande : `cp`, arguments : `folder1`, `folder2`, options : `R`
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