-- MySQL Database Dump for School Management System (sms)
-- Recreated and populated with rich demo data
-- Date: 2026-06-26

SET FOREIGN_KEY_CHECKS=0;

-- Create Database
CREATE DATABASE IF NOT EXISTS `sms`;
USE `sms`;

-- --------------------------------------------------------
-- Table Structure for `sms_login`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_login`;
CREATE TABLE `sms_login` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL UNIQUE,
  `pass` VARCHAR(255) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `role` VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_login`
INSERT INTO `sms_login` (`id`, `name`, `pass`, `email`, `role`) VALUES
(1, 'admin', '$2b$10$9FtsKZKKatTRuLA7mdcWeuec8vl5PPdHz1ooRQbBDu6xaGOhF9.o2', 'admin@gmail.com', 'Administrator'),
(2, 'Nithin JK', '$2b$10$BQinUfZt2EEYsfN.WQZMROEm3fY7q9FeN9uQEfJXmAnSr7N.BKXUe', 'nithin@gmail.com', 'Teacher'),
(3, 'Malini Nair', '$2b$10$S1pzC2jVFWj5FkZ7FdA.wer21fBU3ZTqy1.C15wzt9Vgno7MbhIe2', 'malini@gmail.com', 'Teacher'),
(4, 'Hari Prasad', '$2b$10$ZmBG.VfbJE4TCglfE8GxQuYNoFFNc4TpgZPa.ZnR6hf2JiKZths6y', 'hari@gmail.com', 'Teacher'),
(5, 'Bindhu Cherian', '$2b$10$Qb2g4woLLD73Cw5b5R0jBO9V95AjZOFlEFEvq8qm9iDaO4MzNpDh6', 'bindhu@gmail.com', 'Teacher'),
(6, 'Thomas Mani', '$2b$10$SrhxOhH1WEaX8yWbedBiSe8gqi7cF1iFyRSuNnKRLjrYMpFRRwkMK', 'thomas@gmail.com', 'Teacher'),
(7, 'Juliet Thomas', '$2b$10$jT/GnRhYzJGpb/ak4nkwP.7nZyxtSv/67W7q3aWmPEQf0JT0bcdYC', 'juliet@gmail.com', 'Teacher'),
(8, 'Rajeev Jacob', '$2b$10$tWVKz3frtYSTdis7OdpeVuDV4PNtXWvMWFMEzUqZeT6tl8BKHBQmi', 'rajeev@gmail.com', 'Teacher'),
(9, 'George Mathew', '$2b$10$JnWhE.6jB.RzucQvgyLPgeCNT4Gn0hzihoYqQgI4kAj/qLTxEP7dC', 'george@gmail.com', 'Teacher'),
(10, 'Susan George', '$2b$10$IcZerTry0NdTdnAnB04zKu7NT9B3XGfMKMdhM8NHXH55xEfR1FD/O', 'susan@gmail.com', 'Teacher'),
(11, 'Lucy Jacob', '$2b$10$gt93baNIQjqtvrulkVFOU.xFK3CeJCOHplPNb6xJaRRmYEeAwSm12', 'lucy@gmail.com', 'Teacher'),
(12, 'Nishanth J K', '$2b$10$KgMBSaMdtKlcVpWrXsrzcOZ1QxPlbIZwEgTuunPdqzlMIKymhFl9K', 'nishanth@gmail.com', 'Student'),
(13, 'Nirmal Biju', '$2b$10$p6Z2wU3nQ5UcsJGWIAocOuwOnRG2Ks4LtYYqZsNVbZanqb.gZB/gC', 'nirmal@gmail.com', 'Student'),
(14, 'Gokul Mahendran', '$2b$10$A5i3DUa.HW/xXADkvqsUy.ejPFyyfcdSbheoH/b1yGnQ7tqZrvDNG', 'gokul@gmail.com', 'Student'),
(15, 'Navya Pradeep', '$2b$10$QdBsIVV4BhVlLanDtpQuUu5lHvz8ZYdtvFZiyZGbMjyxjH4t/G1qy', 'navya@gmail.com', 'Student'),
(16, 'Ansa Kuriakose', '$2b$10$SWEFLe4fu3foTQxRJ2vabukj73n9dmubJlthMO.ByVc2xXeS0ZujW', 'ansa@gmail.com', 'Student'),
(17, 'Stalin George', '$2b$10$kz3NBWVt9sBWUC3h8x03iurVLpoM/oSyi4dUbuapodoERGTWQE0Iq', 'stalin@gmail.com', 'Student'),
(18, 'Sanath P Sibi', '$2b$10$q1rPG/8RiHsdDAR8Gkq77ucDL7jB4pB60zrLGuJu2GJ6hDqUsz4T.', 'sanath@gmail.com', 'Student'),
(19, 'Johan Joseph', '$2b$10$0BjpbcJ6GBa8yyKS/gO17.j5q/TAU0SyPrXnK8BEa/eQJ.75exddW', 'johan@gmail.com', 'Student'),
(20, 'Jaimon Kurian', '$2b$10$nfp2gLsK4w4ApK8/YPouAuuqGAutBKpnXZOMGKHx2DdfuUONoUD.q', 'jaimon@gmail.com', 'Parent'),
(21, 'Mahendhran', '$2b$10$47yibMZ6QN0GZzw11b/q8.Wrwk0PYbRqEbY97AlwfNVSTYNDrSaPu', 'mahi@gmail.com', 'Parent'),
(22, 'Biju', '$2b$10$2H4FKvZQnrf0YgTlbVVx7OKyMfizADM0GVdJvxP4GwWTId1uYr4BK', 'biju@gmail.com', 'Parent'),
(23, 'Pradeep Nair', '$2b$10$IlJ.vwJ4TESw6UYf5Rbe7OiSpBGysW0u05CwKbaghGEu2rUzt4n22', 'pradeep@gmail.com', 'Parent'),
(24, 'Kuriakose M', '$2b$10$2wRdY2lP2/gmVqHLmf5UUOws4dgWzQXMUfdJA2dxon9iROO4LBA4m', 'kuriakose@gmail.com', 'Parent'),
(25, 'George Thomas', '$2b$10$2HQi5vUBZvw3lrdceQEpEeBedjTNyyus137EDpXZaofTDXhnnl5SC', 'georget@gmail.com', 'Parent'),
(26, 'Sibi Cheriyan', '$2b$10$eI209Hi2dmkraAsa.LbamuIbnq2z8bQDZNyncTdebwtmbYbLgNmLm', 'sibi@gmail.com', 'Parent'),
(27, 'Joseph Chacko', '$2b$10$FbqkhejLgdBbnEUTs682iOTaH/zwwVnjwKR5vhIm.4hEnq.qXvBwG', 'joseph@gmail.com', 'Parent');


