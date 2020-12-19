---
title: Serializer
weight: 39
---

## Avant-propos

- [How to use serializer](https://symfony.com/doc/current/serializer.html)
- [Serializer](https://symfony.com/doc/current/components/serializer.html)

> Quels sont les différentes parties du Serializer et à quoi servent-elles ?

## Implementation

Ajoutez une api pour que les personnes puissent accéder au site.

L'API aura plusieurs actions : 

- Consulter la liste des **auteurs** de posts avec le titre de leurs posts.

- Consulter la liste des derniers posts.
- Le Top des posts.
- Les commentaires pour un Post.

L'objectif de cette partie est de **ne pas** utiliser API Platform. 

L'api pourra renvoyer sa réponse au format `json` ou `xml`, en fonction de ce que l'utilisateur passe en paramètre dans l'URL.

### Get Authors and their Posts

```
GET /api/authors.{format}
AUTH-KEY: My-authentication-key
```



```json
200 OK
Content-Type: application/json

[
	{
		"id": 1,
		"username": "henri",
		"posts": [
			{
			"id":17,
			"brief": "Lorem Ipsum dolor sit amet" //c'est le titre, mais le concepteur de l'api est une personne détestable
			}
		]
	}
]
```



### Consulter la liste des derniers posts

```
GET /api/last.{format}
AUTH-KEY: My-authentication-key
```



```json
200 OK
Content-Type: application/json

[
    {
        "id":17,
        "title": "Lorem Ipsum dolor sit amet",
        "content":"le contenu du post",
        "createdAt":"format:ISO8601"
    }
]
```

### Le Top des posts

```
GET /api/top.{format}
AUTH-KEY: My-authentication-key
```



```json
200 OK
Content-Type: application/json

[
    {
        "id":17,
        "title": "Lorem Ipsum dolor sit amet",
        "content":"le contenu du post"
    }
]
```

### Les commentaires pour un Post



```
GET /api/post/{id}.{format}
AUTH-KEY: My-authentication-key
```



```json
200 OK
Content-Type: application/json

{
	"id":17,
	"title": "Lorem Ipsum dolor sit amet",
	"content": "le contenu du post",
    "created_at":"ISO8601",
    "author":{
        "id":1,
        "username":"henri"
    }
	"comments": [
		{
            "id":173,
            "content":"le contenu du commentaire",
            "created_at":"ISO8601",
            "author":{
            	"id":1,
            	"username":"henri"
            }
		}
	
	]
	
}
```

### 