---
title: TP3 - Git
weight: 12
---
> L'objectif de ce TP : découvrir Git et les commandes de base - sans utiliser d'interfaces gratuites.
> 
> Toutes les commandes git peuvent être ajoutées au mémo à réaliser. Il y a des questions auxquelles il faut répondre également.
> 

### Un peu de recherche préparatoire
Nous allons utiliser la commande git sur votre ordinateur.
À l'aide de la [documentation](http://git-scm.com/docs) de git, explorez les différentes commandes possibles avec GIT.

[Ma petite cheatsheet](/resources/github-git-cheat-sheet.pdf)

## Partie 1 : Premières commandes

Le but de cette partie est de prendre en main l'outil git en local.

### Création du projet

On va créer un dossier qui contiendra "README.md" dans un dossier nommé `gitProfile` à l'emplacement de votre choix.

Ce fichier contiendra le contenu **EXACT** suivant (on le modifiera plus tard) : 
```markdown
# Prénom NOM

Étudiant en première année BDDI à l'école-by-CCI en partenariat avec les Gobelins Paris,
Je recherche un stage puis une alternance qui me permettront d'appliquer tout ce que j'ai appris 
au cours de ma première année !
## Mon expérience
<!-- on détaillera plus tard-->
## Mes études
- Bachelor BDDI - 2020-2023
<!-- on détaillera plus tard-->
## Mes hobbies
J'aime le chocolat.
```

## Initial commit

> faire un `ls -al`

On va commencer par initialiser un projet GIT. 

> Trouver la commande git qui permet d'initialiser un projet Git local à partir du workdir.
> faire un `ls -al` qu'est ce qui a changé dans le dossier ?
> Que contient le dossier `.git` ? 
>

Regardons ensemble le status de git

> Trouver la commande git qui permet de connaitre le status du projet.
> 
> Pourquoi le fichier README.md est dans les Untracked files
> 
> Quelles sont les 5 espaces 
```gitlog
On branch master
No commits yet
Untracked files:
  (use "git add <file>..." to include in what will be committed)
	README.md
nothing added to commit but untracked files present (use "git add" to track)
```

Ajouter le fichier `README.md` à l'index.

