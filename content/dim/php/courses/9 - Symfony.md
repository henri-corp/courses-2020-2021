---

title: "9 - Symfony"

imageTitle: "https://symfony.com/logos/symfony_white_03.png"

cover: "https://images.unsplash.com/photo-1517852058149-07c7a2e65cc6?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1350&q=80"

type: presentations

weight: 9

light: true

---
Symfony a été créé en 2005 par Fabien Potencier pour l'entreprise SensioLabs.

Symfony c'est une suite de composants, et un des plus importants est le composant Framework, qui est la glue des autres composants.

À la base, le framework s'appellait Sensio Framework, et quand il a été mis Open-Source, il a gardé ses initiales **SF**

---
class: img-list

# Qui l'utilise ?

![](/resources/logo-dailymotion.png)
--
![](/resources/logo-blablacar.svg)
--
![](/resources/logo-spotify.png)
--
![](/resources/logo-pornhub.png)

---

Symfont c'est...

--
- Un framework PHP ?
--
 ✅

--
- Un framework HTTP ?
--
 ✅

--
- Un framework Requête/Réponses ?
--
 ✅

--
- un framework MVC ? 
--
 ❌
--
background-image: url(/resources/thinking.gif)
background-size: cover

?

---

Un Framework MVC standard se compose de ces différentes parties :

<img  style="width:100%" src="https://i.imgur.com/fip7lfe.png"/>

--

> Le protocole HTTP est un protocole de communication entre un client et un serveur. C'est un protocole de Request/Response.

> Un Routeur intercepte la Requête HTTP, l'envoie vers le Controller qui correspond. Celui-ci ira communiquer avec le Modèle de données et génèrera la Vue qu'il renverra en Réponse HTTP.

---

Dans le cas de Symfony, il n'existe pas de couche Modèle créée par le framework, celui-ci n'est donc pas MVC.

<img  style="width:100%" src="https://i.imgur.com/n4id5dD.png"/>

> La couche modèle est gérée par Doctrine. Symfony est beaucoup plus généraliste.

---

Pourquoi le cours a été découpé comme ça ?

--
- TP1 : Todolist
  - Comprendre l'intérêt d'un code organisé
  - Comprendre que ce qui est sale, c'est les développeurs, pas le langage.

--
- TP2 : Utiliser les composants symfony
  - Comprendre que les composants sont indépendants.
  - Comprendre pourquoi tout le monde les utilisent.
  - Comprendre le concept de briques.

--
- TP3 : Utilisation du framework Symfony
  - Manipuler le framework
  - Faire des outils rapidement
  - Continuer la découverte des composants.