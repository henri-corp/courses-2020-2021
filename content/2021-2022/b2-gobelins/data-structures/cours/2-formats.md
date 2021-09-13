---
title: "2 - Formats de données" 
light: true
type: presentations
weight: 2021021102
---

En informatique, un **format de données** est la façon dont est **représenté** (codé) un type de données, sous forme d'une **suite de bits**. Par commodité, on interprète cette suite de bits comme un nombre binaire, et on dit par raccourci que la donnée est représentée comme un nombre.

Par exemple, le caractère `C` est généralement codé comme une suite dont 3 bits sont activés, ce que l'on écrit `0100 0011`, soit `67` en décimal.

Un **format de données** est ainsi une **convention** (éventuellement normalisée) utilisée pour représenter des données — des informations représentant un texte, une page, une image, un son, un fichier exécutable, etc. 

C'est un gabarit où les données sont placées à des endroits particuliers pour que l'outil qui lit ce format trouve les données où il s'attendait à les trouver. Lorsque ces données sont stockées dans un fichier, on parle de format de fichiers.

Ces formats de fichiers peuvent contenir des données supplémentaires dites "méta-données", qui ne sont pas la donnée elle même mais un complément d'information. Pour un fichier de musique, il peut s'agir des données sur l'album et l'artiste, pour une image, le type d'appareil photo utilisé, la position GPS...


---

## Idée reçues sur les Extensions

Une extension de fichier **ne définit pas** le type du fichier.  

Ce qui définit le fichier c'est la capacité à un logiciel à repérer 
certaines informations dans le fichier qui lui indiquent le format.

