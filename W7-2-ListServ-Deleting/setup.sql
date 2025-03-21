DROP DATABASE if EXISTS ListServ;
CREATE DATABASE ListServ;

USE ListServ;

CREATE TABLE List_name (
    ID INT PRIMARY KEY AUTO_INCREMENT, 
    Name VARCHAR(20)
    );
    
CREATE TABLE MyUser (
    Email VARCHAR(20),
    PRIMARY KEY (Email)
    );
    
CREATE TABLE List_User (
    Email_id VARCHAR(20),
    List_id INT,
    PRIMARY KEY (Email_id, List_id),
    FOREIGN KEY (Email_id) REFERENCES MyUser(Email)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (List_id) REFERENCES List_name(ID)
    ON DELETE CASCADE ON UPDATE CASCADE
    );