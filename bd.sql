#drop database tcc;
create database tcc;
use tcc;
CREATE TABLE tcc.usuario (
  usuario_id INT NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(200) NOT NULL,
  senha VARCHAR(32) NOT NULL,
  PRIMARY KEY (usuario_id));
  
INSERT INTO usuario(usuario,senha) VALUES ('rodrigo', md5('1234'));
#drop table tbEstacionar;
create table tbEstacionar(
	id int primary key auto_increment,
    placa varchar(7),
    marca varchar(20),
    modelo varchar(20),
    dono varchar(60),
	data date,
    hora time,
    situacao varchar(20)
);
#drop table tbEstacionarS;
create table tbEstacionarS(
	id int primary key auto_increment,
    placa varchar(7),
    marca varchar(20),
    modelo varchar(20),
    dono varchar(60),
	data date,
    hora time,
    situacao varchar(20)
);
#drop table tbFinalizar;
create table tbFinalizar(
	id int primary key auto_increment,
	placa varchar(7),
    marca varchar(20),
    modelo varchar(20),
    dono varchar(60),
	horaent time,
    horasai time,
    tempo varchar(10),
    valor varchar(10),
    pgmt varchar(20),
    relatos varchar(100),
    idEstacionar int,
    foreign key(idEstacionar) references tbEstacionar(id) 
);

select * from tbEstacionar;
select * from tbEstacionarS;
select * from tbFinalizar;