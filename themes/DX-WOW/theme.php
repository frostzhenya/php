<?php
if (!defined("IN_FUSION")) { die("Access Denied"); }

// theme settings
define("THEME_BULLET", "<span class='bullet'>&middot;</span>");
require_once INCLUDES."theme_functions_include.php";

function render_page($license=false) {

global $theme_width,$locale,$settings;

echo "
<center>
  <table border='0' cellspacing='0' cellpadding='0' id='main'>
    <tr>
      <td>
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td height='269' align='center' valign='bottom' class='headerbg'>
               <div align='right'>".showsubdate()."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
               <table border='0' cellspacing='0' cellpadding='0' class='tablebreak'>
                 <tr>\n";

$result = dbquery("SELECT * FROM ".DB_PREFIX."site_links WHERE link_visibility<='".iUSER."' AND link_position>='2' ORDER BY link_order");
if (dbrows($result) != 0) {
        $i = 1;
        while($data = dbarray($result)) {
                if ($data['link_url']!="---") {
                        $link_target = ($data['link_window'] == "1" ? " target='_blank'" : "");
                        if (strstr($data['link_url'], "http://") || strstr($data['link_url'], "https://")) {
                                echo "<td width='100' height='32' align='center' class='buttonbg'><a href='".$data['link_url']."'".$link_target."><b>".$data['link_name']."</b></a></td>";
                        } else {
                                echo "<td width='100' height='32' align='center' class='buttonbg'><a href='".BASEDIR.$data['link_url']."'".$link_target."><b>".$data['link_name']."</b></a></td>";
                        }
                }
                if ($i != dbrows($result)) { echo "<td  width='17' height='32' align='center' class='buttonbbg'></td>"; } else { echo "\n"; } $i++;
        }
}
echo "
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>\n";
              if (LEFT) { echo "<td class='side-border-left' valign='top' align='left'>".LEFT."</td>"; }
              echo "<td valign='top'>".U_CENTER.CONTENT.L_CENTER."</td>\n";
			  if (RIGHT) { echo "<td class='side-border-right' valign='top' align='left'>".RIGHT."</td>"; }
echo "
            </tr>
          </table>
          <table width='100%'  border='0' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='16'><img src='".THEME."panels/leftborder.gif' alt='' border ='0' /></td>
              <td align='center'>".stripslashes($settings['footer'])."</td>
              <td width='16'><img src='".THEME."panels/rightborder.gif' alt='' border ='0' /></td>
            </tr>
          </table>
          <table width='100%'  border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td align='center' valign='top' width='1000' height='150' class='footerbg'>\n";
			  echo "<br /><br /><br />DX-WOW theme originally by <a href='mailto:bfs2home@hot.ee'>DX-Portal</a>. Converted to PHP-Fusion v7 by <a href='http://php-fusion.boldt.me' target='_blank'>Kenneth</a>.<br />";
              if ($license == false) { echo showcopyright()."<br />"; }
              echo showcounter()."
    		</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</center>\n";

}

function render_news($subject, $news, $info) {

global $locale;

echo "<table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
              <td><table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                   <td width='57' height='47'><img src='".THEME."panels/ctl.gif' alt='' border ='0' /></td>
                  <td class='ctm'>&nbsp;</td>
                  <td width='116' height='47'><img src='".THEME."panels/ctr.gif' alt='' border ='0' /></td>
                </tr>
              </table>
                <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width='15' class='cborderl'>&nbsp;</td>
                      <td bgcolor=\"#212723\">
                    <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                      <tr>
                        <td align=\"center\" class='center-caption'>$subject</td>
                      </tr>
                      <tr>
                        <td class='main-body' align='left'><hr>$news</td>
                       <tr>
                         <td align='center'>".newsposter($info, THEME_BULLET).newsopts($info, THEME_BULLET).itemoptions("N",$info['news_id'])."</td>
                       </tr>
                      </tr>
                    </table>
                    </td>
                    <td width='35' class='cborderr'>&nbsp;</td>
                  </tr>
                </table>
                <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width='57' height='97'><img src='".THEME."panels/cbl.gif' alt='' border ='0' /></td>
                    <td height='97' class='cbm'>&nbsp;</td>
                    <td width='116' height='97'><img src='".THEME."panels/cbr.gif' alt='' border ='0' /></td>
                  </tr>
                </table>
                </td>
            </tr>
          </table><br />\n";
}

