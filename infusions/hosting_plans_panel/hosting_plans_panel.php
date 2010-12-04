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
if (!defined("IN_FUSION")) { die("Access Denied"); }
if (file_exists(INFUSIONS."hosting_plans_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."hosting_plans_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."hosting_plans_panel/locale/English.php";
}

		$result = dbquery("SELECT * FROM  ".DB_PREFIX."hosting_plans");
		if(dbrows($result)) {
		echo "<table cellpadding='0' cellspacing='0' width='100%' align='center' style='background-color:#fff'>\n<tr>\n";
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
			<tr><td><b>".$locale['hpp_305'].":</b></td><td>".$data['hp_pret']."</td></tr>
			</table></div>";
			echo "<div align='center'><a href='".$data['hp_link']."'>".$locale['hpp_306']."</a></div>";
			echo "</div></td>";
			}
		echo "</tr></table>";
		} 
?>
