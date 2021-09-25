---
title: "1 - PostgreSQL"
light: true
type: presentations
weight: 2021022101
---


<div style="display: flex; align-content: center; justify-content: center; margin-bottom: 10px;">
<img src="../pgsql.svg" style="width:200px;"/>
</div>
PostgreSQL est un Système de Gestion de Base de Données **Relationnel** qui utilise le langage SQL. 
Ce SGBD est dit ACID : 
- A : Atomicité - Une transaction est exécutée complètement ou pas du tout si une erreur survient. 
- C : Consistence - La base de donnée est consistente avant et après la transaction
- I : Isolation - On peut lancer plusieurs transactions en simultané sans qu'aucune n'interfère avec une autre.
- D : Durable - Quoi qu'il arrive la transation s'effectuera même si le système plante.

--

## Qui l'utilise ?

--
- Netflix
- Uber
- Instagram
- Spotify
- Twitch
- Reddit...

---

## Concurrence

- MySQL / MariaDB (subtile différence entre les deux)
- SQLite
- Oracle 
- Microsoft SQL Server
- ... [wiki](https://www.wikiwand.com/en/Comparison_of_relational_database_management_systems)




