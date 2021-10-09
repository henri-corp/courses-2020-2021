---
title: Installation
---
## Installer Docker

#### Installation - Linux
Le tutoriel suivant traite de l'installation de Docker sur Ubuntu mais pas de panique, les autres distributions sont détaillées sur le [site officiel de docker](https://docs.docker.com/engine/install/)

Les instructions suivantes se font via le terminal.
###### Désinstallez la version docker préinstallée
si votre OS contient une version pré-installée de Docker, supprimez la :

```bash
sudo apt-get remove docker docker-engine docker.io containerd runc
```

###### Installation de docker
commençons par installer les dépendances à docker :
```bash
sudo apt-get update
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg-agent \
    software-properties-common
```

Ensuite il faut ajouter la clé APT
```bash
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
```
confirmer avec "yes". Puis vient l'installation à proprement parler
```bash
sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io
```

#### Installation - MacOSX
Voici le lien de la documentation pour installer docker sur macOSX https://docs.docker.com/docker-for-mac/install/
#### Installation - Windows
pour cette partie, je vous invite à passer sur une machine virtuelle ubuntu, car en règle générale, Docker For Windows n'est pas compatible avec beaucoup d'outils de la communauté.

###### Utilisation de la Machine Virtuelle
Pour gagner du temps, voici une [archive de machine virtuelle sous lubuntu 18.04](https://static.d3cima.com/courses/vm/ubuntu.ova) avec tous les outils préinstallés.
- utilisateur : student
- mot de passe : student


#### Vérifier son installation
Dans un terminal tapez la commande suivante :
```bash
docker -v
```
Si tout se passe bien vous devriez voir quelque chose de semblable:
```bash
docker -v
Docker version 19.03.5, build 633a0ea838
```

## Installer docker-compose

#### MacOS X
Pas de procédure supplémentaire, il est installé avec la première étape.
Pour vérifier, ouvrir un terminal et executer la commande suivante :
```bash
docker-compose -v
``` 

#### Ubuntu
```bash
sudo curl -L "https://github.com/docker/compose/releases/download/1.25.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
```
Pour vérifier si tout est bien installé, ouvrir un terminal et executer la commande suivante :
```shell
docker-compose -v
``` 