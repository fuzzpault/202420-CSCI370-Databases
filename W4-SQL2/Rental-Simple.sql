-- Rental Starter

DROP DATABASE IF EXISTS Rental;
CREATE DATABASE Rental;

USE Rental;

DROP TABLE IF EXISTS House;

CREATE TABLE House
(id INT PRIMARY KEY AUTO_INCREMENT,
 street VARCHAR(35),
 city VARCHAR(10),
 zip VARCHAR(5), 
 rent DECIMAL(7, 2) NOT NULL DEFAULT '0.0',
 sqft FLOAT DEFAULT '0.0',
 bedrooms SMALLINT,
 baths SMALLINT,
 utilities TINYINT
);

INSERT INTO House (street, city, zip, rent, sqft, bedrooms, baths, utilities) 
VALUES ('1376 Clear Place','Fishers','46038','850.25',500,2,1,0),
  ('10871 126th St.','Fishers','46038','1200.00',1100,4,2,1),
  ('7845 Clear Vista','Fishers','46037','1100',855.2,2,2,0),
  ('8954 Front St.','Carmel','46032','1200.0',600.5,3,1,0),
  ('7833 Normal St.','Carmel','46032','745.50',300,1,1,1),
  ('120 Rough St.','Indianapolis','46107','500.00',450,2,1,0),
  ('7854 Hoot Ave.','Indianapolis','46106','745.50',500,1,1,0),
  ('12478 Frontage Rd.','Fishers','46037','1245.3',1010.5,3,2,1),
  ('5634 TimbuckTu Rd.','Fishers','46038','867.5',309,1,2,1);


