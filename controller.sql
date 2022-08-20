-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Ago-2022 às 21:36
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controller`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `filial`
--

CREATE TABLE `filial` (
  `id` int(5) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cell` varchar(15) NOT NULL,
  `fonegerencia` varchar(15) NOT NULL,
  `statusfilial` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filial`
--

INSERT INTO `filial` (`cod`, `nome`, `endereco`, `bairro`, `cep`, `cidade`, `uf`, `cell`, `fonegerancia`, `statusfilial`) VALUES
(72, 'Ipojuca', 'Av. Francisco Alves, 201', 'Centro', '0', '55590-000', 'PE', '(81) 355116', '(81) 355116', 'OK'),
(72, '-0', 'Av. Francisco Alves, 201', 'Centro', '55590', 'Ipojuca', 'PE', '(81) 355116', '(81) 355116', 'OK'),
(71, 'Ipojuca', 'Av. Francisco Alves, 201', 'Centro', '55590', 'Ipojuca', 'PE', '(81) 355116', '(81) 355116', 'OK');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_usuario` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha_usuario`) VALUES
(1, 'Cesar', 'cesar@celke.com.br', '$2y$10$h8ZgUrhzl9mOY3pjhBJNs.Mna5tmXAGsn35aitbvAwreVtHWHDE6u'),
(2, 'Miguel', 'miguel@gmail.com', '12345678'),
(3, 'Miguel', 'miguel@gmail.com', '$2y$10$h8ZgUrhzl9mOY3pjhBJNs.Mna5tmXAGsn35aitbvAwreVtHWHDE6u');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
