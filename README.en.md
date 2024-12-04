# Fullstack Recruitment

## Phase 1 - ALGO (30 minutes)
### Exercise 1 - ALGO
Output: `.java`, `.php`, `.js`, `.py`, `.c`

Write a program that, for numbers from 1 to 101, displays:
* `Joli` if the number is a multiple of 3
* `Chat` if the number is a multiple of 5
* `JoliChat` if the number is a multiple of 3 and 5
* The number otherwise

### Exercise 2 - ALGO
Output: `.java`, `.php`, `.js`, `.py`, `.c`

Write a program that checks if a string `s2` is a rotation of a reference string.

e.g.:

* s1 = `Soleil` & s2 = `leilSo` --> s2 is a rotation of s1
* s1 = `Magenta` & s2 = `agentaM` --> s2 is a rotation of s1
* s1 = `Bleu` & s2 = `eulB` --> s2 is not a rotation of s1!

## Phase 2 - DB & FRONT (40 minutes)
### Exercise 3 - DB
Output: `Schema`, `UML`, `.sql`

Model a database schema that meets the following constraints:

* There are 2 cinema operators: CGU and Passion
* A cinema has a name, an address (street number and name, city, postal code), and an operator
* A cinema has multiple numbered halls from 1 to N
* Each hall has a maximum seating capacity and a screen size H x L x D (D = distance from the first row)
* Each cinema shows a set of films as sessions during a given period
* Each session has a start time, a hall, and a film
* Each film has a title, release date, and a cast
* A cast consists of different actors
* An actor has a first name, last name, and date of birth

### Exercise 4 - FRONT
Make it work: (REACT exercise)
https://codepen.io/Jheitz-s/pen/dygOzzp

(instructions in the JS panel comments)

## Phase 3 (1 hour 30 minutes)
### Exercise 5
Output: Application source code

Bonus Output: Dockerfile & docker-compose file

Note: The data may be incomplete

Write an API based on the provided data model (cinema.sql)

If this is too complex, improvise! :)

#### Missions:

Provide an endpoint that responds to:

* GET `/cinemas` --> should return the list of cinemas
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

* GET `/actors?first_name=Joaquin` --> should return actor information matching the rule `first_name=Joaquin`
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

* POST `/cinemas/{id_cinema}/movies/{id_movie}/sessions` --> should create a new session (in the database) at the provided times for the given movie (free input payload)

## Phase 4 (30 minutes): QUEUES!
### Exercise 5 (continued)
1. Start a message broker on your system.
2. After a POST to `/cinemas/{id_cinema}/movies/{id_movie}/sessions`, publish a new message on a queue.
3. This message must contain:
    ```
    DiffusionSession {id, movie title, start_time, a callback URL to delete the session (new endpoint)}
    ```
4. Create a consumer that reads all events coming on the queue.
5. If the start time of the session is later than `22:00:00`, use the callback URL to delete the session.
