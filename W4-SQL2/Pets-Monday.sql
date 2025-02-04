USE Animals;

SELECT 'Q1';        
SELECT * from Pets;

SELECT 'Q2';
UPDATE Pets
SET Vacc = 0
WHERE Age > 5;

SELECT * from Pets
WHERE Type IN ("Dog","Cat");

SELECT * from Pets
WHERE Age BETWEEN 2 AND 5;

SELECT DISTINCT Name,Owner from Pets;

SELECT DISTINCT * from Pets
ORDER BY Age DESC;

SELECT Name, ROUND(Age,0) from Pets;

SELECT CONCAT(Name, " ", Age) from Pets;

SELECT AVG(Age), AVG(Vacc) from Pets;

SELECT Owner, Count(*) from Pets
GROUP BY Owner;

SELECT COUNT(*), Vacc from Pets
GROUP BY Vacc;