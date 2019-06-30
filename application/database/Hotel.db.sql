BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS `UserMaster` (
	`UserId`	integer PRIMARY KEY AUTOINCREMENT,
	`userName`	varchar ( 255 ),
	`password`	varchar ( 255 ),
	`HotelName`	varchar ( 255 ),
	`address`	text,
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp
);
INSERT INTO `UserMaster` VALUES (1,'xxovek','12345','Jw Marriot','Senapati Bapat Rd, Laxmi Society, Model Colony, Shivajinagar, Pune, Maharashtra 411053','2019-06-15 07:35:23','2019-06-15 07:35:23');
CREATE TABLE IF NOT EXISTS `RoomTypes` (
	`roomId`	integer PRIMARY KEY AUTOINCREMENT,
	`roomType`	varchar ( 255 ) NOT NULL,
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp
);
INSERT INTO `RoomTypes` VALUES (86,'AC','2019-06-23 09:27:21','2019-06-23 09:27:21');
INSERT INTO `RoomTypes` VALUES (87,'NON-AC','2019-06-23 09:27:45','2019-06-23 09:27:45');
INSERT INTO `RoomTypes` VALUES (89,'SINGLE ROOM','2019-06-26 07:32:45','2019-06-26 07:32:45');
INSERT INTO `RoomTypes` VALUES (90,'DOUBLE ROOM','2019-06-26 07:32:54','2019-06-26 07:32:54');
CREATE TABLE IF NOT EXISTS `RoomDetails` (
	`roomId`	integer PRIMARY KEY AUTOINCREMENT,
	`roomNumber`	varchar ( 255 ) NOT NULL,
	`roomTypeId`	integer,
	`pricePerNight`	double ( 11 , 2 ),
	`maxPersons`	integer,
	`status`	varchar ( 255 ),
	`isAvailable`	boolean DEFAULT 0,
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp
);
INSERT INTO `RoomDetails` VALUES (10,'A103',90,3000.0,3,NULL,1,'2019-06-26 11:54:01','2019-06-26 11:54:01');
INSERT INTO `RoomDetails` VALUES (15,'B-212',90,4000.0,4,NULL,1,'2019-06-28 06:20:57','2019-06-28 06:20:57');
INSERT INTO `RoomDetails` VALUES (17,'R102',90,2000.0,3,NULL,0,'2019-06-28 06:54:43','2019-06-28 06:54:43');
INSERT INTO `RoomDetails` VALUES (18,'R-402',87,3000.0,1,NULL,1,'2019-06-28 07:12:59','2019-06-28 07:12:59');
INSERT INTO `RoomDetails` VALUES (20,'D-121',89,4000.0,2,NULL,1,'2019-06-28 07:57:34','2019-06-28 07:57:34');
INSERT INTO `RoomDetails` VALUES (21,'R-404',87,3000.0,2,NULL,1,'2019-06-28 16:01:41','2019-06-28 16:01:41');
INSERT INTO `RoomDetails` VALUES (22,'R-401',89,6000.0,2,NULL,1,'2019-06-28 16:02:23','2019-06-28 16:02:23');
CREATE TABLE IF NOT EXISTS `Products` (
	`ProductId`	integer PRIMARY KEY AUTOINCREMENT,
	`productName`	varchar ( 255 ) NOT NULL,
	`productPrice`	double ( 11 , 2 ),
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp
);
INSERT INTO `Products` VALUES (1,'Bislery',10.0,'2019-06-16 09:17:48','2019-06-16 09:17:48');
CREATE TABLE IF NOT EXISTS `PaymentTypes` (
	`paymentTypeId`	integer PRIMARY KEY AUTOINCREMENT,
	`paymentType`	varchar ( 255 ) NOT NULL,
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp
);
INSERT INTO `PaymentTypes` VALUES (1,'CASH','2019-06-16 09:17:19','2019-06-16 09:17:19');
INSERT INTO `PaymentTypes` VALUES (3,'CARD','2019-06-19 09:52:50','2019-06-19 09:52:50');
INSERT INTO `PaymentTypes` VALUES (6,'Phone Pay','2019-06-20 07:49:22','2019-06-20 07:49:22');
INSERT INTO `PaymentTypes` VALUES (7,'Mobile Card','2019-06-20 07:51:17','2019-06-20 07:51:17');
INSERT INTO `PaymentTypes` VALUES (96,'CARD1','2019-06-25 07:30:28','2019-06-25 07:30:28');
CREATE TABLE IF NOT EXISTS `Payment` (
	`paymentId`	integer PRIMARY KEY AUTOINCREMENT,
	`BookingId`	integer,
	`customerId`	integer,
	`paymentTypeId`	integer,
	`amount`	double ( 11 , 2 ),
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp,
	FOREIGN KEY(`paymentTypeId`) REFERENCES `PaymentTypes`(`paymentTypeId`) on delete cascade,
	FOREIGN KEY(`customerId`) REFERENCES `Customers`(`customerId`) on delete cascade,
	FOREIGN KEY(`BookingId`) REFERENCES `Bookings`(`BookingId`) on delete cascade
);
CREATE TABLE IF NOT EXISTS `Orders` (
	`orderId`	integer PRIMARY KEY AUTOINCREMENT,
	`productId`	integer,
	`customerId`	integer,
	`roomId`	integer,
	`Quantity`	integer DEFAULT 1,
	`orderDate`	datetime created_at datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp,
	FOREIGN KEY(`roomId`) REFERENCES `RoomDetails`(`roomId`) on delete cascade,
	FOREIGN KEY(`productId`) REFERENCES `Products`(`ProductId`) on delete cascade,
	FOREIGN KEY(`customerId`) REFERENCES `Customers`(`customerId`) on delete cascade
);
INSERT INTO `Orders` VALUES (1,1,2,3,5,'2019-06-26 07:31:31','2019-06-26 07:31:31');
CREATE TABLE IF NOT EXISTS `Documents` (
	`DocumentId`	integer PRIMARY KEY AUTOINCREMENT,
	`DocumentType`	varchar ( 255 ) NOT NULL,
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp
);
INSERT INTO `Documents` VALUES (1,'PAN','2019-06-16 09:16:34','2019-06-16 09:16:34');
INSERT INTO `Documents` VALUES (2,'AADHAR','2019-06-19 10:26:38','2019-06-19 10:26:38');
INSERT INTO `Documents` VALUES (5,'VOTER ID','2019-06-22 12:55:21','2019-06-22 12:55:21');
INSERT INTO `Documents` VALUES (9,'a','2019-06-23 06:10:13','2019-06-23 06:10:13');
INSERT INTO `Documents` VALUES (10,'b','2019-06-23 06:10:20','2019-06-23 06:10:20');
INSERT INTO `Documents` VALUES (11,'c','2019-06-23 06:10:25','2019-06-23 06:10:25');
INSERT INTO `Documents` VALUES (12,'d','2019-06-23 06:10:29','2019-06-23 06:10:29');
INSERT INTO `Documents` VALUES (13,'e','2019-06-23 06:10:34','2019-06-23 06:10:34');
INSERT INTO `Documents` VALUES (14,'g','2019-06-23 06:10:39','2019-06-23 06:10:39');
INSERT INTO `Documents` VALUES (15,'h','2019-06-23 06:10:44','2019-06-23 06:10:44');
INSERT INTO `Documents` VALUES (16,'i','2019-06-23 06:10:47','2019-06-23 06:10:47');
INSERT INTO `Documents` VALUES (17,'A','2019-06-23 06:14:52','2019-06-23 06:14:52');
CREATE TABLE IF NOT EXISTS `Customers` (
	`customerId`	integer PRIMARY KEY AUTOINCREMENT,
	`FirstName`	varchar ( 255 ) NOT NULL,
	`lastName`	varchar ( 255 ),
	`address`	text,
	`email`	varchar ( 255 ),
	`contactNumber`	varchar ( 255 ),
	`regTime`	time DEFAULT current_time,
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp
);
INSERT INTO `Customers` VALUES (1,'john','Doe','San Diego,aundh','johndoe@hotmail.com','254178963','12:46:27','2019-06-14 12:46:27','2019-06-14 12:46:27');
INSERT INTO `Customers` VALUES (2,'Jon','snow','Winterfell,king in the north','jonsnow@got.com','258963147','08:56:31','2019-06-16 08:56:31','2019-06-16 08:56:31');
CREATE TABLE IF NOT EXISTS `CustomerProfile` (
	`customerProfileId`	integer PRIMARY KEY AUTOINCREMENT,
	`customerId`	integer,
	`DocId`	integer,
	`attachement`	text,
	`docNumber`	varchar ( 255 ),
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp,
	FOREIGN KEY(`customerId`) REFERENCES `Customers`(`customerId`) on delete cascade,
	FOREIGN KEY(`DocId`) REFERENCES `Documents`(`DocumentId`) on delete cascade
);
CREATE TABLE IF NOT EXISTS `Bookings` (
	`BookingId`	integer PRIMARY KEY AUTOINCREMENT,
	`customerId`	integer,
	`roomId`	integer,
	`FromDate`	date,
	`UptoDate`	date,
	`checkIn`	datetime DEFAULT current_timestamp,
	`checkOut`	datetime DEFAULT current_timestamp,
	`Nights`	integer DEFAULT 1,
	`created_at`	datetime DEFAULT current_timestamp,
	`updated_at`	datetime DEFAULT current_timestamp,
	FOREIGN KEY(`roomId`) REFERENCES `RoomDetails`(`roomId`) on delete cascade,
	FOREIGN KEY(`customerId`) REFERENCES `Customers`(`customerId`) on delete cascade
);
INSERT INTO `Bookings` VALUES (1,1,1,'2019/06/26','2019/06/26','2019-06-26 07:34:47','2019-06-26 07:34:47',1,'2019-06-26 07:34:47','2019-06-26 07:34:47');
COMMIT;
