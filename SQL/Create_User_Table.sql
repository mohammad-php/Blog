CREATE TABLE `user` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `password` varchar(200) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `id_UNIQUE` (`id`),
    UNIQUE KEY `name_UNIQUE` (`name`),
    KEY `name_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
