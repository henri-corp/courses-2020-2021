---
title: "3 - MongoDB"
imagetitle: ../mongodb.svg
light: true
type: presentations
weight: 2021022103
---


<div style="display: flex; align-content: center; justify-content: center; margin-bottom: 10px;">
<img src="../mongodb.svg" style="width:200px;"/>
</div>

MongoDB (2009) est une base de donnée dite `No-SQL` orientée `Documents`.

MongoDB depuis sa version 4 est considérée comme `ACID`.

L'idée derrière MongoDB est de stocker des Documents au format `JSON`, chaque entrée dans mongoDB peut avoir une structure différente.

On ne parle pas de tables mais de **collections**, et une entrée dans la base peut avoir une profondeur infinie.

**Il n'y a pas de relation entre les documents**

--

## Qui utilise mongoDB ?
Ebay, Adobe, Google, Verizon, Uber, CoinBase, Forbes, Toyota....

---
### Requêtes simples

Se connecter:
```javascript
const client = new MongoClient("localhost:27017/");
const database = client.db(process.env.MONGO_DB);

```

--
Selectionner une collection:
```javascript
const collection = mongoClient.collection("item")
```

--
Insérer un document : 
```javascript
const document = {name:"Bob", title:"Sponge"};
const result = await collection.insertOne(document);
console.log(result);
//{
//    acknowledged: true,
//    insertedId: new ObjectId("615a0fae76560d7e422b642e")
//}
```
Par défaut, l'id est un `ObjectId`.

---
Insérer un document par son id :
```javascript
const document = {name:"Bob", title:"Sponge","_id":"MON_ID"};
const result = await collection.insertOne(document);
console.log(result);
//{ acknowledged: true, insertedId: 'MON_ID' }
```

--
Mettre à jour des propriétés de l'objet (ou en supprimer)
```javascript
const result = await collection.updateOne({_id:"MON_ID"},{
        $set: { title : "le bricoleur" },
        $unset: { name : 1 }
});
//{ acknowledged: true, 
//  modifiedCount: 1, 
//  upsertedId: null,
//  upsertedCount: 0, 
//  matchedCount: 1 }
```

--
Supprimer une entrée
```javascript
const result = await collection.deleteOne( { status: "D" } )
// { acknowledged: true, deletedCount: 1 }
```
[La documentation des opérations](https://docs.mongodb.com/manual/reference/method/js-collection/)

---
### Recherche
```javascript
//Lister tous les élements
const result = await collection.find({}).toArray()

//Lister tous les élements par filtre
const result = await collection.find({name: "Bob"})
    .sort({name: 1 /* -1: DESC*/})
    .toArray()
// [{ _id: new ObjectId("615a0fae76560d7e422b642e"), name: 'Bob',title: 'Sponge' },{...}]

//récupérer le premier élément de la recherche
const result = await collection.findOne({name: "Bob"})
// { _id: new ObjectId("615a0fae76560d7e422b642e"), name: 'Bob',title: 'Sponge' }
```
--

### Les filtres
Tous les filtres peuvent s'appliquer à des sous-champs 
```json
{"students.name": "Max"}
```
La liste complète des filtres avec des exemples :
https://docs.mongodb.com/manual/reference/operator/query/#query-selectors

---

### Aggregations
L'aggregation est une suite d'instructions envoyées à la base. **L'ordre est primordial** car chaque instruction est jouée
à la suite des autres.

> Par exemple : On veut connaitre le nombre d'hommes et femmes dans une base d'utilisateurs.
> 
> - On va d'abord commencer par limiter les résultats de recherche genres
> - On va ensuite grouper par genre
> - On va enfin lui dire de compter par groupe de genre (sous-aggregation)

```javascript
    const result = await collection.aggregate([
        {$project: {gender:1}},
        { $group: {_id: "$gender", total: {
            $count: {}
         }}}
    ]).toArray();

// [{_id: 'female', total: 2}, {_id: 'male', total: 5}]
```
Pour en savoir plus :
- https://docs.mongodb.com/manual/reference/operator/aggregation-pipeline/
- https://docs.mongodb.com/manual/reference/operator/aggregation/

---

## Cas d'utilisations

Pourquoi utiliser mongoDB ?

--

- Lorsque on a pas besoin de relation entre documents
- Lorsque la structure est profonde
- Lorsqu'on veut se permettre d'avoir des documents qui n'ont pas la même structure
