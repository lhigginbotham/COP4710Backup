CREATE TABLE Follows_Rso(
    oid INT,
    email VARCHAR(255),
    PRIMARY KEY (oid, email),
    FOREIGN KEY (email) REFERENCES Users(email),
    FOREIGN KEY (oid) REFERENCES Organizations(oid)
)
