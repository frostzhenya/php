<?php
/*
+-----------------------------------------+
| host_way For PHP-Fusion
+-----------------------------------------+
+-----------------------------------------+
| Copyright © 2010 by SFINXUL74 
| Web: contact@themephpfusion.ro
| Email: www.themephpfusion.ro
|-----------------------------------------+
==================================================================================
|                                                                                |
|    This program is free software: you can redistribute it and/or modify        |
|    it under the terms of the GNU Affero General Public License as              |
|    published by the Free Software Foundation, either version 3 of the          |
|    License, or (at your option) any later version.                             |
|                                                                                |
|    This program is distributed in the hope that it will be useful,             |
|    but WITHOUT ANY WARRANTY; without even the implied warranty of              |
|    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the               |
|    GNU Affero General Public License for more details.                         |
|                                                                                |
|   You should have received a copy of the GNU Affero General Public License     |
|    along with this program.  If not, see <http://www.gnu.org/licenses/>.       |
|                                                                                |
==================================================================================
|-----------------------------------------+
| PHP-Fusion
| Copyright © 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
|-----------------------------------------+
*/

?>
<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright � 2002 - 2009 Nick Jones
| http://www.php-fusion.co.uk/
+---------------------------------------------------------+
| Filename: infusion.php
| Version: 1.00
| Author: Senzo
| Site: http://php-fusion.ro | E-mail: s3nzzo@yahoo.com
| Date: April, 2010
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

if (!defined("DB_HOSTING_PLANS")) {
define("DB_HOSTING_PLANS", DB_PREFIX."hosting_plans");
}

$inf_title = "Hosting Plans Panel";
$inf_description = "Completez mai tarziu"; 
$inf_version = "1.00";
$inf_developer = "Senzo";
$inf_email = "s3nzzo@mail.com";
$inf_weburl = "http://www.phpfusion.ro";
$inf_folder = "hosting_plans_panel"; 

$inf_newtable[1] = DB_HOSTING_PLANS." (
  hp_id INT(11) NOT NULL AUTO_INCREMENT,
  hp_name VARCHAR(100) NOT NULL,
  hp_trafic VARCHAR(100) NOT NULL,
  hp_database VARCHAR(100) NOT NULL,
  hp_mail VARCHAR(100) NOT NULL,
  hp_space VARCHAR(100) NOT NULL,
  hp_subdomains VARCHAR(100) NOT NULL DEFAULT '0',
  hp_color VARCHAR(100) NOT NULL,
  hp_pret VARCHAR(100) NOT NULL,
  hp_link VARCHAR(255) NOT NULL,
  PRIMARY KEY  (hp_id)
) TYPE=MyISAM;";

$inf_droptable[1] = DB_HOSTING_PLANS;


$inf_adminpanel[1] = array(
	"title" => "Hosting Plans Panel",
	"image" => "infusion_panel.gif",
	"panel" => "hosting_plans_admin.php",
	"rights" => "PRO"
);
?>
