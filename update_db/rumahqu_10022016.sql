-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2016 at 02:52 PM
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
CREATE DATABASE IF NOT EXISTS `rumahqu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rumahqu`;

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
`id` tinyint(4) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
(11, ' Blower', '2016-06-20 08:42:50', '2016-06-20 08:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
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

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `county_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `county_id`, `created_at`, `updated_at`) VALUES
(6, 'Batam', 4, '2016-06-05 11:55:31', '2016-06-05 11:55:31'),
(7, 'Banjar', 5, '2016-06-05 11:55:41', '2016-06-05 11:55:41'),
(9, 'Cisaga', 5, '2016-07-09 20:42:03', '2016-07-09 20:42:03'),
(10, 'Ciamis', 5, '2016-07-09 20:42:14', '2016-07-09 20:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
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

DROP TABLE IF EXISTS `countries`;
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

DROP TABLE IF EXISTS `county`;
CREATE TABLE IF NOT EXISTS `county` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`id`, `name`, `zip_code`, `updated_at`, `created_at`) VALUES
(4, 'Riau', NULL, '2016-06-05 11:55:07', '2016-06-05 11:55:07'),
(5, 'JawaBarat', NULL, '2016-07-09 20:41:09', '2016-07-09 20:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

DROP TABLE IF EXISTS `estates`;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`id`, `title`, `content`, `price`, `user_id`, `county_id`, `image_path`, `types_id`, `report`, `area`, `bathrooms`, `bedrooms`, `address`, `lng`, `lat`, `description`, `marker_id`, `purpose`, `status`, `activated`, `created_at`, `updated_at`, `time_rate`, `cities_id`, `view_counter`, `keyword`, `link_youtube`, `parent_id`, `featured`) VALUES
(1, 'kkklklkl', 'ad', '212312412', 7, 4, 'uploads/39_2016/thumbs/1c14e15a753aa37b8b118ef8477be182.png', 15, 0, '1', 1, 1, 'asdadad', '2.4609375', '6.184246161280591', 'ad', '', 0, NULL, 1, '2016-10-02 18:08:32', '2016-10-02 18:09:11', -1, 6, 0, '', '', NULL, 0),
(2, 'asdadaf', 'afasas', '12112125', 7, 4, 'uploads/39_2016/thumbs/c80e70988cc37472636ab123d5bd48b6.png', 15, 0, '2', 1, 1, 'asda', '18.017578125', '14.26438308756265', 'afasas', '', 0, NULL, 1, '2016-10-02 18:11:17', '2016-10-02 18:11:45', 0, 6, 0, '', '', NULL, 0),
(3, 'asfaafaf', 'asfafa', '12412414', 7, 5, 'uploads/39_2016/thumbs/e47833854334f938bc5694867b472f1e.png', 15, 0, '1', 1, 1, 'asdafa', '9.8876953125', '7.231698708367139', 'asfafa', '', 0, NULL, 1, '2016-10-02 18:12:36', '2016-10-02 18:12:56', 0, 9, 0, '', '', NULL, 0),
(4, 'afaafa', 'afaaaf', '1241515', 7, 4, 'uploads/39_2016/thumbs/b5b2e7001e9d4b7f08c901315155bbfb.png', 15, 0, '3', 2, 1, 'adafaf', '12.041015625', '5.00339434502215', 'afaaaf', '', 0, NULL, 1, '2016-10-02 18:14:26', '2016-10-02 18:14:47', -1, 6, 0, '', '', NULL, 0),
(6, 'dfghjkl', '123', '123', 7, 5, NULL, 16, 0, '123', 123, 123, 'adsfghj', '7.55859375', '6.358975327235661', '123', '', 1, 0, 1, '2016-10-02 18:18:29', '2016-10-02 18:18:29', 1, 9, 0, '', '', NULL, 0),
(7, 'asssssssssssssssssssssssskol', '123', '123', 7, 4, NULL, 17, 0, '123', 123, 123, 'ads', '17.578125', '-3.337953961416472', '123', '', 1, NULL, 1, '2016-10-02 18:20:52', '2016-10-02 18:20:52', 1, 6, 0, '', '', NULL, 0),
(8, '12321321321321321', '132131', '123123', 7, 5, NULL, 18, 0, '12312321', 127, 127, '123213213', '10.72265625', '7.667441482726068', '132131', '', 2, NULL, 1, '2016-10-02 18:24:34', '2016-10-02 18:24:34', 1, 7, 0, '', '', NULL, 0),
(9, '123123213123', 'asdasd', '123213123', 7, 4, NULL, 16, 0, '12321321', 127, 127, 'asdasd', '17.75390625', '8.363692651835823', 'asdasd', '', 1, 1, 1, '2016-10-02 18:26:08', '2016-10-02 18:26:08', 1, 6, 0, '', '', NULL, 0),
(10, 'asdasdasd', '123213213', '123213', 7, 5, NULL, 16, 0, '123213', 127, 127, 'asdasd', '11.513671875', '5.878332109674328', '123213213', '', 1, 1, 1, '2016-10-02 18:29:10', '2016-10-02 18:29:10', 1, 7, 0, '', '', NULL, 0),
(11, 'adsasdasd', '12323', '34567', 7, 4, NULL, 19, 0, '7890', 127, 127, 'asdasd', '19.8193359375', '6.271618064314865', '12323', '', 0, 1, 0, '2016-10-02 18:30:26', '2016-10-02 18:30:26', 1, 6, 0, '', '', NULL, 0),
(12, '123213', 'ads', '123213', 7, 5, NULL, 17, 0, '123123', 123, 123, '123213', '-0.615234375', '5.353521355337334', 'ads', '', 0, 0, 1, '2016-10-02 18:31:45', '2016-10-02 18:31:45', 1, 7, 0, '', '', NULL, 0),
(13, '123213', '123213', '123', 7, 4, NULL, 16, 0, '123123', 127, 127, '123213', '19.423828125', '7.406047717076271', '123213', '', 1, 1, 1, '2016-10-02 18:32:47', '2016-10-02 18:32:47', 1, 6, 0, '', '', NULL, 0),
(14, 'asdasd', '123', '123123', 7, 5, NULL, 17, 0, '12321', 127, 127, 'asdasdasd', '13.18359375', '-0.9228116626856938', '123', '', 0, 0, 1, '2016-10-02 18:34:50', '2016-10-02 19:47:43', 0, 7, 0, '', '', NULL, 0),
(15, 'adsasd', '123', '123213', 7, 5, NULL, 19, 0, '123213', 127, 127, '123213', '19.599609375', '0.3076157096439005', '123', '', 0, 1, 1, '2016-10-02 18:36:38', '2016-10-02 18:36:38', 1, 9, 0, '', '', NULL, 0),
(16, '13213', '123213213', '123123', 7, 4, NULL, 16, 0, '123213', 127, 127, 'adasd', '10.458984375', '3.8204080831949407', '123213213', '', 1, 0, 1, '2016-10-02 18:38:56', '2016-10-02 18:38:56', 1, 6, 0, '', '', NULL, 0),
(17, 'RUMAHQU', '13213', '123213', 7, 4, NULL, 16, 0, '123', 1, 1, 'JALAN GILI SAMPENG', '12.7001953125', '1.7136116598836224', '13213', '', 1, 1, 1, '2016-10-02 19:38:30', '2016-10-02 19:38:30', 0, 6, 0, '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `estates_amenities`
--

DROP TABLE IF EXISTS `estates_amenities`;
CREATE TABLE IF NOT EXISTS `estates_amenities` (
`id` bigint(20) NOT NULL,
  `estates_id` bigint(20) DEFAULT NULL,
  `amenities_id` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estates_amenities`
--

INSERT INTO `estates_amenities` (`id`, `estates_id`, `amenities_id`, `created_at`, `updated_at`) VALUES
(5, 4, 3, '2016-10-02 18:14:47', '2016-10-02 18:14:47'),
(6, 4, 4, '2016-10-02 18:14:47', '2016-10-02 18:14:47'),
(7, 4, 5, '2016-10-02 18:14:47', '2016-10-02 18:14:47'),
(8, 4, 6, '2016-10-02 18:14:47', '2016-10-02 18:14:47'),
(13, 5, 1, '2016-10-02 18:17:22', '2016-10-02 18:17:22'),
(14, 5, 3, '2016-10-02 18:17:22', '2016-10-02 18:17:22'),
(15, 5, 5, '2016-10-02 18:17:22', '2016-10-02 18:17:22'),
(16, 5, 6, '2016-10-02 18:17:22', '2016-10-02 18:17:22'),
(17, 6, 6, '2016-10-02 18:18:29', '2016-10-02 18:18:29'),
(18, 6, 7, '2016-10-02 18:18:29', '2016-10-02 18:18:29'),
(19, 6, 8, '2016-10-02 18:18:29', '2016-10-02 18:18:29'),
(20, 7, 2, '2016-10-02 18:20:52', '2016-10-02 18:20:52'),
(21, 7, 3, '2016-10-02 18:20:52', '2016-10-02 18:20:52'),
(22, 7, 4, '2016-10-02 18:20:52', '2016-10-02 18:20:52'),
(23, 8, 7, '2016-10-02 18:24:35', '2016-10-02 18:24:35'),
(24, 8, 8, '2016-10-02 18:24:35', '2016-10-02 18:24:35'),
(25, 11, 3, '2016-10-02 18:30:26', '2016-10-02 18:30:26'),
(26, 11, 5, '2016-10-02 18:30:26', '2016-10-02 18:30:26'),
(27, 12, 1, '2016-10-02 18:31:45', '2016-10-02 18:31:45'),
(28, 13, 2, '2016-10-02 18:32:47', '2016-10-02 18:32:47'),
(30, 15, 2, '2016-10-02 18:36:38', '2016-10-02 18:36:38'),
(31, 16, 2, '2016-10-02 18:38:56', '2016-10-02 18:38:56'),
(32, 17, 2, '2016-10-02 19:38:30', '2016-10-02 19:38:30'),
(38, 14, 4, '2016-10-02 19:47:43', '2016-10-02 19:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
`id` bigint(20) NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thumb_path` varchar(255) NOT NULL,
  `estates_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `thumb_path`, `estates_id`, `created_at`, `updated_at`) VALUES
(20, 'uploads/23_2016/6833196f30547dc3632e30d4dd454bfd.png', 'uploads/23_2016/thumbs/6833196f30547dc3632e30d4dd454bfd.png', 12, '2016-06-06 14:25:26', '2016-06-06 14:25:26'),
(18, 'uploads/23_2016/41afb58793611cbeb7caa67603dbb424.jpg', 'uploads/23_2016/thumbs/41afb58793611cbeb7caa67603dbb424.jpg', 12, '2016-06-06 14:24:51', '2016-06-06 14:24:51'),
(21, 'uploads/23_2016/41df69926e33e2f4a7aae80c18a49cb8.jpg', 'uploads/23_2016/thumbs/41df69926e33e2f4a7aae80c18a49cb8.jpg', 12, '2016-06-06 14:26:01', '2016-06-06 14:26:01'),
(22, 'uploads/23_2016/23484e71f57f33f83be45c9e99f1dfa7.jpg', 'uploads/23_2016/thumbs/23484e71f57f33f83be45c9e99f1dfa7.jpg', 12, '2016-06-06 14:26:03', '2016-06-06 14:26:03'),
(23, 'uploads/23_2016/7e7591083bbf2c19be61e4f37da58eb8.jpg', 'uploads/23_2016/thumbs/7e7591083bbf2c19be61e4f37da58eb8.jpg', 12, '2016-06-06 14:26:05', '2016-06-06 14:26:05'),
(24, 'uploads/23_2016/5d9a130042711214a1343427076c4d10.jpg', 'uploads/23_2016/thumbs/5d9a130042711214a1343427076c4d10.jpg', 12, '2016-06-06 14:26:08', '2016-06-06 14:26:08'),
(25, 'uploads/23_2016/b5e8bb98708d759379cf98d9f6f840e3.jpg', 'uploads/23_2016/thumbs/b5e8bb98708d759379cf98d9f6f840e3.jpg', 12, '2016-06-06 14:26:10', '2016-06-06 14:26:10'),
(26, 'uploads/23_2016/b2f14a7b42b38a9e4b06eb268430f5e5.jpg', 'uploads/23_2016/thumbs/b2f14a7b42b38a9e4b06eb268430f5e5.jpg', 12, '2016-06-06 14:26:15', '2016-06-06 14:26:15'),
(56, 'uploads/39_2016/c80e70988cc37472636ab123d5bd48b6.png', 'uploads/39_2016/thumbs/c80e70988cc37472636ab123d5bd48b6.png', 2, '2016-10-02 18:11:30', '2016-10-02 18:11:30'),
(28, 'uploads/23_2016/301f0151d4958cb03fab56cf4b415a51.jpg', 'uploads/23_2016/thumbs/301f0151d4958cb03fab56cf4b415a51.jpg', 12, '2016-06-08 14:44:00', '2016-06-08 14:44:00'),
(29, 'uploads/23_2016/e332d76095ce7ba02ade41d6b8d18e1c.jpg', 'uploads/23_2016/thumbs/e332d76095ce7ba02ade41d6b8d18e1c.jpg', 12, '2016-06-08 14:44:02', '2016-06-08 14:44:02'),
(30, 'uploads/23_2016/42bb2af98ee9bb90197addc0fdfc6e7b.jpg', 'uploads/23_2016/thumbs/42bb2af98ee9bb90197addc0fdfc6e7b.jpg', 12, '2016-06-08 14:44:04', '2016-06-08 14:44:04'),
(55, 'uploads/39_2016/1c14e15a753aa37b8b118ef8477be182.png', 'uploads/39_2016/thumbs/1c14e15a753aa37b8b118ef8477be182.png', 1, '2016-10-02 18:08:55', '2016-10-02 18:08:55'),
(32, 'uploads/23_2016/9e8a535e1b4d7f13c4876dacf6683522.jpg', 'uploads/23_2016/thumbs/9e8a535e1b4d7f13c4876dacf6683522.jpg', 12, '2016-06-09 01:23:09', '2016-06-09 01:23:09'),
(33, 'uploads/23_2016/432ad012233094f9196c2953648211b7.jpg', 'uploads/23_2016/thumbs/432ad012233094f9196c2953648211b7.jpg', 12, '2016-06-09 01:23:30', '2016-06-09 01:23:30'),
(57, 'uploads/39_2016/e47833854334f938bc5694867b472f1e.png', 'uploads/39_2016/thumbs/e47833854334f938bc5694867b472f1e.png', 3, '2016-10-02 18:12:55', '2016-10-02 18:12:55'),
(58, 'uploads/39_2016/b5b2e7001e9d4b7f08c901315155bbfb.png', 'uploads/39_2016/thumbs/b5b2e7001e9d4b7f08c901315155bbfb.png', 4, '2016-10-02 18:14:46', '2016-10-02 18:14:46'),
(59, 'uploads/39_2016/d83b69593f280ab4a51fb2539c640d83.jpg', 'uploads/39_2016/thumbs/d83b69593f280ab4a51fb2539c640d83.jpg', 5, '2016-10-02 13:23:26', '2016-10-02 13:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
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

DROP TABLE IF EXISTS `marker`;
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
(7, 'uploads/marker/d85d67467aca58e416271790d6d89e3a.png', '2016-06-05 12:02:50', '2016-06-05 12:02:50'),
(8, 'uploads/marker/e8947763dac440d71bb0de2fe41f110d.png', '2016-09-06 12:11:14', '2016-09-06 12:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
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

DROP TABLE IF EXISTS `page`;
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

DROP TABLE IF EXISTS `partner`;
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

DROP TABLE IF EXISTS `posts`;
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

DROP TABLE IF EXISTS `post_cats`;
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

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
`id` int(11) NOT NULL,
  `estates_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `value` int(1) NOT NULL,
  `comment_title` text NOT NULL,
  `comment_desc` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `estates_id`, `users_id`, `value`, `comment_title`, `comment_desc`, `created_date`, `updated_date`) VALUES
(1, 22, 7, 4, 'testing title', 'testing', '2016-09-16 00:00:00', '0000-00-00 00:00:00'),
(2, 22, 8, 3, 'testing', 'testing', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 22, 11, 2, '', '', '2016-09-26 12:00:09', '2016-09-26 12:00:09'),
(4, 25, 11, 4, '', '', '2016-09-24 10:24:40', '2016-09-24 10:24:40'),
(5, 25, 10, 4, 'monyet', '', '2016-10-01 08:44:34', '2016-10-01 08:44:34'),
(6, 24, 10, 5, 'Adam Bagong', 'siga bagin', '2016-10-02 09:02:36', '2016-10-02 09:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `spams`
--

DROP TABLE IF EXISTS `spams`;
CREATE TABLE IF NOT EXISTS `spams` (
`id` bigint(20) unsigned NOT NULL,
  `sender` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spams`
--

INSERT INTO `spams` (`id`, `sender`, `receiver`, `content`, `created_at`, `updated_at`) VALUES
(1, 'danny@gmail.com', 'asti@gmail.com', 'dor', '2016-06-19 10:01:40', '2016-06-19 10:01:40'),
(2, 'danny@gmail.com', 'srachmandani@gmail.com', 'oyyyyy', '2016-06-19 10:22:55', '2016-06-19 10:22:55'),
(3, 'danny@gmail.com', 'srachmandani@gmail.com', 'uy', '2016-06-19 10:28:28', '2016-06-19 10:28:28'),
(4, 'srachmandani@gmail.com', 'dedendjuanda03@gmail.com', 'test', '2016-06-19 10:33:42', '2016-06-19 10:33:42'),
(5, 'dedend@gmail.com', 'srachmandani@gmail.com', 'test', '2016-06-19 11:46:52', '2016-06-19 11:46:52'),
(6, 'dedend@gmail.com', 'srachmandani@gmail.com', 'uy', '2016-06-19 11:54:53', '2016-06-19 11:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_user`
--

DROP TABLE IF EXISTS `subscribe_user`;
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
  `update_url` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe_user`
--

INSERT INTO `subscribe_user` (`id`, `name`, `email`, `phone`, `categories`, `cities`, `types`, `price_1`, `price_2`, `created_at`, `updated_at`, `update_url`) VALUES
(9, 'Adam Prayogo', 'adamprayogos@gmail.com', '+62383833834', 0, 9, 18, '0', '99999999', '2016-10-01 16:57:26', '2016-10-01 16:57:26', '544694de74fd28086a81');

-- --------------------------------------------------------

--
-- Table structure for table `top_slider`
--

DROP TABLE IF EXISTS `top_slider`;
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

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
`id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`, `parent_id`, `order`, `type`, `activated`) VALUES
(15, 'Putri', '2016-06-08 13:37:17', '2016-06-08 13:37:17', 0, 4, 1, 1),
(16, 'Putra', '2016-06-08 13:37:48', '2016-06-08 13:37:48', 0, 5, 1, 1),
(17, 'Putra/Putri', '2016-06-08 13:41:29', '2016-06-08 13:41:29', 0, 6, 1, 1),
(18, 'Campur', '2016-06-08 13:42:31', '2016-06-08 13:42:31', 0, 7, 1, 1),
(19, 'Putri/Pasutri', '2016-06-08 13:43:02', '2016-06-08 13:43:02', 0, 8, 1, 1),
(20, 'Putra/Pasutri', '2016-06-08 13:43:36', '2016-06-08 13:43:36', 0, 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `user_name`, `pwd`, `full_name`, `email`, `phone`, `address`, `skype`, `updated_at`, `created_at`, `perm`, `avt`, `activated`, `activation_code`, `ip`) VALUES
(7, '', 'Shanny', 'a22964d4e2a10bec3d2c8d0449389583', 'Shanny', 'srachmandani@gmail.com', '082222200925', 'tests', 'shanny.rachmandani', '2016-10-02 19:19:32', NULL, 0, 'uploads/avts/39_2016/100b3c3f5c9868ee73d85509724cbc16.png', 1, NULL, '127.0.0.1'),
(8, '', 'dannylee', '172f49056c679e64af3f65897d602ceb', 'Danny Lee', 'dedend@gmail.com', '081277280686', 'Jalan Laksamana Bintan Kompleks Executive Center Blok I/12A', '0', '2016-06-19 17:36:17', '2016-06-18 16:18:25', 0, '', 1, NULL, '114.125.50.231'),
(10, '', 'dummy', '0d19706f63604d9d52440402b204c09c', 'dummy', 'dummy@dummy.com', '82387059831', 'CISAGA KOTA NO 27 RT 02 RW 08 KEL CISAGA KEC CISAGA CIAMIS', '', '2016-10-01 12:51:07', '2016-09-23 19:29:29', 0, 'uploads/avts/39_2016/a6b2cd2330bc47ea6d86fa2f0c5221a8.png', 1, NULL, '192.168.43.5'),
(11, '', 'localhost', '8aec552a24e72035c9801e782d151e5a', 'root root', 'localhost@localhost.com', '1.2312323124214E14', 'dibawah perut, tengah2 paha', 'skype@ajah.net', '2016-10-01 07:44:49', '2016-09-24 15:00:19', 0, '', 1, NULL, '192.168.43.5');

-- --------------------------------------------------------

--
-- Table structure for table `verified_account`
--

DROP TABLE IF EXISTS `verified_account`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verified_account`
--

INSERT INTO `verified_account` (`id`, `email`, `code`, `user_name`, `full_name`, `address`, `phone`, `pwd`, `created_at`, `updated_at`) VALUES
(4, 'srachmandani@gmail.com', '15f2a7', 'tests', 'tests', '', '', 'e0a91461ab6bc58eeba15639a8d8733b', '2016-06-09 10:18:15', '2016-06-09 10:18:15');

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
MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `estates`
--
ALTER TABLE `estates`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `estates_amenities`
--
ALTER TABLE `estates_amenities`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `spams`
--
ALTER TABLE `spams`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subscribe_user`
--
ALTER TABLE `subscribe_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `top_slider`
--
ALTER TABLE `top_slider`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `verified_account`
--
ALTER TABLE `verified_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
