-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 19/07/2013 às 15:14
-- Versão do servidor: 5.5.30-cll-lve
-- Versão do PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `quiz`
--
CREATE DATABASE IF NOT EXISTS `quiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quiz`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_quiz` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de configuração que será aplicada a cada quiz.' AUTO_INCREMENT=47 ;

--
-- Fazendo dump de dados para tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `titulo_quiz_font_size`, `titulo_quiz_font_color`, `titulo_quiz_align`, `pergunta_quiz_font_size`, `pergunta_quiz_font_color`, `pergunta_quiz_align`, `link_ref_pergunta_font_size`, `link_ref_pergunta_font_color`, `link_ref_pergunta_align`, `resposta_pergunta_font_size`, `resposta_pergunta_font_color`, `resposta_pergunta_align`, `resposta_pergunta_bg_color`, `botao_perguntas_font_color`, `botao_perguntas_bg_color`, `quiz_bg_img`, `quiz_bg_color`, `resultado_titulo_quiz_font_size`, `resultado_titulo_quiz_font_color`, `resultado_titulo_quiz_align`, `resultado_titulo_faixa_font_size`, `resultado_titulo_faixa_font_color`, `resultado_titulo_faixa_align`, `resultado_porcentagem_font_size`, `resultado_porcentagem_font_color`, `resultado_porcentagem_align`, `resultado_descricao_font_size`, `resultado_descricao_font_color`, `resultado_descricao_align`, `resultado_linkref_font_size`, `resultado_linkref_font_color`, `resultado_linkref_align`, `resultado_botao_font_color`, `resultado_botao_bg_color`, `resultado_bg_img`, `resultado_bg_color`, `id_quiz`) VALUES
(20, '20px', '7f0000', '   center', '22px', '333333', 'left', '16px', '007f00', 'left', '15px', '333333', 'left', '', '7f003f', 'ffff00', '1373492640-tumblr_mdoybrLuau1r8d0omo1_500.jpg', 'aa56ff', '20px', '7f0000', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '007f00', 'left', '15px', '333333', 'left', '7f003f', 'ffff56', '', '', 55),
(21, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 56),
(22, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 57),
(23, '20px', '56ffaa', '   center', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ff7f00', '00bfbf', '', 'e5e5e5', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', '', 58),
(24, '20px', '333333', ' left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ffffff', 'cc1e59', '', 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', '', 59),
(29, '22px', '333333', '    center', '24px', '7f007f', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ffffaa', 'ff0000', '', 'aaff56', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', '7fff00', 64),
(30, '22px', 'e011ac', '         jus', '26px', 'ff007f', 'left', '16px', '050404', 'left', '17px', 'ff007f', 'justify', '', 'e82f12', '000000', '1373913188-Lighthouse.jpg', '0c0c02', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', 'faab2a', 65),
(32, '20px', '333333', ' center', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ffffff', 'cc1e59', '', 'ff7f00', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', 'ff56aa', 67),
(34, '20px', 'bc2d2d', '  left', '24px', '444722', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ffffff', 'cc1e59', '', 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', 'faab2a', 69),
(35, '20px', '333333', 'center', '22px', '00007f', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ffffff', '007f7f', '', 'aad4ff', '20px', '333333', 'center', '26px', '7f003f', 'left', '18px', '007f00', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', '007f7f', '', 'aad4ff', 70),
(36, '20px', '333333', '    left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ffffff', 'cc1e59', '', 'bf9450', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '771111', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', 'faab2a', 71),
(37, '22px', 'fff7f7', '      left', '26px', 'ce5c5c', 'left', '16px', '333333', 'left', '17px', '000000', 'left', '000000', 'ffffff', '6161a0', '', '999958', '22px', '333333', 'left', '24px', 'ffffff', 'left', '18px', 'af4b4b', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', '33ed1e', '', '00bf00', 72),
(38, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 73),
(39, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 74),
(41, '20px', '333333', ' left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ffffff', 'cc1e59', '', 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', 'faab2a', 76),
(42, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 77),
(43, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 78),
(44, '20px', '333333', '   left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', '', 'ffffff', 'cc1e59', '', 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', '', 'faab2a', 79),
(45, '22px', '007f3f', '  center', '24px', '333333', 'left', '16px', '0000ff', 'left', '15px', '333333', 'left', '', 'ffffff', '007f00', '', 'aaffaa', '20px', '3f007f', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '0000ff', 'left', 'ffffff', '0000bf', '', '56aaff', 80),
(46, '20px', '333333', 'left', '24px', '333333', 'left', '16px', '333333', 'left', '15px', '333333', 'left', NULL, 'ffffff', 'cc1e59', NULL, 'faab2a', '20px', '333333', 'left', '24px', '333333', 'left', '18px', '333333', 'left', '18px', '333333', 'left', '15px', '333333', 'left', 'ffffff', 'cc1e59', NULL, 'faab2a', 81);

-- --------------------------------------------------------

--
-- Estrutura para tabela `faixa`
--

CREATE TABLE IF NOT EXISTS `faixa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `range_de` int(11) DEFAULT NULL,
  `range_ate` int(11) DEFAULT NULL,
  `titulo` varchar(128) DEFAULT NULL,
  `descricao` mediumtext,
  `link_referencia` varchar(255) DEFAULT NULL,
  `texto_link` mediumtext,
  `imagem` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ordem` int(11) NOT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Faixa de classificação que define o resultado final do Quiz.' AUTO_INCREMENT=30 ;

--
-- Fazendo dump de dados para tabela `faixa`
--

INSERT INTO `faixa` (`id`, `range_de`, `range_ate`, `titulo`, `descricao`, `link_referencia`, `texto_link`, `imagem`, `data`, `ordem`, `id_quiz`) VALUES
(2, 0, 10, 'Você está mal informado', '', '', '', '', '2013-07-15 15:01:52', 0, 64),
(3, 20, 30, 'Você é bem informado.', '', '', '', '', '2013-07-15 15:12:29', 0, 64),
(4, 0, 10, 'precisa estudar mais', 'não sabe nada', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/imagers.jpg', '2013-07-15 18:08:09', 0, 67),
(5, 0, 20, 'sabe um pouco, mas poderia ser bem melhor', 'fraco', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/mensagem_de_amor_2.jpg', '2013-07-15 18:08:10', 0, 67),
(6, 0, 30, 'já está ficando bom', 'se estudar mais fica otimo', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/sol2.jpg', '2013-07-15 18:08:10', 0, 67),
(7, 0, 40, 'muito bem!!!!!!!!', 'sabe tudo, gênio', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/zoom-todas-as-nossas-acoes-deveriam-ser-guiadas-pelo-amor-2.jpg', '2013-07-15 18:08:11', 0, 67),
(11, 0, 10, 'Faixa 1', 'Essa é a faixa 1', '', '', '', '2013-07-15 22:27:12', 0, 69),
(12, 20, 30, 'Faixa 2', 'Essa é a Faixa 2', '', '', '', '2013-07-15 22:27:12', 0, 69),
(13, 40, 50, 'Faixa 3', 'Essa é a faixa 3', '#', 'Saiba mais', '', '2013-07-15 22:27:12', 0, 69),
(14, 30, 40, 'Expert', 'Você é expert em tapete vermelho e nenhum pretinho básico escapa ao seu olhar de lince. Parabéns!', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/imayyges.jpg', '2013-07-16 15:19:01', 0, 70),
(15, 20, 20, 'Você pode ir melhor', 'Nem só de Angelina Jolie é feito o tapete vermelho. Você sabe o básico, mas precisa ler mais o site do GNT!', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/images.jpg', '2013-07-16 15:19:02', 0, 70),
(16, 0, 10, 'Xiiii.....', 'O seu tapete vermelho desbotou! Grude no site do GNT nos próximos eventos de gala!', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/teste-padrão-sem-emenda-com-joaninha-coloridas-21523849.jpg', '2013-07-16 14:56:05', 0, 70),
(17, 0, 30, 'Faixa 1', 'Faixa 1 essa pe a faixa 1', '', '', '', '2013-07-16 23:14:04', 0, 71),
(18, 40, 60, 'Faixa 2', 'essa é a faixa 2', '', '', '', '2013-07-16 23:14:04', 0, 71),
(19, 60, 80, 'Faixa 3', 'Essa é a faixa 3', '', '', '', '2013-07-16 23:14:04', 0, 71),
(20, 30, 70, 'parabéns, vc é muito inteligente!', 'você sabe tudo, continue assim', '#', 'link', '../../assets/server/php/files/imayyges.jpg', '2013-07-17 16:33:03', 0, 72),
(21, 0, 20, 'ih, precisa estudar mais!', 'Ainda não está por dentro, precisa se informar mais.', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/imauioges.jpg', '2013-07-17 16:33:03', 0, 72),
(22, 0, 10, 'Título', '', '', '', '', '2013-07-17 22:08:16', 0, 78),
(23, 0, 10, 'Título', '', '', '', '', '2013-07-17 22:08:17', 0, 78),
(24, 0, 10, 'Título', '', '', '', '', '2013-07-17 22:08:17', 0, 78),
(25, 0, 10, 'Título', '', 'http://www.google.com.br', 'clica!!!', '', '2013-07-18 16:32:19', 0, 79),
(26, 0, 10, 'Título', '', '', '', '', '2013-07-17 22:19:01', 0, 79),
(27, 0, 10, 'Título', '', 'http://', '', '', '2013-07-18 14:29:33', 0, 72),
(28, 0, 10, 'Título', '', 'http://', '', '', '2013-07-19 14:05:19', 0, 77),
(29, 0, 10, 'Título', '', 'http://', '', '', '2013-07-19 14:05:19', 0, 77);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` mediumtext,
  `descricao` mediumtext,
  `link_referencia` varchar(255) DEFAULT NULL,
  `texto_link` mediumtext,
  `imagem` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ordem` int(11) NOT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela que definimos perfis de quiz do tipo perfil' AUTO_INCREMENT=98 ;

--
-- Fazendo dump de dados para tabela `perfil`
--

INSERT INTO `perfil` (`id`, `titulo`, `descricao`, `link_referencia`, `texto_link`, `imagem`, `data`, `ordem`, `id_quiz`) VALUES
(63, 'Acho que falta pouco, hein! (maioria das respostas B)', 'Você ainda não esqueceu e, lá no fundo, ainda acha que é possível um recomeço com o ex. Mas, não quer contar com isso. Essa consciência fará com que você esteja pronta para um novo amor logo, logo. É só manter essa linha de raciocínio.', '', '', '../../assets/server/php/files/zoom-todas-as-nossas-acoes-deveriam-ser-guiadas-pelo-amor-2.jpg', '2013-07-10 21:23:53', 0, 55),
(64, 'Você ainda não está pronta para outra (maioria das respostas A)', 'Pelo visto, você está de luto pelo fim do relacionamento. E, provavelmente, vislumbrando vocês dois juntos, de novo. Não vai adiantar forçar a barra, você ainda não está pronta para outra. Mas, se o fim é definitivo - especialmente, se para ele é definitivo -, não se deixe enganar por muito tempo.\n', '', '', '../../assets/server/php/files/wesss.jpg', '2013-07-10 21:23:53', 0, 55),
(65, 'Você está pronta para outra (Maioria das respostas C)', 'Parece que o fim do relacionamento foi uma decisão bem pensada e acertada para você. Por algum ou alguns motivos, você não devia, mesmo, estar feliz ao lado dele. Você saiu do relacionamento tão decidida, que uma vida nova, sem ele, já estava nos seus planos.', '', '', '../../assets/server/php/files/rrrrr.jpg', '2013-07-10 21:23:53', 0, 55),
(66, 'Maneiro', 'É o cara sangue bom.', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-11 21:30:04', 0, 56),
(67, 'Marombeiro', 'Marombeiro é uma pessoa que pega no ferro', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-11 21:30:04', 0, 56),
(68, 'Marombeiro', 'Pega no ferro', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-11 21:31:04', 0, 57),
(69, 'Surfista', 'Senta na prancha longa', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-11 21:31:04', 0, 57),
(70, 'Você ainda não está pronta para outra (maioria das respostas A)', 'Pelo visto, você está de luto pelo fim do relacionamento. E, provavelmente, vislumbrando vocês dois juntos, de novo. Não vai adiantar forçar a barra, você ainda não está pronta para outra. Mas, se o fim é definitivo - especialmente, se para ele é definitivo -, não se deixe enganar por muito tempo.\nPelo visto, você está de luto pelo fim do relacionamento. E, provavelmente, vislumbrando vocês dois juntos, de novo. Não vai adiantar forçar a barra, você ainda não está pronta para outra. Mas, se o fim é definitivo - especialmente, se para ele é definitivo -, não se deixe enganar por muito tempo.\n', '', '', '../../assets/server/php/files/mensagem_de_amor_2.jpg', '2013-07-12 18:01:58', 0, 58),
(71, 'Acho que falta pouco, hein! (maioria da resposta B)', 'Você ainda não esqueceu e, lá no fundo, ainda acha que é possível um recomeço com o ex. Mas, não quer contar com isso. Essa consciência fará com que você esteja pronta para um novo amor logo, logo. É só manter essa linha de raciocínio.', '', '', '../../assets/server/php/files/amor-mc3basica.jpg', '2013-07-17 20:23:27', 0, 58),
(72, 'Você está pronta para outra (Maioria das respostas C)', 'Parece que o fim do relacionamento foi uma decisão bem pensada e acertada para você. Por algum ou alguns motivos, você não devia, mesmo, estar feliz ao lado dele. Você saiu do relacionamento tão decidida, que uma vida nova, sem ele, já estava nos seus planos.', '', '', '../../assets/server/php/files/wesss.jpg', '2013-07-12 17:43:07', 0, 58),
(73, 'Você ainda não está pronta para outra (maioria das respostas A)', 'hhhhhhhhhhhh jjjjjjjjjjjjj kkkkkkkkkkkkkkk', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-12 18:09:21', 0, 59),
(74, 'Você ainda não está pronta para outra (maioria das respostas A)', 'rrr hijor dpkj nlkrfcjb orjhdicbjn p3roçjnd potikfjns 3bw nm,', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-12 18:09:22', 0, 59),
(75, 'Você ainda não está pronta para outra (maioria das respostas A)', 'hfnkj o joijoijiorjej  jrrrrrrrrrrrrrrrrr kirrrrrrrr', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-12 18:09:22', 0, 59),
(79, 'Pelé foi o melhor jogador de futebol do século XX.', '\nTeste seu portugues\n', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-15 20:14:42', 0, 65),
(85, 'Você ainda não está pronta para outra (maioria das respostas A)', 'Pelo visto, você está de luto pelo fim do relacionamento. E, provavelmente, vislumbrando vocês dois juntos, de novo. Não vai adiantar forçar a barra, você ainda não está pronta para outra. Mas, se o fim é definitivo - especialmente, se para ele é definitivo -, não se deixe enganar por muito tempo.', 'http://www.globo.com', 'Saiba mais...', '../../assets/server/php/files/bg_iphone.jpg', '2013-07-18 19:10:44', 0, 80),
(86, 'Acho que falta pouco, hein! (maioria das respostas B)', 'Você ainda não esqueceu e, lá no fundo, ainda acha que é possível um recomeço com o ex. Mas, não quer contar com isso. Essa consciência fará com que você esteja pronta para um novo amor logo, logo. É só manter essa linha de raciocínio.\n', 'http://', '', '../../assets/server/php/files/imauioges.jpg', '2013-07-18 19:14:10', 0, 80),
(87, 'Você está pronta para outra (Maioria das respostas C)', 'Parece que o fim do relacionamento foi uma decisão bem pensada e acertada para você. Por algum ou alguns motivos, você não devia, mesmo, estar feliz ao lado dele. Você saiu do relacionamento tão decidida, que uma vida nova, sem ele, já estava nos seus planos.', 'http://', '', '../../assets/server/php/files/imayyges.jpg', '2013-07-18 19:28:17', 0, 80),
(91, 'Perfil 1', 'perfil 1', 'http://', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-18 21:23:11', 0, 76),
(92, 'Perfil 2', 'perfil 2', 'http://', '', '../../assets/img/backgrounds/imagem.png', '2013-07-18 21:23:11', 0, 76),
(93, 'Perfil 3', 'perfil 3', 'http://', '', '../../assets/img/backgrounds/imagem.png', '2013-07-18 21:23:11', 0, 76),
(94, 'Você encontrou sua alma gêmea?', '', 'http://', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-19 13:59:58', 0, 81),
(95, 'Você encontrou sua alma gêmea!', 'Há quem diga que temos mais de uma espalhadas por esse mundão. E que algumas nunca descobriremos quem são. Mas essa você encontrou! E a chance do relacionamento ser duradouro e, melhor ainda, ser muito bom enquanto durar, é grande. Ele compreende você, apoia suas decisões, confia na relação, é companheiro/a e você têm muita intimidade. O pior que poderia acontecer a vocês seria descobrirem que não são bons como um casal, mas são os melhores amigos que poderiam ter, um para o outro.', 'http://', '', '../../assets/img/backgrounds/imagem.png', '2013-07-19 14:02:41', 0, 81),
(96, 'Não é sua alma gêmea, mas pode ser sua cara metade.', 'Digamos que cara metade é um pouquinho menos do que alma gêmea. É isso. Mas, veja bem, o fato de existirem almas gêmeas não significa, mesmo, que você só será feliz se encontrar, ao menos uma! Não, não e não! Especialmente, em relações amorosas. Não se prenda a esse conceito que, convenhamos, é mesmo rigoroso. Vocês têm muita coisa em comum, com algumas arestas a serem aparadas.', 'http://', '', '../../assets/img/backgrounds/imagem.png', '2013-07-19 14:02:42', 0, 81),
(97, 'Definitivamente, ele não é sua alma gêmea.', 'Calma. Isso não quer dizer que vocês não vão dar certo. O problema é que vocês vão esbarrar com tantas diferenças que podem cansar. Está faltando mais companheirismo, confiança, intimidade e afinidades entre os dois. São essas as principais características da nossa alma gêmea. Mas se vocês estão juntos, lógico que tem um pouco de cada uma dessas coisas, certo?', 'http://', '', '../../assets/img/backgrounds/imagem.png', '2013-07-19 14:02:43', 0, 81);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE IF NOT EXISTS `perguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text,
  `link_referencia` varchar(255) DEFAULT NULL,
  `texto_link` mediumtext,
  `imagem` varchar(255) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ordem` int(11) NOT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de perguntas de cada Quiz' AUTO_INCREMENT=127 ;

--
-- Fazendo dump de dados para tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`, `link_referencia`, `texto_link`, `imagem`, `data`, `ordem`, `id_quiz`) VALUES
(68, 'Quando lembra do ex, você:', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-10 21:27:57', 1, 55),
(69, 'O seu namoro acabou. Você:', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-10 21:27:57', 0, 55),
(70, 'Você encontrou o ex com outra, pela primeira vez. Qual foi a reação?', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-10 21:27:57', 2, 55),
(71, 'Pergunta 2', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-11 21:36:43', 1, 56),
(72, 'Pergunta 1', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-11 21:36:43', 0, 56),
(73, '1) O seu namoro acabou. Você:', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-12 17:55:22', 0, 58),
(74, '2) Quando lembra do ex, você:', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-12 17:55:24', 1, 58),
(75, '3) Você encontrou o ex com outra, pela primeira vez. Qual foi a reação?', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-12 17:55:26', 2, 58),
(76, 'Você ainda não está pronta para outra (maioria das respostas A)', 'http://', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-19 14:02:59', 0, 59),
(77, 'Você ainda não está pronta para outra (maioria das respostas A)', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-12 18:11:36', 1, 59),
(78, 'Você ainda não está pronta para outra (maioria das respostas A)', '', '', '../../assets/img/backgrounds/imagem.png', '2013-07-12 18:11:38', 2, 59),
(80, 'qual a cor do céu?', '', '', '../../assets/server/php/files/images.jpg', '2013-07-15 14:35:21', 0, 64),
(81, 'qual a cor da nuvem?', '', '', '../../assets/server/php/files/imkkages.jpg', '2013-07-15 14:35:23', 1, 64),
(85, 'qual a cor do sol?', '', '', '../../assets/server/php/files/sol2.jpg', '2013-07-15 15:10:01', 3, 64),
(86, 'Pelé foi o melhor jogador de futebol do século XX', '', '01', '../../assets/server/php/files/Tulips.jpg', '2013-07-15 20:20:38', 0, 65),
(87, 'qual a cor do sol?', '', '', '../../assets/server/php/files/sol2.jpg', '2013-07-15 18:04:56', 0, 67),
(88, 'qual a cor do mar?', '', '', '../../assets/server/php/files/images.jpg', '2013-07-15 18:04:57', 1, 67),
(89, 'qual a cor da terra?', '', '', '../../assets/server/php/files/amor-mc3basica.jpg', '2013-07-15 18:04:59', 2, 67),
(90, 'qual o formato de uma bola?', '', '', '../../assets/server/php/files/mi_amor_by_sundropstonight.jpg', '2013-07-15 18:05:01', 3, 67),
(94, 'Ela sempre resolve os problemas com bastante', '', '02', '../../assets/img/backgrounds/imagem.png', '2013-07-15 20:20:39', 1, 65),
(95, 'Camila falou que queria ......... exemplos, ......... não falou quantos.', '', '03', '../../assets/img/backgrounds/imagem.png', '2013-07-15 20:22:23', 2, 65),
(96, 'O empregado aspirava ......... cargo de gerente', '', '04', '../../assets/img/backgrounds/imagem.png', '2013-07-15 20:22:24', 3, 65),
(97, 'Vou ao mercado comprar algo pra ......... beber.', '', '05', '../../assets/img/backgrounds/imagem.png', '2013-07-15 20:22:26', 4, 65),
(98, 'Qual é o significado de ', '', '06', '../../assets/img/backgrounds/imagem.png', '2013-07-15 20:22:28', 5, 65),
(99, 'Pergunta 1', '#', 'saiba mais', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-15 22:25:49', 0, 69),
(100, 'Pergunta 2', '#', 'veja mais', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-15 22:25:50', 1, 69),
(101, 'Pergunta 3', '#', 'link', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-15 22:25:51', 2, 69),
(102, 'Pergunta 4', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-15 22:25:53', 3, 69),
(103, 'Qual famosa apostou neste look espalhafatoso para o baile do MET deste ano?', '', '', '../../assets/server/php/files/bg_iphone.jpg', '2013-07-16 14:53:02', 0, 70),
(104, 'Que modelo foi ao baile do MET de 2011 com este longo deslumbrante?', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-16 14:53:08', 1, 70),
(105, 'O vestido branco com capa foi o look mais comentado do Oscar de 2012. Quem o vestiu?', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-16 14:53:12', 2, 70),
(106, 'Qual top brasileira escolheu este look masculino para um evento da amfAR neste ano?', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-16 14:53:14', 3, 70),
(107, 'Pergunta 1 RC', '', '', '../../assets/server/php/files/Captura de tela de 2013-04-24 17:42:44.png', '2013-07-16 23:09:41', 0, 71),
(108, 'Pergunta 2 RC', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/Seleção_009.png', '2013-07-16 23:09:44', 1, 71),
(109, 'Pergunta 3 RC', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/Seleção_018.png', '2013-07-16 23:09:47', 2, 71),
(110, 'quais são as cores primárias?', 'http://www.globo.com', 'clique e descubra mais', '../../assets/server/php/files/teste-padrão-sem-emenda-com-joaninha-coloridas-21523849.jpg', '2013-07-17 15:38:22', 0, 72),
(111, 'Quais são os dias fazem parte do fim de semana?', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/images.jpg', '2013-07-17 14:26:36', 1, 72),
(112, 'Quais fazem parte dos sete pecados capitais?', '', '', 'http://gntquizgen.tk/homolog/assets/server/php/files/bg_iphone.jpg', '2013-07-17 14:26:39', 2, 72),
(116, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 21:38:30', 0, 77),
(117, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 21:38:34', 1, 77),
(118, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 21:38:37', 2, 77),
(119, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 21:38:38', 1, 77),
(120, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 22:17:38', 0, 78),
(121, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 22:17:40', 1, 78),
(122, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 22:24:17', 0, 79),
(123, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 22:24:20', 1, 79),
(124, 'Título', '', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-17 22:24:22', 2, 79),
(127, '1) O seu namoro acabou. Você:', 'http://', '', 'http://gntquizgen.tk/homolog/assets/img/backgrounds/imagem.png', '2013-07-18 19:13:15', 0, 80);

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `tipo` varchar(36) DEFAULT NULL,
  `data_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_criacao` date NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de Quizes' AUTO_INCREMENT=82 ;

--
-- Fazendo dump de dados para tabela `quiz`
--

INSERT INTO `quiz` (`id`, `titulo`, `tipo`, `data_alteracao`, `data_criacao`, `id_usuario`) VALUES
(55, 'Você está pronta para um novo amor? - chrome', 'perfil', '2013-07-10 21:22:29', '2013-07-10', 2),
(56, 'Quiz Felipe', 'perfil', '2013-07-11 21:27:44', '2013-07-11', 3),
(57, 'O que você acha do Felipe?', 'perfil', '2013-07-11 21:28:01', '2013-07-11', 3),
(58, 'Você está pronta para um novo amor? TESTE DANI', 'perfil', '2013-07-17 20:56:32', '2013-07-12', 1),
(59, 'TESTANDO : )', 'perfil', '2013-07-19 14:03:15', '2013-07-12', 3),
(64, 'Primeiro teste - certo e errado', 'certo-ou-errado', '2013-07-15 18:18:23', '2013-07-15', 1),
(65, 'Teste Erica', 'perfil', '2013-07-15 20:43:58', '2013-07-15', 2),
(67, 'Quiz Danizinha', 'certo-ou-errado', '2013-07-17 16:15:24', '2013-07-15', 2),
(69, 'Quiz do tipo Apenas Uma', 'apenas_uma', '2013-07-15 22:32:08', '2013-07-15', 1),
(70, 'Dani testando', 'apenas_uma', '2013-07-16 23:06:41', '2013-07-16', 1),
(71, 'Varias perguntas corretas', 'resposta_certa', '2013-07-19 05:25:08', '2013-07-16', 1),
(72, 'Dani várias', 'resposta_certa', '2013-07-18 14:35:45', '2013-07-17', 1),
(73, 'bla laaa', 'perfil', '2013-07-17 15:42:19', '2013-07-17', 2),
(74, 'bla laaa', 'perfil', '2013-07-17 15:43:37', '2013-07-17', 2),
(76, 'ddddddddddddd', 'perfil', '2013-07-18 21:23:18', '2013-07-17', 1),
(77, 'Teste', 'certo-ou-errado', '2013-07-19 14:07:07', '2013-07-17', 3),
(78, 'Teste', 'resposta_certa', '2013-07-19 14:04:50', '2013-07-17', 3),
(79, 'Teste', 'apenas_uma', '2013-07-19 14:04:35', '2013-07-17', 3),
(80, 'dani quiz', 'perfil', '2013-07-19 14:05:22', '2013-07-18', 2),
(81, 'Você encontrou sua alma gêmea?', 'perfil', '2013-07-19 14:36:38', '2013-07-19', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas`
--

CREATE TABLE IF NOT EXISTS `respostas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` mediumtext,
  `tipo_resposta` varchar(36) DEFAULT NULL,
  `perfil_resposta` int(11) DEFAULT NULL,
  `id_pergunta` int(11) DEFAULT NULL,
  `id_quiz` int(11) DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_quiz` (`id_quiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de respostas de cada pergunta' AUTO_INCREMENT=250 ;

--
-- Fazendo dump de dados para tabela `respostas`
--

INSERT INTO `respostas` (`id`, `resposta`, `tipo_resposta`, `perfil_resposta`, `id_pergunta`, `id_quiz`, `ordem`, `data`) VALUES
(91, 'Ouve aquele música para lembrar mais ainda', 'perfil', 64, 68, 55, 0, '2013-07-10 21:27:58'),
(92, 'Pensa que tomou a decisão certa', 'perfil', 65, 68, 55, 2, '2013-07-10 21:27:58'),
(93, 'Está se acostumando com a ideia', 'perfil', 63, 69, 55, 1, '2013-07-10 21:27:58'),
(94, 'Ainda sonha com os beijos dele', 'perfil', 64, 69, 55, 0, '2013-07-10 21:27:58'),
(95, 'Acredita que pode ser amiga do ex', 'perfil', 65, 69, 55, 2, '2013-07-10 21:27:58'),
(96, 'Foge da lembrança', 'perfil', 63, 68, 55, 1, '2013-07-10 21:27:58'),
(97, 'Sair daquele lugar, imediatamente', 'perfil', 63, 70, 55, 0, '2013-07-10 21:27:58'),
(98, 'Tentou não esbarrar, ao menos', 'perfil', 63, 70, 55, 1, '2013-07-10 21:27:58'),
(99, 'Cumprimentou e esqueceu que estavam ali', 'perfil', 63, 70, 55, 2, '2013-07-10 21:27:58'),
(100, 'Resposta 2-1', 'perfil', 67, 71, 56, 0, '2013-07-11 21:36:43'),
(101, 'Resposta 2-2', 'perfil', 66, 71, 56, 1, '2013-07-11 21:36:43'),
(102, 'Resposta 1-2', 'perfil', 67, 72, 56, 1, '2013-07-11 21:36:43'),
(103, 'Resposta 1-1', 'perfil', 66, 72, 56, 0, '2013-07-11 21:36:44'),
(104, 'Ainda sonha com os beijos dele', 'perfil', 70, 73, 58, 0, '2013-07-12 17:55:23'),
(105, 'Está se acostumando com a ideia', 'perfil', 71, 73, 58, 1, '2013-07-12 17:55:23'),
(106, 'Acredita que pode ser amiga do ex', 'perfil', 72, 73, 58, 2, '2013-07-12 17:55:23'),
(107, 'Ouve aquele música para lembrar mais ainda', 'perfil', 70, 74, 58, 0, '2013-07-12 17:55:24'),
(108, 'Foge da lembrança', 'perfil', 71, 74, 58, 1, '2013-07-12 17:55:25'),
(109, 'Pensa que tomou a decisão certa', 'perfil', 72, 74, 58, 2, '2013-07-12 17:55:25'),
(110, 'Sair daquele lugar, imediatamente', 'perfil', 70, 75, 58, 0, '2013-07-12 17:55:26'),
(111, ' Tentou não esbarrar, ao menos', 'perfil', 70, 75, 58, 1, '2013-07-12 17:55:26'),
(112, 'Cumprimentou e esqueceu que estavam ali', 'perfil', 70, 75, 58, 2, '2013-07-12 17:55:27'),
(113, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 73, 76, 59, 0, '2013-07-12 18:11:34'),
(114, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 75, 76, 59, 1, '2013-07-12 18:11:35'),
(115, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 74, 76, 59, 2, '2013-07-12 18:11:35'),
(116, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 73, 77, 59, 0, '2013-07-12 18:11:36'),
(117, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 73, 77, 59, 1, '2013-07-12 18:11:37'),
(118, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 73, 77, 59, 2, '2013-07-12 18:11:38'),
(119, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 73, 78, 59, 0, '2013-07-12 18:11:38'),
(120, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 73, 78, 59, 1, '2013-07-12 18:11:39'),
(121, 'Você ainda não está pronta para outra (maioria das respostas A)', 'perfil', 73, 78, 59, 2, '2013-07-12 18:11:39'),
(123, 'azul', 'certo-ou-err', 10, 80, 64, 0, '2013-07-15 14:35:22'),
(124, 'verde', 'certo-ou-err', 0, 80, 64, 1, '2013-07-15 14:35:22'),
(125, 'rosa', 'certo-ou-err', 0, 81, 64, 0, '2013-07-15 14:35:23'),
(127, 'branca', 'certo-ou-err', 10, 81, 64, 1, '2013-07-15 14:35:23'),
(128, 'amarelo', 'certo-ou-errado', 10, 85, 64, 0, '2013-07-15 15:10:02'),
(129, 'vermelho', 'certo-ou-errado', 0, 85, 64, 1, '2013-07-15 15:10:02'),
(133, 'rosa', 'certo-ou-errado', 0, 87, 67, 0, '2013-07-15 18:04:56'),
(134, 'amarelo', 'certo-ou-errado', 10, 87, 67, 1, '2013-07-15 18:04:57'),
(135, 'roxo', 'certo-ou-errado', 0, 88, 67, 0, '2013-07-15 18:04:58'),
(136, 'azul', 'certo-ou-errado', 10, 88, 67, 1, '2013-07-15 18:04:58'),
(137, 'marrom', 'certo-ou-errado', 10, 89, 67, 0, '2013-07-15 18:05:00'),
(138, 'azul', 'certo-ou-errado', 0, 89, 67, 1, '2013-07-15 18:05:00'),
(139, 'redonda', 'certo-ou-errado', 10, 90, 67, 0, '2013-07-15 18:05:18'),
(140, 'quadrada', 'certo-ou-errado', 0, 90, 67, 1, '2013-07-15 18:05:03'),
(150, 'Concerteza     ', 'perfil', 79, 86, 65, 0, '2013-07-15 20:22:10'),
(151, 'Comcerteza ', 'perfil', 79, 86, 65, 1, '2013-07-15 20:22:11'),
(152, 'Com certeza', 'perfil', 79, 86, 65, 2, '2013-07-15 20:22:11'),
(153, 'Discrição', 'perfil', 79, 94, 65, 0, '2013-07-15 20:22:15'),
(154, 'Descrição', 'perfil', 79, 94, 65, 1, '2013-07-15 20:22:16'),
(155, 'Todas as anteriores', 'perfil', 79, 94, 65, 2, '2013-07-15 20:22:16'),
(156, 'Más / mais   ', 'perfil', 79, 95, 65, 0, '2013-07-15 20:22:21'),
(157, 'Mais / mais ', 'perfil', 79, 95, 65, 1, '2013-07-15 20:22:21'),
(158, ' Mais / más ', 'perfil', 79, 95, 65, 2, '2013-07-15 20:22:22'),
(159, 'Mais / mas', 'perfil', 79, 95, 65, 3, '2013-07-15 20:22:22'),
(160, 'O', 'perfil', 79, 96, 65, 0, '2013-07-15 20:22:23'),
(161, 'Ao', 'perfil', 79, 96, 65, 1, '2013-07-15 20:22:23'),
(162, 'Todas as anteriores', 'perfil', 79, 96, 65, 2, '2013-07-15 20:22:24'),
(163, 'Mim', 'perfil', 79, 97, 65, 0, '2013-07-15 20:22:25'),
(164, 'Eu', 'perfil', 79, 97, 65, 1, '2013-07-15 20:22:25'),
(165, 'Todas as anteriores', 'perfil', 79, 97, 65, 2, '2013-07-15 20:22:25'),
(166, 'Grande', 'perfil', 79, 98, 65, 0, '2013-07-15 20:22:26'),
(167, 'Desnecessário', 'perfil', 79, 98, 65, 1, '2013-07-15 20:22:27'),
(168, 'Lucro', 'perfil', 79, 98, 65, 2, '2013-07-15 20:22:27'),
(169, 'Poderoso', 'perfil', 79, 98, 65, 3, '2013-07-15 20:22:28'),
(170, 'R1P1', 'apenas_uma', 10, 99, 69, 0, '2013-07-15 22:25:49'),
(171, 'R2P1', 'apenas_uma', 0, 99, 69, 1, '2013-07-15 22:25:49'),
(172, 'R3P1', 'apenas_uma', 0, 99, 69, 2, '2013-07-15 22:25:50'),
(173, 'R4P1', 'apenas_uma', 0, 99, 69, 3, '2013-07-15 22:25:50'),
(174, 'R1P2', 'apenas_uma', 0, 100, 69, 0, '2013-07-15 22:25:50'),
(175, 'R2P2', 'apenas_uma', 0, 100, 69, 1, '2013-07-15 22:25:51'),
(176, 'R3P2', 'apenas_uma', 10, 100, 69, 2, '2013-07-15 22:25:51'),
(177, 'R4P2', 'apenas_uma', 0, 100, 69, 3, '2013-07-15 22:25:51'),
(178, 'R1P3', 'apenas_uma', 10, 101, 69, 0, '2013-07-15 22:25:52'),
(179, 'R2P3', 'apenas_uma', 0, 101, 69, 1, '2013-07-15 22:25:52'),
(180, 'R4P3', 'apenas_uma', 0, 101, 69, 2, '2013-07-15 22:25:52'),
(181, 'R3P3', 'apenas_uma', 0, 101, 69, 3, '2013-07-15 22:25:52'),
(182, 'R1P4', 'apenas_uma', 10, 102, 69, 0, '2013-07-15 22:25:53'),
(183, 'R2P4', 'apenas_uma', 0, 102, 69, 1, '2013-07-15 22:25:53'),
(184, 'R3P4', 'apenas_uma', 0, 102, 69, 2, '2013-07-15 22:25:53'),
(185, 'R4P4', 'apenas_uma', 0, 102, 69, 3, '2013-07-15 22:25:54'),
(186, '1) Kim Kardashian', 'apenas_uma', 0, 103, 70, 0, '2013-07-16 14:53:02'),
(187, '2) Beyoncé (CORRETA)', 'apenas_uma', 10, 103, 70, 1, '2013-07-16 14:53:03'),
(188, '3) Jennifer Hudson', 'apenas_uma', 0, 103, 70, 2, '2013-07-16 14:53:07'),
(189, '1) Gisele Bündchen (CORRETA)', 'apenas_uma', 10, 104, 70, 0, '2013-07-16 14:53:08'),
(190, '2) Carol Trentini', 'apenas_uma', 0, 104, 70, 1, '2013-07-16 14:53:09'),
(191, '3) Claudia Schiffer', 'apenas_uma', 0, 104, 70, 2, '2013-07-16 14:53:10'),
(192, '1) Angelina Jolie', 'apenas_uma', 0, 105, 70, 0, '2013-07-16 14:53:12'),
(193, '2) Heidi Klum', 'apenas_uma', 0, 105, 70, 1, '2013-07-16 15:12:28'),
(194, ' 3) Gwyneth Paltrow (CORRETA)', 'apenas_uma', 10, 105, 70, 2, '2013-07-16 15:12:29'),
(195, '1) Ana Beatriz Barros', 'apenas_uma', 0, 106, 70, 0, '2013-07-16 14:53:14'),
(196, '2) Izabel Goulart (CORRETA)', 'apenas_uma', 10, 106, 70, 1, '2013-07-16 15:12:37'),
(197, '3) Adriana Lima', 'apenas_uma', 0, 106, 70, 2, '2013-07-16 15:12:39'),
(198, 'R1P1', 'resposta_certa', 0, 107, 71, 0, '2013-07-16 23:09:42'),
(199, 'R2P1', 'resposta_certa', 10, 107, 71, 1, '2013-07-16 23:09:43'),
(200, 'R3P1', 'resposta_certa', 10, 107, 71, 2, '2013-07-16 23:09:43'),
(201, 'R2P1', 'resposta_certa', 0, 107, 71, 3, '2013-07-16 23:09:44'),
(202, 'R1P2', 'resposta_certa', 10, 108, 71, 0, '2013-07-16 23:09:46'),
(203, 'R2P2', 'resposta_certa', 0, 108, 71, 1, '2013-07-16 23:09:46'),
(204, 'R3P2', 'resposta_certa', 0, 108, 71, 2, '2013-07-16 23:09:46'),
(205, 'R4P2', 'resposta_certa', 10, 108, 71, 3, '2013-07-16 23:09:47'),
(206, 'R1P3', 'resposta_certa', 10, 109, 71, 0, '2013-07-16 23:09:48'),
(207, 'R2P3', 'resposta_certa', 10, 109, 71, 1, '2013-07-16 23:09:48'),
(208, 'R3P3', 'resposta_certa', 0, 109, 71, 2, '2013-07-16 23:09:48'),
(209, 'R4P3', 'resposta_certa', 0, 109, 71, 3, '2013-07-16 23:09:49'),
(210, 'azul', 'resposta_certa', 10, 110, 72, 0, '2013-07-17 16:30:33'),
(211, 'amarelo', 'resposta_certa', 10, 110, 72, 1, '2013-07-17 16:30:34'),
(212, 'vermelho', 'resposta_certa', 10, 110, 72, 2, '2013-07-17 16:31:52'),
(213, 'verde', 'resposta_certa', 0, 110, 72, 3, '2013-07-17 14:26:35'),
(214, 'rosa', 'resposta_certa', 0, 110, 72, 4, '2013-07-17 14:26:35'),
(215, 'segunda', 'resposta_certa', 0, 111, 72, 0, '2013-07-17 14:26:36'),
(216, 'terça', 'resposta_certa', 0, 111, 72, 1, '2013-07-17 14:26:37'),
(217, 'sábado', 'resposta_certa', 10, 111, 72, 2, '2013-07-17 14:26:37'),
(218, 'domingo', 'resposta_certa', 10, 111, 72, 3, '2013-07-17 14:26:38'),
(219, 'sexta', 'resposta_certa', 0, 111, 72, 4, '2013-07-17 14:26:39'),
(220, 'gula', 'resposta_certa', 10, 112, 72, 0, '2013-07-17 14:26:40'),
(221, 'ira', 'resposta_certa', 10, 112, 72, 1, '2013-07-17 14:26:40'),
(222, 'sorte', 'resposta_certa', 0, 112, 72, 2, '2013-07-17 14:26:41'),
(223, 'azar', 'resposta_certa', 0, 112, 72, 3, '2013-07-17 14:26:42'),
(224, 'cura', 'resposta_certa', 0, 112, 72, 4, '2013-07-17 14:26:42'),
(228, '', 'certo-ou-errado', 0, 116, 77, 0, '2013-07-17 21:38:31'),
(229, '', 'certo-ou-errado', 0, 116, 77, 1, '2013-07-17 21:38:31'),
(230, '', 'certo-ou-errado', 0, 117, 77, 0, '2013-07-17 21:38:35'),
(231, '', 'certo-ou-errado', 0, 117, 77, 1, '2013-07-17 21:38:35'),
(232, '', 'certo-ou-errado', 0, 118, 77, 0, '2013-07-17 21:38:37'),
(233, '', 'certo-ou-errado', 0, 118, 77, 1, '2013-07-17 21:38:38'),
(234, '', 'certo-ou-errado', 0, 119, 77, 0, '2013-07-17 21:38:39'),
(235, '', 'certo-ou-errado', 0, 119, 77, 1, '2013-07-17 21:38:39'),
(236, '', 'resposta_certa', 0, 120, 78, 0, '2013-07-17 22:17:38'),
(237, '', 'resposta_certa', 1, 120, 78, 1, '2013-07-17 22:17:39'),
(238, '', 'resposta_certa', 0, 121, 78, 0, '2013-07-17 22:17:41'),
(239, '', 'apenas_uma', 0, 122, 79, 0, '2013-07-17 22:24:18'),
(240, '', 'apenas_uma', 1, 122, 79, 1, '2013-07-17 22:24:18'),
(241, '', 'apenas_uma', 0, 123, 79, 0, '2013-07-17 22:24:21'),
(242, '', 'apenas_uma', 0, 124, 79, 0, '2013-07-17 22:24:23'),
(246, 'a) Ainda sonha com os beijos dele', 'perfil', 85, 127, 80, 0, '2013-07-18 19:13:13'),
(247, 'b) Está se acostumando com a ideia', 'perfil', 86, 127, 80, 1, '2013-07-18 19:40:49'),
(248, 'c) Acredita que pode ser amiga do ex', 'perfil', 87, 127, 80, 2, '2013-07-18 19:40:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `recoverkey` varchar(32) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de usu⳩os' AUTO_INCREMENT=8 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `recoverkey`, `data`) VALUES
(1, 'Wesley', 'wesley@skidun.com.br', '7940ab47468396569a906f75ff3f20ef', '59bf588625f2810dbb1bece88733a76f', NULL),
(2, 'Daniele Sanches', 'danielle@skidun.com.br', 'e10adc3949ba59abbe56e057f20f883e', '98ec61ffc65ba942db4480d1bef5799c', '2013-07-08 04:25:02'),
(3, 'Homologação', 'homolog@skidun.com.br', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-07-08 04:25:30'),
(6, 'Teste', 'teste@skidun.com.br', '14e1b600b1fd579f47433b88e8d85291', NULL, '2013-07-16 16:45:37'),
(7, 'Tiago Fernandes', 'tiago@skidun.com.br', 'e75d328c8d6f3f4eacacdb44aa69799a', NULL, '2013-07-17 14:39:09');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD CONSTRAINT `configuracoes_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `configuracoes_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `configuracoes_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);

--
-- Restrições para tabelas `faixa`
--
ALTER TABLE `faixa`
  ADD CONSTRAINT `faixa_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faixa_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `faixa_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);

--
-- Restrições para tabelas `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `perguntas_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `quiz_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_3` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
