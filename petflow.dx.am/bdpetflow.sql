-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Nov-2019 às 04:37
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdpetflow`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbanimal`
--

CREATE TABLE `tbanimal` (
  `idAnimal` int(11) NOT NULL,
  `nomeAnimal` varchar(60) NOT NULL,
  `racaAnimal` varchar(50) NOT NULL,
  `tipoAnimal` varchar(30) NOT NULL,
  `dataAniversario` date NOT NULL,
  `idadeAnimal` tinyint(4) NOT NULL,
  `disponivelAdocao` tinyint(4) NOT NULL,
  `fotoAnimal` varchar(300) DEFAULT NULL,
  `visibilidade` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbanimal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbbanimento`
--

CREATE TABLE `tbbanimento` (
  `idBanimento` int(11) NOT NULL,
  `idBanidor` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `inicio_banimento` datetime NOT NULL,
  `fim_banimento` datetime DEFAULT NULL,
  `idMotivo` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbbanimento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcomentario`
--

CREATE TABLE `tbcomentario` (
  `idComentario` int(11) NOT NULL,
  `descricaoComentario` varchar(500) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPostagem` int(11) NOT NULL,
  `visibilidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcomentario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdenunciaanimal`
--

CREATE TABLE `tbdenunciaanimal` (
  `idDenuncia` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAnimal` int(11) NOT NULL,
  `statusDenuncia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbdenunciaanimal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdenunciapost`
--

CREATE TABLE `tbdenunciapost` (
  `idDenuncia` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `statusDenuncia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbdenunciapost`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdeslike`
--

CREATE TABLE `tbdeslike` (
  `idDeslike` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPostagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblike`
--

CREATE TABLE `tblike` (
  `idLike` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPostagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmensagem`
--

CREATE TABLE `tbmensagem` (
  `idMensagem` int(11) NOT NULL,
  `descricaoMensagem` varchar(300) NOT NULL,
  `emailMensagem` varchar(100) NOT NULL,
  `nomeMensagem` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmotivobanimento`
--

CREATE TABLE `tbmotivobanimento` (
  `idMotivoBanimento` int(11) NOT NULL,
  `motivo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbmotivobanimento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnotificacao`
--

CREATE TABLE `tbnotificacao` (
  `idNotificacao` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `mensagem` varchar(500) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAdm` int(11) NOT NULL,
  `dataEnvio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbnotificacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpostagem`
--

CREATE TABLE `tbpostagem` (
  `idPostagem` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `descricaoPostagem` varchar(300) DEFAULT NULL,
  `dataPostagem` datetime NOT NULL,
  `idAnimal` int(11) DEFAULT NULL,
  `imagemPostagem` varchar(300) DEFAULT NULL,
  `visibilidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbpostagem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbseguidoranimal`
--

CREATE TABLE `tbseguidoranimal` (
  `idSeguidorAnimal` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAnimal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipousuario`
--

CREATE TABLE `tbtipousuario` (
  `codtipousuario` int(11) NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbtipousuario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(60) NOT NULL,
  `dataNascimento` date NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `emailUsuario` varchar(100) NOT NULL,
  `senhaUsuario` varchar(32) NOT NULL,
  `fotoUsuario` varchar(300) NOT NULL,
  `dataCriacaoConta` datetime NOT NULL,
  `online` tinyint(4) NOT NULL,
  `confirmaEmail` tinyint(4) NOT NULL,
  `tipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD PRIMARY KEY (`idAnimal`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `tbbanimento`
--
ALTER TABLE `tbbanimento`
  ADD PRIMARY KEY (`idBanimento`),
  ADD KEY `codUsuario` (`idUsuario`),
  ADD KEY `codMotivo` (`idMotivo`),
  ADD KEY `codBanidor` (`idBanidor`);

--
-- Indexes for table `tbcomentario`
--
ALTER TABLE `tbcomentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPostagem` (`idPostagem`);

--
-- Indexes for table `tbdenunciaanimal`
--
ALTER TABLE `tbdenunciaanimal`
  ADD PRIMARY KEY (`idDenuncia`);

--
-- Indexes for table `tbdenunciapost`
--
ALTER TABLE `tbdenunciapost`
  ADD PRIMARY KEY (`idDenuncia`);

--
-- Indexes for table `tbdeslike`
--
ALTER TABLE `tbdeslike`
  ADD PRIMARY KEY (`idDeslike`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPostagem` (`idPostagem`);

--
-- Indexes for table `tblike`
--
ALTER TABLE `tblike`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPostagem` (`idPostagem`);

--
-- Indexes for table `tbmensagem`
--
ALTER TABLE `tbmensagem`
  ADD PRIMARY KEY (`idMensagem`);

--
-- Indexes for table `tbmotivobanimento`
--
ALTER TABLE `tbmotivobanimento`
  ADD PRIMARY KEY (`idMotivoBanimento`);

--
-- Indexes for table `tbnotificacao`
--
ALTER TABLE `tbnotificacao`
  ADD PRIMARY KEY (`idNotificacao`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAdm` (`idAdm`);

--
-- Indexes for table `tbpostagem`
--
ALTER TABLE `tbpostagem`
  ADD PRIMARY KEY (`idPostagem`),
  ADD KEY `idPaginaAnimal` (`idAnimal`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `tbseguidoranimal`
--
ALTER TABLE `tbseguidoranimal`
  ADD PRIMARY KEY (`idSeguidorAnimal`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAnimal` (`idAnimal`);

--
-- Indexes for table `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
  ADD PRIMARY KEY (`codtipousuario`);

--
-- Indexes for table `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `emailUsuario` (`emailUsuario`),
  ADD KEY `tipoUsuario` (`tipoUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbanimal`
--
ALTER TABLE `tbanimal`
  MODIFY `idAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbbanimento`
--
ALTER TABLE `tbbanimento`
  MODIFY `idBanimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbcomentario`
--
ALTER TABLE `tbcomentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbdenunciaanimal`
--
ALTER TABLE `tbdenunciaanimal`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbdenunciapost`
--
ALTER TABLE `tbdenunciapost`
  MODIFY `idDenuncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbdeslike`
--
ALTER TABLE `tbdeslike`
  MODIFY `idDeslike` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblike`
--
ALTER TABLE `tblike`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbmensagem`
--
ALTER TABLE `tbmensagem`
  MODIFY `idMensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbmotivobanimento`
--
ALTER TABLE `tbmotivobanimento`
  MODIFY `idMotivoBanimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbnotificacao`
--
ALTER TABLE `tbnotificacao`
  MODIFY `idNotificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbpostagem`
--
ALTER TABLE `tbpostagem`
  MODIFY `idPostagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbseguidoranimal`
--
ALTER TABLE `tbseguidoranimal`
  MODIFY `idSeguidorAnimal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
  MODIFY `codtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbanimal`
--
ALTER TABLE `tbanimal`
  ADD CONSTRAINT `tbanimal_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbbanimento`
--
ALTER TABLE `tbbanimento`
  ADD CONSTRAINT `tbbanimento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
  ADD CONSTRAINT `tbbanimento_ibfk_2` FOREIGN KEY (`idMotivo`) REFERENCES `tbmotivobanimento` (`idMotivoBanimento`),
  ADD CONSTRAINT `tbbanimento_ibfk_3` FOREIGN KEY (`idBanidor`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbcomentario`
--
ALTER TABLE `tbcomentario`
  ADD CONSTRAINT `tbcomentario_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
  ADD CONSTRAINT `tbcomentario_ibfk_2` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`);

--
-- Limitadores para a tabela `tbdeslike`
--
ALTER TABLE `tbdeslike`
  ADD CONSTRAINT `tbdeslike_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
  ADD CONSTRAINT `tbdeslike_ibfk_2` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`);

--
-- Limitadores para a tabela `tblike`
--
ALTER TABLE `tblike`
  ADD CONSTRAINT `tblike_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
  ADD CONSTRAINT `tblike_ibfk_2` FOREIGN KEY (`idPostagem`) REFERENCES `tbpostagem` (`idPostagem`);

--
-- Limitadores para a tabela `tbpostagem`
--
ALTER TABLE `tbpostagem`
  ADD CONSTRAINT `tbpostagem_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`),
  ADD CONSTRAINT `tbpostagem_ibfk_2` FOREIGN KEY (`idAnimal`) REFERENCES `tbanimal` (`idAnimal`);

--
-- Limitadores para a tabela `tbseguidoranimal`
--
ALTER TABLE `tbseguidoranimal`
  ADD CONSTRAINT `tbseguidoranimal_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `tbusuario_ibfk_1` FOREIGN KEY (`tipoUsuario`) REFERENCES `tbtipousuario` (`codtipousuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
