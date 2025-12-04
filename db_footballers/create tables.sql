create database footballers;
use footballers;
drop database footballers;

create table Usuarios
(
    idUsuario int auto_increment not null,
    nombre_completo varchar(250) not null,
    fecha_nacimiento DATE,
    foto longblob,
    genero enum("Sin seleccionar","Mujer","Hombre","Otros") default "Sin seleccionar",
    pais varchar(60),
    nacionalidad varchar(100),
    correo varchar(250),
    contraseña varchar(10),
    rol enum("Ninguno","Administrador" , "Operador") default "Ninguno",
    fecha_registro DATETIME default current_timestamp,
    activo int default 1,
    nickname varchar(250),
    primary key(idUsuario)
);

delete from publicacion where  idPublicacion > 0;
select * from Usuarios;
DELETE FROM publicacion WHERE idPublicacion = 4;

select *from Publicacion;

create table Publicacion
(
    idPublicacion int auto_increment not null,
    titulo varchar(50) not null,
    descripcion varchar(250) not null,
    multimedia longblob,
    mime_type VARCHAR(50),
    estadoPublicacion enum("Activa", "Pendiente" ) default "Pendiente",
    fechaElaboracion DATETIME default current_timestamp,
    fechaAprobacion DATETIME default current_timestamp,
    activo int default 1,
    idUsuario int not null,
    idMundial int ,
    idCategoria int,
    primary key (idPublicacion),
    foreign key (idUsuario) references Usuarios(idUsuario)
);

ALTER TABLE Publicacion
ADD CONSTRAINT fk_publicacion_mundial
FOREIGN KEY (idMundial) REFERENCES Mundial(idMundial);

-- Llave foránea hacia Categoria
ALTER TABLE Publicacion
ADD CONSTRAINT fk_publicacion_categoria
FOREIGN KEY (idCategoria) REFERENCES Categoria(idCategoria);
create table Reaccion
(
    idReaccion int auto_increment not null,
    nombre varchar(20) not null,
    icono longblob not null,
    idPublicacion int not null,
    idUsuario int not null,
    fecha DATETIME default current_timestamp,
    primary key (idReaccion),
    foreign key (idPublicacion) references Publicacion(idPublicacion),
    foreign key (idUsuario) references Usuarios(idUsuario)
);
create table Comentario
(
    idComentario int auto_increment not null,
    multimedia longblob,
    descripcion varchar(250) not null,
    fecha DATETIME default current_timestamp,
    activo int default 1,
    idPublicacion int not null,
    idUsuario int not null,
    primary key (idComentario),
    foreign key (idPublicacion) references Publicacion(idPublicacion),
    foreign key (idUsuario) references Usuarios(idUsuario)
);

create table Categoria
(
    idCategoria int auto_increment not null,
    nombreCategoria varchar(50) not null,
    estado int default 1,
    idUsuario int,
    primary key (idCategoria),
    FOREIGN KEY (idUsuario) REFERENCES Usuarios(idUsuario)
);

create table Mundial
(
    idMundial int auto_increment not null,
    logotipo longblob not null,
    nombre varchar(30) not null,
    año YEAR not null,
    reseña varchar(250) not null,
    -- Información del campeonato
    campeon varchar(100) not null,
    subcampeon varchar(100) not null,
    mayorGoleador varchar(100) not null,
    MVP varchar(100) not null,
    idPublicacion int null,
    primary key (idMundial),
    foreign key (idPublicacion) references Publicacion(idPublicacion)
);

