<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright (C) 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: user_fields.php
| Author: Nick Jones (Digitanium)
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
include LOCALE.LOCALESET."admin/user_fields.php";

if (!checkrights("UF") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../index.php"); }

if ((isset($_GET['action']) && $_GET['action'] == "mu") && (isset($_GET['field_id']) && isnum($_GET['field_id']))) {
	$data2 = dbarray(dbquery("SELECT field_cat FROM ".DB_USER_FIELDS." WHERE field_id='".$_GET['field_id']." LIMIT 1'"));
	$data = dbarray(dbquery("SELECT field_id FROM ".DB_USER_FIELDS." WHERE field_cat='".$data2['field_cat']."' AND field_order='".intval($_GET['order'])."'"));
	$result = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order+1 WHERE field_id='".$data['field_id']."'");
	$result = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_id='".$_GET['field_id']."'");
	redirect(FUSION_SELF.$aidlink);
} elseif ((isset($_GET['action']) && $_GET['action'] == "md") && (isset($_GET['field_id']) && isnum($_GET['field_id']))) {
	$data2 = dbarray(dbquery("SELECT field_cat FROM ".DB_USER_FIELDS." WHERE field_id='".$_GET['field_id']." LIMIT 1'"));
	$data = dbarray(dbquery("SELECT field_id FROM ".DB_USER_FIELDS." WHERE field_cat='".$data2['field_cat']."' AND field_order='".intval($_GET['order'])."'"));
	$result = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_id='".$data['field_id']."'");
	$result = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order+1 WHERE field_id='".$_GET['field_id']."'");
	redirect(FUSION_SELF.$aidlink);
} elseif (isset($_GET['enable']) && file_exists(INCLUDES."user_fields/".stripinput($_GET['enable'])."_include_var.php") && file_exists(INCLUDES."user_fields/".stripinput($_GET['enable'])."_include.php")) {
	if (file_exists(LOCALE.LOCALESET."user_fields/".stripinput($_GET['enable']).".php")) {
		include LOCALE.LOCALESET."user_fields/".stripinput($_GET['enable']).".php";
	}
	include INCLUDES."user_fields/".stripinput($_GET['enable'])."_include_var.php";
	if (isset($_POST['enable'])) {
		$field_cat = isnum($_POST['field_cat']) ? $_POST['field_cat'] : 0;
		$result = dbquery("SELECT field_cat, field_order FROM ".DB_USER_FIELDS." WHERE field_name='".stripinput($_GET['enable'])."'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_cat='".$field_cat."'"), 0) + 1;
			$result = dbquery("UPDATE ".DB_USER_FIELDS." SET field_cat='".$field_cat."', field_order='".$field_order."' WHERE field_name='".stripinput($_GET['enable'])."'");
			$result = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_cat='".$data['field_cat']."' AND field_order>'".$data['field_order']."'");
		} else {
			$field_order = dbresult(dbquery("SELECT MAX(field_order) FROM ".DB_USER_FIELDS." WHERE field_cat='".$field_cat."'"), 0) + 1;
			if (!$user_field_dbinfo || $result = dbquery("ALTER TABLE ".DB_USERS." ADD ".$user_field_dbname." ".$user_field_dbinfo)) {
				$result = dbquery("INSERT INTO ".DB_USER_FIELDS." (field_name, field_cat, field_order) VALUES ('".$user_field_dbname."', '".$field_cat."', '".$field_order."')");
			}
		}
		redirect(FUSION_SELF.$aidlink);
	} else {
		$result = dbquery("SELECT field_cat FROM ".DB_USER_FIELDS." WHERE field_name='".stripinput($_GET['enable'])."'");
		if (dbrows($result)) {
			$data = dbarray($result);
			$field_cat = $data['field_cat'];
			$form_title = $locale['420'];
		} else {
			$field_cat = "";
			$form_title = $locale['421'];
		}
		opentable($form_title);
		echo "<form name='cat_form' method='post' action='".FUSION_SELF.$aidlink."&amp;enable=".stripinput($_GET['enable'])."'>\n";
		echo "<table cellpadding='0' cellspacing='0' class='center'>\n<tr>\n";
		echo "<td class='tbl'>".$locale['422']."</td>\n";
		echo "<td class='tbl'>".$user_field_name."</td>\n";
		echo "</tr>\n<tr>\n";
		echo "<td class='tbl'>".$locale['423']."</td>\n";
		echo "<td class='tbl'><select name='field_cat' class='textbox'>\n";
		$result = dbquery("SELECT field_cat_id, field_cat_name FROM ".DB_USER_FIELD_CATS." ORDER BY field_cat_order");
		$sel = "";
		if (dbrows($result)) {
			while ($data = dbarray($result)) {
				if ($field_cat)  { $sel = ($field_cat == $data['field_cat_id'] ? " selected='selected'" : ""); }
				echo "<option value='".$data['field_cat_id']."'".$sel.">".$data['field_cat_name']."</option>\n";
			}
		}
		echo "</select>\n</td>\n";
		echo "</tr>\n<tr>\n";
		echo "<td align='center' colspan='2' class='tbl'>\n";
		echo "<input type='submit' name='enable' value='".($field_cat ? $locale['424'] : $locale['425'])."' class='button' /></td>\n";
		echo "</tr>\n</table>\n</form>\n";
		closetable();
	}
} elseif ((isset($_GET['disable']) && isnum($_GET['disable']))) {
	$data = dbarray(dbquery("SELECT field_name, field_cat, field_order FROM ".DB_USER_FIELDS." WHERE field_id='".$_GET['disable']."'"));
	if (file_exists(LOCALE.LOCALESET."user_fields/".$data['field_name'].".php")) {
		include LOCALE.LOCALESET."user_fields/".$data['field_name'].".php";
	}
	include INCLUDES."user_fields/".$data['field_name']."_include_var.php";
	if (!$user_field_dbinfo || $result = dbquery("ALTER TABLE ".DB_USERS." DROP ".$user_field_dbname)) {
		$result = dbquery("UPDATE ".DB_USER_FIELDS." SET field_order=field_order-1 WHERE field_cat='".$data['field_cat']."' AND field_order>'".$data['field_order']."'");
		$result = dbquery("DELETE FROM ".DB_USER_FIELDS." WHERE field_id='".$_GET['disable']."'");
	}
	redirect(FUSION_SELF.$aidlink);
}

