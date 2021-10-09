---
title: "5 - Neo4J"
imagetitle: ../neo4j.svg
light: true
type: presentations
weight: 2021022105
---


<div style="display: flex; align-content: center; justify-content: center; margin-bottom: 10px;">
<img src="../neo4j.svg" style="width:200px;"/>
</div>
Neo4j (2007) est une base de données **Graphe** développé par la société éponyme. elle est ACID et dispose d'une version open-source "Community".

Neo4j Offre un système de stockage basé sur des noeuds et des liens entre ceux-ci. Neo4J utilise un language nommé Cypher.

```cypher
MATCH (charlie:Person { name:'Charlie Sheen' })-[:ACTED_IN]-(movie:Movie)
    RETURN movie
```

--
## Qui utilise Neo4j ?
Ebay, Levi's, Adobe, Orange,...


---
### Vocabulaire
#### Node
Un nœud de données
#### Relationship
Lien entre les nœuds
#### Properties
Les propriétés peuvent être attachées à des nœuds ET à des relations. 

---
## Cas d'utilisations

Pourquoi utiliser Neo4J ?

--

- Si on a besoin de relations entre documents de tout types
- Si chaque donnée peut avoir des relation avec toutes les autres sans faire de tables de jointures