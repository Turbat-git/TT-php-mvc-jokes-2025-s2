-- ======================================> BEGIN SECTION <=====================================
-- BEFORE COMMENCING:
--
-- - Make sure that the steps in the file database-RDBMS.sql are followed BEFORE this file is
--   updated and then executed.
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
--   For example, ajg for Adrian Gould
--
-- --------------------------------------------------------------------------------------------

DROP TABLE IF EXISTS  `xxx_saas_fed_yyyy_sn`.`cities`;

CREATE TABLE IF NOT EXISTS `xxx_saas_fed_yyyy_sn`.`cities`(
    `id`           INT          NOT NULL,
    `name`         VARCHAR(255) NOT NULL,
    `state_id`     INT          NOT NULL,
    `state_code`   VARCHAR(6)   NOT NULL,
    `state_name`   VARCHAR(128) NOT NULL,
    `country_id`   INT          NOT NULL,
    `country_code` VARCHAR(6)   NOT NULL,
    `country_name` VARCHAR(128) NOT NULL,
    `latitude`     FLOAT        NOT NULL,
    `longitude`    FLOAT        NOT NULL
) ENGINE = InnoDB;

ALTER TABLE `xxx_saas_fed_yyyy_sn`.`cities`
    ADD `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `longitude`,
    ADD `updated_at` DATETIME NULL     DEFAULT NULL AFTER `created_at`;

