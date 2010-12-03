<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Infusion: register_quest
| Author: Mirivlad (http://mirivlad.ru)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------+
|Created by Mirivlad - 
|http://mirivlad.ru
|mailto: mirivlad@gmail.com
|xmpp://mirivlad@jabbus.org
|xmpp://mirivlad@jabber.ru
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

include INFUSIONS."register_quest/infusion_db.php";

// Check if locale file is available matching the current site locale setting.
if (file_exists(INFUSIONS."register_quest/locale/".$settings['locale'].".php")) {
	// Load the locale file matching the current site locale setting.
	include INFUSIONS."register_quest/locale/".$settings['locale'].".php";
} else {
	// Load the infusion's default locale file.
	include INFUSIONS."register_quest/locale/English.php";
}

// Infusion general information
$inf_title = $locale['rq_title'];
$inf_description = $locale['rq_desc'];
$inf_version = "1.0";
$inf_developer = "Mirivlad";
$inf_email = "mirivlad@gmail.com";
$inf_weburl = "http://mirivlad.ru";

$inf_folder = "register_quest"; // The folder in which the infusion resides.

// Delete any items not required below.
$inf_newtable[1] = DB_INFUSION_TABLE." (
rq_id SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
rq_question TEXT,
rq_answer TEXT,
rq_hash TEXT,
PRIMARY KEY (rq_id)
) TYPE=MyISAM;";

//$inf_insertdbrow[1] = DB_INFUSION_TABLE." (field1, field2, field3, field4) VALUES('', '', '', '')";

$inf_droptable[1] = DB_INFUSION_TABLE;

//$inf_altertable[1] = DB_INFUSION_TABLE." ADD etc";

//$inf_deldbrow[1] = "other_table";

$inf_adminpanel[1] = array(
	"title" => $locale['rq_admin1'],
	"image" => "image.gif",
	"panel" => "admin.php",
	"rights" => "RQI"
);
?>