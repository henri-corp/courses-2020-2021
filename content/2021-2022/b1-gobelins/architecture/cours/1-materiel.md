---
title: Architecture Matériel

count: false
light: true
type: presentations
script: >
    var storedHash = window.location.hash;
    setTimeout(()=>{
    document.querySelector(".remark-slide-container:nth-of-type(1) .remark-slide-number").style.display="none";
    document.querySelector(".remark-slide-container:nth-of-type(2) .remark-slide-number").style.display="none";
    document.querySelector(".remark-slide-container:nth-of-type(3) .remark-slide-number").style.display="none";
    document.querySelector(".remark-slide-container:nth-of-type(4) .remark-slide-number").style.display="none";
    },200)

---

![](../ordi.jpg)

---
count: false

# FIN
--
 ?

![](../thinking.gif)

--
count: true


Non.

---

# Débat ouvert

--

## Pourquoi a-t-on inventé l'informatique ?

--

pour **Gagner du temps**

--

Parce que l'homme est paresseux 😪

--

**Un bon développeur est un développeur paresseux**

---


- Histoire
  - Précurseurs
  - Premières machines programmables
  - Essor de l'informatique
  - les Génération
  - et maintenant

---

# Histoire

---

## Précurseurs

- Premiers outils officiels : l'abaque, l'ancêtre du boulier encore utilisé dans certains pays.
- On trouve sa trace en mésopotamie (2700-2300 av. JC)



### Les calculateurs analogiques

Un calculateur analogique est un calculateur qui utilise des mesures physiques continues (par exemple électriques, mécaniques ou hydrauliques) pour modéliser un problème à résoudre, tel que le passage du temps, le déplacement d'un véhicule ou le déplacement des planètes.

Lorsque les conditions initiales d'un calculateur analogique sont saisies, il n'est plus modifié que par l'action continue de son stimulateur ; manivelle, pendule/poids, roue d'un véhicule, etc..

La machine d'Anticythère est un calculateur analogique,le plus ancien connu à ce jour est daté de 87 av. JC.
Il s'agit d'un outil grec pour prévoir les eclipses.

---

### Les calculateurs mécaniques

Blaise Pascal, 1642, invente une "machine à calculer" : la pascaline.

<div >
<img style="width:300px;" src="../bpascal.jpg"/>
<img style="width:500px;" src="../pascaline.jpg"/>
</div>

4 opérations arithmétiques sans utiliser l'intelligence humaine.

---
class: center

### La principale marque d'un ordinateur est sa programmabilité. 

Celle-ci permet à l'ordinateur d'émuler toute autre machine à calculer en changeant la séquence des instructions disponibles.

---

## Premières machines programmables

---

### Apparition de la carte perforée

Au 17ème siècle, on voit apparaitre la carte perforée dans divers automates, notamment les métiers à tisser, orgues de barbarie et pianos mécaniques.

Le plus vieux usage se retrouve en 1725 dans les métiers à tisser français, notamment ceux de Jacquard.


En 1834, Charles Babbage utilise les cartes du métier Jacquard pour donner des instructions et des données à sa machine analytique, l'ancêtre des ordinateurs.


<img style="height:250px;float:left;display:inline;" src="../ada.jpg"/> 
<div style="float:left;display:inline;">
<b>Ada Lovelace</b>, premier programmeur (♀️) de l'histoire à travailler sur la machine analytique de Charles Babbage.
</div>

---

## Essor de l'informatique

### XIX siècle
Le recensement de la population des États-Unis (🇺🇸) de 1880 prit sept ans à analyser. Un appel d'offres pour un système d'analyse plus rapide fut lancé avant le recensement de 1890. 

**Herman Hollerith** fut choisi car sa solution est 2 fois plus rapide que les autres grâce aux cartes perforée. 

En 1896, Herman Hollerith crée the Tabulating Machine company.

<img style="height:200px;" src="../hhollerith.jpg"/>

La société fusionne le 16 juin 1911 avec _la Computing Scale Company_ sous le nom de la multinationale...
--
**Computing Tabulating Recording Company** (CTR).

---

### XX siècle

- **Fredrik Rosing Bull** (🇳🇴) dépose le 31 juillet 1919 un brevet pour une "trieuse-enregistreuse-additionneuse combinée à cartes perforées"

- 1924 : CTR change de nom et se fait appeler **International Business Machines Corporation**
--
 (IBM)
--

- 1930 : Compagnie Belge(🇧🇪) prend le nom **Bull** (pour utiliser les brevets de **Bull**)
- 1934 : Bull : 15% des parts de marché mondial, concurrent direct d'IBM.

_Bull appartient à cette époque à la même famille propriétaire des **Papeteries Aussedat**._

---

## Première génération (1936-1956)

- En 1938, Konrad Zuse 🇩🇪 commença la construction des premières séries-Z (programmation de missiles)
    - ordinateurs électromécaniques
- Seconde Guerre Mondiale ⚔️🤯
- 1940 : Bell labs met en place un ordinateur pilotable à distance capable de faire une multiplication en 1 minute.
- 1940 : Premiers ordinateurs en système binaire
- 1941 : Konrad Zuse - Z3 - 4 additions par secondes ou 15 multiplications minutes
- 1943 : Recherche sur le déchiffrement des messages militaires Nazi d'Enigma : **Colossus**
- 1944 : Harvard Mark I - IBM 3 opérations/secondes sur des nombres à 23 chiffres. (100 000 000 000 000 000 000 000) - Taille : 37m² (plus grand que mon appartement)

---

- 1945 : **ENIAC** (Electronic Numerical Integrator and Computer), gros calculateur entièrement électronique.
+30Tonnes, 160m², 160kW. 100 000 additions ou 357 multiplications par seconde.
- 1948 : Architecture VonNeumann

---

<div style="margin-left: 10px; margin-bottom: 10px; float: right;">
<img src="../vonNeumann.png" style="margin-left: 10px; margin-bottom: 10px;"/>
</div>
- Unité Arithmétique et Logique (UAL ou ALU en anglais) ou unité de traitement : effectuer les opérations de base ;
- Unité de contrôle, chargée du « séquençage » des opérations ;
- Mémoire qui contient à la fois les données et le programme qui indiquera à l'unité de contrôle quels sont les calculs à faire sur ces données. 
  - mémoire volatile : programmes et données en cours de fonctionnement 
  - mémoire permanente : programmes et données de base de la machine)
- les dispositifs d'entrée-sortie, qui permettent de communiquer avec le monde extérieur.

# _Wait What?!_ Architecutre Von Neumann

---

- 1945 : **ENIAC** (Electronic Numerical Integrator and Computer), gros calculateur entièrement électronique.
+30Tonnes, 160m², 160kW. 100 000 additions ou 357 multiplications par seconde.
- 1948 : Architecture VonNeumann
- 1951 : Premier ordinateur commercial - vendu à 9 exemplaires en 6 ans.
- 1952 : IBM 701 - ordinateur militaire :  16 000 additions ou 2 200 multiplications par seconde

---

# Seconde Génération (1957-1965)

- invention du transistor
--

  - en **1947**
--
, 10 ans avant cette étape.

--

_C'est quoi un Transistor?_

--

![](../transistor-relay.jpg)

- relay : Un courant passe dans une bobine et génère un champ magnétique qui va activer le contact
- Transistor NPN : Si un courant arrive sur la borne C, le courant passe entre B et E.
