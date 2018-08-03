create database twitgame;

use twitgame;


create table usuarios(
    id int primary key auto_increment not null,
    nombre varchar(50) not null,
    apellidos varchar(100) not null,
    username varchar(50) not null,
    password varchar(50) not null,
    correo varchar(50) not null,
    fecha_nacimiento date not null
);

create table juegos(
    id int primary key auto_increment not null,
    nombre varchar(50) not null,
    descripcion varchar(500) not null,
    genero varchar(50) not null
);

create table usuarios_juegos(
    id_usuario int,
    id_juego int,

    constraint "usuarios_juegosFK1" foreign key (id_usuario) references usuarios(id),
    constraint "usuarios_juegosFK2" foreign key (id_juego) references juegos(id),

    primary key(id_usuario, id_juego);
);

create table puntajes(

    id int primary key auto_increment not null,
    id_juego int,
    id_usuario int,
    marcador int,

    constraint "puntajesFK1" foreign key (id_juego) references juegos(id),
    constraint "puntajesFK2" foreign key (id_usuario) references usuarios(id)

);

create table seguimiento(
    id_seguidor int,
    id_seguido int,

    constraint "seguimientoFK1" foreign key (id_seguidor) references usuarios(id),
    constraint "seguimientoFK1" foreign key (id_seguido) references usuarios(id),

    primary key(id_seguidor, id_seguido);

);