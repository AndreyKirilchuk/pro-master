-- ProMaster — MySQL 8.0
-- Пароль для всех тестовых пользователей: 123456

CREATE DATABASE IF NOT EXISTS `pro-master`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `pro-master`;

DROP TABLE IF EXISTS `stickers`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `stickers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `sticker_name` VARCHAR(255) NOT NULL,
  `stage_name` VARCHAR(255) NOT NULL,
  `stage_number` VARCHAR(10) NOT NULL,
  `description` TEXT NOT NULL,
  `file_path` VARCHAR(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES
('Алексей Иванов', 'alex@mail.ru', '$2y$12$y5mN0GFUR7JqNq7sV1KB/O2.kRXwcsvp9l.qGqxKmYTh4NLd4QPnq', 'user'),
('Админ Системы', 'admin@promaster.ru', '$2y$12$y5mN0GFUR7JqNq7sV1KB/O2.kRXwcsvp9l.qGqxKmYTh4NLd4QPnq', 'admin');

INSERT INTO `stickers` (`sticker_name`, `stage_name`, `stage_number`, `description`, `file_path`) VALUES
(
  'Пропуск в эфир',
  'Первый день в компании',
  '1',
  'Награда за «Первый день в компании»: ты познакомился с командой, выбрал направление и создал свой первый слоган.',
  'assets/rewards/broadcast-pass.png'
),
(
  'Мастер пикселей',
  'Дизайн-Атака',
  '2',
  'Награда за «Дизайн-Атаку»: логотип готов, визуальная концепция кампании собрана — ты настоящий дизайнер!',
  'assets/rewards/design-attack.png'
),
(
  'Звезда охватов',
  'SMM-Челлендж',
  '3',
  'Награда за «SMM-Челлендж»: контент-план составлен, визуалы подобраны — соцсети клиента в надёжных руках.',
  'assets/rewards/smm-challenge.png'
),
(
  'Кодовый гений',
  'IT-Мастер',
  '4',
  'Награда за «IT-Мастер»: landing page свёрстан или интерактив работает — техническая задача выполнена на отлично.',
  'assets/rewards/it-master.png'
),
(
  'Король слова',
  'Командная защита',
  '5',
  'Награда за «Командную защиту»: идея представлена заказчику уверенно и убедительно — команда гордится тобой!',
  'assets/rewards/team-defanse.png'
),
(
  'Легенда агентства',
  'Вершина мастерства',
  '6',
  'Главная награда за «Вершину мастерства»: комплексная кампания защищена — ты настоящий профи агентства!',
  'assets/rewards/pinnacle-master.png'
);
