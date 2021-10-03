---
title: "4 - Elasticsearch"
imagetitle: ../es.svg
light: true
type: presentations
weight: 2021022104
---


<div style="display: flex; align-content: center; justify-content: center; margin-bottom: 10px;">
<img src="../es.svg" style="width:200px;"/>
</div>

Elasticsearch (2011) est une base de données No-SQL orienté Document, mais c'est avant tout un moteur d'`indexation` et de recherche basé sur Apache Lucene (1999).

Elasticsearch offre des fonctionnalités de recherche `full-text` avec une interface `HTTP` et des documents au format `sans schema`. (attention néanmoins aux types, contrairement à MongoDB).

Elasticsearch est un logiciel Open-Source fait par l'entreprise [Elastic.co](https://www.elastic.co/fr/) et fait intégralement partie de la stack `ELK` (Elastic, Logstash, Kibana).

- Logstash : `ETL` avec une syntaxe Ruby.
- Kibana : Interface graphique
- Beats : Outil de transfert d'information (E de l'ETL)

> C'est quoi un ETL ?  
--

> Extract-Transform-Load : Outil d'extraction de donnée, de mise en forme et de chargement vers d'autres systèmes.
 
--

### Qui s'en sert ?
Uber, Ebay, Github, Orange, Airbus, Walmart, Le ministère des armées[ et pleins d'autres...](https://www.elastic.co/fr/customers/)
---

## Protocol de communication

Elasticsearch à mis en place une interface de communication basée sur le `protocole HTTP` communément appelé `REST`. 

> Il suffit donc de faire une requête HTTP vers Elasticsearch pour interagir avec.
> **Donc pas besoin de bibliothèques Elasticsearch**, juste savoir faire une requête HTTP dans le language de votre choix.  
>
> en cas d'oubli, voici une ressource sur [protocole HTTP](https://developer.mozilla.org/fr/docs/Web/HTTP/Overview) ⬅️
>
> Et j'ai même [un cours](/2020-2021/dim/php/courses/3-http/#1) ⬅️

--

Par exemple, pour récupérer les informations d'un serveur serveur Elasticsearch, il suffit de faire un 
```http
GET /
```
```json
{
    "name": "es01",
    "cluster_name": "es-docker-cluster",
    "cluster_uuid": "uNgVijyERNuHPfL5sY-Q3g",
    "version": {
        "number": "7.15.0",...
```
