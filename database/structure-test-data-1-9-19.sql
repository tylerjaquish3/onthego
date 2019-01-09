-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table onthego.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table onthego.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Faith'),
	(2, 'Travel'),
	(3, 'Money'),
	(4, 'Personal'),
	(5, 'Home'),
	(6, 'Life'),
	(7, 'Marriage'),
	(8, 'Family'),
	(9, 'Friends'),
	(10, 'Scenery');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table onthego.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) unsigned NOT NULL,
  `comment_text` text NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table onthego.comments: ~2 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `post_id`, `comment_text`, `user_name`, `is_active`, `created_at`) VALUES
	(1, 1, 'you have a really nice blog!', 'Geri Atrics', 1, '2019-01-04 07:45:19'),
	(2, 1, 'i hate your blog', 'tj test', 1, '2019-01-04 16:59:41');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table onthego.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table onthego.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table onthego.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table onthego.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table onthego.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `caption` mediumtext,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table onthego.photos: ~6 rows (approximately)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`id`, `path`, `caption`, `is_active`, `created_at`) VALUES
	(1, '1.jpg', 'This was a cool photo', 1, '2019-01-07 08:21:14'),
	(2, '2.jpg', 'I love this place!!', 1, '2019-01-07 08:21:29'),
	(3, 'big.png', 'Wish you were here! But not that much.', 0, '2019-01-07 08:21:47'),
	(4, '3.jpg', 'You would love it here, i think.', 1, '2019-01-07 08:21:58'),
	(5, '4.jpg', 'I don\'t wanna leave.', 1, '2019-01-07 08:22:11'),
	(6, '5.jpg', 'This is the last one. For now.', 1, '2019-01-07 08:22:26');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Dumping structure for table onthego.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content_html` longtext,
  `category_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_by` smallint(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table onthego.posts: ~2 rows (approximately)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `content_html`, `category_id`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Neat post about life and other things', '<p>The television world is constantly changing, and sometimes it’s so hard to keep up with what’s coming in and what’s coming out. Nevertheless, the one thing we do know is that the Hollywood isn’t big enough for everyone, and as one new TV show takes over the silver screen, there’s an old show that takes the flack. Before you know it, it’s pulled from the air, and you’re lucky if you get re-runs on the network every so often. But who will be the victims in 2019? These are the TV show we will probably say goodbye to.</p><h2>Single Parents</h2><p>It’s always amazing to see a show rise from the ashes, and when the comedy show Single Parents made its debut, the numbers weren’t great. In fact, we didn’t even know if we’d be able to watch past the pilot episode.</p><p>&nbsp;</p><p>Since then, it has managed to build up a stable group of fans who tune in every single week to watch the show – but is that enough? With so many comedy shows making their way onto our screens each year, will Single Parents be on the road to divorce?</p><h2>Take Two</h2><p>ABC is known for bringing some of the greatest television shows into our lives, and that’s what we expected when Take Two came onto our screens.</p>', 3, 1, 3, '2018-12-28 08:48:54', '2018-11-07 16:13:46'),
	(2, 'New things in mexico, Part 1', '<p><i><strong><u>I like turtles.</u></strong></i></p><h2>But i dont like tortoises.</h2><p>&nbsp;</p><p>You will <span class="text-big"><mark class="pen-red">love</mark></span> my next blog post, <strong>I PROMISE</strong>.</p>', 2, 1, 2, '2019-01-03 16:35:49', '2018-12-16 20:14:24'),
	(3, 'You will love this', '<p>SANTA CLARA, Calif. – Nick Saban spoke with his arms folded tightly against his chest, hands gripping his arms, his body language signaling an inner angst he was trying to contain.</p><p>The best coach in college football history had just overseen the worst performance of his Alabama tenure, at the worst possible time. The Crimson Tide, ranked No. 1 all year and the defending national champion, had just <a href="https://sports.yahoo.com/clemson-throttles-alabama-second-title-three-years-staking-claim-dynasty-045631481.html">unraveled to a stunning degree against Clemson in the College Football Playoff title game</a>, losing 44-16. It was, by margin of defeat and size of the stakes, the biggest debacle of his 12 years at the school.</p><p>Without warning, the famed Saban Process became a paroxysm of incompetence. It sent the Alabama fans, who always laugh last and loudest, sullenly scurrying for the exits at Levi’s Stadium well before the game ended. And most of America, good and tired of squirming beneath the coach’s boot heel, bathed in the schadenfreude of the moment.</p><p>The prime elements of the meltdown:</p><p>Two interceptions by Heisman Trophy runner-up <a href="https://sports.yahoo.com/ncaaf/players/274844/">Tua Tagovailoa</a>, who had thrown just four in the previous 14 games. The first of those picks – <a href="https://sports.yahoo.com/tua-tagovailoa-opens-college-football-playoff-national-championship-game-throwing-pick-six-013421660.html">a recklessly blind throw into the flat</a> – was returned 44 yards for a touchdown just 100 seconds into the game, setting an ominous tone for the night.</p><p>Six penalties for 60 yards, some of them at acutely costly times.</p><p>An utterly futile fake field goal in the third quarter, which featured kicker <a href="https://sports.yahoo.com/ncaaf/players/279717/">Joseph Bulovas</a>as a lead blocker (no, really) for holder <a href="https://sports.yahoo.com/ncaaf/players/274842/">Mac Jones</a>, who ran into the teeth of Clemson’s powerful defensive line.</p><p>Blown coverages aplenty, which had to be particularly galling for a coach who takes special pride in mentoring defensive backs.</p><p>Oh, and don’t forget the handful of puzzling play calls, forehead-slapping red-zone failures and kicking fiascos.</p><p>It was all so completely foreign. This is a coach who has won six national championships, five of them since 2009, <a href="https://sports.yahoo.com/nick-saban-doesnt-text-yet-still-connects-recruits-210943738.html">often with a ruthless precision that seemed like the stuff of sci-fi cyborgs</a>. The expectation of airtight execution by the Tide had become ingrained over the years.</p><p>Even on those occasions when ‘Bama was beaten in a big game – like the 2014 and ’16 playoffs – it never looked like this. Those games, it was a play here or there, a one-score loss. This game, it was a wipeout in which the other team performed like a Saban machine and the Saban machine broke down spectacularly.</p>', 3, 1, 3, '2019-01-05 07:34:58', '2019-01-02 16:19:47'),
	(4, 'Haskins threw for 50 touchdowns', '<p>Haskins redshirted the 2016 season before showing the country his potential when coming in on relief of the injured J.T. Barrett in a win over rival Michigan in the final game of the 2017&nbsp;regular season. Ahead of the 2018 season, he beat out Joe Burrow (who transferred to LSU) to top the depth chart.</p><p>With <a href="https://sports.yahoo.com/ryan-day-10-things-know-urban-meyers-successor-ohio-state-134048844.html">new head coach Ryan Day</a> running the offense as Urban Meyer’s offensive coordinator and stand-in coach while Meyer was suspended to start the 2018 season, Haskins thrived for the Buckeyes. Haskins led the nation with 4,831 yards and 50 touchdowns while completing exactly 70 percent of his passes and tossing only eight interceptions. Along the way, he had five 400-yard games, 10 300-yard games and set quite a few Ohio State and Big Ten records.</p><p>Two of his best performances came late in the year. In the victory over Michigan that clinched the Big Ten East title, Haskins picked apart the Wolverines for 396 yards and six touchdowns. The following weekend, in the Big Ten title game, Haskins completed 34-of-41 passes <a href="https://sports.yahoo.com/dwayne-haskins-leads-ohio-state-big-ten-title-belongs-new-york-heisman-finalist-045545973.html">for a career-high 499 yards and five touchdowns</a>.</p><p>But perhaps more than anything, Haskins will be remembered in Columbus for his <a href="https://sports.yahoo.com/inside-dwayne-haskins-record-setting-day-michigan-licking-chops-012651392.html">thorough dismantling of the vaunted Michigan defense</a> in a game that cost UM a shot at the College Football Playoff:</p>', 5, 1, 2, '2019-01-08 07:37:02', '2019-01-08 16:08:39');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table onthego.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table onthego.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Tyler', 'tj@www.com', '2018-12-28 08:49:08', '$2y$10$JSuMbq0GsV/k4e5NS.Vb5O5XFzeJEcgBDC2KSNrktH./TbEP8TM2e', 'cHvnbC9BvBTcdMErTvkffxyTrprPhRMgZQtsK3CSlO1ZX6i4bpYc44EFWBmZ', '2018-12-28 08:49:11', '2018-12-28 08:49:12'),
	(2, 'Oksana', 'oksana@www.com', '2018-12-28 08:49:08', '$2y$10$JSuMbq0GsV/k4e5NS.Vb5O5XFzeJEcgBDC2KSNrktH./TbEP8TM2e', '2ga1ePDreEYuXVAk5MbVn9c5j1NIUWSV0FIVqfnOColhRQY0VJlSYI5Mm0k8', '2018-12-28 08:49:11', '2018-12-28 08:49:12'),
	(3, 'Justin', 'justin@www.com', '2018-12-28 08:49:08', '$2y$10$JSuMbq0GsV/k4e5NS.Vb5O5XFzeJEcgBDC2KSNrktH./TbEP8TM2e', '2ga1ePDreEYuXVAk5MbVn9c5j1NIUWSV0FIVqfnOColhRQY0VJlSYI5Mm0k8', '2018-12-28 08:49:11', '2018-12-28 08:49:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
