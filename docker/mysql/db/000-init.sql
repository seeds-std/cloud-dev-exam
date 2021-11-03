CREATE TABLE IF NOT EXISTS `users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `exams` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `name` text NOT NULL,
  `level` integer NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `scores` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `exam_id` integer NOT NULL,
  `user_id` integer NOT NULL,
  `score` integer NOT NULL,
  FOREIGN KEY(`user_id`) REFERENCES `users` (`id`),
  FOREIGN KEY(`exam_id`) REFERENCES `exams` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
