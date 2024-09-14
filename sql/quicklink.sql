USE 642db;

DROP TABLE IF EXISTS Quicklinks;

CREATE TABLE Quicklinks(
    QuicklinkID INT(1) PRIMARY KEY AUTO_INCREMENT,
    QuicklinkTitle VARCHAR(50) NOT NULL,
    QuicklinkHref VARCHAR(50) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8;

INSERT INTO
    `quicklinks` (`QuicklinkID`, `QuicklinkTitle`, `QuicklinkHref`)
VALUES
    (NULL, 'Boostrap 5', 'https://getbootstrap.com/'),
    (NULL, 'W3School', 'https://www.w3schools.com/'),
    (NULL, 'GPT', 'https://chatgpt.com/'),
    (NULL, 'Php', 'https://www.php.net/'),
    (NULL, 'Xampp', 'https://www.apachefriends.org/'),
    (NULL, 'Youtube', 'https://www.youtube.com/'),
    (
        NULL,
        'StackOverFlow',
        'https://stackoverflow.com/'
    );