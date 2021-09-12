---
title: TP1 - Structures
weight: 2021021103
---

Chaque exercice est indépendant mais les structures définies avant sont utilisables dans les exercices suivants 

# Exercice 1

Répondre aux questions en justifiant chaque réponse :

- Quel type de donnée doit-on utiliser pour définir un `age` ?
- Quel type de donnée doit-on utiliser pour définir un `phoneNumber` ?
- Quel type de donnée doit-on utiliser pour définir un `postalCode` français ?
- Je souhaite stocker le mot `Bonjour`, quel type dois-je utiliser ?
- Définir les structures de base pour les types suivants : 
    - `date` (1991-12-30)
    - `address` (3 esplanade Augustin Aussedat, Papeteries Image Factory, Cran-Gevrier, 74000 Annecy)
    - `time` (15:04:05 GMT)
    - `money` (857.65€ ⚠️)
    - `iso8601Datetime` ([iso8601](https://www.w3.org/TR/NOTE-datetime) / [rfc3339](https://datatracker.ietf.org/doc/html/rfc3339))
    - `rfc3966Phone` ([rfc3966](https://datatracker.ietf.org/doc/html/rfc3966))

# Exercice 2

Vous devez réaliser une application de gestion des livres de la bibliothèque pour permettre aux visiteurs de trouver rapidement un livre en stock.

Le moteur de recherche devra permettre de trouver un livre par son nom, son auteur, des mots-clés (hashtags?), ou encore par son editeur. 

1. Proposez une description des différentes structures de données en jeu dans ce problème


# Exercice 3

Dans le contexte épidémiologique actuel, les personnes sont confinées chez elles. Elle peuvent se rendre à leur travail à la condition que leur entreprise leur a signé une autorisation enregistrée à la préfecture. Les personnes habitent dans un quartier, et l'entreprise peut se trouver dans un autre quartier.

1. définissez les différentes données qui vous semblent importantes pour définir un quartier, une entreprise, personne
2. Proposez une description des différentes structures de données en jeu dans ce problème

# Exercice 4

Dans le contexte d'organisation du retour en présentiel, une école souhaite mettre en place une plateforme d'organisation des salles de cours pour ses promos, sachant que la distanciation sociale oblige a répartir les étudiants dans plusieurs salles. On veut mettre en place une plateforme ou des étudiants sont dans une promo, la promo a des cours de prévu dans plusieurs salles, mais on souhaite savoir pour un soucis de suivi de cas-contact dans quelle salle quel étudiant était pour une matière donné - sa "présence". 

1. définissez les différentes données qui vous semblent importantes pour définir un étudiant, une matière
2. Proposez une description des différentes structures de données en jeu dans ce problème


# Exercice 5

On vous demande de réaliser un outil de gestion de congés dans votre entreprise. Quand un employé fait une demande de congés, elle doit être approuvée par son supérieur hiérarchique et le service RH. Chaque refus de demande doit être motivé que ce soit par le supérieur hiérarchique ou les RH. 

1. Proposez une description des différentes structures de données en jeu dans ce problème