---
title: 4 - Router
weight: 24
draft: false
---
À partir du TP précédent, créez une nouvelle branche `p4`. 

## Kernel Update

Pour commencer, installez les composants suivants avec composer
```
symfony/routing
doctrine/annotations
doctrine/cache
symfony/config
symfony/framework-bundle
```

Une fois les composants installés, on va modifier 2 fichiers du début du projet, le point d'entrée de toutes les requêtes HTTP

```php
<?php

$loader = require __DIR__ . '/../vendor/autoload.php';

\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader([$loader, 'loadClass']);

use App\Kernel;

$kernel = new Kernel(false, true);
$kernel->run();
```

Remplacez le kernel précédent par le code suivant : 
```php
<?php

namespace App;

use App\Controller\AbstractController;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Koriym\Attributes\AttributeReader;
use Symfony\Bundle\FrameworkBundle\Routing\AnnotatedRouteControllerLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\AnnotationDirectoryLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;

class Kernel
{
    private ?Request $request = null;
    private ?EntityManagerInterface $entityManager = null;
    private ?RouterInterface $router = null;


    public function __construct(
        private bool $devIsEnabled = true,
        private bool $cacheIsEnabled = false
    )
    {
        $this->request = Request::createFromGlobals();
        $this->entityManager = $this->buildEntityManager();
    }

    private function getDirCache()
    {
        return __DIR__ . "/../var/cache";
    }

    public function run()
    {
        $this->router = new Router(
            new AnnotationDirectoryLoader(
                new FileLocator(__DIR__ . '/Controller/'),
                new AnnotatedRouteControllerLoader(new AnnotationReader())
            ),
            __DIR__ . "/Controller",
            $this->cacheIsEnabled ? ["cache_dir" => $this->getDirCache() . "/router"] : []
        );
        $response = $this->route($this->request);
        $response->send();
    }

    private function buildEntityManager(): EntityManagerInterface
    {
        $config = Setup::createAnnotationMetadataConfiguration(
            array(__DIR__ . "/Entity"),
            $this->devIsEnabled,
            $this->cacheIsEnabled ? $this->getDirCache() . "/proxy" : null,
            $this->cacheIsEnabled ? new FilesystemCache($this->getDirCache() . "/doctrine") : null,
            false
        );
        // Create a simple "default" Doctrine ORM configuration for Annotations

        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../db.sqlite',
        );

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }

    public function getEntityManager()
    {
        return $this->entityManager;

    }

    private function route(Request $request): Response
    {
        $context = new RequestContext('/');
        // Routing can match routes with incoming requests
        try {
            $parameters = $this->router->match($request->getPathInfo());
        } catch (ResourceNotFoundException $notFoundException) {
            return new Response("Page Not Found", Response::HTTP_NOT_FOUND);
        }
        list($className, $method) = explode("::", $parameters["_controller"]);
        $resolvedArguments = $this->parametersResolver($className, $method, $parameters);
        $controller = new $className();
        if ($controller instanceof AbstractController) {
            $controller->setRouter($this->router);
        }
        return call_user_func_array([$controller, $method], $resolvedArguments);
    }

    private function parametersResolver($className, $method, $routerParameters = []): array
    {
        //this code gives you the ability to see if a method should have a parameter
        //if so, set it as object or value.
        $reflexion = new \ReflectionMethod($className, $method);
        $params = $reflexion->getParameters();
        $autoInject = [
            Request::class => $this->request,
            EntityManagerInterface::class => $this->entityManager,
            RouterInterface::class => $this->router,
        ];
        $paramValues = [];
        foreach ($params as $param) {
            if ($param->hasType() && isset($autoInject[$param->getType()->getName()])) {
                $paramValues[$param->getPosition()] = $autoInject[$param->getType()->getName()];
            } else {
                $paramValues[$param->getPosition()] = $routerParameters[$param->getName()] ?? null;
            }
        }
        return $paramValues;
    }
}
``` 

## Router Usage

En retournant sur le site, on constate que la page ne fonctionne plus. 

> Pourquoi le site ne fonctionne plus ?

Ajouter l'attribut PHP8 suivant sur la méthode index du contrôleur principal
```php
#[Route("/",name:"homepage")]
```

Si vous le souhaitez, vous pouvez privilégier le format annotation plus classique : 
```php
/**
* @Route("/",name="homepage")
*/
```

N'oubliez pas d'importer la classe `Symfony\Component\Routing\Annotation\Route`.


Rien ne se passe. Désactivez le cache.

> Quel cache ? Comment le désactiver ?

Si tout se passe bien, vous obtenez l'erreur suivante : 

```text
...Uncaught Error: Call to undefined method App\Controller\HomeController::setRouter()....
```

> Que signifie cette erreur ? Trouver où cet appel est effectué, et implémentez le code pour fixer ce problème.

Ajoutez dans la classe Abstraite `AbstractController` une propriété de type `?RouterInterface` et définissez-lui des accesseurs et mutateurs.

Ajoutez toutes les annotations/Attributs sur toutes les routes. 

> Résoudre les problèmes avec `$id` dans les méthodes show/edit/delete - Sans modifier le contenu des controllers.

⚠️⚠️⚠️Ne changez pas tout de suite les URL du site.

## Naming and Generation

Pour résoudre le problème de lien, il faut implémenter une [fonction twig](https://twig.symfony.com/doc/3.x/advanced.html#functions) nommée `path` et permettant d'utiliser la méthode "generate" du router directement de la manière suivante : 
```twig
{{ path("game_show",{id: game.id}) }}
```

Implémentez cette fonction twig là où twig est initialisé et utilisé pour la rendre disponible dans le code. 

Modifiez tous les liens des templates avec la fonction twig `path`.

> **L'objectif ici est de NE PLUS UTILISER de chemins mais uniquement les noms des routes !**



Enfin, ajouter une nouvelle méthode dans l'AbstractController nommée `redirectToRoute` qui va utiliser le `RouterInterface` et la méthode `redirectTo` déjà existante.
Remplacer toutes les redirections présentes dans les `controller` et utilisant le `RedirectTo` par cette méthode.


## Aller plus loin - Param Converter (partie facultative)
Modifiez le kernel pour améliorer le parametersResolver.

L'objectif ici est de remplacer la méthode show de la class GameController par le code suivant : 
```php
    #[Route("/game/show/{game}", name:"game_show")]
    public function show(Game $game): Response
    {
        return $this->render("game/show.html.twig", ["game" => $game]);
    }
```

Pour cette partie, il est conseillé de comprendre la logique de la méthode `parametersResolver` puis d'imaginer comment récupérer le
Repository par rapport au type de l'argument passé en paramètre. 

> HINT : `User::class` c'est le nom canonique de la classe, soit `App\Entity\User`