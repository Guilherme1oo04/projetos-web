create database biblioteca;
use biblioteca;
create table livros(
	id_livro int not null primary key,
    nome varchar(100) not null,
    autor varchar(50),
    genero1 varchar(50) not null,
    genero2 varchar(50),
    genero3 varchar(50),
    aluno_usando varchar(50)
);

create table cadastro(
	id_aluno int not null auto_increment primary key,
    nome varchar(50) not null,
    email varchar(200) not null,
    senha varchar(50) not null,
    livro_usando varchar(100)
);