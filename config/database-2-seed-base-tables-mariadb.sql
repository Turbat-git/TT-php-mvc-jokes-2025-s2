-- ======================================> BEGIN SECTION <=====================================
-- BEFORE COMMENCING:
--
-- - If the instructions in an assessment tell you to use a different database name then
--   replace the xxx_saas_fed_yyyy_sn with the name as required. For example:
--      Assessment DB: xxx_saas_fed_jokes_yyyy_sn
--
-- - Replace all instances of yyyy with the current year
--   For example, 2025
--
-- - Replace all instances of sn with s followed by the semester number
--   For example, s1 for semester 1
--
-- - Replace ALL instances of xxx with your initials
--   For example, AJG for Adrian Gould
--
-- Once this file has been updated and executed using your preferred UI for MariaDB/MySQl,
-- open and complete the same tasks with the database-cities.sql file
--
-- --------------------------------------------------------------------------------------------
--
-- We have split the file into sections each surrounded with a BEGIN SECTION and END SECTION
-- comment line. These sections may be copied and pasted into the SQL interface for the RDBMS
-- and executed to perform the steps.
--
-- Alternatively, copy the whole file and paste into the SQL command interface provided for/by
-- your GUI based RDBMS management software.
--
-- =======================================> END SECTION <======================================


-- --------------------------------------------------------------------------------------------
-- Users TABLE SEEDING
--
-- The Password is Password1 hashed using the PHP password_hash() method.
-- --------------------------------------------------------------------------------------------
INSERT INTO `xxx_saas_fed_yyyy_sn`.`users`
VALUES (10, 'Super User', 'super@example.com',
        '$2y$10$4Ae3n2iQ0MwXMNz0UEmNne2PaNyfYsBFYb97nayHWTDCwpnuPi6f.',
        'Perth', 'WA', 'Australia', '2000-01-01 00:00:01');

INSERT INTO `xxx_saas_fed_yyyy_sn`.`users`
VALUES (20, 'Ad Ministrator', 'admin@example.com',
        '$2y$10$4Ae3n2iQ0MwXMNz0UEmNne2PaNyfYsBFYb97nayHWTDCwpnuPi6f.',
        'Perth', 'WA', 'Australia', '2024-01-01 10:30:01');

INSERT INTO `xxx_saas_fed_yyyy_sn`.`users`
VALUES (50, 'YOUR_NAME', 'GIVEN_NAME@example.com',
        '$2y$10$4Ae3n2iQ0MwXMNz0UEmNne2PaNyfYsBFYb97nayHWTDCwpnuPi6f.',
        'Perth', 'WA', 'Australia', '2024-08-10 16:11:43');

INSERT INTO `xxx_saas_fed_yyyy_sn`.`users`
VALUES (100, 'Jacques d\`Carre', 'jacques@example.com',
        '$2y$10$4Ae3n2iQ0MwXMNz0UEmNne2PaNyfYsBFYb97nayHWTDCwpnuPi6f.',
        'Bunbury', 'WA', 'Australia', '2024-08-15 13:04:21'),

       (101, 'Minah d\`Carre', 'minah@example.com',
        '$2y$10$4Ae3n2iQ0MwXMNz0UEmNne2PaNyfYsBFYb97nayHWTDCwpnuPi6f.',
        'Melbourne', 'VIC', 'Australia', '2024-08-20 13:17:21'),

       (102, 'Crystal Chantelle-Leer', 'crystal@example.com',
        '$2y$10$4Ae3n2iQ0MwXMNz0UEmNne2PaNyfYsBFYb97nayHWTDCwpnuPi6f.',
        'Adelaide', 'SA', 'Australia', '2024-08-20 17:59:13');

-- =======================================> END SECTION <======================================


-- ======================================> BEGIN SECTION <=====================================
-- ADDITIONAL TABLE SEEDING
-- Insert initial data into other tables as required
-- --------------------------------------------------------------------------------------------

-- --------------------------------------------------------------------------------------------
-- Seed Categories Table
-- --------------------------------------------------------------------------------------------

INSERT INTO `xxx_saas_fed_yyyy_sn`.`categories`(`id`, `title`, `created_at`, `user_id`)
VALUES (1, 'unknown', '2000-01-01 00:00:01', 20);

INSERT INTO `xxx_saas_fed_yyyy_sn`.`categories`(`id`, `title`, `created_at`, `user_id`)
VALUES (10, 'dad', '2000-01-01 00:00:01', 20);

INSERT INTO `xxx_saas_fed_yyyy_sn`.`categories`(`id`, `title`, `created_at`, `user_id`)
VALUES (11, 'geek', '2000-01-01 00:00:10', 20),
       (12, 'programmer', '2000-01-01 00:00:10', 20),
       (13, 'web', '2000-01-01 00:00:10', 20);

INSERT INTO `xxx_saas_fed_yyyy_sn`.`categories`(`id`, `title`, `created_at`, `user_id`)
VALUES (14, 'knock-knock', '2000-01-01 00:00:20', 20),
       (15, 'rude', '2000-01-01 00:00:20', 20),
       (16, 'dog', '2000-01-01 00:00:20', 20),
       (17, 'cat', '2000-01-01 00:00:20', 20);

INSERT INTO `xxx_saas_fed_yyyy_sn`.`categories`(`id`, `title`, `created_at`, `user_id`)
VALUES (18, 'halloween', '2000-01-01 00:00:30', 20),
       (19, 'animal', '2000-01-01 00:00:30', 20);

-- ===================================> END SEEDING SECTION <==================================


