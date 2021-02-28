---
title: 1. Docker 
---
 


L'objectif de cette scéance est de vous faire découvrir Docker et comment l'utiliser pour déployer un projet Symfony

> Les blocs de commentaires sont réservés à des question à répondre.

# Concepts

Pour cette première partie, il va falloir définir les différents concepts : 

1. LXC, c'est quoi ?
2. Docker, c'est quoi ?
3. Qu'est-ce qu'un container ?
4. Quelle est la différence entre une Image et un Container ?

# Hello container

Pour la premère étape on va lancer un Container qui va afficher Hello World.

```
sudo docker run hello-world
```

Si tout se passe bien, il affiche le contenu suivant:
```sh
Unable to find image 'hello-world:latest' locally
latest: Pulling from library/hello-world
1b930d010525: Pull complete 
Digest: sha256:f9dfddf63636d84ef479d645ab5885156ae030f611a56f3a7ac7f2fdd86d7e4e
Status: Downloaded newer image for hello-world:latest

Hello from Docker!
This message shows that your installation appears to be working correctly.
...
```

Plusieurs étapes sont importantes dans ce process : 

```sh
Unable to find image 'hello-world:latest' locally
```
Docker n'a pas trouvé d'image locale appelée `hello-world:latest`.
> À quoi correspond le `:latest` du nom de l'image ?

```sh
latest: Pulling from library/hello-world
1b930d010525: Pull complete 
Digest: sha256:f9dfddf63636d84ef479d645ab5885156ae030f611a56f3a7ac7f2fdd86d7e4e
Status: Downloaded newer image for hello-world:latest
```
> Qu'est ce qu'un Digest ?

```raw
Hello from Docker!
This message shows that your installation appears to be working correctly.
...
```
Pour voir les containers qui tournent actuellement, vous pouvez faire
```shell
sudo docker ps
# alias de
sudo docker container ls
```
> Pourquoi ne voit-on pas notre container ?


Pour voir la totalité des containers créés sur la machine, lancez la commande suivante:
```sh
sudo docker ps -a
```
Vous devriez voir le contenu suivant:
```sh
CONTAINER ID        IMAGE                       COMMAND                  CREATED             STATUS                     PORTS       NAMES
40c279dd8e71        hello-world                 "/hello"                 9 minutes ago       Exited (0) 9 minutes ago               keen_chaplygin
```
Le résultat de cette commande indique plusieurs choses : 
- CONTAINER ID: identifiant de conteneur unique
- IMAGE: l'image utilisée
- COMMAND: la commande lancée dans le conteneur
- CREATED: la date de création
- STATUS: l'état du conteneur
- PORTS: les ports exposés (ici rien)
- NAMES: les noms donnés au conteneur (par défaut ce nom est aléatoire)


Nous allons lancer de nouveau un container mais cette fois en lui spécifiant un nom : 

```sh
sudo docker run --name hello hello-world
```
retournez voir la liste de tous les conteneurs et le "name" à changé.

> Que se passe-t-il si j'essaie de réexecuter la même commande une seconde fois ? Pourquoi ?


# Hello nginx

## Pull de l'image

pour la suite de ce TP, on va avoir besoin de télécharger l'image nginx. Pour changer, executez la commande suivante: 

```
docker pull nginx:1.17
```

Pour voir les images téléchargées sur la machine, vous pouvez éxecuter la commande : 
```bash
sudo docker images
# alias de 
sudo docker image ls
```

De la même manière que `docker container ls` on retrouve une liste d'images docker
```
REPOSITORY                                            TAG                   IMAGE ID            CREATED             SIZE
nginx                                                 1.17                  ed21b7a8aee9        13 days ago         127MB
hello-world                                           latest                fce289e99eb9        15 months ago       1.84kB
```
Avec les champs suivants :
- REPOSITORY: le nom de l'image
- TAG: son tag/version
- IMAGE ID: son identifiant unique
- CREATED: sa date de création

> Tooltip: `sudo -s` pour éviter d'avoir à préfixer toutes ses commandes par `sudo` 

À partir de ce moment, on va créer plusieurs instances nginx.

