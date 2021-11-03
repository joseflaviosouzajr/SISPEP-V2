-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2021 às 23:13
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sispepv1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carteira`
--

CREATE TABLE `carteira` (
  `nr_carteira` int(11) NOT NULL,
  `cd_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carteira`
--

INSERT INTO `carteira` (`nr_carteira`, `cd_paciente`) VALUES
(37, 16),
(30, 17),
(29, 18),
(34, 19),
(35, 22),
(24, 23),
(32, 25),
(36, 26),
(25, 27),
(31, 28),
(38, 29),
(21, 30),
(27, 31),
(28, 32),
(33, 33),
(26, 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao`
--

CREATE TABLE `classificacao` (
  `cd_atendimento` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `temp` varchar(45) DEFAULT NULL,
  `pad` varchar(45) DEFAULT NULL,
  `pas` varchar(255) NOT NULL,
  `sat` varchar(45) DEFAULT NULL,
  `has` varchar(45) DEFAULT NULL,
  `diabetes` varchar(45) DEFAULT NULL,
  `ds_evolucao` varchar(45) DEFAULT NULL,
  `finalizado` varchar(45) DEFAULT 'N',
  `dt_registro` date DEFAULT NULL,
  `excluido` varchar(45) DEFAULT 'N',
  `cd_totem` int(11) DEFAULT NULL,
  `protocolo` varchar(45) DEFAULT NULL,
  `cd_paciente` int(11) NOT NULL,
  `classificacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha_med`
--

CREATE TABLE `ficha_med` (
  `cd_ficha` int(11) NOT NULL,
  `cd_atendimento` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `ds_conduta` varchar(45) DEFAULT NULL,
  `ds_queixa` varchar(45) DEFAULT NULL,
  `motivo_alta` varchar(45) DEFAULT NULL,
  `dt_registro` date DEFAULT NULL,
  `finalizado` varchar(45) DEFAULT 'N',
  `aceite_protocolo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lab`
--

CREATE TABLE `lab` (
  `cd_lab` int(11) NOT NULL,
  `cd_atendimento` int(11) NOT NULL,
  `cd_usuario` int(11) NOT NULL,
  `coletado` varchar(45) DEFAULT 'N',
  `resultado` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `dt_coleta` date DEFAULT NULL,
  `dt_resultado` date DEFAULT NULL,
  `obs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `cd_paciente` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `dt_nascimento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`cd_paciente`, `nome`, `cpf`, `dt_nascimento`) VALUES
(16, 'Mateus Diogo da Rosa', '90480871477', '12/08/2003'),
(17, 'Fátima Jennifer Costa', '67447799408', '15/08/2003'),
(18, 'Ester Carolina Baptista', '67881667494', '06/05/2003'),
(19, 'Lorena Malu Emily Nunes', '82260024432', '03/12/2003'),
(20, 'Sophie Esther Malu Nascimento', '82169498478', '23/09/2003'),
(21, 'Vicente Geraldo Oliveira', '68496656420', '09/03/2003'),
(22, 'Lívia Teresinha Castro', '17922254407', '19/06/2003'),
(23, 'Carlos Eduardo Fábio Monteiro', '74153411477', '02/11/2003'),
(24, 'Renata Catarina Sabrina Monteiro', '22958647471', '10/03/2003'),
(25, 'Laís Gabriela Baptista', '55287744463', '07/10/2003'),
(26, 'Mariana Juliana Maya Carvalho', '73143698446', '19/10/2003'),
(27, 'Cláudia Simone Liz da Conceição', '52731152486', '27/06/2003'),
(28, 'Gael Fernando Galvão', '16092136457', '27/12/2003'),
(29, 'Renan Noah Oliver Lopes', '51383343446', '02/07/2003'),
(30, 'Benjamin Juan Barros', '45330065402', '05/07/2003'),
(31, 'Eduarda Esther Pinto', '87631015481', '13/08/2003'),
(32, 'Emanuel Theo Roberto da Silva', '58942407439', '06/06/2003'),
(33, 'Leonardo Paulo Figueiredo', '06637202495', '10/03/2003'),
(34, 'Diego Daniel Thiago da Cunha', '99260437474', '25/10/2003');

-- --------------------------------------------------------

--
-- Estrutura da tabela `totem`
--

CREATE TABLE `totem` (
  `cd_totem` int(11) NOT NULL,
  `ds_prioridade` varchar(45) DEFAULT 'N',
  `dt_registro` varchar(45) DEFAULT NULL,
  `chamado` varchar(45) DEFAULT 'N',
  `excluido` varchar(45) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cd_usuario` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `conselho` varchar(45) DEFAULT NULL,
  `nr_conselho` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `login`, `senha`, `nome`, `conselho`, `nr_conselho`) VALUES
(1, 'enf', 'ZW5m', 'Enfermeira', 'Coren', '12345'),
(2, 'lab', 'bGFi', 'LABORATORIO', 'colab', '54321'),
(3, 'med', 'bWVk', 'Medico', 'Cremepe', '111111');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carteira`
--
ALTER TABLE `carteira`
  ADD PRIMARY KEY (`nr_carteira`),
  ADD KEY `cd_paciente_cart_fk_idx` (`cd_paciente`);

--
-- Índices para tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD PRIMARY KEY (`cd_atendimento`),
  ADD KEY `cd_paciente_fk_idx` (`cd_paciente`),
  ADD KEY `cd_usuario_cla_fk_idx` (`cd_usuario`);

--
-- Índices para tabela `ficha_med`
--
ALTER TABLE `ficha_med`
  ADD PRIMARY KEY (`cd_ficha`),
  ADD KEY `cd_atendimento_ficha_fk_idx` (`cd_atendimento`),
  ADD KEY `cd_usuario_ficha_fk_idx` (`cd_usuario`);

--
-- Índices para tabela `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`cd_lab`),
  ADD KEY `cd_usuario_fk_idx` (`cd_usuario`),
  ADD KEY `cd_atendimento_fk_idx` (`cd_atendimento`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cd_paciente`);

--
-- Índices para tabela `totem`
--
ALTER TABLE `totem`
  ADD PRIMARY KEY (`cd_totem`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cd_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carteira`
--
ALTER TABLE `carteira`
  MODIFY `nr_carteira` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `classificacao`
--
ALTER TABLE `classificacao`
  MODIFY `cd_atendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `ficha_med`
--
ALTER TABLE `ficha_med`
  MODIFY `cd_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `lab`
--
ALTER TABLE `lab`
  MODIFY `cd_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `cd_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `totem`
--
ALTER TABLE `totem`
  MODIFY `cd_totem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cd_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carteira`
--
ALTER TABLE `carteira`
  ADD CONSTRAINT `cd_paciente_cart_fk` FOREIGN KEY (`cd_paciente`) REFERENCES `paciente` (`cd_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD CONSTRAINT `cd_paciente_cla_fk` FOREIGN KEY (`cd_paciente`) REFERENCES `paciente` (`cd_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cd_usuario_cla_fk` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ficha_med`
--
ALTER TABLE `ficha_med`
  ADD CONSTRAINT `cd_atendimento_ficha_fk` FOREIGN KEY (`cd_atendimento`) REFERENCES `classificacao` (`cd_atendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cd_usuario_ficha_fk` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `cd_atendimento_lab_fk` FOREIGN KEY (`cd_atendimento`) REFERENCES `classificacao` (`cd_atendimento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cd_usuario_lab_fk` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario` (`cd_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