En parlant de format on parle également de [MIME-types](https://www.rfc-editor.org/rfc/rfc2046.html) (Multipurpose Internet Mail Extensions), un standard de notation du type de media.


---
# Formats d'image

### Format bitmap

![](https://upload.wikimedia.org/wikipedia/commons/d/df/Image_carte_de_points.png)

On peut découper une image en points élémentaires, ou « pixels », et attribuer une couleur à ce pixel. La couleur est représentée par un nombre, la correspondance couleur → nombre étant limité par une « palette ».

Les grandes différences entre les formats existants sont la profondeur de couleurs (1 bit : noir ou blanc, 8 bits : 256 couleurs, 24 bits : 16 millions de couleurs…) et le type de compression

En prenant une image de largeur `n`, les `n` premiers points de la donnée représentent la première ligne, la seconde ligne représente `n+1` à `2n`, la troisième ligne `2n+1`,à `3n`...

---

# Formats d'image

### Format bitmap

Prenons une bitmap noire et blanche (1 la couleur de forme, 0 la couleur de fond)

```
1000101010001000101010001
```

--
count: false

En coupant la chaîne de caractères par rapport à n=5,

```
10001
01010
00100
01010
10001
```

--
count: false

Et en représentation d'image :

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

### Format vectoriel

Une image au format vectoriel est une image qui se décrit par des ensembles de coordonnées mathématiques et non par une carte de point. Par exemple :

- pour décrire une ligne, il suffit de connaître son point de départ et d'arrivée ;
- pour un rectangle (ayant ses côtés alignés aux axes du système de coordonnées en cours), deux points suffisent aussi (deux coins opposés) ;
- pour un cercle, un seul point, ainsi qu'un rayon, sont nécessaires.

En outre, des informations sur le tracé sont nécessaires : les attributs graphiques sont l'épaisseur, le style (continu ou pointillés), la couleur du trait, sa transparence, etc.

Une image vectorielle est donc un ensemble de coordonnées, d'attributs et de commandes que le programme d'affichage (à l'écran ou sur papier) se charge d'interpréter.

---
# Formats d'image

### Format vectoriel

Pour des images pouvant être réduites facilement à des formes géométriques (typographisme, cartographie…), le format vectoriel est extrêmement économe.

La particularité des formats vectoriels réside dans le fait que leur rendu final ne dépend que de la résolution du périphérique de sortie. Ce type d'image peut aussi être agrandi sans effets gênants ; il n'y a pas d'effet de « pixellisation » (les lignes diagonales ou courbes n'apparaissent pas sous forme d'escalier).

Par exemple, en SVG :

--
count: false

Faire une ligne
```xml
  <line x1="0" y1="0" x2="100" y2="100" stroke="black" />
```

--
count: false

Faire un cercle
```xml
  <circle cx="50" cy="50" r="50" stroke="red" fill="transparent"/>
```
---
# Formats d'image

### Format vectoriel

Faire un rectangle
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

# Formats d'image

### Mime Types

| Extension | Type de document                  | Mime          |
|-----------|-----------------------------------|---------------|
| jpg, jpeg | image au format JPEG              | image/jpeg    |
| png       | Portable Network Graphics         | image/png     |
| gif       | Graphics Interchange Format (GIF) | image/gif     |
| svg       | Scalable Vector Graphics (SVG)    | image/svg+xml |



---

# Formats de vidéo/son

Un format vidéo décrit comment un dispositif envoie des images d'une vidéo à un autre dispositif, de la même manière qu'un lecteur de DVD envoie des images à un téléviseur, ou un ordinateur à son moniteur. 

Plus formellement, le format visuel décrit l'ordre et la structure des images qui créent l'image vidéo.

Il existe une distinction entre les **formats analogiques** et les **formats numériques**.

<img src="../analvsnum.png" style="width:100%"/>
---

# Formats de vidéo/son

| Extension  | Type de document                            | Mime                    |
|------------|---------------------------------------------|-------------------------|
| .oga       | OGG audio                                   | audio/ogg               |
| .ogv       | OGG video                                   | video/ogg               |
| .mp3       | MP3 audio                                   | audio/mpeg              |
| .mp4       | MP4 video                                   | video/mp4               |
| .avi       | AVI: Audio Video Interleave                 | video/x-msvideo         |
| .mid .midi | Musical Instrument Digital Interface (MIDI) | audio/midi audio/x-midi |


---

# Formats textes

Représentation d'une suite de caractères. Chaque caractères est stocké sous forme de nombre, et ce nombre se retrouve dans une table de correspondance avec les-dits caractères pour afficher la lettre.

Il existe plusieurs tableau d'encodage : 

- ASCII
- ISO 8859
- Unicode

---

## ASCII 👌

Limité à 127 caractères, c'est le standard américain en informatique.

<img src="../ASCII.svg" style="height:500px"/>

---

## Windows-1252/ISO 8859 💩

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

## Unicode (ISO 10646) ❤️

Unicode est un standard informatique qui permet des échanges de textes dans différentes langues, à un niveau mondial. Il est développé par le Consortium Unicode, qui vise au codage de texte écrit en donnant à tout caractère de n'importe quel système d'écriture un nom et un identifiant numérique, et ce de manière unifiée, quels que soient la plateforme informatique ou le logiciel utilisé.

<img src="../codespace-map.png" style="height:440px; position: absolute;right:80px;"/>

Unicode peut être encodé sur 8 bits (UTF-8) - soit +2M de caractères,  
16 bits (UTF-16) ou 32 bits (UTF-32). 


- Chaque petit carrés représente 256 caractères,  
- Chaque grand carrés représente 65536 caractères,  
- En bleu les caractères déjà assignés,  
- En blanc les espaces encore disponibles,  
- En vert les caractères privés.

source :
https://www.reedbeta.com/blog/programmers-intro-to-unicode/

--
<style>
  .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {  
  50% { opacity: 0; }
}
</style>

<b style="color:red; background: yellow; font-size:80px;" class="blink_me">Utilisez Unicode !</b>

---

<div style="display:flex;flex-direction:column; text-align:center;height:100%;justify-content:center;">
<b style="font-size:40px;">
Un format de données est une convention
</b>
</div>

---

## Format TXT

Le format **txt** est le format basique d'un fichier non binaire qui peut être lu par un humain.
C'est le format le plus simple, car basique, et contient directement les caractères.

mime : `text/plain`

---

## Les formats de structures

Les formats de structures permettent de stocker de l'information structurée plus ou moins complexe.

Chaque format a ses **avantages et inconvénients**, et le choix du format dépend uniquement de la complexité de la donnée, et **non de son usage**.
---

## XML (Extensible Markup Language)
XML est un format ancien créé en 1996 et publié par la W3C. C'est un langage Human-Readable👩‍🦱 et Machine-Readable 🤖 car son objectif est de rester simple.

```XML
<?xml version="1.0" encoding="UTF-8"?>
<books>
  <book>
    <id>ASI01</id>
    <title>Foundation</title>
    <author>Isaac Asimov</author>
    <year>1951</year>
  </book>
</books>
```
```XML
<?xml version="1.0" encoding="UTF-8"?>
<books>
  <book id="ASI01">
    <title>Foundation</title>
    <author id="37"/>
    <year>1951</year>
  </book>
</books>
```
---
```XML
<?xml version="1.0" encoding="UTF-8"?>
<books>
  <book id="ASI01" title="Foundation" author="37" year="1951">
    Fondation est une chronique qui relate les grandes crises auxquelles la petite planète 
    Terminus devra faire face au fil des siècles, et des grandes figures qui marqueront son
    histoire dans l'ascension de la Fondation vers le destin que lui a dessiné Hari Seldon :
    devenir le berceau d'où naîtra le Nouvel Empire.
  </book>
</books>
```
Mime: `application/xml`

| Avantages                         |     Inconvénients                     |
|-----------------------------------|---------------------------------------|
| Complet                           | Très verbeux                          |
| Possibilité d'avoir des attributs | Complexe sur des structures profondes |

Dérivés :
 - RSS (flux de journaux standards)
 - SVG (images vectorielles)
 - HTML (langage Web)

et pleins d'autres...

---

### CSV (Coma-Separated Values)

CSV est un format de données tabulaire dont les champs sont séparés par des virgules (`text/csv`).  
Une variante au CSV est le TSV (Tab-separated Values `text/tab-separated-values`)

```csv
id,title,author,year
ASI01,Foundation,Isaac Asimov,1951
ASI02,Foundation and Empire,Isaac Asimov,1952
```
Sa variante TSV

```tsv
id	title	author	year
ASI01	Foundation	Isaac Asimov	1951
```
Et pour les cas complexes : 
```csv
id,title,author,year
ADA01,"Life, the Universe and Everything","Douglas Adams",1982
```

| Avantages                           |     Inconvénients                          |
|-------------------------------------|--------------------------------------------|
| Simple                              | Simple                                     |
| Facile à lire                       | **ne permet pas les structures complexes** |
| Représentation en tableau naturelle |                                            |

---

### JSON (JavaScript Object Notation)

Format reprennant la structure javascript
```json
[
  {
    "id":"ASI01",
    "title":"Foundation",
    "author":"Isaac Asimov",
    "year":1951
  },
  {
    "id":"ASI02",
    "title":"Foundation and Empire",
    "author":"Isaac Asimov",
    "year":1952
  }
]
```
---
```json
{
  "ASI01": {
    "title":"Foundation",
    "author":"Isaac Asimov",
    "year":1951
  },
  "ASI02":{
    "title":"Foundation and Empire",
    "author":"Isaac Asimov",
    "year":1952
  }
}
```
Mime: `application/json`

| Avantages                         |     Inconvénients                     |
|-----------------------------------|---------------------------------------|
| Simple                            | Trop de symboles                      |
| Complet                           |                                       |

---

### YAML (Yet Another Markup Language)

YAML est un format léger de structure de donnée utilisé pour des fichiers de configuration entre autres.

```yaml
books:
  - id: ASI01
    title: Foundation
    author: Isaac Asimov
    year: 1951 #Good Year btw.
  - id: ASI02
    title: Foundation and Empire
    author: Isaac Asimov
    year: 1952
```

```yaml
books:
  ASI01:
    title: Foundation
    author: Isaac Asimov
    year: 1951
  ASI02:
    title: "Foundation and Empire"
    author: Isaac Asimov
    year: 1952
```

---

```yaml
--- # Some separator
authors:
  "Isaac Asimov": &asimov
    firstname: Isaac
    lastname: Asimov
ASI01:
  title: Foundation
  author: *asimov
  year: 1951
  description: |
    Fondation est une chronique qui relate les grandes crises auxquelles la petite planète 
    Terminus devra faire face au fil des siècles, et des grandes figures qui marqueront son
    histoire dans l'ascension de la Fondation vers le destin que lui a dessiné Hari Seldon :
    devenir le berceau d'où naîtra le Nouvel Empire.
```
```yaml
--- 
ASI01: 
  author: 
    firstname: Isaac
    lastname: Asimov
  description: |-
      Fondation est une chronique qui relate les grandes crises auxquelles la petite planète 
      Terminus devra faire face au fil des siè...
  title: Foundation
  year: 1951
authors: 
  "Isaac Asimov": {firstname: "Isaac" , lastname: "Asimov"}
```

---

### YAML

Mime: `application/x-yaml` ou `text/yaml` (⚠️pas de standard international)

| Avantages                         |     Inconvénients                     |
|-----------------------------------|---------------------------------------|
| Simple                            | structure faible/erratique            |
| Complet                           | Pas encore un standard W3C/ECMA       |

---

### TOML (Tom's Obvious, Minimal Language)
TOML est un format de fichier de configuration conçu afin d'être facile à lire et à écrire.
La version 1.0.0 est sortie le **12 Janvier 2021**.

```toml

[books]

# L'indentation est autorisée mais pas obligatoire
  [books.ASI01]
  title = "Foundation"
  author = "Isaac Asimov"
  year = 1951
```

Mime: `text/toml` (⚠️pas de standard international)

| Avantages                         |     Inconvénients                            |
|-----------------------------------|----------------------------------------------|
| Simple                            | Format peu pratique pour beaucoup de données |
|                                   | Pas encore un standard W3C/ECMA              |
|                                   | Très Jeune et non adopté par tout le monde   |

---

## Dans quel cas utiliser quel format ?

⚠️ Disclaimer : ce n'est que mon avis, de ce que j'ai pu rencontrer.


| Cas d'usage                     | Formats         |
|---------------------------------|-----------------|
| Stockage plat (tableaux,listes) | CSV, JSON       |
| Stockage structuré              | JSON, XML       |
| Configuration                   | YAML, TOML      |



---
## Les formats de présentation

Les formats de présentation sont des formats dont le but est de rendre une donnée finale de manière présentable et lisible par un être humain.

Ces formats sont très utilisés pour **restituer** l'information.


---
### HTML ❄️

HTML (et ses dérivés, HTM, XHTML) est un format de présentation de la donnée interprétée par un navigateur web.
C'est un format simple qui est dérivé de XML, et qui a pour but de structurer des pages internet.

```html
<html>
  <head>
    <title>Books</title>
  </head>
  <body>
    <div id="ASI01">
      <h1>Foundation</h1>
      <h2>Isaac Asimov - 1951</h2>
      <p>
      Fondation est une <b>chronique</b> qui relate les grandes crises auxquelles 
      la petite planète <i>Terminus</i> devra faire face au fil des siècles, et des 
      grandes figures qui marqueront son histoire dans l'ascension de la Fondation 
      vers le destin que lui a dessiné Hari Seldon : devenir le berceau d'où naîtra 
      le Nouvel Empire.  
      </p>
    </div>
  </body>
</html>
```
Mime : `text/html`

---
### Markdown ❤️

MD est un format de mise en forme de texte simple et minimaliste. Ce cours est rédigé à 95% en markdown.

```markdown
---
title: Books
---

# Foundation
## Isaac Asimov - 1951

Fondation est une **chronique** qui relate les grandes crises auxquelles 
la petite planète _Terminus_ devra faire face au fil des siècles, et des 
grandes figures qui marqueront son histoire dans l'ascension de la Fondation 
vers le destin que lui a dessiné Hari Seldon : devenir le berceau d'où naîtra 
le Nouvel Empire. 
   
```
Mime : `text/markdown`

---
### LaTeX (`/ˈlɑːtɛx/ LAH-tekh`) 1984 🧔🏻

LaTeX est un langage de présentation de données très utilisé dans le milieu académique.

<img src="../latex.png" style="width:450px;position:absolute;right:20px;"/>

```Tex
\documentclass{article}
\usepackage{hyperref}
\title{Fondation}
\author{Isaac Asimov}
\date{1951}
\begin{document}
\maketitle
Fondation est une \textbf{chronique} qui relate les grandes 
crises auxquelles la petite planète \textit{Terminus} devra 
faire face au fil des siècles, et des grandes figures qui  
marqueront son histoire dans l'ascension de la Fondation vers 
le destin que lui a dessiné Hari Seldon : devenir le berceau 
d'où naîtra le Nouvel Empire.
\end{document}

```

La grande force de LaTeX réside dans sa syntaxe mathématique

```latex
\frac{n!}{k!(n-k)!} = \binom{n}{k}
```
<img src="../latex2.svg" style="width:200px;"/>


---


### Les formats Office 💩

Office jusqu'en 2007 utilisait un format fermé propriétaire (.doc,.xls,.ppt).

En 2005, un nouveau standard a vu le jour,  Office Open XML déployé pour la version 2007 de word/excel/..., qui est en réalité un format XML archivé. (docx, xlsx, pptx)

Mimes : 
- docx : application/vnd.openxmlformats-officedocument.wordprocessingml.document
- xlsx : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
- pptx : application/vnd.openxmlformats-officedocument.presentationml.presentation