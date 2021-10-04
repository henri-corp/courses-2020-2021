---
title: "2 - Redis"
imagetitle: ../redis.svg
light: true
type: presentations
weight: 2021022102
---


<div style="display: flex; align-content: center; justify-content: center; margin-bottom: 10px;">
<img src="../redis.svg" style="width:200px;"/>
</div>
Redis (2009) est une solution Open-Source de KV-storage in-memory.
--
![](../redis-kv.png)

--

A chaque clé on peut associer une durée de vie.

---

## Qui utilise Redis ?
- Twitter
- Github
- Pinterest
- Snapchat
- StackOverflow
- Uber
- Airbnb
- Pinterest....
---
## Différentes structures de stockage

--
### KV-Store
Pour une clé, on stocke une valeur simple.
```
GET  SET
```
--
### Listes (LIST)
Les listes sont ordonnées et sont performantes pour êtres lues à partir du début ou de la fin.

> 🤔 une histoire de file d'attente et de pile.

```
LPUSH    RPUSH
LPOP     RPOP
```
**On ne `peut` `pas` écrire n'importe où dans la liste.**

---
### Sets (SET)
Les sets sont des boîtes de valeurs uniques. On peut déposer une valeur, vérifier si une valeur est dans le SET, et en prendre un au hasard.
```
SADD SPOP SREM SISMEMBER SMEMBERS
```

--
### Sets Ordonnés (ZSET)
Comme les sets, les Sets Ordonnés ne peuvent contenir que des valeurs uniques. La différence est que chaque valeurs peut avoir un score qui donnera l'ordre
de la liste. 2 valeurs peuvent avoir le même score.
```
ZADD ZPOP ZINCRBY ZRANGE
```
--
### Hashes (HASH)
Les Hashes sont des cartes de clés/valeurs. C'est la valeur parfaite pour représenter un objet complexe.
```
HMSET HGETALL HGET HSET

```
---
## Cas d'usage

Dans quels cas peut-on utiliser Redis ? 

--

- Mise en cache (durée de vie)
- Sessions (durée de vie)
- Leaderboard (ZSET)
- Géolocalisation
- ...

--

Tout ce qui demande de la **vitesse**.

--

```important
⚠️Redis par défaut N´EST PAS ACID.
```

Car c'est une base de donnée In-Memory.
