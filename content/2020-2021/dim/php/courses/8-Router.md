---
title: 8 - Router
weight: 8
---


Un Router est un composant important qui a pour but de rediriger les requêtes HTTP entrantes vers les services requis. 

Au début du Web, plusieurs sites appliquaient leurs routeurs de la manière suivante : 

```php
https://shop.funko.com/product/show.php?id=24983
```

Cette Solution offre un usage simple mais limité du protocole HTTP et est déconseillée pour plusieurs raisons :

- L'utilisateur ne sait pas où il est
- Les moteurs de recherche ne peuvent pas garantir une bonne indexation



L' objectif du routeur est donc de résoudre des url  de ce type : 

```php
https://shop.funko.com/collections/all-products/products/pop-animation-dragon-ball-super-goku-black
```



## Ressources

- [Documentation Composant router](https://symfony.com/doc/current/components/routing.html)
- [Documentation d'Usage du Router](https://symfony.com/doc/current/routing.html)

