---
title: TP2 - Formats
weight: 2021021104
---

Chaque exercice est indépendant.

# Formats de stockage

## Exercice 1
Je souhaite stocker mon carnet d'adresse en XML.
Chacun de mes contacts a les informations suivantes : 
 - Un nom
 - Un prénom
 - Une date de naissance
 - Une addresse postable complète (HINT: exercice 1)
 - Des membres de la famille qui sont composés de :
    - Un lien de parenté
    - Un lien vers une autre personne du carnet

1. Proposez une structure XML pour répondre au besoin
2. Proposez une structure JSON pour répondre au besoin

```yaml
- id: 1
  lastname: LARGET
  firstname: Henri
  birthdate: 1991-12-30
  address: ...
  family:
    - user: 2
      status: spouse
- id: 2
  firstname: Nadia
...
```


## Exercice 2
Je souhaite stocker les notes d'étudiants dans ma base. Un étudiant (Nom/Prénom) a une ou plusieurs notes.
Chaque note est associée à un nom de matière et à un type d'évaluation (par exemple : data_sructures_tp2).

1. Proposez une solution à ce problème en JSON
2. Proposez une solution à ce problème en CSV
3. Proposez une solution à ce problème en YAML
4. Quelle est la meilleure solution ? Pourquoi ?


## Exercice 3
Je souhaite extraire 2 fichiers CSV des données suivantes : orders.csv et order_products.csv
Proposez une solution pour afficher le json suivant dans 2 fichiers CSV :
```json
[
    {
        "order_id":"Ar44Zp",
        "client":"HONETE Marie",
        "shippingAddress": [
            "3 Esplanades Augustin Aussedat",
            "Papeteries Image Factory",
            "Cran Gevrier",
            "74960 Annecy"
        ],
        "products":[
            {
                "name":"clé USB", 
                "quantity":10, 
                "priceUnit":205, 
                "vat": 410,
                "total": 2460
            },
                        {
                "name":"JSON pour les nuls", 
                "quantity":1, 
                "priceUnit":1995, 
                "vat": 110,
                "total": 2105
            }
        ]
    },
    {
        "order_id":"RR21P",
        "client":"BON Jean",
        "shippingAddress": [
            "1 rue de la paix",
            "75000 Paris"
        ],
        "products":[
            {
                "name":"Comment torturer des étudiants", 
                "quantity":1, 
                "priceUnit":2005, 
                "vat": 112,
                "total": 2517
            },
                        {
                "name":"JSON pour les nuls", 
                "quantity":1, 
                "priceUnit":1995, 
                "vat": 110,
                "total": 2105
            }
        ]
    }
]


```



## Exercice 4

J'ai un menu de restaurant qui a les informations suivantes : 
- Nom du produit
- Une description de 100 caractères maximum
- Prix du produit
- Allergènes possibles
- Une catégorie de produit (une parmi la liste suivante : Entrée | Boisson | Viandes | Poisson | Salade | Dessert)

1. Proposez une représentation en YAML
2. Proposez une représentation en CSV
3. Proposez une représentation en XML
4. Proposez une représentation en JSON
5. Laquelle choisiriez-vous et pourquoi ?


# Formats de présentation

## Exercice 5
Pour cet exercice, vous allez avoir besoin de ce fichier : 
[scp101.txt](../tp2-resources/scp101.txt)

L'objectif est de mettre en forme l'article scp101.txt au format HTML suivant [scp101.png](../tp2-resources/scp101.png)

## Exercice 6
Pour cet exercice, vous allez avoir besoin de ce fichier : 
[scp871.txt](../tp2-resources/scp871.txt)

L'objectif est de mettre en forme l'article scp101.txt au format HTML suivant [scp871.png](../tp2-resources/scp871.png)

Si vous avez besoin d'une image de ressource, elle se trouve ici : [cake.jpg](../tp2-resources/cake.jpg)

## Exercice 7

En vous aidant du code fourni dans l'exercice et du cours, dessinez cette rosace dans son rectangle en svg.

![](../tp2-resources/rosace.png)

```svg
<svg viewBox="-150 -150 300 300" xmlns="http://www.w3.org/2000/svg">
    <circle cx="0" cy="0" r="50" stroke="black" fill="transparent"/>
</svg>
```

Les couleurs utilisées sont : 
- `#f0f0f0`
- `red`
- `blue`
- `black`
- `green`
- `yellow`
- `purple`
- `pink`
- `transparent`
> Hint n°1 : Pour visualiser votre travail, utilisez votre navigateur.

> Hint n°2 :  
> <img src="../tp2-resources/help.svg" height="500px;" width="100%;"/>