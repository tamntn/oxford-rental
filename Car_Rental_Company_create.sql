-- Created by Tam Nguyen
ALTER TABLE Reservation DROP FOREIGN KEY Reservation_Insurance;
ALTER TABLE Reservation DROP FOREIGN KEY Reservation_Customer;
ALTER TABLE Reservation DROP FOREIGN KEY Reservation_Status;
ALTER TABLE Reservation DROP FOREIGN KEY Reservation_Vehicles;
ALTER TABLE Reservation DROP FOREIGN KEY Reservation_Fee;
ALTER TABLE Reservation DROP FOREIGN KEY Reservation_Discount;
ALTER TABLE Transaction DROP FOREIGN KEY Transaction_CreditCard;
ALTER TABLE Transaction DROP FOREIGN KEY Transaction_Fee;
ALTER TABLE Transaction DROP FOREIGN KEY Transaction_Reservation;
ALTER TABLE Vehicles DROP FOREIGN KEY Vehicles_Status;
ALTER TABLE Vehicles DROP FOREIGN KEY Vehicles_Type;

DROP TABLE IF EXISTS CreditCard;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Discount;
DROP TABLE IF EXISTS Employee;
DROP TABLE IF EXISTS Fee;
DROP TABLE IF EXISTS Insurance;
DROP TABLE IF EXISTS Rental;
DROP TABLE IF EXISTS Reservation;
DROP TABLE IF EXISTS Status;
DROP TABLE IF EXISTS Transaction;
DROP TABLE IF EXISTS Type;
DROP TABLE IF EXISTS Vehicles;

-- tables
-- Table: CreditCard
CREATE TABLE CreditCard (
    CC_number char(16) NOT NULL,
    type varchar(20) NOT NULL,
    name varchar(20) NOT NULL,
    exp_month int NOT NULL,
    exp_date int NOT NULL,
    security_code char(3) NOT NULL,
    PRIMARY KEY (CC_number)
);

INSERT INTO CreditCard VALUES ('1234123412341234','Visa','Meredith Brown', 5, 30, '541');
INSERT INTO CreditCard VALUES ('2345234523452345','Mastercard','Lam Nguyen', 12, 15, '487');
INSERT INTO CreditCard VALUES ('6789678967896789','Visa','Trent Small-Towns', 1, 25, '969');
INSERT INTO CreditCard VALUES ('6544376389763357','Discover','Ryan Grover', 10, 5, '359');
INSERT INTO CreditCard VALUES ('8704985174969245','Visa','Eric Lam', 3, 19, '925');
INSERT INTO CreditCard VALUES ('8704985174924595','Mastercard','Yeonju Lee', 5, 14, '295');
INSERT INTO CreditCard VALUES ('5687193487598362','American Express','Tam Dinh', 9, 10, '015');
INSERT INTO CreditCard VALUES ('1096409519662306','Mastercard','Meredith Grey', 5, 12, '872');
INSERT INTO CreditCard VALUES ('1687251987073498','Visa','Christina Yang', 9, 3, '414');
INSERT INTO CreditCard VALUES ('1097209813970872','American Express','Derek Shepard', 12, 24, '715');
INSERT INTO CreditCard VALUES ('1400234589237592','Visa','Tam Nguyen', 11, 23, '973');
INSERT INTO CreditCard VALUES ('9987936761764198','Discover','Test User', 11, 23, '913');
INSERT INTO CreditCard VALUES ('9989874620094762','Visa','Jacob Wolfe', 11, 23, '913');
INSERT INTO CreditCard VALUES ('0198674276985298','Visa','Callie Torres', 11, 23, '913');
INSERT INTO CreditCard VALUES ('9874598710486518','Mastercard','Miranda Bailey', 11, 23, '913');

-- Table: Customer
CREATE TABLE Customer (
    custID char(7) NOT NULL,
    fname varchar(20) NOT NULL,
    lname varchar(20) NOT NULL,
    street varchar(50) NOT NULL,
    city varchar(10) NOT NULL,
    state varchar(20) NOT NULL,
    zip int NOT NULL,
    phone char(10) NOT NULL,
    email varchar(30) NOT NULL,
    hashed_pw varchar(60) NOT NULL,
    DOB date NOT NULL,
    license_number varchar(20) NOT NULL,
    license_issue_date date NOT NULL,
    PRIMARY KEY (custID)
);