-- --------------------------------------------------------
-- Table Structure for `sms_teachers`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_teachers`;
CREATE TABLE `sms_teachers` (
  `tid` INT AUTO_INCREMENT PRIMARY KEY,
  `t_fullname` VARCHAR(100) NOT NULL,
  `t_housename` VARCHAR(100) DEFAULT NULL,
  `t_streetname` VARCHAR(100) DEFAULT NULL,
  `t_city` VARCHAR(100) DEFAULT NULL,
  `t_pincode` VARCHAR(20) DEFAULT NULL,
  `t_email` VARCHAR(100) NOT NULL,
  `t_dob` VARCHAR(50) DEFAULT NULL,
  `t_gender` VARCHAR(20) DEFAULT NULL,
  `t_bloodgroup` VARCHAR(20) DEFAULT NULL,
  `t_contact` VARCHAR(20) DEFAULT NULL,
  `t_qualification` VARCHAR(100) DEFAULT NULL,
  `acc_no` VARCHAR(50) DEFAULT NULL,
  `ifsc` VARCHAR(50) DEFAULT NULL,
  `i-class` VARCHAR(10) DEFAULT NULL,
  `i-sec` VARCHAR(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_teachers`
INSERT INTO `sms_teachers` (`tid`, `t_fullname`, `t_housename`, `t_streetname`, `t_city`, `t_pincode`, `t_email`, `t_dob`, `t_gender`, `t_bloodgroup`, `t_contact`, `t_qualification`, `acc_no`, `ifsc`, `i-class`, `i-sec`) VALUES
(1, 'Nithin JK', 'Rose Villa', 'MG Road', 'Ernakulam', '682011', 'nithin@gmail.com', '1990/05/15', 'Male', 'O+', '9876543210', 'M.Tech Computer Science', '12345678901', 'SBIN0001234', 'X', 'A'),
(2, 'Malini Nair', 'Grace Home', 'Pipeline Road', 'Aluva', '683101', 'malini@gmail.com', '1988/11/20', 'Female', 'A+', '9876543211', 'M.Sc Mathematics, B.Ed', '12345678902', 'SBIN0001234', 'IX', 'A'),
(3, 'Hari Prasad', 'Sree Nilayam', 'Temple Road', 'Tripunithura', '682301', 'hari@gmail.com', '1985/08/12', 'Male', 'B+', '9876543212', 'M.Sc Physics, M.Ed', '12345678903', 'SBIN0001234', 'VIII', 'B'),
(4, 'Bindhu Cherian', 'Cherian Villa', 'Church Road', 'Kadavanthra', '682020', 'bindhu@gmail.com', '1989/03/25', 'Female', 'AB+', '9876543213', 'M.A English, B.Ed', '12345678904', 'SBIN0001234', 'X', 'B'),
(5, 'Thomas Mani', 'Kalarickal', 'By Pass Junction', 'Kalamassery', '683104', 'thomas@gmail.com', '1983/02/09', 'Male', 'O-', '9876543214', 'M.Sc Chemistry, Ph.D', '12345678905', 'SBIN0001234', 'VII', 'A'),
(6, 'Juliet Thomas', 'Olive Mount', 'Civil Line Road', 'Kakkanad', '682030', 'juliet@gmail.com', '1992/07/14', 'Female', 'A-', '9876543215', 'M.Sc Botany, B.Ed', '12345678906', 'SBIN0001234', 'VI', 'B'),
(7, 'Rajeev Jacob', 'Jacob Haven', 'Market Road', 'Kochi', '682035', 'rajeev@gmail.com', '1987/12/30', 'Male', 'B-', '9876543216', 'M.A History', '12345678907', 'SBIN0001234', 'V', 'A'),
(8, 'George Mathew', 'Palathra', 'Vyttila', 'Ernakulam', '682019', 'george@gmail.com', '1984/04/05', 'Male', 'O+', '9876543217', 'M.P.Ed Physical Education', '12345678908', 'SBIN0001234', 'IV', 'B'),
(9, 'Susan George', 'Springfield', 'Palarivattom', 'Kochi', '682025', 'susan@gmail.com', '1991/09/22', 'Female', 'AB-', '9876543218', 'M.Sc Zoology, B.Ed', '12345678909', 'SBIN0001234', 'III', 'A'),
(10, 'Lucy Jacob', 'St. Jude Cottage', 'Thammanam', 'Kochi', '682032', 'lucy@gmail.com', '1986/01/18', 'Female', 'O+', '9876543219', 'M.Sc Mathematics', '12345678910', 'SBIN0001234', 'II', 'B');


