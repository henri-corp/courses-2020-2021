---
title: "2 - Formats de données" 
light: false
type: presentations
weight: 2021021102
---

En informatique, un **format de données** est la façon dont est **représenté** (codé) un type de données, sous forme d'une **suite de bits**. Par commodité, on interprète cette suite de bits comme un nombre binaire, et on dit par raccourci que la donnée est représentée comme un nombre. Par exemple, le caractère `C` est généralement codé comme une suite dont 3 bits sont activés, ce que l'on écrit `0100 0011`, soit `67` en décimal.

Un **format de données** est ainsi une **convention** (éventuellement normalisée) utilisée pour représenter des données — des informations représentant un texte, une page, une image, un son, un fichier exécutable, etc. C'est un gabarit où les données sont placées à des endroits particuliers pour que l'outil qui lit ce format trouve les données où il s'attendait à les trouver. Lorsque ces données sont stockées dans un fichier, on parle de format de fichiers.

---
# Formats d'image

## Format bitmap

![](https://upload.wikimedia.org/wikipedia/commons/d/df/Image_carte_de_points.png)

On peut découper une image en points élémentaires, ou « pixel », et attribuer une couleur à ce pixel. La couleur est représentée par un nombre, la correspondance couleur → nombre étant faite par une « palette ».

Les grandes différences entre les formats existants sont la profondeur de couleurs (1 bit : noir ou blanc, 8 bits : 256 couleurs, 24 bits : 16 millions de couleurs…) et le type de compression

En prenant une image de largeur `n`, les `n` premiers points de la donnée représentent la première ligne, la seconde ligne représente `n+1` à `2n`, la troisième ligne `2n+1`,à `3n`...

---

# Formats d'image

## Format bitmap

Prenons une bitmap noir et blanche,(1 la couleur de forme, 0 la couleur de fond)

```
1000101010001000101010001
```

--
count: false

En coupant la chaine de caractèrespar rapport à n=5,

```
10001
01010
00100
01010
10001
```

--
count: false

et en représentation d'image :

```
█   █
 █ █ 
  █  
 █ █ 
█   █
```

--
count: false

Formats populaires : JPEG, PNG, GIF, TIFF,...





---
# Formats d'image

## Format vectoriel

Une image au format vectoriel est une image qui se décrit par des ensembles de coordonnées mathématiques et non par une carte de point. Par exemple :

- pour décrire une ligne il suffit de connaître son point de départ et d'arrivée ;
- pour un rectangle (ayant ses côtés alignés aux axes du système de coordonnées en cours), deux points suffisent aussi (deux coins opposés) ;
- pour un cercle, un seul point, ainsi qu'un rayon, sont nécessaires.

En outre, des informations sur le tracé sont nécessaires : les attributs graphiques sont l'épaisseur, le style (continu ou pointillés), la couleur du trait, sa transparence, etc.

Une image vectorielle est donc un ensemble de coordonnées, d'attributs et de commandes que le programme d'affichage (à l'écran ou sur papier) se charge d'interpréter.

Pour des images pouvant être réduites facilement à des formes géométriques (typographisme, cartographie…), le format vectoriel est extrêmement économe.

La particularité des formats vectoriels réside dans le fait que leur rendu final ne dépend que de la résolution du périphérique de sortie. Ce type d'image peut aussi être agrandi sans effets gênants ; il n'y a pas d'effet de « pixellisation » (les lignes diagonales ou courbes n'apparaissent pas sous forme d'escalier).


---
# Formats d'image

## Format vectoriel

Par exemple, en SVG :

--
count: false

faire une ligne
```xml
  <line x1="0" y1="0" x2="100" y2="100" stroke="black" />
```

--
count: false

faire un cercle
```xml
  <circle cx="50" cy="50" r="50" stroke="red" fill="transparent"/>
```

--
count: false

faire un rectangle
```xml
  <rect x="80" y="80" width="100" height="100" rx="2" fill="yellow"/>
```

--
count: false

<svg style="background: white;" width="200" height="200">
  <line x1="0" y1="0" x2="100" y2="100" stroke="black" />
  <circle cx="50" cy="50" r="50" stroke="red" fill="transparent"/>
  <rect x="80" y="80" width="100" height="100" rx="2" fill="yellow"/>
</svg>

---

# Formats de vidéo/son

Un format vidéo décrit comment un dispositif envoie des images d'une vidéo à un autre dispositif, de la même manière qu'un lecteur de DVD envoie des images à un téléviseur, ou un ordinateur à son moniteur. Plus formellement, le format visuel décrit l'ordre et la structure des images qui créent l'image vidéo.

Il existe une distinction entre les **formats analogiques** et les **formats numériques**.

---

# Formats textes

Représentation d'une suite de caractères. Chaque caractères est stocké sous forme de nombre, et ce nombre se retrouve dans une table de correspondance avec les-dits caractères pour afficher la lettre.

Il existe plusieurs tableau d'encodage : 

---

## ASCII

Limité à 255 caractères, c'est le standard américain en informatique.

---

## Windows-1252/ISO 8859

Windows-1252 ou CP1252 est un jeu de caractères, utilisé historiquement par défaut sur le système d'exploitation Microsoft Windows en anglais et dans les principales langues d'Europe de l'Ouest, dont le français.


- ISO 8859-1 : Latin-1 Western European
- ISO 8859-2 : Latin-2 Central European
- ISO 8859-3 : Latin-3 South European
- ISO 8859-4 : Latin-4 North European
- ISO 8859-5 : Latin/Cyrillic
- ISO 8859-6 : Latin/Arabic
- ISO 8859-7 : Latin/Greek
- ISO 8859-8 : Latin/Hebrew
- ...
- ISO 8859-16 : Latin-10 South-Eastern European

---

<div>
<img src="https://i.imgur.com/LorEZol.png" height="100%;">
</div>

---

## Unicode (ISO 10646)

Unicode est un standard informatique qui permet des échanges de textes dans différentes langues, à un niveau mondial. Il est développé par le Consortium Unicode, qui vise au codage de texte écrit en donnant à tout caractère de n'importe quel système d'écriture un nom et un identifiant numérique, et ce de manière unifiée, quels que soient la plate-forme informatique ou le logiciel utilisé.