-- Date Insertion Format: 'YYYY-MM-DD'
INSERT INTO Customer VALUES ('CUST001','Lam','Nguyen', '7th Avenue', 'New York', 'New York', 10005, '3157482929', 'lam.nguyen@gmail.com', '$2y$10$ZWNiN2JkMTcwMTVmZjM3ZOhSxOlqPhrQ1zWaAt2sNPSM.k6pj85bG', '1994-10-23', 'MS43871654', '2014-05-02');
INSERT INTO Customer VALUES ('CUST002','Meredith','Brown', 'Taravan Street', 'San Jose', 'California', 95101, '4346031115', 'mkbrown4@gmail.com', '$2y$10$ZWNiN2JkMTcwMTVmZjM3ZOhSxOlqPhrQ1zWaAt2sNPSM.k6pj85bG', '1997-01-15', 'CA14851984', '2017-01-15');
INSERT INTO Customer VALUES ('CUST003','Trent','Small-Towns', 'West Lamar', 'Atlanta', 'Georgia', 30310, '6012344868', 'trentstowns@gmail.com', '$2y$10$ZWNiN2JkMTcwMTVmZjM3ZOhSxOlqPhrQ1zWaAt2sNPSM.k6pj85bG', '1997-06-20', 'GA4387165', '2016-08-20');
INSERT INTO Customer VALUES ('CUST004','Ryan','Grover', 'Creekmore Blvd', 'Oxford', 'Mississippi', 38655, '6623809291', 'drgrover08@gmail.com', '$2y$10$ZWNiN2JkMTcwMTVmZjM3ZOhSxOlqPhrQ1zWaAt2sNPSM.k6pj85bG', '1990-01-08', 'HA98742964', '2008-12-05');
INSERT INTO Customer VALUES ('CUST005','Tam','Dinh', 'Amazon Campus', 'Seattle', 'Washington', 98109, '4824946792', 'dinhtam@gmail.com', '$2y$10$ZWNiN2JkMTcwMTVmZjM3ZOhSxOlqPhrQ1zWaAt2sNPSM.k6pj85bG', '1996-04-09', 'WA43436G4A', '2015-10-09');
INSERT INTO Customer VALUES ('CUST006','Christine','Yungblom', 'Cotton Creek Cove', 'Oxford', 'Mississippi', 38655, '6049382949', 'christineyungblom@gmail.com', '$2y$10$ZWNiN2JkMTcwMTVmZjM3ZOhSxOlqPhrQ1zWaAt2sNPSM.k6pj85bG', '1991-09-26', 'KY48036G4A', '2008-10-05');
INSERT INTO Customer VALUES ('CUST007','Jacob','Wolfe', '15 Centerstone', 'Hattiesburg','Mississippi', 97612, '9998887777', 'jacobwolfe@gmail.com','$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1994-04-26','JW78758678','1900-01-01');
INSERT INTO Customer VALUES ('CUST008','Tam','Nguyen','300 Cotton Creek Cove','Oxford', 'Mississippi', 38655, '6014666677', 'tam.nguyen9779@gmail.com', '$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1995-03-26','VN76813763','2016-09-25');
INSERT INTO Customer VALUES ('CUST009','Christina','Yang','26 American Eagle','San Francisco', 'California', 94016, '8271569320', 'chistinayang@gmail.com', '$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1971-07-20','CY21698154','1995-02-15');
INSERT INTO Customer VALUES ('CUST010','Meredith','Grey','Beverley Hills','Los Angeles', 'California', 29692, '6014666677', 'meredithgrey@gmail.com', '$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1992-03-26','VN76813763','2016-09-25');
INSERT INTO Customer VALUES ('CUST011','Yeonju','Lee','300 Cotton Creek Cove','Tupelo', 'Mississippi', 38801, '6014666677', 'yeonjulee@gmail.com', '$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1984-03-26','VN76813763','2016-09-25');
INSERT INTO Customer VALUES ('CUST012','Eric','Lam','300 Cotton Creek Cove','Atlanta', 'Georgia', 38655, '6014666677', 'ericlam@gmail.com', '$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1997-03-26','VN76813763','2016-09-25');
INSERT INTO Customer VALUES ('CUST013','Derek','Shepard','300 Cotton Creek Cove','Lexington', 'Kentucky', 92195, '6014666677', 'derekshepard@gmail.com', '$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1989-03-26','VN76813763','2016-09-25');
INSERT INTO Customer VALUES ('CUST014','Callie','Torres','300 Cotton Creek Cove','El Paso', 'Texas', 72942, '6014666677', 'callietorres@gmail.com', '$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1982-03-26','VN76813763','2016-09-25');
INSERT INTO Customer VALUES ('CUST015','Miranda','Bailey','300 Cotton Creek Cove','Tulsa', 'Oklahoma', 42962, '6014666677', 'mirandabailey@gmail.com', '$2y$10$ZDViZjA5Y2M2ZmMyOGUzOO7msX9uo1eoEKMIei/K0fLkthI64P8p6','1990-03-26','VN76813763','2016-09-25');
INSERT INTO Customer VALUES ('CUST999','Test','User', 'Rebel Drive', 'Oxford', 'Mississippi', 38655, '6623456789', 'testuser@gmail.com', '$2y$10$ODIzYjk4MTZjMmQxYjBiYuN3obfqNGhIADWZD2OPIW.vU9VTVxUKe', '1994-10-23', '123456789', '2014-05-02');

