create table cinema_actor
(
    id         integer     not null
        primary key autoincrement,
    first_name varchar(64) not null,
    last_name  varchar(64) not null,
    birth_date date        not null
);

create table cinema_movie
(
    id           integer not null
        primary key autoincrement,
    title        text    not null,
    description  text    not null,
    release_date date    not null
);

create table cinema_movie_casting
(
    id       integer not null
        primary key autoincrement,
    movie_id bigint  not null
        references cinema_movie
            deferrable initially deferred,
    actor_id bigint  not null
        references cinema_actor
            deferrable initially deferred
);

create index cinema_movie_casting_actor_id_9a5d1a2c
    on cinema_movie_casting (actor_id);

create index cinema_movie_casting_movie_id_09ba0c2c
    on cinema_movie_casting (movie_id);

create unique index cinema_movie_casting_movie_id_actor_id_9444bb85_uniq
    on cinema_movie_casting (movie_id, actor_id);

create table cinema_operator
(
    id   integer     not null
        primary key autoincrement,
    name varchar(64) not null
        unique
);

create table cinema_cinema
(
    id            integer      not null
        primary key autoincrement,
    name          varchar(255) not null,
    city          varchar(255) not null,
    number_street text         not null,
    code_post     varchar(32)  not null,
    operator_id   bigint       not null
        references cinema_operator
            deferrable initially deferred
);

create index cinema_cinema_operator_id_8db63392
    on cinema_cinema (operator_id);

create table cinema_room
(
    id                      integer not null
        primary key autoincrement,
    number                  integer not null,
    seat_count              integer not null,
    screen_width            integer not null,
    screen_height           integer not null,
    screen_minimal_distance integer not null,
    cinema_id               bigint  not null
        references cinema_cinema
            deferrable initially deferred
);

create table cinema_moviesession
(
    id                   integer not null
        primary key autoincrement,
    diffusion_start_date date    not null,
    diffusion_end_date   date    not null,
    movie_id             bigint  not null
        references cinema_movie
            deferrable initially deferred,
    room_id              bigint  not null
        references cinema_room
            deferrable initially deferred
);

create table cinema_diffusionsession
(
    id                   integer not null
        primary key autoincrement,
    diffusion_start_time time    not null,
    movie_session_id_id  bigint  not null
        references cinema_moviesession
            deferrable initially deferred
);

create index cinema_diffusionsession_movie_session_id_id_c21521b8
    on cinema_diffusionsession (movie_session_id_id);

create index cinema_moviesession_movie_id_fbe18b1e
    on cinema_moviesession (movie_id);

create index cinema_moviesession_room_id_c8b803ce
    on cinema_moviesession (room_id);

create index cinema_room_cinema_id_c954d60c
    on cinema_room (cinema_id);

insert into main.cinema_operator (id, name) values (1, 'CGU');
insert into main.cinema_operator (id, name) values (2, 'Passion');

insert into main.cinema_cinema (id, name, city, number_street, code_post, operator_id) values (1, 'Astoria', 'Lyon', '44 Cours Vitton', '69006', 1);
insert into main.cinema_cinema (id, name, city, number_street, code_post, operator_id) values (2, 'Bellcour', 'Lyon', '172 Avenue de la Republique', '69002', 1);
insert into main.cinema_cinema (id, name, city, number_street, code_post, operator_id) values (3, 'GambeCine', 'Nice', '30 Boulevard Gambetta', '06100', 2);

insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (1, 1, 100, 6, 6, 5, 1);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (2, 2, 250, 6, 6, 5, 1);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (3, 3, 250, 6, 6, 5, 1);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (4, 4, 300, 6, 6, 5, 1);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (5, 5, 60, 6, 6, 5, 1);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (6, 6, 30, 6, 6, 5, 1);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (7, 0, 10, 4, 3, 3, 2);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (8, 0, 40, 4, 3, 3, 2);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (9, 0, 60, 4, 3, 3, 2);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (10, 0, 20, 4, 3, 3, 2);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (11, 0, 40, 4, 3, 3, 2);
insert into main.cinema_room (id, number, seat_count, screen_width, screen_height, screen_minimal_distance, cinema_id) values (12, 0, 40, 4, 3, 3, 2);

