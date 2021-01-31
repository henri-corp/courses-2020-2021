---
title: PHP
weight: 1
---
## Qui parmi vous fait du PHP ? 

<div style="text-align: center;margin-top: 10px;"><img src="../headaches.png" style="height: 350px"/></div>

---



## PHP C'est quoi ? 

- Langage de scripting
- Langage Backend pour le web

C'est un langage **interprété**


---
### Qui s'en sert ?

- Facebook (toujours)
- Wikipédia
- Wordpress

---

## Symfony

---

### Qui s'en sert ?


- Blablacar
- Dailymotion
- MindGeek ([wiki](https://fr.wikipedia.org/wiki/MindGeek))


---
### Historique


---
- Personal Home Page 1 - 1994 par Rasmus Lerdorf
- php 3.0 : Team PHP - 1998
    - "PHP Hypertext Processor"
- php 4   : 2000 -> 2005
- php 5.0 : 2004
- ~~php 6   : 2005~~
- php 5.3 : 2009
- php 5.6 : 2014
- php 7 : 2015
- php 8.0 : novembre 2019
- PHP 8 : Novembre 2020

[museum.php.net](https://museum.php.net)

---
### Pourquoi ce cours ?

- Remettre tout le monde à niveau
- Pour Vous mettre à jour, avant de rentrer dans le vif du sujet

---
## Outils pour ce cours

--
- PHP 8 (avec SQlite)
--
  
- ...
--
  
- et c'est tout!

---

### Usage


En ligne de commande :

```bash
php -v
```
```bash
PHP 8.0.1 (cli) (built: Jan 13 2021 08:23:31) ( NTS )
Copyright (c) The PHP Group
Zend Engine v4.0.1, Copyright (c) Zend Technologies
    with Zend OPcache v8.0.1, Copyright (c), by Zend Technologies
```

---
Démarrer un serveur local qui pointe sur un dossier public

```bash
php -S 0.0.0.0:8000 -t public
```
```bash
PHP 8.0.1 Development Server (http://0.0.0.0:8000) started
```
Le serveur est disponible sur http://localhost:8000

---
## Syntaxe de base

```php
<?php

/** Syntaxe de base **/

$myVar = "Hello";
$myInt = 2;
echo $myVar . " " . $myInt;
$myInt = $myInt * 2;
```

--
```php
function addition(int $a, int $b) int{
    return $a + $b;
}

echo addition(2,3);

$addition2 = function (int $a, int $b): int {
    return $a + $b;
};

echo $addition2(2, 3);

$addition3 = fn(int $a, int $b): int => $a + $b;

echo $addition3(3, 6);

```

---

```bash
include("page1.php");           // OK but...
require("page2.php");           // OK
include_once("page3.php"); // NOT OK
require_once("page4.php"); // NOT OK
```

Pour les inclusions il ne faut pas utiliser les "once" : ces fonctions ne sont pas optimisées et stockent en ram des tableaux pour se rappeler quel fichier a été inclus ou non.

> Include peut être utilisé mais ne va pas générer d'erreur en cas d'absence du fichier.

---
## Syntaxe Objet
---
PHP est un langage Langage Orienté Objet

```php
<?php
class Foo {
}

class Bar {

    private Foo $foo;

    public function __construct(Foo $foo) {
        $this->foo = $foo;
    }

    public function getFoo(): Foo {
        return $this->foo;
    }
}

```

---
### Typage PHP

- Oui, ça existe
- Oui, c'est bien
- Non, c'est pas obligatoire
- Mais oui c'est mieux

---

Ce qui peut être typé :
- Les arguments d'une fonction/méthode **7.0**
- Les valeurs de retour de fonction **7.0**
- Les attributs d'un objet ! **7.4**

Ce qui ne peut pas être typé :
- Les variables

---

Exemple de typage :
```php

class Foo{}

class Bar{

    private Foo $foo;

    public function __construct(Foo $foo){
        $this->foo = $foo; 
    }
    
    public function getFoo(): Foo
    {
        return $this->foo;
    }
}

```

---

On peut ajouter des arguments optionnels, ceux-ci pourront valoir soit le type soit null.
```php
class Foo{}

class Bar{

    private Foo $foo;

    public function __construct(?Foo $foo){
        $this->foo = $foo; 
    }
    
    public function getFoo(): ?Foo
    {
        return $this->foo;
    }
}
```
---
Encore Mieux avec PHP 8 : 

```php
class Foo{}

class Bar{
    public function __construct(private ?Foo $foo)
    {
    }
    
    public function getFoo(): ?Foo
    {
        return $this->foo;
    }
}
```

---
### Namespaces

Les Namespaces PHP sont arrivés en PHP version `>= 5.3.0`.

En comparaison avec le Java, un Namespace est un **Package JAVA**.

---
**En Java**
```java
package fr.larget;

import java.lang.*;

class Kernel{

    public Kernel(){
     ....
    }
}

```

---
**En PHP**
```php
<?php

namespace App\Base;

use Symfony\Component\HttpFoundation\Request;

class Kernel {

    public function __construct(){
     ....
    }
}
```

---
On peut également mettre plusieurs namespaces dans un seul fichier au besoin :

```php

namespace App\Model {
  
  class User{  }
  
  class Group{  }
  
}

namespace App\Controller{

  class MainController{  }

}
```

---
On peut aussi ajouter des fonctions dans le namespace directement :

```php
namespace App {

  function foo() {
    echo 42;
  }
}
```

Et on importe la fonction avec le mot-clé `use function`

```php
use function App\foo;

foo();


```

---
```php
namespace App\bar {
  class A{}
  class B{}
  function c(){ echo "c\n"; }
}
```

---
```php
namespace App\foo{
  use function App\bar\c;   
  use App\bar as baz;
  use App\bar\A;

  echo baz\A::class . "\n";
  echo A::class . "\n";
  echo bar\B::class . "\n";
  echo \App\bar\B::class . "\n";
    
  \App\bar\c();
  baz\c();
  c();
}
```

---
Mais les namespaces n'ont pas les mêmes propriétés que Java - Le code ne s'importe pas tout seul.

Il existe un groupe de développeurs nommé [PHP Framework Interop Group (PHP-FIG)](https://www.php-fig.org/) qui a écrit des conventions de code nommées [PSR - PHP Standards Recommendations](https://www.php-fig.org/psr/).

La plus importante de ces recommandations est la recommandation PSR-4 qui préconise de nommer ses namespaces comme ses dossiers pour en faciliter l'import, comme en java.

---

Un exemple d'autoload respectant le principe de base du PSR-4.
```php
spl_autoload_register(function ($class) {
  $prefix = 'App\\';
  $baseDir = __DIR__ . '/src/';
  $len = strlen($prefix);
  
  if (strncmp($prefix, $class, $len) === 0) {
    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass).".php";
    if (file_exists($file)) { require $file; }
  }
});
```

---
Avec cet autoloader, on retrouve les fichiers suivants :
```bash
  \App\Controller\MainController => src/Controller/MainController.php
  \App\Router => src/Router.php
  \Foo\ => ?
  
```

---


