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
  rol varchar(100),
  tipo_licencia varchar (100),
  PRIMARY KEY (id)
);

CREATE TABLE pedido (
nombre varchar(100) not null,
cuit int not null,
email varchar(100) not null,
telefono int not null,
direccion_cliente varchar(100) not null,
direccion_1 varchar(100) not null,
direccion_2 varchar(100) not null,
id int AUTO_INCREMENT NOT NULL,
primary key (id)
);


CREATE TABLE tractor(
marca varchar(100) not null,
modelo varchar(100) not null,
calendario_service date,
nro_motor int not null,
kilometraje int not null,
id int AUTO_INCREMENT NOT NULL,
primary key (id));

CREATE TABLE acoplado (
tipo_acoplado varchar(100),
id int AUTO_INCREMENT NOT NULL,
primary key (id));


CREATE TABLE equipo(
año_fabricacion date,
estado boolean not null,
patente varchar(40) not null,
nro_chasis int not null,
id int AUTO_INCREMENT NOT NULL,
id_tractor int,
id_acoplado int,
primary key (id),
foreign key (id_Tractor) references tractor(id),
foreign key (id_acoplado) references acoplado(id));

INSERT INTO equipo (año_fabricacion,estado,patente,nro_chasis)
VALUES ('20120101',true,'AAABBB',123);


 select * from acoplado;
 select * from tractor;
 select * from usuario;
 select * from equipo;


INSERT INTO usuario (dni, email, usuario, contrasenia, nombre, apellido, fecha_nacimiento, rol)
VALUES	(123, "franco@email.com", "franco", "202cb962ac59075b964b07152d234b70", "franco", "reynoso", 111111, "admin"),
		(123, "sere@email.com", "sere", "202cb962ac59075b964b07152d234b70", "sere", "donato", 111111, "admin"),
		(123, "fiore@email.com", "fiore", "202cb962ac59075b964b07152d234b70", "fiore", "coloca", 111111, "admin");
