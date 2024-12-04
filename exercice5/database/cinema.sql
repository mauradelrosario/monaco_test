-- Création des tables
CREATE TABLE cinema_operator (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL UNIQUE
);

CREATE TABLE cinema_cinema (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    number_street TEXT NOT NULL,
    code_post VARCHAR(32) NOT NULL,
    operator_id INT NOT NULL,
    FOREIGN KEY (operator_id) REFERENCES cinema_operator(id)
);

CREATE TABLE cinema_actor (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(64) NOT NULL,
    last_name VARCHAR(64) NOT NULL,
    birth_date DATE NOT NULL
);

CREATE TABLE cinema_movie (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    release_date DATE NOT NULL
);

CREATE TABLE cinema_room (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    number INT NOT NULL,
    seat_count INT NOT NULL,
    screen_width INT NOT NULL,
    screen_height INT NOT NULL,
    screen_minimal_distance INT NOT NULL,
    cinema_id INT NOT NULL,
    FOREIGN KEY (cinema_id) REFERENCES cinema_cinema(id)
);

CREATE TABLE cinema_moviesession (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    diffusion_start_date DATE NOT NULL,
    diffusion_end_date DATE NOT NULL,
    movie_id INT NOT NULL,
    room_id INT NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES cinema_movie(id),
    FOREIGN KEY (room_id) REFERENCES cinema_room(id)
);

CREATE TABLE cinema_diffusionsession (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    diffusion_start_time TIME NOT NULL,
    movie_session_id INT NOT NULL,
    FOREIGN KEY (movie_session_id) REFERENCES cinema_moviesession(id)
);

-- Insertion des données de base
INSERT INTO cinema_operator (id, name) VALUES 
(1, 'CGU'),
(2, 'Passion');

INSERT INTO cinema_cinema (id, name, city, number_street, code_post, operator_id) VALUES
(1, 'Astoria', 'Lyon', '44 Cours Vitton', '69006', 1),
(2, 'Bellcour', 'Lyon', '172 Avenue de la Republique', '69002', 1),
(3, 'GambeCine', 'Nice', '30 Boulevard Gambetta', '06100', 2);

INSERT INTO cinema_actor (id, first_name, last_name, birth_date) VALUES
(1, 'Joaquin', 'Phoenix', '1950-12-23'),
(2, 'Scarlett', 'Johansson', '1960-04-23'),
(3, 'Brad', 'Pitt', '1963-12-18');

INSERT INTO cinema_movie (id, title, description, release_date) VALUES
(1, 'La marche bof', 'Description du film 1', '2022-05-31'),
(2, 'Le seigneur des brebis', 'Description du film 2', '2022-03-02'),
(3, 'Taxi 12', 'Description du film 3', '2022-03-15');

INSERT INTO cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) VALUES
(1, 1, 100, 6, 6, 5, 1),
(2, 2, 250, 6, 6, 5, 1),
(3, 1, 150, 6, 6, 5, 2);

INSERT INTO cinema_moviesession (id, diffusion_start_date, diffusion_end_date, movie_id, room_id) VALUES
(1, '2024-03-01', '2024-03-31', 1, 1),
(2, '2024-03-01', '2024-03-31', 2, 2),
(3, '2024-03-01', '2024-03-31', 3, 3);

INSERT INTO cinema_diffusionsession (id, diffusion_start_time, movie_session_id) VALUES
(1, '10:00:00', 1),
(2, '14:00:00', 1),
(3, '20:00:00', 1),
(4, '11:00:00', 2),
(5, '15:00:00', 2),
(6, '19:00:00', 2);