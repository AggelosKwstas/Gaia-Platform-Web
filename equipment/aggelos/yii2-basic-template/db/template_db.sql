-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 03:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template_db`
--

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
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `translation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`, `active`, `translation`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93, 0, 'Afghan'),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355, 1, 'Albanian'),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213, 0, 'Algerian'),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684, 0, 'American Samoan'),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376, 0, '  Andorran'),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244, 0, 'Angolan'),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264, 0, '  Anguillan'),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0, 0, 'Antarctic'),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268, 0, 'Antiguan '),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54, 0, 'Argentine'),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374, 0, 'Armenian'),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297, 0, 'Aruban'),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61, 0, 'Australian'),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43, 0, 'Austrian'),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994, 0, ' Azeri'),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242, 0, 'Bahamian'),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973, 0, 'Bahraini'),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880, 0, 'Bangladeshi'),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246, 0, 'Barbadian'),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375, 0, 'Belarusian'),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32, 0, 'Belgian'),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501, 0, 'Belizean'),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229, 0, 'Beninese'),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441, 0, 'Bermudian'),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975, 0, 'Bhutanese'),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591, 0, 'Bolivian'),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387, 0, 'Bosnian'),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267, 0, 'Botswanan'),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0, 0, 'Bouvet Island'),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55, 0, 'Brazilian'),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246, 0, 'BIOT'),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673, 0, 'Bruneian'),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359, 1, 'Bulgarian'),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226, 0, 'Bulgarian'),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257, 0, 'Burundian'),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855, 0, 'Cambodian'),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237, 0, 'Cameroonian'),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1, 0, 'Canadian'),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238, 0, NULL),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345, 0, 'Caymanian'),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236, 0, '  Central African'),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235, 0, 'Chadian'),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56, 0, 'Chilean'),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86, 0, 'Chinese'),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61, 0, '  Christmas Island'),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672, 0, 'Cocos Island'),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57, 0, '  Colombian'),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269, 0, 'Comorian'),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242, 0, 'Congolese'),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242, 0, 'Congolese'),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682, 0, 'Cook Island'),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506, 0, ' Costa Rican'),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225, 0, 'Ivorian'),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385, 1, 'Croatian'),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53, 0, 'Cuban'),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357, 0, 'Cypriot'),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420, 1, 'Czech'),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45, 1, 'Danish'),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253, 0, 'Djiboutian'),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767, 0, 'Dominican'),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809, 0, 'Dominican'),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593, 0, 'Ecuadorian'),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20, 0, 'Egyptian'),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503, 0, 'Salvadoran'),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240, 0, 'Equatoguinean'),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291, 0, 'Eritrean'),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372, 0, 'Estonian'),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251, 0, 'Ethiopian'),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, 0, 'Falkland Island'),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298, 0, 'Faroese'),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679, 0, '  Fijian'),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358, 1, 'Finnish'),
(73, 'FR', 'French', 'French', 'FRA', 250, 33, 1, 'French'),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594, 0, 'French Guianese'),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689, 0, 'French Polynesian'),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0, 0, 'French Southern Territories'),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241, 0, ' Gabonese'),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220, 0, ' Gambian'),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995, 0, 'Georgian'),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49, 1, 'Germany'),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233, 0, '  Ghanaian'),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350, 0, 'Gibraltar'),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30, 1, 'Greek'),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299, 0, 'Greenlandic'),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473, 0, '  Grenadian'),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590, 0, 'Guadeloupe'),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671, 0, 'Guamanian'),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502, 0, 'Guatemalan'),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224, 0, '  Guinean'),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245, 0, 'Bissau-Guinean'),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592, 0, 'Guyanese'),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509, 0, 'Haitian'),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0, 0, 'Heard Island '),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39, 0, '  Vatican'),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504, 0, 'Honduran'),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852, 0, ' Hong Kongese'),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36, 1, 'Hungarian;Magyar'),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354, 0, 'Icelandic'),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91, 1, '  Indian'),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62, 0, 'Indonesian'),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98, 1, 'Persian'),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964, 0, 'Iraqi'),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353, 0, 'Irish'),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972, 1, 'Israeli'),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39, 1, 'Italian'),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876, 0, '  Jamaican'),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81, 1, 'Japanese'),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962, 0, '  Jordanian'),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7, 0, 'Kazakhstani'),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254, 0, '  Kenyan'),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686, 0, 'I-Kiribati'),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850, 0, NULL),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82, 1, NULL),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965, 0, 'Kuwaitse'),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996, 0, 'Kuwaiti'),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856, 0, 'Laotian'),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371, 0, 'Latvian'),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961, 1, 'Lebanese'),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266, 0, 'Basotho'),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231, 0, 'Liberian'),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, 0, 'Libyan'),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423, 0, 'Liechtensteiner'),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370, 0, '  Lithuanian'),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352, 0, 'Luxembourgish'),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853, 0, 'Chinese'),
(126, 'MK', 'FYROM MACEDONIA', 'FYROM Macedonian', 'MKD', 807, 389, 1, ' FYROM Macedonian'),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261, 0, 'Malagasy'),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265, 0, 'Malawian'),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60, 0, 'Malaysian'),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960, 0, '  Maldivian'),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223, 0, 'Malinese'),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356, 0, 'Maltese'),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692, 0, 'Marshallese'),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596, 0, 'Martinican'),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222, 0, 'Mauritanian'),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230, 0, 'Mauritian'),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269, 0, 'Mahoran'),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52, 0, '  Mexican'),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691, 0, 'Micronesian'),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373, 0, 'Moldovan'),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377, 0, ' Monacan'),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976, 0, 'Mongolian'),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664, 0, 'Montserratian'),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212, 0, 'Moroccan'),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258, 0, 'Mozambican'),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95, 0, 'Burmese'),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264, 0, 'Namibian'),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674, 0, 'Nauruan'),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977, 0, 'Nepalese'),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31, 1, 'Dutch'),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599, 0, NULL),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687, 0, 'New Caledonian'),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64, 0, 'New Zealand;NZ'),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505, 0, 'Nicaraguan'),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227, 0, ' Nigerien'),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234, 0, 'Nigerian'),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683, 0, 'Niuean'),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672, 0, 'Norfolk Island'),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670, 0, 'Northern Marianan'),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47, 1, 'Norwegian'),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968, 0, 'Omani'),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92, 0, 'Pakistani'),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680, 0, 'Palauan'),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970, 0, 'Palestinian'),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507, 0, 'Panamanian'),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675, 0, ' Papuan'),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595, 0, 'Paraguayan'),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51, 0, 'Peruvian'),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63, 0, 'hilippine'),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0, 0, 'Pitcairn Island'),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48, 1, 'Polish'),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351, 1, '  Portuguese'),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787, 0, 'Puerto Rican'),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974, 0, '  Qatari'),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262, 0, 'Réunionese, Réunionnais'),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40, 1, 'Romanian'),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70, 1, 'Russian'),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250, 0, 'Rwandan'),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290, 0, 'Saint Helenian'),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869, 0, 'Kittitian'),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758, 0, 'Saint Lucian'),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508, 0, ' Miquelonnais'),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, 0, 'Vincentian'),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684, 0, 'Samoan'),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378, 0, 'Sammarinese'),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239, 0, ' São Toméan'),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966, 0, 'Saudi Arabian'),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221, 0, 'Senegalese'),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381, 0, 'Serbian'),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248, 0, 'Seychellois'),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232, 0, 'Sierra Leonean'),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65, 1, 'Singapore;Singaporean'),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421, 0, '  Slovak'),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386, 0, ' Slovenian'),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677, 0, 'Solomon Island'),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252, 0, '  Somali'),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27, 0, '  South African'),
(198, 'GS', 'SOUTH GEORGIA AND SOUTH SANDWICH', 'South Georgia and South Sandwich', NULL, NULL, 0, 0, '  South Georgia'),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34, 1, 'Spanish'),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94, 0, '  Sri Lankan'),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249, 0, '  Sudanese'),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597, 0, '  Surinamese'),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47, 0, '  Svalbard'),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268, 0, 'Swazi'),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46, 1, 'Swedish'),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41, 1, '  Swiss'),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963, 0, 'Syrian'),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886, 0, 'Taiwanese'),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992, 0, 'Tajikistani'),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255, 0, 'Tanzanian'),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66, 1, '  Thai'),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670, 0, '  Timorese'),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228, 0, '  Togolese'),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690, 0, '  Tokelauan'),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676, 0, '  Tongan'),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868, 0, '  Trinidadian;Tobagonian'),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216, 0, '  Tunisian'),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90, 1, ' Turkish'),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370, 0, '  Turkmen'),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649, 0, '  Turks and Caicos Island'),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688, 0, '  Tuvaluan'),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256, 0, '  Ugandan'),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380, 1, '  Ukrainian'),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971, 1, 'Emirian'),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44, 0, 'British'),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1, 0, 'American'),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1, 0, NULL),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598, 0, 'Uruguayan'),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998, 0, 'Uzbek'),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678, 0, 'Vanuatuan'),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58, 0, 'Venezuelan'),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84, 0, 'Vietnamese'),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284, 0, 'British Virgin Island'),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340, 0, 'U.S. Virgin Island'),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681, 0, ' Futunan'),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212, 0, 'Sahraouian'),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967, 0, 'Yemeni'),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260, 0, '  Zambian'),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263, 0, '  Zimbabwean'),
(241, 'EN', 'ENGLAND', 'England', NULL, NULL, 44, 1, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(127) NOT NULL,
  `pretty_name` varchar(127) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `pretty_name`, `date_created`, `date_updated`) VALUES
(1, 'male', 'ΑΡΕΝ', '2020-03-24 15:05:32', '2020-10-23 14:17:35'),
(2, 'female', 'ΘΗΛΥ', '2020-03-24 15:05:32', '2020-10-23 14:17:52'),
(3, 'unknown', 'ΑΓΝΩΣΤΟ', '2020-03-24 15:05:32', '2020-10-23 14:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `path` varchar(512) NOT NULL,
  `size` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `thumbnail_path` varchar(512) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `path`, `size`, `width`, `height`, `thumbnail_path`, `visible`, `date_created`, `date_updated`) VALUES
(31, 'Hermes.png', 'upload/image/2/16038267561934001953.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038267561080809399.png', 1, '2020-10-27 21:25:56', NULL),
(32, 'Hermes.png', 'upload/image/2/16038267641706189222.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038267641852210751.png', 1, '2020-10-27 21:26:04', NULL),
(33, 'hera.png', 'upload/image/2/1603826772440550418.png', 54937, 512, 512, 'upload/image/2/thumbnail/1603826772998719638.png', 1, '2020-10-27 21:26:12', NULL),
(34, 'Male_Doctor-512.png', 'upload/image/2/16038268371835430232.png', 30555, 512, 512, 'upload/image/2/thumbnail/16038268371579619826.png', 1, '2020-10-27 21:27:17', NULL),
(35, 'Hermes.png', 'upload/image/2/160382708545480597.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038270851768538859.png', 1, '2020-10-27 21:31:25', NULL),
(36, 'Hermes.png', 'upload/image/2/1603827098322679088.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038270982022216687.png', 1, '2020-10-27 21:31:38', NULL),
(37, 'Hermes.png', 'upload/image/2/1603827113751493013.png', 62579, 512, 512, 'upload/image/2/thumbnail/1603827113151348866.png', 1, '2020-10-27 21:31:53', NULL),
(38, 'Male_Doctor-512.png', 'upload/image/2/1603827183913849602.png', 30555, 512, 512, 'upload/image/2/thumbnail/1603827183271511270.png', 1, '2020-10-27 21:33:03', NULL),
(39, 'Male_Doctor-512.png', 'upload/image/2/16038271931980411240.png', 30555, 512, 512, 'upload/image/2/thumbnail/16038271931571433725.png', 1, '2020-10-27 21:33:13', NULL),
(40, 'Male_Doctor-512.png', 'upload/image/2/16038273342123251215.png', 30555, 512, 512, 'upload/image/2/thumbnail/1603827334411407376.png', 1, '2020-10-27 21:35:34', NULL),
(41, 'Male_Doctor-512.png', 'upload/image/2/160382739295315938.png', 30555, 512, 512, 'upload/image/2/thumbnail/16038273921193409155.png', 1, '2020-10-27 21:36:32', NULL),
(42, 'zeus.png', 'upload/image/2/16038299481986410852.png', 40019, 682, 682, 'upload/image/2/thumbnail/16038299481024102340.png', 1, '2020-10-27 22:19:08', NULL),
(43, 'zeus.png', 'upload/image/2/1603829973122307000.png', 40019, 682, 682, 'upload/image/2/thumbnail/1603829973125416820.png', 1, '2020-10-27 22:19:33', NULL),
(44, 'Hermes.png', 'upload/image/2/16038300091764973202.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038300091647415404.png', 1, '2020-10-27 22:20:09', NULL),
(45, 'Hermes.png', 'upload/image/2/16038300581385845569.png', 62579, 512, 512, 'upload/image/2/thumbnail/1603830058252514105.png', 1, '2020-10-27 22:20:58', NULL),
(46, 'Hermes.png', 'upload/image/2/1603830092800610893.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038300921445264875.png', 1, '2020-10-27 22:21:32', NULL),
(47, 'Male_Doctor-512.png', 'upload/image/2/1603893537853312373.png', 30555, 512, 512, 'upload/image/2/thumbnail/16038935371170318150.png', 1, '2020-10-27 22:21:55', NULL),
(48, 'Hermes.png', 'upload/image/2/1603830130645272198.png', 62579, 512, 512, 'upload/image/2/thumbnail/16038301301315018108.png', 1, '2020-10-27 22:22:10', NULL),
(49, 'Ares.png', 'upload/image/2/160383103415409206.png', 59193, 512, 512, 'upload/image/2/thumbnail/1603831034645514098.png', 1, '2020-10-27 22:37:14', NULL),
(50, '16111308761351231694.png', 'upload/image/2/1611270732308521835.png', 33274, 399, 142, 'upload/image/2/thumbnail/16112707321967985449.png', 1, '2021-01-22 01:12:12', NULL),
(51, 'logompuioa.png', 'upload/image/9/16124399481827166457.png', 33274, 399, 142, 'upload/image/9/thumbnail/16124399481340054910.png', 1, '2021-02-04 13:59:08', NULL),
(52, 'logompuioa.png', 'upload/image/9/1612440146597467724.png', 33274, 399, 142, 'upload/image/9/thumbnail/16124401461954933732.png', 1, '2021-02-04 14:02:26', NULL),
(53, 'logompuioa.png', 'upload/image/9/16124403101981561078.png', 33274, 399, 142, 'upload/image/9/thumbnail/16124403101669545724.png', 1, '2021-02-04 14:05:10', NULL),
(54, 'logompuioa.png', 'upload/image/9/1612440594923114519.png', 33274, 399, 142, 'upload/image/9/thumbnail/1612440594650941631.png', 1, '2021-02-04 14:09:54', NULL),
(55, 'logompuioa.png', 'upload/image/9/1612440764818845215.png', 33274, 399, 142, 'upload/image/9/thumbnail/16124407641061409926.png', 1, '2021-02-04 14:12:44', NULL),
(56, 'Screenshot 2023-03-30 103749.png', 'upload/image/8/1681212741367462375.png', 312105, 2006, 761, 'upload/image/8/thumbnail/1681212741613973514.png', 1, '2023-04-11 14:32:21', NULL),
(57, 'Screenshot 2023-03-27 143720.png', 'upload/image/8/1681213286629052765.png', 582585, 841, 562, 'upload/image/8/thumbnail/1681213286268609697.png', 1, '2023-04-11 14:41:26', NULL),
(58, 'Screenshot 2023-03-27 143720.png', 'upload/image/8/16812133472036166335.png', 582585, 841, 562, 'upload/image/8/thumbnail/16812133471326785807.png', 1, '2023-04-11 14:42:27', NULL),
(59, 'Screenshot 2023-04-04 161628.png', 'upload/image/8/16812136411047711911.png', 369579, 728, 380, 'upload/image/8/thumbnail/16812136411092496846.png', 1, '2023-04-11 14:47:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `image_id` int(11) NOT NULL,
  `assigned_to` varchar(64) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(127) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_born` date NOT NULL,
  `country_id` int(11) NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `user_type_id`, `gender_id`, `image_id`, `phone`, `city`, `address`, `token`, `date_born`, `country_id`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `verification_token`, `date_updated`, `date_created`) VALUES