![img.png](../git-stages.png)
> Expliquez les différents "espaces" ou "zones" d'un projet Git et leur but.
>
> [une super cheatsheet](http://ndpsoftware.com/git-cheatsheet.html)

> Quel est le status actuel du fichier après l'avoir ajouté ?

```gitlog
On branch master
No commits yet
Changes to be committed:
  (use "git rm --cached <file>..." to unstage)
	new file:   README.md
```

On va enfin terminer par effectuer un commit avec le message suivant : 
`Initial commit`

> Quel est le status actuel après avoir effectué le  commit ?

### Logs
Il est temps de regarder les logs de commit.

> Quelle commande doit-on utiliser pour récupérer les logs de git ? 

```gitlog
commit 8f221ef000000000000000000000000 (HEAD -> master)
Author: decima <h.larget@gmail.com>
Date:   Sun Jan 31 14:22:10 2021 +0100
    Initial commit
```

**Astuce** : la commande log a plusieurs options utiles : `graph`, `oneline` et `all`.

> Que font ces options ? 

### Modifier le projet

Pour cette étape, on va modifier le fichier `README.md`, en remplaçant "Prénom NOM" par :
```
Prénom: votrePrénom, NOM: votreNom
```
avec les vraies valeurs cette fois.

> Quel est le status actuel ?

Il existe une commande permettant d'afficher toutes les différences effectuées dans un fichier.

> Quelle est cette commande ? 
>
> Que signifient les + et - au début de chaque lignes ?
>

Normalement, il n'y a que 2 lignes colorées : 
```diff
-# Prénom NOM
+# Prénom: Henri, NOM: LARGET
```

Refaire toutes les étapes d'avant avec comme message de commit : 
`Fixed: Missing first and lastname`

Une fois cela fait, on peut retourner voir les logs et on constate la chose suivante : 
```gitlog
* 3d11e43 (HEAD -> master) Fixed: Missing first and lastname
* 8f221ef Initial commit
```
## Partie 2 : Versioning Branches et merge

On se rend compte aujourd'hui que nous n'avions pas compris le premier exercice qui consistait à remplacer directement son prénom et son nom.

Pour cela, on va se mettre sur le commit précédent.

> Trouvez la commande qui permet de retourner sur un commit par son identifiant
>
> Qu'est-ce que `HEAD` ? Que signifie `HEAD~1` ?

Si tout se passe bien, vous devez avoir le résultat du log suivant : 
```gitlog
* 3d11e43 (master) Fixed: Missing first and lastname
* 8f221ef (HEAD) initial commit
```

Regarder le fichier `README.md`. Qu'est-ce qui a changé ? 

> Comment retourner sur "master" ? 

Assurez-vous d'être sur le commit "initial commit".

Mettez à jour le fichier en remplaçant 
`# Prénom NOM` par vos vrais prénoms et noms cette fois.

Et commitez le changement comme vu dans la partie 1, avec comme message `fix: my first and last name`

le log devrait vous donner quelque chose comme ça : 
```gitlog
* be75bb5 (HEAD) fix: my first and last name
| * 808a721 (master) fix: firstname and lastname
|/  
* 8f221ef initial commit
```

Avant de perdre ce commit, il faut l'associer à une branche.

> Qu'est-ce qu'une branche dans Git ? 
> 

Créez une branche à partir du commit courant qui s'appellera `fix-name`.

Une fois cela fait, ajoutez à la fin du fichier readme :

```© prénom NOM - 2021```

Avec votre nom et prénom. 

Le commit s'appellera `adding copyright`

l'arbre devrait ressembler à
```gitlog
* ed11102 (HEAD -> fix-name) adding copyright
* be75bb5 fix: my first and last name
| * 808a721 (master) fix: firstname and lastname
|/  
* 8f221ef initial commit
```

### Merge

On va retourner sur master. 


> Qu'est ce qu'un merge dans Git ?

Une fois cela fait, on va fusionner le travail de la branche `fix-name` dans `master` avec la commande merge.

```shell
git merge fix-name
```

> Que se passe-t-il ?

```gitlog
CONFLICT (content): Merge conflict in README.md
Automatic merge failed; fix conflicts and then commit the result.
```

Allons voir le fichier : 
```markdown
<<<<<<< HEAD
## Prénom: Henri, NOM: LARGET
=======
## Henri LARGET
>>>>>>> fix-name
```

Un conflit est survenu dans le fichier. Pour le fixer, il faut décider de quelle version on souhaite conserver
et quelle version on souhaite supprimer.


Chaque version est séparée par un `=====` et commence par `<<<<<` et `>>>>>`.

> Pourquoi prendre le temps de résoudre ce conflit ? 


Résoudre le conflit de manière **judicieuse** en ne conservant que ce que vous souhaitez conserver, et supprimez le reste du fichier.

Il faut ensuite effectuer un commit, comme précédemment ```merge commit : fix conflict```

Enfin on va supprimer la branche `fix-name`.

```gitlog
*   c84c38f (HEAD -> master) merge commit : fix conflict
|\  
| * ed11102 adding copyright
| * be75bb5 fix: my first and last name
* | 808a721 fix: firstname and lastname
|/  
* 8f221ef initial commit
```



## Partie 3 : Clone et remote

Pour continuer le tp il faut lancer dans le dossier gitProfile la commande 
```shell
git config receive.denyCurrentBranch ignore
```

Pour cette partie, on va retourner dans le dossier parent du dossier dans lequel vous vous trouvez
et créer un clone du projet avec la commande :
```shell
git clone gitProfile gitProfileCopy
```
> Que s'est-il passé ? 
> Que contient maintenant le dossier parent ? 

On va retourner dans le dossier `gitProfile` et créer une nouvelle branche `hobbies`.

Sur cette branche, on va modifier le fichier README pour modifier la section "hobbies" du document et effectuer un commit.

```gitlog
* 5523194 (HEAD -> hobbies) adding my hobbies
*   c84c38f (master) merge commit : fix conflict
|\  
| * ed11102 adding copyright
| * be75bb5 fix: my first and last name
* | 808a721 fix: firstname and lastname
|/  
* 8f221ef initial commit
```
On va maintenant changer de dossier et aller dans `../gitProfile/gitProfileCopy` et regarder le fichier README.md
> le fichier a-t-il changé ? 
> Sur quelle branche sommes-nous ? 

On va mettre à jour ce projet avec l'autre puis aller sur la branche `hobbies`.
> Trouver la commande qui permet de récupérer les modifications d'un git distant dans un clone.

```gitlog
* 5523194 (HEAD -> hobbies, origin/hobbies) adding my hobbies
*   c84c38f (origin/master, origin/HEAD, master) merge commit : fix conflict
|\  
| * ed11102 adding copyright
| * be75bb5 fix: my first and last name
* | 808a721 fix: firstname and lastname
|/  
* 8f221ef initial commit
```

> Qu'est-ce que `origin` ? 

La section `hobbies` est une mauvaise traduction, modifions le texte pour `Loisirs`.
Une fois cela fait, il ne faut pas oublier de commit ses changements.
```gitlog
* 11bc614 (HEAD -> hobbies) fix: hobbies to loisirs
* 5523194 (origin/hobbies) adding my hobbies
*   c84c38f (origin/master, origin/HEAD, master) merge commit : fix conflict
|\  
| * ed11102 adding copyright
| * be75bb5 fix: my first and last name
* | 808a721 fix: firstname and lastname
|/  
* 8f221ef initial commit
```
Mettez à jour le projet gitProfile à partir de gitProfileCopy.
> Trouvez la commande qui permet d'envoyer ses commits vers la source.

On va maintenant supprimer le dossier gitProfileCopy.

> A-t-on toujours accès à l'autre projet et ses modifications ?

## Partie 4 : Github

Avant de parler Github, on va fusionner la branche `hobbies` dans master, créer une branche `dev` et travailler dessus.

Ajoutez également une image dans le projet, et mettez-en une référence dans le fichier README.md.


> Présentez votre fichier final au prof ! 


Créez un compte Github. Attention, votre compte vous suit partout, alors on évite
les `petiteFleureDu74` ou `MerciJackyEtMichel`, mais on peut se permettre de mettre un pseudonyme
dans la limite du _raisonnable_.

Pour la suite du TP, on va parler de ce pseudo comme `votrePseudo`.

Maintenant, allez sur github et créer un projet qui s'appellera `votrePseudo`. L'objectif, à partir du projet actuel, de le mettre sur votre github.

Une fois cela fait, allez sur github.com/votrePseudo. Que voyez vous ?

### Aspect Social
Allez voir les profils de personnes, et suivez-les. Voici une liste de profils intéressants :
- decima
- AlbanCrepel
- DamienDabernat

Si vous avez apprécié mon cours, vous pouvez également mettre une petite étoile sur le projet : `henri-corp/courses-2020-2021`




