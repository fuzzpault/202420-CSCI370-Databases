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
    FOREIGN KEY (Email_id) REFERENCES MyUser(Email),
    FOREIGN KEY (List_id) REFERENCES List_name(ID)
    );
    
INSERT INTO List_name (Name)
VALUES ("News"),("Sports"),("Coupons"),("Spam");

INSERT INTO MyUser (Email)
VALUES ("noodle@aol.com"),("spam@aol.com"),("greg@hotmail.com");

SELECT * FROM List_name;

INSERT INTO List_User (Email_id, List_id)
VALUES ("greg@hotmail.com", 1);

SELECT * FROM List_User
INNER JOIN MyUser
ON MyUser.Email = List_User.Email_id 
INNER JOIN  List_name
ON  List_name.ID = List_User.List_id;