# Recrutement Fullstack

## Phase 1 - ALGO (30 minutes)
### Exercice 1 - ALGO
Output : `.java`, `.php`, `.js`, `.py`, `.c`

Écrire un programme qui, pour les nombres de 1 à 101 affiche : 
* `Joli` si le nombre est multiple de 3
* `Chat` si le nombre est multiple de 5
* `JoliChat` si le nombre est multiple de 3 et multiple de 5
* Le nombre sinon

### Exercice 2 - ALGO
Output : `.java`, `.php`, `.js`, `.py`, `.c`

Ecrire un programme qui verifie qu'une chaine de caractere s2 est une rotation d'une chaine de caractere de reference.

ie :  

* s1 = `Soleil` & s2 = `leilSo` --> s2 est une rotation de s1
* s1 = `Magenta` & s2 = `agentaM` --> s2 est une rotation de s1
* s1 = `Bleu` & s2 = `eulB` --> s2 n'est pas une rotation de s1 !

## Phase 2 - DB & FRONT (40 minutes)
### Exercice 3 - DB
Output : `Schema`, `UML`, `.sql`

Modéliser un schéma de base de donné qui répond au contraintes suivantes.

* Il existe 2 exploitants de salle de Cinema : CGU et Passion
* Un cinema a un nom, une adresse (numero et rue, ville, code postale) et un exploitant
* Un cinema dispose de plusieurs salles numeroté de 1 à N
* Chaque salle se compose nombre de siège maximal et d'une taille d'écran H x L x D (D = distance par rapport au premier rang)
* Dans chaques cinéma on diffuse un ensemble de film sous forme de séance pendant une periode donnée.
* Chaque séance a une heure de debut, une salle, et un film.
* Chaque film se compose d'un titre, une date de sortie, un casting
* Un casting se compose de differents acteurs.
* Un acteur possède un nom, un prenom, une date de naissances.

### Exercice 4 - FRONT
Make it works : (REACT exercice)
https://codepen.io/Jheitz-s/pen/dygOzzp

(instruction sur le panel JS dans les commentaires)

## Phase 3 (1h30 minutes)
### Exercice 5
Output : Code source de l'application

Output Bonus : Dockerfile & docker-compose file

Attention: la data peut etre imcomplète

Ecrire une API basé sur le data-model fourni (cinema.sql)

Si toutefois cela est trop complexe, improvisez ! :)

####Missions : 

Fournir un Endpoint qui répond sur 

* GET `/cinemas` --> doit retourner la liste des cinemas
```JSON
[
  {
    "id": 1,
    "name": "Astoria",
    "city": "Lyon",
    "number_street": "44 Cours Vitton",
    "code_post": "69006",
    "operator_id": 1
  },
  {
    "id": 2,
    "name": "Bellcour",
    "city": "Lyon",
    "number_street": "172 Avenue de la Republique",
    "code_post": "69002",
    "operator_id": 1
  },
  {
    "id": 3,
    "name": "GambeCine",
    "city": "Nice",
    "number_street": "30 Boulevard Gambetta",
    "code_post": "06100",
    "operator_id": 2
  }
]
```

* GET `/actors?first_name=Joaquin` --> doit retourner les infos des acteurs qui match la regle `first_name=Joaquin`
```JSON
[
  {
    "id": 1,
    "first_name": "Joaquin",
    "last_name": "Phoenix",
    "birth_date": "1950-12-23"
  }
]
```

* POST `/cinemas/{id_cinema}/movies/{id_movie}/sessions` --> doit créer une nouvelle sessions (dans la db) aux heures fournie pour le film donné (input payload libre.)

## Phase 4 (30 minutes) : QUEUES !
### Exercice 5 (suite)
1. Start a message broker on your system.
2. After a POST onto `/cinemas/{id_cinema}/movies/{id_movie}/sessions`, publish new message on a queue.
3. This message must contains 
    ```
    DiffusionSession {id, movie title, start_time, a call back URL to delete the session (new endpoint)}
    ```
4. Create a consumer that read all events coming on queue.
5. If the start time of the diffusion is later than `22:00:00` use the callback URL to delete the diffusion Session
