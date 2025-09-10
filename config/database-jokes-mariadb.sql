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
-- Tell MySQL to use the  `XXX_SaaS_FED_YYYY_SN` database for commands.
-- --------------------------------------------------------------------------------------------
USE `XXX_SaaS_FED_YYYY_SN`;

-- --------------------------------------------------------------------------------------------
-- Remove any existing Jokes table
-- --------------------------------------------------------------------------------------------
DROP TABLE IF EXISTS `XXX_SaaS_FED_YYYY_SN`.`jokes`;

-- --------------------------------------------------------------------------------------------
-- Create the table structure for the 'jokes' table
-- --------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `XXX_SaaS_FED_YYYY_SN`.`jokes`
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


INSERT INTO `XXX_SaaS_FED_YYYY_SN`.`jokes`(`title`, `content`, `category_id`)
VALUES ("Charging Rhino",
        "<p>How do you keep a Rhino from charging?</p><p></p><p>Take away its credit card.</p>",
        19),
       ("Actors",
        "<p>How many actors does it take to change a light bulb? </p><p> </p><p>Only one-they don't like to share the spotlight.</p>",
        20),
       ("Aerobic Instructors",
        "<p>How many aerobics instructors does it take to change a lightbulb ? </p><p>Five.<br/> Four to do it in perfect synchrony and one to stand there going, \"To the left, and to the left, and to the left, and to the left, and take it out, and put it down, and pick it up, and put it in, and to the right, and to the right, and to the right, and to the right...\"",
        20),
       ("Mechanics",
        "<p>How many auto mechanics does it take to change a light bulb? </p><p></p><p>Six - One to force it with a hammer and five to go out for more bulbs.</p>",
        20),
       ("Computer",
        "<p>How do you praise a computer?</p><p>Say \"Data Boy\"!</p>",
        11),
       ("Law Professor",
        "<p>How many law professors does it take to change a lightbulb?</p><p></p><p>Hell, you need 250 just to lobby for the research grant.</p>",
        20),
       ("Definition of Diplomacy",
        "<p><strong>Diplomacy:</strong> The ability to tell a person to go to hell in such a way that they look forward to the trip.</p>",
        1),
       ("Lone Bones",
        "<p>Why didn't the skeleton go to the dance?</p><p></p><p>Because it had no body to go with.</p>",
        1),
       ("All Things",
        "All things are possible - except skiing through a revolving door.</p>",
        21),
       ("Cow",
        "<p>Knock, Knock </p><p></p><p>Who's there? </p><p></p><p>Cows go. </p><p></p><p>Cows go who? </p><p></p><p>No, silly! Cows go moo!</p>",
        14),
       ("WOWOLFOL",
        "<p>What is represented by <code>WOWOLFOL</code>?</p><p></p><p>Wolf in sheep's clothing (wool)!</p>",
        19),
       ("Great Plains",
        "<p><em>Teacher:</em> John, where are the Great Plains?</p><p></p><p><em>John:</em> At the airport.</p>",
        10),
       ("Yum #1",
        "<p>What do you call a dog in the sun?</p><p>A Hot Dog!</p>",
        19),
       ("It aint heavy...",
        "Q. Why do people wear shamrocks on St. Patrick's day?</p><p></p><p>A. Regular Rocks are too heavy!</p>",
        1),
       ("Lightbulbs and Country Singers",
        "<p>How many country singers does it take to screw in a light bulb?</p><p></p><p>1 to screw it in, and 3 to write a song about it.</p>",
        20),
       ("Snake and a Kangaroo",
        "<p>What do you get when you cross a snake and a kangaroo?</p><p></p><p> A jump rope</p>",
        19),
       ("The Psychologist Handyman",
        "<p>How many psychologists does it take to change a light bulb?</p><p></p><p>Only one, but the bulb has got to WANT to change.</p>",
        20),
       ("Surrealist Lightbulbs",
        "<p>How many surrealists does it take to change a light bulb?</p><p></p><p>Fish!</p>",
        20),
       ("Actors in the Spot-Lightbulb",
        "<p>How many actors does it take to change a light bulb? </p><p> </p><p>Only one-they don't like to share the spotlight.</p>",
        20),
       ("Aerobic Instructors",
        "<p>How many aerobics instructors does it take to change a lightbulb ? </p><p>Five. Four to do it in perfect synchrony and one to stand there going \"To the left, and to the left, and to the left, and to the left, and take it out, and put it down, and pick it up, and put it in, and to the right, and to the right, and to the right, and to the right...\"",
        20),
       ("Mechanics",
        "<p>How many auto mechanics does it take to change a light bulb? </p><p></p><p>Six - One to force it with a hammer and five to go out for more bulbs.</p>",
        20),
       ("FBI",
        "<p>How many FBI agents does it take to change a lightbulb?</p><p>Shut up! We'll be asking the questions here.</p>",
        20),
       ("Philosophers",
        "<p>How many philosophers does it take to change a lightbulb?</p><p></p><p>3. One to change it and the other two to argue whether the lightbulb really exists.</p>",
        20),
       ("Marketing the Lightbulb",
        "<p>How many telemarketers does it take to change a light bulb?</p><p></p><p>Only one, but he has to do it while you're eating dinner.</p>",
        20),
       ("Lawyer vs Dry Cleaner",
        "<p>What's the difference between a dry cleaner and a lawyer?</p><p></p><p>The cleaner pays if he loses your suit.<br/>  A lawyer can lose your suit and still take you to the cleaners.</p>",
        22),
       ("Managers",
        "<p>How many managers does it take to change a light bulb?</p><p></p><p>We've formed a task force to study the problem of why light bulbs burn out and to figure out what, exactly, we as supervisors can do to make the bulbs work smarter, not harder.",
        20),
       ("Department of Shipping Lightbulbs",
        "<p>How many shipping department personnel does it take to change a light bulb?</p><p></p><p>We can change the bulb in seven to ten working days,<br/> but if you call before 2 p.m. and pay an extra $15, we can get it changed overnight.</p>",
        20),
       ("Information Service Lightbulbs",
        "<p>How many management information services guys does it take to change a light bulb?</p><p></p><p>MIS has received your request concerning your hardware problem<br/> and has assigned you request number 39712.</p><p>Please use this number for any future reference to the light bulb issue.</p>",
        20),
       ("Sick Bird",
        "<p>What is the definition of a sick bird?</p><p></p><p> Illegal</p>",
        19),
       ("Kangaroo and a Sheep",
        "<p>What do you get when you cross a kangaroo and a sheep?</p><p></p><p> A sweater with pockets</p>",
        19);

-- ===================================> END SEEDING SECTION <==================================


