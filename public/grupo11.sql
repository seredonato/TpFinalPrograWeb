CREATE DATABASE grupo11;
USE grupo11;

CREATE TABLE usuario (
  id int AUTO_INCREMENT NOT NULL,
  dni int NOT NULL,
  email varchar(90) NOT NULL,
  usuario varchar(90) NOT NULL,
  contrasenia varchar(100) NOT NULL,
  nombre varchar(180) NOT NULL,
  apellido varchar(180) NOT NULL,
  fecha_nacimiento date,
  tipo varchar(100),
  PRIMARY KEY (id)
);

select * from usuario;