-- --------------------------------------------------------
-- Table Structure for `sms_parents`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_parents`;
CREATE TABLE `sms_parents` (
  `pid` INT AUTO_INCREMENT PRIMARY KEY,
  `p_name` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `p_housename` VARCHAR(100) DEFAULT NULL,
  `p_streetname` VARCHAR(100) DEFAULT NULL,
  `p_city` VARCHAR(100) DEFAULT NULL,
  `p_pincode` VARCHAR(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_parents`
INSERT INTO `sms_parents` (`pid`, `p_name`, `phone`, `email`, `p_housename`, `p_streetname`, `p_city`, `p_pincode`) VALUES
(1, 'Jaimon Kurian', '9845012301', 'jaimon@gmail.com', 'Kurian Villa', 'High Street', 'Ernakulam', '682016'),
(2, 'Mahendhran', '9845012302', 'mahi@gmail.com', 'Mahi Nivas', 'Station Road', 'Aluva', '683101'),
(3, 'Biju', '9845012303', 'biju@gmail.com', 'Kailas', 'Market Road', 'Tripunithura', '682301'),
(4, 'Pradeep Nair', '9845012304', 'pradeep@gmail.com', 'Nair House', 'Temple Lane', 'Kadavanthra', '682020'),
(5, 'Kuriakose M', '9845012305', 'kuriakose@gmail.com', 'Kuriakose Villa', 'Bypass Road', 'Kalamassery', '683104'),
(6, 'George Thomas', '9845012306', 'georget@gmail.com', 'St. Marys House', 'Church lane', 'Kakkanad', '682030'),
(7, 'Sibi Cheriyan', '9845012307', 'sibi@gmail.com', 'Sibi Bhavanam', 'Metro Pillar Road', 'Ernakulam', '682025'),
(8, 'Joseph Chacko', '9845012308', 'joseph@gmail.com', 'Chacko Haven', 'Link Road', 'Kochi', '682035');


-- --------------------------------------------------------
-- Table Structure for `sms_students`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_students`;
CREATE TABLE `sms_students` (
  `sid` INT AUTO_INCREMENT PRIMARY KEY,
  `s_fullname` VARCHAR(100) NOT NULL,
  `s_housename` VARCHAR(100) DEFAULT NULL,
  `s_streetname` VARCHAR(100) DEFAULT NULL,
  `s_city` VARCHAR(100) DEFAULT NULL,
  `s_pincode` VARCHAR(20) DEFAULT NULL,
  `s_email` VARCHAR(100) NOT NULL,
  `s_dob` VARCHAR(50) DEFAULT NULL,
  `s_gender` VARCHAR(20) DEFAULT NULL,
  `s_class` VARCHAR(10) DEFAULT NULL,
  `s_sec` VARCHAR(10) DEFAULT NULL,
  `s_doj` VARCHAR(50) DEFAULT NULL,
  `parent_id` INT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_students`
INSERT INTO `sms_students` (`sid`, `s_fullname`, `s_housename`, `s_streetname`, `s_city`, `s_pincode`, `s_email`, `s_dob`, `s_gender`, `s_class`, `s_sec`, `s_doj`, `parent_id`) VALUES
(1, 'Nishanth J K', 'Kurian Villa', 'High Street', 'Ernakulam', '682016', 'nishanth@gmail.com', '2010/04/12', 'Male', 'X', 'A', '2020/06/01', 1),
(2, 'Nirmal Biju', 'Kailas', 'Market Road', 'Tripunithura', '682301', 'nirmal@gmail.com', '2011/08/18', 'Male', 'IX', 'A', '2021/06/01', 3),
(3, 'Gokul Mahendran', 'Mahi Nivas', 'Station Road', 'Aluva', '683101', 'gokul@gmail.com', '2010/02/28', 'Male', 'X', 'A', '2020/06/01', 2),
(4, 'Navya Pradeep', 'Nair House', 'Temple Lane', 'Kadavanthra', '682020', 'navya@gmail.com', '2011/09/14', 'Female', 'IX', 'A', '2021/06/01', 4),
(5, 'Ansa Kuriakose', 'Kuriakose Villa', 'Bypass Road', 'Kalamassery', '683104', 'ansa@gmail.com', '2012/12/05', 'Female', 'VIII', 'B', '2022/06/01', 5),
(6, 'Stalin George', 'St. Marys House', 'Church lane', 'Kakkanad', '682030', 'stalin@gmail.com', '2010/05/24', 'Male', 'X', 'B', '2020/06/01', 6),
(7, 'Sanath P Sibi', 'Sibi Bhavanam', 'Metro Pillar Road', 'Ernakulam', '682025', 'sanath@gmail.com', '2013/03/11', 'Male', 'VII', 'A', '2023/06/01', 7),
(8, 'Johan Joseph', 'Chacko Haven', 'Link Road', 'Kochi', '682035', 'johan@gmail.com', '2011/01/01', 'Male', 'IX', 'B', '2021/06/01', 8);


