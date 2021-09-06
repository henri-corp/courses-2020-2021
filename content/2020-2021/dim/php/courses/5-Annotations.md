---
title: 5 - Annotations

weight: 5

light: true

type: presentations
---

# Annotations

---

> En programmation, une annotation est un élément permettant d'ajouter des méta-données à un code source.

> En PHP, les annotations sont sur les classes, les méthodes, et les attributs

---

## ⚠️ Know the difference  ⚠️

Voici un commentaire : 
```php
/*
* Je suis un commentaire
* @Test
*/
private $property;
```
--
Voici une annotation :
```php
/**
* Je suis un commentaire d' annotation
* @Test
*/
private $property;
```

---

En PHP les annotations **ne sont pas supportées** par défaut dans le langage, on utilise en général une bibliothèque
prévue pour cela.

Une annotation commence par un @ suivi du nom d'une classe. Si la classe est dans un namespace, il faut mettre un use
classique dans la classe ou utiliser le chemin de déclaration complet.

exemple :

--

```php
use Doctrine\ORM\Mapping as ORM;

/**
 * @Doctrine\ORM\Mapping\Entity()
 * @ORM\Table(name="mytable")
 */
class MyEntity{ }

```

---

Une annotation de classe :

```php

/**
*
* Annotation sans argument :
* @Foo()  
*
* Annotation avec son argument principal :
*
* @Bar("arg1")
*
* Annotation avec une suite d'arguments : 
*
* @Person(name="henri", age=27, hair=null)
*/
class MaClass{
...
```

---

Annotation de méthodes :

```php

/**
*
* Annotation sans argument :
* @Foo()  
*
* Annotation avec son argument principal :
*
* @Bar("arg1")
*
* Annotation avec une suite d'arguments : 
*
* @Person(name="henri", age=27, hair=null)
*/
public function maFonction() {
...
```

---

Annotation de propriété :

```php

/**
*
* @Foo()  
* @Bar("arg1")
* @Person(name="henri", age=27, hair=null)
*/
private $property;
```

---

À quoi ça sert ?

- les routes dans Symfony sont déclarées en annotation
- les validateurs de formulaire
- la déclaration des entity

---

## ⚡ PHP 8 ⚡  

--

PHP 8 Intègre nativement le système d'annotations via des "attributs".

C'est le même concept :

--

```php
class PostsController
{
    /**
     * @Route("/api/posts/{id}", methods={"GET"})
     */
    public function get($id) { /* ... */ }
}
```



--
La forme PHP 8 : 
```php
class PostsController
{
    #[Route("/api/posts/{id}", methods: ["GET"])]
    public function get($id) { /* ... */ }
}
```