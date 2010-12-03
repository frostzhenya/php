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
require_once "../../maincore.php";
require_once THEMES."templates/admin_header.php";
include INFUSIONS."register_quest/infusion_db.php";
if (file_exists(INFUSIONS."register_quest/locale/".$settings['locale'].".php")) {
	include INFUSIONS."register_quest/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."register_quest/locale/English.php";
}
$message = "";
if (!isset($_GET['msg'])){$_GET['msg'] = 0;}
if ($_GET['msg'] == 1){ $message = $locale['rq_add_ok'];}
if ($_GET['msg'] == 2){ $message = $locale['rq_edit_ok'];}
if ($_GET['msg'] == 3){ $message = $locale['rq_del_ok'];}
if ($_GET['msg'] == 4){ $message = $locale['rq_404_ok'];}
opentable($locale['rq_title_table']);
 echo "<span align='center'><strong>$message</strong></span><br />";
if (!isset($_GET['act'])){
	echo "
			<table width='50%' border='1' align='center'>
				<tr>
					<td align='center' width='100%'>".$locale['rq_form_add']."</td>
				</tr>
				<tr>
					<td align='left'><form name='rq_add' action='".FUSION_SELF.$aidlink."' method='post'>
						<strong>".$locale['rq_form_quest']." :</strong><input type='text' name='question' class='textbox'><br />
						<strong>".$locale['rq_form_answer']." :</strong><input type='text' name='answer' class='textbox'><br />
						<input type='submit' name='rq_adding' value='".$locale['rq_form_save']."' class='button'></form>
					</td>
				</tr>
			</table>
			";
}
if (isset($_GET['act']) && isset($_GET['id']) && (isnum($_GET['id'])) && ($_GET['act'] == 'edit')){
	$query = dbquery ("SELECT rq_id, rq_question, rq_answer FROM ".DB_INFUSION_TABLE." WHERE rq_id='".$_GET['id']."'");
	if (dbrows($query) > 0){
	$rq_edit = dbarray ($query);	
		$rq_id = $rq_edit['rq_id'];
		$rq_quest = $rq_edit['rq_question'];
		$rq_answer = $rq_edit['rq_answer'];
	echo "
			<table width='50%' border='1' align='center'>
				<tr>
					<td align='center' width='100%'>".$locale['rq_form_edit']."</td>
				</tr>
				<tr>
					<td align='left'><form name='rq_edit' action='".FUSION_SELF.$aidlink."&amp;act=edit&amp;id=".$rq_id."' method='post'>
						<input type='hidden' value='".$_GET['id']."' name='rq_id'>
						<strong>".$locale['rq_form_quest']." :</strong><input type='text' name='question' class='textbox' value='$rq_quest'><br />
						<strong>".$locale['rq_form_answer']." :</strong><input type='text' name='answer' class='textbox' value='$rq_answer'><br />
						<input type='submit' name='rq_editing' value='".$locale['rq_form_upd']."' class='button'></form>
					</td>
				</tr>
			</table>
			";
	}else{
		redirect (FUSION_SELF.$aidlink."&amp;msg=4");
	}
}
if (isset($_POST['rq_adding'])){
	$quest = stripinput($_POST['question']);
	$answer =  stripinput($_POST['answer']);
	$hash = md5($quest);
	$query = dbquery("INSERT INTO ".DB_INFUSION_TABLE." (rq_id, rq_question, rq_answer, rq_hash) VALUES ('','$quest', '$answer', '$hash' )");
	redirect (FUSION_SELF.$aidlink."&amp;msg=1");
}
if (isset($_POST['rq_editing'])){
	$id = stripinput($_POST['rq_id']);
	$quest = stripinput($_POST['question']);
	$answer =  stripinput($_POST['answer']);
	$hash = md5($quest);
	$query = dbquery("UPDATE ".DB_INFUSION_TABLE." SET rq_question='$quest', rq_answer='$answer', rq_hash='$hash' WHERE rq_id='$id'");
	redirect (FUSION_SELF.$aidlink."&amp;msg=2");
}
if (isset($_GET['act']) && isset($_GET['id']) && (isnum($_GET['id'])) && ($_GET['act'] == 'delete')){
	$rq_id = $_GET['id'];
	$query = dbquery ("SELECT * FROM ".DB_INFUSION_TABLE." WHERE rq_id='".$id."'");
	if (dbrows($query) > 0){
		$del = dbquery("DELETE FROM ".DB_INFUSION_TABLE." WHERE rq_id='".$id."'");
		redirect (FUSION_SELF.$aidlink."&amp;msg=3");
	}else{
		redirect (FUSION_SELF.$aidlink."&amp;msg=4");
	}
}

$query = dbquery("SELECT rq_id, rq_question, rq_answer, rq_hash FROM ".DB_INFUSION_TABLE." ORDER BY rq_id");
if (dbrows($query)){
	echo "<table width='100%'>
			<tr>
				<td  width='5%' align='center'><strong>".$locale['rq_numb']."</strong></td>
				<td width='25%' align='center'><strong>".$locale['rq_quest']."</strong></td>
				<td width='25%' align='center'><strong>".$locale['rq_answer']."</strong></td>
				<td width='25%' align='center'><strong>".$locale['rq_hash']."</strong></td>
				<td width='20%' align='center'><strong>".$locale['rq_opt']."</strong></td>
			</tr>";
	$rq_i = 1;
	while($rq_arr = dbarray($query)){
		
		$rq_id = $rq_arr['rq_id'];
		$rq_quest = $rq_arr['rq_question'];
		$rq_answer = $rq_arr['rq_answer'];
		$rq_hash = $rq_arr['rq_hash'];
		echo "
			<tr>
				<td width='5%' align='center'>$rq_i</td>
				<td width='25%' align='center'>$rq_quest</td>
				<td width='25%' align='center'>$rq_answer</td>
				<td width='25%' align='center'>$rq_hash</td>
				<td width='20%' align='center'><a href='".FUSION_SELF.$aidlink."&amp;act=edit&amp;id=".$rq_id."'>".$locale['rq_edit']."</a> | <a href='".FUSION_SELF.$aidlink."&amp;act=delete&amp;id=".$rq_id."'>".$locale['rq_delete']."</a></td>
			</tr>";		
		$rq_i ++;
	}	
	echo "</table>";		
}






closetable();

require_once THEMES."templates/footer.php";
?>