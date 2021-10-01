---
title: 2. Docker Compose
---
Ce TP est la suite du [premier tp sur docker](../docker)

# Docker-compose

Docker-compose est une solution permettant d'orchestrer plusieurs conteneurs docker.

> Qu'est ce que docker-compose ?
> Quels sont les 4 principales informations contenues dans un fichier docker-compose ?
> Qu'est-ce qu'un orchestrateur?

Pour cet exemple, nous allons utiliser un fichier docker-compose.yaml pour lancer un service Nginx, avec PHP-FPM et une base de données MySQL pour faire tourner une application Symfony.

## Clone du projet

Pour commencer, on va cloner le projet suivant :
```
git clone https://gogs.h91.co/Courses/symfony-mini-blog.git
```
On va travailler uniquement dans ce dossier, donc ouvrir un terminal à cet endroit.

Modifier le fichier .gitignore pour retirer les 3 lignes suivantes : 
```
docker-compose.yml
Dockerfile
nginx.conf
```

Créer ensuite un projet sur github et changer la remote comme suit:
```
git remote set-url origin https://github.com/USERNAME/REPOSITORY.git
```
## Docker Compose 

### MySQL

Pour cette première étape, nous allons faire tourner un serveur MySQL.

Voici le squelette de docker-compose.yml :

```yaml
version: "3.4"
volumes:
  dbstorage: ~
services:
  database:
    image: mysql:8.0
    volumes:
          - dbstorage:/var/lib/mysql
    restart: always
    environment:
      - MYSQL_ROOT_PASSWORD=password
      - MYSQL_DATABASE=db
    ports:
      - 13306:3306
```

> Expliquez chaques parties du docker-compose.yaml
>

Pour démarrer le conteneur, executez la commande : 
```bash
docker-compose up
```
En utilisant phpstorm essayez d'accéder à la base de données.

> Comment se connecter à cette base de données ?

### PHPMyAdmin

*pour faciliter l'accès à la base de données on va ajouter un service phpmyadmin*

```yaml
phpmyadmin:
    image: phpmyadmin/phpmyadmin
    environment:
      - PMA_HOST=database
      - PMA_USER=root
      - PMA_PASSWORD=password
    ports:
      - 18080:80
```
Rendez-vous à l'adresse http://localhost:18080/

> Pourquoi ne faut-il pas deployer ce phpmyadmin en production ?
>

Arrêtez l'execution (Ctrl+C) et relancez la commande précédente en ajoutant l'argument `-d`.

La liste des commandes utiles pour docker : 
- `docker-compose up -d`
- `docker-compose down`
- `docker-compose up -d --force-recreate`
- `docker-compose stop database`
- `docker-compose ps`
- `docker-compose logs -f --tail=10 phpmyadmin`

> Définir ce que chaque commandes faits
> 

### PHP-FPM

L'image PHP que nous allons utiliser s'appelle [php fpm](https://www.php.net/manual/fr/install.fpm.php). Le problème de cette image c'est qu'elle vient sans aucune des extensions PHP de base, et pour cela, il va nous falloir créer notre propre image à partir de l'image PHP-FPM de base.

Créez un fichier nommé `Dockerfile` à la racine du projet :
```
FROM php:7.4-fpm

ADD https://getcomposer.org/download/1.10.22/composer.phar /usr/bin/composer

RUN chmod a+x /usr/bin/composer

RUN apt-get update && \
    apt-get install -y git libcurl3-dev libzip-dev

RUN docker-php-ext-install pdo pdo_mysql curl zip
WORKDIR /my_app
```
> Qu'est ce qu'un Dockerfile ? Que fait celui-ci?
> 
> Expliquez le principe d'héritage de docker.

Ajoutez maintenant le service `php` déclaré de cette manière
```
php:
  build: .
  volumes:
    - ./:/my_app
```

### Nginx

Pour Nginx on va reprendre la config de l'exercice précédent mais au format docker-compose.yml.

```
docker run  --rm -d -p 8081:80 -v $PWD/site:/usr/share/nginx/html/  --name mysite nginx:1.17
```
Voici la configuration de l'exercice d'avant : 
```
version: "3.4"
services:
  nginx:
    image: nginx:1.17
    container_name: mysite
    ports:
      - 8081:80
    volumes:
      - ./site:/usr/share/nginx/html/
```

à partir de maintenant, l'exercice consiste à transformer ce docker-compose pour l'adapter à notre exercice.

en premier temps créer un fichier `nginx.conf` avec le contenu suivant:
```conf
server {
    listen 80;
    root    /my_app/public;
    include /etc/nginx/default.d/*.conf;

    index index.php index.html index.htm;

    client_max_body_size 64m;
    charset utf-8;

    location / {
        try_files $uri /index.php$is_args$args;
    }
    error_page 404 /index.php;

    location ~ ^/index\.php(/|$) {
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
        include fastcgi_params;
        internal;
    }

    location ~ \.php$ {
        return 404;
    }
}
```

Voici les consignes:
- retirer le dossier `./site` du partage
- partager le fichier `./nginx.conf` avec le dossier ``/etc/nginx/conf.d/default.conf`
- partager le dossier public du projet avec le dossier `/my_app/public`
- remplacer le port exposé avec le port `80` du conteneur pour le port `18081`

## Configuration
Si tout fonctionne, il est possible de voir le site à la page : 
http://localhost:18081/

On va maintenant installer les dépendences du projet via docker.

Pour ça, on va executer la commande suivante : 
```
docker-compose exec php composer install
```
Cela va installer toutes les dépendences de composer. On va également executer les migrations de la même manière 
```
bin/console doctrine:migration:migrate
```

## Enfin

Si tout fonctionne, il est possible de voir le site à la page : 
http://localhost:18081 

Il est possible de tester cette manifique application de blog. 

## Pour aller plus loin

Voici quelques question pour pousser le sujet un peu plus loin
- Qu'est-ce que docker swarm ?
- Qu'est-ce que Kubernetes ? Quel lien avec Docker ?