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

---
### Quelques termes techniques

#### Index
Collection de documents définis sous une même structure

#### Document
Entrée dans la base de données.

#### Shard / Replica
Sous-tâches qui travaillent à la recherche/sauvegarde de données. Shard : Travailleur Principal, Replica : Travailleur de secours.

#### Mapping
Structure qui défini les règles de l'index : Quels champs sont autorisés, lesquels ne le sont pas, et comment il sont analysés.

Pour faciliter ce cours, on ne parlera pas de mapping, ni d'analyzers, Lexers, Stemmers,...

---
#### Créer un document 
Si l'index n'existe pas, il est créé automatiquement avec un mapping par défaut.
```json
POST /mon_index/_doc
{
  "content": "Voyez ce koala fou qui mange des journaux et des photos dans un bungalow.",
  "type": "pangram",
  "age": 27
}
```
----
```json
{
  "_index" : "mon_index",
  "_type" : "_doc",
  "_id" : "AZl1THwBoGN1g7oxL3LY",
  "_version" : 1,
  "result" : "created",
  "_shards" : {
    "total" : 2,
    "successful" : 1,
    "failed" : 0
  },
  "_seq_no" : 0,
  "_primary_term" : 1
}
```
---
#### Créer/modifier un document avec un id
```json
PUT /mon_index/_doc/42
{
  "content": "Hier, au zoo, j'ai vu dix guépards, cinq zébus, un yak et le wapiti fumer.",
  "type": "pangram",
  "age": 31
}
```
----
```json
{
  "_index" : "mon_index",
  "_type" : "_doc",
  "_id" : "42",
  "_version" : 1,
  "result" : "created",...
}

```
---
#### Supprimer un document
```json
DELETE /mon_index/_doc/42
```
----
```json
{
  "_index" : "mon_index",
  "_type" : "_doc",
  "_id" : "42",
  "_version" : 4,
  "result" : "deleted",...
}
```
#### Supprimer un index
```json
DELETE /mon_index
```
----
```json
{
  "acknowledged" : true
}
```

---
#### Effectuer une recherche sur un index

```json
GET /mon_index/_search?size=100
{
  "query": {
    "match_all": {}
  }
}
```
- [Search API](https://www.elastic.co/guide/en/elasticsearch/reference/current/search-search.html)
- [Query DSL](https://www.elastic.co/guide/en/elasticsearch/reference/current/search-search.html)
- [Aggregations](https://www.elastic.co/guide/en/elasticsearch/reference/current/search-aggregations.html)

```javascript
GET /mon_index/_search?size=100
{
  "query": {
    "term": {
      "type": "pangram"
    }
  }
}
```
---
```json
{
  "took" : 388,
  "timed_out" : false,
  "_shards" : {
    "total" : 1,
    "successful" : 1,
    "skipped" : 0,
    "failed" : 0
  },
  "hits" : {
    "total" : {
      "value" : 19,
      "relation" : "eq"
    },
    "max_score" : 1.0,
    "hits" : [
      {
        "_index" : "mon_index",
        "_type" : "_doc",
        "_id" : "ApmETHwBoGN1g7oxB3Jw",
        "_score" : 1.0,
        "_source" : {
          "content" : "Voyez ce koala fou qui mange des journaux et des photos dans un bungalow.",
          "type" : "pangram",
          "age" : 27
        }
      }
      ...
```


---

## Cas d'utilisations

Pourquoi utiliser Elasticsearch ?

--

- Lorsque on a pas besoin de relation entre documents
- Lorsque la structure est profonde
- Lorsqu'on veut pouvoir faire des requêtes de recherche fulText. (des logs par exemple)