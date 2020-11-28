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

CREATE TABLE chofer (
  id int AUTO_INCREMENT NOT NULL,
  dni int NOT NULL,
  email varchar(90) NOT NULL,
  imagen varchar(180),
  usuario varchar(90) NOT NULL,
  nombre varchar(180) NOT NULL,
  apellido varchar(180) NOT NULL,
  tipo_licencia varchar (100),
  PRIMARY KEY (id)
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

INSERT INTO usuario (dni, email, usuario, contrasenia, nombre, apellido, fecha_nacimiento, rol)
VALUES	(123, "franco@email.com", "franco", "202cb962ac59075b964b07152d234b70", "franco", "reynoso", 111111, "admin"),
		(123, "sere@email.com", "sere", "202cb962ac59075b964b07152d234b70", "sere", "donato", 111111, "admin"),
		(123, "fiore@email.com", "fiore", "202cb962ac59075b964b07152d234b70", "fiore", "coloca", 111111, "admin");

INSERT INTO chofer (dni, email, imagen, usuario, nombre, apellido, tipo_licencia)
VALUES(40756984, "chofer1@email.com", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlzH-0K-SCN_XyXbFJV4LGfRhRmnbt3wU2CQ&usqp=CAU", "chofer1", "nombre chofer 1", "apellido", "A"),
(40756984, "chofer2@email.com", "https://media.marcainformativa.com/adjuntos/269/imagenes/000/011/0000011059.jpg", "chofer2", "nombre chofer 2", "apellido2", "A"),
(40325648, "chofer3@email.com", "https://i.blogs.es/9b649a/camioneros-por-vocacion-006/450_1000.jpg", "chofer3", "nombre chofer 3", "apellido3", "A"),
(50125698, "chofer4@email.com", "https://trabajamos.net/images/uploads/2012-08-08-17-40-05_867.jpg", "chofer4", "nombre chofer 4", "apellido4", "A");
