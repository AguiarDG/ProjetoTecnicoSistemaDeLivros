-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.32-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para sistema_livros
CREATE DATABASE IF NOT EXISTS `sistema_livros` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `sistema_livros`;

-- Copiando estrutura para tabela sistema_livros.assunto
CREATE TABLE IF NOT EXISTS `assunto` (
  `id_assunto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_assunto`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_livros.assunto: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `assunto` DISABLE KEYS */;
REPLACE INTO `assunto` (`id_assunto`, `descricao`, `created_at`, `updated_at`) VALUES
	(1, 'Ação', '2024-07-17 08:56:05', '2024-07-17 22:08:20'),
	(3, 'Games 2', '2024-07-18 13:13:24', '2024-07-18 17:32:20'),
	(5, 'Ficção', '2024-07-18 17:32:51', '2024-07-18 17:32:51');
/*!40000 ALTER TABLE `assunto` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema_livros.autor
CREATE TABLE IF NOT EXISTS `autor` (
  `id_autor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_livros.autor: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
REPLACE INTO `autor` (`id_autor`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'João', '2024-07-17 08:56:51', '2024-07-17 22:07:52'),
	(2, 'Marcos', '2024-07-17 08:58:00', '2024-07-17 22:07:52');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema_livros.livro
CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `editora` varchar(40) NOT NULL,
  `edicao` int(10) NOT NULL,
  `ano_publicacao` varchar(4) NOT NULL,
  `valor` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_livros.livro: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
REPLACE INTO `livro` (`id_livro`, `titulo`, `editora`, `edicao`, `ano_publicacao`, `valor`, `created_at`, `updated_at`) VALUES
	(1, 'Meu Livro 1 - Alterado', 'Editora 1 - Alterado', 122, '2000', 555, '2024-07-17 08:58:33', '2024-07-18 02:43:24'),
	(2, 'Meu Livro 2 - Alterado', 'Editora 2 - Alterado', 2222, '2035', 700, '2024-07-17 09:04:24', '2024-07-18 03:26:02'),
	(3, 'Testeeee', 'Editoraaa', 1111, '2030', 200, '2024-07-18 01:10:30', '2024-07-18 01:10:30'),
	(4, 'Testeeee 2222', 'Editoraaa 2222', 2222, '2032', 4444, '2024-07-18 01:12:48', '2024-07-18 01:12:48'),
	(6, 'Novo livro 3', 'Nova Editora', 10, '2024', 500, '2024-07-18 17:00:57', '2024-07-18 17:12:00'),
	(7, 'Testeeee', 'Editora 1 - Alterado', 1111, '2030', 1000, '2024-07-18 18:09:23', '2024-07-18 18:17:28');
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;

-- Copiando estrutura para view sistema_livros.livros_info
-- Criando tabela temporária para evitar erros de dependência de VIEW
CREATE TABLE `livros_info` (
	`id_livro` INT(10) UNSIGNED NOT NULL,
	`titulo` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`editora` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`edicao` INT(10) NOT NULL,
	`ano_publicacao` VARCHAR(4) NOT NULL COLLATE 'utf8mb4_general_ci',
	`valor` FLOAT(12) NOT NULL,
	`id_assunto` INT(10) UNSIGNED NOT NULL,
	`assunto` VARCHAR(40) NOT NULL COLLATE 'utf8mb4_general_ci',
	`id_autor` MEDIUMTEXT NULL COLLATE 'utf8mb4_general_ci',
	`autor` MEDIUMTEXT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Copiando estrutura para tabela sistema_livros.livro_has_assunto
CREATE TABLE IF NOT EXISTS `livro_has_assunto` (
  `id_livro` int(10) unsigned NOT NULL,
  `id_assunto` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `livro_has_assunto_id_livro_idx` (`id_livro`) USING BTREE,
  KEY `livro_has_assunto_id_assunto_idx` (`id_assunto`) USING BTREE,
  CONSTRAINT `FK_livro_has_assunto_id_assunto` FOREIGN KEY (`id_assunto`) REFERENCES `assunto` (`id_assunto`),
  CONSTRAINT `FK_livro_has_assunto_id_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_livros.livro_has_assunto: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `livro_has_assunto` DISABLE KEYS */;
REPLACE INTO `livro_has_assunto` (`id_livro`, `id_assunto`, `created_at`, `updated_at`) VALUES
	(1, 1, '2024-07-17 22:09:19', '2024-07-17 22:09:19'),
	(2, 1, '2024-07-18 00:26:02', '2024-07-18 00:26:02'),
	(6, 3, '2024-07-18 14:00:57', '2024-07-18 14:00:57'),
	(7, 5, '2024-07-18 15:09:23', '2024-07-18 15:09:23');
/*!40000 ALTER TABLE `livro_has_assunto` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema_livros.livro_has_autor
CREATE TABLE IF NOT EXISTS `livro_has_autor` (
  `id_livro` int(10) unsigned NOT NULL,
  `id_autor` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `livro_has_autor_id_livro_idx` (`id_livro`) USING BTREE,
  KEY `livro_has_autor_id_autor_idx` (`id_autor`) USING BTREE,
  CONSTRAINT `FK_livro_has_autor_id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  CONSTRAINT `FK_livro_has_autor_id_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_livros.livro_has_autor: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `livro_has_autor` DISABLE KEYS */;
REPLACE INTO `livro_has_autor` (`id_livro`, `id_autor`, `created_at`, `updated_at`) VALUES
	(1, 1, '2024-07-17 22:10:05', '2024-07-17 22:10:05'),
	(2, 1, '2024-07-17 22:10:05', '2024-07-17 22:10:05'),
	(2, 2, '2024-07-18 00:26:02', '2024-07-18 00:26:02'),
	(6, 2, '2024-07-18 14:00:57', '2024-07-18 14:00:57'),
	(7, 1, '2024-07-18 15:09:23', '2024-07-18 15:09:23');
/*!40000 ALTER TABLE `livro_has_autor` ENABLE KEYS */;

-- Copiando estrutura para view sistema_livros.livros_info
-- Removendo tabela temporária e criando a estrutura VIEW final
DROP TABLE IF EXISTS `livros_info`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `livros_info` AS SELECT livro.id_livro,
        livro.titulo,
        livro.editora,
        livro.edicao,
        livro.ano_publicacao,
        livro.valor,
        a.id_assunto,
        a.descricao as assunto,
        GROUP_CONCAT(au.id_autor SEPARATOR ", ") AS id_autor,
        GROUP_CONCAT(au.nome SEPARATOR ", ") AS autor
FROM livro
LEFT JOIN livro_has_assunto lha ON lha.id_livro = livro.id_livro
INNER JOIN assunto a ON a.id_assunto = lha.id_assunto
LEFT JOIN livro_has_autor lhau ON lhau.id_livro = livro.id_livro
INNER JOIN autor au ON au.id_autor = lhau.id_autor
GROUP BY livro.id_livro,
         livro.titulo,
         livro.editora,
         livro.edicao,
         livro.ano_publicacao,
         livro.valor,
         a.id_assunto,
         a.descricao
ORDER BY livro.id_livro ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
