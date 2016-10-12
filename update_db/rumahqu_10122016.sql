-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 09:50 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rumahqu`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE IF NOT EXISTS `amenities` (
`id` tinyint(4) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, ' Kipas Angin', '2016-06-09 16:23:44', '2016-06-09 16:23:44'),
(2, ' Dapur bersama', '2016-06-09 16:23:48', '2016-06-09 16:23:48'),
(3, ' Dapur Dalam', '2016-06-09 16:23:52', '2016-06-09 16:23:52'),
(4, ' AC', '2016-06-19 13:50:24', '2016-06-19 13:50:24'),
(5, ' Kulkas', '2016-06-19 13:50:31', '2016-06-19 13:50:31'),
(6, ' Lemari', '2016-06-19 13:50:35', '2016-06-19 13:50:35'),
(7, ' Mesin Cuci', '2016-06-19 13:50:41', '2016-06-19 13:50:41'),
(8, ' Kamar Mandi Dalam', '2016-06-19 13:50:50', '2016-06-19 13:50:50'),
(9, ' Kasur', '2016-06-19 13:51:00', '2016-06-19 13:51:00'),
(10, ' Ruang tamu', '2016-06-19 13:51:10', '2016-06-19 13:51:10'),
(11, ' Blower', '2016-06-20 08:42:50', '2016-06-20 08:42:50'),
(12, 'Internet', '2016-10-10 12:25:44', '2016-10-10 12:25:44'),
(13, 'TV', '2016-10-10 12:26:14', '2016-10-10 12:26:14'),
(14, 'Balkon Pribadi', '2016-10-10 12:26:46', '2016-10-10 12:26:46'),
(15, 'Meja ', '2016-10-10 12:26:52', '2016-10-10 12:26:52'),
(16, 'Kursi', '2016-10-10 12:26:55', '2016-10-10 12:26:55'),
(17, 'Rak Buku,', '2016-10-10 12:26:59', '2016-10-10 12:26:59'),
(18, 'Telepon Kamar', '2016-10-10 12:27:05', '2016-10-10 12:27:05'),
(19, 'Air Panas', '2016-10-10 12:27:20', '2016-10-10 12:27:20'),
(20, 'Wastafel', '2016-10-10 12:27:23', '2016-10-10 12:27:23'),
(21, 'Room Cleaning', '2016-10-10 12:27:45', '2016-10-10 12:27:45'),
(22, 'Parkir Mobil', '2016-10-10 12:27:50', '2016-10-10 12:27:50'),
(23, 'Kasur', '2016-10-10 12:36:58', '2016-10-10 12:36:58'),
(24, 'Kamar Mandi Luar', '2016-10-10 12:43:02', '2016-10-10 12:43:02'),
(25, 'Parkir Motor', '2016-10-10 12:44:25', '2016-10-10 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
`id` int(11) NOT NULL,
  `position` tinyint(4) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `county_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `county_id`, `created_at`, `updated_at`) VALUES
