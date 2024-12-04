--------------------- Tables  ---------------------
CREATE TABLE Exploitant (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL
);

CREATE TABLE Cinema (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    numero INT NOT NULL,
    rue VARCHAR(255) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    id_exploitant INT NOT NULL,
    FOREIGN KEY (id_exploitant) REFERENCES Exploitant(id)
);

CREATE TABLE Salle (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL,
    nb_sieges INT NOT NULL,
    ecran_hauteur DECIMAL(5,2) NOT NULL,
    ecran_largeur DECIMAL(5,2) NOT NULL,
    ecran_distance DECIMAL(5,2) NOT NULL,
    id_cinema INT NOT NULL,
    FOREIGN KEY (id_cinema) REFERENCES Cinema(id)
);

CREATE TABLE Film (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    date_sortie DATE NOT NULL
);

CREATE TABLE Acteur (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL
);

CREATE TABLE Casting (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(255) NOT NULL,
    id_film INT NOT NULL,
    id_acteur INT NOT NULL,
    FOREIGN KEY (id_film) REFERENCES Film(id),
    FOREIGN KEY (id_acteur) REFERENCES Acteur(id)
);

CREATE TABLE Seance (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    id_salle INT NOT NULL,
    id_film INT NOT NULL,
    FOREIGN KEY (id_salle) REFERENCES Salle(id),
    FOREIGN KEY (id_film) REFERENCES Film(id)
);

--------------------- Insertion des données ---------------------
INSERT INTO Exploitant (nom) VALUES 
    ('CGU'),
    ('Passion');

INSERT INTO Cinema (nom, numero, rue, ville, code_postal, id_exploitant) VALUES
    ('Cinema CGU Paris', 12, 'Rue de Paris', 'Paris', '75001', 1),
    ('Cinema Passion Lyon', 34, 'Avenue de Lyon', 'Lyon', '69001', 2);

INSERT INTO Salle (numero, nb_sieges, ecran_hauteur, ecran_largeur, ecran_distance, id_cinema) VALUES
    (1, 150, 10.5, 20.0, 5.0, 1),
    (2, 200, 12.0, 25.0, 6.0, 1),
    (1, 100, 8.0, 15.0, 4.0, 2);

INSERT INTO Film (titre, date_sortie) VALUES
    ('Inception', '2010-07-16'),
    ('The Matrix', '1999-03-31');

INSERT INTO Acteur (nom, prenom, date_naissance) VALUES
    ('DiCaprio', 'Leonardo', '1974-11-11'),
    ('Reeves', 'Keanu', '1964-09-02');

INSERT INTO Casting (role, id_film, id_acteur) VALUES
    ('Cobb', 1, 1),
    ('Neo', 2, 2);

INSERT INTO Seance (date_debut, date_fin id_salle, id_film) VALUES
    ('2023-11-01 14:00:00', '2023-11-01 15:00:00', 1, 1),
    ('2023-11-01 17:00:00', '2023-11-01 18:00:00', 2, 2),
    ('2023-11-02 20:00:00', '2023-11-01 22:00:00', 3, 1);