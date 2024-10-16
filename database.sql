/*----------------------------VAC---------------------------*/
	CREATE DATABASE IF NOT EXISTS vac;
	USE vac;
/*----------------------------------------------------------*/
/*
	status:
	0			INACTIVO
	1			ACTIVO
	2			ELIMINADO
	
	ALTER TABLE productos
	ADD COLUMN created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
	ADD COLUMN id_created INT NULL DEFAULT 1,
	ADD COLUMN updated_at DATETIME NULL DEFAULT NULL,
	ADD COLUMN id_updated INT NULL DEFAULT 0,
	ADD COLUMN drop_at DATETIME NULL DEFAULT NULL,
	ADD COLUMN motivo_drop TEXT NULL DEFAULT NULL,
	ADD COLUMN id_drop INT NULL DEFAULT 0,
	ADD COLUMN status INT NULL DEFAULT 1;
*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*-----------------------tabla-tipos_usuarios---------------*/
	DROP TABLE IF EXISTS tipos_usuarios;
	CREATE TABLE tipos_usuarios(
		id_tipo INT PRIMARY KEY AUTO_INCREMENT,
		nombre_t VARCHAR(250) NULL DEFAULT NULL,
		descrip_t TEXT NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
		id_created INT NULL DEFAULT 1,
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT 0,
		drop_at DATETIME NULL DEFAULT NULL,
		motivo_drop TEXT NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT 0,
		status INT NULL DEFAULT 1
	);
	INSERT INTO tipos_usuarios (nombre_t) VALUES
		('Super Administrador'),
		('Administrador'),
		('Vendedor'),
		('Comprador'),
		('Almacen'),
		('Finanzas')
	;
/*-----------------------tabla-usuarios---------------------*/
	DROP TABLE IF EXISTS usuarios;
	CREATE TABLE usuarios(
		id_user INT PRIMARY KEY AUTO_INCREMENT,
		id_tipo INT NOT NULL,
		nombres_u VARCHAR(300) NULL DEFAULT NULL,
		apellidos_u VARCHAR(300) NULL DEFAULT NULL,
		correo_u VARCHAR(200) NULL DEFAULT NULL,
		usuario_u VARCHAR(200) NULL DEFAULT NULL,
		contrasenia_u VARCHAR(350) NULL DEFAULT NULL,
		telefono_u VARCHAR(25) NULL DEFAULT NULL,
		foto_u VARCHAR(900) NULL DEFAULT NULL,
		descrip_u TEXT NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
		id_created INT NULL DEFAULT 1,
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT 0,
		drop_at DATETIME NULL DEFAULT NULL,
		motivo_drop TEXT NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT 0,
		status INT NULL DEFAULT 1,
		FOREIGN KEY (id_tipo) REFERENCES tipos_usuarios (id_tipo)
	);
	INSERT INTO usuarios (id_tipo, nombres_u, apellidos_u, correo_u, usuario_u, contrasenia_u, telefono_u) VALUES
		(1, 'Admin', 'Moreno', 'admin@frankmorenoalburqueque.com', 'admin', '$2y$10$NZys55dL8cIGjVQJ9Df9huXYpC/M8n04IwIFN2WRQMf9d5AJOXcwO', '+51924741703')
	;
/*-----------------------tabla-registro---------------------*/
	DROP TABLE IF EXISTS registro;
	CREATE TABLE registro(
		id_r INT PRIMARY KEY AUTO_INCREMENT,
		id_user INT NOT NULL,
		fecha_ing VARCHAR(50) NULL DEFAULT NULL,
		hora_ing VARCHAR(50) NULL DEFAULT NULL,
		nav_ing VARCHAR(700) NULL DEFAULT NULL,
		ip_ing VARCHAR(200) NULL DEFAULT NULL,
		geo_ip TEXT NULL DEFAULT NULL,
		descrip TEXT NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
		id_created INT NULL DEFAULT 1,
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT 0,
		drop_at DATETIME NULL DEFAULT NULL,
		motivo_drop TEXT NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT 0,
		status INT NULL DEFAULT 1
	);