-- --------------------------------------------------------
-- Table Structure for `sms_admission`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_admission`;
CREATE TABLE `sms_admission` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `s_name` VARCHAR(100) NOT NULL,
  `dob` VARCHAR(50) DEFAULT NULL,
  `sex` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `f_name` VARCHAR(100) DEFAULT NULL,
  `m_name` VARCHAR(100) DEFAULT NULL,
  `f_occupation` VARCHAR(100) DEFAULT NULL,
  `m_occupation` VARCHAR(100) DEFAULT NULL,
  `house name` VARCHAR(100) DEFAULT NULL,
  `street name` VARCHAR(100) DEFAULT NULL,
  `city` VARCHAR(100) DEFAULT NULL,
  `pincode` VARCHAR(20) DEFAULT NULL,
  `g_name` VARCHAR(100) DEFAULT NULL,
  `g_email` VARCHAR(100) DEFAULT NULL,
  `g_house name` VARCHAR(100) DEFAULT NULL,
  `g_street name` VARCHAR(100) DEFAULT NULL,
  `g_city` VARCHAR(100) DEFAULT NULL,
  `g_pincode` VARCHAR(20) DEFAULT NULL,
  `g_phone no` VARCHAR(20) DEFAULT NULL,
  `nationality` VARCHAR(50) DEFAULT NULL,
  `religion` VARCHAR(50) DEFAULT NULL,
  `class` VARCHAR(10) DEFAULT NULL,
  `medical info` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_admission` (Pending admissions for demo)
INSERT INTO `sms_admission` (`id`, `s_name`, `dob`, `sex`, `email`, `f_name`, `m_name`, `f_occupation`, `m_occupation`, `house name`, `street name`, `city`, `pincode`, `g_name`, `g_email`, `g_house name`, `g_street name`, `g_city`, `g_pincode`, `g_phone no`, `nationality`, `religion`, `class`, `medical info`) VALUES
(1, 'Adithyan Nair', '2012/04/10', 'Male', 'adithyan@gmail.com', 'Raman Nair', 'Devika Nair', 'Engineer', 'Teacher', 'Nair Cottage', 'North Lane', 'Kakkanad', '682030', 'Raman Nair', 'raman@gmail.com', 'Nair Cottage', 'North Lane', 'Kakkanad', '682030', '9845098765', 'Indian', 'Hindu', 'VIII', 'None'),
(2, 'Reshma Sen', '2013/05/18', 'Female', 'reshma@gmail.com', 'Anil Sen', 'Meera Sen', 'Manager', 'Housewife', 'Sen Palace', 'MG Road', 'Ernakulam', '682011', 'Anil Sen', 'anil@gmail.com', 'Sen Palace', 'MG Road', 'Ernakulam', '682011', '9845098766', 'Indian', 'Hindu', 'IX', 'Asthma'),
(3, 'Kevin Peter', '2011/12/02', 'Male', 'kevin@gmail.com', 'Peter Paul', 'Annie Peter', 'Business', 'Doctor', 'St. Pauls', 'Bypass Road', 'Kalamassery', '683104', 'Peter Paul', 'peter@gmail.com', 'St. Pauls', 'Bypass Road', 'Kalamassery', '683104', '9845098767', 'Indian', 'Christian', 'X', 'None'),
(4, 'Diya Rajesh', '2014/09/25', 'Female', 'diya@gmail.com', 'Rajesh K', 'Smitha Rajesh', 'Government Service', 'Teacher', 'Sree Vihar', 'Temple Road', 'Tripunithura', '682301', 'Rajesh K', 'rajesh@gmail.com', 'Sree Vihar', 'Temple Road', 'Tripunithura', '682301', '9845098768', 'Indian', 'Hindu', 'VIII', 'None'),
(5, 'Alan Varghese', '2015/02/14', 'Male', 'alan@gmail.com', 'Varghese M', 'Lissy Varghese', 'Merchant Navy', 'Professor', 'Varghese Villa', 'Pipeline Road', 'Aluva', '683101', 'Varghese M', 'varghese@gmail.com', 'Varghese Villa', 'Pipeline Road', 'Aluva', '683101', '9845098769', 'Indian', 'Christian', 'VII', 'Penicillin Allergy');


-- --------------------------------------------------------
-- Table Structure for `sms_fees`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_fees`;
CREATE TABLE `sms_fees` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `pid` INT DEFAULT NULL,
  `class` VARCHAR(10) DEFAULT NULL,
  `remark` VARCHAR(100) DEFAULT NULL,
  `amount` INT DEFAULT NULL,
  `date` VARCHAR(50) DEFAULT NULL,
  `time` VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_fees` (Expanded transactions to show high revenue)
