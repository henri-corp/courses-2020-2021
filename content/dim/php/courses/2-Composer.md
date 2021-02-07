---
title: 2 - Composer

weight: 2

type: presentations

light: true

---

# Composer

![](https://i.imgur.com/vD0ibVt.png)


---

Composer est un gestionnaire de packets PHP créé en 2012. Venant remplacer directement 🕸️PEAR, Composer est aujourd'hui
le plus utilisé.

On peut retrouver la liste des packets sur [Packagist.org](https://packagist.org)

---

Un packet, c'est une bibliothèque de code écrite par des développeurs pour répondre à un besoin, faire gagner du temps,
apporter quelque chose à la communauté.

![](https://i.imgur.com/j74lOzL.png)

---

Par ailleurs, Composer intègre des fonctions d'`autoload` qui ***respectent les standards PSR-4***.

On verra leur utilisation dans la suite du cours.

---

## Installation de Composer

---

Composer peut être installé dans un dossier local en suivant les instructions suivantes :

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
mkdir bin
php composer-setup.php  --install-dir=bin --filename=composer
chmod a+x bin/composer
rm composer-setup.php
```

---

Toutes les commandes Composer peuvent ainsi être saisie en tapant :

```bash
php bin/console composer COMMAND
```

---

```
php bin/composer -V
```

La version actuelle est la version `2.0.8`

