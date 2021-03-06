-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 01:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `C_ID` varchar(100) DEFAULT NULL,
  `Description` varchar(37) CHARACTER SET utf8 DEFAULT NULL,
  `Size` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Quantity_Damaged` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`C_ID`, `Description`, `Size`, `Quantity`, `Price`, `Quantity_Damaged`) VALUES
('C001', 'ARDUINO UNO R3', 'L', 21, 7945, 0),
('C012', 'BREAD BOARD', 'L', 24, 1490, 0),
('C015', 'JUMPER WIRES (ALL TYPES)', 'L', 17, 85, 0),
('C016', 'RASPBERRY PI MODEL 3B', 'L', 10, 29500, 0),
('C024', 'USB TO MICRO USB CABLE', 'L', 4, 240, 0),
('C036', 'SERVO MOTOR SG-90', 'L', 11, 1190, 0),
('C035', '2-CHANNEL RELAY', 'M', 6, 700, 0),
('C004', '16*2 LCD DISPLAY', 'M', 17, 1700, 0),
('C006', '9V BATTERY', 'M', 17, 272, 0),
('C008', 'BATTERY HOLDER BOX', 'M', 17, 1190, 0),
('C019', 'HDMI TO VGA CONVERTER', 'M', 10, 2450, 0),
('C028', 'IR REMOTE', 'M', 4, 680, 0),
('C029', 'DHT-11 TEMPRATURE AND HUMIDITY SENSOR', 'M', 14, 1310, 0),
('C037', 'L298 DRIVER', 'M', 4, 500, 0),
('C038', 'DC MOTOR 500RPM WITH WHEEL', 'M', 4, 640, 0),
('C041', 'L293 DRIVER', 'M', 5, 400, 0),
('C045', 'MOTOR', 'M', 10, 650, 0),
('C048', 'PI CAMERA', 'M', 3, 1350, 0),
('C052', 'TP 4056 LI-ON CHARGER', 'M', 2, 130, 0),
('C062', 'SOLONOID 12V DC', 'M', 1, 300, 0),
('C070', 'GSM MODULE (SIM-900)', 'M', 2, 1560, 0),
('C002', 'ARDUINO PRO MINI', 'M', 17, 3740, 0),
('C003', '7-SEGMENT LED DISPLAY', 'M', 17, 119, 0),
('C026', 'HC-SR-04 ULTRASONIC DISTANCE SENSOR', 'M', 4, 380, 0),
('C030', 'GAS SENSOR', 'M', 4, 1180, 0),
('C033', 'PIR MOTION SENSOR', 'M', 5, 450, 0),
('C050', 'ARDUINO MEGA 2560', 'M', 1, 700, 0),
('C053', '2200 MaH BATTERY', 'M', 1, 1350, 0),
('C054', 'MQ-03 GAS SENSOR MODULE', 'M', 1, 150, 0),
('C057', 'MQ-135 GAS SENSOR MODULE', 'M', 2, 300, 0),
('C072', 'PH SENSOR', 'M', 1, 1850, 0),
('C074', 'HEART BEAT SENSOR', 'M', 4, 1180, 0),
('C034', 'SOIL MOISTURE SENSOR', 'S', 4, 600, 0),
('C042', 'CASTOR WHEELS', 'S', 7, 405, 0),
('C044', 'RFID KIT', 'S', 10, 1500, 0),
('C068', 'PARALLAX PAM', 'S', 1, 65, 0),
('C007', '9V BATTERY CONNECTORS', 'S', 17, 85, 0),
('C009', '4*4 MATRIX KETPAD', 'S', 17, 1275, 0),
('C011', 'LED (R-G-B)', 'S', 17, 238, 0),
('C014', 'DC JACK MALE', 'S', 17, 255, 0),
('C020', 'CARD READER', 'S', 10, 2250, 0),
('C022', 'WIFI MODULE (ESP 8266) NODE MCU', 'S', 11, 2580, 0),
('C023', 'WIFI ESP-01', 'S', 4, 720, 0),
('C025', 'HC-05 BLUETOOTH MODULE', 'S', 9, 2500, 0),
('C027', 'IR PROXIMITY SENSOR', 'S', 4, 208, 0),
('C032', 'FTDI TO TTL CONVERTER', 'S', 4, 560, 0),
('C043', 'RTC MODULE 1307', 'S', 12, 1030, 0),
('C047', 'LM317', 'S', 1, 10, 0),
('C051', 'SHAFT 6MM', 'S', 1, 25, 0),
('C058', 'WROOM ESP 32', 'S', 1, 550, 0),
('C059', 'ADXL 1335 ACCELROMETER SENSOR', 'S', 1, 250, 0),
('C069', 'GPS MODULE', 'S', 1, 450, 0),
('C071', '10K POT', 'S', 2, 20, 0),
('C073', 'HEART BEAT MODULE', 'S', 1, 250, 0),
('C075', 'ADAFRUIT HML5883L', 'S', 1, 200, 0),
('C010', 'PUSH BUTTON SWITCHES', 'S', 19, 57, 0),
('C013', 'BUZZER', 'S', 17, 340, 0),
('C021', 'MICRO SD CARD (16GB)', 'S', 10, 3900, 0),
('C031', 'LIGHT DEPENDENT RESISTOR (LDR)', 'S', 14, 80, 0),
('C063', 'IRF 540 MOSFET', 'S', 1, 20, 0),
('C064', 'BC 547 TRANSISTOR', 'S', 2, 6, 0),
('C066', '7805', 'S', 1, 10, 0),
('C067', '7892', 'S', 1, 10, 0),
('C005', '5V 1A DC ADAPTER', NULL, 17, 1615, 0),
('C017', 'RASPBERRY PI CASE', NULL, 10, 1300, 0),
('C018', 'RASPBERRY PI ADAPTER', NULL, 10, 2500, 0),
('C039', 'CHASIS', NULL, 4, 220, 0),
('C040', 'WHEELS', NULL, 8, 280, 0),
('C046', 'CABLE', NULL, 3, 105, 0),
('C055', 'SOLAR PANEL 4*4', NULL, 1, 350, 0),
('C056', 'ADAPTOR', NULL, 3, 210, 0),
('C065', 'ADAPTOR FOR GSM', NULL, 1, 130, 0),
('C049', '1-CHANNEL RELAY', NULL, 1, 50, 0),
('C060', 'LED (RED)', NULL, 65, 65, 0),
('C061', 'LED (YELLOW)', NULL, 10, 10, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
