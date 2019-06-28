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
CREATE TABLE IF NOT EXISTS "CustomerProfile" (
	"customerProfileId"	integer PRIMARY KEY AUTOINCREMENT,
	"customerId"	integer,
	"DocId"	integer,
	"attachement"	text,
	"docNumber"	varchar(255),
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp,
	FOREIGN KEY("DocId") REFERENCES "Documents"("DocumentId") on delete cascade,
	FOREIGN KEY("customerId") REFERENCES "Customers"("customerId") on delete cascade
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
CREATE TABLE IF NOT EXISTS "Payment" (
	"paymentId"	integer PRIMARY KEY AUTOINCREMENT,
	"BookingId"	integer,
	"customerId"	integer,
	"paymentTypeId"	integer,
	"amount"	double(11 , 2),
	"created_at"	datetime DEFAULT current_timestamp,
	"updated_at"	datetime DEFAULT current_timestamp,
	FOREIGN KEY("paymentTypeId") REFERENCES "PaymentTypes"("paymentTypeId") on delete cascade,
	FOREIGN KEY("BookingId") REFERENCES "Bookings"("BookingId") on delete cascade,
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
INSERT INTO "RoomTypes" VALUES (1,'Ac','2019-06-13 10:15:09','2019-06-13 10:15:09');
INSERT INTO "RoomTypes" VALUES (2,'Non-Ac','2019-06-14 09:01:30','2019-06-14 09:01:30');
INSERT INTO "RoomTypes" VALUES (3,'Delux','2019-06-16 09:07:46','2019-06-16 09:07:46');
INSERT INTO "PaymentTypes" VALUES (1,'CASH','2019-06-16 09:17:19','2019-06-16 09:17:19');
INSERT INTO "Documents" VALUES (1,'PAN','2019-06-16 09:16:34','2019-06-16 09:16:34');
INSERT INTO "Products" VALUES (1,'Bislery',10.0,'2019-06-16 09:17:48','2019-06-16 09:17:48');
INSERT INTO "RoomDetails" VALUES (1,'R-001',1,500.0,2,'Locked',1,'2019-06-16 09:18:24','2019-06-16 09:18:24');
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
INSERT INTO "Bookings" VALUES (16,5,1,'2019/06/12','2019/06/13','2019-06-23 06:26:22','2019-06-23 06:26:22',1,'2019-06-23 06:26:22','2019-06-23 06:26:22',3);
INSERT INTO "Bookings" VALUES (17,6,1,'2019/06/19','2019/06/25','2019-06-23 06:27:25','2019-06-23 06:27:25',1,'2019-06-23 06:27:25','2019-06-23 06:27:25',3);
INSERT INTO "Bookings" VALUES (19,5,1,'2019/06/28','2019/06/29','2019-06-28 05:44:32','2019-06-28 05:44:32',1,'2019-06-28 05:44:32','2019-06-28 05:44:32',3);
INSERT INTO "Payment" VALUES (1,16,5,1,500.0,'2019-06-28 05:42:00','2019-06-28 05:42:00');
INSERT INTO "Payment" VALUES (2,17,6,1,500.0,'2019-06-28 05:42:26','2019-06-28 05:42:26');
INSERT INTO "Orders" VALUES (4,1,5,1,10,'2019-06-25 06:53:08','2019-06-25 06:53:08');
INSERT INTO "Orders" VALUES (5,1,6,1,10,'2019-06-25 06:53:24','2019-06-25 06:53:24');
INSERT INTO "Orders" VALUES (6,1,7,1,5,'2019-06-25 06:53:41','2019-06-25 06:53:41');
INSERT INTO "Orders" VALUES (7,1,8,1,5,'2019-06-25 08:58:12','2019-06-25 08:58:12');
INSERT INTO "Orders" VALUES (9,1,5,1,5,'2019-06-25 11:56:41','2019-06-25 11:56:41');
INSERT INTO "Orders" VALUES (10,1,10,1,10,'2019-06-25 12:00:59','2019-06-25 12:00:59');
INSERT INTO "Orders" VALUES (11,1,6,1,5,'2019-06-25 12:03:19','2019-06-25 12:03:19');
INSERT INTO "Orders" VALUES (12,1,11,1,5,'2019-06-26 09:42:06','2019-06-26 09:42:06');
INSERT INTO "UserMaster" VALUES (1,'xxovek','12345','Jw Marriot','Senapati Bapat Rd, Laxmi Society, Model Colony, Shivajinagar, Pune, Maharashtra 411053','2019-06-15 07:35:23','2019-06-15 07:35:23',0);
INSERT INTO "UserMaster" VALUES (2,NULL,NULL,NULL,NULL,'2019-06-21 09:44:23','2019-06-21 09:44:23',NULL);
INSERT INTO "StatusTypes" VALUES (1,'Complete','2019-06-28 06:28:17','2019-06-28 06:28:17');
INSERT INTO "StatusTypes" VALUES (2,'Partial','2019-06-28 06:29:41','2019-06-28 06:29:41');
INSERT INTO "StatusTypes" VALUES (3,'Incomplete','2019-06-28 06:30:07','2019-06-28 06:30:07');
COMMIT;