INSERT INTO `sms_fees` (`id`, `pid`, `class`, `remark`, `amount`, `date`, `time`) VALUES
(1, 1, 'X', 'Term 1', 4500, '2026/06/05', '10:30:15am'),
(2, 2, 'X', 'Term 1', 4500, '2026/06/06', '11:15:22am'),
(3, 3, 'IX', 'Term 1', 4500, '2026/06/07', '09:45:00am'),
(4, 4, 'IX', 'Term 1', 4500, '2026/06/08', '02:30:10pm'),
(5, 5, 'VIII', 'Term 1', 4500, '2026/06/10', '10:00:00am'),
(6, 6, 'X', 'Term 1', 4500, '2026/06/11', '11:40:00am'),
(7, 7, 'VII', 'Term 1', 4500, '2026/06/12', '12:20:00pm'),
(8, 8, 'IX', 'Term 1', 4500, '2026/06/14', '03:15:00pm'),
(9, 1, 'X', 'Term 2', 4500, '2026/06/15', '09:30:00am'),
(10, 3, 'IX', 'Term 2', 4500, '2026/06/18', '10:15:00am'),
(11, 5, 'VIII', 'Term 2', 4500, '2026/06/20', '11:00:00am'),
(12, 7, 'VII', 'Term 2', 4500, '2026/06/22', '02:10:00pm'),
(13, 2, 'X', 'Term 2', 4500, '2026/06/24', '11:05:00am'),
(14, 4, 'IX', 'Term 2', 4500, '2026/06/25', '03:45:00pm'),
(15, NULL, 'VIII', 'Admission Fee', 2800, '2026/06/26', '10:30:00am'),
(16, NULL, 'IX', 'Admission Fee', 2800, '2026/06/26', '11:15:00am');


-- --------------------------------------------------------
-- Table Structure for `sms_pay`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_pay`;
CREATE TABLE `sms_pay` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `tid` INT NOT NULL,
  `date` VARCHAR(50) DEFAULT NULL,
  `acc_no` VARCHAR(50) DEFAULT NULL,
  `month` VARCHAR(20) DEFAULT NULL,
  `salary` INT DEFAULT NULL,
  `deductions` INT DEFAULT NULL,
  `amount_paid` INT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_pay` (Payroll history for multiple teachers across months)
INSERT INTO `sms_pay` (`id`, `tid`, `date`, `acc_no`, `month`, `salary`, `deductions`, `amount_paid`) VALUES
(1, 1, '2026/04/30', '12345678901', 'April', 45000, 2000, 43000),
(2, 2, '2026/04/30', '12345678902', 'April', 40000, 1500, 38500),
(3, 3, '2026/04/30', '12345678903', 'April', 40000, 1500, 38500),
(4, 1, '2026/05/31', '12345678901', 'May', 45000, 2000, 43000),
(5, 2, '2026/05/31', '12345678902', 'May', 40000, 1500, 38500),
(6, 3, '2026/05/31', '12345678903', 'May', 40000, 1500, 38500),
(7, 4, '2026/05/31', '12345678904', 'May', 40000, 1000, 39000),
(8, 5, '2026/05/31', '12345678905', 'May', 42000, 1200, 40800),
(9, 6, '2026/05/31', '12345678906', 'May', 38000, 1000, 37000),
(10, 7, '2026/05/31', '12345678907', 'May', 35000, 800, 34200),
(11, 8, '2026/05/31', '12345678908', 'May', 35000, 800, 34200),
(12, 9, '2026/05/31', '12345678909', 'May', 38000, 1000, 37000),
(13, 10, '2026/05/31', '12345678910', 'May', 40000, 1500, 38500);


-- --------------------------------------------------------
-- Table Structure for `sms_notification`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_notification`;
CREATE TABLE `sms_notification` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `notifications_name` VARCHAR(100) NOT NULL,
  `message` TEXT NOT NULL,
  `active` TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_notification`
INSERT INTO `sms_notification` (`id`, `notifications_name`, `message`, `active`) VALUES
(1, 'School Reopening', 'School will reopen for the new academic year on 1st June.', 0),
(2, 'PTA Meeting', 'General PTA meeting scheduled for coming Friday at 2:00 PM in the auditorium.', 1),
(3, 'Science Exhibition 2026', 'The annual science exhibition will be held on July 10. Registrations are open now.', 1),
(4, 'Sports Day Update', 'Annual Sports Meet registrations are open until end of June. Register with physical educators.', 1),
(5, 'Half Yearly Exam Schedule', 'The examinations schedules have been uploaded. Exams start from July 15.', 1);


-- --------------------------------------------------------
-- Table Structure for `sms_s-notification`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_s-notification`;
CREATE TABLE `sms_s-notification` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `notifications_name` VARCHAR(100) NOT NULL,
  `message` TEXT NOT NULL,
  `active` TINYINT(1) DEFAULT 1,
  `receiver` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_s-notification`
INSERT INTO `sms_s-notification` (`id`, `notifications_name`, `message`, `active`, `receiver`) VALUES
(1, 'Special Class', 'Physics special class tomorrow at 9:00 AM.', 1, 'Nishanth J K'),
(2, 'Chemistry Lab', 'Please bring your lab manuals for the next class.', 1, 'Gokul Mahendran'),
(3, 'Quiz Reminder', 'Computer Science quiz is scheduled for tomorrow. Be prepared.', 1, 'Nishanth J K'),
(4, 'Assignment Submission', 'Submit your Mathematics project by June 30.', 1, 'Nirmal Biju'),
(5, 'Lab Equipment', 'Ensure you return borrowed lab setups by this Friday.', 1, 'Johan Joseph'),
(6, 'Sports Registration', 'Football selections scheduled for Wednesday evening.', 1, 'Stalin George');


