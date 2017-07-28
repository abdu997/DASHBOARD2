

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;


INSERT INTO `shop` (`id`, `item`, `status`, `created_at`) VALUES
(8, 'Cutting Board', 0, '2015-05-11'),
(13, 'Peppers', 0, '2015-05-12'),
(15, 'Bread', 0, '2015-05-13'),
(16, 'Belvita bars', 0, '2015-05-13'),
(17, 'Bananas', 0, '2015-05-13');
