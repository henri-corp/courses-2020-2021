---
title: "3 - Listes, Arbres et Graphes" 
light: true
type: presentations
weight: 2021021105
---

Dans ce cours, on va parler de listes Linéaires, non linéaires et dans quels cas on les utilise.

On caractérise les lists sous plusieurs critères : 
- **ordonnée** et **non-ordonnée**
- **linéaire** et **non-linéaires**
- **homogène** et **non-homogène**


---


## Piles (Stacks)

<img src="../lifo.png" style="position: absolute; right:30px;"/>


Une pile est une structure de données **linéaire** et **ordonnée**.

La particularité de la pile est sa structure **LIFO** (Last In, First Out).



Exemple de la vie de tous les jours : 

--
count: false

- La pile d'assiettes
- Une pile de t-shirts
- Une pile de journaux
- Une boîte aux lettres


--
count:false


### Cas d'usages en programmation : 


--
count:false

- Garder un historique et être capable de revenir en arrière facilement.

---

## Files d'attente (Queue)

Une file d'attente est une structure de données **linéaire** et **ordonnée**.

<img src="../fifo.png" style="position: absolute; right:-10px;"/>

Beaucoup plus souvent utilisée on appelle cette file une liste de type **FIFO** (First-In First-Out).



Exemple de la vie de tous les jours : 

--
count: false

- La queue à la caisse

--
count:false


### Cas d'usages en programmation : 


--
count:false

Beaucoup plus fréquent que la stack : 

- Une file d'attente avant traitement

---

## Listes chainées (Linked List)

Les listes chainées sont des listes **linéaires** et **ordonnées**. Chaque élément ou "nœud" contient des informations, mais également une référence à Element suivant de la liste.

![](../linkedlist.png)

On a donc dans un maillon de chaîne l'information de tous les nœuds suivant sans pour autant connaître l'élément parent.

Le premier nœud de la liste est la tête de la liste et le dernier nœud ne contient pas de référence vers un autre nœud, on peut donc facilement savoir quand on est arrivé au bout de la liste.

---

## Arbres (Trees)
<img src="../tree.png" style="position: absolute; right:-20px;"/>

Un arbre est une structure hiérarchique de nœuds. Chaque nœud est lié aux autres nœuds et peuvent avoir plusieurs enfants.

Il existe un nœud ROOT (racine), et chaque nœud sans enfant est appelé est LEAF (feuille).

Exemples :
- Hiérarchies en entreprise

Dans un arbre il y a toujours une notion de hiérarchie.


---

## Cas Particulier : Les Arbres Binaires

Un arbre binaire est un arbre dont les nœuds ne peuvent pas avoir plus de 2 enfants.


On parle d'arbre **strict** quand les nœuds n'ont exactement que 0 ou 2 nœuds.

---

<img src="../graphe.png" style="position: absolute; right:-15px; width:320px;"/>

## Graphe


Un graphe est un ensemble de nœuds (Nodes) reliés les uns les autres par des arêtes (edges).

Un graphe, c'est donc 2 ensembles de **sommets** et d'**arêtes**.  
Ces arêtes sont forcément reliées à 2 sommets de l'ensemble des sommets.




**un arbre** est un graphe **peu connecté** et **acyclique**



---

<img src="../graphedir.png" style="position: absolute; right:-20px; width:340px;"/>

### Graphe Orienté


On peut définir un sens dans les arêtes du graphe. Dès lors, le graphe devient  
un graphe Orienté.




### Graphe Pondéré

Un graphe dit "Pondéré" est un graphe dont les arêtes on un poids. Dans le cas d'un graphe  
orienté 2 arêtes entre 2 noeud peuvent ne pas avoir le même poids

<img src="../grapheweight.png" style="position: absolute; left:40px; width:340px;"/>

