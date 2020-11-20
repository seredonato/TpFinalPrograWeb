
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

CREATE TABLE chofer(
tipo_licencia varchar(100) not null,
licencia varchar(100) not null,
numero_usuario int not null,
primary key (numero_usuario),
foreign key (numero_usuario) references usuario(id));

CREATE TABLE administrador (
numero_usuario int not null,
primary key (numero_usuario),
foreign key (numero_usuario) references usuario(id));

CREATE TABLE mecanico (
numero_usuario int not null,
primary key (numero_usuario),
foreign key (numero_usuario) references usuario(id));

CREATE TABLE supervisor (
numero_usuario int not null,
primary key (numero_usuario),
foreign key (numero_usuario) references usuario(id));

CREATE TABLE equipo(
año_fabricacion date not null,
estado boolean not null,
patente varchar(40) not null,
nro_chasis int not null,
id int AUTO_INCREMENT NOT NULL,
primary key (id));

CREATE TABLE TRACTOR(
marca varchar(100) not null,
modelo varchar(100) not null,
calendario_service date,
nro_motor int not null,
kilometraje int not null,
id int not null,
primary key (id),
foreign key (id) references equipo(id));

CREATE TABLE ACOPLADO (
tipo_acoplado varchar(100),
id int not null,
primary key (id),
foreign key (id) references equipo(id));

select * from usuario;
