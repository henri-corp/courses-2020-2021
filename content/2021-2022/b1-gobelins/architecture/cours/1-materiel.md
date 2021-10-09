---
title: Architecture matérielle

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
background-image: url(/resources/thinking.gif)
background-size: cover

# ?

--
background-image: none
count: true


# Non.

---

# Débat ouvert

--

## Pourquoi a-t-on inventé l'informatique ?

--

Pour **Gagner du temps**

--

Parce que l'Homme est paresseux 😪

--

### **Un bon développeur est un développeur paresseux**

---

# Sommaire

### Histoire
#### Précurseurs
#### Premières machines programmables
#### Essor de l'informatique
#### Les Générations
### Architecture de l'ordinateur
#### Les différents composants

---

# Histoire

---

## Précurseurs

<img src="../abacus.jpg" style="width:200px; position:absolute; right:20px; top:25px; z-index:0;"/>


- Premiers outils officiels : **l'abaque**, l'ancêtre du boulier encore utilisé dans certains pays.
- On trouve sa trace en mésopotamie (2700-2300 av. JC)



### Les calculateurs analogiques

Un calculateur analogique est un calculateur qui utilise des mesures physiques continues (par exemple électriques, mécaniques ou hydrauliques) pour modéliser un problème à résoudre, tel que le passage du temps, le déplacement d'un véhicule ou le déplacement des planètes.

Lorsque les conditions initiales d'un calculateur analogique sont saisies, il n'est plus modifié que par l'action continue de son stimulateur ; manivelle, pendule/poids, roue d'un véhicule, etc...

La machine d'Anticythère est un calculateur analogique,le plus ancien connu à ce jour est daté de 87 av. JC.
Il s'agit d'un outil grec pour prévoir les eclipses lunaires.

<img src="../anticythere.jpg" style="width:150px; position:absolute; right:420px; bottom: 15px; z-index:0;"/>


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

<div class="flex" style="display:flex;flex-direction:column;justify-content:center;  height:100%;">
<h3>
<b>
La principale marque d'un ordinateur est sa programmabilité
</b>
</h3>

Celle-ci permet à l'ordinateur d'émuler toute autre machine à calculer en changeant la séquence des instructions disponibles.
</div>

---

## Premières machines programmables

---

### Apparition de la carte perforée

Au 17ème siècle, on voit apparaître la carte perforée dans divers automates, notamment les métiers à tisser, orgues de barbarie et pianos mécaniques.

Le plus vieil usage se retrouve en 1725 dans les métiers à tisser français, notamment ceux de Jacquard.

En 1834, **Charles Babbage** utilise les cartes du métier Jacquard pour donner des instructions et des données à sa machine analytique, l'ancêtre des ordinateurs.


<img style="height:250px;float:left;display:inline;" src="../ada.jpg"/> 
<img style="height:250px;float:right;display:inline;" src="../PunchedCardsAnalyticalEngine.jpg"/> 

<div style="float:left;display:inline;">
<b>Ada Lovelace</b>, première programmeuse de l'histoire à travailler sur la machine analytique de Charles Babbage.
</div>

---

## Essor de l'informatique

### XIX siècle
Le recensement de la population des États-Unis (🇺🇸) de 1880 prit sept ans à analyser. Un appel d'offres pour un système d'analyse plus rapide fut lancé avant le recensement de 1890. 

**Herman Hollerith** fut choisi car sa solution est 2 fois plus rapide que les autres grâce aux cartes perforée. 

En 1896, Herman Hollerith crée the Tabulating Machine Company.

<img style="height:200px;" src="../hhollerith.jpg"/>
<img style="height:200px;" src="../CTR.png"/>

La société fusionne le 16 juin 1911 avec _la Computing Scale Company_ sous le nom de la multinationale...
--
**Computing Tabulating Recording Company** (CTR).

---

### XX siècle

- **Fredrik Rosing Bull** (🇳🇴) dépose le 31 juillet 1919 un brevet pour une "trieuse-enregistreuse-additionneuse combinée à cartes perforées"

