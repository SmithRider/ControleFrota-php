-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Ago-2017 às 21:03
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `controle_frota`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `abastecimento`
--

CREATE TABLE IF NOT EXISTS `abastecimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_veiculo` int(11) NOT NULL,
  `data` date NOT NULL,
  `combustivel` varchar(45) NOT NULL,
  `quantidade` double NOT NULL,
  `unidade` varchar(15) NOT NULL,
  `preco_unitario` double NOT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `abastecimento`
--

INSERT INTO `abastecimento` (`id`, `id_veiculo`, `data`, `combustivel`, `quantidade`, `unidade`, `preco_unitario`, `total`) VALUES
(20, 12, '2017-08-05', 'FLEX', 10, 'Lts', 3, 90);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(70) DEFAULT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cnpj` varchar(20) NOT NULL,
  `inscricao_estadual` varchar(30) DEFAULT NULL,
  `inscricao_municipal` varchar(30) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cep` char(11) DEFAULT NULL,
  `ddd_telefone` char(3) DEFAULT NULL,
  `telefone` char(10) DEFAULT NULL,
  `ramal_telefone` char(5) DEFAULT NULL,
  `ddd_fax` char(3) DEFAULT NULL,
  `fax` char(10) DEFAULT NULL,
  `ramal_fax` char(5) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `contato` varchar(45) DEFAULT NULL,
  `observacoes` text,
  `fornecedorcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `principal` int(11) DEFAULT '0',
  `logradouro` varchar(70) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(70) DEFAULT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `cnpj` varchar(20) NOT NULL,
  `inscricao_estadual` varchar(30) DEFAULT NULL,
  `inscricao_municipal` varchar(30) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cep` char(11) DEFAULT NULL,
  `ddd_telefone` char(3) DEFAULT NULL,
  `telefone` char(10) DEFAULT NULL,
  `ramal_telefone` char(5) DEFAULT NULL,
  `ddd_fax` char(3) DEFAULT NULL,
  `fax` char(10) DEFAULT NULL,
  `ramal_fax` char(5) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `contato` varchar(45) DEFAULT NULL,
  `observacoes` text,
  `fornecedorcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `razao_social`, `nome_fantasia`, `cnpj`, `inscricao_estadual`, `inscricao_municipal`, `endereco`, `cidade`, `estado`, `cep`, `ddd_telefone`, `telefone`, `ramal_telefone`, `ddd_fax`, `fax`, `ramal_fax`, `email`, `contato`, `observacoes`, `fornecedorcol`) VALUES
(4, 'teste', 'teste', '00.000.000/0001-00', '0', '0', 'teste', 'teste', 'AC', '79813-180', '67', '99999999', '9999', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE IF NOT EXISTS `motorista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`id`, `nome`, `documento`, `categoria`) VALUES
(4, 'Manoel Neuer', '45789-965', 'Categoria A/C'),
(5, 'Lionel Bandeira', '454545459', 'Categoria A'),
(7, 'Pedro Almeida', '996658', 'Categoria D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `desc1` text NOT NULL,
  `desc2` text NOT NULL,
  `local` text NOT NULL,
  `departamento` text NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `data`, `id_veiculo`, `desc1`, `desc2`, `local`, `departamento`, `valor`) VALUES
(1, '2017-08-04', 9, 'teste', 'teste2', 'POSTO', 'Novos', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE IF NOT EXISTS `setor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`) VALUES
(8, 'Diretoria'),
(6, 'Executivo'),
(9, 'Jornalismo'),
(7, 'Marketing'),
(11, 'Restaurante'),
(3, 'Transporte e Logística');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `data_ultimo_login` datetime DEFAULT NULL,
  `admin` int(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `data_ultimo_login`, `admin`) VALUES
(2, 'Administrador', 'admin@admin.com', 'KI5CBtIAuOCGOJD58W2/gKv67pRwHz4V1O9aAZV1m0x9blll9DA6Ff1IXP6Cs8Q1KGM15ehRQYBNzY2sj09tYQ==', '2017-08-09 15:55:05', 1),
(4, 'teste', 'teste@teste.com', 'VpEn7sPy6F8KKVyg2G123cQZ3zmNbbqRxH2x5CdQHSUm4mGVzWJrwoi8FOPcBSIlUnmZsmAqb0MzYYezxeIAPw==', '2017-08-04 18:30:55', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE IF NOT EXISTS `veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `ano` int(11) NOT NULL,
  `placa` varchar(15) NOT NULL,
  `id_motorista` int(11) DEFAULT NULL,
  `id_setor` int(11) DEFAULT NULL,
  `km` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `marca`, `modelo`, `ano`, `placa`, `id_motorista`, `id_setor`, `km`) VALUES
(10, 'Ferrari', 'F-50', 2009, 'LOK-5869', 7, 2, 0),
(12, 'VOLKSWAGEN', 'GOL', 2017, 'HTU-2678', 5, 0, 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
