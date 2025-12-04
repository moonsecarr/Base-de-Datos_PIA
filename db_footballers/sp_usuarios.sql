use footballers;
select*from Usuarios;
DROP PROCEDURE IF EXISTS sp_usuarios;

DELIMITER $$

CREATE PROCEDURE sp_usuarios(
    IN p_opcion INT,
    IN p_id_usuario INT,
    IN p_nombre_completo VARCHAR(250),
    IN p_fecha_nacimiento DATE,
    IN p_foto longblob,
    IN p_genero ENUM('Sin seleccionar','Mujer','Hombre','Otros'),
    IN p_pais VARCHAR(60),
    IN p_nacionalidad VARCHAR(100),
    IN p_correo VARCHAR(250),
    IN p_contraseña VARCHAR(10),
    IN p_rol ENUM('Ninguno','Administrador','Operador'),
    IN p_nickname VARCHAR(250)
   
)
BEGIN
	DECLARE p_mensaje VARCHAR(500);
    DECLARE p_exito BOOLEAN DEFAULT FALSE;
    
    DECLARE usuario_existe INT DEFAULT 0;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SET p_exito = FALSE;
        SET p_mensaje = 'Error en la operación';
        ROLLBACK;
        SELECT p_mensaje AS mensaje, p_exito AS exito;
    END;
    START TRANSACTION;

    CASE p_opcion
        WHEN 1 THEN -- INSERTAR USUARIO
           
            INSERT INTO usuarios (
                nombre_completo, 
                fecha_nacimiento, 
                foto, 
                genero, 
                pais, 
                nacionalidad, 
                correo, 
                contraseña, 
                rol, 
                fecha_registro,
                nickname
            ) VALUES (
                p_nombre_completo,
                p_fecha_nacimiento,
                p_foto,
                p_genero,
                p_pais,
                p_nacionalidad,
                p_correo,
                p_contraseña,
                p_rol,
                NOW(),
                p_nickname
            );
            
             SET p_exito = TRUE;
			 SET p_mensaje = 'Usuario insertado exitosamente';
             SELECT p_mensaje AS mensaje, p_exito AS exito;
        WHEN 2 THEN -- ACTUALIZAR USUARIO
            -- Verificar si el usuario existe
            SELECT COUNT(*) INTO usuario_existe 
            FROM Usuarios
            WHERE idUsuario = p_id_usuario;
            
            IF usuario_existe = 0 THEN
                SET p_exito = FALSE;
                SET p_mensaje = 'El usuario no existe';
            ELSE
                -- Actualizar 
                UPDATE Usuarios SET
                    nombre_completo = p_nombre_completo,
                    fecha_nacimiento = p_fecha_nacimiento,
                    foto = IFNULL(p_foto, foto),
                    pais = p_pais,
                    nacionalidad = p_nacionalidad,
                    correo = p_correo,
                    contraseña = p_contraseña,
                    rol = p_rol
                WHERE idUsuario = p_id_usuario;
                SET p_exito = TRUE;
                SET p_mensaje = 'Usuario actualizado exitosamente';
            END IF;
		SELECT p_mensaje AS mensaje, p_exito AS exito;
        WHEN 3 THEN -- CONSULTAR USUARIO POR NICKNAME y CONTRASEÑA
		
        -- Este es para mandar los datos a sesion 
         SELECT idUsuario,
           nombre_completo,
           rol,
           fecha_nacimiento,
           genero,
           nacionalidad,
           correo,
           contraseña,
           foto,
           nickname,
           activo
		 FROM Usuarios 
         WHERE nickname = p_nickname 
           AND contraseña = p_contraseña
           AND activo = 1
         LIMIT 1;
         
         --  Y ese para ver que exista
            SELECT COUNT(*) INTO usuario_existe
            FROM Usuarios 
            WHERE nickname = p_nickname 
              AND contraseña = p_contraseña
              AND activo     = 1
            LIMIT 1;

            IF usuario_existe > 0 THEN
                   SET p_exito = TRUE;
                   SET p_mensaje = 'Consulta exitosa';
            ELSE
                   SET p_exito = FALSE;
				   SET p_mensaje = 'Usuario o contraseña incorrectos';
		END IF;
        SELECT p_mensaje AS mensaje, p_exito AS exito;
        WHEN 4 THEN -- CONSULTAR TODOS LOS USUARIOS
            SELECT * FROM Usuarios;
            SET p_exito = TRUE;
            SET p_mensaje = 'Consulta exitosa';
        SELECT p_mensaje AS mensaje, p_exito AS exito;
        ELSE
            SET p_exito = FALSE;
            SET p_mensaje = 'Opción no válida';
            
		  SELECT p_mensaje AS mensaje, p_exito AS exito;
    END CASE;

    COMMIT;
END$$

DELIMITER ;

 
CALL sp_usuarios(3, NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Vanitas_05',NULL,'Zuazeño');
 


-- validar correo duplicado
DROP PROCEDURE IF EXISTS sp_validarCorreoUnico;

DELIMITER $$
CREATE PROCEDURE sp_validarCorreoUnico(IN p_correo VARCHAR(255))
BEGIN
    
     DECLARE v_correo_existe INT;

    SELECT COUNT(*) INTO v_correo_existe
    FROM Usuarios
    WHERE correo = p_correo;

    SELECT v_correo_existe > 0 AS correo_existe;
END $$
DELIMITER ;

CALL sp_validarCorreoUnico("Bola@gmail.com)");
CALL sp_validarCorreoUnico("martha@gmail.com");