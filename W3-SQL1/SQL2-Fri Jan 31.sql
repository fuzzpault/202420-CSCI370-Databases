-- Code from Fri Jan 31, 2025

DROP DATABASE IF EXISTS ComputerParts;
CREATE DATABASE ComputerParts;

USE ComputerParts;

CREATE TABLE IF NOT EXISTS Gpus(
	ID SMALLINT AUTO_INCREMENT,
    Model VARCHAR(25),
    Manufacturer VARCHAR(50),
    Price DECIMAL(7, 2) NOT NULL DEFAULT '0.0',
    PRIMARY KEY (ID,Model)
);

CREATE TABLE IF NOT EXISTS Stock(
    ID SMALLINT AUTO_INCREMENT,
    Price DECIMAL(7, 2) NOT NULL DEFAULT '0.0',
    PartNum SMALLINT,
    PRIMARY KEY (ID),
    FOREIGN KEY (PartNum) REFERENCES Gpus(ID)
);

INSERT INTO Gpus (ID, Manufacturer, Model, Price)
VALUES (-20, 'NVIDIA', '2080', '250.00');

INSERT INTO Gpus (Manufacturer, Model, Price)
VALUES ('NVIDIA', 'H100', '25000.00'),
	('NVIDIA', '5090', '800.00'),
    ('INTEL', 'B580', '250.00');
    
  
INSERT INTO Gpus (Manufacturer, Model, Price)
VALUES ('AMD', '9070', '900.00'),
	('INTEL', 'Battle', '220');
    
    
SELECT *
FROM Gpus;