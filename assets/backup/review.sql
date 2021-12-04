SET foreign_key_checks = 0;
#
# TABLE STRUCTURE FOR: category
#

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO `category` (`id`, `name`, `description`) VALUES (6, 'Entertainment', 'Movies Compfany ');
INSERT INTO `category` (`id`, `name`, `description`) VALUES (8, 'Restaurants & Bars', ' fsdfsdf');
INSERT INTO `category` (`id`, `name`, `description`) VALUES (9, 'Beauty & Fitness', '');
INSERT INTO `category` (`id`, `name`, `description`) VALUES (10, 'Media & Publishing', '');
INSERT INTO `category` (`id`, `name`, `description`) VALUES (11, 'Travel & Vacations', '');
INSERT INTO `category` (`id`, `name`, `description`) VALUES (12, 'Technology & Gadgets', '');
INSERT INTO `category` (`id`, `name`, `description`) VALUES (13, 'Hotels', '');


#
# TABLE STRUCTURE FOR: comments
#

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` text DEFAULT NULL,
  `review_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `comments` (`id`, `comments`, `review_id`, `user_id`, `timestamp`) VALUES (1, 'Nice preeee', 1, 1, '2021-09-28 21:20:44');
INSERT INTO `comments` (`id`, `comments`, `review_id`, `user_id`, `timestamp`) VALUES (2, 'Proin eget tortor risus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat.', 2, 1, '2021-09-28 21:23:10');


#
# TABLE STRUCTURE FOR: establishment
#

DROP TABLE IF EXISTS `establishment`;

CREATE TABLE `establishment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook_url` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `logo` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `establishment_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

INSERT INTO `establishment` (`id`, `category_id`, `name`, `phone`, `email`, `facebook_url`, `website`, `address`, `description`, `status`, `logo`, `image`, `date`, `user_id`) VALUES (10, 8, 'Novo', '02324324324', 'novo@gmail.com', 'https://www.facebook.com/ppglgg/videos/1023717825094342', 'https://localhost.com', 'Oroquieta City', 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', 'Active', NULL, NULL, '2021-09-17 15:59:57', 1);
INSERT INTO `establishment` (`id`, `category_id`, `name`, `phone`, `email`, `facebook_url`, `website`, `address`, `description`, `status`, `logo`, `image`, `date`, `user_id`) VALUES (11, 8, 'Jollibee', '02515454ewq', 'joll@gmail.com', 'https://www.facebook.com/cajanr', 'https://www.facebook.com', 'Oroquieta City', 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', 'Active', NULL, NULL, '2021-09-17 16:00:35', 1);
INSERT INTO `establishment` (`id`, `category_id`, `name`, `phone`, `email`, `facebook_url`, `website`, `address`, `description`, `status`, `logo`, `image`, `date`, `user_id`) VALUES (12, 8, 'Samsung', '0245644565', 'cajanr02@gmail.com', 'https://www.facebook.com/ppglgg/videos/1023717825094342', 'https://localhost.com', 'Parpagayo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.', 'Active', '6c52412736d6a759e0eaccc55f73904a.png', '510e713419c9d9444a734b221970f258.png', '2021-09-17 16:16:07', 1);
INSERT INTO `establishment` (`id`, `category_id`, `name`, `phone`, `email`, `facebook_url`, `website`, `address`, `description`, `status`, `logo`, `image`, `date`, `user_id`) VALUES (15, 6, 'ABS CBNdasdsa', '0245644565', 'cajanr02@gmail.com', 'https://www.facebook.com/ppglgg/videos/1023717825094342', 'https://localhost.com', 'Parpagayo', 'fdsfdsfdsf', 'Pending', NULL, NULL, '2021-09-17 16:56:52', 14);


#
# TABLE STRUCTURE FOR: inquiry
#

DROP TABLE IF EXISTS `inquiry`;

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: review
#

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estab_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `ratings` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`),
  KEY `estab_id` (`estab_id`),
  CONSTRAINT `review_ibfk_1` FOREIGN KEY (`estab_id`) REFERENCES `establishment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `review` (`id`, `estab_id`, `title`, `details`, `ratings`, `user_id`, `timestamp`, `status`) VALUES (1, 10, 'BARANGAY CLEARANCE', 'khjkhjk', 4, 1, '2021-09-28 08:19:13', 'Published');
INSERT INTO `review` (`id`, `estab_id`, `title`, `details`, `ratings`, `user_id`, `timestamp`, `status`) VALUES (4, 12, 'RESIDENCY CERTIFICATE', 'Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Proin eget tortor risus.', 5, 1, '2021-09-28 09:36:00', 'Published');
INSERT INTO `review` (`id`, `estab_id`, `title`, `details`, `ratings`, `user_id`, `timestamp`, `status`) VALUES (5, 12, 'RESIDENCY CERTIFICATE', 'Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim.', 4, 1, '2021-09-28 09:37:12', 'Published');
INSERT INTO `review` (`id`, `estab_id`, `title`, `details`, `ratings`, `user_id`, `timestamp`, `status`) VALUES (6, 12, 'fdsffsdfrwerewrewr', 'Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.', 5, 15, '2021-12-01 11:23:09', 'Published');


#
# TABLE STRUCTURE FOR: systems
#

DROP TABLE IF EXISTS `systems`;

CREATE TABLE `systems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_logo` text DEFAULT NULL,
  `system_name` varchar(50) DEFAULT NULL,
  `system_acronym` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `systems` (`id`, `system_logo`, `system_name`, `system_acronym`) VALUES (1, 'dfdc7875c8e90e9c891eb3292ca7ef78.jpg', 'Evaluation System', 'Eval System');


SET foreign_key_checks = 1;
