-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2020 às 16:21
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemaclassificados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `valor` float NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `id_categoria`, `titulo`, `descricao`, `valor`, `estado`) VALUES
(16, 3, 1, 'hublo', 'tuhthruhr', 100, 1),
(17, 3, 1, 'hublot 2 editado', 'h6hr65htyutmy', 720, 2),
(19, 3, 1, 'hublot 3', 'jimmiumi', 2000, 3),
(21, 3, 2, 'Camisa Nike', 'ggrbytn', 720, 3),
(22, 3, 2, 'Camisa Nike editada', 'fghh', 100, 1),
(23, 3, 1, 'Camisa Nike 1', 'efjhntiuctbiurni', 220, 1),
(24, 3, 3, 'Celular Xiaomi', 'chqjbwevbeuvbequvbi', 2000, 3),
(34, 3, 4, 'Kia Cerato', 'Carro impecÃ¡vel muito barato!', 35000, 3),
(35, 3, 4, 'Gol', 'Otimo estado', 12000, 0),
(36, 3, 3, 'J7 PRIME', 'Frontal quebrada', 900, 1),
(37, 3, 2, 'Camisa Flamengo', 'Camisa nova', 120, 0),
(38, 3, 4, 'Kia Bongo', 'ssntmfmi/g,murymyu ', 40000, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios_imagens`
--

CREATE TABLE `anuncios_imagens` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `anuncios_imagens`
--

INSERT INTO `anuncios_imagens` (`id`, `id_anuncio`, `url`) VALUES
(72, 16, 'f9d46b1d342e5b4a7e80ee86cd77ef98.jpg'),
(81, 17, '9c72988ef14a58a119c8ef445ebec704.jpg'),
(82, 17, 'ca126deb6f627f3a34984c9d2dd3eed4.jpg'),
(83, 17, 'a92b4ec3b777a1cb269c9e9a743cbc2f.jpg'),
(84, 19, '55a170a19c273a048f0438335e1ea9bf.jpg'),
(85, 19, 'dc8c88f0d13b7e893b586005c13ebe1f.jpg'),
(86, 21, '60043439b1540fda1cfc5a1839d04344.jpg'),
(87, 22, '824d2f5deec3e54fa5eb0ebcdcfa66c2.jpg'),
(88, 23, '84344a166664f2603b9afa95c5d1299d.jpg'),
(91, 24, '62d500018e0e4ba1cb424d158d835373.jpg'),
(110, 16, 'd656c4406da853ff99f87f00763c210e.jpg'),
(111, 16, '85d3b97963d8cce90ee2d078ee4b1342.jpg'),
(112, 16, '7822d7c8dcb8549ba0b5e931652ce595.jpg'),
(123, 34, '4beb3b1d5cc5a3cc97b72c397a2e633b.jpg'),
(124, 34, '5160597c25014023ed971a1c41e7ee91.jpg'),
(125, 34, '74e5b1d7bcc6b118c876c84c6562ade0.jpg'),
(126, 34, 'b43a20d04b710534f6a5f123685e83e1.jpg'),
(127, 35, 'dca75b838cc319b51880203419ac55c3.jpg'),
(128, 35, '61503ca16bb10709855f97b41503d0ad.jpg'),
(129, 35, '8237bf52c53b50933101fee5df9e8114.jpg'),
(130, 35, '337e6edc341a3f0ea06eca5eb72f0915.jpg'),
(131, 35, 'a9b65f83000e8239f9c1f350aff5acd0.jpg'),
(132, 35, 'cb49d3880f5b592cf273222b8652ef0f.jpg'),
(133, 36, '26a41f467dc8a833d57ff1e580df03ff.jpg'),
(134, 36, 'c621cc5b5e6a39f520cee06cfa36d8cd.jpg'),
(135, 36, '6c131121910d8bf402f7b0aa28bc41f6.jpg'),
(136, 37, 'e0fb46e57d79da010fce8379cde54943.jpg'),
(137, 37, 'ecc9092f4257851b7aa47231798f6213.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(3, 'Diego', 'diegotiller@live.com', '202cb962ac59075b964b07152d234b70', '(22)99770-7093/(22)2580-1943'),
(4, 'DIEGO DEONISIO TILLER', 'diegotiller9974@gmail.com', '32330010fd22d30a65a2777b63c72ec8', '(22)99770-7093/(22)2580-1943'),
(5, 'DIEGO DEONISIO TILLER', 'diegotiller@hotmail.com', '32330010fd22d30a65a2777b63c72ec8', '(22)99770-7093/(22)2580-1943');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `anuncios_imagens`
--
ALTER TABLE `anuncios_imagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
