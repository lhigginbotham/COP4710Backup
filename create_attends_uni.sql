CREATE TABLE Attends_uni (
    uid INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (uid, email),
    FOREIGN KEY (uid) REFERENCES Universities(uid),
    FOREIGN KEY (email) REFERENCES Users(email)
)