-- Table: Discount
CREATE TABLE Discount (
    code char(5) NOT NULL,
    percentage decimal(3,2),
    discount_description varchar(255),
    PRIMARY KEY (code)
);

INSERT INTO Discount VALUES ('NODIS', 0.00, 'No Discount');
INSERT INTO Discount VALUES ('EMP01', 0.30, 'Employee Discount - 30%');
INSERT INTO Discount VALUES ('NEW05', 0.05, 'New Customer - 5%');
INSERT INTO Discount VALUES ('WKEND', 0.15, 'Weekend Rental - 15%');
INSERT INTO Discount VALUES ('EMAIL', 0.10, 'Email Discount - 10%');

-- Table: Employee
CREATE TABLE Employee (
    empID char(7) NOT NULL,
    fname varchar(20) NOT NULL,
    lname varchar(20) NOT NULL,
    street varchar(50) NOT NULL,
    city varchar(20) NOT NULL,
    state varchar(20) NOT NULL,
    zip int NOT NULL,
    phone char(10) NOT NULL,
    email varchar(30) NOT NULL,
    DOB date NOT NULL,
    salary int NOT NULL,
    date_of_hire date NOT NULL,
    date_of_termination date,
    PRIMARY KEY (empID)
);

-- Table: Fee
CREATE TABLE Fee (
    feeID char(5) NOT NULL,
    amount decimal(4,2) NOT NULL,
    fee_description char(50) NOT NULL,
    PRIMARY KEY (feeID)
);

INSERT INTO Fee VALUES ('FEE00', 0.0, 'NO FEE');
INSERT INTO Fee VALUES ('FEE01', 20.00,'Young Renter Fee (Under 25)');
INSERT INTO Fee VALUES ('FEE02', 4.99, 'Maintainence Fee');
INSERT INTO Fee VALUES ('FEE03', 9.99, 'Late Return Fee');
INSERT INTO Fee VALUES ('FEE04', 49.99, 'Damage Fee');

-- Table: Insurance
CREATE TABLE Insurance (
    insuranceID char(7) NOT NULL,
    name char(50) NOT NULL,
    daily_cost decimal(4,2) NOT NULL,
    PRIMARY KEY (insuranceID)
);

INSERT INTO Insurance VALUES ('INSUR00', 'No Insurance', 0.00);
INSERT INTO Insurance VALUES ('INSUR01', 'GEICO', 6.99);
INSERT INTO Insurance VALUES ('INSUR02', 'State Farm', 7.49);
INSERT INTO Insurance VALUES ('INSUR03', 'Progressive', 8.99);

