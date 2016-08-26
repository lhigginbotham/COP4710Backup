CREATE TABLE Hosts(
    eid INT,
    email VARCHAR(255),
    PRIMARY KEY (eid, email),
    FOREIGN KEY (email) REFERENCES Admins(email),
    FOREIGN KEY (eid) REFERENCES Events(eid)
)