CREATE TABLE `Students` (
  `Rollno` int,
  `S_name` varchar(255),
  `c_ID` varchar(255),
  `Group` varchar(255),
  `Dept_name` varchar(255),
  PRIMARY KEY (`Rollno`, `Group`)
);

CREATE TABLE `components` (
  `c_ID` varchar(255) PRIMARY KEY,
  `c_Name` varchar(255),
  `Quantity` int,
  `price` int,
  `images` varchar(255)
);
INSERT INTO Components VALUES
    ('C001','ARDUINO UNO R3','L',21,7945),
    ('C012','BREAD BOARD','L',24,1490),
    ('C015','JUMPER WIRES (ALL TYPES)','L',17,85),
    ('C016','RASPBERRY PI MODEL 3B','L',10,29500),
    ('C024','USB TO MICRO USB CABLE','L',4,240),
    ('C036','SERVO MOTOR SG-90','L',11,1190),
    ('C035','2-CHANNEL RELAY','M',6,700),
    ('C004','16*2 LCD DISPLAY','M',17,1700),
    ('C006','9V BATTERY','M',17,272),
    ('C008','BATTERY HOLDER BOX','M',17,1190),
    ('C019','HDMI TO VGA CONVERTER','M',10,2450),
    ('C028','IR REMOTE','M',4,680),
    ('C029','DHT-11 TEMPRATURE AND HUMIDITY SENSOR','M',14,1310),
    ('C037','L298 DRIVER','M',4,500),
    ('C038','DC MOTOR 500RPM WITH WHEEL','M',4,640),
    ('C041','L293 DRIVER','M',5,400),
    ('C045','MOTOR','M',10,650),
    ('C048','PI CAMERA','M',3,1350),
    ('C052','TP 4056 LI-ON CHARGER','M',2,130),
    ('C062','SOLONOID 12V DC','M',1,300),
    ('C070','GSM MODULE (SIM-900)','M',2,1560),
    ('C002','ARDUINO PRO MINI','M',17,3740),
    ('C003','7-SEGMENT LED DISPLAY','M',17,119),
    ('C026','HC-SR-04 ULTRASONIC DISTANCE SENSOR','M',4,380),
    ('C030','GAS SENSOR','M',4,1180),
    ('C033','PIR MOTION SENSOR','M',5,450),
    ('C050','ARDUINO MEGA 2560','M',1,700),
    ('C053','2200 MaH BATTERY','M',1,1350),
    ('C054','MQ-03 GAS SENSOR MODULE','M',1,150),
    ('C057','MQ-135 GAS SENSOR MODULE','M',2,300),
    ('C072','PH SENSOR','M',1,1850),
    ('C074','HEART BEAT SENSOR','M',4,1180),
    ('C034','SOIL MOISTURE SENSOR','S',4,600),
    ('C042','CASTOR WHEELS','S',7,405),
    ('C044','RFID KIT','S',10,1500),
    ('C068','PARALLAX PAM','S',1,65),
    ('C007','9V BATTERY CONNECTORS','S',17,85),
    ('C009','4*4 MATRIX KETPAD','S',17,1275),
    ('C011','LED (R-G-B)','S',17,238),
    ('C014','DC JACK MALE','S',17,255),
    ('C020','CARD READER','S',10,2250),
    ('C022','WIFI MODULE (ESP 8266) NODE MCU','S',11,2580),
    ('C023','WIFI ESP-01','S',4,720),
    ('C025','HC-05 BLUETOOTH MODULE','S',9,2500),
    ('C027','IR PROXIMITY SENSOR','S',4,208),
    ('C032','FTDI TO TTL CONVERTER','S',4,560),
    ('C043','RTC MODULE 1307','S',12,1030),
    ('C047','LM317','S',1,10),
    ('C051','SHAFT 6MM','S',1,25),
    ('C058','WROOM ESP 32','S',1,550),
    ('C059','ADXL 1335 ACCELROMETER SENSOR','S',1,250),
    ('C069','GPS MODULE','S',1,450),
    ('C071','10K POT','S',2,20),
    ('C073','HEART BEAT MODULE','S',1,250),
    ('C075','ADAFRUIT HML5883L','S',1,200),
    ('C010','PUSH BUTTON SWITCHES','S',19,57),
    ('C013','BUZZER','S',17,340),
    ('C021','MICRO SD CARD (16GB)','S',10,3900),
    ('C031','LIGHT DEPENDENT RESISTOR (LDR)','S',14,80),
    ('C063','IRF 540 MOSFET','S',1,20),
    ('C064','BC 547 TRANSISTOR','S',2,6),
    ('C066','7805','S',1,10),
    ('C067','7892','S',1,10),
    ('C005','5V 1A DC ADAPTER',NULL,17,1615),
    ('C017','RASPBERRY PI CASE',NULL,10,1300),
    ('C018','RASPBERRY PI ADAPTER',NULL,10,2500),
    ('C039','CHASIS',NULL,4,220),
    ('C040','WHEELS',NULL,8,280),
    ('C046','CABLE',NULL,3,105),
    ('C055','SOLAR PANEL 4*4',NULL,1,350),
    ('C056','ADAPTOR',NULL,3,210),
    ('C065','ADAPTOR FOR GSM',NULL,1,130),
    ('C049','1-CHANNEL RELAY',NULL,1,50),
    ('C060','LED (RED)',NULL,65,65),
    ('C061','LED (YELLOW)',NULL,10,10);
    
CREATE TABLE `issue` (
  `Dept_name` varchar(255),
  `Rollno` int NOT NULL,
  `Group_id` varchar(255) NOT NULL,
  `c_ID` varchar(255) NOT NULL,
  `issue_date` timestamp()
);

CREATE TABLE `Group` (
  `Rollno` int,
  `Group_id` varchar(255)
);
create table 'login_details'(
 username varchar(255),
 password varchar(255)
);
insert into login_details values('vishal01','vishal'),('raza02','raza');
ALTER TABLE `issue` ADD FOREIGN KEY (`c_ID`) REFERENCES `Students` (`Group`);
create TABLE log_history (
  issue_date time_stamp(),
  logs varchar(255),
  comp_name,
  quantity
  );