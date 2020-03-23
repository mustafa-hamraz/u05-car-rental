DROP DATABASE IF EXISTS rental;
CREATE DATABASE rental;
USE rental;

CREATE TABLE customers
(
    person_number CHAR(12) NOT NULL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    postal_address VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL
);

CREATE TABLE cars
(
    registration_number CHAR(12) NOT NULL PRIMARY KEY,
    make VARCHAR(255) NOT NULL,
    color VARCHAR(255) NOT NULL,
    year VARCHAR(255) NOT NULL,
    price INT NOT NULL
);

CREATE TABLE rental
(
    person_number VARCHAR(255) NOT NULL,
    registration_number VARCHAR(255) NOT NULL,
    rental_start_time VARCHAR(255) NOT NULL,
    FOREIGN KEY (person_number) REFERENCES customers(person_number),
    FOREIGN KEY (registration_number) REFERENCES cars(registration_number)
);

CREATE TABLE history
(
    person_number VARCHAR(255) NOT NULL,
    registration_number VARCHAR(255) NOT NULL,
    rental_start_time VARCHAR(255) NOT NULL,
    rental_end_time VARCHAR(255) NOT NULL
);
--Add 
INSERT INTO customers (person_number, name, address, postal_address, phone_number)
    VALUES  ("199604054495", "Mustafa Hamraz", "Ostergatan10", "15243 Sodertalje", "0704915656"),
            ("200012041020", "Muji Basharmal", "Jarnavagen10", "15530 Nykvarn", "0701238998");
INSERT INTO cars (registration_number, make, color, year, price)
    VALUES  ("ABC123", "Ford", "Grey", "2004", 340.50),
            ("XYZ999", "Volvo", "Black", "2009", 499);
INSERT INTO rental (person_number, registration_number, rental_start_time)
    VALUES  ("199604054495", "XYZ999", "2020-03-28 08:30:00"),
            ("200012041020", "ABC123", "2020-03-20 12:00:00");
INSERT INTO history (person_number, registration_number, rental_start_time, rental_end_time)
    VALUES  ("199604054495", "XYZ999", "2020-03-18 08:30", "2020-03-19 10:30"),
            ("200012041020", "ABC123", "2020-03-20 12:00", "2020-03-22 12:00");

--REMOVE
DELETE FROM rental WHERE person_number = "199604054495";
DELETE FROM customers WHERE person_number = "199604054495";
DELETE FROM cars WHERE registration_number = "ABC123";
DELETE FROM history WHERE person_number = "199604054495";

--EDIT
UPDATE customers 
    SET name="Musse", address="Hemma", postal_address="15530", phone_number="0700000000"
WHERE person_number = "199604054495";

UPDATE cars
    SET make="Tesla", color="white", year="2020", price=999
WHERE registration_number = "ABC123";

--SHOW
SELECT * FROM customers;
SELECT * FROM cars;

SELECT EXISTS(SELECT * FROM customers WHERE person_number="199604054495");