/*Criação do Banco com caracteres latinos*/
create database estoque 
default character set utf8
default collate utf8_general_ci;

/*Para usar o banco criado*/
USE estoque;

/*Criação da tabela fornecedor*/
create table fornecedor(
id_fornecedor int NOT NULL AUTO_INCREMENT,
nome varchar(30) NOT NULL,
endereco varchar(30) NOT NULL,
cnpj int(10) NOT NULL,
cidade varchar(30),
estado varchar(30),
cep int(9),
PRIMARY KEY (id_fornecedor)
) default charset = utf8;

/*Criação da tabela produtos_variados que referencia a tabela anterior*/
create table produto(
id_produto int NOT NULL AUTO_INCREMENT,
id_fornecedor int NOT NULL,
nomeProd varchar(30) NOT NULL,
peso decimal(5, 2),
precoUnitario decimal(5, 2),
precoTotal decimal(5, 2),
PRIMARY KEY (id_produto),
foreign key(id_fornecedor) references fornecedor(id_fornecedor)
) default charset = utf8;

/*Caso queira verificar se os dados foram inseridos*/
select * from fornecedor;