-- Table: Status
CREATE TABLE Status (
    statusID char(5) NOT NULL,
    status_description varchar(50) NOT NULL,
    PRIMARY KEY (statusID)
);

INSERT INTO Status VALUES ('CAR-1', 'Available');
INSERT INTO Status VALUES ('CAR-2', 'Rented');
INSERT INTO Status VALUES ('CAR-3', 'Under Maintainence');
INSERT INTO Status VALUES ('RES-1', 'Reserved');
INSERT INTO Status VALUES ('RES-2', 'Cancelled');
INSERT INTO Status VALUES ('RES-3', 'Completed');

-- Table: Reservation
CREATE TABLE Reservation (
    resID char(7) NOT NULL,
    pickup_date date NOT NULL,
    dropoff_date date NOT NULL,
    rentalLength int NOT NULL,
    feeID char(5), -- add young renter fee if age < 25
    code char(5) NOT NULL, -- FK
    estimate_total decimal(10,2) NOT NULL, -- (car daily cost + insurance daily cost + fee) * days
    VIN char(17) NOT NULL,
    statusID char(5) NOT NULL,
    custID char(7) NOT NULL,
    insuranceID char(7) NOT NULL,
    PRIMARY KEY (resID)
);

INSERT INTO Reservation VALUES ('RES0001', '2017-04-23', '2017-04-26', 3, 'FEE01', 'NODIS', '143.97','JM1BK32F751234207','RES-2','CUST012','INSUR01');
INSERT INTO Reservation VALUES ('RES0002', '2017-04-04', '2017-04-08', 4, 'FEE01', 'NEW05', '319.96','2FZHAZCV05AU83466','RES-3','CUST999','INSUR02'); --
INSERT INTO Reservation VALUES ('RES0003', '2017-05-20', '2017-05-22', 2, 'FEE01', 'EMAIL', '119.99','1N4AA5AP0EC472596','RES-3','CUST007','INSUR03'); --
INSERT INTO Reservation VALUES ('RES0004', '2017-02-18', '2017-02-25', 7, 'FEE01', 'NEW05', '350.97','2LMDJ8JC1ABJ32545','RES-3','CUST005','INSUR02'); --
INSERT INTO Reservation VALUES ('RES0005', '2017-01-23', '2017-01-28', 5, 'FEE00', 'WKEND', '210.97','1G1AK52F057613322','RES-3','CUST011','INSUR03'); --
INSERT INTO Reservation VALUES ('RES0006', '2017-03-12', '2017-03-14', 2, 'FEE01', 'EMP01', '97.97','KMHCN4AC3BU617754','RES-3','CUST002','INSUR01'); --
INSERT INTO Reservation VALUES ('RES0007', '2017-04-08', '2017-04-10', 2, 'FEE01', 'WKEND', '85.97','1N4AA5AP0EC470507','RES-3','CUST003','INSUR03'); --
INSERT INTO Reservation VALUES ('RES0008', '2017-02-19', '2017-02-26', 7, 'FEE00', 'EMAIL', '310.97','WDDSJ4GB9EN073517','RES-3','CUST009','INSUR01'); --
INSERT INTO Reservation VALUES ('RES0009', '2017-01-23', '2017-01-26', 3, 'FEE00', 'NEW05', '149.97','1GYS4NKJ8FR545572','RES-3','CUST014','INSUR02'); --
INSERT INTO Reservation VALUES ('RES0010', '2017-05-23', '2017-05-26', 3, 'FEE01', 'EMP01', '159.97','JN8AZ2OE9D9541890','RES-1','CUST001','INSUR00');
INSERT INTO Reservation VALUES ('RES0011', '2016-12-24', '2016-12-31', 7, 'FEE00', 'EMAIL', '429.97','2G1FC1E37D9221649','RES-3','CUST015','INSUR01'); --
INSERT INTO Reservation VALUES ('RES0012', '2016-11-11', '2016-11-22', 11, 'FEE00', 'WKEND', '730.97','1C4AJWAG9DL654533','RES-3','CUST004','INSUR03'); --
INSERT INTO Reservation VALUES ('RES0013', '2016-10-23', '2016-10-27', 4, 'FEE01', 'NODIS', '190.97','2G1WF55E629391831','RES-3','CUST999','INSUR03'); --
INSERT INTO Reservation VALUES ('RES0014', '2016-09-15', '2016-09-17', 2, 'FEE00', 'NEW05', '110.97','1N4AA5AP1EC472706','RES-3','CUST013','INSUR02'); --
INSERT INTO Reservation VALUES ('RES0015', '2016-11-21', '2016-11-27', 6, 'FEE01', 'NEW05', '360.97','7406FH098G0496POM','RES-3','CUST008','INSUR01'); --
INSERT INTO Reservation VALUES ('RES0016', '2016-12-23', '2016-12-26', 3, 'FEE00', 'EMAIL', '110.97','2G1FC1E37F9876141','RES-3','CUST006','INSUR02'); --

