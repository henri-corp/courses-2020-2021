---
title: 6 - Doctrine

type: presentations

description: <img src="https://i.imgur.com/CPicCl0.png"/>

weight: 6

light: true
---

Doctrine-Project est une suite de bibliothèques dont la fonction première est la manipulation de données de base de
données.

On distingue 2 projets Doctrine :

Doctrine **DBAL** (DataBase Abstraction Layer) et Doctrine **ORM** (Object Relational Mapper).

---

Qu'est-ce qu'un ORM ?

> Un mapping objet-relationnel (en anglais object-relational mapping ou ORM) est un type de programme informatique qui se place en interface entre un programme applicatif et une base de données relationnelle pour simuler une base de données orientée objet.

---

> Ce programme définit des correspondances entre les schémas de la base de données et les classes du programme applicatif. On pourrait le désigner par là, « comme une couche d'abstraction entre le monde objet et monde relationnel».

---

<img  style="height: 500px;" src="https://i.imgur.com/8fWiKTV.png"/>

---

## Entities

---

Les entités Doctrine se déclarent par des annotations apportées à même le code.

L'entité est une classe qui, une fois instanciée, représente une entrée dans la base de données.

---

Prenons par exemple la classe Trainer. Les conventions de nommage nous dit de stocker l'entité dans un dossier **
Entity**.

Pour la suite, imaginons que les propriétés ont toutes des getters/setters déclarés. Id n'a pas de setter.

---

```php
class Trainer
{
    private $id;
    private $name;
    private $badgeCount = 0;
    private $startedOn;
    
    public function getId(): int {
        return $this->id;
    }
    
    public function getName(): string {
        return $this->name;
    }
    
    public function setName(string $name): void {
        $this->name = $name;
    }
    
    public function getBadgeCount(): int {
        return $this->badgeCount;
    }

    ....
}
```

---

avec les annotations pour déclarer la classe comme entité

```php
use Doctrine\ORM\Mapping as ORM;

/**
* On déclare la classe comme entity : 
* @ORM\Entity()
*
* On définit le nom de sa table :
* @ORM\Table(name="trainers")
*
*/
class Trainer{

....
```

---

Puis sur le champs Id qui sera celui qui s'auto-incrémentera et sera primaire :

```php
...
class Trainer{
    
    /**
     * // Le champ sera une clé primaire
     * @ORM\Id()
     * // Le champ sera de type int
     * @ORM\Column(type="integer")
     * // Le champ sera une valeur auto-générée (autoincrement)
     * @ORM\GeneratedValue()
     */
    private $id;
...
```

---

Puis sur chacun des champs on ajoutera :

```php
/**
 * @ORM\Column(type="string", length=50, nullable=false)
 */
private $name;
```

Le type string a pour length par défaut 50, et le champs nullable est toujours à false.

--

```php
/**
 * @ORM\Column(type="integer")
 */
private $badgeCount = 0;
```

--

```php
/**
 * @var \DateTime
 * @ORM\Column(type="datetime")
 */
private $startedOn;
```

---

En executant la requête de création/mise à jour du schéma de la base (dans cet exemple PostgreSQL), on obtient le code
suivant :

```sql
CREATE TABLE trainers
(
    id         INT         NOT NULL,
    name       VARCHAR(50) NOT NULL,
    badgeCount INT DEFAULT NULL,
    startedOn  TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
    PRIMARY KEY (id)
);

CREATE SEQUENCE trainers_id_seq
    INCREMENT BY 1 MINVALUE 1 START 1;

```

---

Si on souhaite supprimer une table, il suffit de supprimer son entité et de détacher les différents liens avec la table
en question.

---

### Typage des colonnes

---

Une liste des types non exhaustive que l'on peut utiliser en temps que type de colonne :

- integer
- string
- text
- date
- datetime
- float
- array
- json

---

### Relation

---

Avant de continuer dans l'explication, créons une entité Pokemon avec ses getters/setters :

