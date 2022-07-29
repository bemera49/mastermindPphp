DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app; 
CREATE TABLE users(
    id int AUTO_INCREMENT not null PRIMARY KEY, 
    name VARCHAR(255) not null, 
    email VARCHAR(255) not null,
    password varchar(255) not null
);

CREATE TABLE contacts(
    id  int auto_increment PRIMARY KEY,
    user_id int(255),
    name varchar(255), 
    phone_number int(255),
    FOREIGN KEY(user_id) REFERENCES users(id)
);
