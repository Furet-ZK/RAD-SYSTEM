-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2021 at 03:04 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `radius`
--

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE IF NOT EXISTS `ip` (
  `srvid` int(11) NOT NULL,
  `staticip` varchar(15) CHARACTER SET utf8 NOT NULL,
  UNIQUE KEY `srvid` (`srvid`),
  UNIQUE KEY `staticip` (`staticip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `name` varchar(64) NOT NULL,
  `log` varchar(512) CHARACTER SET utf8 NOT NULL,
  `time` datetime DEFAULT NULL,
  `price` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nas`
--

CREATE TABLE IF NOT EXISTS `nas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nasname` varchar(128) NOT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int(5) DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client',
  `starospassword` varchar(32) NOT NULL,
  `ciscobwmode` tinyint(1) NOT NULL,
  `apiusername` varchar(32) NOT NULL,
  `apipassword` varchar(32) NOT NULL,
  `apiver` tinyint(1) NOT NULL,
  `coamode` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nasname` (`nasname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nas`
--

INSERT INTO `nas` (`id`, `nasname`, `shortname`, `type`, `ports`, `secret`, `community`, `description`, `starospassword`, `ciscobwmode`, `apiusername`, `apipassword`, `apiver`, `coamode`) VALUES
(6, '15.15.15.1', 'Mikrotik', '0', NULL, '123', NULL, '', '', 0, '123', '123', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `radacct`
--

CREATE TABLE IF NOT EXISTS `radacct` (
  `radacctid` bigint(21) NOT NULL AUTO_INCREMENT,
  `acctsessionid` varchar(64) NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `realm` varchar(64) DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasportid` varchar(15) DEFAULT NULL,
  `nasporttype` varchar(32) DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int(12) DEFAULT NULL,
  `acctauthentic` varchar(32) DEFAULT NULL,
  `connectinfo_start` varchar(50) DEFAULT NULL,
  `connectinfo_stop` varchar(50) DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) NOT NULL DEFAULT '',
  `servicetype` varchar(32) DEFAULT NULL,
  `framedprotocol` varchar(32) DEFAULT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  `acctstartdelay` int(12) DEFAULT NULL,
  `acctstopdelay` int(12) DEFAULT NULL,
  `xascendsessionsvrkey` varchar(10) DEFAULT NULL,
  `_accttime` datetime DEFAULT NULL,
  `_srvid` int(11) DEFAULT NULL,
  `_dailynextsrvactive` tinyint(1) DEFAULT NULL,
  `_apid` int(11) DEFAULT NULL,
  PRIMARY KEY (`radacctid`),
  KEY `username` (`username`),
  KEY `framedipaddress` (`framedipaddress`),
  KEY `acctsessionid` (`acctsessionid`),
  KEY `acctsessiontime` (`acctsessiontime`),
  KEY `acctuniqueid` (`acctuniqueid`),
  KEY `acctstarttime` (`acctstarttime`),
  KEY `acctstoptime` (`acctstoptime`),
  KEY `nasipaddress` (`nasipaddress`),
  KEY `_AcctTime` (`_accttime`),
  KEY `callingstationid` (`callingstationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=223263 ;

-- --------------------------------------------------------

--
-- Table structure for table `radcheck`
--

CREATE TABLE IF NOT EXISTS `radcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6743 ;

--
-- Dumping data for table `radcheck`
--

INSERT INTO `radcheck` (`id`, `username`, `attribute`, `op`, `value`) VALUES
(4276, 'admin', 'Cleartext-Password', ':=', 'admin'),
(4277, 'admin', 'Simultaneous-Use', ':=', '1');

-- --------------------------------------------------------

--
-- Table structure for table `radgroupcheck`
--

CREATE TABLE IF NOT EXISTS `radgroupcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radgroupreply`
--

CREATE TABLE IF NOT EXISTS `radgroupreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radippool`
--

CREATE TABLE IF NOT EXISTS `radippool` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pool_name` varchar(30) NOT NULL,
  `framedipaddress` varchar(15) NOT NULL,
  `nasipaddress` varchar(15) NOT NULL,
  `calledstationid` varchar(30) NOT NULL,
  `callingstationid` varchar(30) NOT NULL,
  `expiry_time` datetime DEFAULT NULL,
  `username` varchar(64) NOT NULL,
  `pool_key` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radpostauth`
--

CREATE TABLE IF NOT EXISTS `radpostauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nasipaddress` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `authdate` (`authdate`),
  KEY `nasipaddress` (`nasipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radreply`
--

CREATE TABLE IF NOT EXISTS `radreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `radusergroup`
--

CREATE TABLE IF NOT EXISTS `radusergroup` (
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '1',
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rm_allowedmanagers`
--

CREATE TABLE IF NOT EXISTS `rm_allowedmanagers` (
  `srvid` int(11) NOT NULL,
  `managername` varchar(64) NOT NULL,
  KEY `srvid` (`srvid`),
  KEY `managername` (`managername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rm_ap`
--

CREATE TABLE IF NOT EXISTS `rm_ap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `accessmode` tinyint(1) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `community` varchar(32) NOT NULL,
  `apiusername` varchar(32) NOT NULL,
  `apipassword` varchar(32) NOT NULL,
  `apiver` tinyint(1) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `rm_cards`
--

CREATE TABLE IF NOT EXISTS `rm_cards` (
  `id` bigint(20) NOT NULL,
  `cardnum` varchar(16) NOT NULL,
  `password` varchar(8) NOT NULL,
  `value` decimal(22,2) NOT NULL,
  `expiration` date NOT NULL,
  `series` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `owner` varchar(64) NOT NULL,
  `used` datetime NOT NULL,
  `cardtype` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `downlimit` bigint(20) NOT NULL,
  `uplimit` bigint(20) NOT NULL,
  `comblimit` bigint(20) NOT NULL,
  `uptimelimit` bigint(20) NOT NULL,
  `srvid` int(11) NOT NULL,
  `transid` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `expiretime` bigint(20) NOT NULL,
  `timebaseexp` tinyint(1) NOT NULL,
  `timebaseonline` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cardnum` (`cardnum`),
  KEY `series` (`series`),
  KEY `used` (`used`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rm_cmts`
--

CREATE TABLE IF NOT EXISTS `rm_cmts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `name` varchar(32) NOT NULL,
  `community` varchar(32) NOT NULL,
  `descr` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rm_ias`
--

CREATE TABLE IF NOT EXISTS `rm_ias` (
  `iasid` int(11) NOT NULL AUTO_INCREMENT,
  `iasname` varchar(50) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `downlimit` bigint(20) NOT NULL,
  `uplimit` bigint(20) NOT NULL,
  `comblimit` bigint(20) NOT NULL,
  `uptimelimit` bigint(20) NOT NULL,
  `expiretime` bigint(20) NOT NULL,
  `timebaseonline` tinyint(1) NOT NULL,
  `timebaseexp` tinyint(1) NOT NULL,
  `srvid` int(11) NOT NULL,
  `enableias` tinyint(1) NOT NULL,
  `expiremode` tinyint(1) NOT NULL,
  `expiration` date NOT NULL,
  `simuse` int(11) NOT NULL,
  PRIMARY KEY (`iasid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rm_ias`
--

INSERT INTO `rm_ias` (`iasid`, `iasname`, `price`, `downlimit`, `uplimit`, `comblimit`, `uptimelimit`, `expiretime`, `timebaseonline`, `timebaseexp`, `srvid`, `enableias`, `expiremode`, `expiration`, `simuse`) VALUES
(2, '500 MB', 10.00, 500, 0, 0, 0, 0, 0, 0, 0, 1, 0, '2020-12-31', 1),
(3, '10 hours online time', 5.00, 0, 0, 0, 10, 0, 1, 0, 0, 1, 0, '2010-12-31', 1),
(4, '2 days', 5.00, 0, 0, 0, 0, 2, 0, 2, 0, 1, 1, '0000-00-00', 1),
(10, '15 minutes online time', 1.00, 0, 0, 0, 15, 0, 0, 0, 0, 1, 0, '2020-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rm_managers`
--

CREATE TABLE IF NOT EXISTS `rm_managers` (
  `managername` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `company` varchar(50) NOT NULL,
  `vatid` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `balance` decimal(20,0) NOT NULL,
  `BNM` tinyint(1) NOT NULL,
  `perm_listusers` tinyint(1) NOT NULL,
  `perm_createusers` tinyint(1) NOT NULL,
  `perm_editusers` tinyint(1) NOT NULL,
  `perm_edituserspriv` tinyint(1) NOT NULL,
  `perm_deleteusers` tinyint(1) NOT NULL,
  `perm_listmanagers` tinyint(1) NOT NULL,
  `perm_createmanagers` tinyint(1) NOT NULL,
  `perm_editmanagers` tinyint(1) NOT NULL,
  `perm_deletemanagers` tinyint(1) NOT NULL,
  `perm_listservices` tinyint(1) NOT NULL,
  `perm_createservices` tinyint(1) NOT NULL,
  `perm_editservices` tinyint(1) NOT NULL,
  `perm_deleteservices` tinyint(1) NOT NULL,
  `perm_listonlineusers` tinyint(1) NOT NULL,
  `perm_listinvoices` tinyint(1) NOT NULL,
  `perm_trafficreport` tinyint(1) NOT NULL,
  `perm_addcredits` tinyint(1) NOT NULL,
  `perm_negbalance` tinyint(1) NOT NULL,
  `perm_listallinvoices` tinyint(1) NOT NULL,
  `perm_showinvtotals` tinyint(1) NOT NULL,
  `perm_logout` tinyint(1) NOT NULL,
  `perm_cardsys` tinyint(1) NOT NULL,
  `perm_editinvoice` tinyint(1) NOT NULL,
  `perm_allusers` tinyint(1) NOT NULL,
  `perm_allowdiscount` tinyint(1) NOT NULL,
  `perm_enwriteoff` tinyint(1) NOT NULL,
  `perm_accessap` tinyint(1) NOT NULL,
  `perm_cts` tinyint(1) NOT NULL,
  `perm_email` tinyint(1) NOT NULL,
  `perm_sms` tinyint(1) NOT NULL,
  `enablemanager` tinyint(1) NOT NULL,
  `lang` varchar(30) NOT NULL,
  `testbalance` int(11) DEFAULT '0',
  `testcurrent` int(11) DEFAULT '0',
  `pp` varchar(32) NOT NULL,
  PRIMARY KEY (`managername`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_managers`
--

INSERT INTO `rm_managers` (`managername`, `password`, `firstname`, `lastname`, `phone`, `mobile`, `address`, `city`, `zip`, `country`, `state`, `comment`, `company`, `vatid`, `email`, `balance`, `BNM`, `perm_listusers`, `perm_createusers`, `perm_editusers`, `perm_edituserspriv`, `perm_deleteusers`, `perm_listmanagers`, `perm_createmanagers`, `perm_editmanagers`, `perm_deletemanagers`, `perm_listservices`, `perm_createservices`, `perm_editservices`, `perm_deleteservices`, `perm_listonlineusers`, `perm_listinvoices`, `perm_trafficreport`, `perm_addcredits`, `perm_negbalance`, `perm_listallinvoices`, `perm_showinvtotals`, `perm_logout`, `perm_cardsys`, `perm_editinvoice`, `perm_allusers`, `perm_allowdiscount`, `perm_enwriteoff`, `perm_accessap`, `perm_cts`, `perm_email`, `perm_sms`, `enablemanager`, `lang`, `testbalance`, `testcurrent`, `pp`) VALUES
('admin', 'b59c67bf196a4758191e42f76670ceba', 'Default', 'Manager', '', '', '', '', '', '', '', 'Superuser', '', '', '', -41088778, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'English', 1, -149175181, '');

-- --------------------------------------------------------

--
-- Table structure for table `rm_services`
--

CREATE TABLE IF NOT EXISTS `rm_services` (
  `srvid` int(11) NOT NULL,
  `srvname` varchar(50) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `downrate` int(11) NOT NULL,
  `uprate` int(11) NOT NULL,
  `limitdl` tinyint(1) NOT NULL,
  `limitul` tinyint(1) NOT NULL,
  `limitcomb` tinyint(1) NOT NULL,
  `limitexpiration` tinyint(1) NOT NULL,
  `limituptime` tinyint(1) NOT NULL,
  `poolname` varchar(50) NOT NULL,
  `unitprice` decimal(25,0) NOT NULL,
  `unitpriceNM` decimal(25,0) NOT NULL,
  `unitpriceadd` decimal(25,0) NOT NULL,
  `timebaseexp` tinyint(1) NOT NULL,
  `timebaseonline` tinyint(1) NOT NULL,
  `timeunitexp` int(11) NOT NULL,
  `timeunitonline` int(11) NOT NULL,
  `trafficunitdl` int(11) NOT NULL,
  `trafficunitul` int(11) NOT NULL,
  `trafficunitcomb` int(11) NOT NULL,
  `inittimeexp` int(11) NOT NULL,
  `inittimeonline` int(11) NOT NULL,
  `initdl` int(11) NOT NULL,
  `initul` int(11) NOT NULL,
  `inittotal` int(11) NOT NULL,
  `srvtype` tinyint(1) NOT NULL,
  `timeaddmodeexp` tinyint(1) NOT NULL,
  `timeaddmodeonline` tinyint(1) NOT NULL,
  `trafficaddmode` tinyint(1) NOT NULL,
  `monthly` tinyint(1) NOT NULL,
  `enaddcredits` tinyint(1) NOT NULL,
  `minamount` int(20) NOT NULL,
  `minamountadd` int(20) NOT NULL,
  `resetctrdate` tinyint(1) NOT NULL,
  `resetctrneg` tinyint(1) NOT NULL,
  `pricecalcdownload` tinyint(1) NOT NULL,
  `pricecalcupload` tinyint(1) NOT NULL,
  `pricecalcuptime` tinyint(1) NOT NULL,
  `unitpricetax` decimal(25,0) NOT NULL,
  `unitpriceaddtax` decimal(25,0) NOT NULL,
  `enableburst` tinyint(1) NOT NULL,
  `dlburstlimit` int(11) NOT NULL,
  `ulburstlimit` int(11) NOT NULL,
  `dlburstthreshold` int(11) NOT NULL,
  `ulburstthreshold` int(11) NOT NULL,
  `dlbursttime` int(11) NOT NULL,
  `ulbursttime` int(11) NOT NULL,
  `enableservice` int(11) NOT NULL,
  `dlquota` bigint(20) NOT NULL,
  `ulquota` bigint(20) NOT NULL,
  `combquota` bigint(20) NOT NULL,
  `timequota` bigint(20) NOT NULL,
  `priority` smallint(6) NOT NULL,
  `nextsrvid` int(11) NOT NULL,
  `dailynextsrvid` int(11) NOT NULL,
  `disnextsrvid` int(11) NOT NULL,
  `availucp` tinyint(1) NOT NULL,
  `renew` tinyint(1) NOT NULL,
  `carryover` tinyint(1) NOT NULL,
  `policymapdl` varchar(50) NOT NULL,
  `policymapul` varchar(50) NOT NULL,
  `custattr` varchar(10240) NOT NULL,
  `gentftp` tinyint(1) NOT NULL,
  `cmcfg` varchar(10240) NOT NULL,
  `advcmcfg` tinyint(1) NOT NULL,
  `addamount` int(11) NOT NULL,
  `ignstatip` tinyint(1) NOT NULL,
  PRIMARY KEY (`srvid`),
  KEY `srvname` (`srvname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_services`
--

INSERT INTO `rm_services` (`srvid`, `srvname`, `descr`, `downrate`, `uprate`, `limitdl`, `limitul`, `limitcomb`, `limitexpiration`, `limituptime`, `poolname`, `unitprice`, `unitpriceNM`, `unitpriceadd`, `timebaseexp`, `timebaseonline`, `timeunitexp`, `timeunitonline`, `trafficunitdl`, `trafficunitul`, `trafficunitcomb`, `inittimeexp`, `inittimeonline`, `initdl`, `initul`, `inittotal`, `srvtype`, `timeaddmodeexp`, `timeaddmodeonline`, `trafficaddmode`, `monthly`, `enaddcredits`, `minamount`, `minamountadd`, `resetctrdate`, `resetctrneg`, `pricecalcdownload`, `pricecalcupload`, `pricecalcuptime`, `unitpricetax`, `unitpriceaddtax`, `enableburst`, `dlburstlimit`, `ulburstlimit`, `dlburstthreshold`, `ulburstthreshold`, `dlbursttime`, `ulbursttime`, `enableservice`, `dlquota`, `ulquota`, `combquota`, `timequota`, `priority`, `nextsrvid`, `dailynextsrvid`, `disnextsrvid`, `availucp`, `renew`, `carryover`, `policymapdl`, `policymapul`, `custattr`, `gentftp`, `cmcfg`, `advcmcfg`, `addamount`, `ignstatip`) VALUES
(1, 'Light', '', 0, 0, 0, 0, 0, 1, 0, 'Light', 18000, 16500, 18000, 2, 0, 31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 8, 8, -1, -1, 0, 0, 0, '', '', '', 0, '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rm_settings`
--

CREATE TABLE IF NOT EXISTS `rm_settings` (
  `currency` varchar(15) NOT NULL,
  `unixacc` tinyint(1) NOT NULL,
  `diskquota` tinyint(1) NOT NULL,
  `quotatpl` varchar(30) NOT NULL,
  `paymentopt` int(11) NOT NULL,
  `changesrv` tinyint(1) NOT NULL,
  `vatpercent` decimal(4,2) NOT NULL,
  `advtaxpercent` decimal(4,2) NOT NULL,
  `disablenotpaid` tinyint(1) NOT NULL,
  `disableexpcont` tinyint(1) NOT NULL,
  `resetctr` tinyint(1) NOT NULL,
  `newnasallsrv` tinyint(1) NOT NULL,
  `newmanallsrv` tinyint(1) NOT NULL,
  `disconnmethod` tinyint(1) NOT NULL,
  `warndl` bigint(20) NOT NULL,
  `warndlpercent` int(3) NOT NULL,
  `warnul` bigint(20) NOT NULL,
  `warnulpercent` int(3) NOT NULL,
  `warncomb` bigint(20) NOT NULL,
  `warncombpercent` int(3) NOT NULL,
  `warnuptime` bigint(20) NOT NULL,
  `warnuptimepercent` int(3) NOT NULL,
  `warnexpiry` int(11) NOT NULL,
  `expalertmode` tinyint(1) NOT NULL,
  `emailselfregman` tinyint(1) NOT NULL,
  `emailwelcome` tinyint(1) NOT NULL,
  `emailnewsrv` tinyint(1) NOT NULL,
  `emailrenew` tinyint(1) NOT NULL,
  `smsrenew` tinyint(1) NOT NULL,
  `emailexpiry` tinyint(1) NOT NULL,
  `smswelcome` tinyint(1) NOT NULL,
  `smsexpiry` tinyint(1) NOT NULL,
  `warnmode` tinyint(1) NOT NULL,
  `selfreg` tinyint(1) NOT NULL,
  `edituserdata` tinyint(1) NOT NULL,
  `hidelimits` tinyint(1) NOT NULL,
  `pm_internal` tinyint(1) NOT NULL,
  `pm_paypalstd` tinyint(1) NOT NULL,
  `pm_paypalpro` tinyint(1) NOT NULL,
  `pm_paypalexp` tinyint(1) NOT NULL,
  `pm_sagepay` tinyint(1) NOT NULL,
  `pm_authorizenet` tinyint(1) NOT NULL,
  `pm_dps` tinyint(1) NOT NULL,
  `pm_2co` tinyint(1) NOT NULL,
  `pm_payfast` tinyint(1) NOT NULL,
  `pm_citrus` tinyint(1) NOT NULL,
  `pm_paytm` tinyint(1) NOT NULL,
  `unixhost` tinyint(1) NOT NULL,
  `remotehostname` varchar(100) NOT NULL,
  `maclock` tinyint(1) NOT NULL,
  `billingstart` tinyint(2) NOT NULL,
  `disconnpostpaid` tinyint(1) NOT NULL,
  `renewday` tinyint(2) NOT NULL,
  `changepswucp` tinyint(1) NOT NULL,
  `redeemucp` tinyint(1) NOT NULL,
  `buycreditsucp` tinyint(1) NOT NULL,
  `selfreg_firstname` tinyint(1) NOT NULL,
  `selfreg_lastname` tinyint(1) NOT NULL,
  `selfreg_address` tinyint(1) NOT NULL,
  `selfreg_city` tinyint(1) NOT NULL,
  `selfreg_zip` tinyint(1) NOT NULL,
  `selfreg_country` tinyint(1) NOT NULL,
  `selfreg_state` tinyint(1) NOT NULL,
  `selfreg_phone` tinyint(1) NOT NULL,
  `selfreg_mobile` tinyint(1) NOT NULL,
  `selfreg_email` tinyint(1) NOT NULL,
  `selfreg_mobactsms` tinyint(1) NOT NULL,
  `selfreg_nameactemail` tinyint(1) NOT NULL,
  `selfreg_nameactsms` tinyint(1) NOT NULL,
  `selfreg_endupemail` tinyint(1) NOT NULL,
  `selfreg_endupmobile` tinyint(1) NOT NULL,
  `selfreg_vatid` tinyint(1) NOT NULL,
  `ias_email` tinyint(1) NOT NULL,
  `ias_mobile` tinyint(1) NOT NULL,
  `ias_verify` tinyint(1) NOT NULL,
  `ias_endupemail` tinyint(1) NOT NULL,
  `ias_endupmobile` tinyint(1) NOT NULL,
  `simuseselfreg` int(11) NOT NULL,
  `defgrpid` int(11) NOT NULL,
  `captcha` tinyint(1) NOT NULL,
  `static_ip` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_settings`
--

INSERT INTO `rm_settings` (`currency`, `unixacc`, `diskquota`, `quotatpl`, `paymentopt`, `changesrv`, `vatpercent`, `advtaxpercent`, `disablenotpaid`, `disableexpcont`, `resetctr`, `newnasallsrv`, `newmanallsrv`, `disconnmethod`, `warndl`, `warndlpercent`, `warnul`, `warnulpercent`, `warncomb`, `warncombpercent`, `warnuptime`, `warnuptimepercent`, `warnexpiry`, `expalertmode`, `emailselfregman`, `emailwelcome`, `emailnewsrv`, `emailrenew`, `smsrenew`, `emailexpiry`, `smswelcome`, `smsexpiry`, `warnmode`, `selfreg`, `edituserdata`, `hidelimits`, `pm_internal`, `pm_paypalstd`, `pm_paypalpro`, `pm_paypalexp`, `pm_sagepay`, `pm_authorizenet`, `pm_dps`, `pm_2co`, `pm_payfast`, `pm_citrus`, `pm_paytm`, `unixhost`, `remotehostname`, `maclock`, `billingstart`, `disconnpostpaid`, `renewday`, `changepswucp`, `redeemucp`, `buycreditsucp`, `selfreg_firstname`, `selfreg_lastname`, `selfreg_address`, `selfreg_city`, `selfreg_zip`, `selfreg_country`, `selfreg_state`, `selfreg_phone`, `selfreg_mobile`, `selfreg_email`, `selfreg_mobactsms`, `selfreg_nameactemail`, `selfreg_nameactsms`, `selfreg_endupemail`, `selfreg_endupmobile`, `selfreg_vatid`, `ias_email`, `ias_mobile`, `ias_verify`, `ias_endupemail`, `ias_endupmobile`, `simuseselfreg`, `defgrpid`, `captcha`, `static_ip`) VALUES
('IQD', 0, 0, 'template', 1, 0, 0.00, 0.00, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 43200, 0, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '127.0.0.1', 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rm_users`
--

CREATE TABLE IF NOT EXISTS `rm_users` (
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `groupid` int(11) NOT NULL,
  `enableuser` tinyint(1) NOT NULL,
  `uplimit` bigint(20) NOT NULL,
  `downlimit` bigint(20) NOT NULL,
  `comblimit` bigint(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `gpslat` decimal(17,14) NOT NULL,
  `gpslong` decimal(17,14) NOT NULL,
  `mac` varchar(17) NOT NULL,
  `usemacauth` tinyint(1) NOT NULL,
  `expiration` datetime DEFAULT NULL,
  `uptimelimit` bigint(20) NOT NULL,
  `srvid` int(11) NOT NULL,
  `staticipcm` varchar(15) NOT NULL,
  `staticipcpe` varchar(15) NOT NULL,
  `ipmodecm` tinyint(1) NOT NULL,
  `ipmodecpe` tinyint(1) NOT NULL,
  `poolidcm` int(11) NOT NULL,
  `poolidcpe` int(11) NOT NULL,
  `createdon` date NOT NULL,
  `acctype` tinyint(1) NOT NULL,
  `credits` decimal(20,2) NOT NULL,
  `cardfails` tinyint(4) NOT NULL,
  `createdby` varchar(64) NOT NULL,
  `owner` varchar(64) NOT NULL,
  `taxid` varchar(40) NOT NULL,
  `cnic` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `maccm` varchar(17) NOT NULL,
  `custattr` varchar(10240) NOT NULL,
  `warningsent` tinyint(1) NOT NULL,
  `verifycode` varchar(10) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `selfreg` tinyint(1) NOT NULL,
  `verifyfails` tinyint(4) NOT NULL,
  `verifysentnum` tinyint(4) NOT NULL,
  `verifymobile` varchar(15) NOT NULL,
  `contractid` varchar(50) NOT NULL,
  `contractvalid` date DEFAULT NULL,
  `actcode` varchar(60) NOT NULL,
  `pswactsmsnum` tinyint(4) NOT NULL,
  `alertemail` tinyint(1) NOT NULL,
  `alertsms` tinyint(1) NOT NULL,
  `lang` varchar(30) NOT NULL,
  `lastlogoff` datetime DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `staticipcpe` (`staticipcpe`),
  KEY `srvid` (`srvid`),
  KEY `groupid` (`groupid`),
  KEY `enableuser` (`enableuser`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `company` (`company`),
  KEY `phone` (`phone`),
  KEY `mobile` (`mobile`),
  KEY `address` (`address`),
  KEY `city` (`city`),
  KEY `zip` (`zip`),
  KEY `country` (`country`),
  KEY `state` (`state`),
  KEY `comment` (`comment`(255)),
  KEY `mac` (`mac`),
  KEY `acctype` (`acctype`),
  KEY `email` (`email`),
  KEY `maccm` (`maccm`),
  KEY `owner` (`owner`),
  KEY `staticipcm` (`staticipcm`),
  KEY `expiration` (`expiration`),
  KEY `createdon` (`createdon`),
  KEY `contractid` (`contractid`),
  KEY `contractvalid` (`contractvalid`),
  KEY `lastlogoff` (`lastlogoff`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rm_users`
--

INSERT INTO `rm_users` (`username`, `password`, `groupid`, `enableuser`, `uplimit`, `downlimit`, `comblimit`, `firstname`, `lastname`, `company`, `phone`, `mobile`, `address`, `city`, `zip`, `country`, `state`, `comment`, `gpslat`, `gpslong`, `mac`, `usemacauth`, `expiration`, `uptimelimit`, `srvid`, `staticipcm`, `staticipcpe`, `ipmodecm`, `ipmodecpe`, `poolidcm`, `poolidcpe`, `createdon`, `acctype`, `credits`, `cardfails`, `createdby`, `owner`, `taxid`, `cnic`, `email`, `maccm`, `custattr`, `warningsent`, `verifycode`, `verified`, `selfreg`, `verifyfails`, `verifysentnum`, `verifymobile`, `contractid`, `contractvalid`, `actcode`, `pswactsmsnum`, `alertemail`, `alertsms`, `lang`, `lastlogoff`) VALUES
('admin', '1111', 1, 1, 0, 0, 0, 'admin', '', '', '', '', '', '', '', '', '', '', 0.00000000000000, 0.00000000000000, '', 1, '2021-07-07 16:20:26', 1484744, 4, '', '', 0, 0, 0, 0, '2020-10-09', 0, 0.00, 0, 'admin', 'admin', '', '', '', '', '', 0, '', 0, 0, 0, 0, '', '', '0000-00-00', '', 0, 0, 0, 'English', '2021-06-10 02:38:04');

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete3MonthsOldLogs` ON SCHEDULE EVERY 30 DAY STARTS '2021-05-09 00:00:00' ON COMPLETION PRESERVE ENABLE DO DELETE FROM logs WHERE time < now() - interval 12 month$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
