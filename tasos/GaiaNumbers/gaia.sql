-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2023 at 02:28 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaiav2`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `average_measurements`
--

CREATE TABLE `average_measurements` (
  `id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `average_value` float NOT NULL,
  `counter` int(11) NOT NULL,
  `time_interval_id` int(11) NOT NULL,
  `sensor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `translation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`, `active`, `translation`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93, 0, NULL),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355, 0, NULL),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213, 0, NULL),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684, 0, NULL),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376, 0, NULL),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244, 0, NULL),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264, 0, NULL),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0, 0, NULL),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268, 0, NULL),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54, 0, NULL),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374, 0, NULL),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297, 0, NULL),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61, 0, NULL),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43, 0, NULL),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994, 0, NULL),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242, 0, NULL),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973, 0, NULL),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880, 0, NULL),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246, 0, NULL),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375, 0, NULL),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32, 0, NULL),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501, 0, NULL),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229, 0, NULL),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441, 0, NULL),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975, 0, NULL),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591, 0, NULL),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387, 0, NULL),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267, 0, NULL),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0, 0, NULL),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55, 0, NULL),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246, 0, NULL),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673, 0, NULL),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359, 0, NULL),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226, 0, NULL),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257, 0, NULL),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855, 0, NULL),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237, 0, NULL),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1, 0, NULL),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238, 0, NULL),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345, 0, NULL),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236, 0, NULL),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235, 0, NULL),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56, 0, NULL),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86, 0, NULL),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61, 0, NULL),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672, 0, NULL),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57, 0, NULL),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269, 0, NULL),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242, 0, NULL),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242, 0, NULL),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682, 0, NULL),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506, 0, NULL),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225, 0, NULL),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385, 0, NULL),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53, 0, NULL),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357, 0, NULL),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420, 0, NULL),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45, 0, NULL),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253, 0, NULL),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767, 0, NULL),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809, 0, NULL),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593, 0, NULL),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20, 0, NULL),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503, 0, NULL),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240, 0, NULL),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291, 0, NULL),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372, 0, NULL),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251, 0, NULL),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, 0, NULL),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298, 0, NULL),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679, 0, NULL),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358, 0, NULL),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33, 0, NULL),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594, 0, NULL),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689, 0, NULL),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0, 0, NULL),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241, 0, NULL),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220, 0, NULL),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995, 0, NULL),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49, 0, NULL),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233, 0, NULL),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350, 0, NULL),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30, 1, NULL),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299, 0, NULL),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473, 0, NULL),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590, 0, NULL),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671, 0, NULL),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502, 0, NULL),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224, 0, NULL),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245, 0, NULL),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592, 0, NULL),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509, 0, NULL),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0, 0, NULL),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39, 0, NULL),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504, 0, NULL),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852, 0, NULL),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36, 0, NULL),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354, 0, NULL),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91, 0, NULL),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62, 0, NULL),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98, 0, NULL),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964, 0, NULL),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353, 0, NULL),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972, 0, NULL),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39, 0, NULL),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876, 0, NULL),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81, 0, NULL),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962, 0, NULL),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7, 0, NULL),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254, 0, NULL),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686, 0, NULL),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850, 0, NULL),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82, 0, NULL),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965, 0, NULL),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996, 0, NULL),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856, 0, NULL),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371, 0, NULL),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961, 0, NULL),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266, 0, NULL),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231, 0, NULL),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, 0, NULL),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423, 0, NULL),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370, 0, NULL),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352, 0, NULL),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853, 0, NULL),
(126, 'MK', 'FYROM', 'FYROM', 'MKD', 807, 389, 0, NULL),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261, 0, NULL),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265, 0, NULL),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60, 0, NULL),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960, 0, NULL),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223, 0, NULL),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356, 0, NULL),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692, 0, NULL),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596, 0, NULL),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222, 0, NULL),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230, 0, NULL),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269, 0, NULL),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52, 0, NULL),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691, 0, NULL),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373, 0, NULL),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377, 0, NULL),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976, 0, NULL),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664, 0, NULL),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212, 0, NULL),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258, 0, NULL),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95, 0, NULL),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264, 0, NULL),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674, 0, NULL),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977, 0, NULL),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31, 0, NULL),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599, 0, NULL),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687, 0, NULL),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64, 0, NULL),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505, 0, NULL),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227, 0, NULL),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234, 0, NULL),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683, 0, NULL),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672, 0, NULL),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670, 0, NULL),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47, 0, NULL),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968, 0, NULL),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92, 0, NULL),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680, 0, NULL),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970, 0, NULL),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507, 0, NULL),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675, 0, NULL),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595, 0, NULL),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51, 0, NULL),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63, 0, NULL),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0, 0, NULL),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48, 1, NULL),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351, 0, NULL),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787, 0, NULL),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974, 0, NULL),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262, 0, NULL),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40, 1, NULL),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70, 1, NULL),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250, 0, NULL),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290, 0, NULL),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869, 0, NULL),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758, 0, NULL),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508, 0, NULL),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, 0, NULL),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684, 0, NULL),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378, 0, NULL),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239, 0, NULL),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966, 0, NULL),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221, 0, NULL),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381, 0, NULL),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248, 0, NULL),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232, 0, NULL),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65, 0, NULL),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421, 0, NULL),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386, 0, NULL),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677, 0, NULL),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252, 0, NULL),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27, 0, NULL),
(198, 'GS', 'SOUTH GEORGIA AND SOUTH SANDWICH', 'South Georgia and South Sandwich', NULL, NULL, 0, 0, NULL),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34, 0, NULL),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94, 0, NULL),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249, 0, NULL),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597, 0, NULL),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47, 0, NULL),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268, 0, NULL),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46, 0, NULL),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41, 0, NULL),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963, 0, NULL),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886, 0, NULL),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992, 0, NULL),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255, 0, NULL),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66, 0, NULL),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670, 0, NULL),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228, 0, NULL),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690, 0, NULL),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676, 0, NULL),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868, 0, NULL),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216, 0, NULL),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90, 1, NULL),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370, 0, NULL),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649, 0, NULL),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688, 0, NULL),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256, 0, NULL),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380, 0, NULL),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971, 0, NULL),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44, 0, NULL),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1, 0, NULL),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1, 0, NULL),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598, 0, NULL),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998, 0, NULL),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678, 0, NULL),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58, 0, NULL),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84, 0, NULL),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284, 0, NULL),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340, 0, NULL),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681, 0, NULL),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212, 0, NULL),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967, 0, NULL),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260, 0, NULL),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `county_residence`
--

CREATE TABLE `county_residence` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `county_residence`
--

INSERT INTO `county_residence` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Ιωαννίνων', 83, '0000-00-00 00:00:00', NULL),
(2, 'Ζίτσας', 83, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2022-11-03 10:17:50', NULL),
(2, 'Female', '2022-11-03 10:17:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `input_position`
--

CREATE TABLE `input_position` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `input_position`
--

--ti metraei to kathe sensor, me to id tou kathe sensor, name ,desc kai pote egine created
INSERT INTO `input_position` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Carbon Monoxide (CO) for high concentrations [Calibrated],\r\nCarbon Monoxide (CO) for low concentrations [Calibrated],\r\nCarbon Dioxide (CO2) [Calibrated],\r\nOxygen (O2) [Calibrated],\r\nOzone (O3) [Calibrated],\r\nNitric Oxide (NO) for low concentrations [Calibrated],\r\nNitric Dioxide (NO2) high accuracy [Calibrated],\r\nSulfur Dioxide (SO2) high accuracy [Calibrated],\r\nAmmonia (NH3) for low concentrations [Calibrated],\r\nAmmonia (NH3) for high concentrations [Calibrated],\r\nMethane (CH4) and Combustible Gas [Calibrated],\r\nHydrogen (H2) [Calibrated],\r\nHydrogen Sulfide (H2S) [Calibrated],\r\nHydrogen Chloride (HCl) [Calibrated],\r\nHydrogen Cyanide (HCN) [Calibrated],\r\nPhosphine (PH3) [Calibrated],\r\nEthylene (ETO) [Calibrated],\r\nChlorine (Cl2) [Calibrated]', '2022-11-07 10:03:36', NULL),
(2, 'B', 'Carbon Monoxide (CO) for high concentrations [Calibrated],\r\nCarbon Monoxide (CO) for low concentrations [Calibrated],\r\nCarbon Dioxide (CO2) [Calibrated],\r\nOxygen (O2) [Calibrated],\r\nOzone (O3) [Calibrated],\r\nNitric Oxide (NO) for low concentrations [Calibrated],\r\nNitric Dioxide (NO2) high accuracy [Calibrated],\r\nSulfur Dioxide (SO2) high accuracy [Calibrated],\r\nAmmonia (NH3) for low concentrations [Calibrated],\r\nAmmonia (NH3) for high concentrations [Calibrated],\r\nMethane (CH4) and Combustible Gas [Calibrated],\r\nHydrogen (H2) [Calibrated],\r\nHydrogen Sulfide (H2S) [Calibrated],\r\nHydrogen Chloride (HCl) [Calibrated],\r\nHydrogen Cyanide (HCN) [Calibrated],\r\nPhosphine (PH3) [Calibrated],\r\nEthylene (ETO) [Calibrated],\r\nChlorine (Cl2) [Calibrated]', '2022-11-07 10:04:12', NULL),
(3, 'C', 'Carbon Monoxide (CO) for high concentrations [Calibrated],\r\nCarbon Monoxide (CO) for low concentrations [Calibrated],\r\nCarbon Dioxide (CO2) [Calibrated],\r\nOxygen (O2) [Calibrated],\r\nOzone (O3) [Calibrated],\r\nNitric Oxide (NO) for low concentrations [Calibrated],\r\nNitric Dioxide (NO2) high accuracy [Calibrated],\r\nSulfur Dioxide (SO2) high accuracy [Calibrated],\r\nAmmonia (NH3) for low concentrations [Calibrated],\r\nAmmonia (NH3) for high concentrations [Calibrated],\r\nMethane (CH4) and Combustible Gas [Calibrated],\r\nHydrogen (H2) [Calibrated],\r\nHydrogen Sulfide (H2S) [Calibrated],\r\nHydrogen Chloride (HCl) [Calibrated],\r\nHydrogen Cyanide (HCN) [Calibrated],\r\nPhosphine (PH3) [Calibrated],\r\nEthylene (ETO) [Calibrated],\r\nChlorine (Cl2) [Calibrated]', '2022-11-07 10:04:31', NULL),
(4, 'D1', 'Particle Matter (PM1 / PM2.5 / PM10) - Dust', '2022-11-07 10:05:09', '2022-11-07 10:07:12'),
(7, 'D2', 'Particle Matter (PM1 / PM2.5 / PM10) - Dust', '2022-11-07 10:08:15', NULL),
(8, 'D3', 'Particle Matter (PM1 / PM2.5 / PM10) - Dust', '2022-11-07 10:08:45', NULL),
(9, 'E1', 'Temperature, humidity and pressure,\r\nLuminosity (Luxes accuracy),\r\nUltrasound (distance measurement)', '2022-11-07 10:09:19', '2022-11-07 10:09:35'),
(10, 'E2', 'Temperature, humidity and pressure,\r\nLuminosity (Luxes accuracy),\r\nUltrasound (distance measurement)', '2022-11-07 10:10:06', NULL),
(11, 'E3', 'Temperature, humidity and pressure,\r\nLuminosity (Luxes accuracy),\r\nUltrasound (distance measurement)', '2022-11-07 10:10:17', NULL),
(12, 'F', 'Carbon Monoxide (CO) for high concentrations [Calibrated],\r\nCarbon Monoxide (CO) for low concentrations [Calibrated],\r\nCarbon Dioxide (CO2) [Calibrated],\r\nOxygen (O2) [Calibrated],\r\nOzone (O3) [Calibrated],\r\nNitric Oxide (NO) for low concentrations [Calibrated],\r\nNitric Dioxide (NO2) high accuracy [Calibrated],\r\nSulfur Dioxide (SO2) high accuracy [Calibrated],\r\nAmmonia (NH3) for low concentrations [Calibrated],\r\nAmmonia (NH3) for high concentrations [Calibrated],\r\nMethane (CH4) and Combustible Gas [Calibrated],\r\nHydrogen (H2) [Calibrated],\r\nHydrogen Sulfide (H2S) [Calibrated],\r\nHydrogen Chloride (HCl) [Calibrated],\r\nHydrogen Cyanide (HCN) [Calibrated],\r\nPhosphine (PH3) [Calibrated],\r\nEthylene (ETO) [Calibrated],\r\nChlorine (Cl2) [Calibrated]', '2022-11-07 10:10:34', NULL),
(13, 'Internal', 'Battery level', '2022-11-07 10:13:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `sensor_id` int(11) NOT NULL,
  `value` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `node`
--

CREATE TABLE `node` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `node_type_id` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `county_residence_id` int(11) NOT NULL,
  `postal_code` smallint(6) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `node`
--

INSERT INTO `node` (`id`, `name`, `description`, `node_type_id`, `address`, `city`, `county_residence_id`, `postal_code`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(1, 'Air Station 1', 'Air Monitoring + PM', 1, 'Μεγάλο Γαρδίκι', 'Ιωάννινα', 2, 32767, 39.7147, 20.7572, '0000-00-00 00:00:00', NULL),
(2, 'Air Station 2', 'Air Monitoring + PM', 1, 'Άγιος Ιωάννης', 'Ιωάννινα', 2, 32767, 39.7027, 20.8122, '0000-00-00 00:00:00', NULL),
(3, 'Air Station 3', 'Air Monitoring + PM', 1, 'Ελεούσα', 'Ιωάννινα', 2, 32767, 39.7066, 20.7926, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `node_sensors`
--

CREATE TABLE `node_sensors` (
  `sensor_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `node_type`