-- --------------------------------------------------------
-- Table Structure for `sms_p-notification`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_p-notification`;
CREATE TABLE `sms_p-notification` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `notifications_name` VARCHAR(100) NOT NULL,
  `message` TEXT NOT NULL,
  `active` TINYINT(1) DEFAULT 1,
  `receiver` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_p-notification`
INSERT INTO `sms_p-notification` (`id`, `notifications_name`, `message`, `active`, `receiver`) VALUES
(1, 'Fees Due', 'Term 1 tuition fees for your child is due.', 1, 'Jaimon Kurian'),
(2, 'Performance Review', 'PTA meeting scheduled for your child. Venue: Room 101.', 1, 'Mahendhran'),
(3, 'Attendance Alert', 'Your child was marked absent today.', 1, 'Biju'),
(4, 'Academic Notice', 'Midterm examination scores have been updated in the portal.', 1, 'Pradeep Nair');


-- --------------------------------------------------------
-- Table Structure for `sms_t-notification`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_t-notification`;
CREATE TABLE `sms_t-notification` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `notifications_name` VARCHAR(100) NOT NULL,
  `message` TEXT NOT NULL,
  `active` TINYINT(1) DEFAULT 1,
  `receiver` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_t-notification`
INSERT INTO `sms_t-notification` (`id`, `notifications_name`, `message`, `active`, `receiver`) VALUES
(1, 'Syllabus Meeting', 'Staff meeting to discuss syllabus completion tomorrow.', 1, 'Nithin JK'),
(2, 'Exam Duty Schedule', 'Invigilation list has been updated on the admin notice board.', 1, 'Malini Nair'),
(3, 'Leave Status Approved', 'Your requested medical leave has been approved.', 1, 'Hari Prasad'),
(4, 'Answer Sheet Submission', 'Submit the graded exam answer sheets by tomorrow afternoon.', 1, 'Bindhu Cherian');


-- --------------------------------------------------------
-- Table Structure for `sms_class`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_class`;
CREATE TABLE `sms_class` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `tid` INT NOT NULL,
  `class` VARCHAR(10) NOT NULL,
  `sec` VARCHAR(10) NOT NULL,
  `date` VARCHAR(50) DEFAULT NULL,
  `time` VARCHAR(50) DEFAULT NULL,
  `link` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_class` (Scheduled classes for various grades)
INSERT INTO `sms_class` (`id`, `tid`, `class`, `sec`, `date`, `time`, `link`) VALUES
(1, 1, 'X', 'A', '2026/26/06', '10:00am', 'https://meet.google.com/abc-defg-hij'),
(2, 2, 'IX', 'A', '2026/26/06', '11:00am', 'https://meet.google.com/xyz-uvwx-yza'),
(3, 3, 'VIII', 'B', '2026/26/06', '01:00pm', 'https://meet.google.com/pqr-stuv-wxy'),
(4, 4, 'X', 'B', '2026/27/06', '09:00am', 'https://meet.google.com/mno-pqrs-tuv'),
(5, 5, 'VII', 'A', '2026/27/06', '10:30am', 'https://meet.google.com/jkl-mnop-qrs'),
(6, 6, 'VI', 'B', '2026/27/06', '11:45am', 'https://meet.google.com/fgh-ijkl-mno');


-- --------------------------------------------------------
-- Table Structure for `sms_student_att`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_student_att`;
CREATE TABLE `sms_student_att` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `class` VARCHAR(10) DEFAULT NULL,
  `sec` VARCHAR(10) DEFAULT NULL,
  `sid` INT NOT NULL,
  `name` VARCHAR(100) DEFAULT NULL,
  `date` VARCHAR(50) DEFAULT NULL,
  `session` VARCHAR(50) DEFAULT NULL,
  `status` VARCHAR(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_student_att` (Multi-day attendance history)
INSERT INTO `sms_student_att` (`id`, `class`, `sec`, `sid`, `name`, `date`, `session`, `status`) VALUES
-- June 24
(1, 'X', 'A', 1, 'Nishanth J K', '2026-06-24', '1', 'Present'),
(2, 'X', 'A', 3, 'Gokul Mahendran', '2026-06-24', '1', 'Present'),
(3, 'X', 'A', 6, 'Stalin George', '2026-06-24', '1', 'Present'),
(4, 'X', 'A', 1, 'Nishanth J K', '2026-06-24', '2', 'Present'),
(5, 'X', 'A', 3, 'Gokul Mahendran', '2026-06-24', '2', 'Present'),
(6, 'X', 'A', 6, 'Stalin George', '2026-06-24', '2', 'Present'),
-- June 25
(7, 'X', 'A', 1, 'Nishanth J K', '2026-06-25', '1', 'Present'),
(8, 'X', 'A', 3, 'Gokul Mahendran', '2026-06-25', '1', 'Present'),
(9, 'X', 'A', 6, 'Stalin George', '2026-06-25', '1', 'Absent'),
(10, 'X', 'A', 1, 'Nishanth J K', '2026-06-25', '2', 'Present'),
(11, 'X', 'A', 3, 'Gokul Mahendran', '2026-06-25', '2', 'Absent'),
(12, 'X', 'A', 6, 'Stalin George', '2026-06-25', '2', 'Absent'),
-- June 26
(13, 'X', 'A', 1, 'Nishanth J K', '2026-06-26', '1', 'Present'),
(14, 'X', 'A', 3, 'Gokul Mahendran', '2026-06-26', '1', 'Present'),
(15, 'X', 'A', 6, 'Stalin George', '2026-06-26', '1', 'Present'),
(16, 'X', 'A', 1, 'Nishanth J K', '2026-06-26', '2', 'Present'),
(17, 'X', 'A', 3, 'Gokul Mahendran', '2026-06-26', '2', 'Present'),
(18, 'X', 'A', 6, 'Stalin George', '2026-06-26', '2', 'Present');


