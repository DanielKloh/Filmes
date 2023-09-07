-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/09/2023 às 23:38
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `filmes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `textoComentario` varchar(45) NOT NULL,
  `avaliacao` varchar(20) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idFilme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `comentario`
--

INSERT INTO `comentario` (`id`, `textoComentario`, `avaliacao`, `idUsuario`, `idFilme`) VALUES
(129, 'Comentário', 'OK', 4, 9),
(130, 'xkcjdkfjskd', 'Selecionar', 5, 43);

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `poster` varchar(200) NOT NULL,
  `descicao` varchar(300) NOT NULL,
  `ano` varchar(10) NOT NULL,
  `avaliacao` varchar(10) NOT NULL,
  `escritor` varchar(50) NOT NULL,
  `ator` varchar(70) NOT NULL,
  `idiomas` varchar(50) NOT NULL,
  `premios` varchar(100) NOT NULL,
  `dataLancamento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `filme`
--

INSERT INTO `filme` (`id`, `titulo`, `genero`, `poster`, `descicao`, `ano`, `avaliacao`, `escritor`, `ator`, `idiomas`, `premios`, `dataLancamento`) VALUES
(9, 'Spider Man: Lost Cause', 'Action, Adventure, Comedy', 'https://m.media-amazon.com/images/M/MV5BYmZkYWRlNWQtOGY0Zi00MWZkLWJiZTktNjRjMDY4MTU2YzAyXkEyXkFqcGdeQXVyMzYzNzc1NjY@._V1_SX300.jpg', 'Peter Parker a lone child discovers that his parents were in a horrifying plot to make mankind change. getting bitten by his fathers invention he develops super powers to tries to find answers to his whole life, try and juggle a r...', '2014', 'Selecionar', 'Steve Ditko, Stan Lee, Joey Lever', 'Joey Lever, Craig Ellis, Teravis Ward', 'English', 'N/A', '0000-00-00'),
(10, '', '', '', '', '', 'Selecionar', '', '', '', '', '0000-00-00'),
(11, 'Spider-Man 3', 'Action, Adventure, Sci-Fi', 'https://m.media-amazon.com/images/M/MV5BYTk3MDljOWQtNGI2My00OTEzLTlhYjQtOTQ4ODM2MzUwY2IwXkEyXkFqcGdeQXVyNTIzOTk5ODM@._V1_SX300.jpg', 'A strange black entity from another world bonds with Peter Parker and causes inner turmoil as he contends with new villains, temptations, and revenge.', '2007', 'OK', 'Sam Raimi, Ivan Raimi, Alvin Sargent', 'Tobey Maguire, Kirsten Dunst, Topher Grace', 'English, French', 'Nominated for 1 BAFTA Award4 wins & 44 nominations total', '0000-00-00'),
(12, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(13, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(14, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(15, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(16, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(17, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(18, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(19, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(20, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(21, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(22, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(23, 'C', 'Animation, Action, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTM5Njc5ZTYtYzk1OS00ZmIxLTlkOTAtZmE3MjBiNjQ4MWQyXkEyXkFqcGdeQXVyNjIyNDgwMzM@._V1_SX300.jpg', 'The Japanese government was rescued from the brink of financial collapse by the Sovereign Wealth Fund. For its citizens, however, life has not improved, and unemployment, crime, suicide, and despair are rampant. Kimimaro, raised b...', '2011–', 'OK', 'N/A', 'Todd Haberkorn, J. Michael Tatum, Monica Rial', 'Japanese', 'N/A', '0000-00-00'),
(24, 'Spider Man: Lost Cause', 'Action, Adventure, Comedy', 'https://m.media-amazon.com/images/M/MV5BYmZkYWRlNWQtOGY0Zi00MWZkLWJiZTktNjRjMDY4MTU2YzAyXkEyXkFqcGdeQXVyMzYzNzc1NjY@._V1_SX300.jpg', 'Peter Parker a lone child discovers that his parents were in a horrifying plot to make mankind change. getting bitten by his fathers invention he develops super powers to tries to find answers to his whole life, try and juggle a r...', '2014', 'Selecionar', 'Steve Ditko, Stan Lee, Joey Lever', 'Joey Lever, Craig Ellis, Teravis Ward', 'English', 'N/A', '0000-00-00'),
(25, 'Spider Man: Lost Cause', 'Action, Adventure, Comedy', 'https://m.media-amazon.com/images/M/MV5BYmZkYWRlNWQtOGY0Zi00MWZkLWJiZTktNjRjMDY4MTU2YzAyXkEyXkFqcGdeQXVyMzYzNzc1NjY@._V1_SX300.jpg', 'Peter Parker a lone child discovers that his parents were in a horrifying plot to make mankind change. getting bitten by his fathers invention he develops super powers to tries to find answers to his whole life, try and juggle a r...', '2014', 'OK', 'Steve Ditko, Stan Lee, Joey Lever', 'Joey Lever, Craig Ellis, Teravis Ward', 'English', 'N/A', '0000-00-00'),
(26, 'Star Wars: Episode IV - A New Hope', 'Action, Adventure, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_SX300.jpg', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire+s world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth ...', '1977', 'Selecionar', 'George Lucas', 'Mark Hamill, Harrison Ford, Carrie Fisher', 'English', 'Won 6 Oscars. 65 wins & 31 nominations total', '0000-00-00'),
(27, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(28, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(29, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(30, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(31, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(32, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(33, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(34, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(35, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Selecionar', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(36, 'Star Wars: Episode IV - A New Hope', 'Action, Adventure, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_SX300.jpg', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire+s world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth ...', '1977', 'Selecionar', 'George Lucas', 'Mark Hamill, Harrison Ford, Carrie Fisher', 'English', 'Won 6 Oscars. 65 wins & 31 nominations total', '0000-00-00'),
(37, 'Star Wars: Episode IV - A New Hope', 'Action, Adventure, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_SX300.jpg', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire+s world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth ...', '1977', 'Selecionar', 'George Lucas', 'Mark Hamill, Harrison Ford, Carrie Fisher', 'English', 'Won 6 Oscars. 65 wins & 31 nominations total', '0000-00-00'),
(38, 'Star Wars: Episode IV - A New Hope', 'Action, Adventure, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_SX300.jpg', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire+s world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth ...', '1977', 'Selecionar', 'George Lucas', 'Mark Hamill, Harrison Ford, Carrie Fisher', 'English', 'Won 6 Oscars. 65 wins & 31 nominations total', '0000-00-00'),
(39, 'Star Wars: Episode IV - A New Hope', 'Action, Adventure, Fantasy', 'https://m.media-amazon.com/images/M/MV5BOTA5NjhiOTAtZWM0ZC00MWNhLThiMzEtZDFkOTk2OTU1ZDJkXkEyXkFqcGdeQXVyMTA4NDI1NTQx._V1_SX300.jpg', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire+s world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth ...', '1977', 'Selecionar', 'George Lucas', 'Mark Hamill, Harrison Ford, Carrie Fisher', 'English', 'Won 6 Oscars. 65 wins & 31 nominations total', '0000-00-00'),
(40, 'B', 'Crime, Drama', 'https://m.media-amazon.com/images/M/MV5BZDhlZmRlNmMtYmMyYy00Zjg0LWI0ZmQtYzNiNWM5YTU4YTI3XkEyXkFqcGdeQXVyNjQ0NjY3MDY@._V1_SX300.jpg', 'July 15, 2013 Luis Barcenas - Old party treasurer was transferred from prison to National Court to testify. Previously, he had denied everything. Today he will tell the truth.', '2015', 'Muito Ruim', 'Jordi Casanovas, David Ilundain', 'Pedro Casablanc, Manolo Solo, Pedro Civera', 'Spanish', '8 wins & 9 nominations', '0000-00-00'),
(41, 'H', 'Drama, Mystery, Thriller', 'https://m.media-amazon.com/images/M/MV5BMTY3NjQwNDMwNV5BMl5BanBnXkFtZTcwNjE3ODgyMQ@@._V1_SX300.jpg', 'Serial killer Shin-Hyun gives himself up to police and confesses to committing a series of particularly horrifying murders of exclusively female victims. He is imprisoned and awaiting the death sentence but the killings continue, ...', '2002', 'Muito Ruim', 'Jong-Hyuk Lee', 'Yum Jung-ah, Jin-hee Ji, Ji-ru Sung', 'Korean', '1 nomination', '0000-00-00'),
(42, 'H', 'Drama, Mystery, Thriller', 'https://m.media-amazon.com/images/M/MV5BMTY3NjQwNDMwNV5BMl5BanBnXkFtZTcwNjE3ODgyMQ@@._V1_SX300.jpg', 'Serial killer Shin-Hyun gives himself up to police and confesses to committing a series of particularly horrifying murders of exclusively female victims. He is imprisoned and awaiting the death sentence but the killings continue, ...', '2002', 'Muito Ruim', 'Jong-Hyuk Lee', 'Yum Jung-ah, Jin-hee Ji, Ji-ru Sung', 'Korean', '1 nomination', '0000-00-00'),
(43, 'Naruto', 'Animation, Action, Adventure', 'https://m.media-amazon.com/images/M/MV5BZmQ5NGFiNWEtMmMyMC00MDdiLTg4YjktOGY5Yzc2MDUxMTE1XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_SX300.jpg', 'Naruto Uzumaki, a mischievous adolescent ninja, struggles as he searches for recognition and dreams of becoming the Hokage, the village+s leader and strongest ninja.', '2002–2007', 'Selecionar', 'Masashi Kishimoto', 'Junko Takeuchi, Maile Flanagan, Kate Higgins', 'Japanese', 'N/A', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `dataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `telefone`, `genero`, `dataNascimento`) VALUES
(1, 'Daniel Kloh', 'danielkloh@gmail.com', 'admin1234', 2147483647, 'Mascolino', '2004-12-28'),
(4, 'teste', 'teste', 'teste', 56466, 'teste', '2023-09-06'),
(5, '1', '1', '1', 1, '1', '2023-09-06');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`idUsuario`),
  ADD KEY `idFilme` (`idFilme`);

--
-- Índices de tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idFilme`) REFERENCES `filme` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
