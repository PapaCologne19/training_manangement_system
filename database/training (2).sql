-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 07:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `count_visit` int(50) NOT NULL,
  `date_logged_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `name`, `user_type`, `count_visit`, `date_logged_in`) VALUES
(1, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 1, '2024-01-30 02:15:45'),
(2, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 2, '2024-01-30 08:07:33'),
(3, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 3, '2024-01-30 08:08:21'),
(4, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 4, '2024-01-30 08:10:17'),
(5, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 5, '2024-01-30 08:15:59'),
(6, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 6, '2024-01-30 08:19:21'),
(7, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 7, '2024-01-30 08:20:08'),
(8, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 8, '2024-01-30 08:49:25'),
(9, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 9, '2024-01-30 08:49:53'),
(10, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 10, '2024-01-30 23:48:00'),
(11, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 11, '2024-01-30 23:50:34'),
(12, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 12, '2024-01-31 06:26:07'),
(13, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 13, '2024-01-31 06:40:39'),
(14, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 14, '2024-02-02 02:16:19'),
(15, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 15, '2024-02-02 02:16:43'),
(16, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 15, '2024-02-02 05:03:35'),
(17, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 16, '2024-02-02 05:14:11'),
(18, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 17, '2024-02-02 05:21:36'),
(19, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 18, '2024-02-02 05:33:40'),
(20, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 19, '2024-02-02 07:16:02'),
(21, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 20, '2024-02-02 07:21:17'),
(22, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 21, '2024-02-02 07:23:52'),
(23, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 22, '2024-02-02 08:29:40'),
(24, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 23, '2024-02-03 04:29:01'),
(25, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 24, '2024-02-03 04:29:15'),
(26, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 25, '2024-02-05 00:32:45'),
(27, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 26, '2024-02-05 06:18:34'),
(28, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 27, '2024-02-05 08:31:21'),
(29, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 28, '2024-02-05 08:31:43'),
(30, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 29, '2024-02-06 00:27:48'),
(31, 'jpgomera19', 'James Philip Gomera', 'ADMIN', 30, '2024-02-06 03:34:49'),
(32, 'deployment', 'JAMES PHILIP GOMERA', 'USER', 31, '2024-02-06 05:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `supervisor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `supervisor`) VALUES
(1, 'ABANDO, HEIDEL'),
(2, 'ABESAMIS, JORECK'),
(3, 'AGABIN, ZHA-ZHA'),
(4, 'AGUILAR, KRISTI'),
(5, 'ALVAREZ, DAISY'),
(6, 'AMEN, CASELYN'),
(7, 'AQUINO, MARIA GRACIA'),
(8, 'ARELLANO, BEN'),
(9, 'ARELLANO, JENNY'),
(10, 'AROCHA, KIRK'),
(11, 'AVILA, HERVILYN'),
(12, 'AVILA, RICHARD'),
(13, 'BACSID, MARYJUN'),
(14, 'BAEROY, ALLAN'),
(15, 'BALARAO-GARCIA, REYCHELYN ROMANO'),
(16, 'BALDONADO, MIKAL'),
(17, 'BARAQUIEL, ARAYAN'),
(18, 'BARRERA, RHYAN'),
(19, 'BATACLAN, EARL DENNIS'),
(20, 'BAUTISTA, JOAN'),
(21, 'BERSABE, DANILO'),
(22, 'BONITO, MICHAEL'),
(23, 'BRAZAL, FRANCO'),
(24, 'BREQUILLO, ROEL'),
(25, 'BUCANE, LEAH MIE'),
(26, 'CAMET, SHIELA MARIE'),
(27, 'CANDELARIO, FELICISIMO'),
(28, 'CASTILLO, JOAN'),
(29, 'CASTILLO, MHEN'),
(30, 'CASUCO, MARIO JR.'),
(31, 'CASUGA, ERIC'),
(32, 'CEDULA, EDWIN'),
(33, 'CEPEDA, OFELIA'),
(34, 'CONADO, MIE'),
(35, 'CONAG, FLORENTINO'),
(36, 'CORTEZ, MICHAEL'),
(37, 'CRISTOBAL, JOHN KENNETH'),
(38, 'DAYAWON, ALFRED'),
(39, 'DE GUZMAN, LAHARNE'),
(40, 'DE LEON, JOHNNY'),
(41, 'DE ROMA, EDNA'),
(42, 'DE ZUÑIGA, CESAR'),
(43, 'DEANG, ROSE'),
(44, 'DIANON, RYAN'),
(45, 'DIMAILIG, DORIE'),
(46, 'DINGDING, KHRISNA'),
(47, 'DUMAS, MARY BLANCH'),
(48, 'ENCARNACION, JEROME'),
(49, 'FORCADAS, EULY'),
(50, 'GALARZA, MARIFLOR'),
(51, 'GALVEZ, MANNY'),
(52, 'GARCIA, RHODA'),
(53, 'GARCIA, RUDOLF'),
(54, 'GARCIA, VANESSA'),
(55, 'GARGANTA, EDWIN'),
(56, 'GARMA, JOAN JOY'),
(57, 'GATDULA, MARK JOSEPH'),
(58, 'HABANA, ETHELYN'),
(59, 'HERRERA, RIZA'),
(60, 'HILASGUE, WELYN'),
(61, 'HOLANDA, KRISTEL DOMINQUE'),
(62, 'INCOY, ALEX'),
(63, 'INOCENCIO, CHARMAINE'),
(64, 'JUSAY, SARRA JANE'),
(65, 'LAZARITO, ERIK'),
(66, 'LAZARTE, RICHARD CRISTOPHER B.'),
(67, 'LEOSALA, KEEMPEE'),
(68, 'LLANTE, MARY ANN CLAYDINE'),
(69, 'LONGALONG, VIRGILIO'),
(70, 'LOPEZ, JOBELLE'),
(71, 'LU, ALVIN'),
(72, 'LUNA, JONATHAN'),
(73, 'MACARARANGA, NICKY'),
(74, 'MADRIAGA, JASON'),
(75, 'MADRIDEO, RONALD'),
(76, 'MAGBAG, ROWENA'),
(77, 'MAGNO, RICHARD'),
(78, 'MAGTIBAY, KARLA WAYNE'),
(79, 'MAGTIBAY, ROMEO'),
(80, 'MALECDAN, HOLLEN'),
(81, 'MANALAD, CRIS'),
(82, 'MANALASTAS, MICHAEL'),
(83, 'MANALO, EVER'),
(84, 'MANALO, ROMMEL'),
(85, 'MANUEL, JOANA'),
(86, 'MARIANO, MILD'),
(87, 'MARQUEZ, FREDERICK'),
(88, 'MARTE, NOEL'),
(89, 'MENDOZA, EDWARD'),
(90, 'MENDOZA, RUZZAINE'),
(91, 'MORATILLO, BRIANDY'),
(92, 'NATAC, JEROLD'),
(93, 'NAVARRO, BRAYN'),
(94, 'NINENG, ROXAN'),
(95, 'NOCOS, NORLITO'),
(96, 'NOVESTERAS, ARNEL'),
(97, 'ONDA, ELENO'),
(98, 'ORMACIDO, ANGELICA'),
(99, 'ORTIZ, JOHANNA'),
(100, 'PAGALPALAN, JUDILYN'),
(101, 'PANGILINAN, TIRSO'),
(102, 'PATRONA, WINCHARLES'),
(103, 'PEREZ, LEA'),
(104, 'PERONCE, FREDDIE'),
(105, 'PESIGAN, AILEEN'),
(106, 'PILAPIL, SARAH MAE'),
(107, 'PILIOTAS, ARIEL'),
(108, 'PUNZALAN, ARMEL'),
(109, 'PURAL, MAE'),
(110, 'PURGANAN, VIRGILIO'),
(111, 'RABOY, ELIJARDO'),
(112, 'RAMA, RAYMON'),
(113, 'RANTAEL, MA CRISTINA'),
(114, 'RESUELLO, JESSIE'),
(115, 'RIVERA, VIVIAN'),
(116, 'ROCAS, JENALYN'),
(117, 'ROJO, LEONARDO'),
(118, 'RUEDAS, RICHARD'),
(119, 'SABANGAN, JONATHAN'),
(120, 'SALAMANQUE, RODERINE'),
(121, 'SALAS, MARK LOUIE'),
(122, 'SAMOTOS, LAURENZ'),
(123, 'SANTOS, APRIL ANN'),
(124, 'SANTOS, KAYLE LAUREN'),
(125, 'SARMIENTO, RICHARD'),
(126, 'SIBAY, ROXAN'),
(127, 'SORIANO, RODRIGO'),
(128, 'TAMPOS, MELCHOR'),
(129, 'TE, REGINE MOORE AGANG'),
(130, 'TEJERESO, DEXTER'),
(131, 'TIGLAO, KEVIN'),
(132, 'TOMBOC, ALBERT'),
(133, 'TONGCO, MENANDRO JR.'),
(134, 'TORRE, JOYCE'),
(135, 'TORRES, JEFFERSON'),
(136, 'TRILLANA, BILLY JOEL'),
(137, 'USI, JULIET'),
(138, 'VENZON, JONAHLYN'),
(139, 'YAMZON, MELVIN'),
(140, 'YBANEZ, GORDIANO');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `training_title` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `venue` varchar(255) NOT NULL,
  `facilitator` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `training_title`, `datetime`, `venue`, `facilitator`, `division`, `created_at`, `updated_at`) VALUES
