-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 01:18 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_type_builders`
--

CREATE TABLE `content_type_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_type_builders`
--

INSERT INTO `content_type_builders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'header', NULL, NULL),
(2, 'paragraph', NULL, NULL),
(3, 'enumaration', NULL, NULL),
(4, 'media', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `list_items`
--

CREATE TABLE `list_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_complete` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_items`
--

INSERT INTO `list_items` (`id`, `name`, `is_complete`, `created_at`, `updated_at`) VALUES
(3, 'Property gallery feature', 1, '2022-09-17 09:01:32', '2022-09-21 06:40:47'),
(4, 'Clear temp images opon opening edit', 0, '2022-09-19 04:26:46', '2022-09-19 04:26:46'),
(5, 'Feature: set featured property', 0, '2022-09-21 04:48:41', '2022-09-21 04:48:41'),
(6, 'Task complete test', 1, '2022-09-21 05:28:32', '2022-09-21 05:28:34'),
(7, 'test', 1, '2022-09-21 05:32:34', '2022-09-21 05:32:35'),
(8, 'draggable enumeration', 1, '2022-09-21 05:42:45', '2022-09-21 07:31:21'),
(9, 'draggable property content section', 1, '2022-09-21 05:43:05', '2022-09-21 07:31:20'),
(10, 'download js css for FilePond uploader', 1, '2022-09-21 06:41:50', '2022-09-21 07:31:17'),
(11, 'download js cs for draggable element', 1, '2022-09-21 06:42:17', '2022-09-21 07:31:13'),
(12, 'test create property enumeration draggable', 0, '2022-09-21 08:44:21', '2022-09-21 08:44:21'),
(13, 'Banana', 1, '2022-09-21 08:44:48', '2022-09-21 08:45:05'),
(14, 'Banana', 1, '2022-09-21 08:45:14', '2022-09-21 08:45:16');

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
(22, '2022_08_05_230741_create_proptery_types_table', 3),
(23, '2022_08_06_015244_create_propety_types_table', 4),
(27, '2014_10_12_000000_create_users_table', 5),
(28, '2014_10_12_100000_create_password_resets_table', 5),
(29, '2019_08_19_000000_create_failed_jobs_table', 5),
(30, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(31, '2022_07_30_063554_create_user_roles_table', 5),
(32, '2022_07_30_071021_create_list_items_table', 5),
(33, '2022_08_03_135631_create_properties_table', 5),
(34, '2022_08_06_020630_create_property_types_table', 5),
(35, '2022_08_06_030834_create_property_categories_table', 5),
(36, '2022_08_06_031807_create_property_statuses_table', 5),
(37, '2022_08_23_144917_create_content_type_builders_table', 6),
(38, '2022_09_09_160309_create_property_information_table', 7),
(39, '2022_09_19_091418_create_property_galleries_table', 8);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `typeId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `stateId` int(11) NOT NULL,
  `featured` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `banner` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `typeId`, `categoryId`, `stateId`, `featured`, `name`, `location`, `description`, `slug`, `uri`, `price`, `banner`, `status`, `token`, `created_at`, `updated_at`) VALUES
