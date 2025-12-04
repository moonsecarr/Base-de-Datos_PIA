use footballers;
select *from publicacion;
drop view solicitudPublicacion;
CREATE VIEW solicitudPublicacion AS
SELECT idPublicacion,titulo, multimedia,mime_type,descripcion,estadoPublicacion,activo
FROM Publicacion
WHERE activo = '1';

select * from solicitudPublicacion;