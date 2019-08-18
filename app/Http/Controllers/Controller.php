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

*/