(11, 'Banda Aceh', 6, '2016-10-08 22:09:40', '2016-10-08 22:09:40'),
(12, 'Langsa', 6, '2016-10-08 22:09:47', '2016-10-08 22:09:47'),
(13, 'Lhokseumawe', 6, '2016-10-08 22:09:56', '2016-10-08 22:09:56'),
(14, 'Meulaboh', 6, '2016-10-08 22:10:06', '2016-10-08 22:10:06'),
(15, 'Sabang', 6, '2016-10-08 22:10:11', '2016-10-08 22:10:11'),
(16, 'Subulussalam', 6, '2016-10-08 22:10:18', '2016-10-08 22:10:18'),
(17, 'Denpasar', 7, '2016-10-08 22:10:26', '2016-10-08 22:10:26'),
(18, 'Pangkal Pinang', 8, '2016-10-08 22:10:44', '2016-10-08 22:10:44'),
(19, 'Cilegon', 9, '2016-10-08 22:10:53', '2016-10-08 22:10:53'),
(20, 'Serang', 9, '2016-10-08 22:11:01', '2016-10-08 22:11:01'),
(21, 'Tanggerang Selatan', 9, '2016-10-08 22:11:21', '2016-10-08 22:11:21'),
(22, 'Tanggerang', 9, '2016-10-08 22:11:29', '2016-10-08 22:11:29'),
(23, 'Bengkulu', 10, '2016-10-08 22:11:34', '2016-10-08 22:11:34'),
(24, 'Gorontalo', 11, '2016-10-08 22:11:39', '2016-10-08 22:11:39'),
(25, 'Jakarta Barat', 12, '2016-10-08 22:11:45', '2016-10-08 22:11:45'),
(26, 'Jakarta Pusat', 12, '2016-10-08 22:11:51', '2016-10-08 22:11:51'),
(27, 'Jakarta Selatan', 12, '2016-10-08 22:12:14', '2016-10-08 22:12:14'),
(28, 'Jakarta Timur', 12, '2016-10-08 22:12:19', '2016-10-08 22:12:19'),
(29, 'Jakarta Utara', 12, '2016-10-08 22:12:23', '2016-10-08 22:12:23'),
(30, 'Sungai Penuh', 13, '2016-10-08 22:12:28', '2016-10-08 22:12:28'),
(31, 'Jambi', 13, '2016-10-08 22:12:31', '2016-10-08 22:12:31'),
(32, 'Bandung', 14, '2016-10-08 22:12:40', '2016-10-08 22:12:40'),
(33, 'Bekasi', 14, '2016-10-08 22:12:45', '2016-10-08 22:12:45'),
(34, 'Bogor', 14, '2016-10-08 22:12:52', '2016-10-08 22:12:52'),
(35, 'Cimahi', 14, '2016-10-08 22:12:57', '2016-10-08 22:12:57'),
(36, 'Cirebon', 14, '2016-10-08 22:13:02', '2016-10-08 22:13:02'),
(37, 'Depok', 14, '2016-10-08 22:13:05', '2016-10-08 22:13:05'),
(38, 'Sukabumi', 14, '2016-10-08 22:13:10', '2016-10-08 22:13:10'),
(39, 'Tasikmalaya', 14, '2016-10-08 22:13:15', '2016-10-08 22:13:15'),
(40, 'Banjar', 14, '2016-10-08 22:13:21', '2016-10-08 22:13:21'),
(41, 'Ciamis', 14, '2016-10-08 22:13:28', '2016-10-08 22:13:28'),
(42, 'Magelang', 15, '2016-10-08 22:13:42', '2016-10-08 22:13:42'),
(43, 'Pekalongan', 15, '2016-10-08 22:13:53', '2016-10-08 22:13:53'),
(44, 'Purwokerto', 15, '2016-10-08 22:14:12', '2016-10-08 22:14:12'),
(45, 'Salatiga', 15, '2016-10-08 22:14:21', '2016-10-08 22:14:21'),
(46, 'Semarang', 15, '2016-10-08 22:14:27', '2016-10-08 22:14:27'),
(47, 'Surakarta', 15, '2016-10-08 22:14:34', '2016-10-08 22:14:34'),
(48, 'Tegal', 15, '2016-10-08 22:14:44', '2016-10-08 22:14:44'),
(49, 'Batu', 16, '2016-10-08 22:14:48', '2016-10-08 22:14:48'),
(50, 'Blitar', 16, '2016-10-08 22:14:55', '2016-10-08 22:14:55'),
(51, 'Kediri', 16, '2016-10-08 22:15:00', '2016-10-08 22:15:00'),
(52, 'Madiun', 16, '2016-10-08 22:15:04', '2016-10-08 22:15:04'),
(53, 'Malang', 16, '2016-10-08 22:15:08', '2016-10-08 22:15:08'),
(54, 'Mojokerto', 16, '2016-10-08 22:15:14', '2016-10-08 22:15:14'),
(55, 'Pasuruan', 16, '2016-10-08 22:15:19', '2016-10-08 22:15:19'),
(56, 'Probolinggo', 16, '2016-10-08 22:15:24', '2016-10-08 22:15:24'),
(57, 'Surabaya', 16, '2016-10-08 22:15:30', '2016-10-08 22:15:30'),
(58, 'Pontianak', 17, '2016-10-08 22:15:35', '2016-10-08 22:15:35'),
(59, 'Singkawang ', 17, '2016-10-08 22:15:41', '2016-10-08 22:15:41'),
(60, 'Banjarbaru', 18, '2016-10-08 22:15:53', '2016-10-08 22:15:53'),
(61, 'Banjarmasin', 18, '2016-10-08 22:15:59', '2016-10-08 22:15:59'),
(62, 'Palangkaraya', 37, '2016-10-08 22:16:40', '2016-10-08 22:16:40'),
(63, 'Balikpapan', 19, '2016-10-08 22:16:49', '2016-10-08 22:16:49'),
(64, 'Bontang', 19, '2016-10-08 22:16:54', '2016-10-08 22:16:54'),
(65, 'Samarinda', 19, '2016-10-08 22:16:58', '2016-10-08 22:16:58'),
(66, 'Tarakan', 19, '2016-10-08 22:17:04', '2016-10-08 22:17:04'),
(67, 'Batan', 21, '2016-10-08 22:17:07', '2016-10-08 22:17:07'),
(68, 'Tanjungpinang', 21, '2016-10-08 22:17:18', '2016-10-08 22:17:18'),
(69, 'Bandar Lampung', 22, '2016-10-08 22:17:23', '2016-10-08 22:17:23'),
(70, 'Kotabumi', 22, '2016-10-08 22:17:29', '2016-10-08 22:17:29'),
(71, 'Liwa', 22, '2016-10-08 22:17:34', '2016-10-08 22:17:34'),
(72, 'Metro', 22, '2016-10-08 22:17:38', '2016-10-08 22:17:38'),
(73, 'Ternate', 23, '2016-10-08 22:17:44', '2016-10-08 22:17:44'),
(74, 'Tidore Kepulauan', 23, '2016-10-08 22:17:58', '2016-10-08 22:17:58'),
(75, 'Ambon', 24, '2016-10-08 22:18:09', '2016-10-08 22:18:09'),
(76, 'Tual', 24, '2016-10-08 22:18:15', '2016-10-08 22:18:15'),
(77, 'Bima', 25, '2016-10-08 22:18:21', '2016-10-08 22:18:21'),
(78, 'Mataram', 25, '2016-10-08 22:18:26', '2016-10-08 22:18:26'),
(79, 'Kupang', 26, '2016-10-08 22:18:30', '2016-10-08 22:18:30'),
(80, 'Sorong', 27, '2016-10-08 22:18:48', '2016-10-08 22:18:48'),
(81, 'Jayapura', 38, '2016-10-08 22:19:31', '2016-10-08 22:19:31'),
(82, 'Pekanbaru', 28, '2016-10-08 22:20:01', '2016-10-08 22:20:01'),
(83, 'Dumai', 28, '2016-10-08 22:20:08', '2016-10-08 22:20:08'),
(84, 'Makassar', 29, '2016-10-08 22:20:14', '2016-10-08 22:20:14'),
(85, 'Palopo', 29, '2016-10-08 22:20:18', '2016-10-08 22:20:18'),
(86, 'Parepare', 29, '2016-10-08 22:20:26', '2016-10-08 22:20:26'),
(87, 'Palu', 30, '2016-10-08 22:20:35', '2016-10-08 22:20:35'),
(88, 'Bau-bau', 31, '2016-10-08 22:20:43', '2016-10-08 22:20:43'),
(89, 'Kendari', 31, '2016-10-08 22:20:54', '2016-10-08 22:20:54'),
(90, 'Bitung', 32, '2016-10-08 22:21:01', '2016-10-08 22:21:01'),
(91, 'Kotamobagu', 32, '2016-10-08 22:21:12', '2016-10-08 22:21:12'),
(92, 'Manado', 32, '2016-10-08 22:21:17', '2016-10-08 22:21:17'),
(93, 'Tomohon', 32, '2016-10-08 22:21:22', '2016-10-08 22:21:22'),
(94, 'Bukit Tinggi', 33, '2016-10-08 22:21:30', '2016-10-08 22:21:30'),
(95, 'Padang', 33, '2016-10-08 22:21:33', '2016-10-08 22:21:33'),
(96, 'Padang Panjang', 33, '2016-10-08 22:21:39', '2016-10-08 22:21:39'),
(97, 'Pariaman', 33, '2016-10-08 22:21:43', '2016-10-08 22:21:43'),
(98, 'Payakumbuh', 33, '2016-10-08 22:21:48', '2016-10-08 22:21:48'),
(99, 'Sawahlunto', 33, '2016-10-08 22:21:52', '2016-10-08 22:21:52'),
(100, 'Solok', 33, '2016-10-08 22:22:00', '2016-10-08 22:22:00'),
(101, 'Pagaralam', 33, '2016-10-08 22:22:04', '2016-10-08 22:22:04'),
(102, 'Palembang', 33, '2016-10-08 22:22:11', '2016-10-08 22:22:11'),
(103, 'Prabumulih', 33, '2016-10-08 22:22:17', '2016-10-08 22:22:17'),
(104, 'Binjai', 35, '2016-10-08 22:22:22', '2016-10-08 22:22:22'),
(105, 'Medan', 35, '2016-10-08 22:22:26', '2016-10-08 22:22:26'),
(106, 'Padang Sidempuan', 35, '2016-10-08 22:22:33', '2016-10-08 22:22:33'),
(107, 'Pematangsiantar', 35, '2016-10-08 22:22:46', '2016-10-08 22:22:46'),
(108, 'Sibolga', 35, '2016-10-08 22:23:06', '2016-10-08 22:23:06'),
(109, 'Tanjungbalai', 35, '2016-10-08 22:23:14', '2016-10-08 22:23:14'),
(110, 'Tebing Tinggi', 35, '2016-10-08 22:23:23', '2016-10-08 22:23:23'),
(111, 'Yogyakarta', 36, '2016-10-08 22:23:33', '2016-10-08 22:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`id` int(11) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `content` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(3) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_alpha2` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_alpha3` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_numeric` int(11) DEFAULT NULL,
  `currency_code` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_name` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flag` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso_alpha2`, `iso_alpha3`, `iso_numeric`, `currency_code`, `currency_name`, `currency_symbol`, `flag`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 4, 'AFN', 'Afg', '؋', 'AF.png'),
(2, 'Albania', 'AL', 'ALB', 8, 'ALL', 'Lek', 'Lek', 'AL.png'),
(3, 'Algeria', 'DZ', 'DZA', 12, 'DZD', 'Din', 'د.ج', 'DZ.png'),
(4, 'American Samoa', 'AS', 'ASM', 16, 'USD', 'Dol', '$', 'AS.png'),
(5, 'Andorra', 'AD', 'AND', 20, 'EUR', 'Eur', '€', 'AD.png'),
(6, 'Angola', 'AO', 'AGO', 24, 'AOA', 'Kwa', 'Kz', 'AO.png'),
(7, 'Anguilla', 'AI', 'AIA', 660, 'XCD', 'Dol', '$', 'AI.png'),
(8, 'Antarctica', 'AQ', 'ATA', 10, '', '', NULL, 'AQ.png'),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 28, 'XCD', 'Dol', '$', 'AG.png'),
(10, 'Argentina', 'AR', 'ARG', 32, 'ARS', 'Pes', '$', 'AR.png'),
(11, 'Armenia', 'AM', 'ARM', 51, 'AMD', 'Dra', NULL, 'AM.png'),
(12, 'Aruba', 'AW', 'ABW', 533, 'AWG', 'Gui', 'ƒ', 'AW.png'),
(13, 'Australia', 'AU', 'AUS', 36, 'AUD', 'Dol', '$', 'AU.png'),
(14, 'Austria', 'AT', 'AUT', 40, 'EUR', 'Eur', '€', 'AT.png'),
(15, 'Azerbaijan', 'AZ', 'AZE', 31, 'AZN', 'Man', 'ман', 'AZ.png'),
(16, 'Bahamas', 'BS', 'BHS', 44, 'BSD', 'Dol', '$', 'BS.png'),
(17, 'Bahrain', 'BH', 'BHR', 48, 'BHD', 'Din', NULL, 'BH.png'),
(18, 'Bangladesh', 'BD', 'BGD', 50, 'BDT', 'Tak', NULL, 'BD.png'),
(19, 'Barbados', 'BB', 'BRB', 52, 'BBD', 'Dol', '$', 'BB.png'),
(20, 'Belarus', 'BY', 'BLR', 112, 'BYR', 'Rub', 'p.', 'BY.png'),
(21, 'Belgium', 'BE', 'BEL', 56, 'EUR', 'Eur', '€', 'BE.png'),
(22, 'Belize', 'BZ', 'BLZ', 84, 'BZD', 'Dol', 'BZ$', 'BZ.png'),
(23, 'Benin', 'BJ', 'BEN', 204, 'XOF', 'Fra', NULL, 'BJ.png'),
(24, 'Bermuda', 'BM', 'BMU', 60, 'BMD', 'Dol', '$', 'BM.png'),
(25, 'Bhutan', 'BT', 'BTN', 64, 'BTN', 'Ngu', NULL, 'BT.png'),
(26, 'Bolivia', 'BO', 'BOL', 68, 'BOB', 'Bol', '$b', 'BO.png'),
(27, 'Bosnia and Herzegovina', 'BA', 'BIH', 70, 'BAM', 'Mar', 'KM', 'BA.png'),
(28, 'Botswana', 'BW', 'BWA', 72, 'BWP', 'Pul', 'P', 'BW.png'),
(29, 'Bouvet Island', 'BV', 'BVT', 74, 'NOK', 'Kro', 'kr', 'BV.png'),
(30, 'Brazil', 'BR', 'BRA', 76, 'BRL', 'Rea', 'R$', 'BR.png'),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 86, 'USD', 'Dol', '$', 'IO.png'),
(32, 'British Virgin Islands', 'VG', 'VGB', 92, 'USD', 'Dol', '$', 'VG.png'),
(33, 'Brunei', 'BN', 'BRN', 96, 'BND', 'Dol', '$', 'BN.png'),
(34, 'Bulgaria', 'BG', 'BGR', 100, 'BGN', 'Lev', 'лв', 'BG.png'),
(35, 'Burkina Faso', 'BF', 'BFA', 854, 'XOF', 'Fra', NULL, 'BF.png'),
(36, 'Burundi', 'BI', 'BDI', 108, 'BIF', 'Fra', NULL, 'BI.png'),
(37, 'Cambodia', 'KH', 'KHM', 116, 'KHR', 'Rie', '៛', 'KH.png'),
(38, 'Cameroon', 'CM', 'CMR', 120, 'XAF', 'Fra', 'FCF', 'CM.png'),
(39, 'Canada', 'CA', 'CAN', 124, 'CAD', 'Dol', '$', 'CA.png'),
(40, 'Cape Verde', 'CV', 'CPV', 132, 'CVE', 'Esc', NULL, 'CV.png'),
(41, 'Cayman Islands', 'KY', 'CYM', 136, 'KYD', 'Dol', '$', 'KY.png'),
(42, 'Central African Republic', 'CF', 'CAF', 140, 'XAF', 'Fra', 'FCF', 'CF.png'),
(43, 'Chad', 'TD', 'TCD', 148, 'XAF', 'Fra', NULL, 'TD.png'),
(44, 'Chile', 'CL', 'CHL', 152, 'CLP', 'Pes', NULL, 'CL.png'),
(45, 'China', 'CN', 'CHN', 156, 'CNY', 'Yua', '¥', 'CN.png'),
(46, 'Christmas Island', 'CX', 'CXR', 162, 'AUD', 'Dol', '$', 'CX.png'),
(47, 'Cocos Islands', 'CC', 'CCK', 166, 'AUD', 'Dol', '$', 'CC.png'),
(48, 'Colombia', 'CO', 'COL', 170, 'COP', 'Pes', '$', 'CO.png'),
(49, 'Comoros', 'KM', 'COM', 174, 'KMF', 'Fra', NULL, 'KM.png'),
(50, 'Cook Islands', 'CK', 'COK', 184, 'NZD', 'Dol', '$', 'CK.png'),
(51, 'Costa Rica', 'CR', 'CRI', 188, 'CRC', 'Col', '₡', 'CR.png'),
(52, 'Croatia', 'HR', 'HRV', 191, 'HRK', 'Kun', 'kn', 'HR.png'),
(53, 'Cuba', 'CU', 'CUB', 192, 'CUP', 'Pes', '₱', 'CU.png'),
(54, 'Cyprus', 'CY', 'CYP', 196, 'CYP', 'Pou', NULL, 'CY.png'),
(55, 'Czech Republic', 'CZ', 'CZE', 203, 'CZK', 'Kor', 'Kč', 'CZ.png'),
(56, 'Democratic Republic of the Congo', 'CD', 'COD', 180, 'CDF', 'Fra', NULL, 'CD.png'),
(57, 'Denmark', 'DK', 'DNK', 208, 'DKK', 'Kro', 'kr', 'DK.png'),
(58, 'Djibouti', 'DJ', 'DJI', 262, 'DJF', 'Fra', NULL, 'DJ.png'),
(59, 'Dominica', 'DM', 'DMA', 212, 'XCD', 'Dol', '$', 'DM.png'),
(60, 'Dominican Republic', 'DO', 'DOM', 214, 'DOP', 'Pes', 'RD$', 'DO.png'),
(61, 'East Timor', 'TL', 'TLS', 626, 'USD', 'Dol', '$', 'TL.png'),
(62, 'Ecuador', 'EC', 'ECU', 218, 'USD', 'Dol', '$', 'EC.png'),
(63, 'Egypt', 'EG', 'EGY', 818, 'EGP', 'Pou', '£', 'EG.png'),
(64, 'El Salvador', 'SV', 'SLV', 222, 'SVC', 'Col', '$', 'SV.png'),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 226, 'XAF', 'Fra', 'FCF', 'GQ.png'),
(66, 'Eritrea', 'ER', 'ERI', 232, 'ERN', 'Nak', 'Nfk', 'ER.png'),
(67, 'Estonia', 'EE', 'EST', 233, 'EEK', 'Kro', 'kr', 'EE.png'),
(68, 'Ethiopia', 'ET', 'ETH', 231, 'ETB', 'Bir', NULL, 'ET.png'),
(69, 'Falkland Islands', 'FK', 'FLK', 238, 'FKP', 'Pou', '£', 'FK.png'),
(70, 'Faroe Islands', 'FO', 'FRO', 234, 'DKK', 'Kro', 'kr', 'FO.png'),
(71, 'Fiji', 'FJ', 'FJI', 242, 'FJD', 'Dol', '$', 'FJ.png'),
(72, 'Finland', 'FI', 'FIN', 246, 'EUR', 'Eur', '€', 'FI.png'),
(73, 'France', 'FR', 'FRA', 250, 'EUR', 'Eur', '€', 'FR.png'),
(74, 'French Guiana', 'GF', 'GUF', 254, 'EUR', 'Eur', '€', 'GF.png'),
(75, 'French Polynesia', 'PF', 'PYF', 258, 'XPF', 'Fra', NULL, 'PF.png'),
(76, 'French Southern Territories', 'TF', 'ATF', 260, 'EUR', 'Eur', '€', 'TF.png'),
(77, 'Gabon', 'GA', 'GAB', 266, 'XAF', 'Fra', 'FCF', 'GA.png'),
(78, 'Gambia', 'GM', 'GMB', 270, 'GMD', 'Dal', 'D', 'GM.png'),
(79, 'Georgia', 'GE', 'GEO', 268, 'GEL', 'Lar', NULL, 'GE.png'),
(80, 'Germany', 'DE', 'DEU', 276, 'EUR', 'Eur', '€', 'DE.png'),
(81, 'Ghana', 'GH', 'GHA', 288, 'GHC', 'Ced', '¢', 'GH.png'),
(82, 'Gibraltar', 'GI', 'GIB', 292, 'GIP', 'Pou', '£', 'GI.png'),
(83, 'Greece', 'GR', 'GRC', 300, 'EUR', 'Eur', '€', 'GR.png'),
(84, 'Greenland', 'GL', 'GRL', 304, 'DKK', 'Kro', 'kr', 'GL.png'),
(85, 'Grenada', 'GD', 'GRD', 308, 'XCD', 'Dol', '$', 'GD.png'),
(86, 'Guadeloupe', 'GP', 'GLP', 312, 'EUR', 'Eur', '€', 'GP.png'),
(87, 'Guam', 'GU', 'GUM', 316, 'USD', 'Dol', '$', 'GU.png'),
(88, 'Guatemala', 'GT', 'GTM', 320, 'GTQ', 'Que', 'Q', 'GT.png'),
(89, 'Guinea', 'GN', 'GIN', 324, 'GNF', 'Fra', NULL, 'GN.png'),
(90, 'Guinea-Bissau', 'GW', 'GNB', 624, 'XOF', 'Fra', NULL, 'GW.png'),
(91, 'Guyana', 'GY', 'GUY', 328, 'GYD', 'Dol', '$', 'GY.png'),
(92, 'Haiti', 'HT', 'HTI', 332, 'HTG', 'Gou', 'G', 'HT.png'),
(93, 'Heard Island and McDonald Islands', 'HM', 'HMD', 334, 'AUD', 'Dol', '$', 'HM.png'),
(94, 'Honduras', 'HN', 'HND', 340, 'HNL', 'Lem', 'L', 'HN.png'),
(95, 'Hong Kong', 'HK', 'HKG', 344, 'HKD', 'Dol', '$', 'HK.png'),
(96, 'Hungary', 'HU', 'HUN', 348, 'HUF', 'For', 'Ft', 'HU.png'),
(97, 'Iceland', 'IS', 'ISL', 352, 'ISK', 'Kro', 'kr', 'IS.png'),
(98, 'India', 'IN', 'IND', 356, 'INR', 'Rup', '₹', 'IN.png'),
(99, 'Indonesia', 'ID', 'IDN', 360, 'IDR', 'Rup', 'Rp', 'ID.png'),
(100, 'Iran', 'IR', 'IRN', 364, 'IRR', 'Ria', '﷼', 'IR.png'),
(101, 'Iraq', 'IQ', 'IRQ', 368, 'IQD', 'Din', NULL, 'IQ.png'),
(102, 'Ireland', 'IE', 'IRL', 372, 'EUR', 'Eur', '€', 'IE.png'),
(103, 'Israel', 'IL', 'ISR', 376, 'ILS', 'She', '₪', 'IL.png'),
(104, 'Italy', 'IT', 'ITA', 380, 'EUR', 'Eur', '€', 'IT.png'),
(105, 'Ivory Coast', 'CI', 'CIV', 384, 'XOF', 'Fra', NULL, 'CI.png'),
(106, 'Jamaica', 'JM', 'JAM', 388, 'JMD', 'Dol', '$', 'JM.png'),
(107, 'Japan', 'JP', 'JPN', 392, 'JPY', 'Yen', '¥', 'JP.png'),
(108, 'Jordan', 'JO', 'JOR', 400, 'JOD', 'Din', NULL, 'JO.png'),
(109, 'Kazakhstan', 'KZ', 'KAZ', 398, 'KZT', 'Ten', 'KZT', 'KZ.png'),
(110, 'Kenya', 'KE', 'KEN', 404, 'KES', 'Shi', NULL, 'KE.png'),
(111, 'Kiribati', 'KI', 'KIR', 296, 'AUD', 'Dol', '$', 'KI.png'),
(112, 'Kuwait', 'KW', 'KWT', 414, 'KWD', 'Din', NULL, 'KW.png'),
(113, 'Kyrgyzstan', 'KG', 'KGZ', 417, 'KGS', 'Som', 'лв', 'KG.png'),
(114, 'Laos', 'LA', 'LAO', 418, 'LAK', 'Kip', '₭ ', 'LA.png'),
(115, 'Latvia', 'LV', 'LVA', 428, 'LVL', 'Lat', 'Ls', 'LV.png'),
(116, 'Lebanon', 'LB', 'LBN', 422, 'LBP', 'Pou', '£', 'LB.png'),
(117, 'Lesotho', 'LS', 'LSO', 426, 'LSL', 'Lot', 'L', 'LS.png'),
(118, 'Liberia', 'LR', 'LBR', 430, 'LRD', 'Dol', '$', 'LR.png'),
(119, 'Libya', 'LY', 'LBY', 434, 'LYD', 'Din', NULL, 'LY.png'),
(120, 'Liechtenstein', 'LI', 'LIE', 438, 'CHF', 'Fra', 'CHF', 'LI.png'),
(121, 'Lithuania', 'LT', 'LTU', 440, 'LTL', 'Lit', 'Lt', 'LT.png'),
(122, 'Luxembourg', 'LU', 'LUX', 442, 'EUR', 'Eur', '£', 'LU.png'),
(123, 'Macao', 'MO', 'MAC', 446, 'MOP', 'Pat', 'MOP', 'MO.png'),
(124, 'Macedonia', 'MK', 'MKD', 807, 'MKD', 'Den', 'ден', 'MK.png'),
(125, 'Madagascar', 'MG', 'MDG', 450, 'MGA', 'Ari', NULL, 'MG.png'),
(126, 'Malawi', 'MW', 'MWI', 454, 'MWK', 'Kwa', 'MK', 'MW.png'),
(127, 'Malaysia', 'MY', 'MYS', 458, 'MYR', 'Rin', 'RM', 'MY.png'),
(128, 'Maldives', 'MV', 'MDV', 462, 'MVR', 'Ruf', 'Rf', 'MV.png'),
(129, 'Mali', 'ML', 'MLI', 466, 'XOF', 'Fra', NULL, 'ML.png'),
(130, 'Malta', 'MT', 'MLT', 470, 'MTL', 'Lir', NULL, 'MT.png'),
(131, 'Marshall Islands', 'MH', 'MHL', 584, 'USD', 'Dol', '$', 'MH.png'),
(132, 'Martinique', 'MQ', 'MTQ', 474, 'EUR', 'Eur', '€', 'MQ.png'),
(133, 'Mauritania', 'MR', 'MRT', 478, 'MRO', 'Oug', 'UM', 'MR.png'),
(134, 'Mauritius', 'MU', 'MUS', 480, 'MUR', 'Rup', '₨', 'MU.png'),
(135, 'Mayotte', 'YT', 'MYT', 175, 'EUR', 'Eur', '€', 'YT.png'),
(136, 'Mexico', 'MX', 'MEX', 484, 'MXN', 'Pes', '$', 'MX.png'),
(137, 'Micronesia', 'FM', 'FSM', 583, 'USD', 'Dol', '$', 'FM.png'),
(138, 'Moldova', 'MD', 'MDA', 498, 'MDL', 'Leu', NULL, 'MD.png'),
(139, 'Monaco', 'MC', 'MCO', 492, 'EUR', 'Eur', '€', 'MC.png'),
(140, 'Mongolia', 'MN', 'MNG', 496, 'MNT', 'Tug', '₮', 'MN.png'),
(141, 'Montserrat', 'MS', 'MSR', 500, 'XCD', 'Dol', '$', 'MS.png'),
(142, 'Morocco', 'MA', 'MAR', 504, 'MAD', 'Dir', NULL, 'MA.png'),
(143, 'Mozambique', 'MZ', 'MOZ', 508, 'MZN', 'Met', 'MT', 'MZ.png'),
(144, 'Myanmar', 'MM', 'MMR', 104, 'MMK', 'Kya', 'K', 'MM.png'),
(145, 'Namibia', 'NA', 'NAM', 516, 'NAD', 'Dol', '$', 'NA.png'),
(146, 'Nauru', 'NR', 'NRU', 520, 'AUD', 'Dol', '$', 'NR.png'),
(147, 'Nepal', 'NP', 'NPL', 524, 'NPR', 'Rup', 'Rs', 'NP.png'),
(148, 'Netherlands', 'NL', 'NLD', 528, 'EUR', 'Eur', '£', 'NL.png'),
(149, 'Netherlands Antilles', 'AN', 'ANT', 530, 'ANG', 'Gui', 'ƒ', 'AN.png'),
(150, 'New Caledonia', 'NC', 'NCL', 540, 'XPF', 'Fra', NULL, 'NC.png'),
(151, 'New Zealand', 'NZ', 'NZL', 554, 'NZD', 'Dol', '$', 'NZ.png'),
(152, 'Nicaragua', 'NI', 'NIC', 558, 'NIO', 'Cor', 'C$', 'NI.png'),
(153, 'Niger', 'NE', 'NER', 562, 'XOF', 'Fra', NULL, 'NE.png'),
(154, 'Nigeria', 'NG', 'NGA', 566, 'NGN', 'Nai', '₦', 'NG.png'),
(155, 'Niue', 'NU', 'NIU', 570, 'NZD', 'Dol', '$', 'NU.png'),
(156, 'Norfolk Island', 'NF', 'NFK', 574, 'AUD', 'Dol', '$', 'NF.png'),
(157, 'North Korea', 'KP', 'PRK', 408, 'KPW', 'Won', '₩', 'KP.png'),
(158, 'Northern Mariana Islands', 'MP', 'MNP', 580, 'USD', 'Dol', '$', 'MP.png'),
(159, 'Norway', 'NO', 'NOR', 578, 'NOK', 'Kro', 'kr', 'NO.png'),
(160, 'Oman', 'OM', 'OMN', 512, 'OMR', 'Ria', '﷼', 'OM.png'),
(161, 'Pakistan', 'PK', 'PAK', 586, 'PKR', 'Rup', 'Rs', 'PK.png'),
(162, 'Palau', 'PW', 'PLW', 585, 'USD', 'Dol', '$', 'PW.png'),
(163, 'Palestinian Territory', 'PS', 'PSE', 275, 'ILS', 'She', 'â‚ª', 'PS.png'),
(164, 'Panama', 'PA', 'PAN', 591, 'PAB', 'Bal', 'B/.', 'PA.png'),
(165, 'Papua New Guinea', 'PG', 'PNG', 598, 'PGK', 'Kin', NULL, 'PG.png'),
(166, 'Paraguay', 'PY', 'PRY', 600, 'PYG', 'Gua', 'Gs', 'PY.png'),
(167, 'Peru', 'PE', 'PER', 604, 'PEN', 'Sol', 'S/.', 'PE.png'),
(168, 'Philippines', 'PH', 'PHL', 608, 'PHP', 'Pes', 'Php', 'PH.png'),
(169, 'Pitcairn', 'PN', 'PCN', 612, 'NZD', 'Dol', '$', 'PN.png'),
(170, 'Poland', 'PL', 'POL', 616, 'PLN', 'Zlo', 'zÅ‚', 'PL.png'),
(171, 'Portugal', 'PT', 'PRT', 620, 'EUR', 'Eur', '€', 'PT.png'),
(172, 'Puerto Rico', 'PR', 'PRI', 630, 'USD', 'Dol', '$', 'PR.png'),
(173, 'Qatar', 'QA', 'QAT', 634, 'QAR', 'Ria', '﷼', 'QA.png'),
(174, 'Republic of the Congo', 'CG', 'COG', 178, 'XAF', 'Fra', 'FCF', 'CG.png'),
(175, 'Reunion', 'RE', 'REU', 638, 'EUR', 'Eur', '€', 'RE.png'),
(176, 'Romania', 'RO', 'ROU', 642, 'RON', 'Leu', 'lei', 'RO.png'),
(177, 'Russia', 'RU', 'RUS', 643, 'RUB', 'Rub', 'руб', 'RU.png'),
(178, 'Rwanda', 'RW', 'RWA', 646, 'RWF', 'Fra', NULL, 'RW.png'),
(179, 'Saint Helena', 'SH', 'SHN', 654, 'SHP', 'Pou', '£', 'SH.png'),
(180, 'Saint Kitts and Nevis', 'KN', 'KNA', 659, 'XCD', 'Dol', '$', 'KN.png'),
(181, 'Saint Lucia', 'LC', 'LCA', 662, 'XCD', 'Dol', '$', 'LC.png'),
(182, 'Saint Pierre and Miquelon', 'PM', 'SPM', 666, 'EUR', 'Eur', '€', 'PM.png'),
(183, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 670, 'XCD', 'Dol', '$', 'VC.png'),
(184, 'Samoa', 'WS', 'WSM', 882, 'WST', 'Tal', 'WS$', 'WS.png'),
(185, 'San Marino', 'SM', 'SMR', 674, 'EUR', 'Eur', '€', 'SM.png'),
(186, 'Sao Tome and Principe', 'ST', 'STP', 678, 'STD', 'Dob', 'Db', 'ST.png'),
(187, 'Saudi Arabia', 'SA', 'SAU', 682, 'SAR', 'Ria', '﷼', 'SA.png'),
(188, 'Senegal', 'SN', 'SEN', 686, 'XOF', 'Fra', NULL, 'SN.png'),
(189, 'Serbia and Montenegro', 'CS', 'SCG', 891, 'RSD', 'Din', 'Дин.', 'CS.png'),
(190, 'Seychelles', 'SC', 'SYC', 690, 'SCR', 'Rup', '₨', 'SC.png'),
(191, 'Sierra Leone', 'SL', 'SLE', 694, 'SLL', 'Leo', 'Le', 'SL.png'),
(192, 'Singapore', 'SG', 'SGP', 702, 'SGD', 'Dol', '$', 'SG.png'),
(193, 'Slovakia', 'SK', 'SVK', 703, 'SKK', 'Kor', 'Sk', 'SK.png'),
(194, 'Slovenia', 'SI', 'SVN', 705, 'EUR', 'Eur', '€', 'SI.png'),
(195, 'Solomon Islands', 'SB', 'SLB', 90, 'SBD', 'Dol', '$', 'SB.png'),
(196, 'Somalia', 'SO', 'SOM', 706, 'SOS', 'Shi', 'S', 'SO.png'),
(197, 'South Africa', 'ZA', 'ZAF', 710, 'ZAR', 'Ran', 'R', 'ZA.png'),
(198, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 239, 'GBP', 'Pou', '£', 'GS.png'),
(199, 'South Korea', 'KR', 'KOR', 410, 'KRW', 'Won', '₩', 'KR.png'),
(200, 'Spain', 'ES', 'ESP', 724, 'EUR', 'Eur', '€', 'ES.png'),
(201, 'Sri Lanka', 'LK', 'LKA', 144, 'LKR', 'Rup', '₨', 'LK.png'),
(202, 'Sudan', 'SD', 'SDN', 736, 'SDD', 'Din', NULL, 'SD.png'),
(203, 'Suriname', 'SR', 'SUR', 740, 'SRD', 'Dol', '$', 'SR.png'),
(204, 'Svalbard and Jan Mayen', 'SJ', 'SJM', 744, 'NOK', 'Kro', 'kr', 'SJ.png'),
(205, 'Swaziland', 'SZ', 'SWZ', 748, 'SZL', 'Lil', NULL, 'SZ.png'),
(206, 'Sweden', 'SE', 'SWE', 752, 'SEK', 'Kro', 'kr', 'SE.png'),
(207, 'Switzerland', 'CH', 'CHE', 756, 'CHF', 'Fra', 'CHF', 'CH.png'),
(208, 'Syria', 'SY', 'SYR', 760, 'SYP', 'Pou', '£', 'SY.png'),
(209, 'Taiwan', 'TW', 'TWN', 158, 'TWD', 'Dol', 'NT$', 'TW.png'),
(210, 'Tajikistan', 'TJ', 'TJK', 762, 'TJS', 'Som', NULL, 'TJ.png'),
(211, 'Tanzania', 'TZ', 'TZA', 834, 'TZS', 'Shi', NULL, 'TZ.png'),
(212, 'Thailand', 'TH', 'THA', 764, 'THB', 'Bah', '$', 'TH.png'),
(213, 'Togo', 'TG', 'TGO', 768, 'XOF', 'Fra', NULL, 'TG.png'),
(214, 'Tokelau', 'TK', 'TKL', 772, 'NZD', 'Dol', '$', 'TK.png'),
(215, 'Tonga', 'TO', 'TON', 776, 'TOP', 'Pa''', 'T$', 'TO.png'),
(216, 'Trinidad and Tobago', 'TT', 'TTO', 780, 'TTD', 'Dol', 'TT$', 'TT.png'),
(217, 'Tunisia', 'TN', 'TUN', 788, 'TND', 'Din', NULL, 'TN.png'),
(218, 'Turkey', 'TR', 'TUR', 792, 'TRY', 'Lir', 'YTL', 'TR.png'),
(219, 'Turkmenistan', 'TM', 'TKM', 795, 'TMM', 'Man', 'm', 'TM.png'),
(220, 'Turks and Caicos Islands', 'TC', 'TCA', 796, 'USD', 'Dol', '$', 'TC.png'),
(221, 'Tuvalu', 'TV', 'TUV', 798, 'AUD', 'Dol', '$', 'TV.png'),
(222, 'U.S. Virgin Islands', 'VI', 'VIR', 850, 'USD', 'Dol', '$', 'VI.png'),
(223, 'Uganda', 'UG', 'UGA', 800, 'UGX', 'Shi', NULL, 'UG.png'),
(224, 'Ukraine', 'UA', 'UKR', 804, 'UAH', 'Hry', '₴', 'UA.png'),
(225, 'United Arab Emirates', 'AE', 'ARE', 784, 'AED', 'Dir', NULL, 'AE.png'),
(226, 'United Kingdom', 'GB', 'GBR', 826, 'GBP', 'Pou', '£', 'GB.png'),
(227, 'United States', 'US', 'USA', 840, 'USD', 'Dol', '$', 'US.png'),
(228, 'United States Minor Outlying Islands', 'UM', 'UMI', 581, 'USD', 'Dol', '$', 'UM.png'),
(229, 'Uruguay', 'UY', 'URY', 858, 'UYU', 'Pes', '$U', 'UY.png'),
(230, 'Uzbekistan', 'UZ', 'UZB', 860, 'UZS', 'Som', 'лв', 'UZ.png'),
(231, 'Vanuatu', 'VU', 'VUT', 548, 'VUV', 'Vat', 'Vt', 'VU.png'),
(232, 'Vatican', 'VA', 'VAT', 336, 'EUR', 'Eur', '€', 'VA.png'),
(233, 'Venezuela', 'VE', 'VEN', 862, 'VEF', 'Bol', 'Bs', 'VE.png'),
(234, 'Vietnam', 'VN', 'VNM', 704, 'VND', 'Don', '₫', 'VN.png'),
(235, 'Wallis and Futuna', 'WF', 'WLF', 876, 'XPF', 'Fra', NULL, 'WF.png'),
(236, 'Western Sahara', 'EH', 'ESH', 732, 'MAD', 'Dir', NULL, 'EH.png'),
(237, 'Yemen', 'YE', 'YEM', 887, 'YER', 'Ria', '﷼', 'YE.png'),
(238, 'Zambia', 'ZM', 'ZMB', 894, 'ZMK', 'Kwa', 'ZK', 'ZM.png'),
(239, 'Zimbabwe', 'ZW', 'ZWE', 716, 'ZWD', 'Dol', 'Z$', 'ZW.png');

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE IF NOT EXISTS `county` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`id`, `name`, `zip_code`, `updated_at`, `created_at`) VALUES
(6, 'Aceh', NULL, '2016-10-08 22:05:03', '2016-10-08 22:05:03'),
(7, 'Bali', NULL, '2016-10-08 22:05:10', '2016-10-08 22:05:10'),
(8, 'Bangka Belitung', NULL, '2016-10-08 22:05:17', '2016-10-08 22:05:17'),
(9, 'Banten', NULL, '2016-10-08 22:06:41', '2016-10-08 22:06:41'),
(10, 'Bengkulu', NULL, '2016-10-08 22:06:45', '2016-10-08 22:06:45'),
(11, 'Gorontalo', NULL, '2016-10-08 22:06:48', '2016-10-08 22:06:48'),
(12, 'Jakarta', NULL, '2016-10-08 22:06:52', '2016-10-08 22:06:52'),
(13, 'Jambi', NULL, '2016-10-08 22:06:55', '2016-10-08 22:06:55'),
(14, 'Jawa Barat', NULL, '2016-10-08 22:07:02', '2016-10-08 22:07:02'),
(15, 'Jawa Tengah', NULL, '2016-10-08 22:07:06', '2016-10-08 22:07:06'),
(16, 'Jawa Timur', NULL, '2016-10-08 22:07:11', '2016-10-08 22:07:11'),
(17, 'Kalimantan Barat', NULL, '2016-10-08 22:07:18', '2016-10-08 22:07:18'),
(18, 'Kalimantan Selatan', NULL, '2016-10-08 22:07:22', '2016-10-08 22:07:22'),
(19, 'Kalimantan Timur', NULL, '2016-10-08 22:07:28', '2016-10-08 22:07:28'),
(20, 'Kalimantan Utara', NULL, '2016-10-08 22:07:34', '2016-10-08 22:07:34'),
(21, 'Kepulauan Riau', NULL, '2016-10-08 22:07:39', '2016-10-08 22:07:39'),
(22, 'Lampung', NULL, '2016-10-08 22:07:44', '2016-10-08 22:07:44'),
(23, 'Maluku Utara', NULL, '2016-10-08 22:07:48', '2016-10-08 22:07:48'),
(24, 'Maluku', NULL, '2016-10-08 22:07:55', '2016-10-08 22:07:55'),
(25, 'Nusa Tenggara Barat', NULL, '2016-10-08 22:08:05', '2016-10-08 22:08:05'),
(26, 'Nusa Tenggara Timur', NULL, '2016-10-08 22:08:11', '2016-10-08 22:08:11'),
(27, 'Papua Barat', NULL, '2016-10-08 22:08:15', '2016-10-08 22:08:15'),
(28, 'Riau', NULL, '2016-10-08 22:08:18', '2016-10-08 22:08:18'),
(29, 'Sulawesi Selatan', NULL, '2016-10-08 22:08:25', '2016-10-08 22:08:25'),
(30, 'Sulawesi Tengah', NULL, '2016-10-08 22:08:32', '2016-10-08 22:08:32'),
(31, 'Sulawesi Tenggara', NULL, '2016-10-08 22:08:38', '2016-10-08 22:08:38'),
(32, 'Sulawesi Utara', NULL, '2016-10-08 22:08:42', '2016-10-08 22:08:42'),
(33, 'Sumatera Barat', NULL, '2016-10-08 22:08:48', '2016-10-08 22:08:48'),
(34, 'Sumatera Selatan', NULL, '2016-10-08 22:08:56', '2016-10-08 22:08:56'),
(35, 'Sumatera Utara', NULL, '2016-10-08 22:09:07', '2016-10-08 22:09:07'),
(36, 'Yogyakarta', NULL, '2016-10-08 22:09:14', '2016-10-08 22:09:14'),
(37, 'Kalimantan Tengah', NULL, '2016-10-08 22:16:28', '2016-10-08 22:16:28'),
(38, 'Papua', NULL, '2016-10-08 22:19:12', '2016-10-08 22:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE IF NOT EXISTS `estates` (
`id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` longtext COLLATE utf8_unicode_ci,
  `user_id` bigint(20) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `image_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `types_id` int(11) DEFAULT NULL,
  `report` tinyint(4) NOT NULL DEFAULT '0',
  `area` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bathrooms` tinyint(4) NOT NULL DEFAULT '0',
  `bedrooms` tinyint(4) DEFAULT '0',
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lng` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marker_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` tinyint(4) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `time_rate` tinyint(4) DEFAULT '-1',
  `cities_id` int(11) DEFAULT NULL,
  `view_counter` bigint(20) DEFAULT '0',
  `keyword` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`id`, `title`, `content`, `price`, `user_id`, `county_id`, `image_path`, `types_id`, `report`, `area`, `bathrooms`, `bedrooms`, `address`, `lng`, `lat`, `description`, `marker_id`, `purpose`, `status`, `activated`, `created_at`, `updated_at`, `time_rate`, `cities_id`, `view_counter`, `keyword`, `link_youtube`, `parent_id`, `featured`) VALUES
(1, 'Kost Griya Amartha', 'Nama Rumah Kost: Griya Amartha<br />\r\nAlamat Kost: Jl. Setiabudi Tengah No. 3, Jakarta Selatan 12910<br />\r\nNo. Telepon: +62-21-5251926 atau 081-2341-3720 (Ibu Maria)<br />\r\nHarga Sewa: Rp 3.300.000 s.d Rp 4.000.000 per bulan<br />\r\nTempat Kost Untuk: Pria / Wanita / Suami-Istri<br />\r\nMayoritas Penghuni: Karyawan, Karyawati, Executive, Expatriat<br />\r\nUkuran Kamar: 4 m x 5 m<br />\r\nJumlah Kamar: 20<br />\r\nSekamar Boleh Berdua: Ya<br />\r\nBia', '3300000', 12, 12, 'uploads/41_2016/thumbs/09bc155e261a577950f3fdee472e0b14.jpg', 3, 0, '20', 1, 1, 'Jl. Setiabudi Tengah No. 3, Jakarta Selatan 12910', '106.82665050029755', '-6.209286276989975', 'Nama Rumah Kost: Griya Amartha<br />\r\nAlamat Kost: Jl. Setiabudi Tengah No. 3, Jakarta Selatan 12910<br />\r\nNo. Telepon: +62-21-5251926 atau 081-2341-3720 (Ibu Maria)<br />\r\nHarga Sewa: Rp 3.300.000 s.d Rp 4.000.000 per bulan<br />\r\nTempat Kost Untuk: Pria / Wanita / Suami-Istri<br />\r\nMayoritas Penghuni: Karyawan, Karyawati, Executive, Expatriat<br />\r\nUkuran Kamar: 4 m x 5 m<br />\r\nJumlah Kamar: 20<br />\r\nSekamar Boleh Berdua: Ya<br />\r\nBia', '', 0, 1, 1, '2016-10-10 12:15:02', '2016-10-11 08:59:41', 0, 27, 0, '', '', NULL, 0),
(2, 'Kosan Utan Kayu Residence', 'Utan Kayu Residence<br />\r\nNo. Telepon: 081280481234<br />\r\nHarga Sewa: Rp 1.900.000<br />\r\nTempat Kost Untuk: Pria/Wanita<br />\r\nMayoritas Penghuni: Pria/Wanita<br />\r\nUkuran Kamar: 3×4 m2 (belum termasuk teras dan kamar mandi)<br />\r\nJumlah Kamar: 26<br />\r\nSekamar Boleh Berdua: Tidak<br />\r\nBiaya Tambahan Sekamar Berdua: –<br />\r\nFasilitas:<br />\r\nTelevisi (Dilengkapi antena satelit)<br />\r\nAC<br />\r\nKamar Mandi (Air Panas/Dingin)<br />\r\nMeja<br />\r\nKursi<br />\r\nKasur<br />\r\nBantal<br />\r\nLemari<br />\r\nFasilitas Umum:<br />\r\nRuang Tamu<br />\r\nLahan Parkir<br />\r\nPos Satpam<br />\r\nDispenser<br />\r\nKulkas<br />\r\nMesin Cuci<br />\r\nFasilitas Sekitar: Mini Market, Puskesmas, Warung/Rumah Makan<br />\r\nParkir Mobil: Ada<br />\r\nParkir Motor: Ada<br />\r\nWaktu Bertamu: 08.00 – 22.00 WIB<br />\r\nAkses Lokasi: Dari arah bypass menuju Matraman, belok kiri sebelum rel Kereta Api Pramuka. Belok kiri di Gang ke-2 (Jl. Kayumanis 2), setelah mentok belok kiri. Sekitar 100 meter, di sebelah Utan Kayu Residence berada di sebelah kanan, bersebelahan dengan Puskesmas Kecamatan Utan Kayu. Seberang sebelum Ceria Mart Kayumanis.<br />\r\nInfo Tambahan:<br />\r\nUntuk menjadi penghuni kost harus menandatangani perjanjian untuk memenuhi semua aturan.<br />\r\nTamu lawan jenis menunggu di ruang tamu dan tidak diperkenankan masuk kamar.<br />\r\nBagi tamu yang akan menginap dapat menggunakan kamar yang disewakan harian selama kamar tersebut masih tersedia.<br />\r\nE-mail: utankayuresidence@gmail.com<br />\r\nFacebook: https://www.facebook.com/utankayuhouse/', '1900000', 12, 12, 'uploads/41_2016/thumbs/30ed038d3118d903f2e04a84bd6baff2.jpg', 3, 0, '12', 1, 1, 'Jl. Kayumanis Timur No. 42, Utan Kayu Utara, Jakarta Timur', '106.86135090887547', '-6.195271104907147', 'Utan Kayu Residence<br />\r\nNo. Telepon: 081280481234<br />\r\nHarga Sewa: Rp 1.900.000<br />\r\nTempat Kost Untuk: Pria/Wanita<br />\r\nMayoritas Penghuni: Pria/Wanita<br />\r\nUkuran Kamar: 3×4 m2 (belum termasuk teras dan kamar mandi)<br />\r\nJumlah Kamar: 26<br />\r\nSekamar Boleh Berdua: Tidak<br />\r\nBiaya Tambahan Sekamar Berdua: –<br />\r\nFasilitas:<br />\r\nTelevisi (Dilengkapi antena satelit)<br />\r\nAC<br />\r\nKamar Mandi (Air Panas/Dingin)<br />\r\nMeja<br />\r\nKursi<br />\r\nKasur<br />\r\nBantal<br />\r\nLem', '', 0, 1, 1, '2016-10-10 12:33:47', '2016-10-10 12:35:59', 1, 28, 0, '', '', NULL, 0),
(3, 'Kost Khusus Wanita Daerah Belakang Gasibu, Bandung – Kosan Mahasiswa Unpad, ITHB dan Unikom', 'Kosan Pak Jafar<br />\r\nJumlah Kamar: 9 Kamar<br />\r\nSekamar Boleh Berdua: Tidak boleh<br />\r\nBiaya Tambahan Sekamar Berdua: –<br />\r\nFasilitas:<br />\r\nMeja dan kursi belajar/ lemari pakaian/ lemari perabotan (pilih salah satu).<br />\r\nCermin di kamar<br />\r\nBebas bawa peralatan elektonik dan tidak kena cas lagi<br />\r\nSetiap kamar dibersihkan seminggu sekali oleh ibu kosnya langsung.<br />\r\nKamar mandi bersih dan terawat setiap harinya diluar<br />\r\nKamar cuci pakaian luas<br />\r\nTempat cuci pir', '600000', 12, 14, 'uploads/41_2016/thumbs/0f87fd3a2e13962bbe33d816d370633c.jpg', 1, 0, '10.5', 0, 1, 'Jalan Puyuh Dalam no.138/151 A Rt. 002 / Rw. 012, Bandung (masuk dari lapangan puter belakang Telkom Japati / Gasibu)', '107.62350797653198', '-6.896471267105723', 'Kosan Pak Jafar<br />\r\nJumlah Kamar: 9 Kamar<br />\r\nSekamar Boleh Berdua: Tidak boleh<br />\r\nBiaya Tambahan Sekamar Berdua: –<br />\r\nFasilitas:<br />\r\nMeja dan kursi belajar/ lemari pakaian/ lemari perabotan (pilih salah satu).<br />\r\nCermin di kamar<br />\r\nBebas bawa peralatan elektonik dan tidak kena cas lagi<br />\r\nSetiap kamar dibersihkan seminggu sekali oleh ibu kosnya langsung.<br />\r\nKamar mandi bersih dan terawat setiap harinya diluar<br />\r\nKamar cuci pakaian luas<br />\r\nTempat cuci pir', '', 0, 1, 1, '2016-10-10 12:45:04', '2016-10-10 12:47:31', -1, 32, 0, '', '', NULL, 0),
(4, 'Kost Campur  Gunlipit', 'Kost Gunlipit<br />\r\nSekamar Boleh Berdua: Boleh berdua (pasangan suami istri sah)<br />\r\nBiaya Tambahan Sekamar Berdua: Bebas biaya<br />\r\nFasilitas: Kamar mandi di dalam, kasur single spring bed, shower air, AC, parkir motor,<br />\r\nFasilitas Umum: –<br />\r\nFasilitas Sekitar: Pondok Indah Mall 1 dan 2 dan Street Gallery, Blok M Plaza, Blok M Square, Melawai Plaza, Gandaria City, Senayan City, Plasa Senayan<br />\r\nPusat kuliner Radio Dalam, Grand Lucky Supermarket. R.S Pertamina, R.S. Gandaria.', '650000', 12, 12, 'uploads/41_2016/thumbs/f314c0726e7ced05814c88b60eab7dc8.jpg', 3, 0, '10', 1, 1, 'Radio Dalam, Jl. Haji Sajim No. 10 Rt. 006 Rw. 02 Kebayoran Baru', '106.79123997688293', '-6.254927657658784', 'Kost Gunlipit<br />\r\nSekamar Boleh Berdua: Boleh berdua (pasangan suami istri sah)<br />\r\nBiaya Tambahan Sekamar Berdua: Bebas biaya<br />\r\nFasilitas: Kamar mandi di dalam, kasur single spring bed, shower air, AC, parkir motor,<br />\r\nFasilitas Umum: –<br />\r\nFasilitas Sekitar: Pondok Indah Mall 1 dan 2 dan Street Gallery, Blok M Plaza, Blok M Square, Melawai Plaza, Gandaria City, Senayan City, Plasa Senayan<br />\r\nPusat kuliner Radio Dalam, Grand Lucky Supermarket. R.S Pertamina, R.S. Gandaria.', '', 0, 1, 1, '2016-10-11 09:30:20', '2016-10-11 09:32:57', -1, 27, 0, '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `estates_amenities`
--

CREATE TABLE IF NOT EXISTS `estates_amenities` (
`id` bigint(20) NOT NULL,
  `estates_id` bigint(20) DEFAULT NULL,
  `amenities_id` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estates_amenities`
--

INSERT INTO `estates_amenities` (`id`, `estates_id`, `amenities_id`, `created_at`, `updated_at`) VALUES
(7, 1, 4, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(8, 1, 5, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(9, 1, 8, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(10, 1, 12, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(11, 1, 13, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(12, 1, 14, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(13, 1, 15, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(14, 1, 16, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(15, 1, 17, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(16, 1, 18, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(17, 1, 19, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(18, 1, 20, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(19, 1, 21, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(20, 1, 22, '2016-10-10 12:28:34', '2016-10-10 12:28:34'),
(21, 2, 6, '2016-10-10 12:33:47', '2016-10-10 12:33:47'),
(22, 2, 8, '2016-10-10 12:33:47', '2016-10-10 12:33:47'),
(23, 2, 13, '2016-10-10 12:33:47', '2016-10-10 12:33:47'),
(24, 2, 15, '2016-10-10 12:33:47', '2016-10-10 12:33:47'),
(25, 2, 16, '2016-10-10 12:33:47', '2016-10-10 12:33:47'),
(26, 2, 19, '2016-10-10 12:33:47', '2016-10-10 12:33:47'),
(30, 3, 6, '2016-10-10 12:47:32', '2016-10-10 12:47:32'),
(31, 3, 9, '2016-10-10 12:47:32', '2016-10-10 12:47:32'),
(32, 3, 16, '2016-10-10 12:47:32', '2016-10-10 12:47:32'),
(37, 4, 4, '2016-10-11 09:32:57', '2016-10-11 09:32:57'),
(38, 4, 8, '2016-10-11 09:32:57', '2016-10-11 09:32:57'),
(39, 4, 9, '2016-10-11 09:32:57', '2016-10-11 09:32:57'),
(40, 4, 25, '2016-10-11 09:32:57', '2016-10-11 09:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `hist_newsletter`
--

CREATE TABLE IF NOT EXISTS `hist_newsletter` (
`id` int(11) NOT NULL,
  `subscribe_id` int(11) NOT NULL,
  `estates_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` bigint(20) NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `estates_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `thumb_path`, `estates_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/41_2016/b201c5bc562179772ecafd129de0baf3.jpg', 'uploads/41_2016/thumbs/b201c5bc562179772ecafd129de0baf3.jpg', 1, '2016-10-10 12:19:05', '2016-10-10 12:19:05'),
(2, 'uploads/41_2016/13facbf8b1e25d18806ca77ec1ef8d7a.jpg', 'uploads/41_2016/thumbs/13facbf8b1e25d18806ca77ec1ef8d7a.jpg', 1, '2016-10-10 12:19:05', '2016-10-10 12:19:05'),
(3, 'uploads/41_2016/772dd7041170930b42bce4ae4946badf.jpg', 'uploads/41_2016/thumbs/772dd7041170930b42bce4ae4946badf.jpg', 1, '2016-10-10 12:19:05', '2016-10-10 12:19:05'),
(4, 'uploads/41_2016/b8b48bf5158dac7df695a9bd2a011599.jpg', 'uploads/41_2016/thumbs/b8b48bf5158dac7df695a9bd2a011599.jpg', 1, '2016-10-10 12:19:06', '2016-10-10 12:19:06'),
(5, 'uploads/41_2016/f2534e118faeecc081823eb5b28c07e7.jpg', 'uploads/41_2016/thumbs/f2534e118faeecc081823eb5b28c07e7.jpg', 1, '2016-10-10 12:19:06', '2016-10-10 12:19:06'),
(6, 'uploads/41_2016/09bc155e261a577950f3fdee472e0b14.jpg', 'uploads/41_2016/thumbs/09bc155e261a577950f3fdee472e0b14.jpg', 1, '2016-10-10 12:19:06', '2016-10-10 12:19:06'),
(7, 'uploads/41_2016/79d53361810fd95ca7e95cced5b08d26.jpg', 'uploads/41_2016/thumbs/79d53361810fd95ca7e95cced5b08d26.jpg', 2, '2016-10-10 12:35:58', '2016-10-10 12:35:58'),
(8, 'uploads/41_2016/a454a921a4fc07102514cf1c553568df.jpg', 'uploads/41_2016/thumbs/a454a921a4fc07102514cf1c553568df.jpg', 2, '2016-10-10 12:35:59', '2016-10-10 12:35:59'),
(9, 'uploads/41_2016/2960226b1a23e93dad70f1eb376ebe08.jpg', 'uploads/41_2016/thumbs/2960226b1a23e93dad70f1eb376ebe08.jpg', 2, '2016-10-10 12:35:59', '2016-10-10 12:35:59'),
(10, 'uploads/41_2016/3524991b0dc0c39201967ac7b8a32054.jpg', 'uploads/41_2016/thumbs/3524991b0dc0c39201967ac7b8a32054.jpg', 2, '2016-10-10 12:35:59', '2016-10-10 12:35:59'),
(11, 'uploads/41_2016/30ed038d3118d903f2e04a84bd6baff2.jpg', 'uploads/41_2016/thumbs/30ed038d3118d903f2e04a84bd6baff2.jpg', 2, '2016-10-10 12:35:59', '2016-10-10 12:35:59'),
(12, 'uploads/41_2016/013968116ecb2c7dff1affd2340b53e7.jpg', 'uploads/41_2016/thumbs/013968116ecb2c7dff1affd2340b53e7.jpg', 3, '2016-10-10 12:47:05', '2016-10-10 12:47:05'),
(13, 'uploads/41_2016/98bf42b3a6d9a70feb139b8da845b9d0.jpg', 'uploads/41_2016/thumbs/98bf42b3a6d9a70feb139b8da845b9d0.jpg', 3, '2016-10-10 12:47:06', '2016-10-10 12:47:06'),
(14, 'uploads/41_2016/78a6be2b6d7eb9a4808eac67b2ea6768.jpg', 'uploads/41_2016/thumbs/78a6be2b6d7eb9a4808eac67b2ea6768.jpg', 3, '2016-10-10 12:47:07', '2016-10-10 12:47:07'),
(15, 'uploads/41_2016/f9498281c5dc60a9af41a378f56f223a.jpg', 'uploads/41_2016/thumbs/f9498281c5dc60a9af41a378f56f223a.jpg', 3, '2016-10-10 12:47:24', '2016-10-10 12:47:24'),
(16, 'uploads/41_2016/75ef6983bbc7d655c94dd2dc26e4b3f8.jpg', 'uploads/41_2016/thumbs/75ef6983bbc7d655c94dd2dc26e4b3f8.jpg', 3, '2016-10-10 12:47:26', '2016-10-10 12:47:26'),
(17, 'uploads/41_2016/0f87fd3a2e13962bbe33d816d370633c.jpg', 'uploads/41_2016/thumbs/0f87fd3a2e13962bbe33d816d370633c.jpg', 3, '2016-10-10 12:47:28', '2016-10-10 12:47:28'),
(18, 'uploads/41_2016/1c745a4c61f36752cd92b3a350736cc2.jpg', 'uploads/41_2016/thumbs/1c745a4c61f36752cd92b3a350736cc2.jpg', 4, '2016-10-11 09:32:53', '2016-10-11 09:32:53'),
(19, 'uploads/41_2016/46472bcabbc8e3af7cb5c548741bad28.jpg', 'uploads/41_2016/thumbs/46472bcabbc8e3af7cb5c548741bad28.jpg', 4, '2016-10-11 09:32:53', '2016-10-11 09:32:53'),
(20, 'uploads/41_2016/f314c0726e7ced05814c88b60eab7dc8.jpg', 'uploads/41_2016/thumbs/f314c0726e7ced05814c88b60eab7dc8.jpg', 4, '2016-10-11 09:32:53', '2016-10-11 09:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `activated` tinyint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `marker`
--

CREATE TABLE IF NOT EXISTS `marker` (
`id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marker`
--

INSERT INTO `marker` (`id`, `path`, `created_at`, `updated_at`) VALUES
(8, 'uploads/marker/e8947763dac440d71bb0de2fe41f110d.png', '2016-09-06 12:11:14', '2016-09-06 12:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
`id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `max_post` smallint(6) DEFAULT NULL,
  `expr_time` mediumint(6) DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `activated` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id` bigint(20) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_menu` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
`id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT '0',
  `cat_id` varchar(200) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `avt` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `pined` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post_cats`
--

CREATE TABLE IF NOT EXISTS `post_cats` (
`id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT '0',
  `order` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
`id` int(11) NOT NULL,
  `estates_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `value` int(1) NOT NULL,
  `comment_title` text NOT NULL,
  `comment_desc` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spams`
--

CREATE TABLE IF NOT EXISTS `spams` (
`id` bigint(20) unsigned NOT NULL,
  `sender` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_user`
--

CREATE TABLE IF NOT EXISTS `subscribe_user` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `categories` int(11) NOT NULL,
  `cities` int(11) NOT NULL,
  `types` int(11) NOT NULL,
  `price_1` longtext NOT NULL,
  `price_2` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `update_url` text NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `top_slider`
--

CREATE TABLE IF NOT EXISTS `top_slider` (
`id` bigint(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`, `parent_id`, `order`, `type`, `activated`) VALUES
(1, 'Putri', '2016-06-08 13:37:17', '2016-06-08 13:37:17', 0, 4, 1, 1),
(2, 'Putra', '2016-06-08 13:37:48', '2016-06-08 13:37:48', 0, 5, 1, 1),
(3, 'Campur', '2016-06-08 13:42:31', '2016-06-08 13:42:31', 0, 7, 1, 1),
(4, 'Putri/Pasutri', '2016-06-08 13:43:02', '2016-06-08 13:43:02', 0, 8, 1, 1),
(5, 'Campur/Pasutri', '2016-06-08 13:43:36', '2016-06-08 13:43:36', 0, 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` bigint(20) NOT NULL,
  `fb_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `skype` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `perm` tinyint(4) DEFAULT '2',
  `avt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(4) NOT NULL DEFAULT '1',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `user_name`, `pwd`, `full_name`, `email`, `phone`, `address`, `skype`, `updated_at`, `created_at`, `perm`, `avt`, `activated`, `activation_code`, `ip`) VALUES
(1, '', 'Shanny', 'a22964d4e2a10bec3d2c8d0449389583', 'Shanny', 'srachmandani@gmail.com', '082222200925', 'tests', 'shanny.rachmandani', '2016-10-12 14:40:01', NULL, 0, 'uploads/avts/39_2016/100b3c3f5c9868ee73d85509724cbc16.png', 1, NULL, '127.0.0.1'),
(12, '', '4dm1n', '963e34a30f3d0bf5621643acb5a5291f', '', 'noreply@rumaqu.com', '', 'no address', '', '2016-10-11 11:09:56', NULL, 0, 'uploads/avts/39_2016/100b3c3f5c9868ee73d85509724cbc16.png', 1, NULL, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `verified_account`
--

CREATE TABLE IF NOT EXISTS `verified_account` (
`id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(16) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `pwd` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estates_amenities`
--
ALTER TABLE `estates_amenities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hist_newsletter`
--
ALTER TABLE `hist_newsletter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marker`
--
ALTER TABLE `marker`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_cats`
--
ALTER TABLE `post_cats`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spams`
--
ALTER TABLE `spams`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_user`
--
ALTER TABLE `subscribe_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_slider`
--
ALTER TABLE `top_slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`id`,`name`), ADD UNIQUE KEY `name` (`name`) USING BTREE, ADD UNIQUE KEY `name_2` (`name`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_name` (`user_name`), ADD UNIQUE KEY `phone` (`phone`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `verified_account`
--
ALTER TABLE `verified_account`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `estates_amenities`
--
ALTER TABLE `estates_amenities`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `hist_newsletter`
--
ALTER TABLE `hist_newsletter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `marker`
--
ALTER TABLE `marker`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_cats`
--
ALTER TABLE `post_cats`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spams`
--
ALTER TABLE `spams`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribe_user`
--
ALTER TABLE `subscribe_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top_slider`
--
ALTER TABLE `top_slider`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `verified_account`
--
ALTER TABLE `verified_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
