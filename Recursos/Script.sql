Create table Estudiante(
id SERIAL,
codigo integer,
nombre varchar(30),
apellido varchar(50),
cedula varchar(20),
edad integer,
semestre integer,
CONSTRAINT estudiante_pkey PRIMARY KEY (id)
);