```php

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 * @ORM\Table(name="pokemons")
 */
class Pokemon
{

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
....
}
```

---

Dans cet exemple simple, on va partir du principe qu'un dresseur a enregistré un ou plusieurs Pokemons dans le pokedex,
mais qu'un pokemon n'a été enregistré que par un seul dresseur.

---

Dans la class Pokemon, nous allons ajouter un champs suivant qui s'appellera registrar :

```php
    /**
     * // Nous faisons une relation Many(Pokemon) To One(Trainer) 
     * @var Trainer
     * @ORM\ManyToOne(targetEntity="Trainer", inversedBy="registrations")
     */
    private $registrar;
    
    public function getRegistrar(): Trainer
    {
        return $this->registrar;
    }

    public function setRegistrar(Trainer $registrar): void
    {
        $this->registrar = $registrar;
    }
```

---

A partir de maintenant, nous ne travaillons pas avec des Id mais uniquement avec des entités : si on récupère un
pokemon, en appelant la méthode getRegistrar, on obtiendra un objet de type Trainer.

---

Du coté de la classe Trainer, on ajoute le champs suivant :

```php
/**
 * @var ArrayCollection
 * @ORM\OneToMany(targetEntity="Pokemon", mappedBy="registrar")
 */
private $registrations;

public function __construct() {
    $this->registrations=new \Doctrine\Common\Collections\ArrayCollection();
}

public function register(Pokemon $pokemon) {
    $this->registrations[] = $pokemon;
}

public function getRegistrations() {
    return $this->registrations;
}
```

---

En executant la mise à jour de la base, les requêtes executées sont les suivante :

```sql
CREATE TABLE pokemons
(
    id           INT          NOT NULL,
    registrar_id INT DEFAULT NULL,
    name         VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE
INDEX IDX_3FD8B03DD1AA2FC1 ON pokemons (registrar_id);

ALTER TABLE pokemons
    ADD CONSTRAINT FK_3FD8B03DD1AA2FC1
        FOREIGN KEY (registrar_id)
            REFERENCES trainers (id)
            NOT DEFERRABLE INITIALLY IMMEDIATE;

```

---

En continuant sur cet example on dira qu'un dresseur souhaite capturer plusieurs pokemons, que les pokemons peuvent être
traqués par plusieurs personnes.

---

On rajoute dans l'entité trainer :

```php
/**
 * @var ArrayCollection
 * @ORM\ManyToMany(targetEntity="Pokemon",inversedBy="hunters")
 */
private $targets;
```

et dans pokemon :

```php
/**
 * @var ArrayCollection
 * @ORM\ManyToMany(targetEntity="Trainer",mappedBy="targets")
 */
private $hunters;
```

---

Une fois le SQL executé on retrouve :

```sql
CREATE TABLE trainer_pokemon
(
    trainer_id INT NOT NULL,
    pokemon_id INT NOT NULL,
    PRIMARY KEY (trainer_id, pokemon_id)
);
CREATE
INDEX IDX_AEE3A93CFB08EDF6 ON trainer_pokemon (trainer_id);
CREATE
INDEX IDX_AEE3A93C2FE71C3E ON trainer_pokemon (pokemon_id);

ALTER TABLE trainer_pokemon
    ADD CONSTRAINT FK_AEE3A93CFB08EDF6
        FOREIGN KEY (trainer_id)
            REFERENCES trainers (id)
            ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;

ALTER TABLE trainer_pokemon
    ADD CONSTRAINT FK_AEE3A93C2FE71C3E
        FOREIGN KEY (pokemon_id)
            REFERENCES pokemons (id)
            ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE;

```

---