(1, 'Code of Conduct Training Seminar', '2024-01-31 13:00:00', 'PCN Promopro Inc.', 'CASTILLO, MHEN', 'STRAT', '2024-01-29 08:29:54', '2024-01-29 08:29:54'),
(2, 'Selecta Promodiser Training', '2024-02-03 10:00:00', 'PCN Promopro Inc.', 'ARELLANO, JENNY', 'BD1', '2024-01-29 08:35:21', '2024-01-30 01:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `training_request`
--

CREATE TABLE `training_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `training_title` varchar(255) NOT NULL,
  `datetime_request` datetime NOT NULL,
  `venue` varchar(255) NOT NULL,
  `facilitator` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `is_approve` int(11) DEFAULT '0',
  `is_done` int(11) NOT NULL DEFAULT '0' COMMENT '0=pending; 1=done',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_request`
--

INSERT INTO `training_request` (`id`, `user_id`, `training_title`, `datetime_request`, `venue`, `facilitator`, `division`, `is_approve`, `is_done`, `created_at`, `updated_at`) VALUES
(1, 2, 'Code of Conduct Training Seminar', '2024-01-31 13:00:00', 'PCN Promopro Inc.', 'CASTILLO, MHEN', 'MIS', 2, 0, '2024-02-02 05:32:03', '2024-02-02 07:16:30'),
(2, 2, 'Selecta Promodiser Training', '2024-02-03 10:00:00', 'PCN Promopro Inc.', 'ARELLANO, JENNY', 'MIS', 1, 1, '2024-02-02 05:32:06', '2024-02-02 07:28:10'),
(3, 2, 'Selecta Promodiser Training', '2024-02-03 10:00:00', 'PCN Promopro Inc.', 'ARELLANO, JENNY', 'MIS', 0, 0, '2024-02-05 08:31:23', '2024-02-05 08:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `principal` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'USER',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `email_address`, `division`, `id_number`, `principal`, `supervisor`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'jpgomera19', '$2y$10$aWv6OxFmihXGqPxLLYcalufaS5Cp/SoI5CLX/w7EJXy0FQUNCMYvC', 'James Philip', 'Amante', 'Gomera', 'jpgomera19@gmail.com', 'STRAT', '123456789', 'Secret', '', 'ADMIN', '2024-01-29 06:18:19', '2024-02-03 06:51:49'),
(2, 'deployment', '$2y$10$GERcGxEU4THzNqgSEtBNE.Yr7enhgYc85kwDO768EoLyqJt7j6v1u', 'JAMES PHILIP', 'AMANTE', 'GOMERA', 'jpgomera19@gmail.com', 'MIS', '312312', 'URIC - SOUTH PROX', 'URIC - SMKT2', 'USER', '2024-01-29 07:18:45', '2024-02-03 06:51:53'),
(3, 'adasdas', '$2y$10$o7Meq6IM3wypIEVzyXLrceNUf3BGdafyFFJQIJdezpLfhKHg/tCWy', 'asdasd', 'asdasd', 'asdasd', 'asdasdas@gmail.com', 'dasdasd', 'asdasdasd', 'URIC - TACTICAL', 'BALARAO-GARCIA, REYCHELYN ROMANO', 'USER', '2024-01-29 07:33:04', '2024-02-03 06:51:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_request`
--
ALTER TABLE `training_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training_request`
--
ALTER TABLE `training_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
