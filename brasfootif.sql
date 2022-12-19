-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Dez-2022 às 12:43
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `brasfootif`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`email`, `senha`, `id`) VALUES
('admin@admin.com', 'admin', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atletas`
--

CREATE TABLE `atletas` (
  `nome` varchar(200) NOT NULL,
  `data_nasc` date NOT NULL,
  `turma` varchar(10) NOT NULL,
  `altura` int(3) NOT NULL,
  `posicao` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `Jogaem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `atletas`
--

INSERT INTO `atletas` (`nome`, `data_nasc`, `turma`, `altura`, `posicao`, `foto`, `email`, `senha`, `id`, `sexo`, `Jogaem`) VALUES
('Messi', '1986-07-25', 'tq1', 160, 'pivo', 'fotos/63a04b9aef3a3.webp', 'Messi@atleta.com', '$2y$10$1apXVIXO0qHjseJYYYA9X.i9j9HYJTtiObuwwqE1zb8bIAOhrpGR.', 14, 'm', NULL),
('Di Maria', '1991-06-19', 'tq2', 190, 'goleiro', 'fotos/63a04bc90df54.webp', 'maria@atleta.com', '$2y$10$0ElCtG8IOa3EFTZD46ruwewXzWQ3TQzHBbjk0mCUX22/NoDyrHZim', 15, 'm', NULL),
('Alexis', '1990-06-13', 'ti3', 170, 'alaDireita', 'fotos/63a04c0d53fa3.jpg', 'alexis@atleta.com', '$2y$10$6v/XCsUV03/.lHNzBmmoa.HxGDt4bVxdv.pep.3G9mGwHepnxaaLq', 16, 'm', NULL),
('Emiliano', '1990-10-10', 'ti4', 175, 'goleiro', 'fotos/63a04c455de92.jpg', 'Emiliano@atleta.com', '$2y$10$kN9kEWOv/l287uIG1NLlcuXXVYeQxigl9faT3cFa0XLBKMFkE8F1e', 17, 'm', NULL),
('Enzo Fernández', '2000-12-15', 'tma2', 180, 'alaDireita', 'fotos/63a04c7e26e00.jpg', 'enzo@atleta.com', '$2y$10$CoEh1KUQTNSR/zIpnPwHPOJlgTZXnKZyqeRI5gAhioD2MnNmWFyze', 18, 'm', NULL),
('matias', '1992-02-15', 'tma3', 176, 'alaDireita', 'fotos/63a04caa6a128.webp', 'matias@atleta.com', '$2y$10$/w7EkwLW91v1hjC8wTYwcewaPucnmFeMNhFDXtJ57kDOVFKAvCAvy', 19, 'm', NULL),
('Lautaro', '1993-10-05', 'ti4', 169, 'alaEsquerda', 'fotos/63a04cdabd576.jpg', 'lautaro@atleta.com', '$2y$10$EOzuOY4pdgLedBmJ5qobfeH2jn1XVVR8PRZOwMzlMMVmo8RPy0RQ.', 20, 'm', NULL),
('Lissandro', '1989-06-15', 'tma1', 178, 'pivo', 'fotos/63a04d0ace7c8.jpg', 'lissandro@atleta.com', '$2y$10$vCYmS5oA1RDJaPACVkfd9uMRSnwTfHrawc.VGrhRVpiTTM1XDACB.', 21, 'm', NULL),
('Dybala', '1997-06-15', 'tq4', 169, 'alaEsquerda', 'fotos/63a04d3b00003.jpg', 'dybala@atleta.com', '$2y$10$iEYRUofS2b4HuP.24qcTrufgqlXYNrqxF1/nBbw.fABkbt4zoJGmy', 22, 'm', NULL),
('Rodrigo', '1989-09-15', 'tma3', 188, 'alaEsquerda', 'fotos/63a04d65a567c.jpg', 'rodrigo@atleta.com', '$2y$10$VD9Bi0/9Gz74xlmUJ/let.eeNjb74lUgoIgp6RplLx2n3foJkZ8Zi', 23, 'm', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE `time` (
  `idTime` int(11) NOT NULL,
  `nome_time` varchar(200) NOT NULL,
  `id_goleiro` int(11) DEFAULT NULL,
  `id_fixo` int(11) DEFAULT NULL,
  `id_alaDireita` int(11) DEFAULT NULL,
  `id_alaEsquerda` int(11) DEFAULT NULL,
  `id_Pivo` int(11) DEFAULT NULL,
  `id_reserva1` int(11) DEFAULT NULL,
  `id_reserva2` int(11) DEFAULT NULL,
  `id_reserva3` int(11) DEFAULT NULL,
  `id_reserva4` int(11) DEFAULT NULL,
  `id_reserva5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `atletas`
--
ALTER TABLE `atletas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fktime` (`Jogaem`);

--
-- Índices para tabela `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`idTime`),
  ADD KEY `fkgoleiro` (`id_goleiro`),
  ADD KEY `fkfixo` (`id_fixo`),
  ADD KEY `fkalaDireita` (`id_alaDireita`),
  ADD KEY `fkalaEsquerda` (`id_alaEsquerda`),
  ADD KEY `fkpivo` (`id_Pivo`),
  ADD KEY `fkres1` (`id_reserva1`),
  ADD KEY `fkres2` (`id_reserva2`),
  ADD KEY `fkres3` (`id_reserva3`),
  ADD KEY `fkres4` (`id_reserva4`),
  ADD KEY `fkres5` (`id_reserva5`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `atletas`
--
ALTER TABLE `atletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `time`
--
ALTER TABLE `time`
  MODIFY `idTime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `atletas`
--
ALTER TABLE `atletas`
  ADD CONSTRAINT `fktime` FOREIGN KEY (`Jogaem`) REFERENCES `time` (`idTime`);

--
-- Limitadores para a tabela `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `fkalaDireita` FOREIGN KEY (`id_alaDireita`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkalaEsquerda` FOREIGN KEY (`id_alaEsquerda`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkfixo` FOREIGN KEY (`id_fixo`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkgoleiro` FOREIGN KEY (`id_goleiro`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkpivo` FOREIGN KEY (`id_Pivo`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres1` FOREIGN KEY (`id_reserva1`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres2` FOREIGN KEY (`id_reserva2`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres3` FOREIGN KEY (`id_reserva3`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres4` FOREIGN KEY (`id_reserva4`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres5` FOREIGN KEY (`id_reserva5`) REFERENCES `atletas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
