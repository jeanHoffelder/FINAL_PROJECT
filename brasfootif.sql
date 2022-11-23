-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2022 às 13:42
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
  `sexo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE `time` (
  `nome_time` varchar(200) NOT NULL,
  `id_goleiro` int(11) NOT NULL,
  `id_fixo` int(11) NOT NULL,
  `id_alaDireita` int(11) NOT NULL,
  `id_alaEsquerda` int(11) NOT NULL,
  `id_Pivo` int(11) NOT NULL,
  `id_reseva1` int(11) NOT NULL,
  `id_reseva2` int(11) NOT NULL,
  `id_reseva3` int(11) NOT NULL,
  `id_reseva4` int(11) NOT NULL,
  `id_reseva5` int(11) NOT NULL
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
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `time`
--
ALTER TABLE `time`
  ADD KEY `fkgoleiro` (`id_goleiro`),
  ADD KEY `fkfixo` (`id_fixo`),
  ADD KEY `fkalaDireita` (`id_alaDireita`),
  ADD KEY `fkalaEsquerda` (`id_alaEsquerda`),
  ADD KEY `fkpivo` (`id_Pivo`),
  ADD KEY `fkres1` (`id_reseva1`),
  ADD KEY `fkres2` (`id_reseva2`),
  ADD KEY `fkres3` (`id_reseva3`),
  ADD KEY `fkres4` (`id_reseva4`),
  ADD KEY `fkres5` (`id_reseva5`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atletas`
--
ALTER TABLE `atletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `fkalaDireita` FOREIGN KEY (`id_alaDireita`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkalaEsquerda` FOREIGN KEY (`id_alaEsquerda`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkfixo` FOREIGN KEY (`id_fixo`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkgoleiro` FOREIGN KEY (`id_goleiro`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkpivo` FOREIGN KEY (`id_Pivo`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres1` FOREIGN KEY (`id_reseva1`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres2` FOREIGN KEY (`id_reseva2`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres3` FOREIGN KEY (`id_reseva3`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres4` FOREIGN KEY (`id_reseva4`) REFERENCES `atletas` (`id`),
  ADD CONSTRAINT `fkres5` FOREIGN KEY (`id_reseva5`) REFERENCES `atletas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
