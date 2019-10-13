<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}


/*

**************************Language table*****************************************
$sql = "
	CREATE TABLE language (
		language_id INT(11) PRIMARY KEY AUTO_INCREMENT,
		title varchar(100) NOT NULL,
		language_added INT(11) NOT NULL,
		serial_no INT(11) NOT NULL DEFAULT '-1',
		active_status enum('0','1') DEFAULT '1',
		seo_slug varchar(100) NOT NULL,
		created_at DateTime DEFAULT CURRENT_TIMESTAMP,
		updated_at DateTime DEFAULT CURRENT_TIMESTAMP,
		CONSTRAINT FK_added_by FOREIGN KEY (language_added) REFERENCES admin_details(admin_id),
		CONSTRAINT language_title UNIQUE (title)
	);
"
**************************Language table*****************************************


**********************Language chapter table*************************************
$sql = "
	CREATE TABLE language_chapter (
		chapter_id INT(11) PRIMARY KEY AUTO_INCREMENT,
		chapter_title varchar(100) NOT NULL,
		chapter_describe varchar(500),
		language_id INT(11) NOT NULL,
		chapter_added INT(11) NOT NULL,
		serial_no INT(11) NOT NULL DEFAULT '-1',
		active_status enum('0','1') DEFAULT '1',
		seo_slug varchar(100) NOT NULL,
		created_at DateTime DEFAULT CURRENT_TIMESTAMP,
		updated_at DateTime DEFAULT CURRENT_TIMESTAMP,
		CONSTRAINT FK_added_by_chapter FOREIGN KEY (chapter_added) REFERENCES admin_details(admin_id),
		CONSTRAINT FK_language FOREIGN KEY (language_id) REFERENCES language(language_id)
	);
"
**********************Language chapter table*************************************

**********************site settings table*************************************
$sql = "
	CREATE TABLE site_settings (
		id INT(11) PRIMARY KEY AUTO_INCREMENT,
		site_title varchar(100) NULL,
		site_logo_path varchar(500),
		social_link varchar(300) NULL,
		email varchar(100) NULL,
		phone_no varchar(20) NULL,
		address varchar(255) NULL,
		edited_by INT(11) NOT NULL,
		created_at DateTime DEFAULT CURRENT_TIMESTAMP,
		updated_at DateTime DEFAULT CURRENT_TIMESTAMP,
		CONSTRAINT FK_added_by_settings FOREIGN KEY (edited_by) REFERENCES admin_details(admin_id)
	);
"
$find_id_super_admin = "
	SELECT admin_id FROM admin_details WHERE admin_type = "superadmin" AND active_status = "1" ORDER BY admin_id DESC LIMIT 1;
";
$insert = "
	INSERT INTO site_settings(site_title,site_logo_path,social_link,email,phone_no,address,edited_by) VALUES("","","","","","","1");
";
**********************site settings table*************************************

**********************Extra page table*************************************
$sql = "
	CREATE TABLE extra_page (
		id INT(11) PRIMARY KEY AUTO_INCREMENT,
		page_title varchar(100) NULL,
		page_image_path varchar(500),
		page_content varchar(500) NULL,
		edited_by INT(11) NOT NULL,
		page_status enum('0','1') DEFAULT '1',
		seo_url varchar(100) NOT NULL,
		created_at DateTime DEFAULT CURRENT_TIMESTAMP,
		updated_at DateTime DEFAULT CURRENT_TIMESTAMP,
		CONSTRAINT FK_added_by_extra_page FOREIGN KEY (edited_by) REFERENCES admin_details(admin_id)
	);
"
**********************Extra page table*************************************

**********************Extra page content table*****************************    //Except
$sql = "
	CREATE TABLE extra_page_content (
		id INT(11) PRIMARY KEY AUTO_INCREMENT,
		page_content varchar(500) NULL,
		page_id INT(11) NOT NULL,
		edited_by INT(11) NOT NULL,
		created_at DateTime DEFAULT CURRENT_TIMESTAMP,
		updated_at DateTime DEFAULT CURRENT_TIMESTAMP,
		CONSTRAINT FK_added_by_extra_page_content FOREIGN KEY (edited_by) REFERENCES admin_details(admin_id),
		CONSTRAINT FK_page_detil FOREIGN KEY (page_id) REFERENCES extra_page(id)
	);
"
**********************Extra page content table*****************************

*/