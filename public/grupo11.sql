DROP DATABASE grupo11;
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
  imagen varchar(180),
  PRIMARY KEY (id)
);


CREATE TABLE imoclass (
clase dec(5,1),
descripcion varchar(600),
PRIMARY KEY (clase)
);

CREATE TABLE imosubclass (
clase dec(5,1),
subclase dec(5,1),
descripcion varchar (900),
PRIMARY KEY (subclase),
FOREIGN KEY (clase) REFERENCES imoclass(clase)
);

CREATE TABLE carga (
id int AUTO_INCREMENT NOT NULL,
primary key (id),
tipo varchar(600) NOT NULL,
peso_neto decimal NOT NULL,
hazard varchar(200) NOT NULL,
clase_imoclass dec(5,1),
subclase_imosubclass dec(5,1),
foreign key (clase_imoclass) references imoclass(clase),
foreign key (subclase_imosubclass) references imosubclass(subclase),
reefer varchar(200) NOT NULL,
temperatura int
);

CREATE TABLE tractor(
marca varchar(100) not null,
modelo varchar(100) not null,
patente varchar(100)null,
nro_motor int not null,
chasis varchar(100) not null,
kilometraje int,
eliminado varchar(40),
estado varchar(40),
id int AUTO_INCREMENT NOT NULL,
primary key (id));

CREATE TABLE acoplado (
tipo_acoplado varchar(100),
patente varchar(100),
chasis int not null,
eliminado varchar(40),
estado varchar(40),
id int AUTO_INCREMENT NOT NULL,
primary key (id));

CREATE TABLE equipo(
eliminado varchar(40),
id_tractor int,
id_acoplado int,
estado varchar(40),
id int AUTO_INCREMENT NOT NULL,
primary key (id),
foreign key (id_Tractor) references tractor(id),
foreign key (id_acoplado) references acoplado(id));

CREATE TABLE calendarioServicio(
fecha date not null,
id_tractor int not null,
estado varchar(400),
id int auto_increment not null,
eliminado varchar(2),
primary key(id),
foreign key (id_tractor) references tractor(id));

CREATE TABLE pedido_cliente (
id int AUTO_INCREMENT NOT NULL,
primary key (id),
fecha_pedido date NOT NULL,
nombre_cliente varchar (600) NOT NULL,
cuit_cliente long NOT NULL,
direccion_cliente varchar(600) NOT NULL,
telefono_cliente int NOT NULL,
email_cliente varchar(600) NOT NULL,
contacto1 varchar(600) NOT NULL,
contacto2 varchar(600) NOT NULL
);

CREATE TABLE viaje (
id int AUTO_INCREMENT NOT NULL,
primary key (id),
origen varchar (600) NOT NULL,
destino varchar (600) NOT NULL,
fecha_carga date NOT NULL,
tiempo_carga time NOT NULL,
fecha_llegada date NOT NULL,
tiempo_llegada time NOT NULL
);

CREATE TABLE costeo_estimado (
id int AUTO_INCREMENT NOT NULL,
primary key (id),
kilometros int NOT NULL,
combustible int NOT NULL,
tiempo_salida time NOT NULL,
tiempo_llegada time NOT NULL,
viaticos int NOT NULL,
peajes_pesajes int,
extras int,
hazard varchar(200),
clase_imoclass dec(5,1),
foreign key (clase_imoclass) references imoclass(clase),
reefer varchar(200),
fee int,
total long
);

CREATE TABLE costeo_final (
id int AUTO_INCREMENT NOT NULL,
primary key (id),
id_viaje int,
foreign key (id_viaje) references viaje(id),
kilometros int,
combustible int,
tiempo_salida time,
tiempo_llegada time,
viaticos int,
peajes_pesajes int,
extras int,
hazard varchar(200),
reefer varchar(200),
fee int,
latitud dec(9,6),
longitud dec(9,6),
total long
);




CREATE TABLE proforma(
id int AUTO_INCREMENT NOT NULL,
primary key (id),
fecha date,
id_pedido_cliente int,
id_viaje int,
id_carga int,
id_costeo_estimado int,
id_costeo_final int,
id_usuario int,
foreign key (id_pedido_cliente) references pedido_cliente(id),
foreign key (id_viaje) references viaje(id),
foreign key (id_carga) references carga(id),
foreign key (id_costeo_estimado) references costeo_estimado(id),
foreign key (id_costeo_final) references costeo_final(id),
foreign key (id_usuario) references usuario(id)
);

ALTER TABLE pedido_cliente add id_proforma int AFTER contacto2;

