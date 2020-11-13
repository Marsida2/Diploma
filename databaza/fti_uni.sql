-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 12:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fti_uni`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokument`
--

CREATE TABLE `dokument` (
  `data` datetime NOT NULL,
  `emer_dok` varchar(100) NOT NULL,
  `kod_lende` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokument`
--

INSERT INTO `dokument` (`data`, `emer_dok`, `kod_lende`) VALUES
('2020-09-21 05:58:33', 'kerkesat.docx', 'inf101'),
('2020-09-21 05:58:39', 'relationship.PNG', 'inf101'),
('2020-09-21 05:58:45', 'sqlKodi.docx', 'inf101'),
('2020-09-21 05:58:54', 'index.php', 'inf101'),
('2020-09-21 06:07:23', 'index.php', 'inf101'),
('2020-10-04 16:40:06', '', 'inf101');

-- --------------------------------------------------------

--
-- Table structure for table `koment`
--

CREATE TABLE `koment` (
  `permbajtja` varchar(500) NOT NULL,
  `data` datetime NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_postues` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `koment`
--

INSERT INTO `koment` (`permbajtja`, `data`, `id_post`, `id_postues`) VALUES
('test #1', '2020-09-28 16:14:39', 3, 1),
('test #2', '2020-09-28 16:14:57', 3, 1),
('test #2', '2020-09-28 16:15:05', 3, 1),
('kur mund taterheqim mandatin e pageses?', '2020-09-28 16:29:26', 1, 1),
('shkruaj prape', '2020-10-06 14:42:04', 3, 1),
('srf', '2020-10-06 16:32:36', 3, 1),
('kjhkh', '2020-10-06 16:33:01', 3, 1),
('rga', '2020-10-06 16:33:24', 3, 1),
('kj', '2020-10-06 16:34:29', 3, 1),
('shtimi fundit', '2020-10-06 16:43:17', 3, 1),
('dfvs', '2020-10-07 14:32:26', 2, 1),
('dfc', '2020-10-07 14:34:34', 2, 1),
('efjerpofj', '2020-10-10 18:19:24', 1, 1),
('gjg', '2020-10-21 17:08:55', 2, 1),
('zysha i perjashtoi', '2020-10-04 01:27:35', 3, 2),
('Jo, sdo te perfshihet.', '2020-10-05 00:07:57', 3, 2),
('okok', '2020-10-20 17:29:04', 2, 3),
('Suksese te gjitheve!', '2020-10-25 21:26:39', 54, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lende`
--

CREATE TABLE `lende` (
  `kodi` varchar(6) NOT NULL,
  `emertimi` varchar(100) NOT NULL,
  `pershkrimi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lende`
--

INSERT INTO `lende` (`kodi`, `emertimi`, `pershkrimi`) VALUES
('elk100', 'Elektroteknikë', 'Lënda ka për qëllim të japë njohuritë teorike bazë për analizën formale të të gjitha qarqeve lineare me parametra të përqëndruar. Objekti i lëndës janë rezistive, ato me perforcues operacionale (OA), dhe ato me elemente grumbullues energjie (L,C), në regjimet e qendrueshme dhe ato kalimtare. Njohuritë empirike të studentit mbi ligjet themeltare te elektroteknikës do ngrihen në një nivel të ri teorik nëpërmjet paraqitjes së tyre në trajtat formale përgjithësuese. Më tej, njohuritë e studentit do të zgjerohen me disa nga ligjet dhe teoremat e qarqeve elektrike lineare, duke përmbyllur formimin e kuadrit bazë për analizën dhe llogaritjen e qarqeve të mësipërme, kryesisht nën veprimin e eksitimeve DC.'),
('elk200', 'Sisteme elektronike', 'Lënda është e strukturuar në dy pjesë: Sistemet Analoge dhe Sistemet Numerike. Kjo lëndë\r\nka për qëllim të japë njohuritë bazë në analizën e qarqeve të amplifikatorëve diferencialë BJT\r\ndhe MOS. Përgjigjia në frekuencë të ulët dhe të lartë të amplifikatorëve CS dhe CE, analiza\r\nnë rrafshin-s, polet, zerot, diagrama Bode dhe funksioni i transferimit të amplifikatorit. Çiftimi i\r\nkundërt negativ, katër topologjitë bazë të çiftimit të kundërt janë çështje të rëndësishme të\r\nanalizës së Sistemeve Analoge. Në pjesën e Sistemeve Numerike do të analizohen qarqet\r\nnumerike MOS, qarqet me portë llogjike CMOS, Flip-flopet, memoriet RAM, ROM dhe ROM\r\ntë programueshme.'),
('inf000', 'Elementet e Informatikës', 'Kjo lëndë ka si qëllim që të japë njohuritë bazë të sistemeve kompjuterike duke filluar nga\r\nsistemet e numrave deri në mënyrën se si është organizuar makina llogaritëse në\r\npikëpamjen hardware dhe atë software.'),
('inf101', 'Algoritëm dhe programim i avancuar', 'Qëllimi i kësaj lënde është t’u mësojë studentëve aftësinë për të analizuar dhe implementuar zgjidhjet\r\ne problemeve të ndryshme me maksimumin e eficensës. Lënda ka si objektiv njohjen e studentëve me\r\nstrukturat kryesore të të dhënave, metodat për të manipuluar sasi të mëdha informacioni, analizen e\r\nalgoritmeve dhe parashikimin e kohës së ekzekutimit të tyre. Meqënëse njësitë procesuese janë bërë\r\ngjithmonë e më të thjeshta, shpesh herë lind nevoja të trajtohet një sasi e madhe inputi në mënyrë sa\r\nmë eficente. Duke analizuar një algoritëm para se të implementohet kodi i tij, studentët do të jenë në\r\ngjendje të vlerësojnë nqs një zgjidhje e caktuar është apo jo e përshtatshme për nga performanca.'),
('inf103', 'Teknikat dhe gjuhët e programimit', 'Programi është bazuar në një literaturë bashkëkohore dhe në ndërthurjen e leksioneve me\r\nseminaret, punët laboratorike dhe detyrat e kursit. Ka si objektiv përgatitjen e studenteve me\r\nnjohuri bazë mbi mënyrat e programimit dhe ndërtimit e aplikimeve në gjuhën e programimit\r\nC.'),
('SY02', 'Probabilitet', 'Lënda ka për qëllim të japë njohuritë bazë në kuptimet më të rëndësishme probabilitare.\r\nTeoria e probabiliteteve ndërton modele matematike që formalizojnë një dukuri për këtë\r\narsye kjo lëndë synon zhvillimin e intuitës së studentit në mënyrë që ai të kuptojë dhe të\r\nformalizojë situata probabilitare. Në këtë kurs përfshihen njohuri për ngjarjet e rastit të lidhura\r\nme hapësirën e rezultateve të mundshme të provës dhe trajtohet formalisht kuptimi i\r\nprobabiliteteve, gjithashtu shqyrtohen ndryshoret e rastit, si dhe mjaft kuptime të\r\nrëndësishme që lidhen me to.\r\n'),
('tlk100', 'Bazat e telekomunikacioneve', 'Të japë njohuritë bazë në telekomunikacione dhe informacion. Burimet e informacionit dhe\r\nnjësitë e matjes së tij. Komunikimi dhe principet bazë të tij, sinjalet dhe impulset, tipet e\r\nimpulseve dhe mënyrat e transmetimit në telekomunikacion. Sistemet e telekomit, objektivat\r\nkushtet e një sistemi. Standartizimi. Kriteret bazë të transmetimit dhe parametrat.Qëllimi dhe\r\nprincipi bazë i modulimit. Multipleksimi dhe kampionimi i sinjaleve.Sistemet numerike të\r\nkomunikimit, Sinjali PCM dhe DPCM. Sistemet radioure, principi i ndërtimit dhe elementët e\r\ntyre. Radiourat numerike, modulimet numerike në radioura ASK, FSK dhe PSK.'),
('tlk101', 'Elektronika për telekom', 'Studenti duhet të ketë fituar njohuritë bazë në lëndët Elementët dhe teknologjitë elektronike dhe\r\nSistemet elektronike: për qarqet me tranzistorët BJT, FET, linearizimin e elementeve\r\naktiv,amplifikatorët operacional dhe qarqet e përfituara prej tyre sikurse dhe llogjika kombinatorike.\r\nElektronika per Telecom ka si objektiv përgatitjen e studentëve me njohuritë shtesë të elektronikave\r\ntë mëparshme si psh amplifikatorët e fuqishëm të klasës C, modulimi AM,FM, demodulimi,\r\nautogjeneratorët sinusoidale, gjeneratorët impulsive, ndërruesit e frekuencës dhe marrësit me qarqe\r\ntë integruara.');

-- --------------------------------------------------------

--
-- Table structure for table `perdorues`
--

CREATE TABLE `perdorues` (
  `id_perdorues` int(11) NOT NULL,
  `emri` varchar(25) NOT NULL,
  `mbiemri` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fjalekalimi` varchar(32) NOT NULL,
  `roli` varchar(1) NOT NULL CHECK (`roli` in ('a','p','s')),
  `foto_profili` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perdorues`
--

INSERT INTO `perdorues` (`id_perdorues`, `emri`, `mbiemri`, `email`, `fjalekalimi`, `roli`, `foto_profili`) VALUES
(1, 'admin', 'fti', 'admin@fti.edu.al', '21232f297a57a5a743894a0e4a801fc3', 'a', '5f9149c544d9dunknown.png'),
(2, 'Studenti', 'Test', 'student@fti.edu.al', 'cd73502828457d15655bbd7a63fb0bc8', 's', 'unknown.png'),
(3, 'Pedagogu', 'Test', 'pedagog@fti.edu.al', 'b02079c1ada232d3169a7b12b052fdbf', 'p', 'unknown.png'),
(4, 'Keti', 'Manaj', 'ketimanaj@gmail.com', 'f542a15207506cde02a13e648815aa57', 'p', 'unknown.png'),
(5, 'Ana', 'Kola ', 'anakola@yahoo.com', '9b557be07ba6239c426f6e607ecd9be3', 's', 'unknown.png'),
(6, 'Era', 'Koshi', 'ekoshi@gmail.com', 'c84a7a29ab816cfb3b3f70362224684f', 's', 'unknown.png');

-- --------------------------------------------------------

--
-- Table structure for table `pergjegjes_lende`
--

CREATE TABLE `pergjegjes_lende` (
  `kod_lende` varchar(6) NOT NULL,
  `id_pedagog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pergjegjes_lende`
--

INSERT INTO `pergjegjes_lende` (`kod_lende`, `id_pedagog`) VALUES
('inf000', 4),
('inf101', 3),
('inf103', 3),
('tlk100', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pergjigje`
--

CREATE TABLE `pergjigje` (
  `id_pergjigje` int(11) NOT NULL,
  `pergjigja` varchar(255) NOT NULL,
  `sakte` tinyint(1) NOT NULL,
  `id_pyetje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pergjigje`
--

INSERT INTO `pergjigje` (`id_pergjigje`, `pergjigja`, `sakte`, `id_pyetje`) VALUES
(1, 'frontend', 0, 1),
(2, 'backend', 1, 1),
(3, 'databaze', 0, 1),
(4, 'asnjera', 0, 1),
(5, 'po', 1, 2),
(6, 'jo', 0, 2),
(7, 'relacionale', 1, 3),
(8, 'jorelacionale', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pike`
--

CREATE TABLE `pike` (
  `id_testi` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `piket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pike`
--

INSERT INTO `pike` (`id_testi`, `id_student`, `piket`) VALUES
(1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `titulli` varchar(100) DEFAULT NULL,
  `permbajtja` text NOT NULL,
  `data` datetime NOT NULL,
  `kod_lende` varchar(6) NOT NULL,
  `id_postues` int(11) NOT NULL,
  `upload` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `titulli`, `permbajtja`, `data`, `kod_lende`, `id_postues`, `upload`) VALUES
(1, 'Provimet e vjeshtes', 'Te gjithe studentet qe kane per tu futur ne sezonin e vjeshtes duhet te kene paguar paraprakisht tarifen shkollore. Kusht hyres ne provime.', '2020-09-21 09:02:00', 'inf101', 4, NULL),
(2, NULL, 'Ne cilen date do te zhvillohet mbrojtja e diplomave?', '2020-09-27 12:07:00', 'inf101', 2, NULL),
(3, 'Pyetje mbi kolegiumin', 'Do te  perfshihet ne kolegium kapitulli i zhvilluar oren e fundit?', '2020-09-27 14:01:12', 'inf101', 1, NULL),
(45, 'Aplikimet per master', 'Ju bejme me dije se jane hapur tashme regjistrimet per master profesional dhe shknecor. Per me shume informacioni ju ftojme prane ambjenteve te universitetit ose nepermjet adresave elektronike te interesoheni. Ju faleminderit', '2020-10-19 03:51:20', 'tlk100', 3, ''),
(51, 'UBT-CERT', 'Sesioni qe u mbajt sot pati fokus informimin e sutdentëve për temat që do të trajtohen nga kjo akademi e cila ndihmon dhe zhvillon shkencën dhe gjithë TIK-un', '2020-10-19 11:23:02', 'inf101', 3, '5f8d5af6b4dadfti.jpg'),
(54, 'DII-MBROJTJA E PRAKTIKAVE DHE DIPLOMAVE, VJESHTE 2020', 'Ju kujtoj se dorezimi i Relacionit te Praktikes dhe Temes se Diplomes do te kryhet ne Departament, date 26 Tetor, zyra 214, ora 10-11:30 Bachelor, 11:30 - 13:00 Master. \r\nPer studentet qe nuk kane kryer dot Praktiken ne nje institucion/kompani, Relacioni i Praktikes do te jete i njejte me pjesen praktike te Diplomes. Ne te kundert, studenti do te dorezoje Praktiken e zhvilluar ne kompani.', '2020-10-25 21:21:41', 'inf101', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `pyetje`
--

CREATE TABLE `pyetje` (
  `id_pyetje` int(11) NOT NULL,
  `pyetja` varchar(255) NOT NULL,
  `id_testi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pyetje`
--

INSERT INTO `pyetje` (`id_pyetje`, `pyetja`, `id_testi`) VALUES
(1, 'PHP perdoret ne:', 1),
(2, 'PHP eshte gjuhe e orientuar nga objekti?', 1),
(3, 'SQL perdoret ne databazat:', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regjistrim_lende`
--

CREATE TABLE `regjistrim_lende` (
  `kod_lende` varchar(6) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regjistrim_lende`
--

INSERT INTO `regjistrim_lende` (`kod_lende`, `id_student`) VALUES
('elk200', 2),
('elk200', 6),
('inf101', 2),
('inf101', 5),
('inf101', 6),
('inf103', 2),
('inf103', 5),
('inf103', 6);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL,
  `emertim_testi` varchar(100) NOT NULL,
  `kod_lende` varchar(6) NOT NULL,
  `fillimi` datetime NOT NULL,
  `mbarimi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `emertim_testi`, `kod_lende`, `fillimi`, `mbarimi`) VALUES
(1, 'Kolokiumi i Dhjetorit', 'inf101', '2020-09-23 15:00:00', '2020-10-18 12:32:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokument`
--
ALTER TABLE `dokument`
  ADD PRIMARY KEY (`kod_lende`,`data`);

--
-- Indexes for table `koment`
--
ALTER TABLE `koment`
  ADD PRIMARY KEY (`id_postues`,`data`),
  ADD KEY `koment_ibfk_1` (`id_post`);

--
-- Indexes for table `lende`
--
ALTER TABLE `lende`
  ADD PRIMARY KEY (`kodi`);

--
-- Indexes for table `perdorues`
--
ALTER TABLE `perdorues`
  ADD PRIMARY KEY (`id_perdorues`);

--
-- Indexes for table `pergjegjes_lende`
--
ALTER TABLE `pergjegjes_lende`
  ADD PRIMARY KEY (`kod_lende`,`id_pedagog`),
  ADD KEY `pergjegjes_lende_ibfk_2` (`id_pedagog`);

--
-- Indexes for table `pergjigje`
--
ALTER TABLE `pergjigje`
  ADD PRIMARY KEY (`id_pergjigje`),
  ADD KEY `pergjigje_ibfk_1` (`id_pyetje`);

--
-- Indexes for table `pike`
--
ALTER TABLE `pike`
  ADD PRIMARY KEY (`id_testi`,`id_student`),
  ADD KEY `pike_ibfk_2` (`id_student`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `post_ibfk_1` (`kod_lende`),
  ADD KEY `post_ibfk_2` (`id_postues`);

--
-- Indexes for table `pyetje`
--
ALTER TABLE `pyetje`
  ADD PRIMARY KEY (`id_pyetje`),
  ADD KEY `pyetje_ibfk_1` (`id_testi`);

--
-- Indexes for table `regjistrim_lende`
--
ALTER TABLE `regjistrim_lende`
  ADD PRIMARY KEY (`kod_lende`,`id_student`),
  ADD KEY `regjistrim_lende_ibfk_2` (`id_student`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`),
  ADD KEY `test_ibfk_1` (`kod_lende`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perdorues`
--
ALTER TABLE `perdorues`
  MODIFY `id_perdorues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `pergjigje`
--
ALTER TABLE `pergjigje`
  MODIFY `id_pergjigje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pyetje`
--
ALTER TABLE `pyetje`
  MODIFY `id_pyetje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokument`
--
ALTER TABLE `dokument`
  ADD CONSTRAINT `dokument_ibfk_1` FOREIGN KEY (`kod_lende`) REFERENCES `lende` (`kodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koment`
--
ALTER TABLE `koment`
  ADD CONSTRAINT `koment_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koment_ibfk_2` FOREIGN KEY (`id_postues`) REFERENCES `perdorues` (`id_perdorues`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pergjegjes_lende`
--
ALTER TABLE `pergjegjes_lende`
  ADD CONSTRAINT `pergjegjes_lende_ibfk_1` FOREIGN KEY (`kod_lende`) REFERENCES `lende` (`kodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pergjegjes_lende_ibfk_2` FOREIGN KEY (`id_pedagog`) REFERENCES `perdorues` (`id_perdorues`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pergjigje`
--
ALTER TABLE `pergjigje`
  ADD CONSTRAINT `pergjigje_ibfk_1` FOREIGN KEY (`id_pyetje`) REFERENCES `pyetje` (`id_pyetje`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pike`
--
ALTER TABLE `pike`
  ADD CONSTRAINT `pike_ibfk_1` FOREIGN KEY (`id_testi`) REFERENCES `test` (`id_test`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pike_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `perdorues` (`id_perdorues`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`kod_lende`) REFERENCES `lende` (`kodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_postues`) REFERENCES `perdorues` (`id_perdorues`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pyetje`
--
ALTER TABLE `pyetje`
  ADD CONSTRAINT `pyetje_ibfk_1` FOREIGN KEY (`id_testi`) REFERENCES `test` (`id_test`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regjistrim_lende`
--
ALTER TABLE `regjistrim_lende`
  ADD CONSTRAINT `regjistrim_lende_ibfk_1` FOREIGN KEY (`kod_lende`) REFERENCES `lende` (`kodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regjistrim_lende_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `perdorues` (`id_perdorues`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`kod_lende`) REFERENCES `lende` (`kodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