/*-----------------------tabla-intentos---------------------*/
	DROP TABLE IF EXISTS intentos;
	CREATE TABLE intentos(
		id_i INT PRIMARY KEY AUTO_INCREMENT,
		usua VARCHAR(300) NULL DEFAULT NULL,
		pass VARCHAR(300) NULL DEFAULT NULL,
		fecha_int VARCHAR(50) NULL DEFAULT NULL,
		hora_int VARCHAR(50) NULL DEFAULT NULL,
		nav_int VARCHAR(300) NULL DEFAULT NULL,
		ip_int TEXT NULL DEFAULT NULL,
		geo_ip TEXT NULL DEFAULT NULL,
		descrip TEXT NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
		id_created INT NULL DEFAULT 1,
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT 0,
		drop_at DATETIME NULL DEFAULT NULL,
		motivo_drop TEXT NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT 0,
		status INT NULL DEFAULT 1
	);
/*-----------------------tabla-ip_block---------------------*/
	DROP TABLE IF EXISTS ip_block;
	CREATE TABLE ip_block(
		id_ipb INT PRIMARY KEY AUTO_INCREMENT,
		ip VARCHAR(300) NULL DEFAULT NULL,
		motivo TEXT NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
		id_created INT NULL DEFAULT 1,
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT 0,
		drop_at DATETIME NULL DEFAULT NULL,
		motivo_drop TEXT NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT 0,
		status INT NULL DEFAULT 1
	);
/*-----------------------tabla-cursos-----------------------*/
	DROP TABLE IF EXISTS cursos;
	CREATE TABLE cursos(
		id INT PRIMARY KEY AUTO_INCREMENT,
		nombre VARCHAR(250) NULL DEFAULT NULL,
		descrip TEXT NULL DEFAULT NULL,
		imagen VARCHAR(950) NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
		id_created INT NULL DEFAULT 1,
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT 0,
		drop_at DATETIME NULL DEFAULT NULL,
		motivo_drop TEXT NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT 0,
		status INT NULL DEFAULT 1
	);
	INSERT INTO cursos (nombre,imagen) VALUES 
		('Comuncaion','20200628182542Comunicació-estratègica5.jpg'),
		('Ingles','20200628182500estudiar-ingles-pais-habla-inglesa-mejor-manera-aprender-idioma.jpg'),
		('Religion','202006281809395.jpg'),
		('Arte','202006281804041.jpg'),
		('Ciencia y Ambiente','20200628182759maxresdefault.jpg')
	;
	SELECT * FROM cursos WHERE status=1;
/*-----------------------tabla-contacto---------------------*/
	DROP TABLE IF EXISTS contacto;
	CREATE TABLE contacto(
		id INT PRIMARY KEY AUTO_INCREMENT,
		nombre VARCHAR(250) NULL DEFAULT NULL,
		correo VARCHAR(350) NULL DEFAULT NULL,
		telefono VARCHAR(15) NULL DEFAULT NULL,
		mensaje TEXT NULL DEFAULT NULL,
		ip_cli VARCHAR(20) NULL DEFAULT NULL,
		nav_cli TEXT NULL DEFAULT NULL,
		sist_cli TEXT NULL DEFAULT NULL,
		utm_id TEXT NULL DEFAULT NULL,
		utm_campaign TEXT NULL DEFAULT NULL,
		utm_source TEXT NULL DEFAULT NULL,
		utm_medium TEXT NULL DEFAULT NULL,
		utm_content TEXT NULL DEFAULT NULL,
		utm_term TEXT NULL DEFAULT NULL,
		fbclid TEXT NULL DEFAULT NULL,
		gclid TEXT NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
		id_created INT NULL DEFAULT 1,
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT 0,
		drop_at DATETIME NULL DEFAULT NULL,
		motivo_drop TEXT NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT 0,
		status INT NULL DEFAULT 1
	);
	SELECT * FROM contacto WHERE status=1;
/*-----------------------tabla-cursos-----------------------*/
	DROP TABLE IF EXISTS seg_contacto;
	CREATE TABLE seg_contacto(
		id_seg INT PRIMARY KEY AUTO_INCREMENT,
		id INT NULL DEFAULT 1,
		id_usuario INT NULL DEFAULT 1,
		respuesta TEXT NULL DEFAULT NULL,
		created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
		id_created INT NULL DEFAULT 1,
		updated_at DATETIME NULL DEFAULT NULL,
		id_updated INT NULL DEFAULT 0,
		drop_at DATETIME NULL DEFAULT NULL,
		motivo_drop TEXT NULL DEFAULT NULL,
		id_drop INT NULL DEFAULT 0,
		status INT NULL DEFAULT 1
	);
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/
/*----------------------------------------------------------*/