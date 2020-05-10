-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2020 às 16:52
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classificadosmvc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text,
  `valor` float DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `id_categoria`, `titulo`, `descricao`, `valor`, `estado`) VALUES
(3, 1, 1, 'Hublot Editado 1', 'Algum produto de anÃºncio legal', 300, 2),
(4, 1, 2, 'Casaco de Fulano', 'DescriÃ§Ã£o luxuosa do casaco', 100, 1),
(5, 1, 4, 'Ferrari', 'Carro esportivo muito barato', 50, 2),
(7, 1, 3, 'Celular Xiaomi', 'Celular novo', 720, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios_imagens`
--

CREATE TABLE `anuncios_imagens` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `url` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios_imagens`
--

INSERT INTO `anuncios_imagens` (`id`, `id_anuncio`, `url`) VALUES
(5, 3, 'ce22b99a632571fc5ff345eafa252a67.jpg'),
(7, 3, 'fe31ef89de0c785c24e2007719241763.jpg'),
(8, 4, 'ef9b88ad9e74cd9b4f1510653da291a2.jpg'),
(9, 5, '04bd9d8ac92c267405cfa7682d59049b.jpg'),
(10, 5, 'fb3019cbc47211aed1cb32b76d660c13.jpg'),
(11, 5, 'c10d16f9aa0353d868bef93ff7e036c8.jpg'),
(18, 7, '33a0d670b1fa431f351d068092c5e62b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Relógios'),
(2, 'Roupas'),
(3, 'Eletrônicos'),
(4, 'Carros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `senha` varchar(32) NOT NULL DEFAULT '',
  `telefone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Bonieky', 'suporte@b7web.com.br', '202cb962ac59075b964b07152d234b70', '99999999'),
(3, 'DIEGO DEONISIO TILLER', 'diegotiller@live.com', '32330010fd22d30a65a2777b63c72ec8', '(22)99770-7093/(22)2580-1943');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