insert into main.cinema_movie (id, title, description, release_date) values (1, 'La marche bof', 'blablabla', '2022-05-31');
insert into main.cinema_movie (id, title, description, release_date) values (2, 'Le seigneur des brebis', 'bliblibli', '2022-03-02');
insert into main.cinema_movie (id, title, description, release_date) values (3, 'Taxi 12', 'vroum vroum', '2022-03-15');
insert into main.cinema_movie (id, title, description, release_date) values (4, 'La vie d''un poete', 'pas dingue', '2022-04-24');

insert into main.cinema_moviesession (id, diffusion_start_date, diffusion_end_date, movie_id, room_id) values (1, '2022-04-01', '2022-05-31', 1, 1);
insert into main.cinema_moviesession (id, diffusion_start_date, diffusion_end_date, movie_id, room_id) values (2, '2022-04-01', '2022-05-31', 1, 9);
insert into main.cinema_moviesession (id, diffusion_start_date, diffusion_end_date, movie_id, room_id) values (3, '2022-04-01', '2022-05-31', 2, 10);
insert into main.cinema_moviesession (id, diffusion_start_date, diffusion_end_date, movie_id, room_id) values (4, '2022-04-01', '2022-05-31', 3, 11);
insert into main.cinema_moviesession (id, diffusion_start_date, diffusion_end_date, movie_id, room_id) values (5, '2022-04-01', '2022-05-31', 2, 2);
insert into main.cinema_moviesession (id, diffusion_start_date, diffusion_end_date, movie_id, room_id) values (6, '2022-04-01', '2022-05-31', 3, 3);

insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (1, '10:00:00', 1);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (2, '14:00:00', 1);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (3, '16:00:00', 1);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (4, '10:00:00', 2);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (5, '14:00:00', 2);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (6, '16:00:00', 2);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (7, '10:00:00', 3);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (8, '14:00:00', 3);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (9, '16:00:00', 3);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (10, '10:00:00', 4);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (11, '14:00:00', 4);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (12, '16:00:00', 4);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (13, '10:00:00', 5);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (14, '14:00:00', 5);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (15, '16:00:00', 5);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (16, '10:00:00', 6);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (17, '14:00:00', 6);
insert into main.cinema_diffusionsession (id, diffusion_start_time, movie_session_id_id) values (18, '16:00:00', 6);

insert into main.cinema_actor (id, first_name, last_name, birth_date) values (1, 'Joaquin', 'Phoenix', '1950-12-23');
insert into main.cinema_actor (id, first_name, last_name, birth_date) values (2, 'Scarlett', 'Johansson', '1960-04-23');
insert into main.cinema_actor (id, first_name, last_name, birth_date) values (3, 'Lucky', 'Luke', '1930-11-01');
insert into main.cinema_actor (id, first_name, last_name, birth_date) values (4, 'John', 'Doe', '1970-05-13');

insert into main.cinema_movie_casting (id, movie_id, actor_id) values (1, 1, 1);
insert into main.cinema_movie_casting (id, movie_id, actor_id) values (2, 1, 2);
insert into main.cinema_movie_casting (id, movie_id, actor_id) values (3, 4, 4);
insert into main.cinema_movie_casting (id, movie_id, actor_id) values (4, 4, 3);
insert into main.cinema_movie_casting (id, movie_id, actor_id) values (5, 2, 1);
insert into main.cinema_movie_casting (id, movie_id, actor_id) values (6, 2, 3);
insert into main.cinema_movie_casting (id, movie_id, actor_id) values (8, 4, 2);