-- Table: Transaction
CREATE TABLE Transaction (
    tranID char(7) NOT NULL,
    feeID char(5) NOT NULL, -- FK (extra fee after renter drop off car - IF APPLICABLE)
    tax decimal(4,2) NOT NULL,
    total_amount decimal(10,2) NOT NULL,
    tran_date date NOT NULL,
    CC_number char(16) NOT NULL, -- FK
    resID char(7) NOT NULL, -- FK
    PRIMARY KEY (tranID)
);

INSERT INTO Transaction VALUES('TRAN001', 'FEE00', 22.40, 342.36, '2017-04-09', '9987936761764198', 'RES0002');
INSERT INTO Transaction VALUES('TRAN002', 'FEE00', 8.40, 128.39, '2017-05-23', '9989874620094762', 'RES0003');
INSERT INTO Transaction VALUES('TRAN003', 'FEE00', 24.57, 375.54, '2017-02-26', '5687193487598362', 'RES0004');
INSERT INTO Transaction VALUES('TRAN004', 'FEE00', 14.77, 225.74, '2017-01-29', '8704985174924595', 'RES0005');
INSERT INTO Transaction VALUES('TRAN005', 'FEE00', 6.86, 104.83, '2017-03-15', '1234123412341234', 'RES0006');
INSERT INTO Transaction VALUES('TRAN006', 'FEE00', 6.02, 91.99, '2017-04-11', '6789678967896789', 'RES0007');
INSERT INTO Transaction VALUES('TRAN007', 'FEE00', 21.77, 332.74, '2017-02-27', '1687251987073498', 'RES0008');
INSERT INTO Transaction VALUES('TRAN008', 'FEE00', 10.50, 160.47, '2017-01-27', '0198674276985298', 'RES0009');
INSERT INTO Transaction VALUES('TRAN009', 'FEE00', 30.10, 460.07, '2017-01-01', '9874598710486518', 'RES0011');
INSERT INTO Transaction VALUES('TRAN010', 'FEE00', 51.17, 782.14, '2016-11-23', '6544376389763357', 'RES0012');
INSERT INTO Transaction VALUES('TRAN011', 'FEE00', 13.37, 204.34, '2016-10-28', '9987936761764198', 'RES0013');
INSERT INTO Transaction VALUES('TRAN012', 'FEE00', 7.77, 118.74, '2016-09-18', '1097209813970872', 'RES0014');
INSERT INTO Transaction VALUES('TRAN013', 'FEE00', 25.27, 386.24, '2016-11-29', '1400234589237592', 'RES0015');

-- Table: Type
CREATE TABLE Type (
    typeID char(5) NOT NULL,
    type_name varchar(20) NOT NULL,
    daily_rate decimal(5,2) NOT NULL,
    capacity int NOT NULL,
    PRIMARY KEY (typeID)
);

