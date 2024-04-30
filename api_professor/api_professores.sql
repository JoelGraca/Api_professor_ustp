-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Abr-2024 às 16:30
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `api_professores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprofessores`
--

CREATE TABLE `tbprofessores` (
  `idProfessor` int(11) NOT NULL,
  `nomeProfessor` varchar(255) NOT NULL,
  `moradaProfessor` varchar(255) NOT NULL,
  `contatoProfessor` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `nivel_academico` varchar(150) NOT NULL,
  `curso` varchar(150) NOT NULL,
  `experiencia` text NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `anos_profissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbprofessores`
--

INSERT INTO `tbprofessores` (`idProfessor`, `nomeProfessor`, `moradaProfessor`, `contatoProfessor`, `genero`, `nivel_academico`, `curso`, `experiencia`, `categoria`, `anos_profissao`) VALUES
(1, 'Luykes Varela', 'Lemos', 9983272, 'Masculino', 'Licenciado em Engenharia Informática', 'Licenciatura em Engenharia Informática', 'Desenvolvedor de Software', 'Programador', 6),
(2, 'Ricardina Ceita', 'Riboque', 9945678, 'Feminino', 'Mestrada em Inovações Tecnologicas', 'Licenciatura em Inovações Tecnologicas', 'Criação de conteúdos e gestão economica empresarial.', 'Analista e gestora economica empresarial', 4),
(3, 'Vitoriano Pontes', 'Água Porca', 9963456, 'Masculino', 'Licenciado em Engenharia Informática', 'Licenciatura em Engenharia Informática', 'Gestão em infraestrutura de TIC', 'Analista de Sistema', 3),
(4, 'Nujoma Quaresma', 'Neves', 9932567, 'Masculino', 'Mestrado em Engenharia Informática e Telecomunicações', 'Licenciatura em Engenharia Electrónica e Telecomunicação', 'Analista e gestor de Redes ', 'Administrador de Redes', 5),
(5, 'João Carlos Nascimento', 'Neves', 9978734, 'Masculino', 'Pós-doutorado em Educação Computacional', 'Educação Computacional', 'Gestão de projetos, banco de dados e investigação cientifica', 'Investigador Cientifico', 20),
(6, 'Tânia Teixeira', 'Campo de Milho', 9978463, 'Feminino', 'Licenciada em gestão Informática', 'Licenciatura em gestão Informática', 'Gestão de equipamentos informáticos, banco de dados, redes de computadores e segurança', 'Gestora Informática', 5),
(7, 'Elton Lima', 'Guadalupe', 9925631, 'Masculino', 'Mestrado em Electrónica e telecomunicações', 'Licenciatura em Engenharia Electrónica e Telecomunicações', 'Desenvolvimento de software, análise de sistemas e padrões de projeto', 'Programador', 6),
(8, 'Ivando Ceita', 'Bairro Verde', 9973667, 'Masculino', 'Licenciado em Ciência da Computação', 'Licenciatura em Ciência da Computação', 'Desenvolvimento de sistemas web, análise e revisão de código fonte', 'Desenvolvedor de aplicações web', 6),
(9, 'Maria do Céu', 'Monte Café', 9924532, 'Feminino', 'Mestrada em Matemática ', 'Licenciatura em Matemática', 'Calculo de probabilidade, teste de hipótese, amostragem de uma população', 'Analista em gestão populacional', 4),
(10, 'Kalane Mendes', 'Santana', 9928863, 'Masculino', 'Licenciado em Eletrônica e Telecomunicações', 'Licenciatura em Eletrônica e Telecomunicações', 'Desenvolvimento de software, análise de circuitos e configurações de redes', 'Programador e gestor de rede', 3),
(11, 'Miguel Gomes', 'Desejada', 9983982, 'Masculino', 'Doutorado em direito', 'Licenciatura em Direito', 'Conhecimentos em leis, ética e cidadania.', 'Professor universitário', 9),
(12, 'Oldaberto Pereira', 'Praia Gamboa', 9932731, 'Masculino', 'Licenciado em Engenharia Informática', 'Licenciatura em Engenharia Informática', 'Desenvolvimento de software e gestão de projetos', 'Programador', 3),
(13, 'Jedson Carvalho', 'Riboque', 9937842, 'Masculino', 'Mestrado em Matemática', 'Licenciatura em Matemática', 'Análise em cálculos matemáticos', 'Professor Universitário', 8),
(14, 'Maurício Lana', 'Pantufu', 9907362, 'Masculino', 'Mestrado em Língua Portuguesa', 'Licenciatura em Língua Portuguesa', 'Técnicas de Expressão Oral e Escrita', 'Professor Universitário', 10),
(15, 'Saiton da Silva', 'Trindade', 9925417, 'Masculino', 'Licenciado em Engenharia Informática', 'Licenciatura em Engenharia Informática', 'Desenvolvimento de software', 'Programador', 5),
(16, 'Odinilson Gomes', 'Cruzeiro', 9935723, 'Masculino', 'Licenciado em Engenharia Informática', 'Licenciatura em Engenharia Informática', 'Licenciado em Engenharia Informática', 'Programador', 5),
(17, 'Denis Luiz', 'Batepá', 9938923, 'Masculino', 'Licenciado em Engenharia Informática', 'Licenciatura em Engenharia Informática', 'Desenvolvimento de software, análise e gestão de projetos', 'Programador ', 2),
(18, 'Peregrino Sousa', 'Santo Amaro', 9980989, 'Masculino', 'Mestrado em Matemática Aplicada', 'Licenciatura em Matemática', 'Análise de cálculos matemáticos e aritméticos', 'Professor Universitário', 12),
(19, 'Yacess da Conceição', 'Mesquita', 9930032, 'Masculino', 'Mestrado em Engenharia Informática Aplicada', 'Licenciatura em Engenharia Informática Aplicada', 'Desenvolvimento de software', 'Programador', 10),
(20, 'Paulo Fonseca', 'Melhorada', 9993445, 'Masculino', 'Licenciado em Análise de Sistemas', 'Licenciatura em Análise de Sistemas', 'Análise, configuração e manutenção de sistemas informáticos', 'Analista de Sistema', 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbprofessores`
--
ALTER TABLE `tbprofessores`
  ADD PRIMARY KEY (`idProfessor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbprofessores`
--
ALTER TABLE `tbprofessores`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
