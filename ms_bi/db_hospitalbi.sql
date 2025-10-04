-- DROP TABLE IF EXISTS internacion;
-- DROP TABLE IF EXISTS sala;
-- DROP TABLE IF EXISTS medicamento;
-- DROP TABLE IF EXISTS receta;
-- DROP TABLE IF EXISTS consulta;

create table consulta(
	id serial primary key,
	fecha varchar(12),
	hora varchar(12),
	diagnostico text,
	doctor varchar (20),
	paciente varchar (20)
);

create table receta(
	id serial primary key,
	recomendacion text,
	idconsulta smallint,
	constraint fk_receta_consulta
   	foreign key (idconsulta)
   	references consulta(id)
);

create table medicamento(
	id serial primary key,
	nombre varchar(20),
	cantidad int,
	indicacion text,
	idreceta smallint,
	constraint fk_medicamento_receta
   	foreign key (idreceta)
   	references receta(id)
);

create table sala(
	id serial primary key,
	estado varchar(20)
);

create table internacion(
	id serial primary key,
	fechaini varchar(12),
	fechafin varchar(12),
	cantdias int,
	doctor varchar(30),
	idsala smallint,
	idconsulta smallint,
	constraint fk_sala_internacion
   	foreign key (idsala)
   	references sala(id),
	constraint fk_consulta_internacion
   	foreign key (idconsulta)
   	references consulta(id)
);

INSERT INTO sala( estado) VALUES ('disponible');
INSERT INTO sala( estado) VALUES ('ocupada');
INSERT INTO sala( estado) VALUES ('mantenimiento');
INSERT INTO sala( estado) VALUES ('disponible');
INSERT INTO sala( estado) VALUES ('ocupada');
INSERT INTO sala( estado) VALUES ('mantenimiento');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-07-2023', '07:00','El paciente presenta dolor estomacal','Pierce Black','Juan Peres');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-08-2023', '08:00','El paciente presenta dolor espalda','Erick Dane','Juan Ortiz');
INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-08-2023', '09:00','El paciente presenta dolor espalda','Erick Dane','Juan Ortiz');
INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-08-2023', '10:00','El paciente presenta dolor espalda','Erick Dane','Juan Ortiz');
INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-08-2023', '11:00','El paciente presenta dolor espalda','Erick Dane','Juan Ortiz');
INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-08-2023', '12:00','El paciente presenta dolor espalda','Erick Dane','Juan Ortiz');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-07-2023', '09:00','El paciente presenta dolor en la cabeza','Ana Contreras','Mateo Gutierrez');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-07-2023', '10:00','El paciente presenta herida por mordida de perro','Yang Chinese','jorge Robles');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-07-2023', '07:00','El paciente presenta dolor estomacal','Pierce Black','Juan Peres');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-07-2023', '08:00','El paciente presenta dolor espalda','Yang Chinese','Juan Ortiz');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-05-2023', '09:00','El paciente presenta dolor en la cabeza','Ana Contreras','Mateo Gutierrez');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-07-2023', '10:00','El paciente presenta herida por mordida de perro','Yang Chinese','jorge Robles');
INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-05-2023', '07:00','El paciente presenta dolor estomacal','Pierce Black','Juan Peres');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-05-2023', '08:00','El paciente presenta dolor espalda','Yang Chinese','Juan Ortiz');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-05-2023', '09:00','El paciente presenta dolor en la cabeza','Ana Contreras','Mateo Gutierrez');

INSERT INTO consulta(fecha, hora, diagnostico, doctor, paciente)
VALUES ( '01-05-2023', '10:00','El paciente presenta herida por mordida de perro','Yang Chinese','jorge Robles');


INSERT INTO internacion(fechaini, fechafin, cantdias, doctor, idsala, idconsulta)
	VALUES ('10-07-2023','15-07-2023',default,'Pierce Black',1,2);
	
INSERT INTO internacion(fechaini, fechafin, cantdias, doctor, idsala, idconsulta)
	VALUES ('11-07-2023','12-07-2023',default,'Ana Contreras',2,5);

INSERT INTO internacion(fechaini, fechafin, cantdias, doctor, idsala, idconsulta)
	VALUES ('10-07-2023','15-07-2023',default,'Yang Chinese',1,4);
	
INSERT INTO internacion(fechaini, fechafin, cantdias, doctor, idsala, idconsulta)
	VALUES ('11-07-2023','12-07-2023',default,'Yang Chinese',2,5);

INSERT INTO receta(recomendacion, idconsulta)
	VALUES ( 'Evitar comer alimentos fritos, consumir fruta', 1);

INSERT INTO receta(recomendacion, idconsulta)
	VALUES ( 'Descanso total, evitar esfuerzo levantando con la espalda', 2);
	
INSERT INTO receta(recomendacion, idconsulta)
	VALUES ( 'Tomar liquidos y sueros naturales', 3);
INSERT INTO	receta(recomendacion, idconsulta)
	VALUES ( 'Evitar comer alimentos fritos, consumir fruta', 4);

INSERT INTO receta(recomendacion, idconsulta)
	VALUES ( 'Descanso total, evitar esfuerzo levantando con la espalda', 5);
	
INSERT INTO receta(recomendacion, idconsulta)
	VALUES ( 'Tomar liquidos y sueros naturales', 6);

INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',5,'Tomar al levantarse solo una capsula al dia',1);
	
INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',9,'Tomar despues de cada comida cada 8 horas',2);
	
INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',12,'Tomar cada 8 horas',3);

	INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',5,'Tomar al levantarse solo una capsula al dia',1);
	
INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',9,'Tomar despues de cada comida cada 8 horas',2);

	INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',9,'Tomar despues de cada comida cada 8 horas',2);
	
INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',12,'Tomar cada 8 horas',3);

	INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',5,'Tomar al levantarse solo una capsula al dia',1);
	
INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('azitromicina',9,'Tomar despues de cada comida cada 8 horas',2);
	
INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('paracetamol',12,'Tomar cada 8 horas',3);

	INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('paracetamol',12,'Tomar cada 8 horas',3);

	INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('paracetamol',12,'Tomar cada 8 horas',3);

	INSERT INTO medicamento(nombre, cantidad, indicacion, idreceta)
	VALUES ('paracetamol',12,'Tomar cada 8 horas',3);


