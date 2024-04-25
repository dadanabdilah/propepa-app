-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2024 at 10:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propepa_app2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `thumbnail` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'admin', '2024-01-07 13:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `institution`, `whatsapp_number`, `address`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, NULL, NULL, 'admin@gmail.com', '$2y$10$yY77jfOYTB5zoMWoKnz9weenyhVGTxUWoN0O94I5ghVCOeL.jf/ES', NULL, NULL, 0, '2024-02-28 04:03:08', '2024-01-07 06:00:19', '2024-02-28 04:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'email_password', 'admin@gmail.com', 1, '2024-02-28 04:03:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int UNSIGNED NOT NULL,
  `reference` varchar(128) NOT NULL,
  `merchant_ref` varchar(128) NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `amount` bigint NOT NULL,
  `total_fee` bigint NOT NULL,
  `pay_code` varchar(128) NOT NULL,
  `checkout_url` varchar(128) NOT NULL,
  `expired_time` datetime NOT NULL,
  `status` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `reference`, `merchant_ref`, `payment_method`, `amount`, `total_fee`, `pay_code`, `checkout_url`, `expired_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DEV-T26643137713QCNGX', 'INV-1704607227', 'BCAVA', 4380000, 5500, '252975429476680', 'https://tripay.co.id/checkout/DEV-T26643137713QCNGX', '2024-01-08 06:00:27', 'PAID', '2024-01-07 06:00:27', '2024-01-07 06:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `category_modules`
--

CREATE TABLE `category_modules` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `category_references`
--

CREATE TABLE `category_references` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '20190319121802', 'Tatter\\Visits\\Database\\Migrations\\CreateTableVisits', 'default', 'App', 1704607195, 1),
(2, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1704607195, 1),
(3, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'App', 1704607195, 1),
(4, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'App', 1704607195, 1),
(5, '20220712095055', 'Tatter\\Visits\\Database\\Migrations\\AlterSessionLength', 'default', 'App', 1704607195, 1),
(6, '2023-09-01-032027', 'App\\Database\\Migrations\\CreateCategoryReferencesTable', 'default', 'App', 1704607195, 1),
(7, '2023-09-01-033716', 'App\\Database\\Migrations\\CreateStudyReferencesTable', 'default', 'App', 1704607196, 1),
(8, '2023-09-01-144351', 'App\\Database\\Migrations\\CreateCategoryModulesTable', 'default', 'App', 1704607196, 1),
(9, '2023-09-01-144408', 'App\\Database\\Migrations\\CreateStudyModulesTable', 'default', 'App', 1704607196, 1),
(10, '2023-09-01-153153', 'App\\Database\\Migrations\\CreateOpinionsTable', 'default', 'App', 1704607196, 1),
(11, '2023-09-03-133543', 'App\\Database\\Migrations\\CreateSharingPracticesTable', 'default', 'App', 1704607196, 1),
(12, '2023-10-02-132548', 'App\\Database\\Migrations\\CreateArticlesTable', 'default', 'App', 1704607196, 1),
(13, '2024-01-07-055155', 'App\\Database\\Migrations\\CreateBillingTable', 'default', 'App', 1704607196, 1);

-- --------------------------------------------------------

--
-- Table structure for table `opinions`
--

CREATE TABLE `opinions` (
  `id` int UNSIGNED NOT NULL,
  `opinion` text,
  `user_id` int UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `class`, `key`, `value`, `type`, `context`, `created_at`, `updated_at`) VALUES
(1, 'Config\\App', 'siteName', 'PROPEPA', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(2, 'Config\\App', 'siteLogo', 'logo.png', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(3, 'Config\\App', 'siteIntroText', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius quod quisquam animi nemo! Quasi impedit deleniti ex accusamus modi hic, quia quos nisi, vitae voluptatum velit dicta sit soluta. Atque.', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(4, 'Config\\App', 'siteAbout', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius quod quisquam animi nemo! Quasi impedit deleniti ex accusamus modi hic, quia quos nisi, vitae voluptatum velit dicta sit soluta. Atque.', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(5, 'Config\\App', 'siteAddress', 'Jl. Terusan Jendral Sudirman, Cimahi 40526, Provinsi Jawa Barat, 40521', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(6, 'Config\\App', 'siteMail', 'mail@propepa.id', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(7, 'Config\\App', 'sitePhone', '08122400', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(8, 'Config\\App', 'siteMaps', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1973.6604224447428!2d107.52622722337051!3d-6.8876163334227805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e453712109bd%3A0x6cc9ae8eb42ce187!2sIKIP%20Siliwangi!5e0!3m2!1sid!2sid!4v1695638322747!5m2!1sid!2sid', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(9, 'Config\\App', 'siteURL', 'https://propepa.id', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(10, 'Config\\App', 'siteVideoURL', 'https://www.youtube.com/embed/QBuz0VTdJ-U?si=yLAU9Pgu-jxEHNoS', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(11, 'Config\\App', 'siteWhatsappGroupURL', 'https://whatsapp.com', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19'),
(12, 'Config\\App', 'siteTelegramGroupURL', 'https://telegram.com', 'string', NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `sharing_practices`
--

CREATE TABLE `sharing_practices` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `type` enum('MODULE','VIDEO') NOT NULL DEFAULT 'MODULE',
  `description` varchar(191) DEFAULT NULL,
  `status` enum('WAIT_FOR_REVIEW','APPROVE','DECLINE') NOT NULL DEFAULT 'WAIT_FOR_REVIEW',
  `category_reference_id` int UNSIGNED DEFAULT NULL,
  `category_module_id` int UNSIGNED DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `study_modules`
--

CREATE TABLE `study_modules` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `url_module` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `category_module_id` int UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `study_references`
--

CREATE TABLE `study_references` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `url_video` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `category_reference_id` int UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `name`, `avatar`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin123', NULL, NULL, NULL, NULL, 1, NULL, '2024-01-07 06:00:19', '2024-01-07 06:00:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int NOT NULL,
  `session_id` varchar(127) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `ip_address` bigint DEFAULT NULL,
  `user_agent` varchar(255) NOT NULL DEFAULT '',
  `platforms` varchar(255) NOT NULL DEFAULT '',
  `browsers` varchar(255) NOT NULL DEFAULT '',
  `scheme` varchar(15) NOT NULL DEFAULT '',
  `host` varchar(63) NOT NULL,
  `port` varchar(15) NOT NULL DEFAULT '',
  `user` varchar(31) NOT NULL DEFAULT '',
  `pass` varchar(255) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL DEFAULT '',
  `fragment` varchar(31) NOT NULL DEFAULT '',
  `views` int NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `session_id`, `user_id`, `ip_address`, `user_agent`, `platforms`, `browsers`, `scheme`, `host`, `port`, `user`, `pass`, `path`, `query`, `fragment`, `views`, `created_at`, `updated_at`) VALUES
(1, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'Windows 10', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/dashboard', '', '', 1, '2024-02-28 04:03:09', '2024-02-28 04:03:09'),
(2, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'Windows 10', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/dashboard', '', '', 1, '2024-02-28 04:03:10', '2024-02-28 04:03:10'),
(3, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'Windows 10', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/sharing-practices', '', '', 1, '2024-02-28 04:03:14', '2024-02-28 04:03:14'),
(4, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'Windows 10', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/sharing-practices', '', '', 1, '2024-02-28 04:03:14', '2024-02-28 04:03:14'),
(5, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'Windows 10', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/opinions', '', '', 1, '2024-02-28 04:03:21', '2024-02-28 04:03:21'),
(6, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'Windows 10', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/opinions', '', '', 1, '2024-02-28 04:03:21', '2024-02-28 04:03:21'),
(7, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Mobile Safari/537.36', 'Android', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/opinions/1', '', '', 1, '2024-02-28 04:04:35', '2024-02-28 04:04:35'),
(8, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Mobile Safari/537.36', 'Android', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/opinions', '', '', 1, '2024-02-28 04:04:36', '2024-02-28 04:04:36'),
(9, '0ajjllvevocp6torcfv2er62ecihrm19', 1, NULL, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Mobile Safari/537.36', 'Android', 'Chrome', 'http', 'localhost', '8080', '', '', '/admin/opinions', '', '', 1, '2024-02-28 04:04:36', '2024-02-28 04:04:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_modules`
--
ALTER TABLE `category_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_references`
--
ALTER TABLE `category_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opinions_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sharing_practices`
--
ALTER TABLE `sharing_practices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sharing_practices_category_reference_id_foreign` (`category_reference_id`),
  ADD KEY `sharing_practices_category_module_id_foreign` (`category_module_id`),
  ADD KEY `sharing_practices_user_id_foreign` (`user_id`);

