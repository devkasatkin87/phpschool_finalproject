CREATE TABLE `articles` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(56) NOT NULL,
	`date_published` varchar(56) NOT NULL,
	`content` TEXT NOT NULL,
	`img` varchar(255) NOT NULL,
	`views` int(11) NOT NULL,
	`topic_id` int(11) NOT NULL,
	`author_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `authors` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(56) NOT NULL,
	`second_name` varchar(56) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `topics` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(56) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(56) NOT NULL,
	`password` varchar(255) NOT NULL,
	`is_admin` bool NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `articles` ADD CONSTRAINT `articles_fk0` FOREIGN KEY (`topic_id`) REFERENCES `topics`(`id`);

ALTER TABLE `articles` ADD CONSTRAINT `articles_fk1` FOREIGN KEY (`author_id`) REFERENCES `authors`(`id`);

