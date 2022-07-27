DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app; 

CREATE TABLE contacts(
    id  int auto_increment PRIMARY KEY,
    name varchar(255), 
    phone_number int(255)
);

CREATE TABLE users(
    id int AUTO_INCREMENT not null PRIMARY KEY, 
    name VARCHAR(255) not null, 
    email VARCHAR(255) not null,
    password varchar(255) not null
);
INSERT INTO contacts VALUES(null, 'Ketty', '3124848309');