INSERT INTO Type VALUES ('TYP01','Economy', 25.99, 4);
INSERT INTO Type VALUES ('TYP02','Standard', 39.99, 5);
INSERT INTO Type VALUES ('TYP03','Full Size', 45.99, 5);
INSERT INTO Type VALUES ('TYP04','Premium', 59.99, 5);
INSERT INTO Type VALUES ('TYP05','Compact SUV', 52.99, 5);
INSERT INTO Type VALUES ('TYP06','Standard SUV', 59.99, 7);
INSERT INTO Type VALUES ('TYP07','Pickup', 57.99, 4);
INSERT INTO Type VALUES ('TYP08','Mini Van', 74.99, 7);
INSERT INTO Type VALUES ('TYP09','15-Passenger Van', 119.99, 15);
INSERT INTO Type VALUES ('TYP10','Exotic', 459.99, 2);

-- Table: Vehicles
CREATE TABLE Vehicles (
    VIN char(17) NOT NULL,
    make varchar(20) NOT NULL,
    model varchar(20) NOT NULL,
    year int NOT NULL,
    license_plate varchar(10) NOT NULL,
    typeID char(5),
    statusID char(5) NOT NULL,
    PRIMARY KEY (VIN)
);

-- Economy
INSERT INTO Vehicles VALUES ('1GD374CG0F1132151', 'Kia', 'Morning', 2014, 'MS-20845', 'TYP01', 'CAR-1');
INSERT INTO Vehicles VALUES ('1G1JC6SH5F4147376', 'Hyundai', 'i10', 2015, 'MS-42565', 'TYP01', 'CAR-1');
INSERT INTO Vehicles VALUES ('1FUJA6CKX4LN07096', 'Honda', 'Fit', 2013, 'MS-89245', 'TYP01', 'CAR-1');
INSERT INTO Vehicles VALUES ('1FUJA6C4X4LN07096', 'Ford', 'Fiesta', 2016, 'MS-92015', 'TYP01', 'CAR-3');
INSERT INTO Vehicles VALUES ('1FUJA6CKX4LN07072', 'Toyota', 'Yaris', 2015, 'MS-20624', 'TYP01', 'CAR-1');
-- Standard
INSERT INTO Vehicles VALUES ('4S4WX9GD5D4401220', 'Ford', 'Fusion', 2016, 'MS-04574', 'TYP02', 'CAR-1');
INSERT INTO Vehicles VALUES ('JM1BK32F751234207', 'Toyota', 'Camry', 2014, 'MS-04976', 'TYP02', 'CAR-1');
INSERT INTO Vehicles VALUES ('1N4AA5AP0EC472596', 'Kia', 'Optima', 2017, 'MS-08972', 'TYP02', 'CAR-1');
INSERT INTO Vehicles VALUES ('1N4AA5AP1EC472706', 'Honda', 'Accord', 2015, 'MS-82945', 'TYP02', 'CAR-1');
INSERT INTO Vehicles VALUES ('1N4AA5AP0EC470507', 'Hyundai', 'Sonata', 2015, 'MS-89125', 'TYP02', 'CAR-3');
-- Full Size
INSERT INTO Vehicles VALUES ('5NPE24AF9FH001329', 'Toyota', 'Avalon', 2013, 'MS-09816', 'TYP03', 'CAR-1');
INSERT INTO Vehicles VALUES ('2LMDJ8JC1ABJ32545', 'Kia', 'Cadenza', 2015, 'MS-23981', 'TYP03', 'CAR-1');
INSERT INTO Vehicles VALUES ('2G1WF55E629391831', 'Buick', 'LaCrosse', 2016, 'MS-67985', 'TYP03', 'CAR-1');
INSERT INTO Vehicles VALUES ('2G1WF95E629796331', 'Nissan', 'Maxima', 2016, 'MS-35791', 'TYP03', 'CAR-2');
-- Premium
INSERT INTO Vehicles VALUES ('1C3CCCBG1FN548962', 'Lexus', 'ES', 2016, 'MS-03742', 'TYP04', 'CAR-1');
INSERT INTO Vehicles VALUES ('2FZHAZCV05AU83466', 'Audi', 'A4', 2017, 'MS-74176', 'TYP04', 'CAR-1');
INSERT INTO Vehicles VALUES ('JN8AZ2NE9D9041890', 'Kia', 'K900', 2016, 'MS-70295', 'TYP04', 'CAR-1');
INSERT INTO Vehicles VALUES ('JN8AZ2OE9D9541890', 'Cadillac', 'CTS', 2015, 'MS-46489', 'TYP04', 'CAR-1');
INSERT INTO Vehicles VALUES ('JN8AZ2NE9D906F062', 'Tesla', 'Model S', 2016, 'CA-51613', 'TYP04', 'CAR-2');
INSERT INTO Vehicles VALUES ('JN8AZ2195H066F062', 'Chrysler', '300', 2017, 'CA-47621', 'TYP04', 'CAR-3');
-- Compact SUV
INSERT INTO Vehicles VALUES ('4T1BF22K71U961511', 'Mazda', 'CX-5', 2015, 'MS-02469', 'TYP05', 'CAR-1');
INSERT INTO Vehicles VALUES ('1HGCR2F74FA089742', 'Honda', 'CR-V', 2016, 'MS-67307', 'TYP05', 'CAR-1');
INSERT INTO Vehicles VALUES ('KMHCN4AC3BU617754', 'Hyundai', 'Tucson', 2015, 'MS-20925', 'TYP05', 'CAR-1');
INSERT INTO Vehicles VALUES ('7406FH098G0496POM', 'Kia', 'Sportage', 2017, 'MS-42654', 'TYP05', 'CAR-1');
INSERT INTO Vehicles VALUES ('KMHCN4AC3BU611946', 'Nissan', 'Rogue', 2014, 'MS-20925', 'TYP05', 'CAR-1');
-- Standard SUV
INSERT INTO Vehicles VALUES ('1GYS4NKJ8FR545572', 'Jeep', 'Grand Cherokee', 2014, 'MS-32496', 'TYP06', 'CAR-1');
INSERT INTO Vehicles VALUES ('5FNYF4H65CB028559', 'Ford', 'Explorer', 2015, 'MS-07256', 'TYP06', 'CAR-1');
INSERT INTO Vehicles VALUES ('WMWSV3C57CTY28792', 'Honda', 'Pilot', 2016, 'MS-01405', 'TYP06', 'CAR-1');
INSERT INTO Vehicles VALUES ('WMWS10657CTY210OG', 'Toyota', 'Highlander', 2017, 'MS-14069', 'TYP06', 'CAR-1');
-- Pickup
INSERT INTO Vehicles VALUES ('JM1BK344391249496', 'Ford', 'F-150', 2015, 'MS-57356', 'TYP07', 'CAR-1');
INSERT INTO Vehicles VALUES ('KMHDH4AE1CU482188', 'Nissan', 'Titan', 2016, 'MS-24623', 'TYP07', 'CAR-1');
INSERT INTO Vehicles VALUES ('2G1FC1E37D9221649', 'Toyota', 'Tundra', 2015, 'MS-70946', 'TYP07', 'CAR-1');
INSERT INTO Vehicles VALUES ('2G1FC1E37D9190386', 'Chevrolet', 'Silverado', 2017, 'MS-01325', 'TYP07', 'CAR-1');
INSERT INTO Vehicles VALUES ('2G1FC1E37F9876141', 'GMC', 'Canyon', 2016, 'MS-17866', 'TYP07', 'CAR-1');
-- Mini Van
INSERT INTO Vehicles VALUES ('1XP5DB9X11N569075', 'Honda', 'Odyssey', 2015, 'MS-56835', 'TYP08', 'CAR-1');
INSERT INTO Vehicles VALUES ('1G1AK52F057613322', 'Chevrolet', 'City Express', 2014, 'MS-20563', 'TYP08', 'CAR-1');
INSERT INTO Vehicles VALUES ('JN8AS5MV2BW315694', 'Kia', 'Sedona', 2016, 'MS-26842', 'TYP08', 'CAR-1');
-- 15-Passenger Van
INSERT INTO Vehicles VALUES ('JTDKN3DU8F0422373', 'Mercedes-Benz', 'Metris', 2016, 'MS-60532', 'TYP09', 'CAR-1');
INSERT INTO Vehicles VALUES ('5FNRL3H95AB024879', 'Dodge', 'Grand Caravan', 2013, 'MS-89563', 'TYP09', 'CAR-1');
INSERT INTO Vehicles VALUES ('WDDSJ4GB9EN073517', 'Mercedes-Benz', 'Sprinter', 2015, 'MS-19619', 'TYP09', 'CAR-1');
INSERT INTO Vehicles VALUES ('JN8AS5MV2BW312454', 'Ford', 'Transit Connect', 2016, 'MS-35762', 'TYP09', 'CAR-1');
-- Exotic
INSERT INTO Vehicles VALUES ('1D8GT28K37W583163', 'Lamborghini', 'Aventador', 2017, 'CA-97453', 'TYP10', 'CAR-2');
INSERT INTO Vehicles VALUES ('1C4AJWAG9DL654533', 'Porsche', '911 Carrera GTS', 2016, 'GA-98724', 'TYP10', 'CAR-2');
INSERT INTO Vehicles VALUES ('4UZAB2BS98CZ82450', 'BMW', 'i8', 2017, 'NY-19416', 'TYP10', 'CAR-2');
INSERT INTO Vehicles VALUES ('4UZAB2BS98CZ81460', 'Bentley', 'Continental GT Speed', 2017, 'WA-49186', 'TYP10', 'CAR-2');
INSERT INTO Vehicles VALUES ('4UZAB2BS98CZ01486', 'McLaren', '650S', 2016, 'FL-91359', 'TYP10', 'CAR-2');

