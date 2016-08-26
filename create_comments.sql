CREATE TABLE Comments(
    cid INT,
    eid INT,
    rating INT,
    email VARCHAR(255),
    body VARCHAR(2000),
    CONSTRAINT rating_ck CHECK (rating BETWEEN 0 AND 5),
    PRIMARY KEY (cid),
    FOREIGN KEY (eid) REFERENCES Events (eid),
    FOREIGN KEY (email) REFERENCES Users (email)
)
