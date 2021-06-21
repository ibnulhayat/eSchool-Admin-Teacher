-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 07:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadamic_informations`
--

CREATE TABLE `acadamic_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acadamic_informations`
--

INSERT INTO `acadamic_informations` (`id`, `user_id`, `class_id`, `teacher_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(1, 10, 1, 0, 1, '2021-06-19 12:01:29', 0, '2021-06-19 12:01:29', 'active'),
(2, 15, 4, 0, 1, '2021-06-19 12:12:30', 0, '2021-06-19 12:12:30', 'active'),
(3, 18, 1, 0, 1, '2021-06-19 16:07:09', 0, '2021-06-19 16:07:09', 'active'),
(4, 19, 1, 0, 1, '2021-06-19 16:12:11', 0, '2021-06-19 16:12:11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `paressent_village` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paressent_post_office` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paressent_district_id` int(11) NOT NULL,
  `paressent_thana_id` int(11) NOT NULL,
  `parmanent_village` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parmanent_post_office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parmanent_district_id` int(11) NOT NULL,
  `parmanent_thana_id` int(11) NOT NULL,
  `same_address` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `paressent_village`, `paressent_post_office`, `paressent_district_id`, `paressent_thana_id`, `parmanent_village`, `parmanent_post_office`, `parmanent_district_id`, `parmanent_thana_id`, `same_address`, `user_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(8, 'Nikunja-2', 'Khilkhet-1229', 47, 495, 'Satpai', 'Netrokona-2400', 64, 491, 'No', 10, 1, '2021-06-19 07:06:47', 0, '2021-06-19 07:06:47', 'active'),
(12, 'Khilkhet', 'Khilkhet-1229', 47, 495, 'Satpai', 'Netrokona-2400', 64, 491, 'No', 14, 1, '2021-06-19 08:22:31', 0, '2021-06-19 08:22:31', 'active'),
(13, 'Badda', '', 47, 366, 'Khilkhet', '', 33, 249, 'No', 15, 1, '2021-06-19 08:32:06', 0, '2021-06-19 08:32:06', 'active'),
(16, 'Address', '', 28, 216, 'Address', '', 11, 98, 'No', 18, 1, '2021-06-19 16:07:09', 0, '2021-06-19 16:07:09', 'active'),
(17, 'Address', '', 35, 266, 'Address', '', 35, 266, 'Yes', 19, 1, '2021-06-19 16:12:11', 0, '2021-06-19 16:12:11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `availability` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `class_id`, `availability`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(1, 10, 1, 'Present', 1, '2021-06-19 15:51:29', 0, '2021-06-19 15:51:29', 'active'),
(2, 10, 1, 'Absent', 1, '2021-06-19 16:42:56', 0, '2021-06-19 16:42:56', 'active'),
(3, 10, 1, 'Present', 1, '2021-06-19 16:43:02', 0, '2021-06-19 16:43:02', 'active'),
(4, 10, 1, 'Present', 1, '2021-06-19 16:43:15', 0, '2021-06-19 16:43:15', 'active'),
(5, 10, 1, 'Absent', 1, '2021-06-19 16:45:20', 0, '2021-06-19 16:45:20', 'active'),
(6, 10, 1, 'Absent', 1, '2021-06-19 16:45:25', 0, '2021-06-19 16:45:25', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `bn_name` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `bn_name`) VALUES
(1, 'Dhaka', 'ঢাকা'),
(2, 'Comilla', 'কুমিল্লা'),
(3, 'Rajshahi', 'রাজশাহী'),
(4, 'Jessore', 'যশোর'),
(5, 'Chittagong', 'চট্টগ্রাম'),
(6, 'Barisal', 'বরিশাল'),
(7, 'Sylhet', 'সিলেট'),
(8, 'Dinajpur', 'দিনাজপুর'),
(9, 'Madrasah', 'মাদ্রাসা'),
(10, 'Technical', 'কারিগরি'),
(11, 'Cambridge International - IGCE', NULL),
(12, 'Edexcel International', NULL),
(13, 'Others', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `number`, `teacher_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(1, 'Six', 6, 1, 1, '2021-06-18 16:35:14', 0, '2021-06-18 16:35:14', 'active'),
(2, 'Seven', 7, 1, 1, '2021-06-19 08:27:53', 0, '2021-06-19 08:27:53', 'active'),
(3, 'Eight', 8, 1, 1, '2021-06-19 08:28:01', 0, '2021-06-19 08:28:01', 'active'),
(4, 'Nine', 9, 1, 1, '2021-06-19 08:28:09', 0, '2021-06-19 08:28:09', 'active'),
(5, 'Ten', 10, 1, 1, '2021-06-19 08:28:22', 0, '2021-06-19 08:28:22', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `division_id` int(1) DEFAULT NULL,
  `name` varchar(75) DEFAULT NULL,
  `bn_name` varchar(75) DEFAULT NULL,
  `short_name` varchar(30) DEFAULT NULL,
  `lat` varchar(45) DEFAULT NULL,
  `lon` varchar(45) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `short_name`, `lat`, `lon`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(1, 1, 'Comilla', 'কুমিল্লা', 'COM', '23.4682747', '91.1788135', 'www.comilla.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(2, 1, 'Feni', 'ফেনী', 'FEN', '23.023231', '91.3840844', 'www.feni.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(3, 1, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 'BBA', '23.9570904', '91.1119286', 'www.brahmanbaria.gov.bd', '2020-12-14 05:34:35', 0, '2020-12-21 09:25:52', 0, 'active'),
(4, 1, 'Rangamati', 'রাঙ্গামাটি', 'RGM', NULL, '', 'www.rangamati.gov.bd', '2020-12-14 05:34:35', 0, '2021-06-05 10:13:25', 0, 'active'),
(5, 1, 'Noakhali', 'নোয়াখালী', 'NOA', '22.869563', '91.099398', 'www.noakhali.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(6, 1, 'Chandpur', 'চাঁদপুর', 'CHA', '23.2332585', '90.6712912', 'www.chandpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(7, 1, 'Lakshmipur', 'লক্ষ্মীপুর', 'LAK', '22.942477', '90.841184', 'www.lakshmipur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(8, 1, 'Chattogram', 'চট্টগ্রাম', 'CTG', '22.335109', '91.834073', 'www.chittagong.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(9, 1, 'Coxsbazar', 'কক্সবাজার', 'COX', NULL, NULL, 'www.coxsbazar.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(10, 1, 'Khagrachhari', 'খাগড়াছড়ি', 'KHA', '23.119285', '91.984663', 'www.khagrachhari.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(11, 1, 'Bandarban', 'বান্দরবান', 'BAN', '22.1953275', '92.2183773', 'www.bandarban.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(12, 2, 'Sirajganj', 'সিরাজগঞ্জ', 'SIR', '24.4533978', '89.7006815', 'www.sirajganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(13, 2, 'Pabna', 'পাবনা', 'PAB', '23.998524', '89.233645', 'www.pabna.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(14, 2, 'Bogura', 'বগুড়া', 'BOG', '24.8465228', '89.377755', 'www.bogra.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(15, 2, 'Rajshahi', 'রাজশাহী', 'RJS', NULL, NULL, 'www.rajshahi.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(16, 2, 'Natore', 'নাটোর', 'NAT', '24.420556', '89.000282', 'www.natore.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(17, 2, 'Joypurhat', 'জয়পুরহাট', 'JAI', NULL, NULL, 'www.joypurhat.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(18, 2, 'Chapainawabganj', 'চাঁপাইনবাবগঞ্জ', 'NAW', '24.5965034', '88.2775122', 'www.chapainawabganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(19, 2, 'Naogaon', 'নওগাঁ', 'NAO', NULL, NULL, 'www.naogaon.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(20, 3, 'Jesshore', 'যশোর', 'JES', '23.16643', '89.2081126', 'www.jessore.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(21, 3, 'Satkhira', 'সাতক্ষীরা', 'SAT', NULL, NULL, 'www.satkhira.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(22, 3, 'Meherpur', 'মেহেরপুর', 'MEH', '23.762213', '88.631821', 'www.meherpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(23, 3, 'Narail', 'নড়াইল', 'NRA', '23.172534', '89.512672', 'www.narail.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(24, 3, 'Chuadanga', 'চুয়াডাঙ্গা', 'CHU', '23.6401961', '88.841841', 'www.chuadanga.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(25, 3, 'Kushtia', 'কুষ্টিয়া', 'KUS', '23.901258', '89.120482', 'www.kushtia.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(26, 3, 'Magura', 'মাগুরা', 'MAG', '23.487337', '89.419956', 'www.magura.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(27, 3, 'Khulna', 'খুলনা', 'KHU', '22.815774', '89.568679', 'www.khulna.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(28, 3, 'Bagerhat', 'বাগেরহাট', 'BAG', '22.651568', '89.785938', 'www.bagerhat.gov.bd', '2020-12-14 05:34:35', 0, '2020-12-14 12:43:12', 0, 'active'),
(29, 3, 'Jhenaidah', 'ঝিনাইদহ', 'JHE', '23.5448176', '89.1539213', 'www.jhenaidah.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(30, 4, 'Jhalakathi', 'ঝালকাঠি', 'JHA', NULL, NULL, 'www.jhalakathi.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(31, 4, 'Patuakhali', 'পটুয়াখালী', 'PAT', '22.3596316', '90.3298712', 'www.patuakhali.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(32, 4, 'Pirojpur', 'পিরোজপুর', 'PIR', NULL, NULL, 'www.pirojpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(33, 4, 'Barisal', 'বরিশাল', 'BRS', NULL, NULL, 'www.barisal.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(34, 4, 'Bhola', 'ভোলা', 'BHO', '22.685923', '90.648179', 'www.bhola.gov.bd', '2020-12-14 05:34:35', 1, '2020-12-14 09:58:18', 1, 'active'),
(35, 4, 'Barguna', 'বরগুনা', 'BRG', NULL, NULL, 'www.barguna.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(36, 5, 'Sylhet', 'সিলেট', 'SYL', '24.8897956', '91.8697894', 'www.sylhet.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(37, 5, 'Moulvibazar', 'মৌলভীবাজার', 'MAU', '24.482934', '91.777417', 'www.moulvibazar.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(38, 5, 'Habiganj', 'হবিগঞ্জ', 'HAB', '24.374945', '91.41553', 'www.habiganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(39, 5, 'Sunamganj', 'সুনামগঞ্জ', 'SUN', '25.0658042', '91.3950115', 'www.sunamganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(40, 6, 'Narsingdi', 'নরসিংদী', 'NSD', '23.932233', '90.71541', 'www.narsingdi.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(41, 6, 'Gazipur', 'গাজীপুর', 'GAZ', '24.0022858', '90.4264283', 'www.gazipur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(42, 6, 'Shariatpur', 'শরীয়তপুর', 'SHA', NULL, NULL, 'www.shariatpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(43, 6, 'Narayanganj', 'নারায়ণগঞ্জ', 'NYG', '23.63366', '90.496482', 'www.narayanganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(44, 6, 'Tangail', 'টাঙ্গাইল', 'TAN', NULL, NULL, 'www.tangail.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(45, 6, 'Kishoreganj', 'কিশোরগঞ্জ', 'KIS', '24.444937', '90.776575', 'www.kishoreganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(46, 6, 'Manikganj', 'মানিকগঞ্জ', 'MAN', NULL, NULL, 'www.manikganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(47, 6, 'Dhaka', 'ঢাকা', 'DHA', '23.7115253', '90.4111451', 'www.dhaka.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(48, 6, 'Munshiganj', 'মুন্সিগঞ্জ', 'MUN', NULL, NULL, 'www.munshiganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(49, 6, 'Rajbari', 'রাজবাড়ী', 'RJB', '23.7574305', '89.6444665', 'www.rajbari.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(50, 6, 'Madaripur', 'মাদারীপুর', 'MAD', '23.164102', '90.1896805', 'www.madaripur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(51, 6, 'Gopalganj', 'গোপালগঞ্জ', 'GOP', '23.0050857', '89.8266059', 'www.gopalganj.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(52, 6, 'Faridpur', 'ফরিদপুর', 'FAR', '23.6070822', '89.8429406', 'www.faridpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(53, 7, 'Panchagarh', 'পঞ্চগড়', 'PAN', '26.3411', '88.5541606', 'www.panchagarh.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(54, 7, 'Dinajpur', 'দিনাজপুর', 'DIN', '25.6217061', '88.6354504', 'www.dinajpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(55, 7, 'Lalmonirhat', 'লালমনিরহাট', 'LAL', NULL, NULL, 'www.lalmonirhat.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(56, 7, 'Nilphamari', 'নীলফামারী', 'NIL', '25.931794', '88.856006', 'www.nilphamari.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(57, 7, 'Gaibandha', 'গাইবান্ধা', 'GAI', '25.328751', '89.528088', 'www.gaibandha.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(58, 7, 'Thakurgaon', 'ঠাকুরগাঁও', 'THA', '26.0336945', '88.4616834', 'www.thakurgaon.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(59, 7, 'Rangpur', 'রংপুর', 'RGP', '25.7558096', '89.244462', 'www.rangpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(60, 7, 'Kurigram', 'কুড়িগ্রাম', 'KUR', '25.805445', '89.636174', 'www.kurigram.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(61, 8, 'Sherpur', 'শেরপুর', 'SHE', '25.0204933', '90.0152966', 'www.sherpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(62, 8, 'Mymensingh', 'ময়মনসিংহ', 'MYM', NULL, NULL, 'www.mymensingh.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(63, 8, 'Jamalpur', 'জামালপুর', 'JAM', '24.937533', '89.937775', 'www.jamalpur.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(64, 8, 'Netrokona', 'নেত্রকোণা', 'NET', '24.870955', '90.727887', 'www.netrokona.gov.bd', '2020-12-14 05:34:35', 0, '0000-00-00 00:00:00', 0, 'active'),
(65, 1, 'Bhola sadar', NULL, NULL, NULL, NULL, NULL, '2020-12-28 05:10:54', 1, '2020-12-28 05:13:49', 0, 'deactive'),
(66, 1, 'Bhola sadar', NULL, NULL, NULL, NULL, NULL, '2021-01-02 07:45:55', 1, '2021-01-02 07:46:32', 0, 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(75) DEFAULT NULL,
  `bn_name` varchar(75) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`) VALUES
(1, 'Chittagong', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `education_informations`
--

CREATE TABLE `education_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `institute_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `thana_id` int(11) DEFAULT NULL,
  `subject_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corse_duration` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result` double(5,2) NOT NULL,
  `passing_year` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_informations`
--

INSERT INTO `education_informations` (`id`, `institute_name`, `exam_type`, `group`, `board`, `division_id`, `district_id`, `thana_id`, `subject_name`, `corse_duration`, `result`, `passing_year`, `user_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(9, 'Anjuman High School', 'PSC', NULL, NULL, 6, 64, 491, NULL, NULL, 4.50, '2002', 10, 1, '2021-06-19 07:06:47', 0, '2021-06-19 07:39:41', 'active'),
(19, 'Anjuman High School', 'S.S.C', 'Science', 1, NULL, NULL, NULL, NULL, NULL, 5.00, '1998', 14, 1, '2021-06-19 08:22:31', 0, '2021-06-19 08:22:31', 'active'),
(20, 'Netrokona Govt. College', 'H.S.C', 'Science', 1, NULL, NULL, NULL, NULL, NULL, 4.75, '2000', 14, 1, '2021-06-19 08:22:31', 0, '2021-06-19 08:22:31', 'active'),
(21, 'Southeast University', 'BSE', NULL, NULL, NULL, NULL, NULL, 'CSE', '4 Years', 3.75, '2004', 14, 1, '2021-06-19 08:22:31', 0, '2021-06-19 08:22:53', 'active'),
(22, 'Biruttom primaray School', 'PSC', NULL, NULL, 6, 6, 6, NULL, NULL, 3.50, '2000', 15, 1, '2021-06-19 08:32:06', 0, '2021-06-19 08:32:06', 'active'),
(23, 'Uttara High School', 'JSC', NULL, 1, NULL, NULL, NULL, NULL, NULL, 4.00, '2003', 15, 1, '2021-06-19 08:32:06', 0, '2021-06-19 08:32:06', 'active'),
(24, 'Datta High School', 'PSC', NULL, NULL, 1, 1, 1, NULL, NULL, 5.00, '2000', 18, 1, '2021-06-19 16:07:09', 0, '2021-06-19 16:07:09', 'active'),
(25, 'Datta High School', 'PSC', NULL, NULL, 2, 2, 2, NULL, NULL, 4.50, '2005', 19, 1, '2021-06-19 16:12:11', 0, '2021-06-19 16:12:11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` decimal(7,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`id`, `user_id`, `class_id`, `subject_id`, `year`, `mark`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(1, 1, 1, 1, '2000', '9.99', 0, '2021-06-19 06:50:59', 0, '2021-06-19 06:50:59', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `guardian_informations`
--

CREATE TABLE `guardian_informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_occupation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_occupation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guardian_informations`
--

INSERT INTO `guardian_informations` (`id`, `father_name`, `father_occupation`, `father_phone`, `mother_name`, `mother_occupation`, `mother_phone`, `user_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(8, 'Abdul kamal', '', '', 'Mumena katun', '', '', 10, 1, '2021-06-19 07:06:47', 0, '2021-06-19 07:06:47', 'active'),
(12, 'Abdul Motin', 'Banker', '', 'Moriom katun', 'Banker', '', 14, 1, '2021-06-19 08:22:31', 0, '2021-06-19 08:22:31', 'active'),
(13, 'Abul Muiz', 'Fisherman', '', 'Mumena katun', 'N/A', '', 15, 1, '2021-06-19 08:32:06', 0, '2021-06-19 08:32:06', 'active'),
(16, 'abdul kamal', 'Teacher', '', 'Moriom katun', 'Agriculture', '', 18, 1, '2021-06-19 16:07:09', 0, '2021-06-19 16:07:09', 'active'),
(17, 'abdul kamal', 'Teacher', '', 'Mumena akter', 'N/A', '', 19, 1, '2021-06-19 16:12:11', 0, '2021-06-19 16:12:11', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(281, '2014_10_12_100000_create_password_resets_table', 1),
(282, '2021_04_18_154343_create_students_table', 1),
(283, '2021_04_18_154343_create_teachers_table', 1),
(288, '2021_06_05_163835_create_academic_informations_table', 1),
(289, '2021_06_05_163909_create_grading_table', 1),
(290, '2021_06_05_163933_create_attendances_table', 1),
(291, '2021_06_05_164025_create_classes_table', 1),
(292, '2021_06_05_164108_create_subjects_table', 1),
(293, '2021_05_03_145048_create_user_roles_table', 2),
(294, '2021_06_05_163122_create_addresses_table', 3),
(295, '2021_06_05_163747_create_education_informations_table', 3),
(297, '2021_06_19_003521_create_users_table', 4),
(298, '2021_06_05_143014_create_guardian_informations_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `userName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUrl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admitted_class` int(11) NOT NULL,
  `admitted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` enum('Male','Female','others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `marital_status` enum('Married','Unmarried') COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` enum('A+','A-','AB+','AB-','B+','B-','O+','O-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` enum('Muslims','Hindus','Buddhists','Christians','Others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `short_name`, `full_name`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(1, 'Ban 1st Paper', 'Bangla First Paper', 1, '2021-06-19 08:56:41', 0, '2021-06-19 08:56:41', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUrl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `marital_status` enum('Married','Unmarried') COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` enum('A+','A-','AB+','AB-','B+','B-','O+','O-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` enum('Islam','Hinduism','Buddhism','Christianity','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `password`, `role`, `name`, `email`, `phone`, `imageUrl`, `gender`, `birth_date`, `marital_status`, `blood_group`, `religion`, `nationality`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(1, '93279e3308bdbbeed946fc965017f67a', 'Admin', 'Mahabub Alom', 'mahabub@admin.com', '01518325132', '1.png', 'Male', '2019-02-14', 'Married', 'A+', 'Islam', 'Bangladeshi', 0, '2021-06-17 21:03:04', 0, '2021-06-17 21:03:04', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas_or_thanas`
--

CREATE TABLE `upazilas_or_thanas` (
  `id` int(11) NOT NULL,
  `district_id` int(2) DEFAULT NULL,
  `name` varchar(75) DEFAULT NULL,
  `bn_name` varchar(75) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `activation_status` enum('active','deactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upazilas_or_thanas`
--

INSERT INTO `upazilas_or_thanas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(1, 1, 'Debidwar', 'দেবিদ্বার', 'debidwar.comilla.gov.bd', '2020-12-14 07:50:55', 1, '2020-12-15 14:01:34', 1, 'active'),
(2, 1, 'Barura', 'বরুড়া', 'barura.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(3, 1, 'Brahmanpara', 'ব্রাহ্মণপাড়া', 'brahmanpara.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(4, 1, 'Chandina', 'চান্দিনা', 'chandina.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(5, 1, 'Chauddagram', 'চৌদ্দগ্রাম', 'chauddagram.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(6, 1, 'Daudkandi', 'দাউদকান্দি', 'daudkandi.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(7, 1, 'Homna', 'হোমনা', 'homna.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(8, 1, 'Laksam', 'লাকসাম', 'laksam.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(9, 1, 'Muradnagar', 'মুরাদনগর', 'muradnagar.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(10, 1, 'Nangalkot', 'নাঙ্গলকোট', 'nangalkot.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(11, 1, 'Comilla Sadar', 'কুমিল্লা সদর', 'comillasadar.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(12, 1, 'Meghna', 'মেঘনা', 'meghna.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(13, 1, 'Monohargonj', 'মনোহরগঞ্জ', 'monohargonj.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(14, 1, 'Sadarsouth', 'সদর দক্ষিণ', 'sadarsouth.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(15, 1, 'Titas', 'তিতাস', 'titas.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(16, 1, 'Burichang', 'বুড়িচং', 'burichang.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(17, 1, 'Lalmai', 'লালমাই', 'lalmai.comilla.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(18, 2, 'Chhagalnaiya', 'ছাগলনাইয়া', 'chhagalnaiya.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(19, 2, 'Feni Sadar', 'ফেনী সদর', 'sadar.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(20, 2, 'Sonagazi', 'সোনাগাজী', 'sonagazi.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(21, 2, 'Fulgazi', 'ফুলগাজী', 'fulgazi.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(22, 2, 'Parshuram', 'পরশুরাম', 'parshuram.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(23, 2, 'Daganbhuiyan', 'দাগনভূঞা', 'daganbhuiyan.feni.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(24, 3, 'Brahmanbaria Sadar', 'ব্রাহ্মণবাড়িয়া সদর', 'sadar.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(25, 3, 'Kasba', 'কসবা', 'kasba.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(26, 3, 'Nasirnagar', 'নাসিরনগর', 'nasirnagar.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(27, 3, 'Sarail', 'সরাইল', 'sarail.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(28, 3, 'Ashuganj', 'আশুগঞ্জ', 'ashuganj.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(29, 3, 'Akhaura', 'আখাউড়া', 'akhaura.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(30, 3, 'Nabinagar', 'নবীনগর', 'nabinagar.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(31, 3, 'Bancharampur', 'বাঞ্ছারামপুর', 'bancharampur.brahmanbaria.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(32, 3, 'Bijoynagar', 'বিজয়নগর', 'bijoynagar.brahmanbaria.gov.bd    ', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(33, 4, 'Rangamati Sadar', 'রাঙ্গামাটি সদর', 'sadar.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(34, 4, 'Kaptai', 'কাপ্তাই', 'kaptai.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(35, 4, 'Kawkhali', 'কাউখালী', 'kawkhali.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(36, 4, 'Baghaichari', 'বাঘাইছড়ি', 'baghaichari.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(37, 4, 'Barkal', 'বরকল', 'barkal.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(38, 4, 'Langadu', 'লংগদু', 'langadu.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(39, 4, 'Rajasthali', 'রাজস্থলী', 'rajasthali.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(40, 4, 'Belaichari', 'বিলাইছড়ি', 'belaichari.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(41, 4, 'Juraichari', 'জুরাছড়ি', 'juraichari.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(42, 4, 'Naniarchar', 'নানিয়ারচর', 'naniarchar.rangamati.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(43, 5, 'Noakhali Sadar', 'নোয়াখালী সদর', 'sadar.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(44, 5, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(45, 5, 'Begumganj', 'বেগমগঞ্জ', 'begumganj.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(46, 5, 'Hatia', 'হাতিয়া', 'hatia.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(47, 5, 'Subarnachar', 'সুবর্ণচর', 'subarnachar.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(48, 5, 'Kabirhat', 'কবিরহাট', 'kabirhat.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(49, 5, 'Senbug', 'সেনবাগ', 'senbug.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(50, 5, 'Chatkhil', 'চাটখিল', 'chatkhil.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(51, 5, 'Sonaimori', 'সোনাইমুড়ী', 'sonaimori.noakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(52, 6, 'Haimchar', 'হাইমচর', 'haimchar.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(53, 6, 'Kachua', 'কচুয়া', 'kachua.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(54, 6, 'Shahrasti', 'শাহরাস্তি	', 'shahrasti.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(55, 6, 'Chandpur Sadar', 'চাঁদপুর সদর', 'sadar.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(56, 6, 'Matlab South', 'মতলব দক্ষিণ', 'matlabsouth.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(57, 6, 'Hajiganj', 'হাজীগঞ্জ', 'hajiganj.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(58, 6, 'Matlab North', 'মতলব উত্তর', 'matlabnorth.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(59, 6, 'Faridgonj', 'ফরিদগঞ্জ', 'faridgonj.chandpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(60, 7, 'Lakshmipur Sadar', 'লক্ষ্মীপুর সদর', 'sadar.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(61, 7, 'Kamalnagar', 'কমলনগর', 'kamalnagar.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(62, 7, 'Raipur', 'রায়পুর', 'raipur.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(63, 7, 'Ramgati', 'রামগতি', 'ramgati.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(64, 7, 'Ramganj', 'রামগঞ্জ', 'ramganj.lakshmipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(65, 8, 'Rangunia', 'রাঙ্গুনিয়া', 'rangunia.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(66, 8, 'Sitakunda', 'সীতাকুন্ড', 'sitakunda.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(67, 8, 'Mirsharai', 'মীরসরাই', 'mirsharai.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(68, 8, 'Patiya', 'পটিয়া', 'patiya.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(69, 8, 'Sandwip', 'সন্দ্বীপ', 'sandwip.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(70, 8, 'Banshkhali', 'বাঁশখালী', 'banshkhali.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(71, 8, 'Boalkhali', 'বোয়ালখালী', 'boalkhali.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(72, 8, 'Anwara', 'আনোয়ারা', 'anwara.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(73, 8, 'Chandanaish', 'চন্দনাইশ', 'chandanaish.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(74, 8, 'Satkania', 'সাতকানিয়া', 'satkania.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(75, 8, 'Lohagara', 'লোহাগাড়া', 'lohagara.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(76, 8, 'Hathazari', 'হাটহাজারী', 'hathazari.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(77, 8, 'Fatikchhari', 'ফটিকছড়ি', 'fatikchhari.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(78, 8, 'Raozan', 'রাউজান', 'raozan.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(79, 8, 'Karnafuli', 'কর্ণফুলী', 'karnafuli.chittagong.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(80, 9, 'Coxsbazar Sadar', 'কক্সবাজার সদর', 'sadar.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(81, 9, 'Chakaria', 'চকরিয়া', 'chakaria.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(82, 9, 'Kutubdia', 'কুতুবদিয়া', 'kutubdia.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(83, 9, 'Ukhiya', 'উখিয়া', 'ukhiya.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(84, 9, 'Moheshkhali', 'মহেশখালী', 'moheshkhali.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(85, 9, 'Pekua', 'পেকুয়া', 'pekua.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(86, 9, 'Ramu', 'রামু', 'ramu.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(87, 9, 'Teknaf', 'টেকনাফ', 'teknaf.coxsbazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(88, 10, 'Khagrachhari Sadar', 'খাগড়াছড়ি সদর', 'sadar.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(89, 10, 'Dighinala', 'দিঘীনালা', 'dighinala.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(90, 10, 'Panchari', 'পানছড়ি', 'panchari.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(91, 10, 'Laxmichhari', 'লক্ষীছড়ি', 'laxmichhari.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(92, 10, 'Mohalchari', 'মহালছড়ি', 'mohalchari.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(93, 10, 'Manikchari', 'মানিকছড়ি', 'manikchari.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(94, 10, 'Ramgarh', 'রামগড়', 'ramgarh.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(95, 10, 'Matiranga', 'মাটিরাঙ্গা', 'matiranga.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(96, 10, 'Guimara', 'গুইমারা', 'guimara.khagrachhari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(97, 11, 'Bandarban Sadar', 'বান্দরবান সদর', 'sadar.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(98, 11, 'Alikadam', 'আলীকদম', 'alikadam.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(99, 11, 'Naikhongchhari', 'নাইক্ষ্যংছড়ি', 'naikhongchhari.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(100, 11, 'Rowangchhari', 'রোয়াংছড়ি', 'rowangchhari.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(101, 11, 'Lama', 'লামা', 'lama.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(102, 11, 'Ruma', 'রুমা', 'ruma.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(103, 11, 'Thanchi', 'থানচি', 'thanchi.bandarban.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(104, 12, 'Belkuchi', 'বেলকুচি', 'belkuchi.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(105, 12, 'Chauhali', 'চৌহালি', 'chauhali.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(106, 12, 'Kamarkhand', 'কামারখন্দ', 'kamarkhand.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(107, 12, 'Kazipur', 'কাজীপুর', 'kazipur.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(108, 12, 'Raigonj', 'রায়গঞ্জ', 'raigonj.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(109, 12, 'Shahjadpur', 'শাহজাদপুর', 'shahjadpur.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(110, 12, 'Sirajganj Sadar', 'সিরাজগঞ্জ সদর', 'sirajganjsadar.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(111, 12, 'Tarash', 'তাড়াশ', 'tarash.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(112, 12, 'Ullapara', 'উল্লাপাড়া', 'ullapara.sirajganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(113, 13, 'Sujanagar', 'সুজানগর', 'sujanagar.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(114, 13, 'Ishurdi', 'ঈশ্বরদী', 'ishurdi.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(115, 13, 'Bhangura', 'ভাঙ্গুড়া', 'bhangura.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(116, 13, 'Pabna Sadar', 'পাবনা সদর', 'pabnasadar.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(117, 13, 'Bera', 'বেড়া', 'bera.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(118, 13, 'Atghoria', 'আটঘরিয়া', 'atghoria.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(119, 13, 'Chatmohar', 'চাটমোহর', 'chatmohar.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(120, 13, 'Santhia', 'সাঁথিয়া', 'santhia.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(121, 13, 'Faridpur', 'ফরিদপুর', 'faridpur.pabna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(122, 14, 'Kahaloo', 'কাহালু', 'kahaloo.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(123, 14, 'Bogra Sadar', 'বগুড়া সদর', 'sadar.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(124, 14, 'Shariakandi', 'সারিয়াকান্দি', 'shariakandi.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(125, 14, 'Shajahanpur', 'শাজাহানপুর', 'shajahanpur.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(126, 14, 'Dupchanchia', 'দুপচাচিঁয়া', 'dupchanchia.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(127, 14, 'Adamdighi', 'আদমদিঘি', 'adamdighi.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(128, 14, 'Nondigram', 'নন্দিগ্রাম', 'nondigram.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(129, 14, 'Sonatala', 'সোনাতলা', 'sonatala.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(130, 14, 'Dhunot', 'ধুনট', 'dhunot.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(131, 14, 'Gabtali', 'গাবতলী', 'gabtali.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(132, 14, 'Sherpur', 'শেরপুর', 'sherpur.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(133, 14, 'Shibganj', 'শিবগঞ্জ', 'shibganj.bogra.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(134, 15, 'Paba', 'পবা', 'paba.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(135, 15, 'Durgapur', 'দুর্গাপুর', 'durgapur.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(136, 15, 'Mohonpur', 'মোহনপুর', 'mohonpur.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(137, 15, 'Charghat', 'চারঘাট', 'charghat.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(138, 15, 'Puthia', 'পুঠিয়া', 'puthia.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(139, 15, 'Bagha', 'বাঘা', 'bagha.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(140, 15, 'Godagari', 'গোদাগাড়ী', 'godagari.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(141, 15, 'Tanore', 'তানোর', 'tanore.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(142, 15, 'Bagmara', 'বাগমারা', 'bagmara.rajshahi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(143, 16, 'Natore Sadar', 'নাটোর সদর', 'natoresadar.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(144, 16, 'Singra', 'সিংড়া', 'singra.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(145, 16, 'Baraigram', 'বড়াইগ্রাম', 'baraigram.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(146, 16, 'Bagatipara', 'বাগাতিপাড়া', 'bagatipara.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(147, 16, 'Lalpur', 'লালপুর', 'lalpur.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(148, 16, 'Gurudaspur', 'গুরুদাসপুর', 'gurudaspur.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(149, 16, 'Naldanga', 'নলডাঙ্গা', 'naldanga.natore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(150, 17, 'Akkelpur', 'আক্কেলপুর', 'akkelpur.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(151, 17, 'Kalai', 'কালাই', 'kalai.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(152, 17, 'Khetlal', 'ক্ষেতলাল', 'khetlal.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(153, 17, 'Panchbibi', 'পাঁচবিবি', 'panchbibi.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(154, 17, 'Joypurhat Sadar', 'জয়পুরহাট সদর', 'joypurhatsadar.joypurhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(155, 18, 'Chapainawabganj Sadar', 'চাঁপাইনবাবগঞ্জ সদর', 'chapainawabganjsadar.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(156, 18, 'Gomostapur', 'গোমস্তাপুর', 'gomostapur.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(157, 18, 'Nachol', 'নাচোল', 'nachol.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(158, 18, 'Bholahat', 'ভোলাহাট', 'bholahat.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(159, 18, 'Shibganj', 'শিবগঞ্জ', 'shibganj.chapainawabganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(160, 19, 'Mohadevpur', 'মহাদেবপুর', 'mohadevpur.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(161, 19, 'Badalgachi', 'বদলগাছী', 'badalgachi.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(162, 19, 'Patnitala', 'পত্নিতলা', 'patnitala.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(163, 19, 'Dhamoirhat', 'ধামইরহাট', 'dhamoirhat.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(164, 19, 'Niamatpur', 'নিয়ামতপুর', 'niamatpur.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(165, 19, 'Manda', 'মান্দা', 'manda.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(166, 19, 'Atrai', 'আত্রাই', 'atrai.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(167, 19, 'Raninagar', 'রাণীনগর', 'raninagar.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(168, 19, 'Naogaon Sadar', 'নওগাঁ সদর', 'naogaonsadar.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(169, 19, 'Porsha', 'পোরশা', 'porsha.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(170, 19, 'Sapahar', 'সাপাহার', 'sapahar.naogaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(171, 20, 'Manirampur', 'মণিরামপুর', 'manirampur.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(172, 20, 'Abhaynagar', 'অভয়নগর', 'abhaynagar.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(173, 20, 'Bagherpara', 'বাঘারপাড়া', 'bagherpara.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(174, 20, 'Chougachha', 'চৌগাছা', 'chougachha.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(175, 20, 'Jhikargacha', 'ঝিকরগাছা', 'jhikargacha.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(176, 20, 'Keshabpur', 'কেশবপুর', 'keshabpur.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(177, 20, 'Jessore Sadar', 'যশোর সদর', 'sadar.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(178, 20, 'Sharsha', 'শার্শা', 'sharsha.jessore.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(179, 21, 'Assasuni', 'আশাশুনি', 'assasuni.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(180, 21, 'Debhata', 'দেবহাটা', 'debhata.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(181, 21, 'Kalaroa', 'কলারোয়া', 'kalaroa.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(182, 21, 'Satkhira Sadar', 'সাতক্ষীরা সদর', 'satkhirasadar.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(183, 21, 'Shyamnagar', 'শ্যামনগর', 'shyamnagar.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(184, 21, 'Tala', 'তালা', 'tala.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(185, 21, 'Kaliganj', 'কালিগঞ্জ', 'kaliganj.satkhira.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(186, 22, 'Mujibnagar', 'মুজিবনগর', 'mujibnagar.meherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(187, 22, 'Meherpur Sadar', 'মেহেরপুর সদর', 'meherpursadar.meherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(188, 22, 'Gangni', 'গাংনী', 'gangni.meherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(189, 23, 'Narail Sadar', 'নড়াইল সদর', 'narailsadar.narail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(190, 23, 'Lohagara', 'লোহাগড়া', 'lohagara.narail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(191, 23, 'Kalia', 'কালিয়া', 'kalia.narail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(192, 24, 'Chuadanga Sadar', 'চুয়াডাঙ্গা সদর', 'chuadangasadar.chuadanga.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(193, 24, 'Alamdanga', 'আলমডাঙ্গা', 'alamdanga.chuadanga.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(194, 24, 'Damurhuda', 'দামুড়হুদা', 'damurhuda.chuadanga.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(195, 24, 'Jibannagar', 'জীবননগর', 'jibannagar.chuadanga.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(196, 25, 'Kushtia Sadar', 'কুষ্টিয়া সদর', 'kushtiasadar.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(197, 25, 'Kumarkhali', 'কুমারখালী', 'kumarkhali.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(198, 25, 'Khoksa', 'খোকসা', 'khoksa.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(199, 25, 'Mirpur', 'মিরপুর', 'mirpurkushtia.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(200, 25, 'Daulatpur', 'দৌলতপুর', 'daulatpur.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(201, 25, 'Bheramara', 'ভেড়ামারা', 'bheramara.kushtia.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(202, 26, 'Shalikha', 'শালিখা', 'shalikha.magura.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(203, 26, 'Sreepur', 'শ্রীপুর', 'sreepur.magura.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(204, 26, 'Magura Sadar', 'মাগুরা সদর', 'magurasadar.magura.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(205, 26, 'Mohammadpur', 'মহম্মদপুর', 'mohammadpur.magura.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(206, 27, 'Paikgasa', 'পাইকগাছা', 'paikgasa.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(207, 27, 'Fultola', 'ফুলতলা', 'fultola.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(208, 27, 'Digholia', 'দিঘলিয়া', 'digholia.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(209, 27, 'Rupsha', 'রূপসা', 'rupsha.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(210, 27, 'Terokhada', 'তেরখাদা', 'terokhada.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(211, 27, 'Dumuria', 'ডুমুরিয়া', 'dumuria.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(212, 27, 'Botiaghata', 'বটিয়াঘাটা', 'botiaghata.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(213, 27, 'Dakop', 'দাকোপ', 'dakop.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(214, 27, 'Koyra', 'কয়রা', 'koyra.khulna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(215, 28, 'Fakirhat', 'ফকিরহাট', 'fakirhat.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(216, 28, 'Bagerhat Sadar', 'বাগেরহাট সদর', 'sadar.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(217, 28, 'Mollahat', 'মোল্লাহাট', 'mollahat.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(218, 28, 'Sarankhola', 'শরণখোলা', 'sarankhola.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(219, 28, 'Rampal', 'রামপাল', 'rampal.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(220, 28, 'Morrelganj', 'মোড়েলগঞ্জ', 'morrelganj.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(221, 28, 'Kachua', 'কচুয়া', 'kachua.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(222, 28, 'Mongla', 'মোংলা', 'mongla.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(223, 28, 'Chitalmari', 'চিতলমারী', 'chitalmari.bagerhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(224, 29, 'Jhenaidah Sadar', 'ঝিনাইদহ সদর', 'sadar.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(225, 29, 'Shailkupa', 'শৈলকুপা', 'shailkupa.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(226, 29, 'Harinakundu', 'হরিণাকুন্ডু', 'harinakundu.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(227, 29, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(228, 29, 'Kotchandpur', 'কোটচাঁদপুর', 'kotchandpur.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(229, 29, 'Moheshpur', 'মহেশপুর', 'moheshpur.jhenaidah.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(230, 30, 'Jhalakathi Sadar', 'ঝালকাঠি সদর', 'sadar.jhalakathi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(231, 30, 'Kathalia', 'কাঠালিয়া', 'kathalia.jhalakathi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(232, 30, 'Nalchity', 'নলছিটি', 'nalchity.jhalakathi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(233, 30, 'Rajapur', 'রাজাপুর', 'rajapur.jhalakathi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(234, 31, 'Bauphal', 'বাউফল', 'bauphal.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(235, 31, 'Patuakhali Sadar', 'পটুয়াখালী সদর', 'sadar.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(236, 31, 'Dumki', 'দুমকি', 'dumki.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(237, 31, 'Dashmina', 'দশমিনা', 'dashmina.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(238, 31, 'Kalapara', 'কলাপাড়া', 'kalapara.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(239, 31, 'Mirzaganj', 'মির্জাগঞ্জ', 'mirzaganj.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(240, 31, 'Galachipa', 'গলাচিপা', 'galachipa.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(241, 31, 'Rangabali', 'রাঙ্গাবালী', 'rangabali.patuakhali.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(242, 32, 'Pirojpur Sadar', 'পিরোজপুর সদর', 'sadar.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(243, 32, 'Nazirpur', 'নাজিরপুর', 'nazirpur.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(244, 32, 'Kawkhali', 'কাউখালী', 'kawkhali.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(245, 32, 'Zianagar', 'জিয়ানগর', 'zianagar.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(246, 32, 'Bhandaria', 'ভান্ডারিয়া', 'bhandaria.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(247, 32, 'Mathbaria', 'মঠবাড়ীয়া', 'mathbaria.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(248, 32, 'Nesarabad', 'নেছারাবাদ', 'nesarabad.pirojpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(249, 33, 'Barisal Sadar', 'বরিশাল সদর', 'barisalsadar.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(250, 33, 'Bakerganj', 'বাকেরগঞ্জ', 'bakerganj.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(251, 33, 'Babuganj', 'বাবুগঞ্জ', 'babuganj.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(252, 33, 'Wazirpur', 'উজিরপুর', 'wazirpur.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(253, 33, 'Banaripara', 'বানারীপাড়া', 'banaripara.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(254, 33, 'Gournadi', 'গৌরনদী', 'gournadi.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(255, 33, 'Agailjhara', 'আগৈলঝাড়া', 'agailjhara.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(256, 33, 'Mehendiganj', 'মেহেন্দিগঞ্জ', 'mehendiganj.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(257, 33, 'Muladi', 'মুলাদী', 'muladi.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(258, 33, 'Hizla', 'হিজলা', 'hizla.barisal.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(259, 34, 'Bhola Sadar', 'ভোলা সদর', 'sadar.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(260, 34, 'Borhan Sddin', 'বোরহান উদ্দিন', 'borhanuddin.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(261, 34, 'Charfesson', 'চরফ্যাশন', 'charfesson.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(262, 34, 'Doulatkhan', 'দৌলতখান', 'doulatkhan.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(263, 34, 'Monpura', 'মনপুরা', 'monpura.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(264, 34, 'Tazumuddin', 'তজুমদ্দিন', 'tazumuddin.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(265, 34, 'Lalmohan', 'লালমোহন', 'lalmohan.bhola.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(266, 35, 'Amtali', 'আমতলী', 'amtali.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(267, 35, 'Barguna Sadar', 'বরগুনা সদর', 'sadar.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(268, 35, 'Betagi', 'বেতাগী', 'betagi.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(269, 35, 'Bamna', 'বামনা', 'bamna.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(270, 35, 'Pathorghata', 'পাথরঘাটা', 'pathorghata.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(271, 35, 'Taltali', 'তালতলি', 'taltali.barguna.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(272, 36, 'Balaganj', 'বালাগঞ্জ', 'balaganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(273, 36, 'Beanibazar', 'বিয়ানীবাজার', 'beanibazar.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(274, 36, 'Bishwanath', 'বিশ্বনাথ', 'bishwanath.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(275, 36, 'Companiganj', 'কোম্পানীগঞ্জ', 'companiganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(276, 36, 'Fenchuganj', 'ফেঞ্চুগঞ্জ', 'fenchuganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(277, 36, 'Golapganj', 'গোলাপগঞ্জ', 'golapganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(278, 36, 'Gowainghat', 'গোয়াইনঘাট', 'gowainghat.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(279, 36, 'Jaintiapur', 'জৈন্তাপুর', 'jaintiapur.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(280, 36, 'Kanaighat', 'কানাইঘাট', 'kanaighat.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(281, 36, 'Sylhet Sadar', 'সিলেট সদর', 'sylhetsadar.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(282, 36, 'Zakiganj', 'জকিগঞ্জ', 'zakiganj.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(283, 36, 'Dakshinsurma', 'দক্ষিণ সুরমা', 'dakshinsurma.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(284, 36, 'Osmaninagar', 'ওসমানী নগর', 'osmaninagar.sylhet.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(285, 37, 'Barlekha', 'বড়লেখা', 'barlekha.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(286, 37, 'Kamolganj', 'কমলগঞ্জ', 'kamolganj.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(287, 37, 'Kulaura', 'কুলাউড়া', 'kulaura.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(288, 37, 'Moulvibazar Sadar', 'মৌলভীবাজার সদর', 'moulvibazarsadar.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(289, 37, 'Rajnagar', 'রাজনগর', 'rajnagar.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(290, 37, 'Sreemangal', 'শ্রীমঙ্গল', 'sreemangal.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(291, 37, 'Juri', 'জুড়ী', 'juri.moulvibazar.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(292, 38, 'Nabiganj', 'নবীগঞ্জ', 'nabiganj.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(293, 38, 'Bahubal', 'বাহুবল', 'bahubal.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(294, 38, 'Ajmiriganj', 'আজমিরীগঞ্জ', 'ajmiriganj.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(295, 38, 'Baniachong', 'বানিয়াচং', 'baniachong.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(296, 38, 'Lakhai', 'লাখাই', 'lakhai.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(297, 38, 'Chunarughat', 'চুনারুঘাট', 'chunarughat.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(298, 38, 'Habiganj Sadar', 'হবিগঞ্জ সদর', 'habiganjsadar.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(299, 38, 'Madhabpur', 'মাধবপুর', 'madhabpur.habiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(300, 39, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর', 'sadar.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(301, 39, 'South Sunamganj', 'দক্ষিণ সুনামগঞ্জ', 'southsunamganj.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(302, 39, 'Bishwambarpur', 'বিশ্বম্ভরপুর', 'bishwambarpur.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(303, 39, 'Chhatak', 'ছাতক', 'chhatak.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(304, 39, 'Jagannathpur', 'জগন্নাথপুর', 'jagannathpur.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(305, 39, 'Dowarabazar', 'দোয়ারাবাজার', 'dowarabazar.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(306, 39, 'Tahirpur', 'তাহিরপুর', 'tahirpur.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(307, 39, 'Dharmapasha', 'ধর্মপাশা', 'dharmapasha.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(308, 39, 'Jamalganj', 'জামালগঞ্জ', 'jamalganj.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(309, 39, 'Shalla', 'শাল্লা', 'shalla.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(310, 39, 'Derai', 'দিরাই', 'derai.sunamganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(311, 40, 'Belabo', 'বেলাবো', 'belabo.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(312, 40, 'Monohardi', 'মনোহরদী', 'monohardi.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(313, 40, 'Narsingdi Sadar', 'নরসিংদী সদর', 'narsingdisadar.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(314, 40, 'Palash', 'পলাশ', 'palash.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(315, 40, 'Raipura', 'রায়পুরা', 'raipura.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(316, 40, 'Shibpur', 'শিবপুর', 'shibpur.narsingdi.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(317, 41, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(318, 41, 'Kaliakair', 'কালিয়াকৈর', 'kaliakair.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(319, 41, 'Kapasia', 'কাপাসিয়া', 'kapasia.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(320, 41, 'Gazipur Sadar', 'গাজীপুর সদর', 'sadar.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(321, 41, 'Sreepur', 'শ্রীপুর', 'sreepur.gazipur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(322, 42, 'Shariatpur Sadar', 'শরিয়তপুর সদর', 'sadar.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(323, 42, 'Naria', 'নড়িয়া', 'naria.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(324, 42, 'Zajira', 'জাজিরা', 'zajira.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(325, 42, 'Gosairhat', 'গোসাইরহাট', 'gosairhat.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(326, 42, 'Bhedarganj', 'ভেদরগঞ্জ', 'bhedarganj.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(327, 42, 'Damudya', 'ডামুড্যা', 'damudya.shariatpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(328, 43, 'Araihazar', 'আড়াইহাজার', 'araihazar.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(329, 43, 'Bandar', 'বন্দর', 'bandar.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(330, 43, 'Narayanganj Sadar', 'নারায়নগঞ্জ সদর', 'narayanganjsadar.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(331, 43, 'Rupganj', 'রূপগঞ্জ', 'rupganj.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(332, 43, 'Sonargaon', 'সোনারগাঁ', 'sonargaon.narayanganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(333, 44, 'Basail', 'বাসাইল', 'basail.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(334, 44, 'Bhuapur', 'ভুয়াপুর', 'bhuapur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(335, 44, 'Delduar', 'দেলদুয়ার', 'delduar.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(336, 44, 'Ghatail', 'ঘাটাইল', 'ghatail.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(337, 44, 'Gopalpur', 'গোপালপুর', 'gopalpur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(338, 44, 'Madhupur', 'মধুপুর', 'madhupur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(339, 44, 'Mirzapur', 'মির্জাপুর', 'mirzapur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(340, 44, 'Nagarpur', 'নাগরপুর', 'nagarpur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(341, 44, 'Sakhipur', 'সখিপুর', 'sakhipur.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(342, 44, 'Tangail Sadar', 'টাঙ্গাইল সদর', 'tangailsadar.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(343, 44, 'Kalihati', 'কালিহাতী', 'kalihati.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(344, 44, 'Dhanbari', 'ধনবাড়ী', 'dhanbari.tangail.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(345, 45, 'Itna', 'ইটনা', 'itna.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(346, 45, 'Katiadi', 'কটিয়াদী', 'katiadi.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(347, 45, 'Bhairab', 'ভৈরব', 'bhairab.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(348, 45, 'Tarail', 'তাড়াইল', 'tarail.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(349, 45, 'Hossainpur', 'হোসেনপুর', 'hossainpur.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(350, 45, 'Pakundia', 'পাকুন্দিয়া', 'pakundia.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(351, 45, 'Kuliarchar', 'কুলিয়ারচর', 'kuliarchar.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(352, 45, 'Kishoreganj Sadar', 'কিশোরগঞ্জ সদর', 'kishoreganjsadar.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(353, 45, 'Karimgonj', 'করিমগঞ্জ', 'karimgonj.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(354, 45, 'Bajitpur', 'বাজিতপুর', 'bajitpur.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(355, 45, 'Austagram', 'অষ্টগ্রাম', 'austagram.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(356, 45, 'Mithamoin', 'মিঠামইন', 'mithamoin.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(357, 45, 'Nikli', 'নিকলী', 'nikli.kishoreganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(358, 46, 'Harirampur', 'হরিরামপুর', 'harirampur.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(359, 46, 'Saturia', 'সাটুরিয়া', 'saturia.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(360, 46, 'Manikganj Sadar', 'মানিকগঞ্জ সদর', 'sadar.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(361, 46, 'Gior', 'ঘিওর', 'gior.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(362, 46, 'Shibaloy', 'শিবালয়', 'shibaloy.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(363, 46, 'Doulatpur', 'দৌলতপুর', 'doulatpur.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(364, 46, 'Singiar', 'সিংগাইর', 'singiar.manikganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(365, 47, 'Savar', 'সাভার', 'savar.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(366, 47, 'Dhamrai', 'ধামরাই', 'dhamrai.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(367, 47, 'Keraniganj', 'কেরাণীগঞ্জ', 'keraniganj.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(368, 47, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(369, 47, 'Dohar', 'দোহার', 'dohar.dhaka.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(370, 48, 'Munshiganj Sadar', 'মুন্সিগঞ্জ সদর', 'sadar.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(371, 48, 'Sreenagar', 'শ্রীনগর', 'sreenagar.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(372, 48, 'Sirajdikhan', 'সিরাজদিখান', 'sirajdikhan.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(373, 48, 'Louhajanj', 'লৌহজং', 'louhajanj.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(374, 48, 'Gajaria', 'গজারিয়া', 'gajaria.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(375, 48, 'Tongibari', 'টংগীবাড়ি', 'tongibari.munshiganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(376, 49, 'Rajbari Sadar', 'রাজবাড়ী সদর', 'sadar.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(377, 49, 'Goalanda', 'গোয়ালন্দ', 'goalanda.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(378, 49, 'Pangsa', 'পাংশা', 'pangsa.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(379, 49, 'Baliakandi', 'বালিয়াকান্দি', 'baliakandi.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(380, 49, 'Kalukhali', 'কালুখালী', 'kalukhali.rajbari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(381, 50, 'Madaripur Sadar', 'মাদারীপুর সদর', 'sadar.madaripur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(382, 50, 'Shibchar', 'শিবচর', 'shibchar.madaripur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(383, 50, 'Kalkini', 'কালকিনি', 'kalkini.madaripur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(384, 50, 'Rajoir', 'রাজৈর', 'rajoir.madaripur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(385, 51, 'Gopalganj Sadar', 'গোপালগঞ্জ সদর', 'sadar.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(386, 51, 'Kashiani', 'কাশিয়ানী', 'kashiani.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(387, 51, 'Tungipara', 'টুংগীপাড়া', 'tungipara.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(388, 51, 'Kotalipara', 'কোটালীপাড়া', 'kotalipara.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(389, 51, 'Muksudpur', 'মুকসুদপুর', 'muksudpur.gopalganj.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(390, 52, 'Faridpur Sadar', 'ফরিদপুর সদর', 'sadar.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(391, 52, 'Alfadanga', 'আলফাডাঙ্গা', 'alfadanga.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(392, 52, 'Boalmari', 'বোয়ালমারী', 'boalmari.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(393, 52, 'Sadarpur', 'সদরপুর', 'sadarpur.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(394, 52, 'Nagarkanda', 'নগরকান্দা', 'nagarkanda.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(395, 52, 'Bhanga', 'ভাঙ্গা', 'bhanga.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(396, 52, 'Charbhadrasan', 'চরভদ্রাসন', 'charbhadrasan.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(397, 52, 'Madhukhali', 'মধুখালী', 'madhukhali.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(398, 52, 'Saltha', 'সালথা', 'saltha.faridpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(399, 53, 'Panchagarh Sadar', 'পঞ্চগড় সদর', 'panchagarhsadar.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(400, 53, 'Debiganj', 'দেবীগঞ্জ', 'debiganj.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(401, 53, 'Boda', 'বোদা', 'boda.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(402, 53, 'Atwari', 'আটোয়ারী', 'atwari.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active');
INSERT INTO `upazilas_or_thanas` (`id`, `district_id`, `name`, `bn_name`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `activation_status`) VALUES
(403, 53, 'Tetulia', 'তেতুলিয়া', 'tetulia.panchagarh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(404, 54, 'Nawabganj', 'নবাবগঞ্জ', 'nawabganj.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(405, 54, 'Birganj', 'বীরগঞ্জ', 'birganj.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(406, 54, 'Ghoraghat', 'ঘোড়াঘাট', 'ghoraghat.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(407, 54, 'Birampur', 'বিরামপুর', 'birampur.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(408, 54, 'Parbatipur', 'পার্বতীপুর', 'parbatipur.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(409, 54, 'Bochaganj', 'বোচাগঞ্জ', 'bochaganj.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(410, 54, 'Kaharol', 'কাহারোল', 'kaharol.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(411, 54, 'Fulbari', 'ফুলবাড়ী', 'fulbari.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(412, 54, 'Dinajpur Sadar', 'দিনাজপুর সদর', 'dinajpursadar.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(413, 54, 'Hakimpur', 'হাকিমপুর', 'hakimpur.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(414, 54, 'Khansama', 'খানসামা', 'khansama.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(415, 54, 'Birol', 'বিরল', 'birol.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(416, 54, 'Chirirbandar', 'চিরিরবন্দর', 'chirirbandar.dinajpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(417, 55, 'Lalmonirhat Sadar', 'লালমনিরহাট সদর', 'sadar.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(418, 55, 'Kaliganj', 'কালীগঞ্জ', 'kaliganj.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(419, 55, 'Hatibandha', 'হাতীবান্ধা', 'hatibandha.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(420, 55, 'Patgram', 'পাটগ্রাম', 'patgram.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(421, 55, 'Aditmari', 'আদিতমারী', 'aditmari.lalmonirhat.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(422, 56, 'Syedpur', 'সৈয়দপুর', 'syedpur.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(423, 56, 'Domar', 'ডোমার', 'domar.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(424, 56, 'Dimla', 'ডিমলা', 'dimla.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(425, 56, 'Jaldhaka', 'জলঢাকা', 'jaldhaka.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(426, 56, 'Kishorganj', 'কিশোরগঞ্জ', 'kishorganj.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(427, 56, 'Nilphamari Sadar', 'নীলফামারী সদর', 'nilphamarisadar.nilphamari.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(428, 57, 'Sadullapur', 'সাদুল্লাপুর', 'sadullapur.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(429, 57, 'Gaibandha Sadar', 'গাইবান্ধা সদর', 'gaibandhasadar.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(430, 57, 'Palashbari', 'পলাশবাড়ী', 'palashbari.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(431, 57, 'Saghata', 'সাঘাটা', 'saghata.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(432, 57, 'Gobindaganj', 'গোবিন্দগঞ্জ', 'gobindaganj.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(433, 57, 'Sundarganj', 'সুন্দরগঞ্জ', 'sundarganj.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(434, 57, 'Phulchari', 'ফুলছড়ি', 'phulchari.gaibandha.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(435, 58, 'Thakurgaon Sadar', 'ঠাকুরগাঁও সদর', 'thakurgaonsadar.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(436, 58, 'Pirganj', 'পীরগঞ্জ', 'pirganj.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(437, 58, 'Ranisankail', 'রাণীশংকৈল', 'ranisankail.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(438, 58, 'Haripur', 'হরিপুর', 'haripur.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(439, 58, 'Baliadangi', 'বালিয়াডাঙ্গী', 'baliadangi.thakurgaon.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(440, 59, 'Rangpur Sadar', 'রংপুর সদর', 'rangpursadar.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(441, 59, 'Gangachara', 'গংগাচড়া', 'gangachara.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(442, 59, 'Taragonj', 'তারাগঞ্জ', 'taragonj.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(443, 59, 'Badargonj', 'বদরগঞ্জ', 'badargonj.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(444, 59, 'Mithapukur', 'মিঠাপুকুর', 'mithapukur.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(445, 59, 'Pirgonj', 'পীরগঞ্জ', 'pirgonj.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(446, 59, 'Kaunia', 'কাউনিয়া', 'kaunia.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(447, 59, 'Pirgacha', 'পীরগাছা', 'pirgacha.rangpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(448, 60, 'Kurigram Sadar', 'কুড়িগ্রাম সদর', 'kurigramsadar.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(449, 60, 'Nageshwari', 'নাগেশ্বরী', 'nageshwari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(450, 60, 'Bhurungamari', 'ভুরুঙ্গামারী', 'bhurungamari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(451, 60, 'Phulbari', 'ফুলবাড়ী', 'phulbari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(452, 60, 'Rajarhat', 'রাজারহাট', 'rajarhat.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(453, 60, 'Ulipur', 'উলিপুর', 'ulipur.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(454, 60, 'Chilmari', 'চিলমারী', 'chilmari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(455, 60, 'Rowmari', 'রৌমারী', 'rowmari.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(456, 60, 'Charrajibpur', 'চর রাজিবপুর', 'charrajibpur.kurigram.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(457, 61, 'Sherpur Sadar', 'শেরপুর সদর', 'sherpursadar.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(458, 61, 'Nalitabari', 'নালিতাবাড়ী', 'nalitabari.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(459, 61, 'Sreebordi', 'শ্রীবরদী', 'sreebordi.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(460, 61, 'Nokla', 'নকলা', 'nokla.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(461, 61, 'Jhenaigati', 'ঝিনাইগাতী', 'jhenaigati.sherpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(462, 62, 'Fulbaria', 'ফুলবাড়ীয়া', 'fulbaria.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(463, 62, 'Trishal', 'ত্রিশাল', 'trishal.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(464, 62, 'Bhaluka', 'ভালুকা', 'bhaluka.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(465, 62, 'Muktagacha', 'মুক্তাগাছা', 'muktagacha.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(466, 62, 'Mymensingh Sadar', 'ময়মনসিংহ সদর', 'mymensinghsadar.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(467, 62, 'Dhobaura', 'ধোবাউড়া', 'dhobaura.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(468, 62, 'Phulpur', 'ফুলপুর', 'phulpur.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(469, 62, 'Haluaghat', 'হালুয়াঘাট', 'haluaghat.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(470, 62, 'Gouripur', 'গৌরীপুর', 'gouripur.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(471, 62, 'Gafargaon', 'গফরগাঁও', 'gafargaon.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(472, 62, 'Iswarganj', 'ঈশ্বরগঞ্জ', 'iswarganj.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(473, 62, 'Nandail', 'নান্দাইল', 'nandail.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(474, 62, 'Tarakanda', 'তারাকান্দা', 'tarakanda.mymensingh.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(475, 63, 'Jamalpur Sadar', 'জামালপুর সদর', 'jamalpursadar.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(476, 63, 'Melandah', 'মেলান্দহ', 'melandah.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(477, 63, 'Islampur', 'ইসলামপুর', 'islampur.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(478, 63, 'Dewangonj', 'দেওয়ানগঞ্জ', 'dewangonj.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(479, 63, 'Sarishabari', 'সরিষাবাড়ী', 'sarishabari.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(480, 63, 'Madarganj', 'মাদারগঞ্জ', 'madarganj.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(481, 63, 'Bokshiganj', 'বকশীগঞ্জ', 'bokshiganj.jamalpur.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(482, 64, 'Barhatta', 'বারহাট্টা', 'barhatta.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(483, 64, 'Durgapur', 'দুর্গাপুর', 'durgapur.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(484, 64, 'Kendua', 'কেন্দুয়া', 'kendua.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(485, 64, 'Atpara', 'আটপাড়া', 'atpara.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(486, 64, 'Madan', 'মদন', 'madan.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(487, 64, 'Khaliajuri', 'খালিয়াজুরী', 'khaliajuri.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(488, 64, 'Kalmakanda', 'কলমাকান্দা', 'kalmakanda.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(489, 64, 'Mohongonj', 'মোহনগঞ্জ', 'mohongonj.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(490, 64, 'Purbadhala', 'পূর্বধলা', 'purbadhala.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(491, 64, 'Netrokona Sadar', 'নেত্রকোণা সদর', 'netrokonasadar.netrokona.gov.bd', '2020-12-14 07:50:55', 0, '0000-00-00 00:00:00', 0, 'active'),
(494, 47, 'Mirpur', NULL, NULL, '2020-12-30 12:03:08', 1, '0000-00-00 00:00:00', 0, 'active'),
(495, 47, 'Banani Model Town', NULL, NULL, '2020-12-30 12:28:00', 1, '0000-00-00 00:00:00', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `userName` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUrl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admitted_class` int(11) DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `marital_status` enum('Married','Unmarried') COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` enum('A+','A-','AB+','AB-','B+','B-','O+','O-') COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` enum('Islam','Hinduism','Buddhism','Christianity','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `role`, `name`, `email`, `phone`, `imageUrl`, `admitted_class`, `gender`, `birth_date`, `marital_status`, `blood_group`, `religion`, `nationality`, `created_by`, `created_at`, `updated_by`, `updated_at`, `activation_status`) VALUES
(1, '', '93279e3308bdbbeed946fc965017f67a', 'Admin', 'Mahabub Alom', 'mahabub@admin.com', '01518325132', '1.png', NULL, 'Male', '1975-06-09', 'Married', 'A+', 'Islam', 'Bangladeshi', 0, '2021-06-18 18:40:55', 0, '2021-06-18 18:40:55', 'active'),
(10, '20210000001', '93279e3308bdbbeed946fc965017f67a', 'Student', 'Eleyas Suny', 'eleyassuny@gmail.com', '01755114455', NULL, 1, 'Male', '2021-06-19', 'Unmarried', 'B+', 'Islam', 'Bangladeshi', 1, '2021-06-19 07:06:47', 0, '2021-06-20 14:56:23', 'active'),
(14, NULL, '93279e3308bdbbeed946fc965017f67a', 'Teacher', 'Mamun', 'mamun@gmail.com', '01755114454', NULL, NULL, 'Male', '2021-06-19', 'Married', 'O+', 'Islam', 'Bangladeshi', 1, '2021-06-19 08:22:31', 0, '2021-06-20 14:56:27', 'active'),
(15, '20210000001', '93279e3308bdbbeed946fc965017f67a', 'Student', 'himika', 'himikaaksir@gmail.com', '01755114457', NULL, 4, 'Female', '2021-06-19', 'Unmarried', 'A+', 'Hinduism', 'Bangladeshi', 1, '2021-06-19 08:32:06', 0, '2021-06-20 14:56:30', 'active'),
(18, '20210000002', '93279e3308bdbbeed946fc965017f67a', 'Student', 'student 1', 'student1@gmail.com', '01755114450', NULL, 1, 'Male', '2021-06-19', 'Unmarried', 'A+', 'Hinduism', 'Bangladeshi', 1, '2021-06-19 16:07:09', 0, '2021-06-20 14:56:33', 'active'),
(19, '20210000003', '93279e3308bdbbeed946fc965017f67a', 'Student', 'student 2', 'student2@gmail.com', '01755114451', NULL, 1, 'Male', '2021-06-19', 'Unmarried', 'AB+', 'Islam', 'Bangladeshi', 1, '2021-06-19 16:12:11', 0, '2021-06-20 14:56:35', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acadamic_informations`
--
ALTER TABLE `acadamic_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_informations`
--
ALTER TABLE `education_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grading`
--
ALTER TABLE `grading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian_informations`
--
ALTER TABLE `guardian_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas_or_thanas`
--
ALTER TABLE `upazilas_or_thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acadamic_informations`
--
ALTER TABLE `acadamic_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `education_informations`
--
ALTER TABLE `education_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `grading`
--
ALTER TABLE `grading`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guardian_informations`
--
ALTER TABLE `guardian_informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upazilas_or_thanas`
--
ALTER TABLE `upazilas_or_thanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