(2, 'admin', 'Odysseas', 'Tsakai', 10, 1, 49, '2147483647', 'Ioannina', 'Agias sofias 39, Anatoli', 'ydyrs5bRTlyAAbv4eDt1L4Orf5Bj_gPU', '1990-01-01', 83, '5mvxELr17-y-r0y6FDtzgqGe4SXz-hyx', '$2y$13$Lq1IJEb8U9Ndj2d/Nssz3ejIpl5x8Yn1Pn84/Vw2tALr1kMhUlelK', NULL, 'odysseas9494@gmail.com', 10, NULL, '2020-05-18 14:35:51', '2020-03-24 13:12:54'),
(8, 'doctor', 'ΓΙΑΤΡΟΣ', 'ΓΙΑΤΡΟΣ', 2, 1, 47, '6985953397', 'ΙΟΑΝΝΙΝΑ', '', 'XBuUg72NpNg7XE9gvVg1git_kRASP8zP', '1990-01-01', 83, 'OwOY4Qu_c6NkoUOJ2UUaUXj2TPP8lrrf', '$2y$13$m4bLKpXhwwlxSWiCtYIbA.UYdlpu5MWCHH4SCvLYXvV90Ro/QLGaC', NULL, 'doctor@gmail.com', 10, NULL, NULL, '2020-10-27 20:21:55'),
(34, 'tsv', 'Αναστάσιος', 'Βήττας', 10, 1, 59, '6941653439', '', '', '6VFfqA1gOkAD96RHrlMrUpt5pwtzNBw6', '1990-01-01', 0, 'QVn4UZvmBXisAeY2l_dAKI5qqr0xZNfd', '$2y$13$RFJXU5QFZIF4uTgoGJQlPuss8UTCMB6.6NWlyNIr54/8NGXbtDbV6', '6VFfqA1gOkAD96RHrlMrUpt5pwtzNBw6', 'tasosbhttas@yahoo.gr', 10, NULL, NULL, '2023-04-11 11:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `pretty_name` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `pretty_name`, `date_created`, `date_updated`) VALUES
(1, 'simple_user', 'Simple User', '2020-03-24 15:03:37', '0000-00-00 00:00:00'),
(2, 'manager', 'Doctor', '2020-03-24 15:04:03', '2020-12-27 08:18:57'),
(10, 'admin', 'Admin', '2020-03-24 15:04:03', '2020-03-24 15:04:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `user_user_type_id_fk` (`user_type_id`),
  ADD KEY `user_ibfk_1` (`country_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `pretty_name` (`pretty_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_user_type_id_fk` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
