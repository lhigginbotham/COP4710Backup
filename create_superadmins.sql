CREATE TABLE SuperAdmins (
    email VARCHAR(255) NOT NULL,
    permissions INT NOT NULL,
    FOREIGN KEY (email) REFERENCES Users(email)
)