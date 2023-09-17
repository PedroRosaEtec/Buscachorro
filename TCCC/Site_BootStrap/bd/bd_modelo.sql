create database db_modelo;

use db_modelo;

create table tb_usuario (
cd_usuario int auto_increment primary key,
nm_usuario varchar(60) not null,
nm_email varchar(60) not null unique,
cd_senha varchar(40) not null,
st_usuario char(1) default "1",
dt_registro_usuario datetime default current_timestamp
);

insert into tb_usuario set
nm_usuario = "Pedro",
nm_email = "pedro@mail.com",
cd_senha = md5("123");

select * from tb_usuario;