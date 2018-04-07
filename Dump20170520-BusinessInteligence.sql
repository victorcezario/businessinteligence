-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 192.168.0.10    Database: bi
-- ------------------------------------------------------
-- Server version	5.6.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `bi`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bi`;

--
-- Table structure for table `BI_CHARTS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_CHARTS` (
  `ID` int(11) DEFAULT NULL,
  `ID_MODULO` int(11) DEFAULT NULL,
  `ID_DASHBOARD` int(11) DEFAULT NULL,
  `DESCRICAO` varchar(175) DEFAULT NULL,
  `TIPO` varchar(15) DEFAULT NULL,
  `EIXOY` varchar(50) DEFAULT NULL,
  `EIXOX` varchar(50) DEFAULT NULL,
  `QUERY` varchar(50) DEFAULT NULL,
  `FILTRO` varchar(50) DEFAULT NULL,
  `DATADINAMICA` varchar(50) DEFAULT NULL,
  `VALOR` varchar(50) DEFAULT NULL,
  `ORDEM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_CHARTS`
--

LOCK TABLES `BI_CHARTS` WRITE;
/*!40000 ALTER TABLE `BI_CHARTS` DISABLE KEYS */;
INSERT INTO `BI_CHARTS` VALUES (1,1001,1,'Vendas por Marca','PIE','pmarca','total',NULL,'','data',NULL,1),(2,1001,1,'Vendas por Sexo','PIE','sexo','total',NULL,'sexo;2;N/A','data',NULL,2),(3,1001,1,'Vendas por Vendedor','PIE','vendedor','total',NULL,'','data',NULL,0);
/*!40000 ALTER TABLE `BI_CHARTS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_DASHBOARDS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_DASHBOARDS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(45) NOT NULL,
  `ICONE` varchar(25) NOT NULL,
  `PADRAO` varchar(45) NOT NULL,
  `EMPRESA` int(2) NOT NULL,
  `PROPRIETARIO` varchar(25) DEFAULT NULL,
  `STATUS` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_DASHBOARDS`
--

LOCK TABLES `BI_DASHBOARDS` WRITE;
/*!40000 ALTER TABLE `BI_DASHBOARDS` DISABLE KEYS */;
INSERT INTO `BI_DASHBOARDS` VALUES (1,'Analise de Vendas','fa fa-shopping-cart','hoje',1,'1',1),(2,'Analise Antiga','fa fa-credit-card','mesatual',1,'1',2),(3,'Analise de Crediários','fa fa-credit-card','mesatual',1,'1',1);
/*!40000 ALTER TABLE `BI_DASHBOARDS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_DATABASE`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_DATABASE` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(175) DEFAULT NULL,
  `NOME` varchar(55) DEFAULT NULL,
  `TIPO` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_DATABASE`
--

LOCK TABLES `BI_DATABASE` WRITE;
/*!40000 ALTER TABLE `BI_DATABASE` DISABLE KEYS */;
INSERT INTO `BI_DATABASE` VALUES (1,'Banco de Dados Principal','BI','MYSQL'),(2,'Banco de Dados Views','BI_VIEW','POSTGRESQL'),(3,'Banco de Dados ERP','SETA','POSTGRESQL');
/*!40000 ALTER TABLE `BI_DATABASE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_GROUPS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_GROUPS` (
  `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `DESCRIPTION` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_GROUPS`
--

LOCK TABLES `BI_GROUPS` WRITE;
/*!40000 ALTER TABLE `BI_GROUPS` DISABLE KEYS */;
INSERT INTO `BI_GROUPS` VALUES (1,'ADMIN','ADMINISTRATOR'),(2,'MEMBERS','GENERAL USER');
/*!40000 ALTER TABLE `BI_GROUPS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_KPI`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_KPI` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DASHBOARD` int(11) NOT NULL,
  `ID_MODULO` int(11) DEFAULT NULL,
  `ID_KPI` int(11) NOT NULL,
  `ID_BANCO` int(11) DEFAULT NULL,
  `LINK` varchar(375) DEFAULT NULL,
  `QUERY` text,
  `FILTRO` varchar(275) DEFAULT NULL,
  `MASCARA` varchar(20) DEFAULT NULL,
  `ORDEM` int(1) DEFAULT NULL,
  `COR` varchar(25) DEFAULT NULL,
  `CAMPO` varchar(25) DEFAULT NULL,
  `CONDICAO` varchar(275) DEFAULT NULL,
  `DATA` varchar(25) DEFAULT NULL,
  `TITULO` varchar(45) DEFAULT NULL,
  `ICONE` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_KPI`
--

