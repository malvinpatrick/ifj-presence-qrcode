-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 02:22 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_23290919_ifj`
--
CREATE DATABASE IF NOT EXISTS `epiz_23290919_ifj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `epiz_23290919_ifj`;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'S1-INFORMATIKA'),
(2, 'S1-DKV'),
(3, 'S1-ELEKTRO'),
(4, 'S1-INDUSTRI'),
(5, 'S1-DESPRO'),
(6, 'D3-INFORMATIKA'),
(7, 'S1-SIB');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

DROP TABLE IF EXISTS `kehadiran`;
CREATE TABLE `kehadiran` (
  `NRP` int(9) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam_Masuk` time NOT NULL,
  `Jam_Keluar` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `NRP` int(9) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `TTL` date NOT NULL,
  `JK` varchar(8) NOT NULL,
  `jurusan` int(2) NOT NULL,
  `dihapus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NRP`, `Nama`, `TTL`, `JK`, `jurusan`, `dihapus`) VALUES
(214116299, 'Christian Nathaniel Purwanto', '1996-12-10', 'Pria', 1, 0),
(215116415, 'Alvin Nico', '1995-11-11', 'Pria', 1, 0),
(215116453, 'Jessica Wijaksono', '1998-01-07', 'Wanita', 1, 0),
(215116483, 'Yoel Vinandra', '1997-02-11', 'Pria', 1, 0),
(215120622, 'Ellen Selyna Ardinata', '1997-03-28', 'Wanita', 4, 0),
(215140058, 'Yohana Ekawati', '1996-07-08', 'Wanita', 5, 0),
(215170283, 'Nedo Arwando Dony', '1996-11-10', 'Pria', 2, 0),
(215180347, 'Anastasia Vivian Gunawan', '1998-01-10', 'Wanita', 7, 0),
(215180350, 'Angelia Fioni Melinda Gunawan', '1997-08-02', 'Wanita', 7, 0),
(215180352, 'Celine Angelina', '1997-11-03', 'Wanita', 7, 0),
(216011660, 'Dana Meidiana', '1998-05-25', 'Wanita', 6, 0),
(216116513, 'Felicia Febriani', '1998-06-17', 'Wanita', 1, 0),
(216116530, 'Kevin Christ Handjaja', '1998-04-16', 'Pria', 1, 0),
(216116537, 'Malvin Patrick', '1998-02-11', 'Pria', 1, 0),
(216116540, 'Michael Yekhonya Halim', '1997-10-08', 'Pria', 1, 0),
(216116541, 'Miranda Laurencia Santoso', '1998-03-07', 'Wanita', 1, 0),
(216116550, 'Richard Sumampouw', '1998-12-03', 'Pria', 1, 0),
(216116554, 'Steven Putra', '1998-08-09', 'Pria', 1, 0),
(216116556, 'Venty Silvana', '1998-01-27', 'Wanita', 1, 0),
(216116563, 'Yosia Febrianto', '2000-01-01', 'Pria', 1, 0),
(216120641, 'Christian Bima Reynaldi W.', '1998-04-15', 'Pria', 4, 0),
(216120658, 'Ruth Deanita Ribka Septyaningrum', '1998-09-22', 'Wanita', 4, 0),
(216140062, 'Devina', '1998-06-04', 'Wanita', 5, 0),
(216140069, 'Michael', '1997-09-15', 'Pria', 5, 0),
(216170293, 'Jeremy Geralda', '1997-05-19', 'Pria', 2, 0),
(216170304, 'Christian Tunggal', '1998-05-01', 'Pria', 2, 0),
(216170313, 'Ivan Diantoro', '1997-11-04', 'Pria', 2, 0),
(216170318, 'Kevin', '1998-03-21', 'Pria', 2, 0),
(216170328, 'Neilga Lynaindra Yuanza', '1998-09-26', 'Wanita', 2, 0),
(216170336, 'Samuel Kristianto', '1997-09-01', 'Pria', 2, 0),
(216170345, 'Yosephine Tham', '1998-06-06', 'Wanita', 2, 0),
(216180373, 'Mario Suyanta Chandra', '1998-11-17', 'Pria', 7, 0),
(217011670, 'Daud Kurnia T.', '1999-06-19', 'Pria', 6, 0),
(217116565, 'Abednego Sion Hortalanus', '1999-02-08', 'Pria', 1, 0),
(217116570, 'Albert Yasin', '2000-08-12', 'Pria', 1, 0),
(217116575, 'Anthonio Fernandie', '1999-05-13', 'Pria', 1, 0),
(217116576, 'Aris Liantono', '1999-08-01', 'Pria', 1, 0),
(217116592, 'Farrell Jovanka Tandra', '1999-11-21', 'Pria', 1, 0),
(217116616, 'Jose Ishak Yonatan', '1999-11-14', 'Pria', 1, 0),
(217116632, 'Michael Lius Balias Tambur', '1999-11-23', 'Pria', 1, 0),
(217116637, 'Mitchell Arthur Vittorio Susanto', '1999-10-08', 'Pria', 1, 0),
(217116638, 'Raymond Adi Purnomo', '1999-06-17', 'Pria', 1, 0),
(217116646, 'Rennata Natalia', '2000-03-01', 'Wanita', 1, 0),
(217116655, 'Sidarta Adhi Virya', '1999-10-05', 'Pria', 1, 0),
(217116658, 'Stevanus Billy Abraham', '1998-04-09', 'Pria', 1, 0),
(217116666, 'Wenly Poha', '2000-12-02', 'Pria', 1, 0),
(217116670, 'Willyanto Dharmawan', '1999-06-13', 'Pria', 1, 0),
(217120662, 'Albert Immanuel', '2000-09-19', 'Pria', 4, 0),
(217170356, 'Devid', '1999-10-02', 'Pria', 2, 0),
(217170357, 'Eirene Kezia', '1999-04-09', 'Wanita', 2, 0),
(217170360, 'Giovanno Joevindra Tiawan', '1999-07-21', 'Pria', 2, 0),
(217170366, 'Ike Mariawati', '1999-03-18', 'Wanita', 2, 0),
(217170367, 'Iona Berliana', '1999-10-15', 'Wanita', 2, 0),
(217170369, 'Jeanifer', '1999-04-22', 'Wanita', 2, 0),
(217170378, 'Marsha Giska', '1999-03-27', 'Wanita', 2, 0),
(217180378, 'Adelliene Talitha Daviji', '1998-09-21', 'Wanita', 2, 0),
(217180381, 'Alfa Christian', '1999-11-04', 'Pria', 7, 0),
(217180396, 'Johannes Chananta', '1999-03-08', 'Pria', 7, 0),
(217180402, 'Ong Hansel', '1999-03-11', 'Pria', 7, 0),
(217180404, 'Stefanus Nigel Anggriawan', '1997-03-04', 'Pria', 7, 0),
(218102597, 'Michael Budimihardjo', '2000-07-14', 'Pria', 3, 0),
(218102598, 'Yoel Verentino P', '2001-07-02', 'Pria', 3, 0),
(218116673, 'Davin Airlangga', '1996-03-12', 'Pria', 1, 0),
(218116675, 'Alfian Daud Isyai', '2000-04-29', 'Pria', 1, 0),
(218116678, 'Antonius David Tanaya', '2004-12-02', 'Pria', 1, 0),
(218116681, 'Daniel Christianto', '1998-12-08', 'Pria', 1, 0),
(218116685, 'Georgia Nikita', '2000-02-06', 'Wanita', 1, 0),
(218116686, 'Gilbert Christian Saputra', '2000-08-15', 'Pria', 1, 0),
(218116688, 'Ivan Budihardjo', '2000-06-15', 'Pria', 1, 0),
(218116689, 'James Jeremy Foong', '2004-12-07', 'Pria', 1, 0),
(218116692, 'Kevin Setiabudi', '2000-05-03', 'Pria', 1, 0),
(218116693, 'Kristian Mahero Utomo', '2000-05-31', 'Pria', 1, 0),
(218116695, 'Michael H Rengkuan', '1999-04-22', 'Pria', 1, 0),
(218116698, 'Nicholas Nathaniel Santoso', '2000-11-05', 'Pria', 1, 0),
(218116701, 'Richard Gunawan', '2000-06-19', 'Pria', 1, 0),
(218116702, 'Ricky Sutanto', '1999-06-15', 'Pria', 1, 0),
(218116703, 'Samuel Christian Suhartanto', '2000-08-25', 'Pria', 1, 0),
(218116705, 'Vincent Verrianto Chang', '1999-11-09', 'Pria', 1, 0),
(218116706, 'Wiratama Kevin Bunnardy', '2000-03-19', 'Pria', 1, 0),
(218116711, 'Ansell Benedy', '2000-06-24', 'Pria', 1, 0),
(218116712, 'Anthony Pranyoto', '2000-05-03', 'Pria', 1, 0),
(218116714, 'Daniel Alexander', '2000-01-23', 'Pria', 1, 0),
(218116716, 'David Kristian Timotius Ong', '2001-02-08', 'Pria', 1, 0),
(218116717, 'Denny Susastro', '1999-12-01', 'Pria', 1, 0),
(218116720, 'Fredley Antony', '2000-11-22', 'Pria', 1, 0),
(218116723, 'Ivan Lianto', '2004-12-01', 'Pria', 1, 0),
(218116724, 'Jeffry Yohanes', '2000-08-22', 'Pria', 1, 0),
(218116725, 'Jenny Chandra Foekdianto', '2000-04-02', 'Wanita', 1, 0),
(218116728, 'Leonardo Djojo Agustinus', '2000-08-02', 'Pria', 1, 0),
(218116730, 'Marco Holiwono', '2000-10-07', 'Pria', 1, 0),
(218116732, 'Monica Chandra', '2001-01-25', 'Wanita', 1, 0),
(218116736, 'Randy Benyamin', '2000-06-30', 'Pria', 1, 0),
(218116739, 'Robby Giovanni', '2000-07-31', 'Pria', 1, 0),
(218116740, 'Rommy Christensen Yuwono', '2000-02-08', 'Pria', 1, 0),
(218116741, 'Satria Setyo', '2000-06-08', 'Pria', 1, 0),
(218116742, 'Steven Antonio', '1999-11-22', 'Pria', 1, 0),
(218116743, 'Albert Yonathan', '2000-10-03', 'Pria', 1, 0),
(218116746, 'Christian Felix Tjandra', '2000-09-04', 'Pria', 1, 0),
(218116752, 'Fendy Sugiarto Gunawan', '2000-05-05', 'Pria', 1, 0),
(218116753, 'Greiq Junior', '1999-09-17', 'Pria', 1, 0),
(218116757, 'Jeremy Fanuel Wijaya', '1999-08-15', 'Pria', 1, 0),
(218116758, 'Jessica Nathania', '2000-03-30', 'Wanita', 1, 0),
(218116760, 'Jonathan Pratama', '1999-10-25', 'Pria', 1, 0),
(218116762, 'Marvel Christian Budipranata', '2000-09-30', 'Pria', 1, 0),
(218116763, 'Michael Christanto', '2000-12-18', 'Pria', 1, 0),
(218116765, 'Michael Shan Widodo', '2000-07-07', 'Pria', 1, 0),
(218116768, 'Robert William', '2000-06-11', 'Pria', 1, 0),
(218116770, 'Samuel Wijaya', '2000-11-30', 'Pria', 1, 0),
(218116771, 'Teddy Elim Tali', '2000-06-28', 'Pria', 1, 0),
(218116773, 'William Gondowidjaja', '2000-07-04', 'Pria', 1, 0),
(218116775, 'Yoshua Dwi Santoso', '2000-02-06', 'Pria', 1, 0),
(218116776, 'Yosua Alexender Yuwono', '1999-12-11', 'Pria', 1, 0),
(218120676, 'Christian Henri Feready', '2000-05-02', 'Pria', 1, 0),
(218120680, 'Oktavia Lolita', '2000-10-05', 'Wanita', 4, 0),
(218140083, 'Max Winarta', '2000-05-03', 'Pria', 5, 0),
(218140086, 'Natalia Suryadi', '2000-12-02', 'Wanita', 1, 0),
(218140087, 'Steven Julianto', '2000-07-06', 'Pria', 1, 0),
(218170402, 'Jaison Loekman', '1999-08-26', 'Pria', 2, 0),
(218170404, 'Angelina', '1998-04-02', 'Wanita', 2, 0),
(218170407, 'Bobby Christian Santono', '2000-09-09', 'Pria', 2, 0),
(218170409, 'Dave Yonathan', '1999-12-09', 'Pria', 2, 0),
(218170411, 'Fenny Angela Suprajitno', '2000-10-04', 'Wanita', 2, 0),
(218170414, 'Graceyla Illene Tanaya', '2001-10-17', 'Wanita', 2, 0),
(218170415, 'Irene Rosemary Kurniawan', '2000-09-26', 'Wanita', 2, 0),
(218170419, 'Monica Gabriel Widiyowati', '2000-01-01', 'Wanita', 2, 0),
(218170422, 'Robert Buwono Kencono', '1997-06-08', 'Pria', 2, 0),
(218170425, 'Timothy Arista Putra', '2000-08-31', 'Pria', 2, 0),
(218170426, 'Vanessa', '2000-02-12', 'Wanita', 2, 0),
(218170427, 'Yelia Deviana', '2000-12-07', 'Wanita', 2, 0),
(218170428, 'Aditya Yudha', '2000-01-01', 'Pria', 2, 0),
(218170430, 'Andre Geraldi Sondakh', '1998-07-20', 'Pria', 2, 0),
(218170431, 'Cindy Christiana', '2000-01-02', 'Wanita', 2, 0),
(218170432, 'Della Andini', '1999-06-11', 'Wanita', 2, 0),
(218170433, 'Demitrius Ixoras Akxixa Gaza', '2000-07-09', 'Pria', 2, 0),
(218170434, 'Dwitama Lingga Saputra', '2000-02-22', 'Pria', 2, 0),
(218170435, 'Fandy Gunawan', '2000-04-10', 'Pria', 2, 0),
(218170436, 'Febythalia Clara Wijaya', '2000-02-11', 'Wanita', 2, 0),
(218170437, 'Felencia Evellin', '2000-10-29', 'Wanita', 2, 0),
(218170440, 'Karina Gunawan', '2004-12-01', 'Wanita', 2, 0),
(218170442, 'Martinus Dimar Adi Prasetyo', '1999-12-03', 'Pria', 2, 0),
(218170444, 'Natanael Putra Emanuel', '2002-04-20', 'Pria', 2, 0),
(218170445, 'Oliver Orlen Utomo', '2000-04-07', 'Pria', 2, 0),
(218170449, 'Valentshia Lauwrentz Wianata', '2004-12-01', 'Wanita', 2, 0),
(218170450, 'Vincent Jaya Santoso', '2000-07-11', 'Pria', 2, 0),
(218180411, 'Bagaskara Wahyu Purbaningrat', '2000-08-26', 'Pria', 7, 0),
(218180415, 'Gabriel Nico Gunawan', '2000-10-02', 'Pria', 1, 0),
(218180416, 'Hendra Lingga Wijaya', '2000-10-17', 'Pria', 7, 0),
(218180418, 'Kevin Hongary', '2000-02-18', 'Pria', 1, 0),
(218180421, 'Miracle Valentino Moniaga', '2000-05-27', 'Pria', 1, 0),
(218180423, 'Samuel Gavin Alvido', '1999-07-24', 'Pria', 1, 0),
(218180425, 'Winda Angellina Utama', '2000-03-13', 'Wanita', 1, 0),
(218180428, 'Adella Anwary', '2001-06-07', 'Wanita', 1, 0),
(218180429, 'Andreas Adi Purwanto', '2000-04-29', 'Pria', 1, 0),
(218180435, 'Jem Angkasa Wijaya', '2000-09-12', 'Pria', 1, 0),
(218180437, 'Lukito Raharjo', '2000-01-01', 'Pria', 1, 0),
(218180440, 'Nathania Josephine Santoso', '2000-11-28', 'Wanita', 1, 0),
(218180442, 'Stefanus Sanjaya', '1999-10-08', 'Pria', 1, 0),
(218180443, 'Stephen Jaya', '2000-07-14', 'Pria', 1, 0),
(218180444, 'Wandi Nagata Sunanda', '2000-05-06', 'Pria', 1, 0),
(2147483647, 'Nedo Arwando Dony', '1996-11-10', 'Pria', 2, 0);
INSERT INTO mahasiswa VALUES('193182','Lawrence Patrick',STR_TO_DATE('06-06-2001','%d-%m-%Y'),'Pria',1,0);
INSERT INTO mahasiswa VALUES('193076','Felix Ronan',STR_TO_DATE('','%d-%m-%Y'),'Pria',,0);
INSERT INTO mahasiswa VALUES('193057','Farel H.T.',STR_TO_DATE('','%d-%m-%Y'),'Pria',,0);
INSERT INTO mahasiswa VALUES('193226','Christian Budhi S.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193036','Russel Joshua Chandra',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193328','Yohanes Tirto Pangesu',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193398','Jason Kennedy',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193384','Bryan Christopher D.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('19304','Louis Chandra',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193176','Christian T. S. L. C.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193480','Yesica Oktavia',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193101','Kevin O.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193168','Hendrik R.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193221','Kevin E.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193167','Hans F.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193230','Nicholas Hwe',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193543','Bryant Pirih',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193199','Melvin C. W.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193730','Dustin Ricardo',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193127','Marvel',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193299','Ricky Gunawan',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193419','Dave Malvin',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193150','Andrian Sagianto P.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193222','Ivan Aubrey',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193629','Ben Augueri',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193567','Leonardo Rheinhart',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193273','Brandon Budiman T.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193399','Steven Theophylus Y.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('192314','Michael Jonathan',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193333','Eurwyn M.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193025','Tito Grace Natanael',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193237','Arvindo Saputra',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193340','Jessica Victoria',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193022','Hani Lesmana',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193393','Linda Yanti Yo',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193309','Deni',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193155','Christian Evan',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193267','Marcellino Kevin H.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193148','Grady Hermawan S.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193232','Yen Eduardo',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193256','Fernando',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193157','Joshua William L.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193055','Timotius Nicky N.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193211','Nicholas A.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193141','Hanzel C.K.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193152','Jastin J.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193308','Fendy',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193093','William J. S.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193346','Rio Widyanto',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193432','Haris Priangga',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193171','Dawson Yong Chandra',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193166','JoshuaMishael Wardan',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193327','Tan Daniel Indrajaya P. P.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193164','Angeline Joanna G.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193238','Albert Gunawan',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193186','Michael Evan',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193228','Leonardo Daniel',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193058','Kenny',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193583','Samuel Irawan',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193034','Valentino Kaitofer Cardra',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193385','Lucky H.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193254','Yoshua L. K.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193375','Ivan P. Taslim',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193175','Crystalia',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193665','Renaka K.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193184','Haidee Delicia',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193184','Ariel Nova',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193244','Albert Julius',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193274','Johan Stefanus S.',STR_TO_DATE('','%d-%m-%Y'),'',,0);
INSERT INTO mahasiswa VALUES('193300',' Michelle Annabelle Surya Atmaja',STR_TO_DATE('06-06-2001','%d-%m-%Y'),'',7,0)
INSERT INTO mahasiswa VALUES('193214',' Michael Jonathan',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193274','johan stefanus sanjaya',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193223','vincensius calvin c.',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193013','christalia emerald',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193034','Valentino Kristofer Candra',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193077','Jeffrey Adrian',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193259','frely manbait',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193214','Michael Jonathan ',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('218170438','FELIX AVELLINO',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193182','Lawrence Patrick',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193010','Ray Vitto Nugroho',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193014','louis chand',STR_TO_DATE('','%d-%m-%Y'),'',,0)
INSERT INTO mahasiswa VALUES('193572','albertus verrel',STR_TO_DATE('','%d-%m-%Y'),'Pria',1,0)






-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_ministry`
--

DROP TABLE IF EXISTS `mahasiswa_ministry`;
CREATE TABLE `mahasiswa_ministry` (
  `nrp` int(9) NOT NULL,
  `id_ministry` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

DROP TABLE IF EXISTS `ministry`;
CREATE TABLE `ministry` (
  `id_ministry` int(3) NOT NULL,
  `nama_ministry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

DROP TABLE IF EXISTS `organisasi`;
CREATE TABLE `organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`NRP`,`Tanggal`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NRP`),
  ADD KEY `FK_JURUSAN_MHS` (`jurusan`);

--
-- Indexes for table `mahasiswa_ministry`
--
ALTER TABLE `mahasiswa_ministry`
  ADD PRIMARY KEY (`nrp`,`id_ministry`),
  ADD KEY `FK_MHS_MNS1` (`id_ministry`);

--
-- Indexes for table `ministry`
--
ALTER TABLE `ministry`
  ADD PRIMARY KEY (`id_ministry`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ministry`
--
ALTER TABLE `ministry`
  MODIFY `id_ministry` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `FK_01` FOREIGN KEY (`NRP`) REFERENCES `mahasiswa` (`NRP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `FK_JURUSAN_MHS` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa_ministry`
--
ALTER TABLE `mahasiswa_ministry`
  ADD CONSTRAINT `FK_MHS_MNS1` FOREIGN KEY (`id_ministry`) REFERENCES `ministry` (`id_ministry`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MHS_MNS2` FOREIGN KEY (`nrp`) REFERENCES `mahasiswa` (`NRP`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
