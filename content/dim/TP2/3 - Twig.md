---
title: 3 - Twig

weight: 23
---

En partant du TP précédent et de la **branche correspondante**, créez une nouvelle branche p3 :

```bash
git checkout p2
git checkout -b p3
```

L'objectif est de remplacer dans le tp2 les fichiers HTML par des fichiers [twig](../courses/6-Twig.md), en utilisant obligatoirement les fonctionnalités suivantes : 
- Syntaxe `for else`
- Héritage
- Inclusion
- Filtres


Le cache de notre application n'ira pas dans le dossier `src` mais dans un dossier à la racine du projet qui s'appellera `var/cache` et la totalité du dossier var **ne doit pas être commit**.

Une fois la dépendence installée, modifiez la fonction render du `AbstractController` avec le code suivant :

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