$available_fields = array(); $enabled_fields = array();

if ($temp = opendir(INCLUDES."user_fields/")) {
	while (false !== ($file = readdir($temp))) {
		if (!in_array($file, array("..",".","index.php")) && !is_dir(INCLUDES."user_fields/".$file)) {
			if (preg_match("/_var.php/i", $file)) {
				$field_name = explode("_", $file);
				$available_fields[] = $field_name[0]."_".$field_name[1];
				unset($field_name);
			}
		}
	}
	closedir($temp);
}
sort($available_fields);

opentable($locale['400']);
echo "<table cellpadding='0' cellspacing='1' width='80%' class='tbl-border center'>\n<tr>\n";
$result = dbquery(
	"SELECT field_id, field_name, field_cat, field_order, field_cat_name FROM ".DB_USER_FIELDS." tuf
	INNER JOIN ".DB_USER_FIELD_CATS." tufc ON tuf.field_cat = tufc.field_cat_id
	ORDER BY field_cat_order, field_order"
);
if (dbrows($result)) {
	echo "<td width='1%' class='tbl2' style='white-space:nowrap'><strong>".$locale['401']."</strong></td>\n";
	echo "<td class='tbl2' style='white-space:nowrap'><strong>".$locale['402']."</strong></td>\n";
	echo "<td width='1%' class='tbl2' style='white-space:nowrap'><strong>".$locale['403']."</strong></td>\n";
	echo "<td width='1%' class='tbl2' style='white-space:nowrap'><strong>".$locale['404']."</strong></td>\n";
	echo "</tr>\n";
	$cat = 1; $i = 1; $k = 0;
	while($data = dbarray($result)) {
		if ($cat != $data['field_cat_name']) {
			$rows = dbcount("(field_id)", DB_USER_FIELDS, "field_cat='".$data['field_cat']."'");
			$cat = $data['field_cat_name'];
			$i = 1;
			echo "<tr>\n<td colspan='4' class='tbl2'><strong>".$data['field_cat_name']."</strong></td>\n</tr>\n";
		}
		if (file_exists(LOCALE.LOCALESET."user_fields/".$data['field_name'].".php")) {
			include LOCALE.LOCALESET."user_fields/".$data['field_name'].".php";
		}
		include INCLUDES."user_fields/".$data['field_name']."_include_var.php";
		$enabled_fields[] = $data['field_name'];
		echo "<tr>\n";
		echo "<td width='1%' class='tbl1' style='white-space:nowrap'>".$user_field_name."</td>\n";
		echo "<td class='tbl1' style='white-space:nowrap'>".$user_field_desc."</td>\n";
		echo "<td width='1%' class='tbl1' style='white-space:nowrap'>".$data['field_order'];
		if ($rows != 1) {
			$up = $data['field_order'] - 1;
			$down = $data['field_order'] + 1;
			if ($i == 1) {
				echo " <a href='".FUSION_SELF.$aidlink."&amp;action=md&amp;order=$down&amp;field_id=".$data['field_id']."'><img src='".get_image("down")."' alt='".$locale['405']."' title='".$locale['405']."' style='border:0px;' /></a>\n";
			} elseif ($i < $rows) {
				echo " <a href='".FUSION_SELF.$aidlink."&amp;action=mu&amp;order=$up&amp;field_id=".$data['field_id']."'><img src='".get_image("up")."' alt='".$locale['406']."' title='".$locale['406']."' style='border:0px;' /></a>\n";
				echo " <a href='".FUSION_SELF.$aidlink."&amp;action=md&amp;order=$down&amp;field_id=".$data['field_id']."'><img src='".get_image("down")."' alt='".$locale['405']."' title='".$locale['405']."' style='border:0px;' /></a>\n";
			} else {
				echo " <a href='".FUSION_SELF.$aidlink."&amp;action=mu&amp;order=$up&amp;field_id=".$data['field_id']."'><img src='".get_image("up")."' alt='".$locale['406']."' title='".$locale['406']."' style='border:0px;' /></a>\n";
			}
		}
		$i++; $k++;
		echo "</td>\n<td width='1%' class='tbl1' style='white-space:nowrap'>\n";
		echo "<a href='".FUSION_SELF.$aidlink."&amp;enable=".$data['field_name']."'>".$locale['407']."</a> -\n";
		echo "<a href='".FUSION_SELF.$aidlink."&amp;disable=".$data['field_id']."'>".$locale['408']."</a>\n";
		echo "</td>\n</tr>\n";
	}
} else {
	echo "<td align='center' class='tbl1'>".$locale['441']."</td>\n</tr>\n";
}
echo "</table>\n";
closetable();

