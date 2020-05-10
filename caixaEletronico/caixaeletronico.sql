-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Maio-2020 às 16:50
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caixaeletronico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `titular` varchar(100) NOT NULL,
  `agencia` int(11) NOT NULL,
  `conta` int(11) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `titular`, `agencia`, `conta`, `senha`, `saldo`) VALUES
(1, 'Diego Tiller', 321, 123, '202cb962ac59075b964b07152d234b70', 887.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `valor` float NOT NULL,
  `data_operacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_conta`, `tipo`, `valor`, `data_operacao`) VALUES
(11, 1, 0, 1000, '2019-10-09 17:32:39'),
(12, 1, 1, 100, '2019-10-09 17:32:54'),
(13, 1, 1, 12.5, '2019-10-09 17:45:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
