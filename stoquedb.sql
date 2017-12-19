CREATE database stoquedb;
use stoquedb;


CREATE TABLE produto(
  id int PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  preco DOUBLE NOT NULL,
  qtd_estoque int NOT NULL
);

CREATE TABLE caracteristica(
	id int PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(50) NOT NULL
);

CREATE TABLE produto_caracteristica(
  id int PRIMARY KEY AUTO_INCREMENT,
  id_produto int NOT NULL,
  id_caracteristica int NOT NULL,
  valor varchar(50) NOT NULL,
  FOREIGN KEY(id_produto) REFERENCES produto(id),
  FOREIGN KEY(id_caracteristica) REFERENCES caracteristica(id)
);

CREATE TABLE funcionario(
  id int PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(80) NOT NULL,
  cargo VARCHAR(30) NOT NULL,
  login VARCHAR(50) NOT NULL,
  senha VARCHAR(150) NOT NULL
);

CREATE TABLE pedido(
  id int PRIMARY KEY AUTO_INCREMENT,
  data_compra DATE NOT NULL,
  id_funcionario int,
  FOREIGN KEY(id_funcionario) REFERENCES funcionario(id)
);

CREATE TABLE pedido_produto(
  id int PRIMARY KEY AUTO_INCREMENT,
  id_pedido int,
  id_produto int,
  quantidade int NOT NULL,

  FOREIGN KEY(id_pedido) REFERENCES pedido(id),
  FOREIGN KEY(id_produto) REFERENCES produto(id)
);
