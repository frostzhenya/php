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
| Copyright 2002 - 2009 Nick Jones
| http://www.php-fusion.co.uk/
+---------------------------------------------------------+
| Filename: hosting_plans_admin.php
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
include "../../maincore.php";
require_once THEMES."templates/admin_header.php";
if (file_exists(INFUSIONS."hosting_plans_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."hosting_plans_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."hosting_plans_panel/locale/English.php";
}
if(isset($_GET['page']) && isnum($_GET['page'])) {
	if($_GET['page'] == 1) {	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sql = "DELETE FROM `".DB_PREFIX."hosting_plans` WHERE `hp_id` = ".$_POST['hp_id']." LIMIT 1";
		$rez = mysql_query($sql);
		redirect("".FUSION_SELF.$aidlink."&page=1");
	} else {
		opentable($locale['hpp_307']);
		echo "<table cellpadding='1' cellspacing='2' width='100%' align='center' class='tbl-border'>\n<tr>\n";
		echo "<td class='tbl2' align='center'><a href='".FUSION_SELF.$aidlink."'>".$locale['hpp_308']."</a></td>";
		echo "<td class='tbl1' align='center'><a href='".FUSION_SELF.$aidlink."&amp;page=1'>".$locale['hpp_309']."</a></td>";
		echo "</tr></table><br />";
				$result = dbquery("SELECT * FROM  ".DB_PREFIX."hosting_plans");
				if(dbrows($result)) {
				echo "<form method='post' action=''><table cellpadding='0' cellspacing='0' width='100%' align='center'>\n<tr>\n";
					while($data = dbarray($result)) {
					echo "<td width='33%'><div style='width:230px; border: 1px solid ".$data['hp_color']."; background-color:#fff'>";
					echo "<div style='width:50px; height:50px; background-color:".$data['hp_color']."'></div>";
					echo "<div style='font-size:14px; text-align:center; font-weight:bold; margin-top:-40px'>".$data['hp_name']."</div>";
					echo "<div style='text-align:center; margin-top:30px; margin-bottom:10px'><img src='".INFUSIONS."hosting_plans_panel/images/server.JPG' alt='' /></div>";
					echo "<div><table align='center' width='80%'><tr>
					<td>".$locale['hpp_300'].":</td><td>".$data['hp_space']."</td></tr>
					<tr><td>".$locale['hpp_301'].":</td><td>".$data['hp_trafic']."</td></tr>
					<tr><td>".$locale['hpp_302'].":</td><td>".$data['hp_database']."</td></tr>
					<tr><td>".$locale['hpp_303'].":</td><td>".$data['hp_mail']."</td></tr>
					<tr><td>".$locale['hpp_304'].":</td><td>".$data['hp_subdomains']."</td></tr>
					<tr><td><b>".$locale['hpp_305'].":</td><td>".$data['hp_pret']."</b></td></tr>
					</table></div>";
					echo "</div><div align='center'><input type='radio' name='hp_id' value='".$data['hp_id']."' /></div></td>";
					
					}
				echo "</tr></table>";
				echo "<div align='center'><input type='submit' name='register' value='".$locale['hpp_310']."' class='button'/></div></form>";
				} else {
					echo "<div style='background-color:#fff'>";
					echo $locale['hpp_311'];
					echo "</div>";
				}
				
		closetable();
		}
	} else {
	redirect("index.php");
	}
} else {
opentable("".$locale['hpp_312']."- Hosting Plans Panel");
		echo "<table cellpadding='1' cellspacing='2' width='100%' align='center' class='tbl-border'>\n<tr>\n";
		echo "<td class='tbl1' align='center'><a href='".FUSION_SELF.$aidlink."'>".$locale['hpp_308']."</a></td>";
		echo "<td class='tbl2' align='center'><a href='".FUSION_SELF.$aidlink."&amp;page=1'>".$locale['hpp_309']."</a></td>";
		echo "</tr></table><br />";
		if($_SERVER['REQUEST_METHOD'] != 'POST') {
		echo "<form method='post' action=''>";
		echo "<table cellpadding='1' cellspacing='2' width='70%' align='center' class='tbl-border'>\n<tr>\n";
		echo "<td class='tbl2' align='center'>".$locale['hpp_313'].":</td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_name' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";
		echo "</tr><tr>";
		echo "<td class='tbl2' align='center'>".$locale['hpp_301']." (Mb):</td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_trafic' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";
		echo "</tr><tr>";
		echo "</tr><tr>";
		echo "<td class='tbl2' align='center'>".$locale['hpp_302'].":</td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_database' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";
		echo "</tr><tr>";
		echo "<td class='tbl2' align='center'>".$locale['hpp_303'].":</td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_mail' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";
		echo "</tr><tr>";
		echo "<td class='tbl2' align='center'>".$locale['hpp_300'].":</td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_space' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";
		echo "</tr><tr>";
		echo "<td class='tbl2' align='center'>".$locale['hpp_304'].":</td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_subdomains' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";		
		echo "</tr><tr>";
		echo "<td class='tbl2' align='center'>".$locale['hpp_314'].":<br /><small>ex. #e1e1e1</small></td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_color' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";		
		echo "</tr><tr>";
		echo "<td class='tbl2' align='center'>".$locale['hpp_305']."</td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_pret' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";		
		echo "</tr><tr>";
		echo "<td class='tbl2' align='center'>".$locale['hpp_315']."</td>";
		echo "<td class='tbl2' align='center'><input type='text' name='hp_link' value='' maxlength='100' class='textbox' style='width:200px;' /></td>";			
		echo "</table>";
		echo "<div align='center'><br /><input type='submit' name='trimite' value='".$locale['hpp_308']."' class='button'/></div>";
		echo "</form>";	
		} else {
		if(!isset($_POST['hp_name'])) {
		$error = $locale['hpp_316'];
		}
		if(!isset($_POST['hp_trafic'])) {
		$error = $locale['hpp_316'];
		}
		if(!isset($_POST['hp_database'])) {
		$error = $locale['hpp_316'];
		}
		if(!isset($_POST['hp_mail'])) {
		$error = $locale['hpp_316'];
		}
		if(!isset($_POST['hp_space'])) {
		$error = $locale['hpp_316'];
		}
		if(!isset($_POST['hp_subdomains'])) {
		$error = $locale['hpp_316'];
		}
		if(!isset($_POST['hp_color'])) {
		$error = $locale['hpp_316'];
		}
		if(!isset($_POST['hp_pret'])) {
		$error = $locale['hpp_316'];
		}
		if(!isset($_POST['hp_link'])) {
		$error = $locale['hpp_316'];
		}
		if(empty($error)){
		$sql = "INSERT INTO `".DB_PREFIX."hosting_plans` (`hp_name` , `hp_trafic` , `hp_database` , `hp_mail` , `hp_space` , `hp_subdomains` , `hp_color`, `hp_pret` , `hp_link`)
				   VALUES ('".$_POST['hp_name']."', '".$_POST['hp_trafic']."', '".$_POST['hp_database']."', '".$_POST['hp_mail']."', '".$_POST['hp_space']."', '".$_POST['hp_subdomains']."', '".$_POST['hp_color']."', '".$_POST['hp_pret']."', '".$_POST['hp_link']."');";
		$rez = mysql_query($sql);
		if ($rez) {
		echo "<div class='admin-message'>".$locale['hpp_318']."<a href='".FUSION_SELF.$aidlink."'>-> ".$locale['hpp_319']."</a></div>";
		} else {
		echo $locale['hpp_317'];
		}
		} else {
		echo $error;
		}
		}

closetable();
		echo "</table>";
}
require_once THEMES."templates/footer.php";
?>