- 1924 : CTR change de nom et se fait appeler **International Business Machines Corporation**

<img style="height:200px; position:absolute; right:0px;top:170px;" src="../IBM2446.png"/>

--

<div style="text-align:center; margin-top:70px;margin-bottom: 50px;"><h3><b> IBM </b></h3></div>
--

- 1930 : Compagnie Belge (🇧🇪) prend le nom **Bull** (pour utiliser les brevets de **Bull**)

- 1934 : Bull : 15% des parts de marché mondial, concurrent direct d'IBM.

_Bull appartient à cette époque à la même famille propriétaire des **Papeteries Aussedat**._

---

## Première génération (1936-1956)

- En 1938, Konrad Zuse (🇩🇪) commença la construction des premières séries-Z (programmation de missiles)

    - ordinateurs électromécaniques

--
- Seconde Guerre Mondiale ⚔️🤯

--
- 1940 : Bell Labs met en place un ordinateur pilotable à distance capable de faire une multiplication en 1 minute.


--
- 1940 : Premiers ordinateurs en système binaire


--
- 1941 : Konrad Zuse - Z3 - 4 additions par secondes ou 15 multiplications minutes


--
- 1943 : Recherche sur le déchiffrement des messages militaires Nazi d'Enigma : **Colossus**


--
- 1944 : Harvard Mark I - IBM 3 opérations/secondes sur des nombres à 23 chiffres. (100 000 000 000 000 000 000 000) - Taille : 37m² (**plus grand que mon appartement**)


--
- 1945 : **ENIAC** (Electronic Numerical Integrator and Computer), gros calculateur entièrement électronique.
+30Tonnes, 160m², 160kW. 100 000 additions ou 357 multiplications par seconde.

--
- 1948 : Architecture Von Neumann

---

<div style="margin-left: 10px; margin-bottom: 10px; float: right;">
<img src="../vonNeumann.png" style="margin-left: 10px; margin-bottom: 10px;"/>
</div>
- Unité Arithmétique et Logique (UAL ou ALU en anglais) ou unité de traitement : effectuer les opérations de base ;

- Unité de contrôle, chargée du « séquençage » des opérations ;

- Mémoire qui contient à la fois les données et le programme qui indiquera à l'unité de contrôle quels sont les calculs à faire sur ces données. 
  - Mémoire volatile : programmes et données en cours de fonctionnement 

  - Mémoire permanente : programmes et données de base de la machine

- Les dispositifs d'entrée-sortie, qui permettent de communiquer avec le monde extérieur.

# Architecutre Von Neumann

---

- 1945 : **ENIAC** (Electronic Numerical Integrator and Computer), gros calculateur entièrement électronique.
+30Tonnes, 160m², 160kW. 100 000 additions ou 357 multiplications par seconde.

<img src="../Eniac.jpg" style="width: 400px; margin-left: 10px; margin-bottom: 10px; position:absolute;right:10px;"/>

- 1948 : Architecture Von Neumann

--



--

- 1951 : Premier ordinateur commercial - vendu à 9 exemplaires en 6 ans.

--

- 1952 : IBM 701 - ordinateur militaire :  
 16 000 additions ou 2 200 multiplications par seconde

---
Avant de passer à la seconde génération d'ordinateurs (1957) revenons 10 ans en arrière.
# 1947

- Invention du transistor.
--

_C'est quoi un Transistor ?_
--


Un transistor, c'est un interrupteur contrôlé électriquement et sans aucune partie mécanique, contrairement à un relais.

--

![](../transistor-relay.jpg)

- Relais : un courant passe dans une bobine et génère un champ magnétique qui va activer le contact
- Transistor NPN : si un courant arrive sur la borne C, le courant passe entre B et E.


---

On remplace les tubes à vides par des transistors car moins fragiles et moins lourds/encombrants.

![](../tube-vs-transistor.png)

--

FYI : le Ryzen 9 5950 X sorti en octobre 2020 contient 19.2 milliards transistors

<img src="../ryzen-size.jpg" style="width:200px"/>

---

