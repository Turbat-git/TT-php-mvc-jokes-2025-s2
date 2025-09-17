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
DROP DATABASE IF EXISTS `TT_SaaS_FED_2025_S2`;
DROP USER IF EXISTS 'TT_SaaS_FED_2025_S2'@'localhost';
DROP USER IF EXISTS 'TT_SaaS_FED_2025_S2'@'127.0.0.1';
-- =======================================> END SECTION <======================================


-- ======================================> BEGIN SECTION <=====================================
-- USER & DATABASE CREATION
--
-- In this section we (re)create the database and user(s) associated with the new database.
-- We assign the relevant privileges to the user to access the database and to be able to
-- authenticate against the RDBMS.
-- --------------------------------------------------------------------------------------------

-- --------------------------------------------------------------------------------------------
-- Create Database named 'TT_SaaS_FED_2025_S2'
-- --------------------------------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `TT_SaaS_FED_2025_S2`;

-- --------------------------------------------------------------------------------------------
-- Create User & Grant Permissions
--
-- We create users that are able to access the database via localhost and 127.0.0.1 just in
-- case IPv6 is detected. Some RDBMS systems may not be 100% compatible with IPv6 IP addresses.
-- --------------------------------------------------------------------------------------------
CREATE USER 'TT_SaaS_FED_2025_S2'@'localhost'
    IDENTIFIED WITH mysql_native_password
        USING PASSWORD('Password1234');

CREATE USER 'TT_SaaS_FED_2025_S2'@'127.0.0.1'
    IDENTIFIED WITH mysql_native_password
        USING PASSWORD('Password1234');

GRANT USAGE ON *.*
    TO 'TT_SaaS_FED_2025_S2'@'localhost';

GRANT USAGE ON *.*
    TO 'TT_SaaS_FED_2025_S2'@'127.0.0.1';

GRANT ALL PRIVILEGES
    ON `TT_SaaS_FED_2025_S2`.*
    TO 'TT_SaaS_FED_2025_S2'@'localhost';

GRANT ALL PRIVILEGES
    ON `TT_SaaS_FED_2025_S2`.*
    TO 'TT_SaaS_FED_2025_S2'@'127.0.0.1';

-- --------------------------------------------------------------------------------------------
-- Apply the user's privileges.
-- --------------------------------------------------------------------------------------------
FLUSH PRIVILEGES;
-- =======================================> END SECTION <======================================

