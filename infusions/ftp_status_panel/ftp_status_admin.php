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
| Modified ftp_status_panel
| for php-fusion v.7.0.x
| ftp_status_panel - ver. 2.0
| Powered by modEx  © 2008
+--------------------------------------------------------+*/

require_once "../../maincore.php";
require_once THEMES."templates/admin_header.php";


if (file_exists(INFUSIONS."ftp_status_panel/locale/".$settings['locale'].".php")) {
	include INFUSIONS."ftp_status_panel/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."ftp_status_panel/locale/English.php";
}


if (!isset($action)) $action = "";

if ($action == "delete")
{
  $result = dbquery("DELETE FROM ".$db_prefix."ftp_status WHERE ftp_id='$ftp_id'");
  redirect(FUSION_SELF);
}
else
{
if (isset($_POST['save'])) {
                $ftp_ip      = stripinput($_POST['ftp_ip']);
                $ftp_port    = stripinput($_POST['ftp_port']);
                $ftp_timeout = stripinput($_POST['ftp_timeout']);
                if ($action == "edit") {
                  $result = dbquery("UPDATE ".$db_prefix."ftp_status SET ftp_ip='$ftp_ip', ftp_port='$ftp_port',ftp_timeout='$ftp_timeout' WHERE ftp_id='$ftp_id'");
                  redirect(FUSION_SELF);
                } else {
                  $result = dbquery("INSERT INTO ".$db_prefix."ftp_status VALUES('', '$ftp_ip', '$ftp_port', '$ftp_timeout')");
                  redirect(FUSION_SELF);
                }
        }
if ($action == "edit") {
        $result = dbquery("SELECT * FROM ".$db_prefix."ftp_status WHERE ftp_id='$ftp_id'");
        $data = dbarray($result);
        $ftp_ip       = $data['ftp_ip'];
        $ftp_port     = $data['ftp_port'];
        $ftp_timeout  = $data['ftp_timeout'];
        $button       = $locale['fsp05'];
        $act          = FUSION_SELF."?action=edit&ftp_id=".$data['ftp_id'];
} else {
        $ftp_ip         ="";
        $ftp_port       = "21";
        $ftp_timeout    = "3";
        $button         =$locale['fsp06'];
        $act            = FUSION_SELF;
}
opentable($locale['fsp01']);
echo "<form name='ftpedit' method='post' action='$act' onSubmit='return ValidateForm(this);'>
<table align='center' cellspacing='0' cellpadding='0'>
  <tr>
    <td class='tbl' align='right'>".$locale['fsp02'].":</td>
    <td class='tbl'><input type='text' name='ftp_ip' value='$ftp_ip' maxlength='15' class='textbox' style='width:150px;'></td>
  </tr>
  <tr>
    <td class='tbl' align='right'>".$locale['fsp03'].":</td>
    <td class='tbl'><input type='text' name='ftp_port' value='$ftp_port' maxlength='4' class='textbox' style='width:40px;'></td>
  </tr>
  <tr>
    <td class='tbl' align='right'>".$locale['fsp04'].":</td>
    <td class='tbl'><input type='text' name='ftp_timeout' value='$ftp_timeout' maxlength='3' class='textbox' style='width:40px;'></td>
  </tr>
  <tr>
    <td align='center' colspan='2' class='tbl'>
      <input type='submit' name='save' value='$button' class='button'></td>
  </tr>
</table>
</form>\n";

closetable();
tablebreak();
opentable($locale['fsp07']);
echo "<table align='center' width='100%' cellspacing='1' cellpadding='0' class='tbl-border'>
  <tr>
  <td align='center' class='tbl2'>".$locale['fsp02']."</td>
  <td width='80' align='center' class='tbl2'>".$locale['fsp03']."</td>
  <td align='center' class='tbl2'>".$locale['fsp04']."</td>
   <td align='center' class='tbl2'>".$locale['fsp14']."</td>
  </tr>\n";
        $result = dbquery("SELECT * FROM ".$db_prefix."ftp_status ORDER BY ftp_id");
        $rows=dbrows($result);
        if ($rows != 0) {
          while($data = dbarray($result)) {
                    echo "<tr>
                    <td align='center' class='tbl1'><a href='ftp://".$data['ftp_ip']."/'>".$data['ftp_ip']."</a></td>
                    <td align='center' class='tbl1'>".$data['ftp_port']."</td>
                    <td align='center' class='tbl1'>".$data['ftp_timeout']."</td>
                    <td align='center' class='tbl1'>
                    <a href='".FUSION_SELF."?action=edit&ftp_id=".$data['ftp_id']."'>".$locale['fsp12']."</a> -
                    <a href='".FUSION_SELF."?action=delete&ftp_id=".$data['ftp_id']."'>".$locale['fsp13']."</a>
                    </td>
                    </tr>\n";
                }
        } else {
        echo "<tr><td colspan='10' class='tbl1' align='center'>".$locale['fsp08']."</td>\n</tr>\n";
        }
        echo "</table>\n";
        closetable();

echo "<script type='text/javascript'>
function ValidateForm(ftpedit) {
        if(ftpedit.ftp_ip.value=='') {
                alert('".$locale['fsp09']."');
                return false;
        }
        if(ftpedit.ftp_port.value=='') {
                alert('".$locale['fsp10']."');
                return false;
        }
        if(ftpedit.ftp_timeout.value=='') {
                alert('".$locale['fsp11']."');
                return false;
        }
}
</script>\n";
}
require_once THEMES."templates/footer.php";
?>