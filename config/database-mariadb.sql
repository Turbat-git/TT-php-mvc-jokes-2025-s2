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


-- ======================================> BEGIN SECTION <=====================================
-- USER & DATABASE REMOVAL
--
-- In this section we perform a clean-up of any existing database and user(s) associated with
-- this database.
--
-- It is important to understand that this DESTROYS all data associated with the database and
-- the database user(s) and CANNOT be recovered.
-- --------------------------------------------------------------------------------------------

-- --------------------------------------------------------------------------------------------
-- Clean up existing database and user(s)
-- --------------------------------------------------------------------------------------------
DROP DATABASE IF EXISTS `xxx_saas_fed_yyyy_sn`;
DROP USER IF EXISTS 'xxx_saas_fed_yyyy_sn'@'localhost';
DROP USER IF EXISTS 'xxx_saas_fed_yyyy_sn'@'127.0.0.1';
-- =======================================> END SECTION <======================================


-- ======================================> BEGIN SECTION <=====================================
-- USER & DATABASE CREATION
--
-- In this section we (re)create the database and user(s) associated with the new database.
-- We assign the relevant privileges to the user to access the database and to be able to
-- authenticate against the RDBMS.
-- --------------------------------------------------------------------------------------------

-- --------------------------------------------------------------------------------------------
-- Create Database named 'xxx_saas_fed_yyyy_sn'
-- --------------------------------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `xxx_saas_fed_yyyy_sn`;

-- --------------------------------------------------------------------------------------------
-- Create User & Grant Permissions
--
-- We create users that are able to access the database via localhost and 127.0.0.1 just in
-- case IPv6 is detected. Some RDBMS systems may not be 100% compatible with IPv6 IP addresses.
-- --------------------------------------------------------------------------------------------
CREATE USER 'xxx_saas_fed_yyyy_sn'@'localhost'
    IDENTIFIED WITH mysql_native_password
        USING PASSWORD('Password1234');

CREATE USER 'xxx_saas_fed_yyyy_sn'@'127.0.0.1'
    IDENTIFIED WITH mysql_native_password
        USING PASSWORD('Password1234');

GRANT USAGE ON *.*
    TO 'xxx_saas_fed_yyyy_sn'@'localhost';

GRANT USAGE ON *.*
    TO 'xxx_saas_fed_yyyy_sn'@'127.0.0.1';

GRANT ALL PRIVILEGES
    ON `xxx_saas_fed_yyyy_sn`.*
    TO 'xxx_saas_fed_yyyy_sn'@'localhost';

GRANT ALL PRIVILEGES
    ON `xxx_saas_fed_yyyy_sn`.*
    TO 'xxx_saas_fed_yyyy_sn'@'127.0.0.1';

-- --------------------------------------------------------------------------------------------
-- Apply the user's privileges.
-- --------------------------------------------------------------------------------------------
FLUSH PRIVILEGES;
-- =======================================> END SECTION <======================================


-- ======================================> BEGIN SECTION <=====================================
-- CREATE USER TABLE(S)
--
-- This section creates the 'users' table, one of the most commonly created database table
-- structures. The basic user table will vary depending on the developer's choices.
-- For example, the user's address information may be moved into a second table that contains
-- data associated with their profile.
-- --------------------------------------------------------------------------------------------

-- --------------------------------------------------------------------------------------------
-- Tell MySQL to use the  `xxx_saas_fed_yyyy_sn` database for commands.
-- --------------------------------------------------------------------------------------------
USE `xxx_saas_fed_yyyy_sn`;

-- --------------------------------------------------------------------------------------------
-- Remove any existing Users table
-- --------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `xxx_saas_fed_yyyy_sn`.`users`;

-- --------------------------------------------------------------------------------------------
-- Create the table structure for the 'users' table
-- --------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `xxx_saas_fed_yyyy_sn`.`users`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `name`       varchar(255)      DEFAULT NULL,
    `email`      varchar(255) NOT NULL,
    `password`   varchar(255) NOT NULL,
    `city`       varchar(45)       DEFAULT NULL,
    `state`      varchar(45)       DEFAULT NULL,
    `country`    varchar(45)       DEFAULT 'Australia',
    `created_at` timestamp    NULL DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;
-- =======================================> END SECTION <======================================


-- =========================> BEGIN CREATE ADDITIONAL TABLES SECTION <=========================
-- CREATE ADDITIONAL TABLES
--
-- This section creates additional table(s).
--
-- In the case of this example, it creates a 'categories' table.
--
-- The `database-cities.sql` file creates a cities table and adds ~4,000 Australian
-- cities to the database.
--
-- --------------------------------------------------------------------------------------------

-- --------------------------------------------------------------------------------------------
-- Remove the existing Table (Categories), and create the new Table structure (Categories)
--
-- Note that the Database name is used as a prefix to the Table name in the form:
--     `DATABASE_NAME`.`TABLE_NAME`
--
-- The use of BACK-TICKS is compulsory
-- --------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `xxx_saas_fed_yyyy_sn`.`categories`;

CREATE TABLE IF NOT EXISTS `xxx_saas_fed_yyyy_sn`.`categories`
(
    `id`          bigint unsigned NOT NULL AUTO_INCREMENT,
    `title`       varchar(255)    NOT NULL,
    `description` text,
    `user_id`     bigint unsigned NOT NULL DEFAULT 20,
    `created_at`  timestamp       NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  timestamp       NULL,

    UNIQUE INDEX `title` (`title`),

    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  AUTO_INCREMENT = 100
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;
-- ==========================> END ADDITIONAL TABLE CREATION SECTION <=========================


-- ==================================> BEGIN SEEDING SECTION <=================================
-- SEEDING THE DATABASE
-- Seeders are used to add data to initialise the database tables
-- --------------------------------------------------------------------------------------------


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