--

CREATE TABLE `node_type` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `icon` varchar(127) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `node_type`
--

INSERT INTO `node_type` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'EnvPro', 'Smart Environment PRO', '0000-00-00 00:00:00', '2022-11-09 08:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `city`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Ioannina Smart City', 'Monitoring of Air Quality', 'Ioannina', 83, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_node`
--

CREATE TABLE `project_node` (
  `project_id` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_node`
--

INSERT INTO `project_node` (`project_id`, `node_id`, `created_at`, `updated_at`) VALUES
(1, 1, '0000-00-00 00:00:00', NULL),
(1, 2, '0000-00-00 00:00:00', NULL),
(1, 3, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf32 NOT NULL,
  `description` varchar(255) CHARACTER SET utf32 NOT NULL,
  `min_value` float DEFAULT NULL,
  `max_value` float DEFAULT NULL,
  `unit` varchar(50) CHARACTER SET utf32 DEFAULT NULL,
  `hour_limit` float DEFAULT NULL,
  `eight_hours_limit` float DEFAULT NULL,
  `day_limit` float DEFAULT NULL,
  `month_limit` float DEFAULT NULL,
  `year_limit` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `name`, `description`, `min_value`, `max_value`, `unit`, `hour_limit`, `eight_hours_limit`, `day_limit`, `month_limit`, `year_limit`, `created_at`, `updated_at`) VALUES
