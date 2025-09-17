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
USE `TT_SaaS_FED_2025_S2`;

-- --------------------------------------------------------------------------------------------
-- Remove any existing Users table
-- --------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `TT_SaaS_FED_2025_S2`.`users`;

-- --------------------------------------------------------------------------------------------
-- Create the table structure for the 'users' table
-- --------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `TT_SaaS_FED_2025_S2`.`users`
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
DROP TABLE IF EXISTS `TT_SaaS_FED_2025_S2`.`categories`;

CREATE TABLE IF NOT EXISTS `TT_SaaS_FED_2025_S2`.`categories`
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

