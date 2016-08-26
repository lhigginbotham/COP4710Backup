CREATE TABLE Manages_org(
    oid INT,
    email VARCHAR(255),
    PRIMARY KEY (oid, email),
    FOREIGN KEY (email) REFERENCES Admins(email),
    FOREIGN KEY (oid) REFERENCES Organizations(oid)
)