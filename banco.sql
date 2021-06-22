create database cadastro1;
use cadastro1;

create table cliente(
    id int not null auto_increment,
    nome varchar(30),
    idade varchar(30),
    primary key(id)
);

insert into cliente(id,nome,idade) values(1, 'rodrigo', '22');
select * from cliente;
insert into cliente(id,nome,idade)values(2, 'ana', '13')
 
