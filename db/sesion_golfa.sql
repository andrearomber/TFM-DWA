CREATE DABATABASE IF NOT EXISTS sesion_golfa;

USE sesion_golfa;

CREATE TABLE `sesion_golfa`.`actors` (
    `actor_id` INT NOT NULL AUTO_INCREMENT , 
    `first_name` VARCHAR(50) NOT NULL , 
    `last_name` VARCHAR(80) NOT NULL , 
    `birth_year` DATE NOT NULL , 
    PRIMARY KEY (`actor_id`)
) ENGINE = InnoDB;

CREATE TABLE `sesion_golfa`.`categories` (
    `category_id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(30) NOT NULL , 
    PRIMARY KEY (`category_id`)
) ENGINE = InnoDB;

CREATE TABLE `sesion_golfa`.`movies` (
    `movie_id` INT NOT NULL AUTO_INCREMENT , 
    `category_id` INT NOT NULL , 
    `title` VARCHAR(100) NOT NULL , 
    `synopsis` TEXT NOT NULL , 
    `release_year` DATE NOT NULL , 
    `duration_min` INT NOT NULL , 
    `rating` DECIMAL (10,2) , 
    `audience` VARCHAR(10) NOT NULL ,
    `url_trailer` TEXT NULL , 
    PRIMARY KEY (`movie_id`),
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE movie_actor(
    movie_id INT,
    actor_id INT,
    PRIMARY KEY (movie_id, actor_id),
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id) ON DELETE CASCADE,
    FOREIGN KEY (actor_id) REFERENCES actors(actor_id) ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE `sesion_golfa`.`sessions` (
    `session_id` INT NOT NULL AUTO_INCREMENT , 
    `movie_id` INT NOT NULL , 
    `start_time` TIME NOT NULL , 
    `end_time` TIME NOT NULL , 
    `date` DATE NOT NULL , 
    `price` DECIMAL(10,2) NOT NULL , 
    `special_event` VARCHAR(100) NULL , 
    `capacity` INT NOT NULL , 
    PRIMARY KEY (`session_id`),
    FOREIGN KEY movie_id REFERENCES movies(`movie_id`) ON DELETE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE `sesion_golfa`.`users` (
    `user_id` INT NOT NULL AUTO_INCREMENT , 
    `first_name` VARCHAR(50) NOT NULL , 
    `last_name` VARCHAR(80) NOT NULL , 
    `email` VARCHAR(80) NOT NULL , 
    `phone` VARCHAR(10) NULL , 
    PRIMARY KEY (`user_id`)
) ENGINE = InnoDB;

CREATE TABLE `sesion_golfa`.`ticket_types` (
    `ticket_type_id` INT NOT NULL AUTO_INCREMENT , 
    `ticket_name` VARCHAR(50) NOT NULL , 
    `discount` INT NOT NULL , 
    `promotion` VARCHAR(100) NULL , 
    PRIMARY KEY (`ticket_type_id`)
) ENGINE = InnoDB;

CREATE TABLE `sesion_golfa`.`bookings` (
    `booking_id` INT NOT NULL AUTO_INCREMENT , 
    `session_id` INT NOT NULL , 
    `user_id` INT NOT NULL , 
    `create_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
    `booing_status` ENUM("Aprobada", "Pendiente", "Cancelada") NOT NULL , 
    `num_attendees` INT NOT NULL , 
    PRIMARY KEY (`booking_id`),
    FOREIGN KEY(`session_id`) REFERENCES sessions(`session_id`) ON DELETE CASCADE,
    FOREIGN KEY(`user_id`) REFERENCES users(`user_id`) ON DELETE RESTRICT
) ENGINE = InnoDB;

CREATE TABLE `sesion_golfa`.`tickets` (
    `ticket_id` INT NOT NULL AUTO_INCREMENT , 
    `ticket_type` INT NOT NULL , 
    `booking_id` INT NOT NULL , 
    `ticket_price` DECIMAL(10,2) NOT NULL , 
    `token` TEXT NULL , 
    PRIMARY KEY (`ticket_id`),
    FOREIGN KEY (`ticket_type`) REFERENCES `ticket_types`(`ticket_type_id`) ON DELETE RESTRICT,
    FOREIGN KEY (`booking_id`) REFERENCES `bookings`(`booking_id`) ON DELETE CASCADE
) ENGINE = InnoDB;