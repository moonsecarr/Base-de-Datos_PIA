ALTER TABLE Usuarios COMMENT = 'Almacena información de los usuarios del sistema';

ALTER TABLE Usuarios 
    MODIFY COLUMN idUsuario int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único del usuario',
    MODIFY COLUMN nombre_completo varchar(250) NOT NULL COMMENT 'Nombre completo del usuario',
    MODIFY COLUMN fecha_nacimiento DATE COMMENT 'Fecha de nacimiento del usuario',
    MODIFY COLUMN foto longblob COMMENT 'Fotografía del usuario tipo longblob',
    MODIFY COLUMN genero enum("Sin seleccionar","Mujer","Hombre","Otros") DEFAULT "Sin seleccionar" COMMENT 'Género del usuario',
    MODIFY COLUMN pais varchar(60) COMMENT 'País de residencia',
    MODIFY COLUMN nacionalidad varchar(100) COMMENT 'Nacionalidad del usuario',
    MODIFY COLUMN correo varchar(250) COMMENT 'Correo electrónico del usuario',
    MODIFY COLUMN contraseña varchar(10) COMMENT 'Contraseña de acceso',
    MODIFY COLUMN rol enum("Ninguno","Administrador" , "Operador") DEFAULT "Ninguno" COMMENT 'Rol del usuario en el sistema',
    MODIFY COLUMN fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de registro en el sistema',
	MODIFY COLUMN activo int DEFAULT 1 COMMENT 'Estado del usuario (1=activo, 0=inactivo)';
    
SHOW TABLE STATUS WHERE Name = 'Usuarios';

SHOW FULL COLUMNS FROM Usuarios;
SHOW FULL COLUMNS FROM ;
ALTER TABLE Publicacion COMMENT = 'Almacena las publicaciones realizadas por usuarios';
ALTER TABLE Publicacion 
    MODIFY COLUMN idPublicacion int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único de publicación',
    MODIFY COLUMN titulo varchar(50) NOT NULL COMMENT 'Título de la publicación',
    MODIFY COLUMN descripcion varchar(250) NOT NULL COMMENT 'Descripción/contenido de la publicación',
    MODIFY COLUMN multimedia longblob COMMENT 'Archivo multimedia adjunto',
    MODIFY COLUMN estadoPublicacion enum("Activa", "Pendiente") DEFAULT "Pendiente" COMMENT 'Estado de aprobación de la publicación',
    MODIFY COLUMN fechaElaboracion DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación',
    MODIFY COLUMN fechaAprobacion DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de aprobación',
    MODIFY COLUMN activo int DEFAULT 1 COMMENT 'Estado de la publicación 1=activo y 0=inactivo',
    MODIFY COLUMN idUsuario int NOT NULL COMMENT 'ID del usuario que creó la publicación';

ALTER TABLE Reaccion COMMENT = 'Registra las reacciones de usuarios a publicaciones';
ALTER TABLE Reaccion 
    MODIFY COLUMN idReaccion int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único de reacción',
    MODIFY COLUMN nombre varchar(20) NOT NULL COMMENT 'Nombre de la reacción',
    MODIFY COLUMN icono longblob NOT NULL COMMENT 'Icono de la reacción',
    MODIFY COLUMN idPublicacion int NOT NULL COMMENT 'ID de la publicación reaccionada',
    MODIFY COLUMN idUsuario int NOT NULL COMMENT 'ID del usuario que reacciona',
    MODIFY COLUMN fecha DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de la reacción';

ALTER TABLE Comentario COMMENT = 'Almacena comentarios en publicaciones';
ALTER TABLE Comentario 
    MODIFY COLUMN idComentario int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único del comentario',
    MODIFY COLUMN multimedia longblob COMMENT 'Archivo multimedia adjunto al comentario',
    MODIFY COLUMN descripcion varchar(250) NOT NULL COMMENT 'Texto del comentario',
    MODIFY COLUMN fecha DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha del comentario',
    MODIFY COLUMN activo int DEFAULT 1 COMMENT 'Estado del comentario',
    MODIFY COLUMN idPublicacion int NOT NULL COMMENT 'ID de la publicación comentada',
    MODIFY COLUMN idUsuario int NOT NULL COMMENT 'ID del usuario que comenta';

