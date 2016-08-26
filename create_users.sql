CREATE TABLE Users (
    email VARCHAR(255),
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (email)
)