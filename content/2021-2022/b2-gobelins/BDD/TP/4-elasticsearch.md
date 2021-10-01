---
title: "Elasticsearch"
weight: 2021022204
---

# TP4 - Elasticsearch

## Information
Le serveur Elasticsearch est disponible à l'adresse : https://es.course.larget.fr

Kibana est disponible sur : https://kibana.course.larget.fr. 

Les identifiants de connexion sont : `student` / `student`.

Vous pouvez utiliser n'importe quel client HTTP pour faire une requête vers Elasticsearch ou utiliser la fonctionnalité
`devtools` de Kibana.
Voici un exemple pour faire une requête POST vers une url 
```php
<?php

//post a json {"a":1, "b":"test"} to an url using PHP
$url = 'http://username:password@es.course.larget.fr/';

$data = array('a' => 1, 'b' => 'test');
$data_string = json_encode($data);

$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/json',
        'content' => $data_string
    )
));
$result = file_get_contents($url, false, $context);

```

```javascript
//npm install axios
const axios = require('axios').default.create({
    baseURL: 'https://username:password@es.course.larget.fr/',
});

const data = {
    a:  1,
    b:  "test"
};

(async () => {
    let result = await axios.post('/test/_doc', data);
    console.log(result.data);
})();
```


## Exercice 1
Pour l'exercice 1, on va utiliser un index qui s'appellera `votre_prenom` (sans accent).

1. Insérer un document json qui contient votre nom votre prénom ainsi que votre âge. Quel est l'ID du document dans Elasticsearch ?
2. Lister les documents de l'index
3. Refaire les 2 premières actions. Que s'est-t-il passé dans la base ?
4. Supprimez l'index.
5. Insérer le même document qu'à la question 1, mais cette fois avec l'ID `student`. Listez les documents de l'index.
6. Modifiez votre age en utilisant la requête de la question 5.
7. Supprimez le document à l'index `student`.


## Dataset
Pour la suite de l'exercice on va utiliser le dataset des lignes des pièces de [shakespeare](../shakespeare.jsonl). 

Ne téléchargez pas le dataset, utilisez plutôt l'index déjà mis à votre disposition qui s'appelle ?
```GET /_cat/indices```


## Exercice 2 - Recherche


1. Trouver combien il y a de documents dans cet index en utilisant le `_cat/indices`
2. Trouver combien il y a de documents dans cet index en utilisant le `_count`
3. Listez tous les documents. Quelles sont les limites de la requête `match_all`?
4. Trouver quel personnage de quelle pièce et à quelle ligne a dit : `to be or not to be` en utilisant `match`.
5. Combien y-a-t'il de réponses dans la requête ?
6. Refaire la question mais en utilisant un "match_phrase".
7. Effectuer une requête `fuzzy` pour trouver tout ce que le speaker `HAMLOT` a dit.
8. En utilisant la requête `fuzzy`, trouver tout ce que le speaker `JULLIET` a dit.
9. En utilisant une requête `match` et en précisant une `fuzziness` à 10, combien de `text_entry` contiennent le mot `Rome` ?
Quel effet de bord ont les requêtes fuzzy ?
10. Trouver tous les documents qui contiennent le mot `wasp` mais qui ne sont pas dans la pièce `Taming of the Shrew`.
11. Trouver tous les documents qui contiennent soit le mot `wasp` soit `bees` et qui sont dans une pièce dont le nom commence par  `Henry` (HINT:`wildcard`)

## Exercice 3 - Aggregation
À partir de maintenant, toutes les requêtes se feront en size=0 
```
GET /shakespeare/_search?size=0
```

1. Comptez le nombre de pièces différentes
2. Listez toutes les pièces ainsi que le nombre de documents pour chacune d'elles.
3. Listez le nombre de documents, par pièces puis par personnage.
4. Pour chaque pièce, donnez l'acteur qui a le plus de répliques.
5. Comptez le nombre de personnages par pièces.
6. Pour la pièce `Romeo and Juliet`, donnez les 2 personnages qui parlent le plus ainsi que le nombre de dialogues de chacun.
7. Pour chaque pièce, donner le nombre moyen de répliques