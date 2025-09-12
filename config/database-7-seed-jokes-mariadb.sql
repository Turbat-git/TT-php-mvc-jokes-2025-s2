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


INSERT INTO `xxx_saas_fed_yyyy_sn`.`jokes`(`title`, `content`, `category_id`) VALUES ("Charging Rhino", "
How do you keep a Rhino from charging?

Take away its credit card.

", 19), ("Actors", "
How many actors does it take to change a light bulb?

Only one-they don't like to share the spotlight.

", 20), ("Aerobic Instructors", "
How many aerobics instructors does it take to change a lightbulb ?

Five.  
Four to do it in perfect synchrony and one to stand there going, \"To the left, and to the left, and to the left, and to the left, and take it out, and put it down, and pick it up, and put it in, and to the right, and to the right, and to the right, and to the right...\"", 20), ("Mechanics", "
How many auto mechanics does it take to change a light bulb?

Six - One to force it with a hammer and five to go out for more bulbs.

", 20), ("Computer", "How do you praise a computer?

Say \"Data Boy\"!

", 11), ("Law Professor", "
How many law professors does it take to change a lightbulb?

Hell, you need 250 just to lobby for the research grant.

", 20), ("Definition of Diplomacy", "
**Diplomacy:** The ability to tell a person to go to hell in such a way that they look forward to the trip.

", 1), ("Lone Bones", "
Why didn't the skeleton go to the dance?

Because it had no body to go with.

", 1), ("All Things", "All things are possible - except skiing through a revolving door.

", 21), ("Cow", "
Knock, Knock

Who's there?

Cows go.

Cows go who?

No, silly! Cows go moo!

", 14), ("WOWOLFOL", "
What is represented by `WOWOLFOL`?

Wolf in sheep's clothing (wool)!

", 19), ("Great Plains", "
_Teacher:_ John, where are the Great Plains?

_John:_ At the airport.

", 10), ("Yum #1", "
What do you call a dog in the sun?

A Hot Dog!

", 19), ("It aint heavy...", "Q. Why do people wear shamrocks on St. Patrick's day?

A. Regular Rocks are too heavy!

", 1), ("Lightbulbs and Country Singers", "
How many country singers does it take to screw in a light bulb?

1 to screw it in, and 3 to write a song about it.

", 20), ("Snake and a Kangaroo", "
What do you get when you cross a snake and a kangaroo?

A jump rope

", 19), ("The Psychologist Handyman", "
How many psychologists does it take to change a light bulb?

Only one, but the bulb has got to WANT to change.

", 20), ("Surrealist Lightbulbs", "
How many surrealists does it take to change a light bulb?

Fish!

", 20), ("Actors in the Spot-Lightbulb", "
How many actors does it take to change a light bulb?

Only one-they don't like to share the spotlight.

", 20), ("Aerobic Instructors", "
How many aerobics instructors does it take to change a lightbulb ?

Five. Four to do it in perfect synchrony and one to stand there going \"To the left, and to the left, and to the left, and to the left, and take it out, and put it down, and pick it up, and put it in, and to the right, and to the right, and to the right, and to the right...\"", 20), ("Mechanics", "
How many auto mechanics does it take to change a light bulb?

Six - One to force it with a hammer and five to go out for more bulbs.

", 20), ("FBI", "
How many FBI agents does it take to change a lightbulb?

Shut up! We'll be asking the questions here.

", 20), ("Philosophers", "
How many philosophers does it take to change a lightbulb?

3\. One to change it and the other two to argue whether the lightbulb really exists.

", 20), ("Marketing the Lightbulb", "
How many telemarketers does it take to change a light bulb?

Only one, but he has to do it while you're eating dinner.

", 20), ("Lawyer vs Dry Cleaner", "
What's the difference between a dry cleaner and a lawyer?

The cleaner pays if he loses your suit.  
A lawyer can lose your suit and still take you to the cleaners.

", 22), ("Managers", "
How many managers does it take to change a light bulb?

We've formed a task force to study the problem of why light bulbs burn out and to figure out what, exactly, we as supervisors can do to make the bulbs work smarter, not harder.", 20), ("Department of Shipping Lightbulbs", "
How many shipping department personnel does it take to change a light bulb?

We can change the bulb in seven to ten working days,  
but if you call before 2 p.m. and pay an extra $15, we can get it changed overnight.

", 20), ("Information Service Lightbulbs", "
How many management information services guys does it take to change a light bulb?

MIS has received your request concerning your hardware problem  
and has assigned you request number 39712.

Please use this number for any future reference to the light bulb issue.

", 20), ("Sick Bird", "
What is the definition of a sick bird?

Illegal

", 19), ("Kangaroo and a Sheep", "
What do you get when you cross a kangaroo and a sheep?

A sweater with pockets

", 19);    
    
    
-- ===================================> END SEEDING SECTION <==================================


