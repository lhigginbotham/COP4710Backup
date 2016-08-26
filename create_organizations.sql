CREATE TABLE Organizations (
    oid INT,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(2000) NOT NULL,
    email VARCHAR(255) NOT NULL,
    uid INT NOT NULL,
    otype INT NOT NULL,
    PRIMARY KEY (oid),
)