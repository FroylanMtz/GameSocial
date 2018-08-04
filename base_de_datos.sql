create database twigame;

use twigame;


create table usuarios(
    id int auto_increment not null,
    nombre varchar(50) not null,
    apellidos varchar(100) not null,
    username varchar(50) not null,
    password varchar(50) not null,
    correo varchar(50) not null,
    edad int not null,

    primary key(id)
);

create table juegos(
    id int auto_increment not null,
    nombre varchar(50) not null,
    descripcion varchar(500) not null,
    genero varchar(50) not null,

    primary key(id)

);

create table usuarios_juegos(
    id_usuario int not null,
    id_juego int not null,

    primary key(id_usuario, id_juego),
    index(id_usuario),
    index(id_juego),
    
    foreign key (id_usuario) references usuarios(id),
    foreign key (id_juego) references juegos(id)

    
);

create table puntajes(

    id int auto_increment not null,
    id_juego int not null,
    id_usuario int not null,
    marcador int not null,

    primary key(id),

    index(id_juego),
    index(id_usuario),

    foreign key (id_juego) references juegos(id),
    foreign key (id_usuario) references usuarios(id)

);

create table seguimiento(
    id_seguidor int not null,
    id_seguido int not null,

    primary key(id_seguidor, id_seguido),

    index(id_seguidor),
    index(id_seguido),

    foreign key (id_seguidor) references usuarios(id),
    foreign key (id_seguido) references usuarios(id)

    

);