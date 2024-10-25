CREATE DATABASE prueba;

USE prueba;

CREATE TABLE alumnos(

  idAlumno SMALLINT PRIMARY KEY AUTO_INCREMENT,
  dni CHAR(9),
  nombre VARCHAR(20),
  apellido VARCHAR(30),
  CONSTRAINT dni_unico UNIQUE (dni)
);

-- Prueba de índice
CREATE INDEX idx_nombre ON alumnos (nombre);
-- Prueba de insert
INSERT INTO alumnos (Dni,nombre,apellido) VALUES ('88888888A','Mauri','Gonzalez');

-- COMO ROOT 
  -- 1. Todos los privilegios 
    
    GRANT ALL PRIVILEGES ON prueba.* TO 'isa'@'%';
    
    -- otorga privilegios en la base de datos y en todas las tablas prueba.*

  -- 2. Quitar todos los privilegios 
    
    REVOKE ALL PRIVILEGES ON prueba.* FROM 'isa'@'%';


  --3. Privilegios de SELECT e INSERT 

    GRANT SELECT, INSERT ON prueba.* TO 'isa'@'%';
