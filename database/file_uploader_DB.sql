-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2021-04-06 12:22:22.964

-- tables
-- Table: account
CREATE TABLE account (
    ID int NOT NULL AUTO_INCREMENT,
    Username varchar(20) NOT NULL,
    Hash_password varchar(256) NOT NULL,
    email varchar(20) NOT NULL,
    bevoegtheid int NOT NULL,
    CONSTRAINT account_pk PRIMARY KEY (ID)
) ENGINE InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;

-- Table: files
CREATE TABLE files (
    id int NOT NULL,
    account_ID int NOT NULL,
    file_name varchar(255) NOT NULL,
    file_type varchar(6) NOT NULL,
    file_size int NOT NULL,
    CONSTRAINT files_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: opslag_account (table: files)
ALTER TABLE files ADD CONSTRAINT opslag_account FOREIGN KEY opslag_account (account_ID)
    REFERENCES account (ID);

-- End of file.