ALTER TABLE Categoria COMMENT = 'Catálogo de categorías para clasificar publicaciones';
ALTER TABLE Categoria 
    MODIFY COLUMN idCategoria int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único de categoría',
    MODIFY COLUMN nombreCategoria varchar(50) NOT NULL COMMENT 'Nombre de la categoría',
    MODIFY COLUMN descripcion varchar(250) NOT NULL COMMENT 'Descripción de la categoría',
    MODIFY COLUMN estado int DEFAULT 1 COMMENT 'Estado de la categoría';

ALTER TABLE Publicacion_Categoria COMMENT = 'Relación muchos a muchos entre publicaciones y categorías';
ALTER TABLE Publicacion_Categoria 
    MODIFY COLUMN idPublicacionCategoria int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único de la relación',
    MODIFY COLUMN idPublicacion int NOT NULL COMMENT 'ID de la publicación',
    MODIFY COLUMN idCategoria int NOT NULL COMMENT 'ID de la categoría';
    
ALTER TABLE Seleccion COMMENT = 'Información de selecciones nacionales de fútbol';
ALTER TABLE Seleccion 
    MODIFY COLUMN idSeleccion int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único de selección',
    MODIFY COLUMN nombre varchar(100) NOT NULL COMMENT 'Nombre de la selección',
    MODIFY COLUMN confederacion varchar(50) NOT NULL COMMENT 'Confederación a la que pertenece',
    MODIFY COLUMN pais varchar(100) NOT NULL COMMENT 'País de la selección',
    MODIFY COLUMN continente varchar(50) NOT NULL COMMENT 'Continente del país',
    MODIFY COLUMN idioma_oficial varchar(50) COMMENT 'Idioma oficial del país',
    MODIFY COLUMN bandera longblob COMMENT 'Imagen de la bandera',
    MODIFY COLUMN idPublicacion int NOT NULL COMMENT 'ID de la publicación relacionada';

ALTER TABLE Mundial COMMENT = 'Información detallada de copas mundiales de fútbol';
ALTER TABLE Mundial 
    MODIFY COLUMN idMundial int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único del mundial',
    MODIFY COLUMN logotipo longblob NOT NULL COMMENT 'Logo del mundial',
    MODIFY COLUMN nombre varchar(30) NOT NULL COMMENT 'Nombre del mundial',
    MODIFY COLUMN año YEAR NOT NULL COMMENT 'Año de celebración',
    MODIFY COLUMN reseña varchar(250) NOT NULL COMMENT 'Reseña descriptiva',
    MODIFY COLUMN imagen longblob NOT NULL COMMENT 'Imagen representativa',
    MODIFY COLUMN pais_sede varchar(100) NOT NULL COMMENT 'País sede',
    MODIFY COLUMN continente_sede varchar(50) NOT NULL COMMENT 'Continente de la sede',
    MODIFY COLUMN idioma_sede varchar(50) COMMENT 'Idioma de la sede',
    MODIFY COLUMN campeon varchar(100) NOT NULL COMMENT 'Equipo campeón',
    MODIFY COLUMN subcampeon varchar(100) NOT NULL COMMENT 'Equipo subcampeón',
    MODIFY COLUMN marcador_final varchar(20) COMMENT 'Marcador del partido final',
    MODIFY COLUMN tiempo_extra boolean DEFAULT FALSE COMMENT 'Indica si hubo tiempo extra',
    MODIFY COLUMN penales boolean DEFAULT FALSE COMMENT 'Indica si hubo penales',
    MODIFY COLUMN campeon_goleador varchar(100) COMMENT 'Máximo goleador',
    MODIFY COLUMN alineacion_campeon text COMMENT 'Alineación del equipo campeón',
    MODIFY COLUMN cambios_destacados text COMMENT 'Cambios destacados',
    MODIFY COLUMN jugadas_destacadas text COMMENT 'Jugadas destacadas',
    MODIFY COLUMN cantante_inaugural varchar(100) COMMENT 'Cantante inaugural',
    MODIFY COLUMN cancion_oficial varchar(100) COMMENT 'Canción oficial',
    MODIFY COLUMN mascota varchar(100) COMMENT 'Mascota del mundial',
    MODIFY COLUMN idPublicacion int NOT NULL COMMENT 'ID de la publicación relacionada';
    
