CREATE TABLE Is_part_of(
    oid INT,
    uid INT,
    PRIMARY KEY (oid, uid),
    FOREIGN KEY (oid) REFERENCES Organizations(oid),
    FOREIGN KEY (uid) REFERENCES Universities(uid)
)