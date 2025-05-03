create database empresa;
use empresa;


create table pessoa(
cpf char(14) primary key not null,
nome varchar(45),
idade char (3) not null
);

create table agenda(
codigo int primary key auto_increment,
cpf char(14) not null,
foreign key (cpf) references pessoa(cpf),
data date not null,
descricao varchar(100) not null

);