(1, 'CO2', 'CO<sub>2</sub>', 0, 500, 'ppm', NULL, NULL, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(2, 'AP2', 'C<sub>4</sub>H<sub>10</sub>, CH<sub>3</sub>CH<sub>2</sub>OH, H<sub>2</sub>, CO, CH<sub>4</sub>', 1, 30, 'ppm', NULL, NULL, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(3, 'O3', 'O<sub>3</sub>', 0, 18, 'ppm', NULL, 120, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(4, 'TCA', 'Environment Temperature', -40, 85, '&deg;C', NULL, NULL, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(5, 'HUMA', 'Humidity', 0, 100, '%', NULL, NULL, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(6, 'BAT', 'Sensor Node Battery', 0, 100, '%', NULL, NULL, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(7, 'PM1', 'PM 1.0', 0.5, 300, 'μg/m<sup>3</sup>', NULL, NULL, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(8, 'PM2_5', 'PM 2.5', 0.5, 300, 'μg/m<sup>3</sup>', NULL, NULL, NULL, NULL, 25, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(9, 'PM10', 'PM 10', 0.5, 300, 'μg/m<sup>3</sup>', NULL, NULL, 50, NULL, 40, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(10, 'SO2', 'SO<sub>2</sub>', 0, 20, 'ppm', 350, NULL, 350, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(11, 'NO', 'NO', 0, 20, 'ppm', NULL, NULL, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(12, 'NO2', 'NO<sub>2</sub>', 0, 20, 'ppm', 200, NULL, 50, NULL, 40, '2022-11-03 10:17:06', '2022-11-03 10:17:06'),
(13, 'PRES', 'Pressure', 30000, 110000, 'Pa', NULL, NULL, NULL, NULL, NULL, '2022-11-03 10:17:06', '2022-11-03 10:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_input_position`
--

CREATE TABLE `sensor_input_position` (
  `sensor_id` int(11) NOT NULL,
  `input_position_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor_input_position`
--

INSERT INTO `sensor_input_position` (`sensor_id`, `input_position_id`, `created_at`, `updated_at`) VALUES
(3, 2, '2022-11-08 09:55:24', NULL),
(4, 9, '2022-11-08 09:57:24', NULL),
(5, 10, '2022-11-08 09:57:33', NULL),
(6, 13, '2022-11-08 09:58:04', NULL),
(7, 4, '2022-11-08 09:56:25', NULL),
(8, 7, '2022-11-08 09:56:32', NULL),
(9, 8, '2022-11-08 09:56:45', NULL),
(10, 1, '2022-11-08 09:55:03', NULL),
(11, 12, '2022-11-08 09:57:52', NULL),
(12, 3, '2022-11-08 09:55:45', NULL),
(13, 11, '2022-11-08 09:57:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `time_interval`
--

CREATE TABLE `time_interval` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `time_type_id` int(11) NOT NULL,
  `time_multiplier` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `time_type`
--

CREATE TABLE `time_type` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `time_seconds` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_type`
--

INSERT INTO `time_type` (`id`, `name`, `time_seconds`, `created_at`, `updated_at`) VALUES
(1, 'Second ', 1, '2022-01-10 11:15:36', NULL),
(2, 'Minute', 60, '2022-01-10 11:15:36', NULL),
(3, 'Hour', 3600, '2022-01-10 11:16:35', NULL),
(4, 'Day', 86400, '2022-01-10 11:16:35', NULL),
(5, 'Year', 31536000, '2022-01-10 11:18:51', NULL),
(6, 'Infinity', 999999999, '2022-01-10 11:18:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password_hash` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `verification_token` varchar(128) DEFAULT NULL,
  `password_reset_token` varchar(128) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `first_name`, `last_name`, `user_type_id`, `gender_id`, `country_id`, `address`, `verification_token`, `password_reset_token`, `token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@yahoo.com', '$2y$13$ttwe9TOAWFg.Xy6QiCknuuSDcsKCoqMwHLP9/nML/bvQgmbmRZoQy', 'Ad', 'Min', 1, 1, 83, 'Ioannina', 'AA3ktKVqSYQWeGBqUF5pIMrQ6JPx1l-g', 'uGfOOM7FOtpMuvq720K3mj7jDr2HgTXG', 'PqKpOmgtF4e3rlPay4BNRYLU6WW-1EU3', '2022-11-24 12:43:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'System Admin', '0000-00-00 00:00:00', NULL),
(2, 'Gaia User', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `average_measurements`
--
ALTER TABLE `average_measurements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_interval_id` (`time_interval_id`),
  ADD KEY `sensor_id` (`sensor_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `nicename` (`nicename`);

--
-- Indexes for table `county_residence`
--
ALTER TABLE `county_residence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `input_position`
--
ALTER TABLE `input_position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`,`timestamp`),
  ADD KEY `sensor_id` (`sensor_id`);

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `county_residence_id` (`county_residence_id`),
  ADD KEY `node_type_id` (`node_type_id`);

--
-- Indexes for table `node_sensors`
--
ALTER TABLE `node_sensors`
  ADD PRIMARY KEY (`sensor_id`,`node_id`),
  ADD KEY `node_id` (`node_id`);

--
-- Indexes for table `node_type`
--
ALTER TABLE `node_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `project_node`
--
ALTER TABLE `project_node`
  ADD PRIMARY KEY (`project_id`,`node_id`),
  ADD KEY `node_id` (`node_id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sensor_input_position`
--
ALTER TABLE `sensor_input_position`
  ADD PRIMARY KEY (`sensor_id`,`input_position_id`),
  ADD KEY `input_position_id` (`input_position_id`);

--
-- Indexes for table `time_interval`
--
ALTER TABLE `time_interval`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `time_type_id` (`time_type_id`);

--
-- Indexes for table `time_type`
--
ALTER TABLE `time_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `verification_token` (`verification_token`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `average_measurements`
--
ALTER TABLE `average_measurements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `county_residence`
--
ALTER TABLE `county_residence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `input_position`
--
ALTER TABLE `input_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `node`
--
ALTER TABLE `node`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `node_type`
--
ALTER TABLE `node_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_interval`
--
ALTER TABLE `time_interval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_type`
--
ALTER TABLE `time_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `average_measurements`
--
ALTER TABLE `average_measurements`
  ADD CONSTRAINT `average_measurements_ibfk_1` FOREIGN KEY (`time_interval_id`) REFERENCES `time_interval` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `average_measurements_ibfk_2` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `county_residence`
--
ALTER TABLE `county_residence`
  ADD CONSTRAINT `county_residence_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `measurements_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `node`
--
ALTER TABLE `node`
  ADD CONSTRAINT `node_ibfk_1` FOREIGN KEY (`county_residence_id`) REFERENCES `county_residence` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `node_ibfk_2` FOREIGN KEY (`node_type_id`) REFERENCES `node_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `node_sensors`
--
ALTER TABLE `node_sensors`
  ADD CONSTRAINT `node_sensors_ibfk_1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `node_sensors_ibfk_2` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_node`
--
ALTER TABLE `project_node`
  ADD CONSTRAINT `project_node_ibfk_1` FOREIGN KEY (`node_id`) REFERENCES `node` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_node_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sensor_input_position`
--
ALTER TABLE `sensor_input_position`
  ADD CONSTRAINT `sensor_input_position_ibfk_1` FOREIGN KEY (`input_position_id`) REFERENCES `input_position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sensor_input_position_ibfk_2` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_interval`
--
ALTER TABLE `time_interval`
  ADD CONSTRAINT `time_interval_ibfk_1` FOREIGN KEY (`time_type_id`) REFERENCES `time_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
