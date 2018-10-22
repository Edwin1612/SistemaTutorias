
select *from carreras;
CREATE TABLE carreras(
idCarrera int(8) PRIMARY KEY AUTO_INCREMENT,
nombre varchar(50),
foto varchar(50)default "default.jpg"
);

INSERT INTO CARRERAS(nombre,foto) VALUES ('--',default);

CREATE TABLE usuarios(
idUsuario int(8) PRIMARY KEY AUTO_INCREMENT,
nombre varchar(50),
correo varchar(50),
contrasena varchar(50),
foto varchar(50)default "default.jpg",
tipoUsuario int(1),
idCarrera int(8) default 0 null,
FOREIGN KEY (idCarrera) REFERENCES carreras(idCarrera)
);

INSERT INTO USUARIOS (nombre,correo,contrasena,foto,tipoUsuario,idCarrera) VALUES 
('Administrador','Administrador@upv.edu.mx','Administrador123',default,0,default);
INSERT INTO USUARIOS (nombre,correo,contrasena,foto,tipoUsuario,idCarrera) VALUES 
('Dtutor','Dtutor@upv.edu.mx','Dtutor',default,1,1);
INSERT INTO USUARIOS (nombre,correo,contrasena,foto,tipoUsuario,idCarrera) VALUES
('Usuario','Usuario@upv.edu.mx','Usuario',default,2,1);

CREATE TABLE alumnos(
idAlumno int(8) PRIMARY KEY AUTO_INCREMENT,
nombre varchar(50),
foto varchar(50)default "default.jpg",
idCarrera int(8),
idUsuario int(8),
FOREIGN KEY (idCarrera) REFERENCES carreras(idCarrera),
FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);
select *from usuarios;
INSERT INTO ALUMNOS(nombre,foto,idCarrera,idUsuario) VALUES ('Edwin',default,1,8);

CREATE TABLE sesiones(
idSesion int(8) PRIMARY KEY AUTO_INCREMENT,
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
tipoSesion varchar(50),
idAlumno int(8),
idUsuario int(8),
FOREIGN KEY (idAlumno) REFERENCES alumnos(idAlumno),
FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario)
);

INSERT INTO SESIONES (fecha,tipoSesion,idAlumno,idUsuario) VALUES ();

INSERT INTO sesiones(fecha,tipoSesion,idAlumno,idUsuario) VALUES (default,'Problema',8,);


CREATE TABLE historialSesion(
idHistorialSesion int(8) PRIMARY KEY AUTO_INCREMENT,
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
notacion text,
idSesion int(8),
FOREIGN KEY (idSesion) REFERENCES sesiones(idSesion) ON DELETE CASCADE
);

CREATE VIEW vista_sesiones  AS
SELECT h.idSesion , idAlumno,idUsuario , notacion , tipoSesion ,h.fecha , s.fecha FROM historialSesion h, sesiones s
WHERE s.idSesion=h.idSesion ;