# Seconde Génération (1957-1965)

_NB : on parle de génération commerciales, et non techniques_

- 1956 : premier système à base de disque dur par IBM.

  - IBM 350 - 50 disques de 24 pouces avec 100 pistes par faces : 5 Mega-octets  (coût : 10 000$/Mo )
  - Premier langage de programmation universel : Fortran

- 1958 : Bull - Premier ordinateur multitâches et multiprocesseur.

- 1959 : IBM 1401 - vendu à plus de 10k exemplaires

- 1960 : DEC (Digital Equipment Corporation) lance le PDP-1 - premier concept de mini-ordinateur
  - 100k opérations secondes

--

<img src="../PDP-1.jpg" style="width:150px"/>


---
# Le circuit intégré (1959)
Geophysical Service Incorporated (GSI, crée en 1930) subit une restructuration et change de nom en 1951 pour **Texas Instruments**.

- **Jack Kilby** (prix nobel de physique en 2000) rejoint TI en 1958 et fin des années 50, découvre le circuit intégré.

Wiki définition :
```
Le circuit intégré (CI) est un composant électronique, basé sur un semi-conducteur, reproduisant une,
ou plusieurs, fonction(s) électronique(s) plus ou moins complexe(s), intégrant souvent plusieurs types 
de composants électroniques de base dans un volume réduit (sur une petite plaque), rendant le 
circuit facile à mettre en oeuvre
```

Un semi-conducteur c'est un matériau isolant qui est capable de faire passer du courant électrique 🤯

<img src="../ic.jpg" style="width:200px"/>

Pas si petit que ça ?

---

| Nom  | Signification                 | Année de sortie | Nombre de transistors | Nombre de portes logiques par boîtier   |
|------|-------------------------------|-----------------|------------------------|----------------------------------------|
| SSI  | Small-Scale Integration       | 1964            | 1 à 10                 | 1 à 12                                 |
| MSI  | Medium-Scale Integration      | 1968            | 10 à 500               | 13 à 99                                |
| LSI  | Large-Scale Integration       | 1971            | 500 à 20 000           | 100 à 9 999                            |
| VLSI | Very Large-Scale Integration  | 1980            | 20 000 à 1 000 000     | 10 000 à 99 999                        |
| ULSI | Ultra Large-Scale Integration | 1984          | 1 000 000 et plus      | 100 000 et plus                        |



La loi de Moore est une loi empirique émise en 1965 qui dit qu'il y aura le doublement du nombre de transistors présents sur une puce de microprocesseur tous les deux ans.

<img src="../moore.png" style="width:400px"/>

---

# Troisième génération (1963-1971)

Mission Apollo (1961-1972) est le premier usage des circuits intégrés dans les systèmes de guidage.
On peut enfin commencer à parler de "mini-ordinateurs".


<img src="../PDP-7.jpg" style="width:400px"/>

Moins d'encombrement, et plus de constructeurs !
- Premier Mini-ordinateur de Hewlett-Packard (HP 3000) en 1972

---

# Quatrième génération (1972 - 1990)

<br/>

- 15 novembre 1971 : Intel dévoile le premier microprocesseur commercial : le 4004 

Un microprocesseur est un processeur dont tous les composants ont été suffisamment miniaturisés pour être regroupés dans un unique boîtier.

- 1974 : Intel 8080 : vague d'ordinateurs personnels
--


- 1976 : Apple 1
--


- 1977 : Apple 2
--


- 1981 : IBM **PC**
--


