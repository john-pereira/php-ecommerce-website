-- CREATE A DATABASE NAMED bread_shop
CREATE DATABASE bread_shop;

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
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
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



CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  PRIMARY KEY (`payment_id`)
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



-- INSERTING DATA

-- Featured Products
-- Baked Bread
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Sourdough White', 'white', 'Our standard sourdough', 'baguete-4.png', 'banner-05.jpg', 'banner-05.jpg', 'banner-05.jpg', 7.00);

-- Muffins
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Fresh Muffin', 'muffin', 'Delicious fresh muffin', 'muffin-05.png', 'muffin-02.png', 'muffin-03.png', 'muffin-04.png', 4.50);

-- Croassant
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('French Croissant', 'croissant', 'Original french croissant', 'croissant-01.png', 'croissant-02.png', 'croissant-03.png', 'croissant-04.png', 7.50);

-- Cupcake
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Delicious Cupcake', 'cupcake', 'Super tasty cupcake', 'cupcake-01.png', 'cupcake-02.png', 'cupcake-03.png', 'cupcake-04.png', 6.90);

-- categorized_product
INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Sliced Breads', 'categorized_product', 'Healthy sliced breads', 'sliced-bread-01.png', 'sliced-bread-02.png', 'sliced-bread-03.png', 'sliced-bread-04.png', 3.90);

INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Baguetes', 'categorized_product', 'Classic baguetes', 'baguete-02.png', 'baguete-02.png', 'baguete-02.png', 'baguete-02.png', 1.90);

INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Croissants', 'categorized_product', 'Originals french croissants', 'croissant-02.png', 'croissant-02.png', 'croissant-02.png', 'croissant-02.png', 6.90);

INSERT INTO `products`(`product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`,`product_price`) 
VALUES ('Breads', 'categorized_product', 'Baked breads', 'bread-02.png', 'bread-02.png', 'bread-02.png', 'bread-02.png', 1.00);

--Jobs
--IT jobs
INSERT INTO `jobs`(`job_name`, `job_category`, `job_description`, `job_image`) 
VALUES ('PHP Developer', 'IT', 'Looking for Junior PHP developer with 2 years of experience in e-commerce development', 'job-01.png');

INSERT INTO `jobs`(`job_name`, `job_category`, `job_description`, `job_image`) 
VALUES ('Web Designer', 'IT', 'Looking for Web Designer with 1 year of experience with Figma to built amazing webpage designers', 'job-02.png');

--Retails job
INSERT INTO `jobs`(`job_name`, `job_category`, `job_description`, `job_image`) 
VALUES ('Store Manager', 'retail', 'Looking for experient manager to run the store, must be able to work under pressure', 'job-03.png');

INSERT INTO `jobs`(`job_name`, `job_category`, `job_description`, `job_image`) 
VALUES ('Shop Assistant', 'retail', 'This role is ideal for an enthusiastic multi-tasker, who is searching for an exciting career opportunity with a Company targeting significant growth plans within the NSW & Australian market.', 'job-04.png');