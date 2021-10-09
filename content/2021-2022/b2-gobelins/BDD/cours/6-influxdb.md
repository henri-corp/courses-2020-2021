---
title: "6 - InfluxDB"
imagetitle: ../influxdb.svg
light: true
type: presentations
weight: 2021022106
---


<div style="display: flex; align-content: center; justify-content: center; margin-bottom: 10px;">
<img src="../influxdb.svg" style="width:200px;"/>
</div>
InfluxDB (2013) est une base de donnée de séries temporelles (TSDB).  

Une TSDB est une base qui permet d'enregistrer ou récupérer des données associées à un `timestamp`.

Très souvent ces bases de données sont utilisées dans la surveillance de valeurs comme la météo, 
le cours d'une devise, ou encore l'usage de ressources sur un serveur.

--
### Qui l'utilise ?
Trivago, Indeed, Adobe, Axa, Cisco,Ebay,Oracle, Paypal
---

### Concepts
#### bucket
Un Bucket est l'équivalent d'une base de données, c'est un ensemble de mesures.  
> Dans le cadre de surveillance d'un ordinateur on pourrait l'appeler `Monitoring`

#### Measure
Une mesure c'est un ensemble de points qui se rapporte à une même donnée. 

> Pour du _monitoring_ on peut prendre comme example l'usage de la mémoire `memory`.

#### Point
Un point représente un ensemble de champs et de tags à un instant donné.

> Pour notre mesure _memory_, on parlera du point du 7 octobre 2021 à 08:47:21.322

---
#### Field
Un champ est une clé valeur pour un point pour une mesure donnée

> Notre point _memory_ du 7 octobre 2021 à 08:47:21.322 contient le champ memory_free: 4Go
> Notre point _memory_ du 7 octobre 2021 à 08:47:21.322 contient le champ memory_allocated: 3Go
> Notre point _memory_ du 7 octobre 2021 à 08:47:21.322 contient le champ memory_used: 27Go

#### Tag
Un tag représente une valeur textuelle associée à un point pour permettre de filtrer certaines valeurs
> Notre point _memory_ du 7 octobre 2021 à 08:47:21.322 fait partie du serveur SERVER_A. on ajoute donc un tag
> hostname: `SERVER_A`.

https://docs.influxdata.com/influxdb/v2.0/reference/key-concepts/data-elements/
---
### Cas d'usages

Pourquoi utiliser InfluxDB ?

--

- Lorsque le temps a une réelle importance
- Lorsqu'on a besoin de stocker rapidement une donnée temporalisée.
- Pour mesurer une évolution
