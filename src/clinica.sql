-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/01/2025 às 14:14
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

--
-- Despejando dados para a tabela `cadcliente`
--

INSERT INTO `cadcliente` (`id`, `nome`, `sobrenome`, `cpf`, `email`, `senha`) VALUES
(1, 'Joao', 'Silva', '123.456.789', 'joao@gmail.com', '$2y$10$a4JreRVuVLyDLCQnyUYReuuobMVxuib2fhamfLFS2ZhuCQR4mo1ZC'),
(2, 'Maria ', 'Eduarda', '234.567.890', 'maria@gmail.com', '$2y$10$YexczUyZcmMtZhkRShTTAuZoA9fsW1SPSIKVb6oqKUGuoWcbLXFdm'),
(3, 'Carlos', 'Pereira ', '345.678.901', 'carlos@gmail.com', '$2y$10$Y5252xGshcb8dUGaJz1rm.g05zQmQJX7u9qk6UPKLXfxpccH.wksW'),
(4, 'Ana', 'Souza', '456.789.012', 'ana@gmail.com', '$2y$10$djeo4Tzs1knghG5.5K1k.uqvRz.k7msxIOy/n0XPNeww85W9t78Li'),
(5, 'Lucas', 'Almeida', '567.890.123', 'lucas@gmail.com', '$2y$10$rmAHPm3VOm7kA9b7FNh5quZzJgXROSPPXitDf0U8x9kN2Efz1AoOS'),
(6, 'Juliana', 'Santos', '678.901.234', 'juliana@gmail.com', '$2y$10$Vj1FPItbW1XS7hQgkeOU2ulmIsWSCivIJcbTechQY21quE8d7My2m'),
(7, 'Pedro ', 'Costa', '789.012.345', 'pedro@gmail.com', '$2y$10$YDrsXLvqNJcMDmMUM5bBdu7D82ANdzAnDcpu/D5Eq/Bi8Jrw34UG.'),
(8, 'Fernando', 'Rodrigues', '890.123.456', 'fernando@gmail.com', '$2y$10$BEOyj7FSsd6wn.t2.ixXwOubARfkeSWeQm5Hk7jybKvheEjbODH86'),
(9, 'Rodrigo', 'Lima', '901.234.567', 'rodrigo@gmail.com', '$2y$10$0Xp3UDQPWahwzGuErR3Tl.cTaCBoHf2jAaxtWzImxBI/iigX/8YZK'),
(10, 'Camila', 'Martins', '012.345.678', 'camila@gmail.com', '$2y$10$Jr9qY1OCQQS5.terYdGynekSSc7oT2JGKEJXn34nZLLY57mb164XK');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadmedico`
--

CREATE TABLE `cadmedico` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `especialidade` text NOT NULL,
  `data_disponibilidade` date NOT NULL,
  `crm` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadmedico`
--

INSERT INTO `cadmedico` (`id`, `nome`, `sobrenome`, `especialidade`, `data_disponibilidade`, `crm`, `email`, `senha`) VALUES
(1, 'Marcelo', 'Nobrega', 'Pediatra', '2025-01-15', 234325, 'marcelo@gmail.com', '$2y$10$jZoZlwm.xQ.anQ5LK8d/MOtiDW3rbhu.zGMQtByirTOPhXnpvYSxa'),
(2, 'Gabriel ', 'Oliveira', 'Cardiologista', '2025-01-15', 12345, 'gabriel@gmail.com', '$2y$10$K8uKWAIOer/4eHAnnNKt1.HKZMeniYGVHlaUYa18HF4.mufNZ5x6q'),
(3, 'Mariana', 'Costa', 'Pediatra', '2025-01-15', 12345, 'mariana@gmail.com', '$2y$10$CfsSqEBhRMy0oJUVNYk2GO3OKdYIZn0fqv/hCrfpBVUnRlZ6zpGv2'),
(4, 'Ricardo', 'Almeida', 'Ortopedista', '2025-01-15', 12345, 'ricardo@gmail.com', '$2y$10$i5s/V9CO3g5Hs0uX7/7etejbMw03IFjof2VIQNw/0YA2W1hJQ2cv.'),
(5, 'Luiza', 'Mendes', 'Dermatologista', '2025-01-15', 12345, 'luiza@gmail.com', '$2y$10$J4nnBCPHWE5CJvOcL4Z5IOZ6I.TGDW7/uzsU00N8YF7qM.hgZ1e4K'),
(6, 'Felipe', 'Vasconcelos', 'Neurologista', '2025-01-15', 12345, 'felipe@gmail.com', '$2y$10$nxewQT0JAalqhimf49D03u0jCyIyjXlORdpYgFnk1sJg/PRpr1fau'),
(7, 'Camila', 'Ribeiro', 'Ginecologista', '2025-01-15', 12345, 'camila@gmail.com', '$2y$10$NR4HjZ70PSTKT4F3ihxJw.5.2xmq70070Cry87I3boNyfqJ0M6jBm'),
(8, 'Thiago', 'Pereira', 'Endocrinologista', '2025-01-15', 12345, 'thiago@gmail.com', '$2y$10$.CHULzDo4aGf.GmU.NrXTOJerqPfs/ea0oIbx5UIXyatgEnh7saX6'),
(9, 'Ana Beatriz', 'Soares', 'Oftalmologista', '2025-01-15', 12345, 'anabeatriz@gmail.com', '$2y$10$BA8EoEh5rW6ZjgIbxTLS5uZgCFvknDc1VW5CL4PNtXQpXH3wx2aBO'),
(10, 'Sofia', 'Lima', 'Psiquiatra', '2025-01-15', 12345, 'sofia@gmail.com', '$2y$10$yLh43qB6LbokHURL9i69P.xlLJMKtWJsLtlcnhveW1x.iaGCAL/R.');

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
-- Estrutura para tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `data_consulta` datetime NOT NULL,
  `data_agendada` date NOT NULL,
  `cancelada` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consultas`
--

INSERT INTO `consultas` (`id`, `id_paciente`, `id_medico`, `data_consulta`, `data_agendada`, `cancelada`) VALUES
(1, 2, 1, '2025-01-17 16:49:29', '2025-01-17', 1),
(2, 2, 6, '2025-01-17 16:52:47', '2025-01-17', 1),
(3, 2, 1, '2025-01-17 17:31:42', '0000-00-00', 1),
(4, 2, 7, '2025-01-21 16:34:40', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `disponibilidade`
--

CREATE TABLE `disponibilidade` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `dataConsulta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disponibilidade`
--

INSERT INTO `disponibilidade` (`id`, `id_medico`, `dataConsulta`) VALUES
(1, 6, '2024-12-02'),
(2, 6, '2024-12-02'),
(3, 7, '2025-01-08'),
(4, 7, '2025-02-13'),
(5, 7, '2025-02-13'),
(6, 7, '2025-01-01');

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
-- Índices de tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_medico` (`id_medico`);

--
-- Índices de tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medico` (`id_medico`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cadmedico`
--
ALTER TABLE `cadmedico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `confirmacaoconsulta`
--
ALTER TABLE `confirmacaoconsulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Restrições para tabelas `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `cadcliente` (`id`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `cadmedico` (`id`);

--
-- Restrições para tabelas `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD CONSTRAINT `disponibilidade_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `cadmedico` (`id`);

--
-- Restrições para tabelas `disponibilidadeconsulta`
--
ALTER TABLE `disponibilidadeconsulta`
  ADD CONSTRAINT `disponibilidadeconsulta_ibfk_1` FOREIGN KEY (`id_cadMedico`) REFERENCES `cadmedico` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
