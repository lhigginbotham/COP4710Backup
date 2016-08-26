CREATE TABLE Has_comments(
    cid INT,
    eid INT,
    PRIMARY KEY (cid, eid),
    FOREIGN KEY (cid) REFERENCES Comments(cid),
    FOREIGN KEY (eid) REFERENCES Events(eid)
)