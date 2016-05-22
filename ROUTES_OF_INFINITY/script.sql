DROP DATABASE IF EXISTS routes_of_infinity;

CREATE DATABASE IF NOT EXISTS routes_of_infinity;
USE routes_of_infinity;

CREATE TABLE usuario (
	id INT AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(32) UNIQUE NOT NULL,
	password VARCHAR(256) NOT NULL,
        fecha_registro DATE NOT NULL,
        vip TINYINT NOT NULL,
        bloqueado TINYINT NOT NULL,

	CONSTRAINT pk_id PRIMARY KEY(id)
)CHARACTER SET utf8;

CREATE TABLE ruta (
	id INT auto_increment NOT NULL,
        nombre VARCHAR(128) NOT NULL,
        ciudad VARCHAR(64) NOT NULL,
        descripcion VARCHAR(512) NOT NULL,
        tipo VARCHAR(16) NOT NULL,
        ubicaciones TEXT NOT NULL,
        id_usuario INT NOT NULL,
        fecha_creacion DATE NOT NULL,
        votos INT NOT NULL,
        tamano INT NOT NULL,

	CONSTRAINT pk_id PRIMARY KEY(id),
	CONSTRAINT fk_idU FOREIGN KEY(id_usuario) REFERENCES usuario(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
)CHARACTER SET utf8;

CREATE TABLE control_votos (
	id_usuario INT NOT NULL,
	id_ruta INT NOT NULL,
	CONSTRAINT pk_control PRIMARY KEY(id_usuario, id_ruta),
        CONSTRAINT fk_idUControl FOREIGN KEY(id_usuario) REFERENCES usuario(id),
        CONSTRAINT fk_idR FOREIGN KEY(id_ruta) REFERENCES ruta(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
)CHARACTER SET utf8;
