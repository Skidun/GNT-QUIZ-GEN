-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 02/07/2013 às 19:30:20
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de configuração que será aplicada a cada quiz.' AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `titulo_quiz_font_size`, `titulo_quiz_font_color`, `titulo_quiz_align`, `pergunta_quiz_font_size`, `pergunta_quiz_font_color`, `pergunta_quiz_align`, `link_ref_pergunta_font_size`, `link_ref_pergunta_font_color`, `link_ref_pergunta_align`, `resposta_pergunta_font_size`, `resposta_pergunta_font_color`, `resposta_pergunta_align`, `resposta_pergunta_bg_color`, `botao_perguntas_font_color`, `botao_perguntas_bg_color`, `quiz_bg_img`, `quiz_bg_color`, `resultado_titulo_quiz_font_size`, `resultado_titulo_quiz_font_color`, `resultado_titulo_quiz_align`, `resultado_titulo_faixa_font_size`, `resultado_titulo_faixa_font_color`, `resultado_titulo_faixa_align`, `resultado_porcentagem_font_size`, `resultado_porcentagem_font_color`, `resultado_porcentagem_align`, `resultado_descricao_font_size`, `resultado_descricao_font_color`, `resultado_descricao_align`, `resultado_linkref_font_size`, `resultado_linkref_font_color`, `resultado_linkref_align`, `resultado_botao_font_color`, `resultado_botao_bg_color`, `resultado_bg_img`, `resultado_bg_color`, `id_quiz`) VALUES
(1, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 36),
(3, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 38);

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
  `id_quiz` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela que definimos perfis de quiz do tipo perfil' AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `titulo`, `descricao`, `link_referencia`, `texto_link`, `imagem`, `data`, `id_quiz`) VALUES
(7, 'Maromba master', 'Você é um maromba master, pega pesado na malhação, come bem, dorme bem, e sua suplementação é muito boa. Você está de parabéns.', 'http://corpoideal.com.br', 'Veja algumas dicas', '../../assets/server/php/files/photo-119458.jpg', '2013-06-28 16:02:30', 36),
(8, 'Frangolino', 'Você malha, come e dorme como um frango, falta muito pra chegar no nível de um maromba', 'http://www.uol.com.br', 'referência', '../../assets/server/php/files/magrelo.jpg', '2013-06-17 20:56:15', 36),
(9, 'Natureba', 'Você tem uma dieta balanceada, dorme bem e pratica atividades físicas regularmente. Parabéns você é uma pessoa saudável ', '#', 'Referência', '../../assets/server/php/files/corpo_saudavel.jpg', '2013-06-20 21:39:34', 36);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `pergunta` text,
  `link_referencia` varchar(255) DEFAULT NULL,
  `texto_link` mediumtext,
  `imagem` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_quiz` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de perguntas de cada Quiz' AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`, `link_referencia`, `texto_link`, `imagem`, `data`, `id_quiz`) VALUES
(32, 'Quantas vezes você malha na semana?', '#', 'sem link', '../../assets/server/php/files/post-05-atividade_fisica.jpg', '2013-06-27 18:53:41', 36),
(33, 'Quantas horas por noite você dorme?', '#', 'saiba mais', '../../assets/server/php/files/sono.jpg', '2013-06-27 18:53:41', 36),
(34, 'Quantas vezes você come por dia?', '', '', '../../assets/server/php/files/Comida1 (1).jpg', '2013-06-26 18:37:58', 36),
(38, 'Quais suplementos você usa?', '#', 'saiba mais', '../../assets/server/php/files/sumplementos.jpg', '2013-06-27 18:39:32', 36);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de Quizes' AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `quiz`
--

INSERT INTO `quiz` (`id`, `titulo`, `tipo`, `data_alteracao`, `data_criacao`, `id_usuario`) VALUES
(36, 'Vida saudável', 'perfil', '2013-07-02 21:21:20', '2013-06-04', 1),
(38, 'dasdasds', 'perfil', '2013-07-02 22:24:53', '2013-07-02', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE IF NOT EXISTS `respostas` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `resposta` mediumtext,
  `tipo_resposta` varchar(12) DEFAULT NULL,
  `perfil_resposta` int(11) DEFAULT NULL,
  `id_pergunta` tinyint(4) DEFAULT NULL,
  `id_quiz` tinyint(4) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de respostas de cada pergunta' AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `resposta`, `tipo_resposta`, `perfil_resposta`, `id_pergunta`, `id_quiz`, `ordem`, `data`) VALUES
(30, '5 a 7 vezes', 'perfil', 7, 32, 36, 0, '2013-06-26 16:52:19'),
(31, '3 a 4 vezes', 'perfil', 9, 32, 36, 0, '2013-06-26 16:52:19'),
(32, '1 a 2 ', 'perfil', 8, 32, 36, 0, '2013-06-27 18:53:08'),
(33, '8 horas', 'perfil', 7, 33, 36, 0, '2013-06-26 16:45:36'),
(34, '6 horas', 'perfil', 9, 33, 36, 0, '2013-06-26 16:45:36'),
(35, '4 horas', 'perfil', 8, 33, 36, 0, '2013-06-27 18:53:41'),
(36, '6 vezes', 'perfil', 7, 34, 36, 0, '2013-06-26 18:37:58'),
(37, '4 a 6 vezes', 'perfil', 9, 34, 36, 0, '2013-06-26 18:37:58'),
(38, '3 vezes no máximo', 'perfil', 8, 34, 36, 0, '2013-06-26 18:37:58'),
(42, 'Todos', 'perfil', 7, 38, 36, 0, '2013-06-26 20:14:40'),
(43, 'Whey Protein e BCAAs', 'perfil', 9, 38, 36, 0, '2013-06-26 20:14:40'),
(44, 'Nenhum', 'perfil', 8, 38, 36, 0, '2013-06-26 20:14:40'),
(45, '1', 'perfil', 7, 32, 36, 0, '2013-06-27 18:52:42');

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
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `recoverkey`, `data`) VALUES
(1, 'Wesley', 'wesley@skidun.com.br', '7940ab47468396569a906f75ff3f20ef', 'ba75aca9071f77600123fe9a3ec3a5bf', NULL);

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
