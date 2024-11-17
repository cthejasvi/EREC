-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 08:51 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  INDEX name_index (`name`)
  
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `name`) VALUES
(1, 'chinmaya', 'ctus1', 'chinmaya'),
(2, 'ganesh', 'gan12', 'ganesh');







--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  primary key(id)
) ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Drinks'),
(2, 'biscuits'),
(3,'fruits'),
(4,'vegetables'),
(5,'bakery items');



-- --------------------------------------------------------




--
-- Table structure for table `supliers`
--

CREATE TABLE IF NOT EXISTS `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `note` varchar(500) NOT NULL,
  primary key(suplier_id),
   foreign key(contact_person) references admin(name) on delete cascade
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
('1', 'rama', 'kabaka', '6366616454 ', 'chinmaya', 'very intelligent');

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `date_arrival` varchar(500) NOT NULL,
  primary key(product_id),
  foreign key(category_id) references category(id) on delete cascade
  
);

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`,  `price`, `qty`, `date_arrival`) VALUES
(1,  '1', 'fanta ',  '150', 4, '2018-02-06'),
(2,  '2', 'parle-g',  '30', 5,  '2023-04-06'),
(3,  '3', 'apple', '70', 10,  '2019-06-08'),
(4,  '4', 'tomato ',  '110', 6,  '2020-07-10'),
(5,  '5', 'cake ',  '15', 8, '2024-09-28');

-- --------------------------------------------------------


--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  primary key(id),
  INDEX name_index (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `profession`,`email`) VALUES
(1, 'shekhar', 'Shek1', 'shekhar', 'singer','shek@gmail.com'),
(2, 'sooraj', 'Soor12', 'sooryakanth', 'news reporter','soor@gmail.com'),
(3, 'shankar', 'Shk123', 'shankara', 'electrician','shk@gmail.com');


--
-- Table structure for table `customer`
--



CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `suplier_id` int(11) NOT NULL,
  PRIMARY KEY (customer_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
  FOREIGN KEY (suplier_id) REFERENCES supliers(suplier_id) ON DELETE CASCADE,
  FOREIGN KEY(customer_name) REFERENCES user(name) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--




-- Create customer_log table
CREATE TABLE IF NOT EXISTS `customer_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
   `customer_name` varchar(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `date_arrival` varchar(500) NOT NULL,
  `action` varchar(50) NOT NULL,
  PRIMARY KEY (`log_id`),
  FOREIGN KEY (`customer_id`) REFERENCES `customer`(`customer_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DELIMITER //

CREATE TRIGGER customer_insert_trigger
AFTER INSERT ON customer
FOR EACH ROW
BEGIN
    DECLARE product_name_var VARCHAR(200);
    DECLARE supplier_name_var VARCHAR(100);
    DECLARE date_arrival_var VARCHAR(500);

    -- Declare cursor for selecting products information
    DECLARE products_cursor CURSOR FOR
    SELECT p.product_name, s.suplier_name, p.date_arrival
    FROM products p
    INNER JOIN supliers s ON s.suplier_id = NEW.suplier_id
    WHERE p.product_id = NEW.product_id;

    -- Open the cursor
    OPEN products_cursor;

    -- Loop through the cursor
    FETCH products_cursor INTO product_name_var, supplier_name_var, date_arrival_var;

    -- Insert into customer_log for each row
    INSERT INTO customer_log (customer_id, customer_name, product_name, supplier_name, date_arrival, action)
    VALUES (NEW.customer_id, NEW.customer_name, product_name_var, supplier_name_var, date_arrival_var, 'Inserted');

    -- Close the cursor
    CLOSE products_cursor;
END;
//
DELIMITER //

CREATE TRIGGER customer_update_trigger
BEFORE UPDATE ON customer
FOR EACH ROW
BEGIN
    DECLARE product_name_var VARCHAR(200);
    DECLARE supplier_name_var VARCHAR(100);
    DECLARE date_arrival_var VARCHAR(500);

    -- Declare cursor for selecting products information
    DECLARE products_cursor CURSOR FOR
    SELECT p.product_name, s.suplier_name, p.date_arrival
    FROM products p
    INNER JOIN supliers s ON s.suplier_id = NEW.suplier_id
    WHERE p.product_id = NEW.product_id;

    -- Open the cursor
    OPEN products_cursor;

    -- Loop through the cursor
    FETCH products_cursor INTO product_name_var, supplier_name_var, date_arrival_var;

    -- Delete the previous entry from customer_log
    DELETE FROM customer_log
    WHERE customer_id = OLD.customer_id
    ORDER BY log_id DESC
    LIMIT 1;

    -- Insert a new entry with the updated information
    INSERT INTO customer_log (customer_id, customer_name, product_name, supplier_name, date_arrival, action)
    VALUES (OLD.customer_id, NEW.customer_name, product_name_var, supplier_name_var, date_arrival_var, 'Updated');

    -- Close the cursor
    CLOSE products_cursor;
END;
//













CREATE TRIGGER customer_delete_log_trigger
AFTER DELETE ON customer
FOR EACH ROW
BEGIN
    -- Delete most recent entry from customer_log
    DELETE FROM customer_log 
    WHERE customer_id = OLD.customer_id 
    ORDER BY log_id DESC 
    LIMIT 1;
END;
//

DELIMITER ;






ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);


ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--




-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


