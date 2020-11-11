CREATE DATABASE grupo11;
USE grupo11;

CREATE TABLE usuario (
  Id int(11) NOT NULL,
  dni int(8) NOT NULL,
  email varchar(90) NOT NULL,
  contraseña varchar(20) NOT NULL,
  nombre varchar(180) NOT NULL,
  apellido varchar(180) NOT NULL,
  fecha_nacimiento date NOT NULL,
  tipo varchar(20) NOT NULL
);

ALTER TABLE usuario
  ADD PRIMARY KEY (Id);
COMMIT;
