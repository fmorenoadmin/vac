DROP TABLE IF EXISTS tipos_usuarios;
--Esto elimina la tabla: tipos_usuarios, solo SI EXISTE, caso contrario no hará nada.
CREATE TABLE tipos_usuarios(
--Crea la tabla tipos_usuarios, con los siguientes campos:
    id_tipo INT PRIMARY KEY AUTO_INCREMENT,
--Este campo: id_tipo, es la Llave Primaria de la Tabla, la cual se AUTOCOMPLETA CORRELATIVAMENTE
    nombre_t VARCHAR(250) NULL DEFAULT NULL,
--Este campo: nombre_t, será el nombre del tipo de usuario, el cual tiene un tipo de dato: Cadena de Texto de (250) carácteres
    descrip_t TEXT NULL DEFAULT NULL,
--Este campo: descrip_t, será la descipción del tipo de usuario, el cual tiene un tipo de dato: Texto

--Estos 8 campos que siguen: Sirven para poder manejar una auditoría de los registros de las Tablas
    created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    id_created INT NULL DEFAULT 1,
--Estos 2 guardan el ID del empleado y FECHA, de la creación del registro.
    updated_at DATETIME NULL DEFAULT NULL,
    id_updated INT NULL DEFAULT 0,
--Estos 2 guardan el ID del empleado y FECHA, de la última edición del registro.
    drop_at DATETIME NULL DEFAULT NULL,
    motivo_drop TEXT NULL DEFAULT NULL,
    id_drop INT NULL DEFAULT 0,
--Estos 3 guardan el ID del empleado, el MOTIVO y FECHA, de la eliminación del registro.
    status INT NULL DEFAULT 1
--Este campo sirve para el ESTADO del registro:
--0 => Registro INACTIVO
--1 => Registro ACTIVO
--2 => Registro ELIMINADO
);
INSERT INTO tipos_usuarios (nombre_t) VALUES
    ('Super Administrador'),
    ('Administrador'),
    ('Vendedor'),
    ('Comprador'),
    ('Almacen'),
    ('Finanzas')
;