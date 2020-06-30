-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2020 às 15:09
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otakucontrol`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbanimes`
--

CREATE TABLE `tbanimes` (
  `IDAnimes` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Temporada` int(11) NOT NULL,
  `Episodio` varchar(10) NOT NULL,
  `Observacao` text,
  `IDTipo` int(11) NOT NULL,
  `IDOtaku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbotaku`
--

CREATE TABLE `tbotaku` (
  `IDOtaku` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Senha` varchar(8) NOT NULL,
  `AnimeFavorito` int(11) DEFAULT NULL,
  `Nickname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipo`
--

CREATE TABLE `tbtipo` (
  `IDTipo` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbanimes`
--
ALTER TABLE `tbanimes`
  ADD PRIMARY KEY (`IDAnimes`);

--
-- Indexes for table `tbotaku`
--
ALTER TABLE `tbotaku`
  ADD PRIMARY KEY (`IDOtaku`);

--
-- Indexes for table `tbtipo`
--
ALTER TABLE `tbtipo`
  ADD PRIMARY KEY (`IDTipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbanimes`
--
ALTER TABLE `tbanimes`
  MODIFY `IDAnimes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbotaku`
--
ALTER TABLE `tbotaku`
  MODIFY `IDOtaku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbtipo`
--
ALTER TABLE `tbtipo`
  MODIFY `IDTipo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