function render_article($subject, $article, $info) {

global $locale;

echo "<table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
              <td><table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                  <td width='57' height='47'><img src='".THEME."panels/ctl.gif' alt='' border ='0' /></td>
                  <td class='ctm'>&nbsp;</td>
                  <td width='116' height='47'><img src='".THEME."panels/ctr.gif' alt='' border ='0' /></td>
                </tr>
              </table>
                <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width='15' class='cborderl'>&nbsp;</td>
                    <td bgcolor=\"#212723\">
                    <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                      <tr>
                        <td align=\"center\" class='center-caption'>$subject</td>
                      </tr>
					  <tr>
				        <td class='main-body' align='left'>".($info['article_breaks'] == "y" ? nl2br($article) : $article)."</td>
					  </tr>
                      <tr>
                        <td align='center'>".articleposter($info, THEME_BULLET).articleopts($info, THEME_BULLET).itemoptions("A",$info['article_id'])."</td>
                      </tr>
                    </table></td>
                    <td width='35' class='cborderr'>&nbsp;</td>
                  </tr>
                </table>
                <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width='57' height='97'><img src='".THEME."panels/cbl.gif' alt='' border ='0' /></td>
                    <td height='97' class='cbm'>&nbsp;</td>
                    <td width='116' height='97'><img src='".THEME."panels/cbr.gif' alt='' border ='0' /></td>
                  </tr>
                </table>
                </td>
            </tr>
          </table><br />\n";
}

function opentable($title) {

echo "<table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
              <td><table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                  <td width='57' height='47'><img src='".THEME."panels/ctl.gif' alt='' border ='0' /></td>
                  <td class='ctm'>&nbsp;</td>
                  <td width='116' height='47'><img src='".THEME."panels/ctr.gif' alt='' border ='0' /></td>
                </tr>
              </table>
                <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width='15' class='cborderl'>&nbsp;</td>
                    <td bgcolor=\"#212723\">
                    <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                      <tr>
                        <td align=\"center\" class='center-caption'>$title</td>
                      </tr>
                      <tr>
                        <td class='main-body'>\n";
}

function closetable() {

echo "</td>
                      </tr>
                    </table></td>
                    <td width='35' class='cborderr'>&nbsp;</td>
                  </tr>
                </table>
                <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width='57' height='97'><img src='".THEME."panels/cbl.gif' alt='' border ='0' /></td>
                    <td height='97' class='cbm'>&nbsp;</td>
                    <td width='116' height='97'><img src='".THEME."panels/cbr.gif' alt='' border ='0' /></td>
                  </tr>
                </table>
                </td>
            </tr>
          </table><br />\n";
}

function opentablex($title,$open="on") {

        $boxname = str_replace(" ", "", $title);
        $box_img = $open == "on" ? "off" : "on";

echo "<table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
              <td><table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                  <td width='57' height='47'><img src='".THEME."panels/ctl.gif' alt='' border ='0' /></td>
                  <td class='ctm'>&nbsp;</td>
                  <td width='116' height='47'><img src='".THEME."panels/ctr.gif' alt='' border ='0' /></td>
                </tr>
              </table>
                <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width=\"15\" background=\"".THEME."panels/cborderl.gif\">&nbsp;</td>
                    <td bgcolor=\"#212723\">
                    <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                      <tr>
                        <td align=\"center\" class='center-caption'>$title</td>
                        <td align='right' width='17' class='panel-main'><img src='".THEME."images/panel_$box_img.gif' name='b_$boxname' alt='' onclick=\"javascript:flipBox('$boxname')\"></td>
                      </tr>
                      <tr>
                        <td class='main-body'>
                        <div id='box_$boxname'".($open=="off" ? "style='display:none'" : "").">\n";
}

function closetablex() {

echo "</div></td>
                      </tr>
                    </table></td>
                    <td width=\"35\" background=\"".THEME."panels/cborderr.gif\">&nbsp;</td>
                  </tr>
                </table>
                <table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                  <tr>
                    <td width='57' height='97'><img src='".THEME."panels/cbl.gif' alt='' border ='0' /></td>
                    <td height='97' class='cbm'>&nbsp;</td>
                    <td width='116' height='97'><img src='".THEME."panels/cbr.gif' alt='' border ='0' /></td>
                  </tr>
                </table>
                </td>
            </tr>
          </table><br />\n";
}


function openside($title, $collapse = false, $state = "on") {

global $panel_collapse; $panel_collapse = $collapse;
$boxname = str_replace(" ", "", $title);

echo "<table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
              <td><table width=\"100%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                  <td height=\"47\" align=\"right\" valign=\"bottom\" class='paneltbg'>
                  <table width=\"73%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                      <tr>
                        <td class='side-caption' align='left'>$title</td>
						  ".($collapse ? "<td class='panel-main' align='center'>".panelbutton($state, $boxname)."</td>" : "")."
                      </tr>
                      <tr>
                        <td height=\"20\"></td>
                      </tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td class='panelmbg'>
                  <table  border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                      <tr>
                        <td width=\"36\">&nbsp;</td>
                        <td width=\"142\" class='side-body'>";
                          if ($collapse == true) { echo panelstate($state, $boxname); }
}

function closeside() {

global $panel_collapse;

if ($panel_collapse == true) { echo "</div>\n"; }
echo "</td>
               </tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td><img src='".THEME."panels/pb.gif' alt='' border ='0' /></td>
                </tr>
              </table>
              </td>
            </tr>
          </table><br />\n";
}

?>