<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: settings_security.php
| Author: Paul Beuk (muscapaul)
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
require_once "../maincore.php";
require_once THEMES."templates/admin_header.php";
include LOCALE.LOCALESET."admin/settings.php";

if (!checkrights("S9") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../index.php"); }

if (isset($_POST['savesettings'])) {
	$error = 0;

	$result = dbquery("UPDATE ".DB_SETTINGS." SET settings_value='".(isnum($_POST['flood_interval']) ? $_POST['flood_interval'] : "15")."' WHERE settings_name='flood_interval'");
	$result = dbquery("UPDATE ".DB_SETTINGS." SET settings_value='".(isnum($_POST['flood_autoban']) ? $_POST['flood_autoban'] : "1")."' WHERE settings_name='flood_autoban'");
	if (!$result) { $error = 1; }
	$result = dbquery("UPDATE ".DB_SETTINGS." SET settings_value='".(isnum($_POST['maintenance_level']) ? $_POST['maintenance_level'] : "102")."' WHERE settings_name='maintenance_level'");
	if (!$result) { $error = 1; }
	$result = dbquery("UPDATE ".DB_SETTINGS." SET settings_value='".(isnum($_POST['maintenance']) ? $_POST['maintenance'] : "0")."' WHERE settings_name='maintenance'");
	if (!$result) { $error = 1; }
	$result = dbquery("UPDATE ".DB_SETTINGS." SET settings_value='".addslash(descript($_POST['maintenance_message']))."' WHERE settings_name='maintenance_message'");
	if (!$result) { $error = 1; }
	
	redirect(FUSION_SELF.$aidlink."&error=".$error);
}

if (isset($_GET['error']) && isnum($_GET['error']) && !isset($message)) {
	if ($_GET['error'] == 0) {
		$message = $locale['900'];
	} elseif ($_GET['error'] == 1) {
		$message = $locale['901'];
	}
	if (isset($message)) {
		echo "<div id='close-message'><div class='admin-message'>".$message."</div></div>\n"; 
	}
}

opentable($locale['683']);
echo "<form name='settingsform' method='post' action='".FUSION_SELF.$aidlink."'>\n";
echo "<table cellpadding='0' cellspacing='0' width='500' class='center'>\n<tr>\n";
echo "<td class='tbl2' align='center' colspan='2'>".$locale['682']."</td>\n";
echo "</tr>\n<tr>\n";
echo "<td width='50%' class='tbl'>".$locale['660']."</td>\n";
echo "<td width='50%' class='tbl'><input type='text' name='flood_interval' value='".$settings['flood_interval']."' maxlength='2' class='textbox' style='width:50px;' /></td>\n";
echo "</tr>\n<tr>\n";
echo "<td width='50%' class='tbl'>".$locale['680']."</td>\n";
echo "<td width='50%' class='tbl'><select name='flood_autoban' class='textbox'>\n";
echo "<option value='1'".($settings['flood_autoban'] == "1" ? " selected='selected'" : "").">".$locale['502']."</option>\n";
echo "<option value='0'".($settings['flood_autoban'] == "0" ? " selected='selected'" : "").">".$locale['503']."</option>\n";
echo "</select></td>\n";
echo "</tr>\n<tr>\n";
echo "<td class='tbl2' align='center' colspan='2'>".$locale['681']."</td>\n";
echo "</tr>\n<tr>\n";
echo "<td width='50%' class='tbl'>".$locale['675']."</td>\n";
echo "<td width='50%' class='tbl'><select name='maintenance_level' class='textbox'>\n";
echo "<option value='102'".($settings['maintenance_level'] == "102" ? " selected='selected'" : "").">".$locale['676']."</option>\n";
echo "<option value='103'".($settings['maintenance_level'] == "103" ? " selected='selected'" : "").">".$locale['677']."</option>\n";
echo "<option value='1'".($settings['maintenance_level'] == "1" ? " selected='selected'" : "").">".$locale['678']."</option>\n";
echo "</select></td>\n";
echo "</tr>\n<tr>\n";
echo "<td width='50%' class='tbl'>".$locale['657']."</td>\n";
echo "<td width='50%' class='tbl'><select name='maintenance' class='textbox' style='width:50px;'>\n";
echo "<option value='1'".($settings['maintenance'] == "1" ? " selected='selected'" : "").">".$locale['502']."</option>\n";
echo "<option value='0'".($settings['maintenance'] == "0" ? " selected='selected'" : "").">".$locale['503']."</option>\n";
echo "</select></td>\n";
echo "</tr>\n<tr>\n";
echo "<td valign='top' width='50%' class='tbl'>".$locale['658']."</td>\n";
echo "<td width='50%' class='tbl'><textarea name='maintenance_message' cols='50' rows='5' class='textbox' style='width:200px;'>".stripslashes($settings['maintenance_message'])."</textarea></td>\n";
echo "</tr>\n<tr>\n";
echo "<td align='center' colspan='2' class='tbl'><br />\n";
echo "<input type='submit' name='savesettings' value='".$locale['750']."' class='button' /></td>\n";
echo "</tr>\n</table>\n</form>\n";
closetable();

require_once THEMES."templates/footer.php";
?>