LOCK TABLES `BI_KPI` WRITE;
/*!40000 ALTER TABLE `BI_KPI` DISABLE KEYS */;
INSERT INTO `BI_KPI` VALUES (6,2,0,1,3,NULL,'SELECT COUNT(*) AS TOTAL FROM PESSOAS WHERE cadastro >= \'{$de}\' AND cadastro <= \'{$ate}\' AND empresa = \'{$empresa}\' AND status = \'A\'',NULL,'INT',0,'#038f81','0','0','0','Novos Crediários',' '),(7,2,0,1,3,NULL,'SELECT sum(financeiro_titulos.valor) as total FROM pessoas, financeiro_titulos\r\nWHERE \r\npessoas.codigo = financeiro_titulos.pessoa\r\nAND pessoas.empresa = \'{$empresa}\'\r\nAND pessoas.cadastro >= \'{$de}\' \r\nAND pessoas.cadastro <= \'{$ate}\'\r\nAND SUBSTR(financeiro_titulos.auxiliar,1,2) = \'VE\'',NULL,'MONEY',4,'#3882d9','0',NULL,NULL,'Valor Total Vendido',NULL),(8,2,0,1,3,NULL,'SELECT sum(financeiro_titulos.valorpago) as total FROM pessoas, financeiro_titulos\r\nWHERE \r\npessoas.codigo = financeiro_titulos.pessoa\r\nAND pessoas.empresa = \'{$empresa}\'\r\nAND pessoas.cadastro >= \'{$de}\' \r\nAND pessoas.cadastro <= \'{$ate}\'\r\nAND SUBSTR(financeiro_titulos.auxiliar,1,2) = \'VE\'',NULL,'MONEY',5,'#2ab5d4','0',NULL,NULL,'Valor Recebido',NULL),(9,2,NULL,1,3,NULL,'SELECT COUNT(*) AS TOTAL FROM PESSOAS WHERE scpcstatus = 3 AND cadastro >= \'{$de}\' AND cadastro <= \'{$ate}\' AND empresa = \'{$empresa}\' AND status = \'A\'',NULL,'INT',2,'#1c5fb8',NULL,NULL,NULL,'Clientes Seprocados',NULL),(10,2,NULL,1,3,NULL,'SELECT count(*) as total FROM\r\npessoas \r\nWHERE pessoas.empresa = \'{$empresa}\'  AND status = \'A\'\r\nAND pessoas.cadastro >= \'{$de}\' AND pessoas.cadastro <= \'{$ate}\'\r\nAND (select min(vendas.data) from vendas where vendas.cliente = pessoas.codigo) \r\n!= (select max(vendas.data) from vendas where vendas.cliente = pessoas.codigo)',NULL,'INT',1,'#0452ba',NULL,NULL,NULL,'Clientes que retornaram',NULL),(11,2,NULL,1,3,NULL,'SELECT sum(financeiro_titulos.valor) as total FROM pessoas, financeiro_titulos\r\nWHERE \r\npessoas.codigo = financeiro_titulos.pessoa\r\nAND pessoas.empresa = \'{$empresa}\'\r\nAND pessoas.cadastro >= \'{$de}\' \r\nAND pessoas.cadastro <= \'{$ate}\'\r\nAND SUBSTR(financeiro_titulos.auxiliar,1,2) = \'VE\'\r\nAND financeiro_titulos.pagamento is null',NULL,'MONEY',6,'#0a3d80',NULL,NULL,NULL,'Valor em Aberto',NULL),(14,1,1001,1,NULL,'?d=codigo,nome,data&v=total&f=tipo;1;1,status;1;S,',NULL,'','MONEY',0,'2ab5d4','total',NULL,'data','Total Vendido',NULL),(15,1,1001,1,NULL,'?d=codigo,nome,data&v=avista&f=tipo;1;1,status;1;S,',NULL,'','MONEY',NULL,'3882d9','avista',NULL,'data','Total Vendido | AVISTA',NULL),(16,1,1001,1,NULL,'?d=codigo,nome,data&v=aprazo&f=tipo;1;1,status;1;S,',NULL,'','MONEY',NULL,'0452ba','aprazo',NULL,'data','Total Vendido | APRAZO',NULL),(19,1,1001,1,NULL,'?d=codigo,empresa,data,pdescricao&v=plucro&f=status;1;S,tipo;1;1,',NULL,'','MONEY',NULL,'063488','plucro',NULL,'data','Valor do Lucro',NULL),(22,3,1002,1,NULL,'?d=codigo,nome,primeira,ultima&v=contagem&f=total;3;0,,',NULL,'total;3;0,,','INT',0,'0277BD','contagem',NULL,'primeira','NOVOS| Total de Crediários',NULL),(23,3,1002,1,NULL,'?d=codigo,nome,primeira,ultima&v=ratrasado&f=total;3;0,,',NULL,'total;3;0,,','MONEY',1,'0288D1','aprazo',NULL,'primeira','NOVOS| Valor Aprazo Vendido',NULL),(24,3,1002,1,NULL,'?d=codigo,nome,primeira,ultima&v=contagem&f=ratrasado;3;0,total;3;0,,',NULL,'ratrasado;3;0,total;3;0,,','INT',2,'00ACC1','contagem',NULL,'primeira','NOVOS| Clientes em Atraso',NULL),(25,3,1002,1,NULL,'?d=codigo,nome,primeira,ultima&v=ratrasado&f=ratrasado;3;0,total;3;0,,',NULL,'ratrasado;3;0,total;3;0,,','MONEY',4,'006064','ratrasado',NULL,'primeira','NOVOS | Valor Total em Atraso',NULL),(26,3,1002,1,NULL,'?d=codigo,nome,primeira,ultima&v=raberto&f=total;3;0,,',NULL,'ratrasado;3;0,total;3;0,,','MONEY',3,'00838F','raberto',NULL,'primeira','NOVOS | Valor em Aberto',NULL),(27,3,1002,1,NULL,'?d=codigo,nome,primeira,ultima&v=ratrasado30&f=ratrasado;3;0,total;3;0,,',NULL,'ratrasado;3;0,total;3;0,,','MONEY',5,'1976D2','ratrasado30',NULL,'primeira','NOVOS | Valor Atrasado até 30 Dias',NULL),(28,3,1002,1,NULL,'?d=codigo,nome,primeira,ultima&v=ratrasado60&f=ratrasado;3;0,total;3;0,,',NULL,'ratrasado;3;0,total;3;0,,','MONEY',6,'3F51B5','ratrasado60',NULL,'primeira','NOVOS | Valor Atrasado até 60 Dias',NULL),(29,3,1002,1,NULL,'?d=codigo,nome,primeira,ultima&v=ratrasado90&f=ratrasado;3;0,total;3;0,,',NULL,'ratrasado;3;0,total;3;0,,','MONEY',7,'1565C0','ratrasado90',NULL,'primeira','NOVOS | Valor Atrasado até 90 Dias',NULL),(30,3,1002,1,NULL,'?d=codigo,nome,primeira,scpcstatus,ultima&v=contagem&f=scpcstatus;1;SEPROCADO,total;3;0,',NULL,'scpcstatus;1;SEPROCADO,total;3;0,',NULL,NULL,'01579B','contagem',NULL,'primeira','NOVOS | Seprocados',NULL);
/*!40000 ALTER TABLE `BI_KPI` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_KPI_MODELOS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_KPI_MODELOS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(175) NOT NULL,
  `HTML` text NOT NULL,
  `STATUS` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_KPI_MODELOS`
--

LOCK TABLES `BI_KPI_MODELOS` WRITE;
/*!40000 ALTER TABLE `BI_KPI_MODELOS` DISABLE KEYS */;
INSERT INTO `BI_KPI_MODELOS` VALUES (1,'Padrão','<a href=\"{$link}\"><div class=\"col-md-3\"><div class=\"panel media pad-all\" style=\"background-color: #{$color};\">				                    <div class=\"media-left\">				                        <span class=\"icon-wra icon-wap-sm\" style=\"color:#ffffff\">				                        {$icone}					                        </span>					                    </div>\n<div class=\"media-body\">				                        <p class=\"text-2x mar-no text-semibold\" style=\"color:#ffffff\">{$valor}</p>				                        <p class=\"mar-no\" style=\"color:#ffffff\">{$descricao}</p>				                    </div></div></div></a>',1);
/*!40000 ALTER TABLE `BI_KPI_MODELOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_LOGIN_ATTEMPTS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_LOGIN_ATTEMPTS` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `IP_ADDRESS` varchar(15) NOT NULL,
  `LOGIN` varchar(100) NOT NULL,
  `TIME` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_LOGIN_ATTEMPTS`
--

LOCK TABLES `BI_LOGIN_ATTEMPTS` WRITE;
/*!40000 ALTER TABLE `BI_LOGIN_ATTEMPTS` DISABLE KEYS */;
/*!40000 ALTER TABLE `BI_LOGIN_ATTEMPTS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_MIDDLEWARE`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_MIDDLEWARE` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MODULO` int(11) DEFAULT NULL,
  `DB_ORIGEM` varchar(50) DEFAULT NULL,
  `VIEW_ORIGEM` varchar(50) DEFAULT NULL,
  `TBL_DESTINO` varchar(50) DEFAULT NULL,
  `TIPO` varchar(50) DEFAULT NULL,
  `REGUPDATE` bigint(11) DEFAULT NULL,
  `PERIODICIDADE` varchar(5) DEFAULT NULL,
  `STATUS` int(2) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_MIDDLEWARE`
--

LOCK TABLES `BI_MIDDLEWARE` WRITE;
/*!40000 ALTER TABLE `BI_MIDDLEWARE` DISABLE KEYS */;
INSERT INTO `BI_MIDDLEWARE` VALUES (5,1002,'SETA','bi_crediarios','crediarios',NULL,NULL,'1/H',1),(6,1001,'SETA','bi_vendas','vendas',NULL,NULL,'1/H',1);
/*!40000 ALTER TABLE `BI_MIDDLEWARE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_MIDDLEWARE_LOGS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_MIDDLEWARE_LOGS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PROCESSO` int(11) NOT NULL,
  `INICIO_CONSULTA` datetime NOT NULL,
  `FIM_CONSULTA` datetime NOT NULL,
  `INICIO_INSERCAO` datetime DEFAULT NULL,
  `FIM_INSERCAO` datetime DEFAULT NULL,
  `LINHAS` int(11) NOT NULL,
  `ERRO` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_MIDDLEWARE_LOGS`
--

LOCK TABLES `BI_MIDDLEWARE_LOGS` WRITE;
/*!40000 ALTER TABLE `BI_MIDDLEWARE_LOGS` DISABLE KEYS */;
INSERT INTO `BI_MIDDLEWARE_LOGS` VALUES (31,6,'2017-05-18 18:39:26','2017-05-18 18:39:26','2017-05-18 18:39:26','2017-05-18 18:41:53',1849527,NULL),(33,6,'2017-05-18 19:42:01','2017-05-18 19:42:01','2017-05-18 19:42:01','2017-05-18 19:44:28',1849535,NULL),(37,6,'2017-05-18 20:45:01','2017-05-18 20:45:01','2017-05-18 20:45:01','2017-05-18 20:47:27',1849550,NULL),(38,5,'2017-05-18 20:56:35','2017-05-18 20:56:35','2017-05-18 20:56:35','2017-05-18 20:56:48',30190,NULL),(39,6,'2017-05-18 21:48:01','2017-05-18 21:48:01','2017-05-18 21:48:01','2017-05-18 21:50:32',1849556,NULL),(40,5,'2017-05-18 21:57:01','2017-05-18 21:57:01','2017-05-18 21:57:01','2017-05-18 21:57:15',30192,NULL),(41,6,'2017-05-18 22:51:01','2017-05-18 22:51:01','2017-05-18 22:51:01','2017-05-18 22:53:21',1849557,NULL),(42,5,'2017-05-18 22:58:02','2017-05-18 22:58:02','2017-05-18 22:58:02','2017-05-18 22:58:15',30192,NULL),(43,6,'2017-05-18 23:54:01','2017-05-19 00:04:18','2017-05-19 00:04:18','2017-05-19 00:07:56',1849557,NULL),(44,5,'2017-05-18 23:54:01','2017-05-19 00:07:56','2017-05-19 00:07:56','2017-05-19 00:08:13',30192,NULL),(45,6,'2017-05-19 01:08:01','2017-05-19 01:08:01','2017-05-19 01:08:01','2017-05-19 01:10:33',1849557,NULL),(46,5,'2017-05-19 01:08:01','2017-05-19 01:10:33','2017-05-19 01:10:33','2017-05-19 01:10:46',30192,NULL),(47,6,'2017-05-19 02:11:01','2017-05-19 02:11:01','2017-05-19 02:11:01','2017-05-19 02:13:25',1849557,NULL),(48,5,'2017-05-19 02:11:01','2017-05-19 02:13:25','2017-05-19 02:13:25','2017-05-19 02:13:39',30192,NULL),(49,6,'2017-05-19 03:14:01','2017-05-19 03:14:01','2017-05-19 03:14:01','2017-05-19 03:16:26',1849557,NULL),(50,5,'2017-05-19 03:14:01','2017-05-19 03:16:26','2017-05-19 03:16:26','2017-05-19 03:16:40',30192,NULL),(51,6,'2017-05-19 04:17:01','2017-05-19 04:17:01','2017-05-19 04:17:01','2017-05-19 04:19:31',1849557,NULL),(52,5,'2017-05-19 04:17:01','2017-05-19 04:19:31','2017-05-19 04:19:31','2017-05-19 04:19:44',30192,NULL),(53,6,'2017-05-19 05:20:01','2017-05-19 05:59:45','2017-05-19 05:59:45','2017-05-19 06:02:14',1849557,NULL),(54,5,'2017-05-19 05:20:01','2017-05-19 06:02:14','2017-05-19 06:02:14','2017-05-19 06:02:33',30192,NULL),(55,6,'2017-05-19 07:03:01','2017-05-19 07:03:01','2017-05-19 07:03:01','2017-05-19 07:05:32',1849557,NULL),(56,5,'2017-05-19 07:03:01','2017-05-19 07:05:32','2017-05-19 07:05:32','2017-05-19 07:05:45',30192,NULL),(57,6,'2017-05-19 08:06:01','2017-05-19 08:06:01','2017-05-19 08:06:01','2017-05-19 08:08:31',1849557,NULL),(58,5,'2017-05-19 08:06:01','2017-05-19 08:08:31','2017-05-19 08:08:31','2017-05-19 08:08:44',30192,NULL),(59,6,'2017-05-19 09:09:01','2017-05-19 09:09:01','2017-05-19 09:09:01','2017-05-19 09:11:32',1849559,NULL),(60,5,'2017-05-19 09:09:01','2017-05-19 09:11:32','2017-05-19 09:11:32','2017-05-19 09:11:45',30191,NULL),(61,6,'2017-05-19 10:12:01','2017-05-19 10:12:01','2017-05-19 10:12:01','2017-05-19 10:14:33',1849568,NULL),(62,5,'2017-05-19 10:12:01','2017-05-19 10:14:34','2017-05-19 10:14:34','2017-05-19 10:14:47',30190,NULL),(63,6,'2017-05-19 11:15:01','2017-05-19 11:15:01','2017-05-19 11:15:01','2017-05-19 11:17:34',1849589,NULL),(64,5,'2017-05-19 11:15:01','2017-05-19 11:17:34','2017-05-19 11:17:34','2017-05-19 11:17:48',30191,NULL),(65,6,'2017-05-19 12:18:01','2017-05-19 12:18:01','2017-05-19 12:18:01','2017-05-19 12:20:30',1849620,NULL),(66,5,'2017-05-19 12:18:01','2017-05-19 12:20:30','2017-05-19 12:20:30','2017-05-19 12:20:44',30193,NULL),(67,6,'2017-05-19 13:21:01','2017-05-19 13:21:01','2017-05-19 13:21:01','2017-05-19 13:23:27',1849670,NULL),(68,5,'2017-05-19 13:21:01','2017-05-19 13:23:27','2017-05-19 13:23:27','2017-05-19 13:23:41',30196,NULL),(69,6,'2017-05-19 14:24:01','2017-05-19 14:24:01','2017-05-19 14:24:01','2017-05-19 14:26:24',1849708,NULL),(70,5,'2017-05-19 14:24:01','2017-05-19 14:26:25','2017-05-19 14:26:25','2017-05-19 14:26:38',30197,NULL),(71,6,'2017-05-19 15:27:01','2017-05-19 15:27:01','2017-05-19 15:27:01','2017-05-19 15:29:30',1849746,NULL),(72,5,'2017-05-19 15:27:01','2017-05-19 15:29:31','2017-05-19 15:29:31','2017-05-19 15:29:44',30199,NULL),(73,6,'2017-05-19 16:30:01','2017-05-19 16:30:01','2017-05-19 16:30:01','2017-05-19 16:32:33',1849811,NULL),(74,5,'2017-05-19 16:30:01','2017-05-19 16:32:33','2017-05-19 16:32:33','2017-05-19 16:32:46',30200,NULL),(75,6,'2017-05-19 17:33:01','2017-05-19 17:33:01','2017-05-19 17:33:01','2017-05-19 17:35:35',1849848,NULL),(76,5,'2017-05-19 17:33:01','2017-05-19 17:35:35','2017-05-19 17:35:35','2017-05-19 17:35:49',30198,NULL),(77,6,'2017-05-19 18:36:01','2017-05-19 18:36:01','2017-05-19 18:36:01','2017-05-19 18:38:35',1849876,NULL),(78,5,'2017-05-19 18:36:01','2017-05-19 18:38:35','2017-05-19 18:38:35','2017-05-19 18:38:48',30198,NULL),(79,6,'2017-05-19 19:39:01','2017-05-19 19:39:01','2017-05-19 19:39:01','2017-05-19 19:41:26',1849920,NULL),(80,5,'2017-05-19 19:39:01','2017-05-19 19:41:26','2017-05-19 19:41:26','2017-05-19 19:41:39',30198,NULL),(81,6,'2017-05-19 20:42:01','2017-05-19 20:42:01','2017-05-19 20:42:01','2017-05-19 20:44:37',1849940,NULL),(82,5,'2017-05-19 20:42:01','2017-05-19 20:44:37','2017-05-19 20:44:37','2017-05-19 20:44:50',30201,NULL),(83,6,'2017-05-19 21:45:01','2017-05-19 21:45:01','2017-05-19 21:45:01','2017-05-19 21:47:37',1849954,NULL),(84,5,'2017-05-19 21:45:01','2017-05-19 21:47:37','2017-05-19 21:47:37','2017-05-19 21:47:50',30201,NULL),(85,6,'2017-05-19 22:48:01','2017-05-19 22:48:01','2017-05-19 22:48:01','2017-05-19 22:50:25',1849954,NULL),(86,5,'2017-05-19 22:48:01','2017-05-19 22:50:26','2017-05-19 22:50:26','2017-05-19 22:50:40',30201,NULL),(87,6,'2017-05-19 23:51:01','2017-05-20 00:04:22','2017-05-20 00:04:22','2017-05-20 00:07:49',1849954,NULL),(88,5,'2017-05-19 23:51:01','2017-05-20 00:07:49','2017-05-20 00:07:49','2017-05-20 00:08:05',30201,NULL),(89,6,'2017-05-20 01:08:01','2017-05-20 01:08:01','2017-05-20 01:08:01','2017-05-20 01:10:31',1849954,NULL),(90,5,'2017-05-20 01:08:01','2017-05-20 01:10:31','2017-05-20 01:10:31','2017-05-20 01:10:44',30201,NULL),(91,6,'2017-05-20 02:11:01','2017-05-20 02:11:01','2017-05-20 02:11:01','2017-05-20 02:13:34',1849954,NULL),(92,5,'2017-05-20 02:11:01','2017-05-20 02:13:34','2017-05-20 02:13:34','2017-05-20 02:13:47',30201,NULL),(93,6,'2017-05-20 03:14:01','2017-05-20 03:14:01','2017-05-20 03:14:01','2017-05-20 03:16:28',1849954,NULL),(94,5,'2017-05-20 03:14:01','2017-05-20 03:16:28','2017-05-20 03:16:28','2017-05-20 03:16:42',30201,NULL),(95,6,'2017-05-20 04:17:01','2017-05-20 04:17:01','2017-05-20 04:17:01','2017-05-20 04:19:29',1849954,NULL),(96,5,'2017-05-20 04:17:01','2017-05-20 04:19:29','2017-05-20 04:19:29','2017-05-20 04:19:42',30201,NULL),(97,6,'2017-05-20 05:20:01','2017-05-20 05:59:20','2017-05-20 05:59:20','2017-05-20 06:01:49',1849954,NULL),(98,5,'2017-05-20 05:20:01','2017-05-20 06:01:49','2017-05-20 06:01:49','2017-05-20 06:02:05',30201,NULL),(99,6,'2017-05-20 07:02:01','2017-05-20 07:02:01','2017-05-20 07:02:01','2017-05-20 07:04:30',1849954,NULL),(100,5,'2017-05-20 07:02:01','2017-05-20 07:04:30','2017-05-20 07:04:30','2017-05-20 07:04:43',30201,NULL),(101,6,'2017-05-20 08:05:01','2017-05-20 08:05:01','2017-05-20 08:05:01','2017-05-20 08:07:31',1849954,NULL),(102,5,'2017-05-20 08:05:01','2017-05-20 08:07:31','2017-05-20 08:07:31','2017-05-20 08:07:44',30201,NULL),(103,6,'2017-05-20 09:08:01','2017-05-20 09:08:01','2017-05-20 09:08:01','2017-05-20 09:10:33',1849955,NULL),(104,5,'2017-05-20 09:08:01','2017-05-20 09:10:33','2017-05-20 09:10:33','2017-05-20 09:10:46',30201,NULL),(105,6,'2017-05-20 10:11:01','2017-05-20 10:11:01','2017-05-20 10:11:01','2017-05-20 10:13:38',1849993,NULL),(106,5,'2017-05-20 10:11:01','2017-05-20 10:13:38','2017-05-20 10:13:38','2017-05-20 10:13:51',30200,NULL),(107,6,'2017-05-20 11:14:01','2017-05-20 11:14:01','2017-05-20 11:14:01','2017-05-20 11:16:28',1850084,NULL),(108,5,'2017-05-20 11:14:01','2017-05-20 11:16:28','2017-05-20 11:16:28','2017-05-20 11:16:41',30210,NULL),(109,6,'2017-05-20 12:17:01','2017-05-20 12:17:01','2017-05-20 12:17:01','2017-05-20 12:19:29',1850225,NULL),(110,5,'2017-05-20 12:17:01','2017-05-20 12:19:29','2017-05-20 12:19:29','2017-05-20 12:19:43',30208,NULL),(111,6,'2017-05-20 13:20:01','2017-05-20 13:20:01','2017-05-20 13:20:01','2017-05-20 13:22:26',1850318,NULL),(112,5,'2017-05-20 13:20:01','2017-05-20 13:22:27','2017-05-20 13:22:27','2017-05-20 13:22:40',30213,NULL);
/*!40000 ALTER TABLE `BI_MIDDLEWARE_LOGS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_MODULOS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_MODULOS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(75) NOT NULL,
  `NOME_MODULO` varchar(75) NOT NULL,
  `ID_BANCO_DADOS` int(25) NOT NULL,
  `INNERJOIN` varchar(175) DEFAULT NULL,
  `TABELA_DADOS` varchar(75) NOT NULL,
  `ICONE` varchar(25) NOT NULL,
  `STATUS` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_MODULOS`
--

LOCK TABLES `BI_MODULOS` WRITE;
/*!40000 ALTER TABLE `BI_MODULOS` DISABLE KEYS */;
INSERT INTO `BI_MODULOS` VALUES (1001,'Analise de Vendas','Analise de Vendas',3,NULL,'wmocbi_vendas','fa fa-group',1),(1002,'Analise de Crediarios','Analise de Crediarios',3,NULL,'wmocbi_crediarios','fa fa-credit-card',1);
/*!40000 ALTER TABLE `BI_MODULOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_MODULOS_CAMPOS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_MODULOS_CAMPOS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MODULO` int(11) NOT NULL,
  `NOME` varchar(25) NOT NULL,
  `APELIDO` varchar(172) NOT NULL,
  `TIPO` varchar(25) DEFAULT NULL,
  `TAMANHO` int(2) DEFAULT NULL,
  `MASCARA` varchar(20) DEFAULT NULL,
  `FORMULA` varchar(75) DEFAULT NULL,
  `STATUS` int(2) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_MODULOS_CAMPOS`
--

LOCK TABLES `BI_MODULOS_CAMPOS` WRITE;
/*!40000 ALTER TABLE `BI_MODULOS_CAMPOS` DISABLE KEYS */;
INSERT INTO `BI_MODULOS_CAMPOS` VALUES (9,1001,'codigo','Codigo','INT',11,NULL,NULL,1),(10,1001,'avista','Valor Avista','DECIMAL',0,NULL,NULL,1),(11,1001,'nome','Nome','VARCHAR',11,NULL,NULL,1),(12,1001,'empresa','Empresa','VARCHAR',11,NULL,NULL,1),(13,1001,'aprazo','Valor Aprazo','DECIMAL',NULL,NULL,NULL,1),(14,1001,'data','Data da Venda','DATA',NULL,NULL,NULL,1),(15,1001,'tipo','Tipo da Venda','VARCHAR',NULL,NULL,NULL,1),(16,1001,'total','Valor Total','DECIMAL',NULL,NULL,NULL,1),(17,1001,'sexo','Sexo','VARCHAR',NULL,NULL,NULL,1),(18,1001,'status','Status','VARCHAR',NULL,NULL,NULL,1),(19,1001,'pmarca','Marca','VARCHAR',0,NULL,NULL,1),(20,1001,'idade','Idade','VARCHAR',NULL,NULL,NULL,1),(21,1001,'colecao','Coleção','VARCHAR',NULL,NULL,NULL,1),(22,1001,'pdescricao','Produto Descrição','VARCHAR',NULL,NULL,NULL,1),(23,1001,'produto','Produto Codigo','VARCHAR',NULL,NULL,NULL,1),(24,1001,'pcor','Produto Cor','VARCHAR',NULL,NULL,NULL,1),(25,1001,'plucro','Valor Lucro','DECIMAL',NULL,NULL,NULL,1),(26,1002,'contagem','Contagem','DECIMAL',2,NULL,NULL,1),(27,1002,'total','Valor Total','DECIMAL',NULL,NULL,NULL,1),(29,1002,'nome','Nome Cliente','VARCHAR',75,NULL,NULL,1),(30,1002,'codigo','Cliente Codigo','INT',NULL,NULL,NULL,1),(31,1002,'idade','Idade','VARCHAR',NULL,NULL,NULL,1),(32,1002,'raberto','Valor Aberto','DECIMAL',NULL,NULL,NULL,1),(33,1002,'ratrasado','Valor Atrasado - Atual','DECIMAL',NULL,NULL,NULL,1),(34,1002,'empresa','Empresa','VARCHAR',NULL,NULL,NULL,1),(35,1002,'primeira','Primeira Compra','DATA',NULL,NULL,NULL,1),(36,1002,'ultima','Ultima Compra','DATA',NULL,NULL,NULL,1),(37,1002,'maior','Maior Compra','DECIMAL',NULL,NULL,NULL,1),(38,1002,'totalvendas','Maior Compra','DECIMAL',NULL,NULL,NULL,1),(39,1002,'avista','Total Avista','DECIMAL',NULL,NULL,NULL,1),(40,1002,'aprazo','Total Aprazo','DECIMAL',NULL,NULL,NULL,1),(41,1002,'mitens','Média de Itens','DECIMAL',NULL,NULL,NULL,1),(42,1002,'mvalor','Valor Médio','DECIMAL',NULL,NULL,NULL,1),(43,1002,'ratrasado30','Valor Atrasado - 30 Dias','DECIMAL',NULL,NULL,NULL,1),(44,1002,'ratrasado60','Valor Atrasado - 60 Dias','DECIMAL',NULL,NULL,NULL,1),(45,1002,'ratrasado90','Valor Atrasado - 90 Dias','DECIMAL',NULL,NULL,NULL,1),(46,1002,'scpcstatus','Status SCPC','VARCHAR',NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `BI_MODULOS_CAMPOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_USERS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_USERS` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `IP_ADDRESS` varchar(45) NOT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `SALT` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ACTIVATION_CODE` varchar(40) DEFAULT NULL,
  `FORGOTTEN_PASSWORD_CODE` varchar(40) DEFAULT NULL,
  `FORGOTTEN_PASSWORD_TIME` int(11) unsigned DEFAULT NULL,
  `REMEMBER_CODE` varchar(40) DEFAULT NULL,
  `CREATED_ON` int(11) unsigned NOT NULL,
  `LAST_LOGIN` int(11) unsigned DEFAULT NULL,
  `ACTIVE` tinyint(1) unsigned DEFAULT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `COMPANY` varchar(100) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_USERS`
--

LOCK TABLES `BI_USERS` WRITE;
/*!40000 ALTER TABLE `BI_USERS` DISABLE KEYS */;
INSERT INTO `BI_USERS` VALUES (1,'127.0.0.1','victor','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','victorhcezario@gmail.com','',NULL,NULL,NULL,1268889823,1495296735,1,'Victor','Cezario','ADMIN','0'),(2,'127','devanir','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36',NULL,'devanir@mocassim.com.br',NULL,NULL,NULL,NULL,213,1495196969,1,'Devanir','Menezes','MOCASSIM CALÇADOS',NULL);
/*!40000 ALTER TABLE `BI_USERS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_USERS_GROUPS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_USERS_GROUPS` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) unsigned NOT NULL,
  `GROUP_ID` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UC_USERS_GROUPS` (`USER_ID`,`GROUP_ID`),
  KEY `FK_USERS_GROUPS_USERS1_IDX` (`USER_ID`),
  KEY `FK_USERS_GROUPS_GROUPS1_IDX` (`GROUP_ID`),
  CONSTRAINT `FK_USERS_GROUPS_GROUPS1` FOREIGN KEY (`GROUP_ID`) REFERENCES `BI_GROUPS` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_USERS_GROUPS_USERS1` FOREIGN KEY (`USER_ID`) REFERENCES `BI_USERS` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_USERS_GROUPS`
--

LOCK TABLES `BI_USERS_GROUPS` WRITE;
/*!40000 ALTER TABLE `BI_USERS_GROUPS` DISABLE KEYS */;
INSERT INTO `BI_USERS_GROUPS` VALUES (1,1,1),(2,1,2);
/*!40000 ALTER TABLE `BI_USERS_GROUPS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BI_VIEW_VENDAS`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BI_VIEW_VENDAS` (
  `pessoa` char(6) DEFAULT NULL,
  `nome` char(50) DEFAULT NULL,
  `idade` int(53) DEFAULT NULL,
  `primeira` date DEFAULT NULL,
  `ultima` date DEFAULT NULL,
  `maior` decimal(10,0) DEFAULT NULL,
  `numero` bigint(64) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `avista` decimal(10,0) DEFAULT NULL,
  `aprazo` decimal(10,0) DEFAULT NULL,
  `mitens` decimal(10,0) DEFAULT NULL,
  `mvalor` decimal(10,0) DEFAULT NULL,
  `ultimaempresa` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BI_VIEW_VENDAS`
--

LOCK TABLES `BI_VIEW_VENDAS` WRITE;
/*!40000 ALTER TABLE `BI_VIEW_VENDAS` DISABLE KEYS */;
/*!40000 ALTER TABLE `BI_VIEW_VENDAS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-20 14:17:47
