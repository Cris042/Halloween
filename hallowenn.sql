-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Out-2019 às 18:36
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hallowenn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamada`
--

CREATE TABLE `chamada` (
  `id` int(11) NOT NULL,
  `cod_user` int(11) NOT NULL,
  `cod_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamada`
--

INSERT INTO `chamada` (`id`, `cod_user`, `cod_evento`) VALUES
(248, 110, 19),
(249, 110, 20),
(250, 100, 18),
(251, 100, 20),
(252, 100, 19),
(253, 101, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `cod_turma` varchar(40) NOT NULL,
  `cod_grupo` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` text NOT NULL,
  `vagas` int(11) NOT NULL,
  `data` date NOT NULL,
  `local` varchar(255) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `cod_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `cod_turma`, `cod_grupo`, `nome`, `descricao`, `vagas`, `data`, `local`, `horario`, `cod_autor`) VALUES
(18, '3° Ano', 'Dança', 'ola mundo 1', 'Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de amostras do tipo. Ele sobreviveu não apenas cinco séculos, mas também o salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.\n                ', 20, '2019-10-13', 'Laboratório da informatica', '12:00', 101),
(19, '3° Ano', 'Dança', 'ola mundo 2', 'Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de amostras do tipo. Ele sobreviveu não apenas cinco séculos, mas também o salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.\n                ', 20, '2019-10-13', 'Laboratório da matematica  ', '12:00', 101),
(20, '3° Ano', 'Dança', 'ola mundo 3', 'Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de amostras do tipo. Ele sobreviveu não apenas cinco séculos, mas também o salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.\n                ', 20, '2019-10-13', 'Laboratório da matematica  ', '11:00', 101),
(21, '3° Ano', 'Dança', 'ola mundo 4', '      Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de amostras do tipo. Ele sobreviveu não apenas cinco séculos, mas também o salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.\n                                                ', 20, '2019-10-13', 'Laboratório da matematica  ', '11:00', 101),
(22, '2° Ano', 'Dança', 'ola mundo 5', 'Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de amostras do tipo. Ele sobreviveu não apenas cinco séculos, mas também o salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.\n                ', 20, '2019-10-13', 'Laboratório da informatica', '12:00', 100),
(23, '2° Ano', 'Apresentaçao', 'ola mundo 6', 'Lorem Ipsum é simplesmente um texto fictício da indústria tipográfica e de impressão. Lorem Ipsum é o texto fictício padrão do setor desde os anos 1500, quando uma impressora desconhecida pegou uma galera do tipo e a mexeu para fazer um livro de amostras do tipo. Ele sobreviveu não apenas cinco séculos, mas também o salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento de folhas de Letraset contendo passagens de Lorem Ipsum e, mais recentemente, com software de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.\n                ', 20, '2019-10-13', 'Laboratório da informatica', '12:00', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Dança'),
(2, 'Apresentação ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`) VALUES
(1, '3 \'A\' info'),
(2, '3 \'B\' info');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `img` varchar(40) NOT NULL,
  `cod` int(11) NOT NULL,
  `turma` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `email`, `senha`, `img`, `cod`, `turma`) VALUES
(100, 'adm@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '5da35232ceb45.png', 2, NULL),
(101, 'user@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '5da352088d4bb.jpg', 1, NULL),
(110, 'user1@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '5da3525b4875e.png', 0, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamada`
--
ALTER TABLE `chamada`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamada`
--
ALTER TABLE `chamada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
