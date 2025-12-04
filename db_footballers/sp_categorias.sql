use footballers;
select*from Categoria;


DROP PROCEDURE IF EXISTS sp_categoria;

DELIMITER $$
CREATE PROCEDURE sp_categoria(
    IN p_opcion INT,
    IN p_idCategoria INT,
    IN p_nombreCategoria varchar(50),
    IN p_estado int,
    IN p_idUsuario int
)
BEGIN
    DECLARE p_mensaje VARCHAR(500);
    DECLARE p_exito BOOLEAN DEFAULT FALSE;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET p_mensaje = 'Error al ejecutar la operación en categoria';
        SET p_exito = FALSE;
        SELECT p_mensaje AS mensaje, p_exito AS exito;
    END;

    START TRANSACTION;

    CASE p_opcion
        WHEN 1 THEN -- INSERTAR
        
            INSERT INTO Categoria(nombreCategoria,idUsuario)
            VALUES(p_nombreCategoria,p_idUsuario);

            SET p_mensaje = 'Categoria insertada correctamente';
            SET p_exito = TRUE;
            SELECT p_mensaje AS mensaje, p_exito AS exito;

       WHEN 2 THEN -- ACTUALIZAR
           UPDATE Categoria
           SET estado = IFNULL(p_estado, estado)
           WHERE idCategoria = p_idCategoria
           AND idUsuario = p_idUsuario;


            SET p_mensaje = 'Categoría actualizada correctamente';
            SET p_exito = TRUE;
            SELECT p_mensaje AS mensaje, p_exito AS exito;

        WHEN 3 THEN -- ELIMINAR
            DELETE FROM Categoria
            WHERE idCategoria = p_idCategoria
              AND idUsuario = p_idUsuario;

            SET p_mensaje = 'Categoría eliminada correctamente';
            SET p_exito = TRUE;
            SELECT p_mensaje AS mensaje, p_exito AS exito;
          
    END CASE;

    COMMIT;
END$$
DELIMITER ;

CALL sp_categoria(1, null, 'PruebaDB', null, 27);

CALL sp_categoria(2,1, NULL,  0, 27 );

DROP PROCEDURE IF EXISTS getCategoriasPorUsuario;
 
-- Obtener mundiales
DELIMITER $$
CREATE PROCEDURE getCategoriasPorUsuario(IN p_idUsuario INT)
BEGIN
    SELECT idCategoria, nombreCategoria, estado
    FROM Categoria
    WHERE idUsuario = p_idUsuario  and estado = 1;
END $$
DELIMITER ;

call getCategoriasPorUsuario(27);

-- obtener categorias en general


DROP PROCEDURE IF EXISTS getCategorias;
 

DELIMITER $$
CREATE PROCEDURE getCategorias()
BEGIN
    SELECT *
    FROM Categoria
    WHERE estado = 1;
END $$
DELIMITER ;

call getCategorias();
