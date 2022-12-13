-- CREATE A DATABASE NAMED bread_shop
CREATE DATABASE bread_shop;

USE bread_shop;

-- CREATE THE TABLES FOR THE DB
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL, /* 9999.99 */
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `order_date` DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_quantity` int(99) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_pickup_date` varchar(255) NOT NULL,
  `product_pickup_time` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UX_Constraint` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(100) NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `job_image` varchar(255) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `jobs_applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `class_category` varchar(100) NOT NULL,
  `class_description` varchar(255) NOT NULL,
  `class_image` varchar(255) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- INSERTING DATA

-- Featured Products
-- Sourdough White
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Sourdough White', 'white', 'Our standard sourdough', 'sourdough_white-01.png', 'sourdough_white-02.png', 'sourdough_white-03.png', 'sourdough_white-04.png', 7.00);

-- Sourdough Rye
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Sourdough Rye', 'rye', 'Sourdough created with 50% rye flour', 'sourdough_rye-01.png', 'sourdough_rye-02.png', 'sourdough_rye-03.png', 'sourdough_rye-04.pngg', 8.00);

-- Sourdough Spelt
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Sourdough Spelt', 'spelt', 'Sourdough created with 100% spelt flour', 'sourdough_spelt-01.png', 'sourdough_spelt-02.png', 'sourdough_spelt-03.png', 'sourdough_spelt-04.png', 9.00);

-- Sourdough Seeded
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Sourdough Seeded', 'seeded', 'Sourdough including a mixture of yummy seeds', 'sourdough_seeded-01.png', 'sourdough_seeded-02.png', 'sourdough_seeded-03.png', 'sourdough_seeded-04.png', 9.50);


-- Jobs
-- IT jobs
INSERT INTO `jobs`(`job_name`, `job_category`, `job_description`, `job_image`) 
VALUES ('PHP Developer', 'IT', 'Looking for Junior PHP developer with 2 years of experience in e-commerce development', 'job-01.png');

INSERT INTO `jobs`(`job_name`, `job_category`, `job_description`, `job_image`) 
VALUES ('Web Designer', 'IT', 'Looking for Web Designer with 1 year of experience with Figma to built amazing webpage designers', 'job-02.png');

-- Retails job
INSERT INTO `jobs`(`job_name`, `job_category`, `job_description`, `job_image`) 
VALUES ('Store Manager', 'retail', 'Looking for experient manager to run the store, must be able to work under pressure', 'job-03.png');

INSERT INTO `jobs`(`job_name`, `job_category`, `job_description`, `job_image`) 
VALUES ('Shop Assistant', 'retail', 'This role is ideal for an enthusiastic multi-tasker, who is searching for an exciting career opportunity with a Company targeting significant growth plans within the NSW & Australian market.', 'job-04.png');

-- Classes
INSERT INTO `classes`(`class_name`, `class_category`, `class_description`, `class_image`) 
VALUES ('Sourdough bread making classes', 'bread-making', 'First Saturday of every month. 9 am to 5 pm with lunch provided.
Learn to make your own bread $350 plus GST', 'class-01.png');
