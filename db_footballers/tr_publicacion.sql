use footballers;
select* from publicacion;

DROP TRIGGER tr_publicacion_update;
DELIMITER $$
CREATE TRIGGER tr_publicacion_update
BEFORE UPDATE ON publicacion
FOR EACH ROW
BEGIN
    -- Solo actualiza la fecha si el estado cambió y es "Aprobado"
    IF OLD.estadoPublicacion <> NEW.estadoPublicacion 
       AND NEW.estadoPublicacion = 'Activa' THEN
        SET NEW.fechaAprobacion = NOW();
    END IF;
END$$

DELIMITER ;




