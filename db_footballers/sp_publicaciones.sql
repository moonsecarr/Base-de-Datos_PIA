use footballers;
select*from Publicacion;
select*from Usuarios;
DROP PROCEDURE IF EXISTS sp_publicacion;

DELETE FROM Publicacion WHERE idPublicacion = 3;
DELIMITER $$
CREATE PROCEDURE sp_publicacion(
    IN opcion INT,
    IN titulo VARCHAR(50),
    IN descripcion VARCHAR(250),
    IN multimedia LONGBLOB,
    IN mime_type VARCHAR(50),
    IN estadoPublicacion VARCHAR(20),
    IN fechaElaboracion DATETIME,
    IN fechaAprobacion DATETIME,
    IN activo INT,
    IN idUsuario INT,
    IN idCategoria int,
    IN idMundial int
)
BEGIN
    DECLARE p_mensaje VARCHAR(500);
    DECLARE p_exito BOOLEAN DEFAULT FALSE;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET p_mensaje = 'Error al ejecutar la operación';
        SET p_exito = FALSE;
        SELECT p_mensaje AS mensaje, p_exito AS exito;
    END;

    START TRANSACTION;

    CASE opcion
        WHEN 1 THEN -- INSERTAR PUBLICACION
            INSERT INTO Publicacion(
                titulo, descripcion, multimedia,mime_type, estadoPublicacion,
                fechaElaboracion, fechaAprobacion, activo, idUsuario,idCategoria, idMundial
            )
            VALUES(
                titulo, descripcion, multimedia, mime_type,IFNULL(NULLIF(estadoPublicacion,''), 'Pendiente'),
                NOW(), NOW(), activo, idUsuario,idCategoria, idMundial
            );

            SET p_mensaje = 'Publicación insertada correctamente';
            SET p_exito = TRUE;
            SELECT p_mensaje AS mensaje, p_exito AS exito;
    END CASE;

    COMMIT;
END$$
DELIMITER ;




-- Solicitud de publicacion
DROP PROCEDURE IF EXISTS getPublicacionesPendientes;
SELECT idPublicacion, mime_type FROM Publicacion;

DELIMITER $$
CREATE PROCEDURE getPublicacionesPendientes()
BEGIN
   SELECT *
   FROM solicitudPublicacion
   WHERE estadoPublicacion = 'Pendiente' ;
END$$
DELIMITER ;


call getPublicacionesPendientes();


DROP PROCEDURE IF EXISTS aprobarPublicacion;

DELIMITER $$

CREATE PROCEDURE aprobarPublicacion(IN p_id INT)
BEGIN
    DECLARE p_mensaje VARCHAR(500);
    DECLARE p_exito BOOLEAN DEFAULT FALSE;
     DECLARE yaAprobado BOOLEAN;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET p_mensaje = 'Error al ejecutar la operación';
        SET p_exito = FALSE;
        SELECT p_mensaje AS mensaje, p_exito AS exito;
    END;
    START TRANSACTION;
   

    -- Llamamos a la función
    SET yaAprobado = esAprobado(p_id);

    IF yaAprobado = FALSE THEN
        UPDATE Publicacion
        SET estadoPublicacion = 'Activa'
        WHERE idPublicacion = p_id;
        
	SET p_mensaje = 'Aprobada con exito';
	SET p_exito = TRUE;
    END IF;
	SELECT p_mensaje AS mensaje, p_exito AS exito;
 
END$$

DELIMITER ;
select*from publicacion;
CALL aprobarPublicacion(6);

delete 
DROP PROCEDURE IF EXISTS rechazarPublicacion;

DELIMITER $$

CREATE PROCEDURE rechazarPublicacion(IN p_id INT)
BEGIN
    DECLARE p_mensaje VARCHAR(500);
    DECLARE p_exito BOOLEAN DEFAULT FALSE;
    DECLARE yaAprobado BOOLEAN;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET p_mensaje = 'Error al ejecutar la operación';
        SET p_exito = FALSE;
        SELECT p_mensaje AS mensaje, p_exito AS exito;
    END;

    START TRANSACTION;

    SET yaAprobado = esAprobado(p_id);

    IF yaAprobado = FALSE THEN
        UPDATE publicacion
        SET activo = 0
        WHERE idPublicacion = p_id;

        SET p_mensaje = 'Rechazada con éxito';
        SET p_exito = TRUE;
    ELSE
        SET p_mensaje = 'La publicación ya estaba aprobada';
        SET p_exito = FALSE;
    END IF;

    COMMIT;

    SELECT p_mensaje AS mensaje, p_exito AS exito;
END$$

DELIMITER ;
select*from Publicacion;
CALL rechazarPublicacion(9);

DROP TABLE publicacion;
DROP PROCEDURE IF EXISTS getPublicacionId;

DELIMITER $$
CREATE PROCEDURE getPublicacionId
( IN p_usuario_id INT ) 
BEGIN
   SELECT  idPublicacion,multimedia,mime_type
   FROM publicacion
   WHERE estadoPublicacion = 'Activa'
     AND idUsuario = p_usuario_id
     AND activo = 1;
END$$
DELIMITER ;

-- Ejemplo de llamada:
CALL getPublicacionId(2);
select*from mundial;
select*from categoria;
select * from publicacion;

--  Filtro mundial

DROP procedure FiltrarPublicacionesPorMundial;
DELIMITER $$

CREATE PROCEDURE FiltrarPublicacionesPorMundial (
    IN p_idMundial INT
)
BEGIN
    SELECT 
        idPublicacion,
        titulo,
        descripcion,
        estadoPublicacion,
        fechaElaboracion,
        fechaAprobacion,
        idUsuario,
        idCategoria
    FROM Publicacion
    WHERE idMundial = p_idMundial
      AND activo = 1 AND estadoPublicacion = 'Activa'; -- opcional: solo publicaciones activas
END$$
DELIMITER ;
call FiltrarPublicacionesPorMundial(1);
select*from publicacion
;