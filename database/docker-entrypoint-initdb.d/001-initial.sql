CREATE DATABASE IF NOT EXISTS My_Student;

-- USE My_Student;

-- CREATE TABLE IF NOT EXISTS Person (
--   `ID` VARCHAR(36) PRIMARY KEY,
--   `Number` INT(9) UNIQUE NOT NULL,
--   `Name` VARCHAR(255),
--   `Created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
--   `Modified_at` DATETIME DEFAULT CURRENT_TIMESTAMP
-- );

-- CREATE TABLE IF NOT EXISTS Class (
--   `ID` VARCHAR(36) PRIMARY KEY,
--   `Name` VARCHAR(255) NOT NULL,
--   `Group` VARCHAR(255) DEFAULT 'Sem grupo',
--   `Previous_ID` VARCHAR(36) UNIQUE,
--   `Ects` INT(3),
--   `Created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,

--   UNIQUE `index_name_group` (`Name`, `Group`),
--   FOREIGN KEY(`Previous_ID`) REFERENCES Class(`ID`)
-- );

-- CREATE TABLE IF NOT EXISTS Degree (
--   `ID` VARCHAR(36) PRIMARY KEY,
--   `Person_ID` VARCHAR(36),
--   `Class_ID` VARCHAR(36),
--   `Value` DECIMAL(4, 2),
--   `Created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
--   FOREIGN KEY(`Person_ID`) REFERENCES Person(`ID`),
--   FOREIGN KEY(`Class_ID`) REFERENCES Class(`ID`)
-- );
