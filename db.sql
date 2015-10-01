create database bwep;
use bwep;
grant ALL on bwep.* to 'iagogo'@'localhost' identified by 'abc123.';

create table sqli0(
	nome varchar(40) not null,
	pass varchar (36) not null,
	PRIMARY KEY(nome)
);

insert into sqli0(nome, pass) values('admin', md5('abc123.'));
insert into sqli0(nome, pass) values('iago', md5('abc123.'));
insert into sqli0(nome, pass) values('tin', md5('abc123.'));
