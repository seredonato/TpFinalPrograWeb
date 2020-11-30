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

CREATE TABLE imoclass (
clase float,
descripcion varchar(600),
PRIMARY KEY (clase)
);

CREATE TABLE imosubclass (
clase float,
subclase float,
descripcion varchar (900),
PRIMARY KEY (subclase),
FOREIGN KEY (clase) REFERENCES imoclass(clase)
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

INSERT INTO imoclass (clase, descripcion)
VALUES 	(1,"Explosivos"),
		(2,"Gases inflamables"),
		(3,"Liquidos inflamables"),
		(4.1,"Sustancias y solidos inflamables"),
		(4.2,"Solidos inflamables"),
		(4.3,"Sustancias que, en contacto con el agua, emiten gases inflamables."),
		(5.1,"Sustancias oxidantes (agentes) que al producir oxígeno aumentan el riesgo y la intensidad del fuego"),
		(5.2,"Peróxidos orgánicos: la mayoría se queman rápidamente y son sensibles al impacto o la fricción."),
		(6.1,"Sustancias toxicas"),
		(6.2,"Sustancias infecciosas"),
		(7,"Sustancias radioactivas"),
		(8,"Corrosivos"),
        (9,"Sustancias y artículos peligrosos diversos")
;

INSERT INTO imosubclass (clase, subclase, descripcion)
VALUES 	(1, 1.1, "Consiste en explosivos que tienen un riesgo de explosión masiva. Una explosión masiva es aquella que afecta a casi toda la carga instantáneamente."),
		(1, 1.2, "Consiste en explosivos que tienen un riesgo de proyección pero no un riesgo de explosión masiva."),
		(1, 1.3, "Consiste en explosivos que tienen un riesgo de incendio y un riesgo de explosión menor o un riesgo de proyección menor o ambos, pero no un riesgo de explosión masiva."),
		(1, 1.4, "Consiste en explosivos que presentan un riesgo de explosión menor.Un incendio externo no debe causar una explosión prácticamente instantánea de casi todo el contenido del paquete."),
		(1, 1.5, "Consiste en explosivos muy insensibles. Esta división está compuesta por sustancias que tienen un riesgo de explosión masiva pero que son tan insensibles que hay muy pocas probabilidades de iniciarse o de pasar de la combustión a la detonación en condiciones normales de transporte."),
		(1, 1.6, "Consiste en artículos extremadamente insensibles que no presentan riesgo de explosión masiva. Artículos que contienen únicamente sustancias detonantes extremadamente insensibles y que demuestran una probabilidad insignificante de iniciación o propagación accidental."),
		(2, 2.1, "454 kg (1001 lbs) de cualquier material que sea un gas a 20 ° C (68 ° F) o menos y 101,3 kPa (14,7 psi) de presión (un material que tiene un punto de ebullición de 20 ° C (68 ° F) o menos a 101,3 kPa (14,7 psi))"),
		(2, 2.2, "Esta división incluye gas comprimido, gas liquido, gas criogénico presurizado, gas comprimido en solución, gas asfixiante y gas oxidante. Un gas comprimido no inflamable ni venenoso (División 2.2) significa cualquier material (o mezcla) que no cumple con la definición de la División 2.1 o 2.3."),
		(2, 2.3, "Gas venenoso por inhalación significa un material que es un gas a 20 ° C o menos y una presión de 101,3 kPa (un material que tiene un punto de ebullición de 20 ° C o menos a 101,3 kPa (14,7 psi))"),
		(3, 3.1, "Un líquido inflamable (Clase 3) significa un líquido que tiene un punto de inflamación de no más de 60.5 ° C (141 ° F), o cualquier material en una fase líquida con un punto de inflamación de 37.8 ° C (100 ° F) o superior que se calienta intencionalmente y se ofrece para el transporte o se transporta en o por encima de su punto de inflamación en un embalaje a granel"),
		(4.1, 4.1, "Explosivos insensibilizados que cuando se secan son explosivos de Clase 1 y están específicamente autorizados por su nombre o han sido asignados por el Administrador Asociado a un nombre de envío y una clase de peligro."),
		(4.2, 4.2, "El material espontáneamente combustible es un material pirofórico, que es un líquido o sólido que puede encenderse dentro de los cinco (5) minutos después de entrar en contacto con el aire o un material que se calienta espontáneamente que cuando entra en contacto con el aire y sin un suministro de energía es susceptible de autocalentamiento."),
		(4.3, 4.3, "Peligroso cuando el material está húmedo es un material que, cuando entra en contacto con el agua, puede volverse espontáneamente inflamable o desprender gases inflamables o tóxicos a una tasa superior a 1 L por kilogramo de material por hora."),
		(5.1, 5.1, "Oxidante (División 5.1) significa un material que puede, generalmente al producir oxígeno, causar o mejorar la combustión de otros materiales."),
		(5.2, 5.2, "Peróxido orgánico (División 5.2) significa cualquier compuesto orgánico que contiene oxígeno (O) en la estructura bivalente -O-O- y que puede considerarse un derivado del peróxido de hidrógeno, donde uno o más de los átomos de hidrógeno han sido reemplazados por radicales orgánicos."),
		(6.1, 6.1, "Se sabe que es tóxico para los seres humanos de modo que representa un peligro para la salud durante el transporte o se presume que es tóxico para los seres humanos porque entra en una categoría tóxica cuando se prueba en animales de laboratorio."),
		(6.2, 6.2, "Las sustancias infecciosas son sustancias que se sabe o se espera razonablemente que contengan patógenos. Los patógenos se definen como microorganismos (incluidas bacterias, virus, rickettsias, parásitos, hongos) y otros agentes, como priones, que pueden causar enfermedades en humanos o animales."),
		(7, 7.1, "Cualquier cantidad de paquetes que lleven la etiqueta RADIACTIVO AMARILLO III (LSA-III). Algunos materiales radiactivos en uso exclusivo con materiales radiactivos de baja actividad específica no llevarán la etiqueta, sin embargo, se requiere el cartel RADIOACTIVO."),
		(8, 8.1, "Materiales corrosivos (Clase 8) significa un líquido o sólido que causa la destrucción total de la piel humana en el sitio de contacto dentro de un período de tiempo especificado. Un líquido que tiene una tasa de corrosión severa en acero o aluminio también es un material corrosivo."),
		(9, 9.1, "Un material que presenta un peligro durante el transporte pero que no cumple con la definición de ninguna otra clase de peligro.")
        ;
        