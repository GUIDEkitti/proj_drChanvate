USE 642db;

DROP TABLE IF EXISTS pnrupic;

CREATE TABLE pnrupic (
    PnruPicID INT(1) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    PnruPicLink VARCHAR(300) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

INSERT INTO
    `pnrupic` (`PnruPicID`, `PnruPicLink`)
VALUES
    (
        NULL,
        'https://pix8.agoda.net/hotelImages/303858/-1/d2b51c41bccf6660d9bc1fb929eddc5d.jpg?ce=0&s=1024x'
    ),
    (
        NULL,
        'https://pix8.agoda.net/hotelImages/303858/-1/4204287b9f1d09dc8c9fbb6c17b1c156.jpg?ce=0&s=1024x'
    ),
    (
        NULL,
        'https://pix8.agoda.net/hotelImages/303858/-1/daec618efbfa3c164d4dffdd22af3bae.jpg?ce=0&s=1024x'
    );