## Container Nginx
lancez la commande suivante
```shell
docker run -d --name mysite nginx:1.17
```
un nouvel argument a été ajouté : 
- `-d` : en mode détaché

> Qu'est ce que le mode détaché?

en affichant la liste des containers qui tournent, on obtient les informations suivantes:
```bash
# docker ps                                  
CONTAINER ID        IMAGE               COMMAND                  CREATED             STATUS              PORTS               NAMES
1fe32a24c152        nginx:1.17          "nginx -g 'daemon of…"   3 seconds ago       Up 2 seconds        80/tcp              mysite
```

On va arrêter le container en faisant la commande suivante : 
```bash
docker stop mysite
```

> En faisant la commande `docker ps` on ne voit plus le container, mais avec l'argument `-a` on le retrouve en status éteint.

On va également le supprimer en faisant:
```
docker rm mysite
```
Le container n'existe plus.

Pour gagner du temps, on va rajouter l'option `--rm` qui va supprimer automatiquement le container dès qu'il est arrêté :
```
docker run --rm -d --name mysite nginx:1.17
```


 ### Accéder au container via l'adresse IP
*:warning: n'ayant pas de mac, je n'ai pas pu tester cette partie.*

Pour pouvoir accéder au container, il faut récupérer son adresse IP pour ça on va inspecter le container:
```bash
docker container inspect mysite
```
Cela va sortir toutes les informations au sujet du container.
> Quelles sont les informations qui sont renvoyées lorsqu'on inspecte le conteneur? 

La partie du json qui nous interesse est la clé `NetworkSettings.Networks.bridge.IPAddress`.
> Tooltip: la commande `docker inspect mysite -f "{{.NetworkSettings.Networks.bridge.IPAddress}}"` permet de gagner du temps :-)

Dans votre navigateur allez à l'adresse IP indiquée. Si tout se passe bien, vous aurez la page suivante :

![](https://i.imgur.com/YU6F7Li.png)

C'est la seule fois dans tout ce TP que vous allez utiliser l'adresse IP d'un container directement !

### Accéder au container via l'adresse IP locale

On va arrêter et supprimer le container précédent.
On va ajouter l'argument `-P` (P majuscule) à la commande comme suit: 
```bash
docker run --rm -d -P --name mysite nginx:1.17
```
on optient quelque chose de ce genre : 
```bash
# docker ps                                
CONTAINER ID        IMAGE               COMMAND                  CREATED             STATUS              PORTS                   NAMES
10b5fc5ddefe        nginx:1.17          "nginx -g 'daemon of…"   3 seconds ago       Up 2 seconds        0.0.0.0:32769->80/tcp   mysite
```
L'information importante est l'information renseignée par le port, ici `32769`.
Cela permet d'aller directement sur l'adresse http://localhost:32769 et d'obtenir le même résultat.

#### En spécifiant le port cette fois

On va arrêter et supprimer le container précédent.
On souhaite définir nous même le port d'execution, pour cela on va modifier l'instruction `-P` par `-p 8081:80`

```bash
docker run --rm -d -p 8081:80 --name mysite nginx:1.17
```

rendez-vous maintenant sur l'adresse http://localhost:8081

> Quelle est la différence entre -P et -p ?


### Custom web page

On va maintenant déployer une page HTML de notre choix avec Docker

Créez un dossier dans un répertoire de votre ordinateur et allez dans le dossier avec votre terminal.

Exécutez la commande suivante: 
```
mkdir -p $PWD/site && echo '<h1>hello World</h1>' > $PWD/site/index.html
```
Cette commande va créer un sous-dossier `site` dans le répertoire courant avec un fichier index.html.

> Tooltip: $PWD - variable d'environnement du dossier courant
>
> Pour tester `echo $PWD`
> 

À partir de maintenant, on va modifier la commande de lancement du Container pour partager le dossier `site`  avec le dossier `/usr/share/nginx/html/`

```bash
docker run  --rm -d -p 8081:80 -v $PWD/site:/usr/share/nginx/html/  --name mysite nginx:1.17
```
retournez sur http://localhost:8081