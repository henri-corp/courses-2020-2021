---
title: "Dossiers"
description: "Architecture du système"
light: true
---

## Current Working Dir

--

Le dossier courant, c'est le dossier dans lequel l'utilisateur se trouve.

Il est représenté par un `./` (point)


---

## Parent Dir

--

Le Parent directory, c'est le dossier au-dessus du dossier courant.

Il est représenté par un `..`


---

## Root Dir

--

Le root directory, c'est le dossier principal de l'appareil.

- Il se présente sous la forme de `/`

Il n'y a pas de dossier parent au dessus de ce dossier.

---
## Home Dir

--

Le home directory, c'est le dossier personnel de l'utilisateur.

- Il se présente sous la forme de `~`
- Souvent sous linux, se trouve dans `/home/nomUtilisateur`
- L'utilisateur root a son dossier dans `/root`


---

# Chemins Relatif/Absolu/Canonique

```raw
/
├── etc
│   ├── nginx
│   ├── php
│   └── ssh
├── home
│   └── henri
└── var
    ├── logs
    └── www
        └── public
```
Dossier courant `henri` dans le dossier `home`. Je souhaite aller dans le dossier `/var/www`
--

- Chemin canonique : `/var/www`
--
  
- Chemin Relatif : `../../var/www`
- Chemin Relatif : `../../var/www`
--
  
- Chemin Absolu : `/var/logs/../www`
---

# Chemins Relatif/Absolu/Canonique

```raw
/
├── etc
│   ├── nginx
│   ├── php
│   └── ssh
├── home
│   └── henri
└── var
    ├── logs
    └── www
        └── public
```
Dossier courant `/var/www/public`. Je souhaite aller dans le dossier `/home/henri`

--
- Chemin canonique : `/home/henri`

--
- Chemin canonique : `~`

--
- Chemin Relatif : `../../home/henri`

---

# Chemins Relatif/Absolu/Canonique

```raw
/
├── etc
│   ├── nginx
│   ├── php
│   └── ssh
├── home
│   └── henri
└── var
    ├── logs
    └── www
        └── public
```
Dossier courant `/home`. Je souhaite aller dans le dossier `/home/henri`

--
- Chemin canonique : `/home/henri`

--
- Chemin canonique : `~`

--
- Chemin Relatif : `henri`

--
- Chemin Relatif : `./henri`

---

