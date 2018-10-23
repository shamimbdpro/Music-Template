-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: anne.ch.inthin
-- Generation Time: Aug 06, 2018 at 04:29 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 5.6.36-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `touchdownworldcz18`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `name`, `password`, `email`, `level`, `publish`) VALUES
(1, 'DEIL', 'deil', 'ec7268ad0968a31ef5f7ae1f05cdf18f', 'deil@touchdownworld.cz', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `desc` text NOT NULL,
  `cover` text CHARACTER SET latin1 NOT NULL,
  `user` int(11) NOT NULL,
  `play` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `blocker` int(11) NOT NULL,
  `blocked` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mother` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `title`, `url`, `mother`, `type`, `publish`) VALUES
(2, 'Music', 'music', 0, 1, 1),
(3, 'videos', 'videos', 0, 2, 1),
(4, 'Photos', 'photos', 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `message` text NOT NULL,
  `seen` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `user`, `message`, `seen`, `date`) VALUES
(1, 30, 28, 'hi', 1, '2018-08-06 14:04:11'),
(2, 28, 30, 'helllo', 1, '2018-08-06 14:04:41'),
(3, 28, 30, 'hiodjfpod', 1, '2018-08-06 14:17:57'),
(4, 30, 28, 'sdfsd', 1, '2018-08-06 14:18:20'),
(5, 28, 30, 'dasd', 1, '2018-08-06 14:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `type` varchar(30) CHARACTER SET latin1 NOT NULL,
  `type_id` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deposite`
--

CREATE TABLE `deposite` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hooks`
--

CREATE TABLE `hooks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` text NOT NULL,
  `template` text NOT NULL,
  `plugin` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `pages` text NOT NULL,
  `order` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hooks`
--

INSERT INTO `hooks` (`id`, `title`, `position`, `template`, `plugin`, `content`, `pages`, `order`, `publish`, `time`) VALUES
(42, 'Login', 'med_login', 'beats', 'login_popup', 'a:1:{s:7:\"content\";a:1:{i:0;s:0:\"\";}}', 'a:1:{i:0;s:3:\"ALL\";}', 0, 1, '2016-05-24 19:03:15'),
(44, 'Latest music', 'med_block1', 'beats', 'latest_audio', 'a:1:{s:7:\"options\";a:3:{s:3:\"cat\";s:3:\"all\";s:9:\"max_items\";s:2:\"12\";s:5:\"order\";s:1:\"2\";}}', 'a:1:{i:0;s:1:\"1\";}', 0, 1, '2017-08-01 17:43:47'),
(45, 'Users list', 'med_left', 'beats', 'latest_authors', 'a:1:{s:7:\"options\";a:1:{s:9:\"max_items\";s:2:\"20\";}}', 'a:1:{i:0;s:1:\"1\";}', 0, 1, '2017-08-01 17:43:33'),
(46, 'Featured album', 'med_block2', 'beats', 'view_album', 'a:1:{s:7:\"options\";a:1:{s:5:\"album\";s:1:\"5\";}}', 'a:2:{i:0;s:1:\"1\";i:1;s:2:\"16\";}', 0, 1, '2017-05-04 17:04:22'),
(47, 'Amazing playlists', 'med_block3', 'beats', 'view_playlists', 'a:1:{s:7:\"options\";a:2:{s:4:\"type\";s:1:\"2\";s:9:\"max_items\";s:2:\"15\";}}', 'a:1:{i:0;s:1:\"1\";}', 0, 1, '2017-08-01 17:44:26'),
(49, 'Posts categories', 'med_block5', 'beats', 'posts_cats', 'a:0:{}', 'a:1:{i:0;s:3:\"ALL\";}', 0, 1, '2016-05-19 18:18:35'),
(51, 'Social icons for all pages', 'med_footer', 'beats', 'social_icons_list', 'a:1:{s:6:\"social\";a:4:{s:8:\"facebook\";s:30:\"http://facebook.com/amr.elngm6\";s:7:\"twitter\";s:29:\"http://twitter.com/amr_elngm6\";s:6:\"google\";s:31:\"http://googleplus.com/amrelngm6\";s:7:\"behance\";s:0:\"\";}}', 'a:1:{i:0;s:3:\"ALL\";}', 0, 1, '2016-07-12 00:29:08'),
(52, 'Side Advertisement ', 'med_side_ads', 'beats', 'content', 'a:1:{s:7:\"content\";a:1:{i:0;s:50:\"<div class=\"ui medium rectangle test ad\">.</div>\r\n\";}}', 'a:1:{i:0;s:3:\"ALL\";}', 0, 1, '2016-08-10 03:50:26'),
(53, 'Top Advertisement ', 'med_top_ads', 'beats', 'content', 'a:1:{s:7:\"content\";a:1:{i:0;s:51:\"<div class=\"ui large leaderboard test ad\">.</div>\r\n\";}}', 'a:1:{i:0;s:3:\"ALL\";}', 0, 1, '2016-08-10 03:52:28'),
(55, 'Side main menu', 'med_menu', 'beats', 'medians_menu', 'a:1:{s:4:\"menu\";s:12:\"[{\"id\":\"2\"}]\";}', 'a:1:{i:0;s:3:\"ALL\";}', 0, 1, '2017-08-01 18:22:41'),
(60, 'terms', 'med_block8', 'orange', 'content', 'a:1:{s:7:\"content\";a:1:{i:0;s:5492:\"<p>Terms&amp;condetions</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>1. Pre-payment, cancellation, no-show and fine print</h2>\r\n\r\n<p>By making a reservation with a Supplier, you accept and agree to the relevant cancellation and no-show policy of that Supplier, and to any additional (delivery) terms and conditions of the Supplier that may apply to your visit or stay (including the fine print of the Supplier made available on our Platform and the relevant house rules of the Supplier), including for services rendered and/or products offered by the accommodation provider (the delivery terms and conditions of an accommodation provider can be obtained with the relevant accommodation provider). The general cancellation and no-show policy of each Supplier is made available on our Platform on the Supplier information pages, during the reservation procedure and in the confirmation email or ticket (if applicable). Please note that certain rates or special offers are not eligible for cancellation or change. Applicable city/tourist tax may still be charged by the Supplier in the event of a no-show or charged cancellation. Please check the (reservation) details of your product or service of choice thoroughly for any such conditions prior to making your reservation. Please note that a reservation which requires down payment or (wholly or partly) prepayment may be cancelled (without a prior notice of default or warning) insofar the relevant (remaining) amount(s) cannot be collected in full on the relevant payment date in accordance with the relevant payment policy of the Supplier and the reservation. Cancellation and prepayment policies may vary according to room type. Please carefully read the fine print (below the room types or at the bottom of each Supplier page on our Platform) and important information in your reservation confirmation for additional policies as may be applied by the Supplier (e.g. in respect of age requirement, security deposit, non-cancellation/additional supplements for group bookings, extra beds/no free breakfast, pets/cards accepted). Late payment, wrong bank, debit or credit card details, invalid credit/debit cards or insufficient funds are for your own risk and account and you shall not be entitled to any refund of any (non-refundable) prepaid amount unless the Supplier agrees or allows otherwise under its (pre)payment and cancellation policy.</p>\r\n\r\n<p>If you wish to review, adjust or cancel your reservation, please revert to the confirmation email and follow the instructions therein. Please note that you may be charged for your cancellation in accordance with the accommodation provider&#39;s cancellation, (pre)payment and no-show policy or not be entitled to any repayment of any (pre)paid amount. We recommend that you read the cancellation, (pre)payment and no-show policy of the accommodation provider carefully prior to making your reservation and remember to make further payments on time as may be required for the relevant reservation.</p>\r\n\r\n<p>If you have a late or delayed arrival on the check-in date or only arrive the next day, make sure to (timely/promptly) communicate this with the Supplier so they know when to expect you to avoid cancellation of your reservation or room or charge of the no-show fee. Our customer service department can help you if needed with informing the Supplier. Booking.com does not accept any liability or responsibility for the consequences of your delayed arrival or any cancellation or charged no-show fee by the Supplier.</p>\r\n\r\n<h2>2. (Further) correspondence and communication</h2>\r\n\r\n<p>By completing a booking, you agree to receive (i) an email which we may send you shortly prior to your arrival date, giving you information on your destination and providing you with certain information and offers (including third party offers to the extent that you have actively opted in for this information) relevant to your reservation and destination, and (ii) an email which we may send to you promptly after your stay inviting you to complete our guest review form. Please see our privacy and cookies policy for more information about how we may contact you.</p>\r\n\r\n<p>Booking.com disclaims any liability or responsibility for any communication with the Supplier on or through its platform. You cannot derive any rights from any request to, or communication with the Supplier or (any form of) acknowledgement of receipt of any communication or request. Booking.com cannot guarantee that any request or communication will be (duly and timely) received/read by, complied with, executed or accepted by the Supplier.</p>\r\n\r\n<p>In order to duly complete and secure your reservation, you need to use your correct email address. We are not responsible or liable for (and have no obligation to verify) any wrong or misspelled email address or inaccurate or wrong (mobile) phone number or credit card number.</p>\r\n\r\n<p>Any claim or complaint against Booking.com or in respect of the Service must be promptly submitted, but in any event within 30 days after the scheduled day of consummation of the product or service (e.g. check out date). Any claim or complaint that is submitted after the 30 days period, may be rejected and the claimant shall forfeit its right to any (damage or cost) compensation.</p>\r\n\r\n<p>Due to the continuous update and adjustments of rates and availability, we strongly suggest to make screenshots when making a reservation to support your position (if needed).</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\";}}', 'a:1:{i:0;s:2:\"13\";}', 0, 1, '2017-02-08 07:10:41'),
(61, 'Latest videos', 'med_block4', 'beats', 'latest_videos', 'a:1:{s:7:\"options\";a:3:{s:3:\"cat\";s:3:\"all\";s:9:\"max_items\";s:2:\"12\";s:5:\"order\";s:1:\"1\";}}', 'a:1:{i:0;s:1:\"1\";}', 0, 1, '2017-08-01 17:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `account_view` int(1) NOT NULL,
  `account_edit` int(1) NOT NULL,
  `edit_setting` int(1) NOT NULL,
  `bulk_msg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `type_id` int(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `content` varchar(255) CHARACTER SET latin1 NOT NULL,
  `thumbs` varchar(255) CHARACTER SET latin1 NOT NULL,
  `frametype` varchar(255) NOT NULL,
  `cat` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `allow` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `shares` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `tags` text NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `publish` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(255) CHARACTER SET latin1 NOT NULL,
  `realname` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `country` text NOT NULL,
  `pic` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cover` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `info` text NOT NULL,
  `permissions` int(11) NOT NULL,
  `credit` varchar(20) NOT NULL,
  `followers` int(11) NOT NULL,
  `following` int(11) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `google` varchar(255) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publish` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `pass`, `realname`, `email`, `phone`, `mobile`, `gender`, `country`, `pic`, `cover`, `type`, `info`, `permissions`, `credit`, `followers`, `following`, `facebook`, `twitter`, `youtube`, `google`, `instagram`, `date`, `publish`) VALUES
(28, 'deil', 'c00542c31da1762a39397d97fcf4ae95', 'Deil', 'touchdownrecords201@gmail.com', '', '', 'male', 'cz', '300514131_161081188_677626512.jpg', '0', 1, 'Artist / Producer & More', 1, '0', 0, 0, '', '', '', '', '', '2018-08-06 13:38:55', 1),
(30, 'deil2', '293f6338b046d65e437b7ca39ba90136', 'Deil2', 'dalidali3@seznam.cz', '', '', '', '', 'default.png', '0', 1, '', 0, '', 0, 0, '', '', '', '', '', '2018-08-06 14:00:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members_activation`
--

CREATE TABLE `members_activation` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_activation`
--

INSERT INTO `members_activation` (`id`, `user`, `code`, `date`) VALUES
(1, 1, '874771186', '2018-08-06 06:45:37'),
(2, 2, '662060044', '2018-08-06 08:46:18'),
(3, 3, '725429516', '2018-08-06 08:59:14'),
(4, 4, '880603132', '2018-08-06 09:28:43'),
(5, 5, '615644075', '2018-08-06 09:34:33'),
(6, 6, '848333641', '2018-08-06 09:39:07'),
(7, 7, '720875848', '2018-08-06 09:41:40'),
(8, 8, '775702779', '2018-08-06 09:42:56'),
(9, 9, '786489502', '2018-08-06 09:46:10'),
(10, 10, '719747359', '2018-08-06 09:48:08'),
(11, 11, '696633654', '2018-08-06 09:49:54'),
(12, 12, '874727261', '2018-08-06 09:51:43'),
(13, 13, '613556646', '2018-08-06 10:03:27'),
(14, 14, '759184465', '2018-08-06 10:09:39'),
(15, 15, '658553316', '2018-08-06 10:10:32'),
(16, 16, '513912705', '2018-08-06 10:12:01'),
(17, 17, '874349122', '2018-08-06 10:15:30'),
(18, 18, '774690498', '2018-08-06 10:15:43'),
(19, 19, '780156620', '2018-08-06 10:15:55'),
(20, 20, '619758663', '2018-08-06 10:16:15'),
(21, 21, '579769836', '2018-08-06 10:17:00'),
(22, 22, '848673568', '2018-08-06 10:17:46'),
(23, 23, '840781665', '2018-08-06 10:21:54'),
(24, 24, '827094836', '2018-08-06 10:22:35'),
(25, 28, '883434707', '2018-08-06 13:38:55'),
(26, 29, '844240353', '2018-08-06 13:58:49'),
(27, 30, '552169559', '2018-08-06 14:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `sender` text NOT NULL,
  `reply_to` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `item` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `order` int(11) NOT NULL,
  `template` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `keywords` text NOT NULL,
  `layout` text NOT NULL,
  `home` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `prefix`, `content`, `order`, `template`, `desc`, `keywords`, `layout`, `home`, `comment`, `comments`, `publish`, `time`) VALUES
(1, 'Home page', 'homepage', '', 0, 'beats', '', '', 'home', 1, 0, 0, 1, '2017-08-01 17:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payment`
--

CREATE TABLE `paypal_payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paypal_payment`
--

INSERT INTO `paypal_payment` (`id`, `name`, `email`) VALUES
(1, 'Medians PRO ', 'sokrat.egypt@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `title`, `cost`, `period`, `paid`) VALUES
(1, 'FREE', 0, 0, 0),
(2, 'PRO', 3, 1, 1),
(3, 'BEATBOSS', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_access`
--

CREATE TABLE `plan_access` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_access`
--

INSERT INTO `plan_access` (`id`, `title`, `access`) VALUES
(1, 'Upload free audio', 'upload_music'),
(2, 'Upload free video', 'upload_video'),
(3, 'Upload free photos', 'upload_photo'),
(4, 'Upload premium audio', 'sell_music'),
(5, 'Upload premium video', 'sell_video'),
(6, 'Upload premium photos', 'sell_photo'),
(8, 'Grab SoundCloud track', 'grab_sc_track'),
(11, 'Grab YouTube video', 'grab_video'),
(12, 'Create Albums', 'albums'),
(13, 'Create Playlists', 'playlists');

-- --------------------------------------------------------

--
-- Table structure for table `plan_access_option`
--

CREATE TABLE `plan_access_option` (
  `id` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `plan_access` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_access_option`
--

INSERT INTO `plan_access_option` (`id`, `plan`, `plan_access`, `value`) VALUES
(308, 3, 'upload_music', 'unlimited'),
(309, 3, 'upload_video', 'unlimited'),
(310, 3, 'upload_photo', 'unlimited'),
(311, 3, 'sell_music', 'unlimited'),
(312, 3, 'sell_video', 'unlimited'),
(313, 3, 'sell_photo', 'unlimited'),
(314, 3, 'grab_sc_track', 'unlimited'),
(315, 3, 'grab_video', 'unlimited'),
(316, 3, 'albums', 'unlimited'),
(317, 3, 'playlists', 'unlimited'),
(328, 2, 'upload_music', 'unlimited'),
(329, 2, 'upload_video', 'unlimited'),
(330, 2, 'upload_photo', 'unlimited'),
(331, 2, 'sell_music', '50'),
(332, 2, 'sell_video', '50'),
(333, 2, 'sell_photo', '50'),
(334, 2, 'grab_sc_track', '50'),
(335, 2, 'grab_video', '50'),
(336, 2, 'albums', '50'),
(337, 2, 'playlists', '50'),
(338, 1, 'upload_music', 'unlimited'),
(339, 1, 'upload_video', 'unlimited'),
(340, 1, 'upload_photo', 'unlimited'),
(341, 1, 'sell_music', '5'),
(342, 1, 'sell_video', '5'),
(343, 1, 'sell_photo', '5'),
(344, 1, 'grab_sc_track', '5'),
(345, 1, 'grab_video', '5'),
(346, 1, 'albums', '5'),
(347, 1, 'playlists', '5');

-- --------------------------------------------------------

--
-- Table structure for table `plan_subscribe`
--

CREATE TABLE `plan_subscribe` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user` int(11) NOT NULL,
  `play` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `public` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_items`
--

CREATE TABLE `playlist_items` (
  `id` int(11) NOT NULL,
  `media` int(11) NOT NULL,
  `playlist` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` text NOT NULL,
  `desc` text NOT NULL,
  `link` text NOT NULL,
  `version` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `type`, `path`, `desc`, `link`, `version`, `status`) VALUES
(13, 'Portfolio posts', '0', './extensions/layout/blocks/portfolio_posts', 'Nice showcase for your portfolio with images', 'portfolio_posts', 'v 1.0', 1),
(14, 'Social media icons', '0', './extensions/layout/blocks/social_icons', 'Social media profiles for your portfolio with icons', 'social_icons', 'v 1.0', 1),
(16, 'Custom content', '0', './extensions/layout/blocks/content', 'Custom content', 'content', 'v 1.0', 1),
(17, 'Grid posts', '0', './extensions/layout/blocks/grid_posts', 'Grid content of the posts per categories', 'grid_posts', 'v 1.0', 1),
(18, 'Bootstrap slider', '0', './extensions/layout/sliders/bootstrap_slider', 'Nice slideshow with nice effects', 'bootstrap_slider', 'v 1.0', 1),
(19, 'Portfolio lightbox', '0', './extensions/layout/gallery/lightbox', 'Nice portfolio showcase with lightbox', 'lightbox', 'v 1.0', 1),
(20, 'Build form by ajax', '0', './extensions/layout/forms/ajax_form', 'Build your custom form with unlimited inputs', 'ajax_form', 'v 1.0', 1),
(21, 'Responsive vertical menu', '0', './extensions/layout/menus/vertical_menu', 'useful vertical multi-level menu ', 'vertical_menu', 'v 1.0', 1),
(22, 'Modern slider', '0', './extensions/layout/sliders/modern_slider', 'Modern slideshow by flexslider', 'modern_slider', 'v 1.0', 1),
(23, 'Grid gallery', '0', './extensions/layout/gallery/grid_gallery', 'Grid gallery with multiple display', 'grid_gallery', 'v 1.0', 1),
(24, 'News showcase', '0', './extensions/layout/blocks/news_showcase', 'Nice plugin to view posts with multiple styles ', 'news_showcase', 'v 1.0', 1),
(25, 'Responsive horizontal menu', '0', './extensions/layout/menus/top_menu', 'Nice responsive horizontal multi-level menu ', 'top_menu', 'v 1.0', 1),
(27, 'Login/Signup pop-up', '0', './extensions/layout/blocks/login_popup', 'Custom form for login in and sign up', 'login_popup', 'v 1.0', 1),
(28, 'Music showcase', '0', './extensions/layout/music/latest_audio', 'Nice plugin to view Music with multiple styles ', 'latest_audio', 'v 1.0', 1),
(29, 'Authors showcase', '0', './extensions/layout/music/latest_authors', 'Nice plugin to view Authors with multiple styles ', 'latest_authors', 'v 1.0', 1),
(30, 'Album showcase', '0', './extensions/layout/music/view_album', 'Nice plugin to view Album with multiple styles ', 'view_album', 'v 1.0', 1),
(31, 'Playlists showcase', '0', './extensions/layout/music/view_playlists', 'Nice plugin to view Playlists with multiple styles ', 'view_playlists', 'v 1.0', 1),
(32, 'Posts Categories', '0', './extensions/layout/blocks/posts_cats', 'Nice plugin to view Categories with multiple styles ', 'posts_cats', 'v 1.0', 1),
(33, 'Social media icons List', '0', './extensions/layout/blocks/social_icons_list', 'Social media profiles for your portfolio with icons', 'social_icons_list', 'v 1.0', 1),
(39, 'PayPal Payment Gateway', 'payment', './extensions/layout/payment/paypal', 'PayPal Payment Gateway', 'paypal', 'v 1.0', 1),
(40, 'Custom Medians menu', 'menus', './extensions/layout/menus/medians_menu', 'useful vertical multi-level menu ', 'medians_menu', 'v 1.0', 1),
(42, 'Portfolio gallery isotope', 'gallery', './extensions/layout/gallery/filter_gallery', 'Portfolio gallery using isotope to filter your works', 'filter_gallery', 'v 1.0', 0),
(43, 'Videos showcase', 'videos', './extensions/layout/music/latest_videos', 'Nice plugin to view Videos ', 'latest_videos', 'v 1.0', 1),
(44, 'Stripe Payment Gateway', 'payment', './extensions/layout/payment/stripe_payment', 'Stripe Payment Gateway', 'stripe_payment', 'v 1.0', 0),
(45, 'Authorize.net Payment Gateway', 'payment', './extensions/layout/payment/authorize_net', 'Authorize.net Payment Gateway', 'authorize_net', 'v 1.0', 0),
(46, 'Weekly top items plugin', 'music', './extensions/layout/music/top_weekly', 'Nice plugin to view Weekly Top items', 'top_weekly', '1.0', 0),
(47, 'Top artists plugin', 'music', './extensions/layout/music/top_authors', 'Nice plugin to view Top Artists list', 'top_authors', '1.0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plugins_options`
--

CREATE TABLE `plugins_options` (
  `id` int(11) NOT NULL,
  `plugin_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plugins_options`
--

INSERT INTO `plugins_options` (`id`, `plugin_id`, `content`, `date`) VALUES
(1, 39, 'a:4:{s:9:\"form_type\";s:6:\"plugin\";s:9:\"plugin_id\";s:2:\"39\";s:11:\"plugin_link\";s:14:\"[@plugin_link]\";s:5:\"email\";s:29:\"touchdownrecords201@gmail.com\";}', '2018-08-06 12:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cat` int(11) NOT NULL,
  `photo` text CHARACTER SET latin1 NOT NULL,
  `short` text CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `author` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recover_pass`
--

CREATE TABLE `recover_pass` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recover_pass`
--

INSERT INTO `recover_pass` (`id`, `user`, `code`, `date`) VALUES
(1, 1, '818916691', '2018-08-06 08:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sitename` text NOT NULL,
  `desc` text NOT NULL,
  `keywords` text NOT NULL,
  `template` text NOT NULL,
  `country` text NOT NULL,
  `email` text NOT NULL,
  `sender_email` text NOT NULL,
  `language` text NOT NULL,
  `allow_reg` int(11) NOT NULL,
  `pic_ext` text NOT NULL,
  `audio_ext` text NOT NULL,
  `videos_ext` text NOT NULL,
  `css` text NOT NULL,
  `js` text NOT NULL,
  `google_analytics` text NOT NULL,
  `logo` text NOT NULL,
  `logo_w` int(11) NOT NULL,
  `logo_h` int(11) NOT NULL,
  `facebook` int(11) NOT NULL,
  `facebook_key` text NOT NULL,
  `facebook_secret` text NOT NULL,
  `twitter` int(11) NOT NULL,
  `twitter_key` text NOT NULL,
  `twitter_secret` text NOT NULL,
  `google` int(11) NOT NULL,
  `google_key` text NOT NULL,
  `google_secret` text NOT NULL,
  `comments` int(11) NOT NULL,
  `edit_comments` int(11) NOT NULL,
  `html_comments` int(11) NOT NULL,
  `under` int(11) NOT NULL,
  `undermsg` text NOT NULL,
  `youtube_key` text NOT NULL,
  `soundcloud_key` text NOT NULL,
  `auto_publish` int(11) NOT NULL,
  `enable_music` int(11) NOT NULL,
  `enable_videos` int(11) NOT NULL,
  `enable_photos` int(11) NOT NULL,
  `enable_paid` int(11) NOT NULL,
  `percent` int(2) NOT NULL,
  `enable_soundcloud` int(11) NOT NULL,
  `enable_youtube` int(11) NOT NULL,
  `enable_ajax` int(11) NOT NULL,
  `auto_verify` int(11) NOT NULL,
  `admin_verify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sitename`, `desc`, `keywords`, `template`, `country`, `email`, `sender_email`, `language`, `allow_reg`, `pic_ext`, `audio_ext`, `videos_ext`, `css`, `js`, `google_analytics`, `logo`, `logo_w`, `logo_h`, `facebook`, `facebook_key`, `facebook_secret`, `twitter`, `twitter_key`, `twitter_secret`, `google`, `google_key`, `google_secret`, `comments`, `edit_comments`, `html_comments`, `under`, `undermsg`, `youtube_key`, `soundcloud_key`, `auto_publish`, `enable_music`, `enable_videos`, `enable_photos`, `enable_paid`, `percent`, `enable_soundcloud`, `enable_youtube`, `enable_ajax`, `auto_verify`, `admin_verify`) VALUES
('BEAT BOSS', 'desc', 'social', 'beats', '', '', '', 'english', 1, 'jpg,jpeg', 'mp3,wav', 'mp4,3gp,flv', 'CSS', 'JS', '50', '1912819792_1562929449_763707919.png', 20, 150, 1, '', '', 1, '', '', 1, '', '', 1, 1, 1, 0, 'Website Under conistruction', '', '', 1, 1, 1, 1, 1, 10, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `user` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `link` text NOT NULL,
  `version` text NOT NULL,
  `positions` text NOT NULL,
  `layouts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `desc`, `link`, `version`, `positions`, `layouts`) VALUES
(5, 'Media beats', 'Audio beats and videos', 'beats', 'v 1.0', 'med_menu , med_login , med_slider , med_block1, med_block2, med_block2, med_left, med_block3, med_parallax, med_block4, med_block5, med_block6, med_block7, med_block8, med_side_ads, med_top_ads, med_bottom_ads, med_related, med_footer', 'page , post , home');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);
ALTER TABLE `albums` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `albums` ADD FULLTEXT KEY `desc` (`desc`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposite`
--
ALTER TABLE `deposite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hooks`
--
ALTER TABLE `hooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`),
  ADD KEY `title_7` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `desc` (`desc`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_2` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_3` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_4` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_5` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_6` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_8` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_9` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_10` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_11` (`title`);
ALTER TABLE `media` ADD FULLTEXT KEY `desc_2` (`desc`);
ALTER TABLE `media` ADD FULLTEXT KEY `title_12` (`title`,`desc`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `realname_3` (`realname`);
ALTER TABLE `members` ADD FULLTEXT KEY `realname` (`realname`);
ALTER TABLE `members` ADD FULLTEXT KEY `realname_2` (`realname`);
ALTER TABLE `members` ADD FULLTEXT KEY `realname_4` (`realname`);
ALTER TABLE `members` ADD FULLTEXT KEY `name_2` (`name`);

--
-- Indexes for table `members_activation`
--
ALTER TABLE `members_activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_payment`
--
ALTER TABLE `paypal_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_access`
--
ALTER TABLE `plan_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_access_option`
--
ALTER TABLE `plan_access_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_subscribe`
--
ALTER TABLE `plan_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);
ALTER TABLE `playlist` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `playlist_items`
--
ALTER TABLE `playlist_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins_options`
--
ALTER TABLE `plugins_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recover_pass`
--
ALTER TABLE `recover_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposite`
--
ALTER TABLE `deposite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hooks`
--
ALTER TABLE `hooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `members_activation`
--
ALTER TABLE `members_activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_payment`
--
ALTER TABLE `paypal_payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plan_access`
--
ALTER TABLE `plan_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plan_access_option`
--
ALTER TABLE `plan_access_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `plan_subscribe`
--
ALTER TABLE `plan_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlist_items`
--
ALTER TABLE `playlist_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `plugins_options`
--
ALTER TABLE `plugins_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recover_pass`
--
ALTER TABLE `recover_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
