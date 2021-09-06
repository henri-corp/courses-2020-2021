---
title: TP2 - Hackerman
weight: 11
---

> Ce projet à pour objectif de manipuler des commandes du système au travers d'un exercice "ludique"
> Travail à rendre
>   - Effectuer un glossaire des commandes linux que vous tapez
>   - Ce glossaire sera évalué
>   - Ce glossaire sera un mémo de toutes les commandes linux
>   - Le format attendu pour le glossaire est libre (de préférence un format markdown)
## Mise en place du TP

Récupérez le fichier [tp2.ova](/media/tp2.ova) et ouvrez le fichier .ova avec virtualBox.



## Hackerman
![](https://media.giphy.com/media/MM0Jrc8BHKx3y/giphy.gif)

L'objectif de votre mission :

{{< hint info >}}
Trouver le mot de passe du site <a href="https://hackers.h91.co/" target="blank">hackers.h91.co</a>
{{< /hint >}}

Pour cela, nous avons réussi à mettre en place un espion sur la machine : 

```
username : hackerman
password : H4cK
```
Cet utilisateur fait partie des "sudoers" - le groupe des administrateurs de la machine.

Par ailleurs, nous avons réussi à mettre en place des malwares sur la machine, capables de récupérer les 5 composantes du mot de passe.
Nous les avons appelés : **les 5 clés**. 
Chaque clé, mises bout à bout nous donnera le mot de passe du site hackers.h91.co.

Nous avons laissé ces scripts dans un dossier de votre `home directory`.


## Clé 1 : Retrouver les executables
> **Aide :**
> quelques commandes utiles : `ls`, `cd`, `man`

Pour commencer, il faut retrouver les scripts laissé dans le `home directory` aussi connu sous le nom de `~`.
Rendez-vous dans ce dossier.

> Que contient le dossier ?

Pour lancer l'exécution d'un fichier `test`, il faut lancer la commande : 
```shell
$ ./test
$ ./test ARGUMENT1 ARGUMENT2 ARGUMENT3...
```

Pour récupérer la première clé il faudra lancer l'exécution du fichier `KEY_1`. La même chose sera à faire pour les clés suivantes.

## Clé 2 : Créer des fichiers
> **Aide :**
> Quelques commandes utiles : `nano`, `mkdir`, `man`, `echo` `>`

Pour la seconde clé, nous allons devoir injecter des fichiers du système, pour cela, il faudra créer un dossier `/security`
et à l'intérieur, créer 2 fichiers : `1` et `2` qui auront respectivement comme contenu `1110 1011` et `0011 1001`

> Chaque groupe de 4 chiffres peut être représentée sous la forme Hexadécimale ce qui donne `EB` et `39`.
> En décimales ces nombres sont `14 11 3 9`
> 

Une fois cela fait, lancez le script `KEY_2`

## Clé 3 : Comptage
> **Aide :**
> Quelques commandes utiles : `rm`, `ls`, `cd`, `wc`, `man`

{{< hint danger >}}
Nous avons été repérés ! VITE il faut aller supprimer le dossier `security` créé précédemment !
{{< /hint >}}
Nous avons repéré un fichier louche dans le dossier `/etc`. Il s'appellerait `scp-871.md` ! Il semblerait que pour récupérer la clé 3, il faut trouver le nombre de lettres dans le fichier.
Une fois qu'on aura le nombre de lettres, on pourra passer ce nombre en argument du script `KEY_3` et cela devrait ouvrir la clé.


## Clé 4 : ça se complique

> **Aide :**
> Quelques commandes utiles : `ping`, `chmod`,`ls`, `man`

L'ennemi est malin ! Il a caché des informations sur un autre ordinateur mais on ne connait pas son adresse ip.

Nous devons récupérer son adresse IP ! Nous devons vérifier que l'ordinateur est également allumé : pour ça, il faut essayer de contacter
l'ordinateur derrière le nom de domaine `security.fr`.

La clé 4 sera donnée grace au script qui ira se connecter à l'adresse ip directement.

Nous avons un autre problème : Quelqu'un a corrompu notre script ! Il faut qu'on trouve un moyen de le rendre de nouveau **exécutable**.
Une fois cela fait, nous pourrons passer l'IP en argument de `KEY_4`

## Clé 5 : Faille sur le site
> **Aide :**
> Quelques commandes utiles : `apt-get`, `curl`,`man`

Nos ingénieurs essaient toujours d'accéder au site en parallèle, et l'un deux à trouver une faille : une url qui semblerait être publique.
Cette url est [hackers.h91.co/last-key](https://hackers.h91.co/last-key) mais personne n'arrive à accéder au système.
un message étrange nous est parvenu :
```text
You're not CURL.
```
> Qu'est-ce que CURL?

Il faut trouver une solution ! Cette page doit certainement renvoyer l'argument à passer au script `KEY_5` et récupérer le dernier bout du mot de passe.


## Conclusion

Maintenant qu'on toutes les clés, vite, il faut se connecter au site !


