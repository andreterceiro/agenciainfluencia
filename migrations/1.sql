create table clientes (
    id int unsigned not null primary key auto_increment,
    nome varchar(255) not null,
    telefone varchar(17) not null,
    nis varchar(10) not null,
    email varchar(100) not null
);
