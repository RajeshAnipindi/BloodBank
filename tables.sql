/* CREATING DATABASE */

CREATE DATABASE IF NOT EXISTS bloodbank;

/* CREATING TABLE FOR RECEIVERS ACCOUNT */

CREATE TABLE IF NOT EXISTS `receivers` (
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `address` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobile` bigint(10) NOT NULL,  
  PRIMARY KEY (`email`), UNIQUE (`mobile`)
);

/* DUMP VALUES FOR RECEIVERS TABLE */

INSERT INTO `receivers` (`email`, `password`, `name`, `bloodgroup`, `address`, `pincode`, `mobile`) VALUES ('rajesh@gmail.com', 'rajesh', 'RAJESH', 'O+', '8-3-25/2,Roy Colony,Near Market,Srikakulam.', '532001', '8555787895');
INSERT INTO `receivers` (`email`, `password`, `name`, `bloodgroup`, `address`, `pincode`, `mobile`) VALUES ('dinesh@gmail.com', 'dinesh', 'DINESH', 'O-', '8-4-45/2,AB Colony,Near Market,Srikakulam.', '532001', '8458747851');
INSERT INTO `receivers` (`email`, `password`, `name`, `bloodgroup`, `address`, `pincode`, `mobile`) VALUES ('suresh@gmail.com', 'suresh', 'SURESH', 'A+', '2-3-4/2,Sanath Nagar Colony,Near Post Office,Hyderabad.', '500034', '9485148756');
INSERT INTO `receivers` (`email`, `password`, `name`, `bloodgroup`, `address`, `pincode`, `mobile`) VALUES ('ramesh@gmail.com', 'ramesh', 'RAMESH', 'A-', '153 B/A,Ameerpet Colony,Near BigC Store,Hyderabad.', '500047', '9177426147');
INSERT INTO `receivers` (`email`, `password`, `name`, `bloodgroup`, `address`, `pincode`, `mobile`) VALUES ('aditya@gmail.com', 'aditya', 'ADITYA', 'B+', '11 - B6,Beside Canara Bank,Suryamahal Road,Srikakulam.', '532001', '9949731138');
INSERT INTO `receivers` (`email`, `password`, `name`, `bloodgroup`, `address`, `pincode`, `mobile`) VALUES ('babji@gmail.com', 'babji', 'BABJI', 'B-', 'Street 2,Temple Street,Srikakulam.', '532001', '8978488479');
INSERT INTO `receivers` (`email`, `password`, `name`, `bloodgroup`, `address`, `pincode`, `mobile`) VALUES ('balu@gmail.com', 'balu', 'BALU', 'AB+', 'Beside RTC Complex,House No.4,Srikakulam.', '532001', '7702102979');
INSERT INTO `receivers` (`email`, `password`, `name`, `bloodgroup`, `address`, `pincode`, `mobile`) VALUES ('bhaskar@gmail.com', 'bhaskar', 'BHASKAR', 'AB-', 'Phase 2,BHEL,Lingampalli,Hyderabad.', '500056', '8008795788');

/*=====================================================================================*/


/* CREATING TABLE FOR HOSPITALS ACCOUNT */

CREATE TABLE IF NOT EXISTS `hospitals` (
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobile` bigint(10) NOT NULL,  
  PRIMARY KEY (`email`), UNIQUE (`mobile`)
);

/* DUMP VALUES FOR HOSPITALS TABLE */