INSERT INTO pedido_cliente (fecha_pedido, nombre_cliente, cuit_cliente ,email_cliente ,telefono_cliente ,direccion_cliente ,contacto1 ,contacto2)
                VALUES 	( curdate(), "Franco Reynoso", 20123456781, "franco@email.com", 1123569658, "Larrea 2458", "Larrea 5000", "San Martin 2693"),
						( curdate(), "Serena Donato", 20365894161, "sere@email.com", 1123569658, "Pedro Algo 2878", "Nose 2600", "San Juan 2113"),
						( curdate(), "Fiorella Coloca", 20254781021, "fiore@email.com", 1123569658, "Jujuy 158", "Algo 200", "San Telmo 93"),
						( curdate(), "Abril Lopez Ducas", 20350706827, "abril@email.com", 1123569658, "La Paz 2264", "Claro 89", "San Carlos 700"),
                        ( curdate(), "Juan Perez", 20123456781, "juan@email.com", 1123569658, "Jejox 58", "Pepe 69", "Martinez 23");

INSERT INTO usuario (dni, email, usuario, contrasenia, nombre, apellido, fecha_nacimiento, rol)
VALUES	(123, "franco@email.com", "franco", "202cb962ac59075b964b07152d234b70", "franco", "reynoso", 111111, "admin"),
		(123, "sere@email.com", "sere", "202cb962ac59075b964b07152d234b70", "sere", "donato", 111111, "supervisor"),
		(123, "fiore@email.com", "fiore", "202cb962ac59075b964b07152d234b70", "fiore", "coloca", 111111, "mecanico"),
        (123, "abril@email.com", "abril", "202cb962ac59075b964b07152d234b70", "abril", "lopez ducas", 111111, "mecanico");


