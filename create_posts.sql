CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` varchar(1024) NOT NULL,
  `image` mediumblob NOT NULL,
  `likes` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;