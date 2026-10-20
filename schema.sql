CREATE DATABASE IF NOT EXISTS `doubleclick`;
USE `doubleclick`;

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `login` VARCHAR(32) NOT NULL UNIQUE,
  `password` VARCHAR(64) NOT NULL,
  `suo` INT NOT NULL DEFAULT 0,
  `circles` INT NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS `suoLeaderboardNormal` (
  `username` VARCHAR(32) NOT NULL,
  `score` INT NOT NULL DEFAULT 0,
  `top` INT NOT NULL,
  PRIMARY KEY (`username`),
  KEY (`top`)
);

CREATE TABLE IF NOT EXISTS `suoLeaderboardHarder` (
  `username` VARCHAR(32) NOT NULL,
  `score` INT NOT NULL DEFAULT 0,
  `top` INT NOT NULL,
  PRIMARY KEY (`username`),
  KEY (`top`)
);

CREATE TABLE IF NOT EXISTS `suoLeaderboardSatanic` (
  `username` VARCHAR(32) NOT NULL,
  `score` INT NOT NULL DEFAULT 0,
  `top` INT NOT NULL,
  PRIMARY KEY (`username`),
  KEY (`top`)
);