ALTER TABLE Participacion COMMENT = 'Registra la participación de selecciones en mundiales';
ALTER TABLE Participacion 
    MODIFY COLUMN idParticipacion int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único de participación',
    MODIFY COLUMN nomPais varchar(100) NOT NULL COMMENT 'Nombre del país participante',
    MODIFY COLUMN grupo varchar(1) NOT NULL COMMENT 'Grupo de clasificación',
    MODIFY COLUMN posicionFinal int NOT NULL COMMENT 'Posición final en el torneo',
    MODIFY COLUMN golesFavor int NOT NULL COMMENT 'Goles a favor',
    MODIFY COLUMN golesContra int NOT NULL COMMENT 'Goles en contra',
    MODIFY COLUMN anfitrion boolean DEFAULT FALSE COMMENT 'Indica si fue anfitrión',
    MODIFY COLUMN mejor_resultado varchar(100) COMMENT 'Mejor resultado histórico',
    MODIFY COLUMN peor_resultado varchar(100) COMMENT 'Peor resultado histórico',
    MODIFY COLUMN copas_mundiales_participadas int COMMENT 'Número de participaciones',
    MODIFY COLUMN datos_curiosos text COMMENT 'Datos curiosos',
    MODIFY COLUMN idMundial int NOT NULL COMMENT 'ID del mundial',
    MODIFY COLUMN idSeleccion int NOT NULL COMMENT 'ID de la selección';
    
ALTER TABLE Jugadores COMMENT = 'Información de jugadores de fútbol';
ALTER TABLE Jugadores 
    MODIFY COLUMN idJugador int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único del jugador',
    MODIFY COLUMN nombre_completo varchar(250) NOT NULL COMMENT 'Nombre completo del jugador',
    MODIFY COLUMN fecha_nacimiento DATE COMMENT 'Fecha de nacimiento',
    MODIFY COLUMN foto longblob COMMENT 'Fotografía del jugador',
    MODIFY COLUMN posicion varchar(100) COMMENT 'Posición en el campo',
    MODIFY COLUMN numero_camiseta int COMMENT 'Número de camiseta',
    MODIFY COLUMN idSeleccion int NOT NULL COMMENT 'ID de la selección',
    MODIFY COLUMN activo int DEFAULT 1 COMMENT 'Estado del registro';
    
ALTER TABLE EstadisticasMundial COMMENT = 'Estadísticas detalladas de jugadores por mundial';
ALTER TABLE EstadisticasMundial 
    MODIFY COLUMN idEstadistica int AUTO_INCREMENT NOT NULL COMMENT 'Identificador único de estadística',
    MODIFY COLUMN idMundial int NOT NULL COMMENT 'ID del mundial',
    MODIFY COLUMN idSeleccion int NOT NULL COMMENT 'ID de la selección',
    MODIFY COLUMN idJugador int NOT NULL COMMENT 'ID del jugador',
    MODIFY COLUMN goles int DEFAULT 0 COMMENT 'Total de goles',
    MODIFY COLUMN asistencias int DEFAULT 0 COMMENT 'Total de asistencias',
    MODIFY COLUMN tarjetas_amarillas int DEFAULT 0 COMMENT 'Tarjetas amarillas',
    MODIFY COLUMN tarjetas_rojas int DEFAULT 0 COMMENT 'Tarjetas rojas',
    MODIFY COLUMN partidos_jugados int DEFAULT 0 COMMENT 'Partidos jugados',
    MODIFY COLUMN minutos_jugados int DEFAULT 0 COMMENT 'Minutos jugados';
    
