create database grupo;
use grupo;
create or replace table employees(
    id int auto_increment primary key,
    nombres varchar(50) not null,
    apellidos varchar(50) not null,
    dni numeric(8) not null unique,
    salario numeric(6,2),
    telefono int(9)
);