![](https://i.imgur.com/AbxUe0b.png)

---

<p style="font-size: 40px !important;font-weight:bold; color:#D22;">On parle des objets et de leurs relations entre eux.</p>

et non de tables et d'entrées. C'est la puissance de l'**ORM**.

---

Par exemple :

```php
$trainer = new Trainer();
$trainer->setName("Henri");
$trainer->setBadgeCount(0);
$trainer->startedOn(new \DateTime());

```

--

```php
$pokemon = new Pokemon();
$pokemon->setId(7);
$pokemon->setName("Squirtle");
$pokemon->setRegistrar($trainer);
```

--

```php
$pokemons = $trainer->getTargets();
```

---

## Entity Manipulation

---

La manipulation des entités se fait via l'entityManager `Doctrine\ORM\EntityManagerInterface`.

Cet objet a 4 méthodes indispensables :

- `persist($entity)`
- `remove($entity)`
- `flush()`
- `getRepository($entityClassName)`

Nous aborderons juste après ces différentes méthodes.


---

### Data Loading

---

Un Repository est une classe liée directement au modèle. Dans les conventions de code, elle se nom EntityRepository et
se trouve dans un dossier Entity.



---

Pour lier une entitée à un Repository il faut modifier l'annotation Entity ajoutée à l'entité et rajouter la propriété
repositoryClass="\App\Repository\EntityRepository"

```php
/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonRepository")
 * ...
 */
```

---

et le Repository doit hériter de `Doctrine\ORM\EntityRepository`

```php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class PokemonRepository extends EntityRepository
{

};
````

---

Une fois le lien fait entre entité et repository, on peut récupérer le répository de cette manière :

```php
$repository = $entityManager->getRepository(Pokemon::class);

```

--

Cette classe offre plusieurs méthodes de récupération :

```php

$repository->findAll(); //renvoie toute la table
$repository->find($id); //récupère l'entité par id
$repository->findBy(["field"=>"value"]); 
//récupère des entités par un ou plusieurs champs.
$repository->findOneBy(["field"=>"value"]); 
//récupère une entité par un ou plusieurs champs.

```

--

Par exemple :

```php
$pokemon = $repository->findBy(["nom"=>"Charizard"]);
```


pour plus de souplesse, on peut définir nos propres méthodes dans le Repository et utiliser le query Builder - Dans les
rares cas où les fonctions de base ne suffisent pas.

---

Par exemple, trouver les potentiels intéressés pour un échange avec le dresseur qui a enregistré un pokemon.

```php
    public function getTradingInteresedTrainers(Trainer $trainer)
    {
        $qb = $this->createQueryBuilder("trainer");
        $query = $qb->join("trainer.targets", "targets")
            ->join("targets.registrar", "registrar")
            ->where("registrar = :trainer")
            ->setParameter("trainer", $trainer)
            ->getQuery();
        return $query->getResult();
    }
```

---

### Edit


Pour modifier une entité, il faut la récupérer du modèle et après la modifier naturellement.

--

```php
$pokemonRepository = $entityManager->getRepository(Pokemon::class);

$pokemon = $pokemonRepository->find(124);
$pokemon->setName("Nicki Minaj");

```

--

L'objet a été modifié dans le modèle Doctrine mais  **n'est pas enregistré en base**.

---

### Add


Lors de la création d'un objet de type Entity, cet objet n'est aucunement lié au modèle. La méthode de liaison est la
méthode `persist()`.

--

```php
$trainer = new Trainer();
$trainer->setName("Henri");
$trainer->setStartedOn(new \DateTime());
$entityManager->persist($trainer);
```

--

L'objet est maintenant lié au modèle Doctrine mais **n'est pas enregistré en base**.

---

### Delete


Pour supprimer une entité, il faut la récupérer puis dire à l'entity manager de la supprimer.

--

```php
$pokemonRepository = $entityManager->getRepository(Pokemon::class);

$pokemon = $pokemonRepository->find(582);
$entityManager->remove($pokemon);

```

--

L'objet a été marqué comme à supprimer dans le modèle Doctrine mais  **n'est pas enregistré en base**.

---

### Apply changes

Une fois les changements effectués sur les entités, il faut appliquer ses modifications, en appelant la méthode :

```php
$entityManager->flush();
```