
---
title: 2 - Fondamentaux
weight: 10002
---
## Scripts et Fichiers PHP

Le PHP est un langage **interprété** comme le javascript. Lors de l'execution le code source est lu puis executé par l'interpréteur PHP. Aucun executable n'est produit donc seul le code source est distribué.

La manière la plus simple d'executer du code PHP est de créer un fichier avec l'extension `.php` et de lancer la commande suivante :
```bash
php monScript.php
```

la balise PHP s'utilise ainsi

```phtml
<?php

// ICI tout votre code PHP.
?>
```

La balise fermante `?>` n'est pas obligatoire — voir à éviter — dans le cas où vous n'avez que du code PHP dans un fichier.   


Tout ce qui est en dehors de la balise est interprété comme du texte par l'interpréteur PHP et est affiché tel quel.

Par exemple :

```phtml
Bonjour <?php echo "le monde"; ?> magique
```

affichera :

```html
Bonjour le monde magique
```

Chaque ligne d'instruction doit se terminer par un `;`.

### Commentaires

Il existe 3 types de Commentaires

```php
<?php
# Je suis un commentaire mais plus personne ne m'utilise

// Je suis également un commentaire

/*
Je suis un commentaire
sur plusieurs lignes
pour apporter plus d'informations
*/
```