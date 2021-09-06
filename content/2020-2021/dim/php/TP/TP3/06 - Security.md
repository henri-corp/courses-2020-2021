---

title: Sécurité

weight: 36

---

## Avant-propos

[Documentation Symfony - Securité](https://symfony.com/doc/current/security.html)

{{< hint info >}} Définir les termes suivants : Encoder, Provider, Firewall, Access Control, Role, Voter {{< /hint >}}

{{< hint danger>}}N.B.: On n'utilisera pas FOSUserBundle car ce bundle est inutile.{{< /hint >}}

{{< hint info >}} Qu'est-ce que FOSUserBundle ? Pourquoi ne pas l'utiliser ? {{< /hint >}}

La sécurité intègre le hash de mot de passe, la connexion et la gestion des autorisations.

{{< hint info >}} Définir les termes suivants : Argon2i, Bcrypt, Plaintext, BasicHTTP {{< /hint >}}

{{< hint info >}} Expliquer le principe de hachage. {{< /hint >}}

## Etat du projet

À cette étape, vous avez plusieurs solutions :

### Solution A : recreate the entity (easy)

Supprimez l'entité User et son repository et utiliser le générateur symfony`make:user`. (nb: Dans ce cas, il faudra
recréer les liens avec les entités Post et Comment dans le code). Prenez le temps de lire l'étape d'après qui explique
beaucoup de concepts de l'entité user.

### Solution B : update the existing entity (advanced)

Implémenter
l'interface [UserInterface](https://github.com/symfony/symfony/blob/4.0/src/Symfony/Component/Security/Core/User/UserInterface.php)
sur votre entité User. Cette interface a plusieurs méthodes :

#### getRoles

Cette méthode doit retourner un tableau des rôles que l'utilisateur a. Un utilisateur connecté doit toujours avoir
le `ROLE_USER`.

En premier temps pour le dev, on peut imaginer la méthode suivante :

```php
public function getRoles(){
    return ["ROLE_USER"];
}
```

Il est possible d'ajouter à l'utilisateur des rôles que l'on stockera dans la base de donnée. Pour cela, on va ajouter
un nouveau champs "roles" dans l'entité, de type **json**. La valeur par défaut de ce champs doit être `[]` qui
correspond à un tableau vide en `json`.

On va modifier notre fonction précédente pour avoir la logique suivante :

```php
public function getRoles(){
    return array_merge(["ROLE_USER"], $this->roles);
}
```

#### getPassword

Cette méthode doit retourner le mot de passe chiffré de l'utilisateur. Si votre entité ne contient pas de champs
password, créez-en un de type string(255). N'oubliez pas de générer les migrations en conséquence.

#### getSalt

Cette méthode renvoie un salage de mot de passe. [WIKI](https://fr.wikipedia.org/wiki/Salage_(cryptographie)). Dans la
pluspart des cas, cette méthode renvoie null car la méthode de hachage est suffisament performante.

#### getUsername

La sécurité dans symfony a besoin d'un username à stocker dans la session. Dans le cas où vous avez fait une entité avec
son email, getUsername doit renvoyer son email.

### eraseCredentials

Fonction appelée automatiquement avant enregistrement (session ou bdd) de l'utilisateur pour permettre d' effacer les
trace d'un éventuel mot de passe laissé en clair dans le code.

Dans notre cas, cette fonction ne fera rien.

## Authentification

### Formulaire

En utilisant le générateur, créer
un [formulaire d'authentification](https://symfony.com/doc/current/security/form_login_setup.html).

{{< hint info >}} Faire un schema expliquant quelle méthode est appelée dans quel ordre dans le `LoginFormAuthenticator`
. Définir l'objectif de chaque méthodes du fichier. {{< /hint >}}

## Inscription

Après cette étape, nous allons passer sur
le [formulaire d'inscription](https://symfony.com/doc/current/doctrine/registration_form.html). On peut utiliser
le `make:registration-form` de symfony.

*ne pas oublier de hasher le mot de passe*

[Envoyez un email](https://symfony.com/doc/current/mailer.html) à l'utilisateur pour lui confirmer son inscription.

## Autorisation

### Roles

Gérer les rôles et leur hiérarchie :

- ROLE_USER
- ROLE_AUTHOR
- ROLE_ADMIN

Un ADMIN est un AUTHOR et un AUTHOR est un USER. Penser à modifier l'entité comme abordé plus haut en gérant les rôles
en base de donnée.

### Access Control

Gérer les accès globaux au site via l'access control.

- La partie administration est autorisée uniquement aux ROLE_ADMIN.
- La partie ajout de post est dédiée au ROLE_AUTHOR.
- La partie ajout de commentaire est dédiée au ROLE_USER.

Mettez à jour la vue pour ne pas afficher les informations qu'une personne ne peut pas
faire : [Access control in templates](https://symfony.com/doc/current/security.html#access-control-in-templates)

### Voters

[voters](https://symfony.com/doc/current/security/voters.html)

Définir ses propres voters, pour gérer les niveau d'édition d'un article de post.

- L'auteur peut éditer **son article** tant qu'il n'est pas `published`.
- L'auteur ne peut pas éditer un article dont il n'est pas l'auteur.
- Un auteur peut publier un article, tout le monde peut le voir.
- L'administrateur peut éditer tous les articles.
- L'administrateur peut dé-publier un article.

Modifier twig pour intégrer la gestion des permission avec les voters. 