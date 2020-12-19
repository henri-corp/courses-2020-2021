---
title: TP1
weight: 10
---



[Téléchargez le fichier suivant](https://static.d3cima.com/courses/TP1.php).

Pour l'exécuter, lancez la commande :
```
php -S 0.0.0.0:8000 
```

Rendez-vous sur [localhost:8000](http://localhost:8000/).
C'est une todo-list app, une liste des tâches. Elle stocke ses données en base et permet l'ajout de tâches, la suppression ainsi que la possibilité de cocher ces cases.

__Cette application est dégueulasse.__

L'objectif est donc de faire le ménage dans cette application.


### Étape 1 - Base de données

On va commencer par créer un dossier qu'on va appeler `model`. 

Dans ce dossier model, on va créer 2 classes, une classe `TaskRepository` et une classe qui va s'appeler `Database`

Dans la classe Database, on va créer une propriété privée statique de type `PDO`, un constructeur privé qui prend une chaîne de caractère en paramètres, et deux méthodes, une pour initialiser la base, et l'autre pour récupérer la propriété privée statique initialisée.

Voici un exemple de ce qui est attendu :

```php
<?php

final class Database
{
    private static ?self $instance = null;
    private $pdo;

    private function __construct($path)
    {
        $this->pdo = new PDO("sqlite:/$path");
    }

    public static function initialize($path)
    {
        if (self::$instance !== null) {
            throw new Exception("configuration as already been initialized");
        }
        self::$instance = new self($path);
    }

    public static function getInstance(): PDO
    {
        return self::$instance->pdo;
    }
}
```

C'est un singleton.

Dans la classe TaskRepository, on va créer les méthodes suivantes :
```php
<?php

class TaskRepository
{
    const TABLE = "tasks";
    public function Initialize(){
    
    }
    
    public function getAll(){

    }
    
    public function update($id, $checked=false){

    }

    public function add($description){

    }
    public function delete($id){

    }
}
```
En utilisant la méthode getInstance, implémenter les méthodes pour initialiser la base, récupérer toutes les tâches, les mettre à jour, en ajouter ou en supprimer.

Pour vérifier si une table existe :
```sql
SELECT name FROM sqlite_master WHERE type='table' AND name='myTable'
```

Après avoir implémenté la classe TaskRepository, il faut l'instancier dans le fichier index.php, et remplacer tous les appels SQL par l'appel de ces méthodes.

```php
Database::initialize(__DIR__ . "/data.db");
$taskRepository = new TaskRepository();
$taskRepository->initialize();
```

Si tout se passe bien, le projet continuer à fonctionner sans problème.

### Étape 2 - Simplifier l'intégration PHP/HTML

La seconde étape est de simplifier pour séparer le PHP et l'HTML.

Pour cela, on va utiliser [la syntaxe alternative PHP](https://www.php.net/manual/fr/control-structures.alternative-syntax.php).

En même temps, on va sortir le css dans un fichier `style.css`.

Si tout se passe bien, le projet continue à fonctionner sans problème.

### Étape 3 - Séparer l'HTML
Extraire toute la partie HTML dans un fichier appelé template.php et l'inclure au fichier index.php.

À ce niveau dans le fichier index.php, il ne reste plus que le contrôle et le choix des actions.

### Étape 4 - Composer et réorganisation
Pour cette étape, on va utiliser Composer.
Installez composer et ajoutez le fichier composer.json avec le contenu suivant : 
```json
{
    "name": "henri/tp1",
    "authors": [
        {
            "name": "Henri Larget",
            "email": "henri@larget.fr"
        }
    ],
    "require": {},
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```

Créez un dossier `src` et déplacez le dossier model dans le dossier src. 
Dans les 2 fichiers du modèle, ajoutez avant la déclaration de la classe :
```php
namespace App\model;

use \PDO;
use \Exception;
```
Remplacez les inclusions par les inclusions suivantes : 
```php
require __DIR__ . "/vendor/autoload.php";
use App\model\Database;
use App\model\TaskRepository;
```

Testez l'application, et normalement c'est une erreur. 

Installez les dépendances composer en utilisant la commande `composer install`. 

    
    
    
    
    
    
    
    
    