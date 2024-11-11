-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2024 às 20:34
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadcliente`
--

CREATE TABLE `cadcliente` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadmedico`
--

CREATE TABLE `cadmedico` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `especialidade` text NOT NULL,
  `crm` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirmacaoconsulta`
--

CREATE TABLE `confirmacaoconsulta` (
  `id` int(11) NOT NULL,
  `confirmacaoConsulta` int(11) NOT NULL,
  `id_confirConsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disponibilidadeconsulta`
--

CREATE TABLE `disponibilidadeconsulta` (
  `id` int(11) NOT NULL,
  `dia` varchar(255) NOT NULL,
  `horario` int(11) NOT NULL,
  `id_cadMedico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadcliente`
--
ALTER TABLE `cadcliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cadmedico`
--
ALTER TABLE `cadmedico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `confirmacaoconsulta`
--
ALTER TABLE `confirmacaoconsulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_confirConsulta` (`id_confirConsulta`);

--
-- Índices para tabela `disponibilidadeconsulta`
--
ALTER TABLE `disponibilidadeconsulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cadMedico` (`id_cadMedico`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadcliente`
--
ALTER TABLE `cadcliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cadmedico`
--
ALTER TABLE `cadmedico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `confirmacaoconsulta`
--
ALTER TABLE `confirmacaoconsulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `disponibilidadeconsulta`
--
ALTER TABLE `disponibilidadeconsulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `confirmacaoconsulta`
--
ALTER TABLE `confirmacaoconsulta`
  ADD CONSTRAINT `confirmacaoconsulta_ibfk_1` FOREIGN KEY (`id_confirConsulta`) REFERENCES `disponibilidadeconsulta` (`id`);

--
-- Limitadores para a tabela `disponibilidadeconsulta`
--
ALTER TABLE `disponibilidadeconsulta`
  ADD CONSTRAINT `disponibilidadeconsulta_ibfk_1` FOREIGN KEY (`id_cadMedico`) REFERENCES `cadmedico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
