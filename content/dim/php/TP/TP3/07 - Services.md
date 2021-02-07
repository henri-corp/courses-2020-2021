---
title: Services
weight: 37

---

## Travail preparatoire

[Services](https://symfony.com/doc/current/service_container.html)

> À quoi sert un service dans Symfony ?
>
> Avez-vous déjà utilisé des services dans ce projet ? Si oui, lesquels ?
>
> Définir les termes suivant : `Dependency Injection`, `Service`, `Autowiring`, `Container`
>
> 

### Premier service

Extraire l'envoi d'email de l'inscription et en faire un service `App\Services\MailerManager` qui aura une méthode `confirmRegistration(User $user)`. Ce service aura besoin du Mailer et de Twig pour générer les templates html.

### Gestion d'un utilisateur

Créer un service `App\Services\UserAccountManager` pour gérer le chiffrement des mots de passe et envoyer un email de confirmation à la création du compte. Ce service pourra également gérer une fonctionnalité de `mot de passe oublié ?` qui renverra un nouveau mot de passe à par email à l'utilisateur.

> Quelle importance a les services dans le fonctionnement de Symfony ?