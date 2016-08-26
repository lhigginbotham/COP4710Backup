CREATE TABLE Universities (
    uid INT,
    email VARCHAR(255) NOT NULL,
    domain VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    description VARCHAR(2000) NOT NULL,
    num_students INT NOT NULL,
    PRIMARY KEY (uid)
)