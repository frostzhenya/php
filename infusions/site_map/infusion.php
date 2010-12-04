<?php
/*---------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: user_info_panel.php
| Author: Nick Jones (Digitanium)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------+
| Modified site_map
| for php-fusion v.7.0.x
| site_map - ver. 2.1
| Powered by modEx  © 2008
+--------------------------------------------------------+*/

if (!defined("IN_FUSION")) { die("Access Denied"); }

if (file_exists(INFUSIONS."site_map/locale/".$settings['locale'].".php")) {
	include INFUSIONS."site_map/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."site_map/locale/English.php";
}


// Infusion general information
$inf_title = $locale['SM100'];
$inf_description = $locale['SM101'];
$inf_version = "2.1";

$inf_developer = "modEx";
$inf_email = "mod@krastalk.ru";
$inf_weburl = "http://sexmod.ru/";

$inf_folder = "site_map"; 

$inf_sitelink[1] = array(
	"title" => $locale['SM100'],
	"url" => "site_map.php",
	"visibility" => "0"
);
?>