INSERT INTO usuario (dni, email, imagen, usuario, contrasenia, nombre, apellido, tipo_licencia, fecha_nacimiento, rol)
VALUES(40756984, "chofer1@email.com", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlzH-0K-SCN_XyXbFJV4LGfRhRmnbt3wU2CQ&usqp=CAU", "chofer1",  "202cb962ac59075b964b07152d234b70", "nombre chofer 1", "apellido", "A", 111111, "chofer"),
(40756984, "chofer2@email.com", "https://media.marcainformativa.com/adjuntos/269/imagenes/000/011/0000011059.jpg", "chofer2", "202cb962ac59075b964b07152d234b70", "nombre chofer 2", "apellido2", "A", 111111, "chofer"),
(40325648, "chofer3@email.com", "https://i.blogs.es/9b649a/camioneros-por-vocacion-006/450_1000.jpg", "chofer3",  "202cb962ac59075b964b07152d234b70", "nombre chofer 3", "apellido3", "A", 111111, "chofer"),
(50125698, "chofer4@email.com", "https://trabajamos.net/images/uploads/2012-08-08-17-40-05_867.jpg", "chofer4",  "202cb962ac59075b964b07152d234b70", "nombre chofer 4", "apellido4", "A", 111111, "chofer");

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
VALUES 	(1, 1.1, "Explosivos que tienen un riesgo de explosión masiva. Explosion que afecta a casi toda la carga instantáneamente."),
		(1, 1.2, "Explosivos que tienen un riesgo de proyección pero no un riesgo de explosión masiva."),
		(1, 1.3, "Explosivos que tienen un riesgo de incendio y un riesgo de explosión menor o un riesgo de proyección menor o ambos, pero no un riesgo de explosión masiva."),
		(1, 1.4, "Explosivos que presentan un riesgo de explosión menor.Un incendio externo no debe causar una explosión instantánea."),
		(1, 1.5, "Explosivos muy insensibles. División compuesta por sustancias que tienen un riesgo de explosión masiva pero que son muy insensibles."),
		(1, 1.6, "Artículos extremadamente insensibles que no presentan riesgo de explosión masiva. Probabilidad insignificante de iniciación o propagación accidental."),
		(2, 2.1, "454 kg (1001 lbs) de cualquier material que sea un gas a 20 ° C (68 ° F) o menos y 101,3 kPa (14,7 psi) de presión."),
		(2, 2.2, "Gas comprimido, gas liquido, gas criogénico presurizado, gas comprimido en solución, gas asfixiante y gas oxidante. Un gas comprimido no inflamable ni venenoso."),
		(2, 2.3, "Gas venenoso, un gas a 20 ° C o menos y una presión de 101,3 kPa."),
		(3, 3.1, "Un líquido inflamable que tiene un punto de inflamación de no más de 60.5 ° C (141 ° F)."),
		(4.1, 4.1, "Explosivos insensibilizados que cuando se secan son explosivos de Clase 1."),
		(4.2, 4.2, "Material espontáneamente combustible, un líquido o sólido que puede encenderse dentro de los cinco (5) minutos después de entrar en contacto con el aire."),
		(4.3, 4.3, "Material que, cuando entra en contacto con el agua, puede volverse espontáneamente inflamable o desprender gases inflamables o tóxicos."),
		(5.1, 5.1, "Oxidante que, generalmente al producir oxígeno, causa o mejora la combustión de otros materiales."),
		(5.2, 5.2, "Peróxido orgánico, cualquier compuesto orgánico que contiene oxígeno en la estructura bivalente."),
		(6.1, 6.1, "Sustancia tóxico para los seres humanos de modo que representa un peligro para la salud durante el transporte."),
		(6.2, 6.2, "Sustancias infecciosas que se sabe o se espera que contengan patógenos."),
		(7, 7.1, "Cualquier paquete que lleve la etiqueta RADIACTIVO AMARILLO III."),
		(8, 8.1, "Materiales corrosivos, un líquido o sólido que causa la destrucción total de la piel humana en el sitio de contacto dentro de un período de tiempo especificado."),
		(9, 9.1, "Un material que presenta un peligro durante el transporte pero que no cumple con la definición de ninguna otra clase de peligro.")
        ;


INSERT INTO tractor (marca, modelo, patente, nro_motor, chasis, kilometraje, eliminado)
VALUES 	("IVECO","Cursor","AA123CD",53879558,"L53879558",0,"no"),
		("IVECO","Cursor","AA124DC",69904367,"R69904367",0,"no"),
		("IVECO","Cursor","AD200XS",57193968,"R57193968",0,"no"),
		("IVECO","Cursor","AA211ZX",82836641,"N82836641",0,"no"),
		("IVECO","Cursor","AC452WE",28204636,"R28204636",0,"no"),
		("IVECO","Cursor","AA233SS",26139668,"K26139668",0,"no"),
		("IVECO","Cursor","AB900QW",44301415,"F44301415",0,"no"),
		("IVECO","Cursor","AC342WW",44260023,"D44260023",0,"no"),
		("SCANIA","G310","AA150QW",82039512,"I82039512",0,"no"),
		("SCANIA","G410","AB198QZ",18389741,"V18389741",0,"no"),
		("SCANIA","G460","AC246QD",62500687,"O62500687",0,"no"),
		("SCANIA","G310","AD294QW",27510702,"T27510702",0,"no"),
		("SCANIA","G410","AA342QZ",72582865,"C72582865",0,"no"),
		("SCANIA","G460","AB390QD",32041290,"Z32041290",0,"no"),
		("SCANIA","G310","AC438QW",54712451,"W54712451",0,"no"),
		("SCANIA","G410","AD486QZ",56284263,"L56284263",0,"no"),
		("SCANIA","G460","AA534QD",21357689,"A21357689",0,"no"),
		("M.BENZ","Actros 1846","AB582QW",17800122,"V17800122",0,"no"),
		("M.BENZ","Actros 1846","AC630QZ",88648319,"G88648319",0,"no"),
		("M.BENZ","Actros 1846","AD678QD",23849041,"C23849041",0,"no"),
		("M.BENZ","Actros 1846","AA726QW",54650513,"C54650513",0,"no"),
		("M.BENZ","Actros 1846","AB774QZ",46753468,"J46753468",0,"no"),
		("M.BENZ","Actros 1846","AC822QD",60916748,"J60916748",0,"no"),
		("M.BENZ","Actros 1846","AD870QW",30207594,"M30207594",0,"no"),
		("M.BENZ","Actros 1846","AA918QZ",31256965,"C31256965",0,"no"),
		("M.BENZ","Actros 1846","AB966QD",32632699,"B32632699",0,"no"),
		("M.BENZ","Actros 1846","AC989QW",64092078,"F64092078",0,"no");

INSERT INTO acoplado (tipo_acoplado,patente,chasis,eliminado)
VALUES 	("Araña",	"AA100AS",	585822, "no"),
		("Araña",	"AC125AD",	605737, "no"),
		("Araña",	"AB135AG",	705687, "no"),
		("Araña",	"AD166AS",	815082, "no"),
		("Araña",	"AA189AD",	775167, "no"),
		("Araña",	"AC208AG",	642287, "no"),
		("Araña",	"AB230AS",	678666, "no"),
		("Araña",	"AD252AD",	758967, "no"),
		("Araña",	"AA274AG",	498515, "no"),
		("Jaula",	"AC296AS",	882174, "no"),
		("Jaula",	"AB318AD",	595287, "no"),
		("Jaula",	"AD340AG",	549916, "no"),
		("Jaula",	"AA362AS",	831768, "no"),
		("Jaula",	"AC383AD",	535330, "no"),
		("Tanque",	"AB405AG",	583419, "no"),
		("Tanque",	"AD427AS",	703673, "no"),
		("Tanque",	"AA449AD",	884654, "no"),
		("Tanque",	"AC471AG",	510019, "no"),
		("Tanque",	"AB493AS",	595948, "no"),
		("Tanque",	"AD515AD",	704640, "no"),
		("Tanque",	"AA537AG",	752105, "no"),
		("Tanque",	"AC559AS",	554550, "no"),
		("Granel",	"AB581AD",	761560, "no"),
		("Granel",	"AD602AG",	555608, "no"),
		("Granel",	"AA624AS",	852157, "no"),
		("Granel",	"AC646AD",	710797, "no"),
		("Granel",	"AB668AG",	815072, "no"),
		("Granel",	"AD690AS",	495851, "no"),
		("Granel",	"AA712AD",	468708, "no"),
		("Granel",	"AC734AG",	661897, "no"),
		("Granel",	"AB756AS",	616372, "no"),
		("Granel",	"AD778AD",	873758, "no"),
		("Granel",	"AA800AG",	820810, "no"),
		("Araña",	"AC821AS",	731202, "no"),
		("Araña",	"AB843AD",	670323, "no"),
		("Araña",	"AD865AG",	747642, "no"),
		("Araña",	"AA887AS",	777450, "no"),
		("Araña",	"AC909AD",	485098, "no"),
		("Araña",	"AB931AG",	806730, "no"),
		("Araña",	"AD953AS",	729910, "no"),
		("Araña",	"AA975AD",	726457, "no"),
		("Araña",	"AC997AG",	730861, "no"),
		("CarCarrier",	"AD100AZ",	730027, "no"),
		("CarCarrier",	"AD100AQ",	730502, "no"),
		("CarCarrier",	"AD100ER",	730978, "no"),
		("CarCarrier",	"AD101EF",	731453, "no"),
		("CarCarrier",	"AD102HG",	731929, "no"),
		("CarCarrier",	"AD103LO",	732404, "no"),
		("CarCarrier",	"AD104WE",	732880, "no"),
		("CarCarrier",	"AD105ZP",	733355, "no");

        
INSERT INTO tractor (marca, modelo, patente, nro_motor, chasis, kilometraje, eliminado,estado)
VALUES 	("IVECO","Cursor","AA123CD",53879558,"L53879558",0,"no","Sin asignar"),
		("IVECO","Cursor","AA124DC",69904367,"R69904367",0,"no","Sin asignar"),
		("IVECO","Cursor","AD200XS",57193968,"R57193968",0,"no","Sin asignar"),
		("IVECO","Cursor","AA211ZX",82836641,"N82836641",0,"no","Sin asignar"),
		("IVECO","Cursor","AC452WE",28204636,"R28204636",0,"no","Sin asignar"),
		("IVECO","Cursor","AA233SS",26139668,"K26139668",0,"no","Sin asignar"),
		("IVECO","Cursor","AB900QW",44301415,"F44301415",0,"no","Sin asignar"),
		("IVECO","Cursor","AC342WW",44260023,"D44260023",0,"no","Sin asignar"),
		("SCANIA","G310","AA150QW",82039512,"I82039512",0,"no","Sin asignar"),
		("SCANIA","G410","AB198QZ",18389741,"V18389741",0,"no","Sin asignar"),
		("SCANIA","G460","AC246QD",62500687,"O62500687",0,"no","Sin asignar"),
		("SCANIA","G310","AD294QW",27510702,"T27510702",0,"no","Sin asignar"),
		("SCANIA","G410","AA342QZ",72582865,"C72582865",0,"no","Sin asignar"),
		("SCANIA","G460","AB390QD",32041290,"Z32041290",0,"no","Sin asignar"),
		("SCANIA","G310","AC438QW",54712451,"W54712451",0,"no","Sin asignar"),
		("SCANIA","G410","AD486QZ",56284263,"L56284263",0,"no","Sin asignar"),
		("SCANIA","G460","AA534QD",21357689,"A21357689",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AB582QW",17800122,"V17800122",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AC630QZ",88648319,"G88648319",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AD678QD",23849041,"C23849041",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AA726QW",54650513,"C54650513",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AB774QZ",46753468,"J46753468",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AC822QD",60916748,"J60916748",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AD870QW",30207594,"M30207594",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AA918QZ",31256965,"C31256965",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AB966QD",32632699,"B32632699",0,"no","Sin asignar"),
		("M.BENZ","Actros 1846","AC989QW",64092078,"F64092078",0,"no","Sin asignar");

INSERT INTO acoplado (tipo_acoplado,patente,chasis,eliminado,estado)
VALUES 	("Araña",	"AA100AS",	585822, "no","Sin asignar"),
		("Araña",	"AC125AD",	605737, "no","Sin asignar"),
		("Araña",	"AB135AG",	705687, "no","Sin asignar"),
		("Araña",	"AD166AS",	815082, "no","Sin asignar"),
		("Araña",	"AA189AD",	775167, "no","Sin asignar"),
		("Araña",	"AC208AG",	642287, "no","Sin asignar"),
		("Araña",	"AB230AS",	678666, "no","Sin asignar"),
		("Araña",	"AD252AD",	758967, "no","Sin asignar"),
		("Araña",	"AA274AG",	498515, "no","Sin asignar"),
		("Jaula",	"AC296AS",	882174, "no","Sin asignar"),
		("Jaula",	"AB318AD",	595287, "no","Sin asignar"),
		("Jaula",	"AD340AG",	549916, "no","Sin asignar"),
		("Jaula",	"AA362AS",	831768, "no","Sin asignar"),
		("Jaula",	"AC383AD",	535330, "no","Sin asignar"),
		("Tanque",	"AB405AG",	583419, "no","Sin asignar"),
		("Tanque",	"AD427AS",	703673, "no","Sin asignar"),
		("Tanque",	"AA449AD",	884654, "no","Sin asignar"),
		("Tanque",	"AC471AG",	510019, "no","Sin asignar"),
		("Tanque",	"AB493AS",	595948, "no","Sin asignar"),
		("Tanque",	"AD515AD",	704640, "no","Sin asignar"),
		("Tanque",	"AA537AG",	752105, "no","Sin asignar"),
		("Tanque",	"AC559AS",	554550, "no","Sin asignar"),
		("Granel",	"AB581AD",	761560, "no","Sin asignar"),
		("Granel",	"AD602AG",	555608, "no","Sin asignar"),
		("Granel",	"AA624AS",	852157, "no","Sin asignar"),
		("Granel",	"AC646AD",	710797, "no","Sin asignar"),
		("Granel",	"AB668AG",	815072, "no","Sin asignar"),
		("Granel",	"AD690AS",	495851, "no","Sin asignar"),
		("Granel",	"AA712AD",	468708, "no","Sin asignar"),
		("Granel",	"AC734AG",	661897, "no","Sin asignar"),
		("Granel",	"AB756AS",	616372, "no","Sin asignar"),
		("Granel",	"AD778AD",	873758, "no","Sin asignar"),
		("Granel",	"AA800AG",	820810, "no","Sin asignar"),
		("Araña",	"AC821AS",	731202, "no","Sin asignar"),
		("Araña",	"AB843AD",	670323, "no","Sin asignar"),
		("Araña",	"AD865AG",	747642, "no","Sin asignar"),
		("Araña",	"AA887AS",	777450, "no","Sin asignar"),
		("Araña",	"AC909AD",	485098, "no","Sin asignar"),
		("Araña",	"AB931AG",	806730, "no","Sin asignar"),
		("Araña",	"AD953AS",	729910, "no","Sin asignar"),
		("Araña",	"AA975AD",	726457, "no","Sin asignar"),
		("Araña",	"AC997AG",	730861, "no","Sin asignar"),
		("CarCarrier",	"AD100AZ",	730027, "no","Sin asignar"),
		("CarCarrier",	"AD100AQ",	730502, "no","Sin asignar"),
		("CarCarrier",	"AD100ER",	730978, "no","Sin asignar"),
		("CarCarrier",	"AD101EF",	731453, "no","Sin asignar"),
		("CarCarrier",	"AD102HG",	731929, "no","Sin asignar"),
		("CarCarrier",	"AD103LO",	732404, "no","Sin asignar"),
		("CarCarrier",	"AD104WE",	732880, "no","Sin asignar"),
		("CarCarrier",	"AD105ZP",	733355, "no","Sin asignar");