--
-- Indexes for table `study_modules`
--
ALTER TABLE `study_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_modules_category_module_id_foreign` (`category_module_id`);

--
-- Indexes for table `study_references`
--
ALTER TABLE `study_references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_references_category_reference_id_foreign` (`category_reference_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ip_address` (`ip_address`),
  ADD KEY `host_path` (`host`,`path`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `updated_at` (`updated_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_modules`
--
ALTER TABLE `category_modules`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_references`
--
ALTER TABLE `category_references`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sharing_practices`
--
ALTER TABLE `sharing_practices`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_modules`
--
ALTER TABLE `study_modules`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `study_references`
--
ALTER TABLE `study_references`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opinions`
--
ALTER TABLE `opinions`
  ADD CONSTRAINT `opinions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sharing_practices`
--
ALTER TABLE `sharing_practices`
  ADD CONSTRAINT `sharing_practices_category_module_id_foreign` FOREIGN KEY (`category_module_id`) REFERENCES `category_modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sharing_practices_category_reference_id_foreign` FOREIGN KEY (`category_reference_id`) REFERENCES `category_references` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sharing_practices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `study_modules`
--
ALTER TABLE `study_modules`
  ADD CONSTRAINT `study_modules_category_module_id_foreign` FOREIGN KEY (`category_module_id`) REFERENCES `category_modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `study_references`
--
ALTER TABLE `study_references`
  ADD CONSTRAINT `study_references_category_reference_id_foreign` FOREIGN KEY (`category_reference_id`) REFERENCES `category_references` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