-- --------------------------------------------------------
-- Table Structure for `sms_teacher_att`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_teacher_att`;
CREATE TABLE `sms_teacher_att` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `tid` INT NOT NULL,
  `name` VARCHAR(100) DEFAULT NULL,
  `date` VARCHAR(50) DEFAULT NULL,
  `login` VARCHAR(50) DEFAULT NULL,
  `logout` VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_teacher_att` (Multi-day logs for teachers)
INSERT INTO `sms_teacher_att` (`id`, `tid`, `name`, `date`, `login`, `logout`) VALUES
(1, 1, 'Nithin JK', '2026/06/24', '09:00:15am', '04:30:10pm'),
(2, 2, 'Malini Nair', '2026/06/24', '08:55:00am', '04:31:00pm'),
(3, 3, 'Hari Prasad', '2026/06/24', '08:58:00am', '04:30:00pm'),
(4, 1, 'Nithin JK', '2026/06/25', '08:45:00am', '04:35:00pm'),
(5, 2, 'Malini Nair', '2026/06/25', '08:52:00am', '04:30:00pm'),
(6, 4, 'Bindhu Cherian', '2026/06/25', '08:59:00am', '04:28:00pm'),
(7, 1, 'Nithin JK', '2026/06/26', '08:50:00am', NULL),
(8, 2, 'Malini Nair', '2026/06/26', '08:55:00am', NULL),
(9, 3, 'Hari Prasad', '2026/06/26', '08:57:00am', NULL);


-- --------------------------------------------------------
-- Table Structure for `sms_complaints`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_complaints`;
CREATE TABLE `sms_complaints` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `sender` VARCHAR(100) NOT NULL,
  `receiver` VARCHAR(100) NOT NULL,
  `subject` VARCHAR(255) DEFAULT NULL,
  `content` TEXT DEFAULT NULL,
  `date` VARCHAR(50) DEFAULT NULL,
  `time` VARCHAR(50) DEFAULT NULL,
  `active` TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_complaints`
INSERT INTO `sms_complaints` (`id`, `sender`, `receiver`, `subject`, `content`, `date`, `time`, `active`) VALUES
(1, 'Jaimon Kurian', 'admin', 'Transport Delay', 'School bus is arriving late consistently on our route.', '2026/06/24', '08:30:12am', 1),
(2, 'Nishanth J K', 'Nithin JK', 'Doubt in CS Project', 'Need some guidelines regarding the project documentation format.', '2026/06/25', '06:12:00pm', 1),
(3, 'Mahendhran', 'admin', 'Canteen Hygiene', 'Canteen food quality needs inspection; multiple students reported issues.', '2026/06/25', '11:00:00am', 1),
(4, 'Biju', 'Malini Nair', 'Math Homework Volume', 'The amount of home assignments assigned this week is extremely high.', '2026/06/25', '04:15:00pm', 1),
(5, 'Nirmal Biju', 'admin', 'Library AC Failure', 'The reading room air conditioning is not working for a week.', '2026/06/26', '10:00:00am', 1);


-- --------------------------------------------------------
-- Table Structure for `sms_leave`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_leave`;
CREATE TABLE `sms_leave` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `date` VARCHAR(50) DEFAULT NULL,
  `sender` VARCHAR(100) NOT NULL,
  `reason` VARCHAR(255) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `d-from` VARCHAR(50) DEFAULT NULL,
  `d-to` VARCHAR(50) DEFAULT NULL,
  `status` VARCHAR(50) DEFAULT 'In Review'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_leave` (Various leave requests)
INSERT INTO `sms_leave` (`id`, `date`, `sender`, `reason`, `description`, `d-from`, `d-to`, `status`) VALUES
(1, '2026/06/24', 'Nithin JK', 'Medical Leave', 'Suffering from fever. Need leave for two days.', '2026/06/27', '2026/06/28', 'Approved'),
(2, '2026/06/25', 'Malini Nair', 'Family Function', 'Attending sister\'s wedding in Trivandrum.', '2026/06/29', '2026/06/30', 'In Review'),
(3, '2026/06/25', 'Hari Prasad', 'Personal Work', 'Urgent work at the bank regarding property loan.', '2026/06/28', '2026/06/28', 'Approved'),
(4, '2026/06/26', 'Bindhu Cherian', 'Casual Leave', 'Going out of town for a weekend trip.', '2026/06/27', '2026/06/27', 'Rejected'),
(5, '2026/06/26', 'Thomas Mani', 'Seminar Attendance', 'Attending National Chemistry seminar at IISER.', '2026/07/02', '2026/07/04', 'In Review');