(49, 1, 2, 1, 1, 'Plumera Mactan', 'Cagudoy, Lapu lapu City', 'Plumera is conveniently located at Cagodoy, Basak, Lapu-Lapu City within close proximity to Mactan-Cebu International Airport and Mactan DoctorsHospital,commercial, schools and churches.', 'plumera-mactan', '/condominium/plumera-mactan', 0.00, '/632aecb33721c_1663757491/32709-92plumera.jpg', 'draft', '632aecb33721c_1663757491', '2022-09-21 02:56:09', '2022-09-26 02:49:54'),
(50, 0, 2, 1, 1, 'Coral Village', 'Subabasbas, Lapu-lapu City, Cebu', 'Located at Marigondon, Lapu-Lapu City, just within the proximity of the well known resorts , blue beaches and diving spots and some places in Mactan. With the total project area 3.5 hectares 350 Units (2-Storey Townhouse).', 'coral-village', '/condominium/coral-village', 0.00, '/632b071d0042a_1663764253/71531-5coralvill2-1.jpg', 'draft', '632b071d0042a_1663764253', '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(51, 2, 1, 2, 0, 'Test', 'Test', 'Test', 'test', '/house-lot/test', 0.00, '/632b083936268_1663764537/18243-9coralvill2-3.jpg', 'draft', '632b083936268_1663764537', '2022-09-21 04:50:03', '2022-09-21 04:50:03'),
(52, 1, 1, 1, 0, 'Test', '1', '1', 'test', '/house-lot/test', 0.00, '/632b0910a5a2f_1663764752/banner.jpg', 'draft', '632b0910a5a2f_1663764752', '2022-09-21 04:54:01', '2022-09-21 05:14:15'),
(53, 1, 1, 1, 0, '1', '1', '1', '1', '/house-lot/1', 0.00, '/632b234aa3474_1663771466/Studio-Unit-Plumera-Mactan.jpg', 'draft', '632b234aa3474_1663771466', '2022-09-21 06:45:33', '2022-09-21 06:45:33'),
(54, 1, 1, 1, 0, '1', '1', '1', '1', '/house-lot/1', 0.00, '/632b234aa3474_1663771466/Studio-Unit-Plumera-Mactan.jpg', 'draft', '632b234aa3474_1663771466', '2022-09-21 06:46:01', '2022-09-21 06:46:01'),
(55, 1, 1, 1, 0, 'Sort', '1', '1', 'sort', '/house-lot/sort', 0.00, '/632b2a048a588_1663773188/46381-83plumera.jpg', 'draft', '632b2a048a588_1663773188', '2022-09-21 07:13:49', '2022-09-21 07:13:49'),
(56, 2, 1, 1, 0, 'Aduna Beach Villas Phase 2', 'Guinsay, Danao City, Cebu', 'With natural beauty wrapping around ADUNA BEACH Villas, this would definitely make vacation, retirement or even everyday living feel like heaven on earth.\r\n\r\nFitted with large windows, sliding doors, and open wooden terrace, each villa allows nature to embrace the homeowners and their guests.\r\n\r\nPerfect Vacation or Retirement house located in DANAO CEBU.', 'aduna-beach-villas-phase-2', '/house-lot/aduna-beach-villas-phase-2', 0.00, '/632b32f7a1256_1663775479/27491-52tnl.jpg', 'draft', '632b32f7a1256_1663775479', '2022-09-21 07:54:33', '2022-09-26 03:33:05'),
(57, 2, 1, 1, 0, 'Paragraph', '1', '1', 'paragraph', '/house-lot/paragraph', 0.00, '/632b3b1be422f_1663777563/32709-92plumera.jpg', 'draft', '632b3b1be422f_1663777563', '2022-09-21 08:27:23', '2022-09-21 08:27:23'),
(58, 1, 3, 1, 0, 'Calle', 'Cebu City', 'The quick brown fox jump over the lazy dog', 'calle', '/for-rent/calle', 0.00, '/6331803d7acb5_1664188477/Calle-104-for-sellers-01.jpg', 'draft', '6331803d7acb5_1664188477', '2022-09-26 02:36:24', '2022-09-26 03:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `property_categories`
--

CREATE TABLE `property_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_categories`
--

INSERT INTO `property_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'House & Lot', NULL, NULL),
(2, 'Condominium', NULL, NULL),
(3, 'For Rent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_galleries`
--

CREATE TABLE `property_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `propertyId` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `extention` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_galleries`
--

INSERT INTO `property_galleries` (`id`, `propertyId`, `filename`, `source`, `size`, `extention`, `created_at`, `updated_at`) VALUES
(27, 50, '18243-8coralvill2-2.jpg', '/632b071d0042a_1663764253/18243-8coralvill2-2.jpg', 293736, 'jpg', '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(28, 50, '18243-9coralvill2-3.jpg', '/632b071d0042a_1663764253/18243-9coralvill2-3.jpg', 249663, 'jpg', '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(29, 50, '71531-5coralvill2-1.jpg', '/632b071d0042a_1663764253/71531-5coralvill2-1.jpg', 214736, 'jpg', '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(33, 51, '13642729892.png', '/632b083936268_1663764537/13642729892.png', 47970, 'png', '2022-09-21 04:52:13', '2022-09-21 04:52:13'),
(34, 51, '13642724130.png', '/632b083936268_1663764537/13642724130.png', 48251, 'png', '2022-09-21 04:52:13', '2022-09-21 04:52:13'),
(55, 52, '299085286_1440075559820934_4594185283473394791_n.jpg', '/632b0910a5a2f_1663764752/299085286_1440075559820934_4594185283473394791_n.jpg', 64023, 'jpg', '2022-09-21 06:27:50', '2022-09-21 06:27:50'),
(80, 54, '32709-92plumera.jpg', '/632b234aa3474_1663771466/32709-92plumera.jpg', 299388, 'jpg', '2022-09-21 07:26:59', '2022-09-21 07:26:59'),
(81, 54, '46381-83plumera.jpg', '/632b234aa3474_1663771466/46381-83plumera.jpg', 241941, 'jpg', '2022-09-21 07:26:59', '2022-09-21 07:26:59'),
(82, 54, '81150-51plumera.jpg', '/632b234aa3474_1663771466/81150-51plumera.jpg', 228701, 'jpg', '2022-09-21 07:26:59', '2022-09-21 07:26:59'),
(149, 49, '1-Bedroom-Unit-Plumera-Mactan.jpg', '/632aecb33721c_1663757491/1-Bedroom-Unit-Plumera-Mactan.jpg', 35384, 'jpg', '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(150, 49, '38858-3updated masterplan.jpeg', '/632aecb33721c_1663757491/38858-3updated masterplan.jpeg', 3406179, 'jpeg', '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(151, 49, 'Studio-Unit-Plumera-Mactan.jpg', '/632aecb33721c_1663757491/Studio-Unit-Plumera-Mactan.jpg', 27954, 'jpg', '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(158, 56, 'Calle-104-for-sellers-01.jpg', '/632b32f7a1256_1663775479/Calle-104-for-sellers-01.jpg', 56953, 'jpg', '2022-09-26 04:36:54', '2022-09-26 04:36:54'),
(159, 56, 'Calle-104-for-sellers-03.jpg', '/632b32f7a1256_1663775479/Calle-104-for-sellers-03.jpg', 275343, 'jpg', '2022-09-26 04:36:54', '2022-09-26 04:36:54'),
(160, 56, 'Calle-104-for-sellers-04.jpg', '/632b32f7a1256_1663775479/Calle-104-for-sellers-04.jpg', 203738, 'jpg', '2022-09-26 04:36:54', '2022-09-26 04:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `property_information`
--

CREATE TABLE `property_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `propertyId` int(11) NOT NULL,
  `contentTypeId` int(11) NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_information`
--

INSERT INTO `property_information` (`id`, `propertyId`, `contentTypeId`, `value`, `attribute`, `sort`, `created_at`, `updated_at`) VALUES
(39, 50, 2, 'Located at Marigondon, Lapu-Lapu City, just within the proximity of the well known resorts , blue beaches and diving spots and some places in Mactan. With the total project area 3.5 hectares 350 Units (2-Storey Townhouse). ', '', 0, '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(40, 50, 4, '[\"\\/632b071d0042a_1663764253\\/site-map.jpg\"]', '', 0, '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(41, 50, 1, 'Two-Storey Townhouse ', '', 0, '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(42, 50, 3, '[\"Living\\/ Dining\\/ Kitchen - precast concrete walls with 1 coat of primer and 2 coats topcoat\",\"Toilet & Bath - painted precast concrete walls with 4 layers wall tiles (ceramic) \",\"Floors - plain concrete finish \",\"Kitchen - stainless steel sink with granite countertop \",\"Windows -sliding glass window with transom and jalousie window \"]', '{\"column\":\"1\"}', 0, '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(43, 50, 4, '[\"\\/632b071d0042a_1663764253\\/43917-CRVFP2.png\",\"\\/632b071d0042a_1663764253\\/85968-CRVFP1.png\"]', '', 0, '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(44, 50, 1, 'Amenities and Facilities ', '', 0, '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(45, 50, 3, '[\"Underground Drainage \",\"Sewage Treatment Facility \",\"Water System\",\"Landscaped Open Spaces \",\"Power Distribution \",\"Clubhouse \",\"Swimming Pool \",\"Parks and Playgrounds \",\"Basketball Court \",\"Jogging Trail \"]', '{\"column\":\"1\"}', 0, '2022-09-21 04:48:12', '2022-09-21 04:48:12'),
(98, 52, 3, '[\"a\",\"b\",\"c\"]', '{\"column\":\"2\"}', 1, '2022-09-21 06:27:50', '2022-09-21 06:27:50'),
(99, 52, 1, 'Header', '', 0, '2022-09-21 06:27:50', '2022-09-21 06:27:50'),
(100, 52, 4, '[\"\\/632b0910a5a2f_1663764752\\/13642729892.png\"]', '', 2, '2022-09-21 06:27:50', '2022-09-21 06:27:50'),
(160, 55, 3, '[\"A\",\"B\",\"C\"]', '{\"column\":\"1\"}', 0, '2022-09-21 07:21:19', '2022-09-21 07:21:19'),
(161, 54, 1, 'A', '', 0, '2022-09-21 07:26:59', '2022-09-21 07:26:59'),
(162, 54, 4, '[\"\\/632b234aa3474_1663771466\\/32709-92plumera.jpg\"]', '', 1, '2022-09-21 07:26:59', '2022-09-21 07:26:59'),
(163, 54, 3, '[\"C\",\"D\"]', '{\"column\":\"1\"}', 2, '2022-09-21 07:26:59', '2022-09-21 07:26:59'),
(164, 54, 2, 'B', '', 3, '2022-09-21 07:26:59', '2022-09-21 07:26:59'),
(220, 57, 2, 'With natural beauty wrapping around ADUNA BEACH Villas, this would definitely make vacation, retirement or even everyday living feel like heaven on earth.\n\nFitted with large windows, sliding doors, and open wooden terrace, each villa allows nature to embrace the homeowners and their guests.\n\nPerfect Vacation or Retirement house located in DANAO CEBU. \n\nPerfect Vacation or Retirement house located in DANAO CEBU. \n\n\n<b>Perfect Vacation</b> or Retirement house located in DANAO CEBU. \n\nPerfect Vacation or Retirement house located in DANAO CEBU. Perfect Vacation or Retirement house located in DANAO CEBU. ', '', 0, '2022-09-21 08:27:23', '2022-09-21 08:27:23'),
(242, 49, 2, 'Plumera is conveniently located at Cagodoy, Basak, Lapu-Lapu City within close proximity to Mactan-Cebu International Airport and Mactan DoctorsHospital,commercial, schools and churches. ', '', 0, '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(243, 49, 4, '[\"\\/632aecb33721c_1663757491\\/38858-3updated masterplan.jpeg\"]', '', 1, '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(244, 49, 1, 'Unit Type', '', 2, '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(245, 49, 4, '[\"\\/632aecb33721c_1663757491\\/Studio-Unit-Plumera-Mactan.jpg\",\"\\/632aecb33721c_1663757491\\/1-Bedroom-Unit-Plumera-Mactan.jpg\"]', '', 3, '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(246, 49, 1, 'Amenities and Facilities ', '', 4, '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(247, 49, 3, '[\"Fire Protection System \",\"15-M Wide Entrance\",\"Sewage Treatment Facility\",\"Underground Drainage \",\"Clubhouse and Multi-Purpose Area\",\"Gate and Guardhouse\",\"Material Recovery Facility\",\"Multi-Purpose Court\",\"Lagoon\",\"Sewer System\",\"Water System (MCWD)\",\"Perimeter Fence\",\"MECO Power\",\"Swimming Pool \",\"Future Retail Area\",\"Pocket Park\",\"Jogging Trail\",\"Mailbox Area \"]', '{\"column\":\"2\"}', 5, '2022-09-26 02:49:54', '2022-09-26 02:49:54'),
(253, 56, 2, 'With natural beauty wrapping around ADUNA BEACH Villas, this would definitely make vacation, retirement or even everyday living feel like heaven on earth.<br/><br/>Fitted with large windows, sliding doors, and open wooden terrace, each villa allows nature to embrace the homeowners and their guests.<br/><br/>Perfect Vacation or Retirement house located in DANAO CEBU. ', '', 0, '2022-09-26 04:36:54', '2022-09-26 04:36:54'),
(254, 56, 1, 'Amenities', '', 1, '2022-09-26 04:36:54', '2022-09-26 04:36:54'),
(255, 56, 3, '[\"Beach\",\"Beachfront Clubhouse \",\"Mangrove Park \",\"Perimeter Fence \",\"Wide Concrete Roads \",\"Infinity Pool \",\"Underground Sewage And Treatment Facilities \",\"Landscaped Park And Playground\"]', '{\"column\":\"1\"}', 2, '2022-09-26 04:36:54', '2022-09-26 04:36:54'),
(256, 56, 1, '2 BR TOWNHOUSE LOFT TYPE at ₱21,251 per month ', '', 3, '2022-09-26 04:36:54', '2022-09-26 04:36:54'),
(257, 56, 3, '[\"90 sqm lot area \",\"85.7 sqm floor area \",\"2 bedroom and 1 bathroom \",\"5,600,400\"]', '{\"column\":\"1\"}', 4, '2022-09-26 04:36:54', '2022-09-26 04:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `property_statuses`
--

CREATE TABLE `property_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_statuses`
--

INSERT INTO `property_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Preselling', NULL, NULL),
(2, 'RFO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Single Detached', NULL, NULL),
(2, 'Town House', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin@demo.com', 'admin', NULL, '$2y$10$z/a80b11BYXejy4AReTXe.S6SODg6XzSSTcYX6epUeQpGrkwnKgKu', 'BToKiBL5bdBhuKadZNqWtToqG1wbjdsXfZte1pn34xNvV3GfdSiv2G9zdgg3', '2022-07-29 17:08:54', '2022-07-29 17:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_type_builders`
--
ALTER TABLE `content_type_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `list_items`
--
ALTER TABLE `list_items`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_categories`
--
ALTER TABLE `property_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_galleries`
--
ALTER TABLE `property_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_information`
--
ALTER TABLE `property_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_statuses`
--
ALTER TABLE `property_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_type_builders`
--
ALTER TABLE `content_type_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_items`
--
ALTER TABLE `list_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `property_categories`
--
ALTER TABLE `property_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_galleries`
--
ALTER TABLE `property_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `property_information`
--
ALTER TABLE `property_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `property_statuses`
--
ALTER TABLE `property_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
