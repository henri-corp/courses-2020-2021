---
title: "1 - intro" 
description: "Qu'est-ce que les systèmes et pourquoi on l'apprend ?"
light: true
type: presentations
---


# Débat ouvert
--


- **Pourquoi sensibiliser les étudiants aux systèmes ?**

--

- **C'est quoi un système d'exploitation ?**

--

-  **Quels systèmes d'exploitation connaissez-vous ?**

---

# Mais avant...

--

# [henri.run/r/U7j](https://henri.run/r/U7j)

... à tout à l'heure!

<div class="qrcode">
![](https://henri.run/r/U7j)
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
<script>
var typeNumber = 4;
var errorCorrectionLevel = 'L';
var qr = qrcode(typeNumber, errorCorrectionLevel);
qr.addData('Hi!');
qr.make();
document.querySelector('qrcode').innerHTML = qr.createImgTag();
</script>


---

# Un système d'exploitation c'est quoi ?
--

En informatique, un système d'exploitation (souvent appelé OS — de l'anglais Operating System) 
est un ensemble de programmes qui dirige l'utilisation des ressources d'un ordinateur par des logiciels applicatifs.

--

- Il reçoit les demandes d'utilisation des applications pour les ressources de l'ordinateur
    - ressources de stockage (mémoire vive et disque durs) 💾
    - ressources de calcul du CPU 🧠
    - ressources de communications vers les périphériques 🖱️🖨️⌨️
    - ressources de réseau 🌍
    



---
class: img-margins
# Quels systèmes d'exploitations connaissez vous ?
--

## Windows
 <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Windows_logo_-_2012_%28dark_blue%29.svg" height="50px">
--

## Apple
 <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" height="50px">
--
 <img src="https://upload.wikimedia.org/wikipedia/commons/6/63/IOS_wordmark_%282017%29.svg" height="50px">
--
 <img src="https://upload.wikimedia.org/wikipedia/commons/b/b4/IPadOS_wordmark.svg" height="50px">
--

## Autre ?
--

<img src="https://upload.wikimedia.org/wikipedia/commons/d/d7/Android_robot.svg" height="50px">
--

<img src="https://upload.wikimedia.org/wikipedia/commons/9/94/Ubuntu_logoib.svg" height="50px">
--

<img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Debian_logo.png" height="50px">

--
<img src="https://upload.wikimedia.org/wikipedia/commons/d/d0/OpenSUSE_Logo.svg" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/commons/3/3f/Fedora_logo.svg" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Aktualne_logo_Oracle_Solaris_OS_OSos.png" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/fr/b/b1/Logo-freebsd.svg" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/commons/7/74/Arch_Linux_logo.svg" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/commons/0/07/Manjaro-logo.png" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/commons/d/db/Elementary_logo.svg" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Centos-logo-light.svg" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/en/a/a2/Red_Hat_Enterprise_Linux_logo.svg" height="50px">
--
<img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Gentoo_Linux_logo_matte.svg" height="50px">
--
... Et beaucoup d'autres...

---

# Pourquoi ce cours ? 

--
- Parce que vous allez travailler sur certains de ces systèmes 🧑‍💼

--
- Parce que l'ouverture d'esprit, c'est bien 🧠

--
- Parce que connaitre son outil, c'est savoir mieux l'utiliser 💡

---

# Un peu d'histoire

On retrace ensemble l'histoire des systèmes d'exploitation.

---
## 1948 L'arrivée du transistor

Avec l'arrivée du transistor marque le début de l'informatique. 

Inventé en 1948 chez Bell Labs ([Qui ?](https://www.bell-labs.com/timeline/#/2020/1/closed/)).

Un Transistor c'est quoi ? 

--

C'est un interrupteur contrôlé électroniquement, sans partie mécanique 💡.

--


-------------

Du coup, c'est cool, on commence à avoir des machines capables de faire quelque chose.

--

Les premières machines lisent des cartes perforées et exécutent bêtement le programme. On est loins des Systèmes d'exploitation.


---

## 1960 et la limite des cartes perforées.

Mais le problème :
--
**La loi de Moore**.  

--

À la fin des années 50 on a des machines 8 fois plus puissantes. Les gens commencent à faire des systèmes capables de 
gérer plus de choses en même temps.

Il faut des systèmes capables de faire une file d'attente des cartes à exécuter, et quelqu'un pour orchestrer tout ça  : 

--

**Le système d'exploitation**

--

Des premiers systèmes voient le jour, encore loin de là où nous sommes aujourd'hui. 

---
## 1968 - Unix glory

Cette année là, on voit la naissance d'un bébé chez *Bell Labs AT&T* : Unix. 

Unix qu'est ce que c'est ? 

--

Unix est un système d'exploitation multitâche et multi-utilisateur.

--

AT&T n'ayant pas le droit de vendre autre chose que des équipements téléphoniques/télégraphiques,
Bell labs décide de distribuer le code source de son système aux universités.

--

en 1977, avec la version 6 d'UNIX, l'université Berkeley de Californie décide de modifier le système
et en fait son propre système : BSD (Berkeley Software Distribution). 

--

En 1991, BSD se décline en FreeBSD.

--

Le système d'exploitation célèbre à tourner sous FreeBSD est macOS X 🍎.

---

## Pendant ce temps chez Bill

Microsoft a été créée en 1975 par Bill Gates et Paul Allen pour fabriquer des programmes en BASIC pour l'Altair 8800.

--

En 1981, Microsoft signe un partenariat avec **IBM** pour équiper son premier **Personal Computer** en 1981 d'un système d'exploitation : 
**MS-DOS**.

--

MS-DOS équipe toutes les versions windows 3.1, 95, 98, Millenium.

--

En 1993, Windows développe en parallèle pour les entreprise son noyau : Windows NT.
(NT : *New Technology*)

--

En 2001, MS DOS est abandonné, arrive Windows XP avec son noyau NT.

--

Puis Windows Vista, 7, 8, 8.1 et aujourd'hui le 10.

--

**Aujourd'hui, Microsoft est le second cloud-provider au monde avec des millions de machines qui tournent sous...**


---

## Pendant ce temps en finlande 🐧

--

En 1991, un étudiant du nom de Linus Torvalds s'intéresse aux systèmes d'exploitation,
et est consterné par la licence de distribution d'Unix, réservé uniquement au domaine universitaire.

--
    
Il crée alors Linux et le distribue sous licence **GNU GPL** (Licence contaminante). 

--

Très vite il associe aux développeurs de GNU (dérivé de UNIX) et forment ensemble le système GNU/Linux

--

- 1993 : Debian, la première distribution basée sur Linux encore utilisée aujourd'hui
--
  
- 1998 : Oracle apporte son soutient en migrant sur le système
--
  
- 2001 : IBM apporte sur la table 1B$
--

- 2004 : Ubuntu sort (**LA** distribution Linux Grand Public)
--
  
- 2007 : Android 🤖
--
  
- 2010 : Microsoft Azure 🌥️️️ ❤️

---

## Et Aujourd'hui ? 

--

> Linux est un cancer qui s'attache, au sens de la propriété intellectuelle, à tout ce qu'il touche.
>> Steve Balmer - PDG de Microsoft / 2000-2014


--

![](https://upload.wikimedia.org/wikipedia/commons/3/35/Tux.svg)

Linux est le système d'exploitation le plus utilisé au monde



--

Et vous dans tout ça ?