-- --------------------------------------------------------
-- Table Structure for `sms_quiz`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_quiz`;
CREATE TABLE `sms_quiz` (
  `qid` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `mark_c` INT NOT NULL,
  `mark_w` INT NOT NULL,
  `total_q` INT NOT NULL,
  `max_time` VARCHAR(50) DEFAULT NULL,
  `date` VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_quiz` (Multiple quizzes)
INSERT INTO `sms_quiz` (`qid`, `title`, `mark_c`, `mark_w`, `total_q`, `max_time`, `date`) VALUES
(1, 'Science Midterm Quiz', 4, 1, 2, '20', '2026/06/26'),
(2, 'General Math Quiz', 2, 0, 2, '15', '2026/06/26'),
(3, 'English Grammar Test', 5, 1, 2, '10', '2026/06/26'),
(4, 'Basic IT and Computer Science', 2, 0, 2, '10', '2026/06/26');


-- --------------------------------------------------------
-- Table Structure for `sms_questions`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_questions`;
CREATE TABLE `sms_questions` (
  `qn_id` INT AUTO_INCREMENT PRIMARY KEY,
  `qid` INT NOT NULL,
  `question` TEXT NOT NULL,
  `q_no` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_questions`
INSERT INTO `sms_questions` (`qn_id`, `qid`, `question`, `q_no`) VALUES
(1, 1, 'What is the chemical symbol for Water?', 1),
(2, 1, 'Which planet is known as the Red Planet?', 2),
(3, 2, 'What is the square root of 64?', 1),
(4, 2, 'What is 15 multiplied by 4?', 2),
(5, 3, 'Identify the noun in the sentence: "The dog barked loudly."', 1),
(6, 3, 'Which of the following is a conjunction?', 2),
(7, 4, 'What does CPU stand for?', 1),
(8, 4, 'Which of the following is an input device?', 2);


-- --------------------------------------------------------
-- Table Structure for `sms_options`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_options`;
CREATE TABLE `sms_options` (
  `oid` INT AUTO_INCREMENT PRIMARY KEY,
  `qn_id` INT NOT NULL,
  `value` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_options`
INSERT INTO `sms_options` (`oid`, `qn_id`, `value`) VALUES
(1, 1, 'H2O'),
(2, 1, 'CO2'),
(3, 1, 'O2'),
(4, 1, 'NaCl'),
(5, 2, 'Earth'),
(6, 2, 'Mars'),
(7, 2, 'Jupiter'),
(8, 2, 'Venus'),
(9, 3, '6'),
(10, 3, '7'),
(11, 3, '8'),
(12, 3, '9'),
(13, 4, '50'),
(14, 4, '60'),
(15, 4, '70'),
(16, 4, '80'),
(17, 5, 'Dog'),
(18, 5, 'Barked'),
(19, 5, 'Loudly'),
(20, 5, 'The'),
(21, 6, 'Run'),
(22, 6, 'And'),
(23, 6, 'Beautiful'),
(24, 6, 'Quickly'),
(25, 7, 'Central Processing Unit'),
(26, 7, 'Computer Personal Unit'),
(27, 7, 'Central Programmer Unit'),
(28, 7, 'Common Process Unit'),
(29, 8, 'Monitor'),
(30, 8, 'Printer'),
(31, 8, 'Keyboard'),
(32, 8, 'Speaker');


-- --------------------------------------------------------
-- Table Structure for `sms_answers`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_answers`;
CREATE TABLE `sms_answers` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `qn_id` INT NOT NULL,
  `oid` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_answers`
INSERT INTO `sms_answers` (`id`, `qn_id`, `oid`) VALUES
(1, 1, 1),   -- H2O is correct
(2, 2, 6),   -- Mars is correct
(3, 3, 11),  -- 8 is correct
(4, 4, 14),  -- 60 is correct
(5, 5, 17),  -- Dog is correct
(6, 6, 22),  -- And is correct
(7, 7, 25),  -- Central Processing Unit is correct
(8, 8, 31);  -- Keyboard is correct


-- --------------------------------------------------------
-- Table Structure for `sms_results`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sms_results`;
CREATE TABLE `sms_results` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `qid` INT NOT NULL,
  `sid` INT NOT NULL,
  `score` INT NOT NULL,
  `t_mark` INT NOT NULL,
  `total_q` INT NOT NULL,
  `c_answers` INT NOT NULL,
  `w_answers` INT NOT NULL,
  `date` VARCHAR(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Data for `sms_results` (Expanded student attempts)
INSERT INTO `sms_results` (`id`, `qid`, `sid`, `score`, `t_mark`, `total_q`, `c_answers`, `w_answers`, `date`) VALUES
(1, 1, 1, 8, 8, 2, 2, 0, '2026/06/26'),
(2, 1, 2, 3, 8, 2, 1, 1, '2026/06/26'),
(3, 2, 1, 4, 4, 2, 2, 0, '2026/06/26'),
(4, 2, 3, 2, 4, 2, 1, 1, '2026/06/26'),
(5, 3, 1, 10, 10, 2, 2, 0, '2026/06/26'),
(6, 3, 4, 4, 10, 2, 1, 1, '2026/06/26'),
(7, 4, 1, 4, 4, 2, 2, 0, '2026/06/26'),
(8, 4, 2, 4, 4, 2, 2, 0, '2026/06/26'),
(9, 4, 3, 2, 4, 2, 1, 1, '2026/06/26');

SET FOREIGN_KEY_CHECKS=1;
