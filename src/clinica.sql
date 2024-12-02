-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2024 às 22:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `cadcliente`
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
-- Estrutura para tabela `cadmedico`
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

--
-- Despejando dados para a tabela `cadmedico`
--

INSERT INTO `cadmedico` (`id`, `nome`, `sobrenome`, `especialidade`, `crm`, `email`, `senha`) VALUES
(1, 'Marcelo', 'Nobrega', 'Pediatra', 234325, 'marcelo@gmail.com', '$2y$10$jZoZlwm.xQ.anQ5LK8d/MOtiDW3rbhu.zGMQtByirTOPhXnpvYSxa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `confirmacaoconsulta`
--

CREATE TABLE `confirmacaoconsulta` (
  `id` int(11) NOT NULL,
  `confirmacaoConsulta` int(11) NOT NULL,
  `id_confirConsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `disponibilidadeconsulta`
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
-- Índices de tabela `cadcliente`
--
ALTER TABLE `cadcliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadmedico`
--
ALTER TABLE `cadmedico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `confirmacaoconsulta`
--
ALTER TABLE `confirmacaoconsulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_confirConsulta` (`id_confirConsulta`);

--
-- Índices de tabela `disponibilidadeconsulta`
--
ALTER TABLE `disponibilidadeconsulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cadMedico` (`id_cadMedico`);

--
-- AUTO_INCREMENT para tabelas despejadas
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `confirmacaoconsulta`
--
ALTER TABLE `confirmacaoconsulta`
  ADD CONSTRAINT `confirmacaoconsulta_ibfk_1` FOREIGN KEY (`id_confirConsulta`) REFERENCES `disponibilidadeconsulta` (`id`);

--
-- Restrições para tabelas `disponibilidadeconsulta`
--
ALTER TABLE `disponibilidadeconsulta`
  ADD CONSTRAINT `disponibilidadeconsulta_ibfk_1` FOREIGN KEY (`id_cadMedico`) REFERENCES `cadmedico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;