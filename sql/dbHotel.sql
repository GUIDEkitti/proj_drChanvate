USE 642db;

DROP TABLE IF EXISTS Guests;

DROP TABLE IF EXISTS Rooms;

DROP TABLE IF EXISTS Statuses;

DROP TABLE IF EXISTS Bookings;

DROP TABLE IF EXISTS Payments;

DROP TABLE IF EXISTS Employees;

DROP TABLE IF EXISTS Services;

DROP TABLE IF EXISTS BookingServices;

CREATE TABLE Guests(
    GuestID INT(6) PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    UserName VARCHAR(50) NOT NULL UNIQUE,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Passkey VARCHAR(14) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    Roll INT(1) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8;

CREATE TABLE Rooms(
    RoomID INT(3) PRIMARY KEY AUTO_INCREMENT,
    RoomNumber VARCHAR(10) UNIQUE NOT NULL,
    RoomType VARCHAR(50) NOT NULL,
    Capacity INT,
    PricePerNight INT(10) NOT NULL,
    STATUS INT (1)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

CREATE TABLE Statuses(
    STATUS INT (1) PRIMARY KEY AUTO_INCREMENT,
    StatusTitle VARCHAR(10) UNIQUE NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

CREATE TABLE Bookings(
    BookingID INT PRIMARY KEY AUTO_INCREMENT,
    GuestID INT NOT NULL,
    RoomID INT NOT NULL,
    CheckInDate DATE NOT NULL,
    CheckOutDate DATE NOT NULL,
    BookingDate DATE NOT NULL,
    TotalAmount DECIMAL(10, 2) NOT NULL,
    STATUS INT (1),
    FOREIGN KEY(GuestID) REFERENCES Guests(GuestID),
    FOREIGN KEY(RoomID) REFERENCES Rooms(RoomID)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

CREATE TABLE Payments(
    PaymentID INT(10) PRIMARY KEY AUTO_INCREMENT,
    BookingID INT NOT NULL,
    PaymentDate DATE NOT NULL,
    Amount DECIMAL(10, 2) NOT NULL,
    PaymentMethod VARCHAR(50) NOT NULL,
    -- เช่น Credit Card, Cash, Bank Transfer
    FOREIGN KEY(BookingID) REFERENCES Bookings(BookingID)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

CREATE TABLE Employees(
    EmployeeID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    POSITION VARCHAR(50) NOT NULL,
    HireDate DATE NOT NULL,
    Salary DECIMAL(10, 2) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Phone VARCHAR(20) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

CREATE TABLE Services(
    ServiceID INT PRIMARY KEY AUTO_INCREMENT,
    ServiceName VARCHAR(100) NOT NULL,
    Description TEXT NOT NULL,
    Price DECIMAL(10, 2) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;

CREATE TABLE BookingServices(
    BookingServiceID INT PRIMARY KEY AUTO_INCREMENT,
    BookingID INT NOT NULL,
    ServiceID INT NOT NULL,
    Quantity INT NOT NULL,
    TotalPrice DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY(BookingID) REFERENCES Bookings(BookingID),
    FOREIGN KEY(ServiceID) REFERENCES Services(ServiceID)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT = 1;