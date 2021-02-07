---
title: 3 - Twig
draft: true
weight: 23
---

En repartant du TP précédent, l'objectif est de remplacer dans le tp2 les fichiers HTML par des
fichiers [twig](../courses/6-Twig.md), en utilisant obligatoirement les fonctionnalités suivantes :

- Syntaxe `for else`
- Héritage
- Inclusion
- Filtres

Le cache de notre application n'ira pas dans le dossier `src` mais dans un dossier à la racine du projet qui
s'appellera `var/cache` et la totalité du dossier var **ne doit pas être commit**.

Une fois la dépendance installée, modifiez la fonction render du `AbstractController` avec le code suivant :

```php
public function render($templateName, $data = []): Response
{

		$loader = new FilesystemLoader(__DIR__ . "/../../templates");
		$twig = new Environment($loader, [
				'cache' => __DIR__ . "/../../var/cache/",
				'debug' => true,
		]);

		return new Response($twig->render($templateName, $data));
}
```

