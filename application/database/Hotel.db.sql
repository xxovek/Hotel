BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "RoomTypes" (
	"roomId"	integer PRIMARY KEY AUTOINCREMENT,
	"roomType"	varchar(255) NOT NULL,
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp
);
CREATE TABLE IF NOT EXISTS "PaymentTypes" (
	"paymentTypeId"	integer PRIMARY KEY AUTOINCREMENT,
	"paymentType"	varchar(255) NOT NULL,
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp
);
CREATE TABLE IF NOT EXISTS "Documents" (
	"DocumentId"	integer PRIMARY KEY AUTOINCREMENT,
	"DocumentType"	varchar(255) NOT NULL,
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp
);
CREATE TABLE IF NOT EXISTS "Products" (
	"ProductId"	integer PRIMARY KEY AUTOINCREMENT,
	"productName"	varchar(255) NOT NULL,
	"productPrice"	double(11 , 2),
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp
);
CREATE TABLE IF NOT EXISTS "RoomDetails" (
	"roomId"	integer PRIMARY KEY AUTOINCREMENT,
	"roomNumber"	varchar(255) NOT NULL,
	"roomTypeId"	integer,
	"pricePerNight"	double(11 , 2),
	"maxPersons"	integer,
	"status"	varchar(255),
	"isAvailable"	boolean DEFAULT 0,
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp
);
CREATE TABLE IF NOT EXISTS "Customers" (
	"customerId"	integer PRIMARY KEY AUTOINCREMENT,
	"FirstName"	varchar(255) NOT NULL,
	"lastName"	varchar(255),
	"address"	text,
	"email"	varchar(255),
	"contactNumber"	varchar(255),
	"regTime"	time DEFAULT current_time,
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp
);
CREATE TABLE IF NOT EXISTS "Bookings" (
	"BookingId"	integer PRIMARY KEY AUTOINCREMENT,
	"customerId"	integer,
	"roomId"	integer,
	"FromDate"	date,
	"UptoDate"	date,
	"checkIn"	datetime DEFAULT current_timestamp,
	"checkOut"	datetime DEFAULT current_timestamp,
	"Nights"	integer DEFAULT 1,
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp,
	"Status"	integer,
	FOREIGN KEY("roomId") REFERENCES "RoomDetails"("roomId") on delete cascade,
	FOREIGN KEY("customerId") REFERENCES "Customers"("customerId") on delete cascade
);
CREATE TABLE IF NOT EXISTS "Orders" (
	"orderId"	integer PRIMARY KEY AUTOINCREMENT,
	"productId"	integer,
	"customerId"	integer,
	"roomId"	integer,
	"Quantity"	integer DEFAULT 1,
	"orderDate"	datetime created_at datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp,
	"Status"	VARCHAR,
	FOREIGN KEY("roomId") REFERENCES "RoomDetails"("roomId") on delete cascade,
	FOREIGN KEY("productId") REFERENCES "Products"("ProductId") on delete cascade,
	FOREIGN KEY("customerId") REFERENCES "Customers"("customerId") on delete cascade
);
CREATE TABLE IF NOT EXISTS "UserMaster" (
	"UserId"	integer PRIMARY KEY AUTOINCREMENT,
	"userName"	varchar(255),
	"password"	varchar(255),
	"HotelName"	varchar(255),
	"address"	text,
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp,
	"Flag"	INTEGER
);
CREATE TABLE IF NOT EXISTS "StatusTypes" (
	"statusId"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"statusName"	VARCHAR NOT NULL,
	"created_at"	DATETIME DEFAULT CURRENT_TIMESTAMP,
	"updated_at"	Datetime DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS "CustomerProfile" (
	"customerProfileId"	integer PRIMARY KEY AUTOINCREMENT,
	"customerId"	integer,
	"attachement"	text,
	"docNumber"	varchar(255) DEFAULT NULL,
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp,
	FOREIGN KEY("customerId") REFERENCES "Customers"("customerId") on delete cascade
);
CREATE TABLE IF NOT EXISTS "Payment" (
	"paymentId"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"customerId"	integer NOT NULL,
	"paymentTypeId"	VARCHAR,
	"amount"	double(11 , 2),
	"created_at"	DATETIME DEFAULT CURRENT_TIMESTAMP,
	"updated_at"	Datetime DEFAULT current_timestamp
);
CREATE TABLE IF NOT EXISTS "PaymentOrder" (
	"bookordersId"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"paymentId"	integer NOT NULL,
	"bookingsOrderId"	integer NOT NULL,
	"created_at"	DATETIME DEFAULT CURRENT_TIMESTAMP,
	"updated_at"	Datetime DEFAULT current_timestamp,
	CONSTRAINT "fk_Payment" FOREIGN KEY("paymentId") REFERENCES "Payment"("paymentId") ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS "PaymentBooking" (
	"bookordersId"	INTEGER PRIMARY KEY AUTOINCREMENT,
	"paymentId"	integer NOT NULL,
	"bookingsOrderId"	integer NOT NULL,
	"created_at"	DATETIME DEFAULT CURRENT_TIMESTAMP,
	"updated_at"	Datetime DEFAULT current_timestamp,
	CONSTRAINT "fk_Payment" FOREIGN KEY("paymentId") REFERENCES "Payment"("paymentId") ON DELETE CASCADE
);
INSERT INTO "RoomTypes" VALUES (1,'Ac','2019-06-13 10:15:09','2019-06-13 10:15:09');
INSERT INTO "RoomTypes" VALUES (2,'Non-Ac','2019-06-14 09:01:30','2019-06-14 09:01:30');
INSERT INTO "RoomTypes" VALUES (3,'Delux','2019-06-16 09:07:46','2019-06-16 09:07:46');
INSERT INTO "PaymentTypes" VALUES (1,'CASH','2019-06-16 09:17:19','2019-06-16 09:17:19');
INSERT INTO "Documents" VALUES (1,'PAN2','2019-06-16 09:16:34','2019-06-16 09:16:34');
INSERT INTO "Products" VALUES (1,'Bislery',10.0,'2019-06-16 09:17:48','2019-06-16 09:17:48');
INSERT INTO "RoomDetails" VALUES (1,'R-001',1,500.0,2,'Locked',1,'2019-06-16 09:18:24','2019-06-16 09:18:24');
INSERT INTO "RoomDetails" VALUES (3,'ROOMNO2',1,300.0,4,'Locked
','YES','2019-06-29 06:48:38','2019-06-29 06:48:38');
INSERT INTO "RoomDetails" VALUES (4,'ROOMNO3',2,700.0,5,'Locked','YES','2019-06-29 06:49:47','2019-06-29 06:49:47');
INSERT INTO "RoomDetails" VALUES (5,'ROOMNO4',3,1200.0,8,'Locked','NO','2019-06-29 06:50:13','2019-06-29 06:50:13');
INSERT INTO "RoomDetails" VALUES (6,'ROOMNO5',1,400.0,5,'Locked','YES','2019-06-29 06:50:39','2019-06-29 06:50:39');
INSERT INTO "Customers" VALUES (5,'kunal','kapse','7','kk@gmail.com','9766695099','06:56:16','2019-06-22 06:56:16','2019-06-22 06:56:16');
INSERT INTO "Customers" VALUES (6,'vikas','pawar','7','vp@gmail.com','9766695099','06:56:37','2019-06-22 06:56:37','2019-06-22 06:56:37');
INSERT INTO "Customers" VALUES (7,'nitin','shinde','pune','ns@gmail.com','9766695099','06:24:10','2019-06-23 06:24:10','2019-06-23 06:24:10');
INSERT INTO "Customers" VALUES (8,'aniket','shinde','pune city','vk@gmail.com','7588521100','06:58:55','2019-06-23 06:58:55','2019-06-23 06:58:55');
INSERT INTO "Customers" VALUES (9,'pranav ','kapse','dhule','vikas@gmail.com','7588521100','07:07:40','2019-06-23 07:07:40','2019-06-23 07:07:40');
INSERT INTO "Customers" VALUES (10,'prem','patil','pune city','pk@gmail.com','7485965236','07:18:54','2019-06-23 07:18:54','2019-06-23 07:18:54');
INSERT INTO "Customers" VALUES (11,'nitten','patil','pawar patil','pk@gmail.com','7588412563','07:22:34','2019-06-23 07:22:34','2019-06-23 07:22:34');
INSERT INTO "Customers" VALUES (12,'sachin','tendulkar','dhule city','kkdhule@gmail.com','8585965211','07:24:21','2019-06-23 07:24:21','2019-06-23 07:24:21');
INSERT INTO "Customers" VALUES (13,'lalit','pawar','pune city','vikas@gmail.com','8596565232','07:29:17','2019-06-23 07:29:17','2019-06-23 07:29:17');
INSERT INTO "Customers" VALUES (14,'nitin','kapse','shivaji nagar pune','nitin@gmail.com','7541256325','07:51:02','2019-06-23 07:51:02','2019-06-23 07:51:02');
INSERT INTO "Customers" VALUES (15,'kapil','kapse','kedarnath up','kp@gmail.com','7588412563','07:53:32','2019-06-23 07:53:32','2019-06-23 07:53:32');
INSERT INTO "Customers" VALUES (16,'kapil','kapse','kedarnath up','kp@gmail.com','7588412563','07:53:48','2019-06-23 07:53:48','2019-06-23 07:53:48');
INSERT INTO "Customers" VALUES (17,'Ser','Davas','Black Water','serdavos@got.com','8526974589','07:55:18','2019-06-23 07:55:18','2019-06-23 07:55:18');
INSERT INTO "Customers" VALUES (18,'nitin','patil','kk new delhi','kk@gmail.com','7588521140','08:00:12','2019-06-23 08:00:12','2019-06-23 08:00:12');
INSERT INTO "Customers" VALUES (19,'nitin','pawar','new mumbai','pk@gmail.com','7485965236','08:01:45','2019-06-23 08:01:45','2019-06-23 08:01:45');
INSERT INTO "Customers" VALUES (20,'nitin','pawar','new mumbai','pk@gmail.com','7485965236','08:06:16','2019-06-23 08:06:16','2019-06-23 08:06:16');
INSERT INTO "Customers" VALUES (21,'kunal','kapse','kk@gmail.com','kk22@gmail.com','7584965236','08:07:09','2019-06-23 08:07:09','2019-06-23 08:07:09');
INSERT INTO "Customers" VALUES (22,'nita','ambani','patil regency','patil@gmail.com','7485965236','08:09:12','2019-06-23 08:09:12','2019-06-23 08:09:12');
INSERT INTO "Customers" VALUES (23,'Cercie','Lanister','Kings Landing','cercie@got.com','8208504868','08:10:49','2019-06-23 08:10:49','2019-06-23 08:10:49');
INSERT INTO "Customers" VALUES (24,'vijay','pawar','vicky sir','kk@gmail.com','9766695099','10:06:47','2019-06-23 10:06:47','2019-06-23 10:06:47');
INSERT INTO "Customers" VALUES (25,'gita','parmar','ikforfojv ','kk@gmail.com','7585254512','10:23:12','2019-06-23 10:23:12','2019-06-23 10:23:12');
INSERT INTO "Customers" VALUES (26,'Aruna','Kashayp','miya murg masala','arunakashayp@gmail.com','78965412365','09:40:59','2019-07-04 09:40:59','2019-07-04 09:40:59');
INSERT INTO "Customers" VALUES (27,'Jon','Stark','Winterfell King in the north','jonsnow@got.com','85025857458','09:43:09','2019-07-04 09:43:09','2019-07-04 09:43:09');
INSERT INTO "Customers" VALUES (28,'Sansa','Stark','Winterlfell Queen in the North','sansa@got.con','8523697444','09:50:25','2019-07-04 09:50:25','2019-07-04 09:50:25');
INSERT INTO "Customers" VALUES (29,'Ser','Devos','King''s Landing','serdevos@got.com','9657613754','09:53:12','2019-07-04 09:53:12','2019-07-04 09:53:12');
INSERT INTO "Customers" VALUES (30,'Jon','Aryan','King''s Landing','serdevos1@got.com','9657613752','09:53:53','2019-07-04 09:53:53','2019-07-04 09:53:53');
INSERT INTO "Customers" VALUES (31,'Jemmy','Lanister','Casterly rock kings landing','jemmy@got.com','8596748569','10:08:05','2019-07-04 10:08:05','2019-07-04 10:08:05');
INSERT INTO "Customers" VALUES (32,'Arya','Stark','Winterfell king inthe casterly rock','arya@got.com','82506987414','10:16:01','2019-07-04 10:16:01','2019-07-04 10:16:01');
INSERT INTO "Customers" VALUES (33,'John','Doe','John aryan git','jonaryan@got.com','9876543245','10:17:23','2019-07-04 10:17:23','2019-07-04 10:17:23');
INSERT INTO "Bookings" VALUES (32,5,1,'2019/06/11','2019/06/14','2019-06-29 09:40:38','2019-06-29 09:40:38',3,'2019-06-29 09:40:38','2019-06-29 09:40:38',1);
INSERT INTO "Bookings" VALUES (33,5,3,'2019/06/11','2019/06/14','2019-06-29 09:40:57','2019-06-29 09:40:57',3,'2019-06-29 09:40:57','2019-06-29 09:40:57',1);
INSERT INTO "Bookings" VALUES (34,6,4,'2019/06/11','2019/06/14','2019-06-29 09:41:30','2019-06-29 09:41:30',3,'2019-06-29 09:41:30','2019-06-29 09:41:30',3);
INSERT INTO "Bookings" VALUES (35,6,5,'2019/06/11','2019/06/14','2019-06-29 09:41:43','2019-06-29 09:41:43',3,'2019-06-29 09:41:43','2019-06-29 09:41:43',3);
INSERT INTO "Bookings" VALUES (37,7,1,'2019/06/18','2019/06/19','2019-06-29 12:31:47','2019-06-29 12:31:47',1,'2019-06-29 12:31:47','2019-06-29 12:31:47',3);
INSERT INTO "Bookings" VALUES (38,30,4,'2019/07/05','2019/07/17','2019-07-04 09:59:38','2019-07-04 09:59:38',12,'2019-07-04 09:59:38','2019-07-04 09:59:38',3);
INSERT INTO "Bookings" VALUES (39,7,5,'2019/07/08','2019/07/17','2019-07-04 10:06:42','2019-07-04 10:06:42',9,'2019-07-04 10:06:42','2019-07-04 10:06:42',3);
INSERT INTO "Bookings" VALUES (40,31,6,'2019/07/09','2019/07/16','2019-07-04 10:08:28','2019-07-04 10:08:28',7,'2019-07-04 10:08:28','2019-07-04 10:08:28',3);
INSERT INTO "Orders" VALUES (13,1,5,3,5,'2019-07-05 09:34:24','2019-07-05 09:34:24','1');
INSERT INTO "Orders" VALUES (14,1,7,3,10,'2019-07-05 09:35:26','2019-07-05 09:35:26','3');
INSERT INTO "Orders" VALUES (15,1,30,3,5,'2019-07-05 09:36:52','2019-07-05 09:36:52','3');
INSERT INTO "UserMaster" VALUES (1,'xxovek','12345','Jw Marriot','Senapati Bapat Rd, Laxmi Society, Model Colony, Shivajinagar, Pune, Maharashtra 411053','2019-06-15 07:35:23','2019-06-15 07:35:23',0);
INSERT INTO "UserMaster" VALUES (2,NULL,NULL,NULL,NULL,'2019-06-21 09:44:23','2019-06-21 09:44:23',NULL);
INSERT INTO "StatusTypes" VALUES (1,'Complete','2019-06-28 06:28:17','2019-06-28 06:28:17');
INSERT INTO "StatusTypes" VALUES (2,'Partial','2019-06-28 06:29:41','2019-06-28 06:29:41');
INSERT INTO "StatusTypes" VALUES (3,'Incomplete','2019-06-28 06:30:07','2019-06-28 06:30:07');
INSERT INTO "CustomerProfile" VALUES (1,8,'Documents/Doc_8_1.jpeg',NULL,'2019-06-28 09:24:41','2019-06-28 09:24:41');
INSERT INTO "CustomerProfile" VALUES (2,8,'Documents/Doc_8_2.jpeg',NULL,'2019-06-28 09:24:58','2019-06-28 09:24:58');
INSERT INTO "CustomerProfile" VALUES (3,27,'Documents/Doc_27_1.jpeg',NULL,'2019-07-04 09:43:09','2019-07-04 09:43:09');
INSERT INTO "CustomerProfile" VALUES (4,26,'Documents/Doc_26_1.jpeg',NULL,'2019-07-04 09:46:09','2019-07-04 09:46:09');
INSERT INTO "CustomerProfile" VALUES (5,28,'Documents/Doc_28_1.jpeg',NULL,'2019-07-04 09:50:25','2019-07-04 09:50:25');
INSERT INTO "Payment" VALUES (14,5,'1',2450.0,'2019-07-05 10:15:50','2019-07-05 10:15:50');
INSERT INTO "PaymentOrder" VALUES (1,14,13,'2019-07-05 10:15:51','2019-07-05 10:15:51');
INSERT INTO "PaymentBooking" VALUES (1,14,32,'2019-07-05 10:15:50','2019-07-05 10:15:50');
INSERT INTO "PaymentBooking" VALUES (2,14,33,'2019-07-05 10:15:51','2019-07-05 10:15:51');
COMMIT;