- 1982 : Commodore 64 (l'ordinateur le plus vendu de tous les temps) - entre 17 et 25 millions d'unités
--


- 1984 : le Macintosh - avec une souris, et une **interface graphique**

---

# Années 1990

<br/>

- Avènement d'internet, bugs de l'an 2000, ...

- Premier smartphone, l'IBM Simon :

--
1992.

--

<img src="../simon.png" style="height:400px"/>


---

# Question ouverte : Quels sont les composants d'un ordinateur ?

--

Un ordinateur est composé :
- d'une carte mère

- d'un CPU (Central processing Unit)

- de mémoire vive (RAM)

- de mémoire de masse (Disque Dur/SSD)

- d'une carte graphique

- de périphériques d'entrées

- de périphériques de sorties

- d'une alimentation

- d'un boîtier

---

## La carte mère

La carte mère est un circuit imprimé qui supporte la plupart des composants et les connecteurs nécessaires au fonctionnement d'un ordinateur. 

<img src="../cm.jpg" style="width:500px; position:absolute; right:20px; z-index:0;"/>


Elle est composée de : 
- Connecteurs pour les autres composants

- Une Pile d'horloge

- D'une mémoire morte (ROM) qui contient le  
  micro-logiciel de la machine le **BIOS**  
  (ou UEFI depuis 2006)

<img src="../uefi.png" style="width:300px; position:absolute; right:20px; z-index:0;"/>

- Des ports d'entrées-sorties

- Parfois d'une carte graphique intégrée


L'UEFI (Unified Extensible Firmware Interface) est une couche   
qui a pour but de faire le lien entre la machine (Hardware) et  
la couche du système d'exploitation (Software).  

C'est lui qui va initier le lancement du système d'exploitation.


---

## Le CPU

Le processeur (Central Process Unit) est le coeur même de l'ordinateur.
Il fait partie des composants présents depuis le début de l'informatique.

Les processeurs actuels respectent l'architecture Von Neumann.

--

<img src="../cpu.png" style="width:500px; position:absolute; left:20px; z-index:0;"/>

<img src="../intel.jpg" style="width:300px; position:absolute; left:500px; z-index:0;"/>

--

<img src="../vonNeumann.png" style="width:400px; position:absolute; right:20px; z-index:0;"/>

---

## Mémoire vive (RAM)

La mémoire vive (RAM - Random Access Memory) est une mémoire qui peut être lue et changée dans l'importe quel ordre **sans impact de performances**, souvent utilisée pour stocker la mémoire courante de l'ordinateur.

La RAM est souvent associée à de la mémoire volatile, perdue dès qu'il n'y a plus de courant qui l'allimente. 

--

<img src="../ram.jpg" style="width:400px; position:absolute; right:20px; z-index:0;"/>

La vitesse d'écriture/lecture de la RAM est de l'ordre de la nanoseconde. 

---

## Mémoire de masse

Une mémoire de masse est une mémoire de grande capacité, et non volatile.  

On parlait également de ROM - Read-Only Memory pour certains supports, mais ce terme n'a plus lieu d'être.

### Quels types de mémoires connaissez-vous ?

--

<img src="../mass.jpg" style="width:400px; position:absolute; right:20px; z-index:0;"/>


On distingue 5 mémoires utilisées aujourdhui : 
- Les bandes magnétiques (oui oui)
- Les disques durs
- Les SSD (Solid-State Drive)
- Les disques optiques (CD/DVD/Blu-ray)
- La mémoire flash (cartes mémoire/clé USB/lecteur MP3)

---

## Cartes Graphiques (GPU)

Un GPU (Graphical Processing Unit) est un processeur dédié au calcul d'image, à afficher à l'écran ou à écrire sur la mémoire de masse. La structure est hautement parallèle ce qui le rend hautement efficace pour les rendus 3D, la manipulation de flux vidéos etc...

Autres usages actuels : Machine learning, Minage de Cryptomonnaies,...

<img src="../cg.jpg" style="width:400px; position:absolute; right:420px; z-index:0;"/>

---


## Quels périphériques d'entrées/sorties connaissez-vous ? 

--
<style>
  th{
    padding:5px;
  }
</style>

<br/>

| Périphérique   |  Entrée |   Sortie        |
|-----|--------------------|-----------------|

--
|Imprimante
--
||X|

--
|Clavier
--
|X||

--
|Scanner
--
|X||

--
|Manette de jeux
--
|X|X|

--
|Souris
--
|X||

--
|Micro
--
|X||

--
|Écran
--
||X|

--
|Enceintes
--
||X|

--
|Tablette graphique
--
|X|X|






