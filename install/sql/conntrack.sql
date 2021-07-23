-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2008 at 11:57 AM
-- Server version: 5.0.18
-- PHP Version: 5.1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `conntrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabidx`
--

DROP TABLE IF EXISTS `tabidx`;
CREATE TABLE IF NOT EXISTS `tabidx` (
  `date` date NOT NULL,
  PRIMARY KEY  (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
