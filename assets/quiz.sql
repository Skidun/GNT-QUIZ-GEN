-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 10/07/2013 às 16:24:54
-- Versão do Servidor: 5.5.31
-- Versão do PHP: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `quiz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo_quiz_font_size` varchar(11) DEFAULT NULL,
  `titulo_quiz_font_color` varchar(7) DEFAULT NULL,
  `titulo_quiz_align` varchar(12) DEFAULT NULL,
  `pergunta_quiz_font_size` varchar(12) DEFAULT NULL,
  `pergunta_quiz_font_color` varchar(7) DEFAULT NULL,
  `pergunta_quiz_align` varchar(8) DEFAULT NULL,
  `link_ref_pergunta_font_size` varchar(12) DEFAULT NULL,
  `link_ref_pergunta_font_color` varchar(7) DEFAULT NULL,
  `link_ref_pergunta_align` varchar(8) DEFAULT NULL,
  `resposta_pergunta_font_size` varchar(12) DEFAULT NULL,
  `resposta_pergunta_font_color` varchar(8) DEFAULT NULL,
  `resposta_pergunta_align` varchar(8) DEFAULT NULL,
  `resposta_pergunta_bg_color` varchar(7) DEFAULT NULL,
  `botao_perguntas_font_color` varchar(7) DEFAULT NULL,
  `botao_perguntas_bg_color` varchar(9) DEFAULT NULL,
  `quiz_bg_img` varchar(255) DEFAULT NULL,
  `quiz_bg_color` varchar(12) DEFAULT NULL,
  `resultado_titulo_quiz_font_size` varchar(12) DEFAULT NULL,
  `resultado_titulo_quiz_font_color` varchar(7) DEFAULT NULL,
  `resultado_titulo_quiz_align` varchar(8) DEFAULT NULL,
  `resultado_titulo_faixa_font_size` varchar(12) DEFAULT NULL,
  `resultado_titulo_faixa_font_color` varchar(8) DEFAULT NULL,
  `resultado_titulo_faixa_align` varchar(8) DEFAULT NULL,
  `resultado_porcentagem_font_size` varchar(12) DEFAULT NULL,
  `resultado_porcentagem_font_color` varchar(7) DEFAULT NULL,
  `resultado_porcentagem_align` varchar(12) DEFAULT NULL,
  `resultado_descricao_font_size` varchar(12) DEFAULT NULL,
  `resultado_descricao_font_color` varchar(7) DEFAULT NULL,
  `resultado_descricao_align` varchar(12) DEFAULT NULL,
  `resultado_linkref_font_size` varchar(12) DEFAULT NULL,
  `resultado_linkref_font_color` varchar(7) DEFAULT NULL,
  `resultado_linkref_align` varchar(8) DEFAULT NULL,
  `resultado_botao_font_color` varchar(7) DEFAULT NULL,
  `resultado_botao_bg_color` varchar(7) DEFAULT NULL,
  `resultado_bg_img` varchar(255) DEFAULT NULL,
  `resultado_bg_color` varchar(7) DEFAULT NULL,
  `id_quiz` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de configuração que será aplicada a cada quiz.' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faixa`
--

CREATE TABLE IF NOT EXISTS `faixa` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `range_de` tinyint(4) DEFAULT NULL,
  `range_ate` tinyint(4) DEFAULT NULL,
  `titulo` varchar(128) DEFAULT NULL,
  `texto` mediumtext,
  `link_referencia` varchar(255) DEFAULT NULL,
  `texto_link` mediumtext,
  `imagem` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_quiz` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Faixa de classificação que define o resultado final do Quiz.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo` mediumtext,
  `descricao` mediumtext,
  `link_referencia` varchar(255) DEFAULT NULL,
  `texto_link` mediumtext,
  `imagem` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ordem` int(11) NOT NULL,
  `id_quiz` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela que definimos perfis de quiz do tipo perfil' AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text,
  `link_referencia` varchar(255) DEFAULT NULL,
  `texto_link` mediumtext,
  `imagem` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ordem` int(11) NOT NULL,
  `id_quiz` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de perguntas de cada Quiz' AUTO_INCREMENT=166 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `tipo` varchar(12) DEFAULT NULL,
  `data_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_criacao` date NOT NULL,
  `id_usuario` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de Quizes' AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE IF NOT EXISTS `respostas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` mediumtext,
  `tipo_resposta` varchar(12) DEFAULT NULL,
  `perfil_resposta` int(11) DEFAULT NULL,
  `id_pergunta` int(11) DEFAULT NULL,
  `id_quiz` tinyint(4) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de respostas de cada pergunta' AUTO_INCREMENT=272 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `recoverkey` varchar(32) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de usu⳩os' AUTO_INCREMENT=2 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD CONSTRAINT `configuracoes_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `configuracoes_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `configuracoes_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);

--
-- Restrições para a tabela `faixa`
--
ALTER TABLE `faixa`
  ADD CONSTRAINT `faixa_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `faixa_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `faixa_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);

--
-- Restrições para a tabela `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `perfil_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `perfil_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);

--
-- Restrições para a tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `perguntas_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `perguntas_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);

--
-- Restrições para a tabela `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `quiz_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `respostas_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
