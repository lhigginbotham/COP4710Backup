CREATE TABLE Events (
    eid INT,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(2000) NOT NULL,
    category INT NOT NULL,
    sdate DATE NOT NULL,
    edate DATE NOT NULL,
    stime TIME NOT NULL,
    etime TIME NOT NULL,
    address VARCHAR(255) NOT NULL,
    latitude FLOAT NOT NULL,
    longitude FLOAT NOT NULL,
    phone INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    visibility INT NOT NULL,
    rsvp INT NOT NULL,
    PRIMARY KEY (eid)
    FOREIGN KEY (uid) REFERENCES Universities (uid)
)
