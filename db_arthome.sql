-- phpMyAdmin SQL Dump
-- version 2.11.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Gera��o: Abr 08, 2009 as 02:16 PM
-- Vers�o do Servidor: 5.0.51
-- Vers�o do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `Arthome`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `adm_codigo` int(10) unsigned NOT NULL auto_increment,
  `adm_nome` varchar(255) NOT NULL,
  `adm_usuario` varchar(50) NOT NULL,
  `adm_senha` varchar(10) NOT NULL,
  `adm_email` varchar(255) NOT NULL, 
  `adm_status` varchar(2) NOT NULL,
  PRIMARY KEY  (`adm_codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`adm_codigo`, `adm_nome`, `adm_usuario`, `adm_senha`, `adm_email`,`adm_status`) VALUES
(1, 'Heitor Carvalho de Almeida Neto', 'neto', 'neto512', 'heitorh3@hotmail.com',1);

--
-- Estrutura da tabela `tbl_noticias`
--

CREATE TABLE `tbl_noticias` (
  `noticias_codigo` int(10) NOT NULL auto_increment,
  `noticias_data` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `noticia` varchar(1024) NOT NULL,
  PRIMARY KEY  (`noticias_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Cadastrando uma noticia na tabela `tbl_noticias`
--

INSERT INTO `tbl_noticias` (`noticias`) VALUES ('Venha conferir as novidades da nossa loja');

--
-- Estrutura da tabela `tbl_albums`
--

CREATE TABLE IF NOT EXISTS `tbl_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Estrutura da tabela `tbl_albums_photos`
--

CREATE TABLE IF NOT EXISTS `tbl_albums_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `caption` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


--
-- Estrutura da tabela `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(30) NOT NULL auto_increment,
  `foto` char(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

