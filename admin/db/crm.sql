CREATE DATABASE IF NOT EXISTS `crm`;

use crm;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `extension` int(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `admin_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

REPLACE INTO `admin_users` VALUES (1,'CRM Admin','admin','d658068ba43df7d712e7511a3d1f3bd3');

CREATE TABLE IF NOT EXISTS `query_type` (
  `uniqueid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uniqueid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `sub_query_type` (
  `uniqueid` int(10) NOT NULL AUTO_INCREMENT,
  `qtype_id` int(10) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `res_date` varchar(200) DEFAULT "48",
  PRIMARY KEY (`uniqueid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `cases` (
  `uniqueid` int(100) NOT NULL AUTO_INCREMENT,
  `persal_id` varchar(13) NOT NULL,
  `qtype_id` int(10) NOT NULL,
  `sub_qtype_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `create_date` varchar(200) DEFAULT NULL,
  `res_date` varchar(200) DEFAULT NULL,
  `close_date` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uniqueid`)
) ENGINE=InnoDB AUTO_INCREMENT=100000 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `notes` (
  `uniqueid` int(100) NOT NULL AUTO_INCREMENT,
  `case_id` int(100) NOT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`uniqueid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `call_recordings` (
  `uniqueid` int(10) NOT NULL AUTO_INCREMENT,
  `case_id` int(10) NOT NULL,
  `recording` varchar(200) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uniqueid`),
  UNIQUE KEY `recording` (`recording`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `calls` (
  `extension` varchar(80) NOT NULL,
  `callerid` varchar(80) NOT NULL,
  `uniqueid` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`extension`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `members` (
  `member_number` varchar(13) NOT NULL,
  `beneficiary_code` varchar(2) NOT NULL,
  `beneficiary_firstname` varchar(80) DEFAULT '',
  `beneficiary_initials` varchar(80) NOT NULL,
  `beneficiary_surname` varchar(80) NOT NULL,
  `beneficiary_birthdate` varchar(80) NOT NULL,
  `beneficiary_gender` varchar(80) NOT NULL,
  `beneficiary_effective_date` varchar(8) NOT NULL,
  `beneficiary_end_date` varchar(8) DEFAULT '',
  `beneficiary_id` varchar(13) NOT NULL,
  `beneficiary_status` varchar(2) NOT NULL,
  `Scheme_Option` varchar(2) NOT NULL,
  `prov_code` varchar(20) DEFAULT '',
  `address_line_1` varchar(28) NOT NULL,
  `address_line_2` varchar(28) DEFAULT '',
  `address_line_3` varchar(28) DEFAULT '',
  `address_line_4` varchar(28) DEFAULT '',
  `post_code` varchar(4) NOT NULL,
  `previous_member_number` varchar(9) DEFAULT '',
  `telephone_number` varchar(16) DEFAULT '',
  `cellular_number` varchar(16) DEFAULT '',
  `beneficiary_registration_date` varchar(8) NOT NULL,
  `beneficiary_option_effective_date` varchar(8) NOT NULL,
  `beneficiary_relationship` varchar(16) NOT NULL,
  `language_indicator` varchar(1) NOT NULL,
  `suspension_date_start` varchar(8) DEFAULT '',
  `suspension_date_end` varchar(8) DEFAULT '',
  `suspension_reason` varchar(20) DEFAULT '',
  `fax_number` varchar(16) DEFAULT '',
  `email_address` varchar(16) DEFAULT '',
  `vip_ind` varchar(1) DEFAULT '',
  `beneficiary_title` varchar(4) DEFAULT '',
  `previous_medical_aid_name` varchar(40) DEFAULT '',
  `previous_medical_aid_end_date` varchar(8) DEFAULT '',
  `monthly_salary_amount` varchar(15) DEFAULT '',
  `salary_effective_date` varchar(8) DEFAULT '',
  `home_language` varchar(1) NOT NULL,
  `written_language` varchar(1) NOT NULL,
  `spoken_language` varchar(1) NOT NULL,
  `mailing_preference_for_claims_statements` varchar(1) NOT NULL,
  `mailing_preference_for_all_other_letters` varchar(1) NOT NULL,
  `organisation_code` varchar(6) DEFAULT '',
  `organisation_code_effective_date` varchar(8) DEFAULT '',
  `deceased_date` varchar(8) DEFAULT '',
  `dependant_language` varchar(1) NOT NULL,
  `employer_group_number` varchar(9) DEFAULT '',
  `employer_group_effective_date` varchar(8) DEFAULT '',
  `division_code` varchar(2) DEFAULT '',
  `employee_number` varchar(12) DEFAULT '',
  `option_name` varchar(36) NOT NULL,
  `member_type` varchar(1) DEFAULT '',
  UNIQUE KEY `member_number` (`member_number`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `persal` (
  `persal_no` varchar(8) NOT NULL,
  `date_of_birth` varchar(8) NOT NULL,
  `organisation` varchar(2) NOT NULL,
  `temporary` varchar(1) NOT NULL,
  `appointment_date` varchar(8) DEFAULT '',
  `resignation_date` varchar(8) DEFAULT '',
  `exclude_indicator` varchar(1) DEFAULT '',
  `surname` varchar(25) NOT NULL,
  `initials` varchar(8) NOT NULL,
  `id_number` varchar(13) NOT NULL,
  `nature_of_appointment` varchar(2) NOT NULL,
  `appointment_act` varchar(5) NOT NULL,
  `rank` varchar(5) NOT NULL,
  `contract_end_date` varchar(8) NOT NULL,
  `salary_level` varchar(2) NOT NULL,
  `june_2006_subsidy_amount` varchar(10) NOT NULL,

  `salary_notch` varchar(10) DEFAULT '',
  `province_description` varchar(50) DEFAULT '',
  `nature_of_appointment_description` varchar(50) DEFAULT '',
  `appointment_act_description` varchar(50) DEFAULT '',

  UNIQUE KEY `id_number` (`id_number`),
  UNIQUE KEY `persal_no` (`persal_no`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hna` (
  `uniqueid` int(100) NOT NULL AUTO_INCREMENT,
  `persal_id` varchar(13) NOT NULL,
  `dep_adult` varchar(80) NOT NULL,
  `dep_child` varchar(80) NOT NULL,
  `advisor` varchar(80) NOT NULL,
  `salary_amount` varchar(80) NOT NULL,
  `step2Radio` varchar(80) NOT NULL,
  `step3Radio` varchar(80) NOT NULL,
  `step4Radio` varchar(80) NOT NULL,
  `step5Radio` varchar(80) NOT NULL,
  PRIMARY KEY (`uniqueid`),
  UNIQUE KEY `persal_id` (`persal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `asterisk` (
  `uniqueid` int(10) NOT NULL AUTO_INCREMENT,
  `amiip` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`uniqueid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `new_members` (
  `beneficiary_id` varchar(13) NOT NULL,
  `beneficiary_firstname` varchar(80) DEFAULT '',
  `beneficiary_initials` varchar(80) NOT NULL,
  `beneficiary_surname` varchar(80) NOT NULL,
  `beneficiary_birthdate` varchar(80) NOT NULL,
  `beneficiary_gender` varchar(80) NOT NULL,
  `beneficiary_status` varchar(2) NOT NULL,
  `address_line_1` varchar(28) NOT NULL,
  `address_line_2` varchar(28) DEFAULT '',
  `address_line_3` varchar(28) DEFAULT '',
  `address_line_4` varchar(28) DEFAULT '',
  `post_code` varchar(4) NOT NULL,
  `telephone_number` varchar(16) DEFAULT '',
  `cellular_number` varchar(16) DEFAULT '',
  `beneficiary_relationship` varchar(16) NOT NULL,
  `email_address` varchar(16) DEFAULT '',
  `vip_ind` varchar(1) DEFAULT '',
  `beneficiary_title` varchar(4) DEFAULT '',
  `monthly_salary_amount` varchar(15) DEFAULT '',
  `home_language` varchar(1) NOT NULL,
  `written_language` varchar(1) NOT NULL,
  `mailing_preference_for_claims_statements` varchar(1) NOT NULL,
  `mailing_preference_for_all_other_letters` varchar(1) NOT NULL,
  `deceased_date` varchar(8) DEFAULT '',
  `option_name` varchar(36) NOT NULL,
  `member_type` varchar(1) DEFAULT '',
  UNIQUE KEY `beneficiary_id` (`beneficiary_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `new_persal` (
  `persal_no` varchar(8) NOT NULL,
  `appointment_date` varchar(8) DEFAULT '',
  `id_number` varchar(13) NOT NULL,
  `salary_level` varchar(2) NOT NULL,
  `june_2006_subsidy_amount` varchar(10) NOT NULL,
  `salary_notch` varchar(10) DEFAULT '',
  `province_description` varchar(50) DEFAULT '',
  UNIQUE KEY `id_number` (`id_number`),
  UNIQUE KEY `persal_no` (`persal_no`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
