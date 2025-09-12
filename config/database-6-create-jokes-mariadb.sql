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


-- --------------------------------------------------------------------------------------------
-- Tell MySQL to use the  `xxx_saas_fed_yyyy_sn` database for commands.
-- --------------------------------------------------------------------------------------------
USE `xxx_saas_fed_yyyy_sn`;

-- --------------------------------------------------------------------------------------------
-- Remove any existing Jokes table
-- --------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `xxx_saas_fed_yyyy_sn`.`jokes`;

-- --------------------------------------------------------------------------------------------
-- Create the table structure for the 'jokes' table
-- --------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `xxx_saas_fed_yyyy_sn`.`jokes`
(
    `id`          int          NOT NULL AUTO_INCREMENT,
    `title`       varchar(128) NOT NULL,
    `content`     text 		   NULL,
    `category_id` varchar(255) NOT NULL,
    `created_at`  timestamp    NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  timestamp    NULL DEFAULT NULL ON UPDATE now(),
    PRIMARY KEY (`id`)

) ENGINE = InnoDB
  AUTO_INCREMENT = 100
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci;
-- =======================================> END SECTION <======================================