opentable($locale['430']);
echo "<table cellpadding='0' cellspacing='1' width='80%' class='tbl-border center'>\n<tr>\n";
if (count($available_fields) != count($enabled_fields)) {
	echo "<td width='1%' class='tbl2' style='white-space:nowrap'><strong>".$locale['401']."</strong></td>\n";
	echo "<td class='tbl2' style='white-space:nowrap'><strong>".$locale['402']."</strong></td>\n";
	echo "<td width='1%' class='tbl2' style='white-space:nowrap'><strong>".$locale['404']."</strong></td>\n";
	echo "</tr>\n";
	$i = 0;
	for ($k = 0; $k < count($available_fields); $k++) {
		if (!in_array($available_fields[$k], $enabled_fields)) {
			if (file_exists(LOCALE.LOCALESET."user_fields/".$available_fields[$k].".php")) {
				include LOCALE.LOCALESET."user_fields/".$available_fields[$k].".php";
			}
			include INCLUDES."user_fields/".$available_fields[$k]."_include_var.php";
			echo "<tr>\n";
			echo "<td width='1%' class='tbl1' style='white-space:nowrap'>".$user_field_name."</td>\n";
			echo "<td class='tbl1' style='white-space:nowrap'>".$user_field_desc."</td>\n";
			echo "<td width='1%' class='tbl1' style='white-space:nowrap'><a href='".FUSION_SELF.$aidlink."&amp;enable=".$available_fields[$k]."'>".$locale['431']."</a></td>\n";
			echo "</tr>\n";
			$i++;
		}
	}
} else {
	echo "<td align='center' class='tbl1'>".$locale['440']."</td>\n</tr>\n";
}
echo "</table>\n";
closetable();

require_once THEMES."templates/footer.php";
?>