INSERT INTO `hospitals` (`email`, `password`, `name`, `address`, `pincode`, `mobile`) VALUES ('apollo@gmail.com', 'apollo', 'APOLLO HOSPITALS', 'Phase 3,Hi-Tech City Main Road,Hyderabad.', '500043', '9666380234');
INSERT INTO `hospitals` (`email`, `password`, `name`, `address`, `pincode`, `mobile`) VALUES ('kims@gmail.com', 'kims', 'KIMS HOSPITALS', 'Phase 6,Maverick Road,Hyderabad.', '500043', '9652877789');
INSERT INTO `hospitals` (`email`, `password`, `name`, `address`, `pincode`, `mobile`) VALUES ('nims@gmail.com', 'nims', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');
INSERT INTO `hospitals` (`email`, `password`, `name`, `address`, `pincode`, `mobile`) VALUES ('rainbow@gmail.com', 'rainbow', 'RAINBOW HOSPITALS', 'Main Road,St. Luther Road,Hyderabad.', '500343', '7093570691');

/*=====================================================================================*/

/* CREATING TABLE FOR HOSIPITALS TO MAINTAIN THEIR BANK */

CREATE TABLE IF NOT EXISTS `mybank` (
  `email` varchar(50) NOT NULL,
  `donorname` varchar(50) NOT NULL,
  `donormobile` bigint(10) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `hospitalname` varchar(30) NOT NULL,
  `hospitaladdress` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `hospitalmobile` bigint(10) NOT NULL,  
  FOREIGN KEY (`email`) REFERENCES hospitals(`email`)
);

/* DUMP VALUES FOR MYBANK TABLE */

INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('apollo@gmail.com', 'KAMAL', '8639359713', 'O+', 'APOLLO HOSPITALS', 'Phase 3,Hi-Tech City Main Road,Hyderabad.', '500043', '9666380234');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('apollo@gmail.com', 'SURIYA', '8790078178', 'O-', 'APOLLO HOSPITALS', 'Phase 3,Hi-Tech City Main Road,Hyderabad.', '500043', '9666380234');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('apollo@gmail.com', 'SHIVA', '8790208547', 'AB+', 'APOLLO HOSPITALS', 'Phase 3,Hi-Tech City Main Road,Hyderabad.', '500043', '9666380234');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('apollo@gmail.com', 'VIJAY', '8790418479', 'AB-', 'APOLLO HOSPITALS', 'Phase 3,Hi-Tech City Main Road,Hyderabad.', '500043', '9666380234');

INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('kims@gmail.com', 'VAMSI KRISHNA', '7095917459', 'A+', 'KIMS HOSPITALS', 'Phase 6,Maverick Road,Hyderabad.', '500043', '9652877789');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('nims@gmail.com', 'SAI KRISHNA', '7285905195', 'A+', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('rainbow@gmail.com', 'SAI PAVAN', '7285984301', 'A+', 'RAINBOW HOSPITALS', 'Main Road,St. Luther Road,Hyderabad.', '500343', '7093570691');

INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('apollo@gmail.com', 'HANISHA', '8540035535', 'A-', 'APOLLO HOSPITALS', 'Phase 3,Hi-Tech City Main Road,Hyderabad.', '500043', '9666380234');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('kims@gmail.com', 'MOURYA', '7306162063', 'A-', 'KIMS HOSPITALS', 'Phase 6,Maverick Road,Hyderabad.', '500043', '9652877789');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('nims@gmail.com', 'RAKESH SANGWAN', '7330606468', 'A-', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');

INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('apollo@gmail.com', 'VINODH', '8520098938', 'B+', 'APOLLO HOSPITALS', 'Phase 3,Hi-Tech City Main Road,Hyderabad.', '500043', '9666380234');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('nims@gmail.com', 'ASHISH KUMAR', '8142550461', 'B+', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('rainbow@gmail.com', 'RAKESH NARWAL', '8179113236', 'B+', 'RAINBOW HOSPITALS', 'Main Road,St. Luther Road,Hyderabad.', '500343', '7093570691');


INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('kims@gmail.com', 'SUBHAM SINGH', '8179178101', 'B-', 'KIMS HOSPITALS', 'Phase 6,Maverick Road,Hyderabad.', '500043', '9652877789');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('nims@gmail.com', 'SHEKHAR KHANNA', '8179270146', 'B-', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('rainbow@gmail.com', 'KUNDAN SHARMA', '8179386805', 'B-', 'RAINBOW HOSPITALS', 'Main Road,St. Luther Road,Hyderabad.', '500343', '7093570691');

INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('kims@gmail.com', 'MANOJ THAKUR', '8179577641', 'O+', 'KIMS HOSPITALS', 'Phase 6,Maverick Road,Hyderabad.', '500043', '9652877789');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('nims@gmail.com', 'PRADEEP', '8179610417', 'O+', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('rainbow@gmail.com', 'MEHREEN PIRZADA', '8185019247', 'O+', 'RAINBOW HOSPITALS', 'Main Road,St. Luther Road,Hyderabad.', '500343', '7093570691');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('kims@gmail.com', 'SHEIK SULTAN', '8186858500', 'O-', 'KIMS HOSPITALS', 'Phase 6,Maverick Road,Hyderabad.', '500043', '9652877789');

INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('nims@gmail.com', 'GABBAR SINGH', '8247280343', 'O-', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('rainbow@gmail.com', 'JETIN', '8247407279', 'O-', 'RAINBOW HOSPITALS', 'Main Road,St. Luther Road,Hyderabad.', '500343', '7093570691');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('kims@gmail.com', 'CHAKRI', '8297227528', 'AB+', 'KIMS HOSPITALS', 'Phase 6,Maverick Road,Hyderabad.', '500043', '9652877789');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('nims@gmail.com', 'GIREESH', '8331843592', 'AB+', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');

INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('rainbow@gmail.com', 'SESHU', '8333082567', 'AB+', 'RAINBOW HOSPITALS', 'Main Road,St. Luther Road,Hyderabad.', '500343', '7093570691');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('kims@gmail.com', 'BHANU PRAKASH', '8374195796', 'AB-', 'KIMS HOSPITALS', 'Phase 6,Maverick Road,Hyderabad.', '500043', '9652877789');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('nims@gmail.com', 'NAVEEN BISAI', '8374275907', 'AB-', 'NIMS HOSPITAL', 'Lane 11,WaveRock,Srikakulam.', '532001', '7036683303');
INSERT INTO `mybank` (`email`, `donorname`, `donormobile`, `bloodgroup`, `hospitalname`, `hospitaladdress`, `pincode`, `hospitalmobile`) VALUES ('rainbow@gmail.com', 'JUSTIN PRAVEEN', '8374275907', 'AB-', 'RAINBOW HOSPITALS', 'Main Road,St. Luther Road,Hyderabad.', '500343', '7093570691');

/*=====================================================================================*/

/* CREATING TABLE FOR REQUESTS */

CREATE TABLE IF NOT EXISTS `requests` (
  `email` varchar(50) NOT NULL,
  `requesteremail` varchar(50) NOT NULL,
  `requestername` varchar(50) NOT NULL,
  `requestermobile` bigint(10) NOT NULL,
  `requesteraddress` text NOT NULL,
  `requestedgroup` varchar(5) NOT NULL,
  FOREIGN KEY (`email`) REFERENCES hospitals(`email`),
  FOREIGN KEY (`requesteremail`) REFERENCES receivers(`email`)
);

/* DUMP VALUES FOR REQUESTS TABLE */

INSERT INTO `requests` (`email`, `requesteremail`, `requestername`, `requestermobile`, `requesteraddress`, `requestedgroup`) VALUES ('apollo@gmail.com', 'suresh@gmail.com', 'SURESH', '9485148756', '2-3-4/2,Sanath Nagar Colony,Near Post Office,Hyderabad,', 'A+');
INSERT INTO `requests` (`email`, `requesteremail`, `requestername`, `requestermobile`, `requesteraddress`, `requestedgroup`) VALUES ('apollo@gmail.com', 'rajesh@gmail.com', 'RAJESH', '8555787895', '8-3-25/2,Roy Colony,Near Market,Srikakulam.', 'O+');
INSERT INTO `requests` (`email`, `requesteremail`, `requestername`, `requestermobile`, `requesteraddress`, `requestedgroup`) VALUES ('kims@gmail.com', 'suresh@gmail.com', 'SURESH', '9485148756', '2-3-4/2,Sanath Nagar Colony,Near Post Office,Hyderabad', 'A+');
INSERT INTO `requests` (`email`, `requesteremail`, `requestername`, `requestermobile`, `requesteraddress`, `requestedgroup`) VALUES ('kims@gmail.com', 'ramesh@gmail.com', 'RAMESH', '9177426147', '153 B/A,Ameerpet Colony,Near BigC Store,Hyderabad.', 'A-');
INSERT INTO `requests` (`email`, `requesteremail`, `requestername`, `requestermobile`, `requesteraddress`, `requestedgroup`) VALUES ('kims@gmail.com', 'aditya@gmail.com', 'ADITYA', '9949731138', '11 - B6,Beside Canara Bank,Suryamahal Road,Srikakulam.', 'B+');