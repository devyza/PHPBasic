CREATE TABLE `php-training`.`users` (
  `id` INT AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `token` VARCHAR(45),
  `tokenExpire` VARCHAR(45),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE);

INSERT INTO users (username, email, password) VALUES
("johndoe", "jd@gmail.com", "abcd");

INSERT INTO users (username, email, password) VALUES
("freeman", "freeman404.it@gmail.com", "abcd");

INSERT INTO users (username, email, password) VALUES
("test", "freeman404.test@gmail.com", "abcd");

SELECT * FROM Users;

DROP TABLE users;