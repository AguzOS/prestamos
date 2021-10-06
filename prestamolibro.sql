create database prestamo;
use prestamo;

CREATE TABLE administrador (
  idadmi INTEGER NOT NULL AUTO_INCREMENT,
  nom_completo VARCHAR(60) NULL,
  usuario VARCHAR(30) NULL,
  contrasenia VARCHAR(50) NULL,
  foto VARCHAR(100) NULL,
  PRIMARY KEY(idadmi)
);

CREATE TABLE usuarios (
  idusuarios INTEGER NOT NULL AUTO_INCREMENT,
  id_admin_us INTEGER NOT NULL,
  nom_completo VARCHAR(60) NULL,
  direccin VARCHAR(100) NULL,
  foto_ine VARCHAR(100) NULL,
  PRIMARY KEY(idusuarios),
  foreign key(id_admin_us) REFERENCES administrador(idadmi)
);

CREATE TABLE libros (
  idlibros INTEGER NOT NULL AUTO_INCREMENT,
  id_admi_l INTEGER NOT NULL,
  nom_libro VARCHAR(50) NULL,
  editorial VARCHAR(60) NULL,
  autor VARCHAR(50) NULL,
  cantidad INTEGER UNSIGNED NULL,
  condicion VARCHAR(60) NULL,
  PRIMARY KEY(idlibros),
  INDEX idadmi(id_admi_l),
  FOREIGN KEY(id_admi_l)
    REFERENCES administrador(idadmi)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE materiales (
  idm INTEGER NOT NULL AUTO_INCREMENT,
  id_admi_mat INTEGER NOT NULL,
  nombre VARCHAR(50) NULL,
  cantidad INTEGER UNSIGNED NULL,
  condicion VARCHAR(100) NULL,
  PRIMARY KEY(idm),
  INDEX idadmi(id_admi_mat),
  FOREIGN KEY(id_admi_mat)
    REFERENCES administrador(idadmi)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE prestamolibro (
  idprestamolibro INTEGER NOT NULL AUTO_INCREMENT,
  idusuario int not null,
  idbook int not null,
  cantidad_prestamo int not null,
  tiempo date not null,
  activo int not null,
  primary key(idprestamolibro),
  foreign key(idusuario) references usuarios(idusuarios),
  foreign key(idbook) references libros(idlibros)  
);

/* disminuir el valor de los libros prestados */
delimiter //
create trigger prestar 
after 
insert on prestamolibro
FOR EACH ROW
begin

update libros set cantidad=cantidad-new.cantidad_prestamo
where libros.idlibros=new.idbook;
end //
delimiter ;

/* regresar el valor de los libros prestados */
delimiter //
create trigger devolver 
after 
update on prestamolibro
FOR EACH ROW
begin

update libros set cantidad=cantidad+old.cantidad_prestamo
where libros.idlibros=old.idbook;
end //
delimiter ;

create view dias as
select tiempo-curdate() as dias from prestamolibro;