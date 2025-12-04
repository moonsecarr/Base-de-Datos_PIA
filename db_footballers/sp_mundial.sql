use footballers;
select*from Mundial;
DELETE FROM Mundial WHERE idMundial = 1;

DROP PROCEDURE IF EXISTS sp_mundial;

DELIMITER $$
CREATE PROCEDURE sp_mundial(
    IN p_opcion INT,
    IN p_idMundial INT,
    IN p_logotipo LONGBLOB,
    IN p_nombre VARCHAR(30),
    IN p_anio YEAR,
    IN p_resena VARCHAR(250),
    IN p_campeon VARCHAR(100),
    IN p_subcampeon VARCHAR(100),
    IN p_mayorGoleador VARCHAR(100),
    IN p_MVP VARCHAR(100),
    IN p_idPublicacion INT
)
BEGIN
    DECLARE p_mensaje VARCHAR(500);
    DECLARE p_exito BOOLEAN DEFAULT FALSE;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET p_mensaje = 'Error al ejecutar la operación en Mundial';
        SET p_exito = FALSE;
        SELECT p_mensaje AS mensaje, p_exito AS exito;
    END;

    START TRANSACTION;

    CASE p_opcion
        WHEN 1 THEN -- INSERTAR
            INSERT INTO Mundial(
                logotipo, nombre, año, reseña,
                campeon, subcampeon, mayorGoleador, MVP, idPublicacion
            )
            VALUES(
                p_logotipo, p_nombre, p_anio, p_resena,
                p_campeon, p_subcampeon, p_mayorGoleador, p_MVP, p_idPublicacion
            );

            SET p_mensaje = 'Mundial insertado correctamente';
            SET p_exito = TRUE;
            SELECT p_mensaje AS mensaje, p_exito AS exito;

        WHEN 2 THEN -- ACTUALIZAR
            UPDATE Mundial
            SET logotipo = p_logotipo,
                nombre = p_nombre,
                anio = p_anio,
                resena = p_resena,
                campeon = p_campeon,
                subcampeon = p_subcampeon,
                mayorGoleador = p_mayorGoleador,
                MVP = p_MVP,
                idPublicacion = p_idPublicacion
            WHERE idMundial = p_idMundial;

            SET p_mensaje = CONCAT('Mundial actualizado correctamente, idMundial = ', p_idMundial);
            SET p_exito = TRUE;
            SELECT p_mensaje AS mensaje, p_exito AS exito;
            
	
    END CASE;

    COMMIT;
END$$
DELIMITER ;

DROP PROCEDURE IF EXISTS getMundiales;
 
-- Obtener mundiales
DELIMITER $$
CREATE PROCEDURE getMundiales()
BEGIN
    SELECT idMundial,nombre, año, logotipo
    FROM Mundial
    ORDER BY año ASC;
END $$
DELIMITER ;

call getMundiales();


DROP PROCEDURE IF EXISTS getMundialPorId;

DELIMITER $$

CREATE PROCEDURE getMundialPorId(IN p_id INT)
BEGIN
    SELECT 
        idMundial,
        nombre,
        año,
        reseña,
        campeon,
        subcampeon,
        mayorGoleador,
        MVP,
        logotipo
    FROM Mundial
    WHERE idMundial = p_id;
END$$

DELIMITER ;
call getMundialPorId(7);
-- Si existe mundial
DROP PROCEDURE IF EXISTS sp_validarMundialUnico;

DELIMITER $$
CREATE PROCEDURE sp_validarMundialUnico(IN p_mundial VARCHAR(30))
BEGIN
    
     DECLARE v_mundial_existe INT;

    SELECT COUNT(*) INTO v_mundial_existe
    FROM Mundial
    WHERE nombre = p_mundial;

    SELECT v_mundial_existe > 0 AS mundial_existe;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS getMundial;
 
select*from mundial;
DELIMITER $$
CREATE PROCEDURE getMundial()
BEGIN
    SELECT *
    FROM Mundial;
END $$
DELIMITER ;

call getMundial();
