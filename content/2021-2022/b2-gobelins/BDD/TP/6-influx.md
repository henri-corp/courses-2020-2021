---
title: InfluxDB
weight: 2021022206
---

# TP6 - InfluxDB


## Source de données

```
INFLUX SERVER: https://influx.henri.run/
TOKEN: pgBb3Xdq72hQXGrareQfcGUs8Im8YpXrUAgMmvTc_y2JSBAGu4hhxX15G8rGuJm7OXtCDVB6-j0LbKcs_HVT5g==
ORGANISATION: students
```
On va utiliser la base de code : https://github.com/henri-corp/tp-influx-js-skeleton


Pour les exercices vous allez utiliser un bucket nommé `votre_prenom` et on va utiliser le jeu de données du prix de l'avocat entre 4 janvier 2015 et le 29 novembre 2020 disponible ici : [avocado-2020.csv](../avocado-2020.csv).

## Exercice 1
Insérer toutes les données dans la base en précisant bien le timestamp au bon format.
On souhaitera pouvoir grouper nos informations par zone géographique et par type d'avocat (conventionnel/bio), 
et effectuer des calculs sur le prix moyen ainsi que les volumes totaux vendus. 

## Exercice 2
Pour cet exercice on va se baser sur les 3000 derniers jours.
Effectuez les requêtes suivantes : 
1. Donner le nombre de documents, Tous tags confondus.
2. Donner le nombre de documents par types.
3. Donner la moyenne pour chaque champs par types.
```
{
  average_price: { conventional: 1.1447355361897895, organic: 1.6151885479087131 },
  total_volume: { conventional: 1872976.5379272595, organic: 63658.555192179745 }
}
```
4. Donnez le prix moyen par tranche de 365 jours (donner une fenêtre d'aggrégations)
```
2013-12-21T00:00:00Z null
2014-12-21T00:00:00Z null
2015-12-21T00:00:00Z 1.3771036862175414
2016-12-20T00:00:00Z 1.3384188034188036
2017-12-20T00:00:00Z 1.5170822942643387
2018-12-20T00:00:00Z 1.3552814088598404
2019-12-20T00:00:00Z 1.4070888888888886
2020-12-19T00:00:00Z 1.2814444444444444
2021-10-03T15:29:00.540159491Z null
```
5. Donner la date, la position geographique et le type d'avocat qui a couté le plus cher ainsi que sa valeur.
```
2016-10-29T22:00:00Z  |  San Francisco  |  organic  |  3.25
```

6. Donner la date et la position geographique de type `conventional` qui a couté le moins cher ainsi que sa valeur.
```
2017-02-04T23:00:00Z  |  Phoenix/Tucson  |  0.46
```