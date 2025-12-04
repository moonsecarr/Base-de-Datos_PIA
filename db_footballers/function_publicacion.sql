use footballers;

DELIMITER $$

CREATE FUNCTION contarPendientes()
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE totalPendientes INT;

    SELECT COUNT(*)
    INTO totalPendientes
    FROM solicitudPublicacion
    WHERE estadoPublicacion = 'pendiente';

    RETURN totalPendientes;
END$$

DELIMITER ;

SELECT contarPendientes();


DROP FUNCTION IF EXISTS esAprobado;
DELIMITER $$

CREATE FUNCTION esAprobado(p_id INT)
RETURNS BOOLEAN
DETERMINISTIC
BEGIN
    DECLARE resultado BOOLEAN;

    SELECT (estadoPublicacion = 'Activa')
    INTO resultado
    FROM publicacion
    WHERE idPublicacion = p_id;

    RETURN resultado;
END$$

DELIMITER ;
select*from publicacion;
select  esAprobado(1)
