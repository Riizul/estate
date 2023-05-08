INSERT INTO `properties` (`id`, `typeId`, `categoryId`, `stateId`, `name`, `location`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 'Casa', 'Danao', 1.00, 'the quick brown fox jump over the lazy dog', '2022-08-05 04:35:56', '2022-08-05 04:35:56'),
(2, 0, 2, 0, 'Jpark', 'Mandaue', 2.00, 'nice place', '2022-08-05 04:37:17', '2022-08-05 04:37:17'),
(3, 0, 3, 0, 'Grand', 'Tamiya', 3.00, 'herwerwerwer', '2022-08-05 04:40:30', '2022-08-05 04:40:30'),
(4, 0, 2, 0, '1', '1', 1.00, '1', '2022-08-05 04:41:06', '2022-08-05 04:41:06');

-- --------------------------------------------------------

INSERT INTO `property_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'House & Lot', NULL, NULL),
(2, 'Condominium', NULL, NULL),
(3, 'For Rent', NULL, NULL);

-- --------------------------------------------------------
 
INSERT INTO `property_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Preselling', NULL, NULL),
(2, 'RFO', NULL, NULL);

-- --------------------------------------------------------
 
INSERT INTO `property_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Single Detached', NULL, NULL),
(2, 'Town House', NULL, NULL);

-- --------------------------------------------------------
 
INSERT INTO `content_type_builders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'header', NULL, NULL),
(2, 'paragraph', NULL, NULL),
(2, 'enumaration', NULL, NULL),
(2, 'media', NULL, NULL);

-- --------------------------------------------------------
 
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin@demo.com', 'admin', NULL, '$2y$10$z/a80b11BYXejy4AReTXe.S6SODg6XzSSTcYX6epUeQpGrkwnKgKu', NULL, '2022-07-30 01:08:54', '2022-07-30 01:08:54');

-- --------------------------------------------------------
 
