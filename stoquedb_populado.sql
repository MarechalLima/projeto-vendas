-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2017 at 12:41 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stoquedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `caracteristica`
--
CREATE database stoquedb;
use stoquedb;
CREATE TABLE `caracteristica` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caracteristica`
--

INSERT INTO `caracteristica` (`id`, `titulo`) VALUES
(1, 'peso'),
(2, 'cor'),
(3, 'marca'),
(4, 'modelo'),
(5, 'voltagem'),
(6, 'potencia');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cargo`, `login`, `senha`) VALUES
(1, 'admin', 'administrador', 'admin', '$2y$10$IUb1GphNUT/tiGvhrOXFz.ZlRfcBM9gDn1f0hESju2j/PA.HFoy76'),
(2, 'joao da silva', 'vendedor', 'joao', '$2y$10$sR2BZXxL.f.Pea5S2dqOM.DYq5uvIc9ny9gSLNHVxvvD9qtrFU4K2'),
(3, 'maria da silva', 'vendedor', 'maria', '$2y$10$T7IEO93ClMV54fiTVe.uyewy547JahdzLsIGwpXEu2zAjgwcjfH3q'),
(4, 'joana da silva', 'vendedor', 'joana', '$2y$10$m9CT77g6EKUye0DIdg5fxOFJeWmIk4rOxeS0dALjPEb8fna9Axepi'),
(5, 'josefa da silva', 'vendedor', 'josefa', '$2y$10$55bzIGENbkWSdrt/tYKJl.RecipI4m5vCfUFVmyzXNuiKqJKqzGCW');

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `data_compra` date NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` double NOT NULL,
  `qtd_estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id`, `nome`, `preco`, `qtd_estoque`) VALUES
(1, 'geladeira', 1000, 500),
(2, 'fogao', 800, 200),
(3, 'microondas', 500, 2000),
(4, 'liquidifcador', 100, 3000),
(5, 'ventilador', 150, 1500),
(6, 'televisao', 1000, 300),
(7, 'radio', 50, 3000),
(8, 'lavadora de roupa', 400, 150),
(9, 'chuveiro eletrico', 250, 300),
(10, 'lampada', 5, 2000),
(11, 'aparelho de som', 1200, 210),
(12, 'dvd player', 90, 270),
(13, 'controle remoto', 10, 450),
(14, 'batedeira', 25, 120),
(15, 'aspirador de po', 250, 20);

-- --------------------------------------------------------

--
-- Table structure for table `produto_caracteristica`
--

CREATE TABLE `produto_caracteristica` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_caracteristica` int(11) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produto_caracteristica`
--

INSERT INTO `produto_caracteristica` (`id`, `id_produto`, `id_caracteristica`, `valor`) VALUES
(1, 1, 1, '2'),
(2, 1, 2, 'branco'),
(3, 1, 3, 'eletrolux'),
(4, 1, 4, 'electrolux RE31'),
(5, 1, 5, '220'),
(6, 1, 6, '100'),
(7, 2, 1, '2'),
(8, 2, 2, 'preto'),
(9, 2, 3, 'consul'),
(10, 2, 4, 'consul RE31'),
(11, 2, 5, '220'),
(12, 2, 6, '100'),
(13, 3, 1, '2'),
(14, 3, 2, 'cinza'),
(15, 3, 3, 'eletrolux'),
(16, 3, 4, 'electrolux RE31'),
(17, 3, 5, '220'),
(18, 3, 6, '150'),
(19, 4, 1, '1'),
(20, 4, 2, 'amarelo'),
(21, 4, 3, 'liqmarca'),
(22, 4, 4, 'liqmarca RE31'),
(23, 4, 5, '220'),
(24, 4, 6, '60'),
(25, 5, 1, '3'),
(26, 5, 2, 'rosa'),
(27, 5, 3, 'eletrolux'),
(28, 5, 4, 'electrolux RE31'),
(29, 5, 5, '220'),
(30, 5, 6, '100'),
(31, 6, 1, '2'),
(32, 6, 2, 'branco'),
(33, 6, 3, 'martv'),
(34, 6, 4, 'martv RE31'),
(35, 6, 5, '220'),
(36, 6, 6, '100'),
(37, 7, 1, '1'),
(38, 7, 2, 'verde'),
(39, 7, 3, 'eletrolux'),
(40, 7, 4, 'electrolux RE31'),
(41, 7, 5, '220'),
(42, 7, 6, '100'),
(43, 8, 1, '2'),
(44, 8, 2, 'branco'),
(45, 8, 3, 'eletrolux'),
(46, 8, 4, 'electrolux RE31'),
(47, 8, 5, '220'),
(48, 8, 6, '100'),
(49, 9, 1, '1'),
(50, 9, 2, 'branco'),
(51, 9, 3, 'eletrolux'),
(52, 9, 4, 'electrolux RE31'),
(53, 9, 5, '220'),
(54, 9, 6, '100'),
(55, 10, 1, '1'),
(56, 10, 2, 'branco'),
(57, 10, 3, 'eletrolux'),
(58, 10, 4, 'electrolux RE31'),
(59, 10, 5, '220'),
(60, 10, 6, '100'),
(61, 11, 1, '2'),
(62, 11, 2, 'vermelho'),
(63, 11, 3, 'eletrolux'),
(64, 11, 4, 'electrolux RE31'),
(65, 11, 5, '220'),
(66, 11, 6, '100'),
(67, 12, 1, '1'),
(68, 12, 2, 'amarelo'),
(69, 12, 3, 'eletrolux'),
(70, 12, 4, 'electrolux RE31'),
(71, 12, 5, '220'),
(72, 12, 6, '100'),
(73, 13, 1, '1'),
(74, 13, 2, 'azul'),
(75, 13, 3, 'marcontrole'),
(76, 13, 4, 'marcontrole RE31'),
(77, 13, 5, '220'),
(78, 13, 6, '20'),
(79, 14, 1, '1'),
(80, 14, 2, 'branco'),
(81, 14, 3, 'eletrolux'),
(82, 14, 4, 'electrolux RE31'),
(83, 14, 5, '220'),
(84, 14, 6, '120'),
(85, 15, 1, '2'),
(86, 15, 2, 'esmeralda'),
(87, 15, 3, 'eletrolux'),
(88, 15, 4, 'electrolux RE31'),
(89, 15, 5, '220'),
(90, 15, 6, '200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto_caracteristica`
--
ALTER TABLE `produto_caracteristica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_caracteristica` (`id_caracteristica`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `produto_caracteristica`
--
ALTER TABLE `produto_caracteristica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`);

--
-- Constraints for table `produto_caracteristica`
--
ALTER TABLE `produto_caracteristica`
  ADD CONSTRAINT `produto_caracteristica_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produto_caracteristica_ibfk_2` FOREIGN KEY (`id_caracteristica`) REFERENCES `caracteristica` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
