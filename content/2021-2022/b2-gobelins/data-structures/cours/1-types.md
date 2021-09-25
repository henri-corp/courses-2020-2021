---
title: "1 - Types de données" 
light: true
type: presentations
weight: 2021021102
---

# Qu'est-ce qu'un programme ?

--
count: false

Un programme est une suite d'instructions qui spécifie étape par étape, de manière non ambiguë, des représentations de données et des calculs. Les instructions sont destinées à manipuler les données lors de l'exécution du programme.

--
count: false

<center>

<b>Algorithms + Data structures = Programs</b> — <i>Niklaus Wirth (1985)</i>

</center>



![](../niklaus_wirth.jpg)

**Niklaus Wirth**  
professeur d'informatique suisse, inventeur de plusieurs langages de programmation. 

---

## Algorithmes


**Un algorithme est une suite finie et non-ambiguë d'opérations ou d'instructions permettant de résoudre un problème**


--
count: false

- Provient du nom du mathématicien persan Al-Khawarizmi (±820), le père de l'algèbre

--
count: false

- Un problème algorithmique est souvent formulé comme la transformation d'un ensemble de valeurs, d'entrée, en un nouvel ensemble de valeurs, de sortie

--
count: false

- Exemples d'algorithmes ?

--
count: false
    - Une recette de cuisine ( ingrédients -> plat préparé )
--
count: false
    - La recherche dans un dictionnaire ( mot -> définition )

---

## Types de données

En mathématiques, il est fréquent de **classer les variables** selon certaines caractéristiques importantes.

**Les distinctions sont claires** entre les variables réelles, complexes ou logiques, ou entre les variables représentant des valeurs individuelles, ou des ensembles de valeurs, ou des ensembles de ensembles, ou des fonctions, fonctionnels, ensembles de fonctions et ainsi de suite. 

Cette notion de **classification** est tout aussi importante dans **la pratique du traitement des données**.

Ces types de données sont intégrés dans **tous** les langages de programmation.

---

## Types primitifs standards

### Le type INTEGER (entiers)

Donnée représentant un nombre de l'ensemble des entiers : 0, -10, 42, 9910, -17283...
Les entiers ont 4 opérations de base : Addition, Soustraction, Multiplication et Division.

-  `2 - 17 = -15`
- `2 + 2 = 4`
- `2 * 3 = 6`
- `31/10 = ?`

```go
type hour int
```

---

## Types primitifs standards

### Le type REAL (Réels)

Donnée représentant un nombre de l'ensemble des réels : -17.3, -5.0, 0.0, 17.0001, 233.4...


```go
type temperature float
```

---

## Types primitifs standards

### Le type BOOL (Booléens)

Donnée représentée sous la forme de l'une des deux valeurs : **TRUE** ou **FALSE**

Cette donnée est le résultat des opérations de comparaison.

```go
type active bool
```

---

## Types primitifs standards

### Le type CHAR (Caractère)

Le caractère est la **représentation graphique** d'une **valeur numérique**. 

Il peut être représenté par une série d'impression d'un point, d'une ligne, d'une barre, d'une lettre, d'un chiffre ou d'un symbole. Le caractère est un élément essentiel de la représentation de l'information. La représentation des caractères utilise des codes numériques.

`'A'`, `'z'` , `'0'`, `'🥑'`...

Le set de caractères défini par **l'Organisation Internationale de Normalisation (ISO)**, et en particulier sa version américaine ASCII (American Standard Code for Information Interchange), est celui qui est le plus largement accepté. Il consiste en 95 caractères imprimables et en 33 caractères de contrôle, les derniers étant principalement utilisés en transmissions de données et pour le contrôle de l'imprimerie.

> Voir également les probl�mes d'encodage

```go
type c char
```

---

## La structure Array (tableau)

Les tableaux sont probablement le type de structure le plus utilisé en programmation. Un tableau est une liste d'éléments qui sont **tous du même type** appelé : type de base.

Les tableaux sont des structures _d'accès-aléatoire_ parce que tous les éléments du tableau peuvent être sélectionnés au hasard et sont aussi **aisément accessibles**. 

Pour indiquer un élément individuel, le nom de la structure entière est augmenté du numéro d'index sélectionnant le composant, que l'on appelle la clé. Cette clé est un **entier** compris entre n et m, dépendamment du langage n pourra être 0 ou 1 et m la longueur du tableau moins n.

Éxemple de données : 

--
count: false

- `[2,-3,4,9,8]` 

- `[true,false,false,true]` 

- `['h','e','l','l','o','\0']` 

--

```go
type temperatures []float
type item []char

```


---

## La structure Record (Enregistrement)

La méthode générale la plus courante pour obtenir des types structurés est de joindre des éléments d'une ou plusieurs types, ces éléments étant eux-mêmes des **types structurés**, pour former un composé.

Les exemples  mathématiques sont les nombres complexes composés de deux nombres réels, les coordonnées d'un point, composées de deux ou plusieurs nombres selon la dimensionnalité de l'espace géométrique.

Un exemple de traitement de données est de décrire les personnes par quelques caractéristiques pertinentes comme leur nom, prénom et date de naissance et autres.

--
count: false

```go
type complex struct(
    re float
    im float
)
// Representation du nombre complexe -10 + 3i 
complex{-10.0, 3.0} 

```

```go
type coordinate4D struct(
    x float
    y float
    z float
    t float
)
// Representation d'un point dans l'espace a un instant t : 4 dimensions
```

---

Par exemple : on définit une personne par son prénom, son nom, sa date de naissance, et son genre

--
count: false

```go
type person struct(
    firstname string
    lastname string
    birthDate date
    gender string
)
```

--
count: false

```go
type date struct(
    year int
    month int
    day int
)
```

--
count: false

```yaml
user:
  firstname: Nadia
  lastname: GOUASMI
  birthDate: 
    year: 1993
    month: 5
    day: 21
  gender: unicorn
```

--
count: false

```go
type string []char
```


---

Qu'est-ce qui motive la définition d'une structure d'une forme ou d'une autre ? 

--
count: false
- La donnée en entrée

--
count: false
- La donnée attendue en sortie

--
count: false
- Le traitement même de la donnée

--
count: false