-- foreign keys

-- Reference: Reservation_Customer (table: Reservation)
ALTER TABLE Reservation ADD CONSTRAINT Reservation_Customer FOREIGN KEY (custID)
    REFERENCES Customer (custID);

-- Reference: Reservation_Status (table: Reservation)
ALTER TABLE Reservation ADD CONSTRAINT Reservation_Status FOREIGN KEY (statusID)
    REFERENCES Status (statusID);

-- Reference: Reservation_Vehicles (table: Reservation)
ALTER TABLE Reservation ADD CONSTRAINT Reservation_Vehicles FOREIGN KEY (VIN)
    REFERENCES Vehicles (VIN);

-- Reference: Reservation_Insurance (table: Reservation)
ALTER TABLE Reservation ADD CONSTRAINT Reservation_Insurance FOREIGN KEY (insuranceID)
    REFERENCES Insurance (insuranceID);

-- Reference: Reservation_Fee (table: Reservation)
ALTER TABLE Reservation ADD CONSTRAINT Reservation_Fee FOREIGN KEY (feeID)
    REFERENCES Fee (feeID);

-- Reference: Reservation_Discount (table: Reservation)
ALTER TABLE Reservation ADD CONSTRAINT Reservation_Discount FOREIGN KEY (code)
    REFERENCES Discount (code);

-- Reference: Transaction_CreditCard (table: Transaction)
ALTER TABLE Transaction ADD CONSTRAINT Transaction_CreditCard FOREIGN KEY (CC_number)
    REFERENCES CreditCard (CC_number);

-- Reference: Transaction_Fee (table: Transaction)
ALTER TABLE Transaction ADD CONSTRAINT Transaction_Fee FOREIGN KEY (feeID)
    REFERENCES Fee (feeID);

-- Reference: Transaction_Reservation (table: Transaction)
ALTER TABLE Transaction ADD CONSTRAINT Transaction_Reservation FOREIGN KEY (resID)
    REFERENCES Reservation (resID);

-- Reference: Vehicles_Status (table: Vehicles)
ALTER TABLE Vehicles ADD CONSTRAINT Vehicles_Status FOREIGN KEY (statusID)
    REFERENCES Status (statusID);

-- Reference: Vehicles_Type (table: Vehicles)
ALTER TABLE Vehicles ADD CONSTRAINT Vehicles_Type FOREIGN KEY (typeID)
    REFERENCES Type (typeID);


COMMIT;
-- End of file.

