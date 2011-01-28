<?php
/*
Russian Language Fileset
Produced by Nick Jones (Digitanium)
Email: digitanium@php-fusion.co.uk
Web: http://www.php-fusion.co.uk
-----------------------------------------
������� � ��������� - ������� ��������� �������������
Email: ck@netck.ru
Web: http://netck.ru
*/

// Locale Settings
setlocale(LC_TIME, 'ru_RU.CP1251'); // Linux Server (Windows may differ)
$locale['charset'] = "windows-1251";
$locale['xml_lang'] = "ru";
$locale['tinymce'] = "ru";
$locale['phpmailer'] = "ru";

// Full & Short Months
$locale['months'] = "&nbsp;|������|�������|����|������|���|����|����|������|��������|�������|������|�������";
$locale['shortmonths'] = "&nbsp|���|���|���|���|���|����|����|���|���|���|���|���";

// Standard User Levels
$locale['user0'] = "�����";
$locale['user1'] = "������������";
$locale['user2'] = "�������������";
$locale['user3'] = "����� �������������";
$locale['user_na'] = "�� ��������";
$locale['user_anonymous'] = "��������� ������������";
// Forum Moderator Level(s)
$locale['userf1'] = "���������";
// Navigation
$locale['global_001'] = "���������";
$locale['global_002'] = "��� ������\n";
// Users Online
$locale['global_010'] = "������ �� �����";
$locale['global_011'] = "������";
$locale['global_012'] = "�������������";
$locale['global_013'] = "��� �������������";
$locale['global_014'] = "����� �������������";
$locale['global_015'] = "���������� �������������";
$locale['global_016'] = "����� ������������";
// Forum Side panel
$locale['global_020'] = "���� ������";
$locale['global_021'] = "����� ����";
$locale['global_022'] = "����������� ����";
$locale['global_023'] = "��� ���";
// Articles Side panel
$locale['global_030'] = "��������� ������";
$locale['global_031'] = "��� ������";
// Welcome panel
$locale['global_035'] = "����� ����������";
// Latest Active Forum Threads panel
$locale['global_040'] = "��������� �������� ���� ������";
$locale['global_041'] = "��� ����";
$locale['global_042'] = "��� ���������";
$locale['global_043'] = "����� ���������";
$locale['global_044'] = "����";
$locale['global_045'] = "����������";
$locale['global_046'] = "�������";
$locale['global_047'] = "��������� ���������";
$locale['global_048'] = "�����";
$locale['global_049'] = "���������";
$locale['global_050'] = "�����";
$locale['global_051'] = "�����";
$locale['global_052'] = "����������";
$locale['global_053'] = "� ��� ��� ��� �� �������.";
$locale['global_054'] = "� ��� ���� ��� ��������� �� ������.";
$locale['global_055'] = "���� %u �����(���) ���������(���) � ������� ������ ���������� ���������.";
$locale['global_056'] = "��� �������� �� ����";
$locale['global_057'] = "���������";
$locale['global_058'] = "������";
$locale['global_059'] = "�� �� ��������� �� �� ���� ����.";
$locale['global_060'] = "�������� �������� ��� ���� ����?";
// News & Articles
$locale['global_070'] = "����������� ";
$locale['global_071'] = " ";
$locale['global_072'] = "������ ���������";
$locale['global_073'] = " ������������";
$locale['global_073b'] = " �����������";
$locale['global_074'] = " ���������";
$locale['global_075'] = "������";
$locale['global_076'] = "�������������";
$locale['global_077'] = "�������";
$locale['global_078'] = "��� ��������";
$locale['global_079'] = "� ";
$locale['global_080'] = "��� ���������";
// Page Navigation
$locale['global_090'] = "����������";
$locale['global_091'] = "���������";
$locale['global_092'] = "�������� ";
$locale['global_093'] = " �� ";
// Guest User Menu
$locale['global_100'] = "�����������";
$locale['global_101'] = "�����";
$locale['global_102'] = "������";
$locale['global_103'] = "��������� ����";
$locale['global_104'] = "�����";
$locale['global_105'] = "�� �� ����������������?<br /><a href='".BASEDIR."register.php' class='side'>������� �����</a> ��� �����������.";
$locale['global_106'] = "������ ������? <br />��������� ����� <a href='".BASEDIR."lostpassword.php' class='side'>�����</a>.";
$locale['global_107'] = "�����������";
$locale['global_108'] = "�������������� ������";
// Member User Menu
$locale['global_120'] = "������������� �������";
$locale['global_121'] = "��������� ���������";
$locale['global_122'] = "������ �������������";
$locale['global_123'] = "������ ��������������";
$locale['global_124'] = "�����";
$locale['global_125'] = "� ��� %u ����� ";
$locale['global_126'] = "���������";
$locale['global_127'] = "���������";
// Poll
$locale['global_130'] = "�����������";
$locale['global_131'] = "����������";
$locale['global_132'] = "�� ������ ����������������, ����� ����������.";
$locale['global_133'] = "�����";
$locale['global_134'] = "�������";
$locale['global_135'] = "�������: ";
$locale['global_136'] = "�����: ";
$locale['global_137'] = "��������: ";
$locale['global_138'] = "����� �������";
$locale['global_139'] = "�������� ����� �� ������:";
$locale['global_140'] = "��������";
$locale['global_141'] = "�������� ������";
$locale['global_142'] = "������ �� �������.";
// Shoutbox
$locale['global_150'] = "����-���";
$locale['global_151'] = "���:";
$locale['global_152'] = "���������:";
$locale['global_153'] = "�������";
$locale['global_154'] = "�� ������ ����������������, ����� �������� ���������.";
$locale['global_155'] = "����� ����";
$locale['global_156'] = "��� ���������.";
$locale['global_157'] = "�������";
$locale['global_158'] = "����������� ���:";
$locale['global_159'] = "������� ����������� ���:";
// Footer Counter
$locale['global_170'] = "���������� ����������";
$locale['global_171'] = "���������� �����������";
$locale['global_172'] = "����� ��������: %s ������";
$locale['global_173'] = "��������";
// Admin Navigation
$locale['global_180'] = "������ ��������������";
$locale['global_181'] = "��������� �� ����";
$locale['global_182'] = "<strong>����������:</strong> ������ �������������� ������ �����������";
// Miscellaneous
$locale['global_190'] = "������� ����� ������������";
$locale['global_191'] = "��� IP ����� ������������.";
$locale['global_192'] = "�� ����� ���: ";
$locale['global_193'] = "�� ����� ���: ";
$locale['global_194'] = "���� ������� � ��������� ����� �������������.";
$locale['global_195'] = "���� ������� ��� �� �������������.";
$locale['global_196'] = "������������ ��� ��� ������.";
$locale['global_197'] = "����������, ���������, ������ �� ������ ����������...<br /><br />
[ <a href='index.php'>��� ������� ����, ���� �� ������ �����</a> ]";
$locale['global_198'] = "<strong>��������:</strong> ��������� ���� setup.php, ����������, ������� ��� ����������!";
$locale['global_199'] = "<strong>��������:</strong> �� ������ ������ ��������������, ������� <a href='".BASEDIR."edit_profile.php'>������������� �������</a> � ������� ���.";
//Titles
$locale['global_200'] = " - ";
$locale['global_201'] = ": ";
$locale['global_202'] = $locale['global_200']."�����";
$locale['global_203'] = $locale['global_200']."FAQ";
$locale['global_204'] = $locale['global_200']."�����";
//Themes
$locale['global_210'] = "������� � ����������";
// No themes found
$locale['global_300'] = "���� ����� �� �������";
$locale['global_301'] = "��������, ���������� ���������� ��������. ��-�� ��������� �������������, �� ����� ���� ������� �� ���� ���� �����. ���� �� ������������� �����, ����������� �������� FTP ��� �������� �����, ������� ���������� � <em>PHP-Fusion v7</em> � ������� <em>themes/</em>. ����� �������� ����, ��������� � ������� <em>������� ���������</em>, ��� �������� ����������� ���� � ���������� <em>themes/</em>. ������ � ����, ��� ����������� ����, ������ ������ ���� �������� (������� ������� ��������; ����� ��� Unix-��������), ��� � ��������� ���� � ������� <em>������� ���������</em>.<br /><br />���� �� ������������, ����������, ��������� � ��������������� ����� ����� e-mail: ".hide_email($settings['siteemail'])." � �������� � ���� ��������.";
$locale['global_302'] = "��������� ���� � ������� ������� ���������, �� ���������� ��� ����������!";
// JavaScript Not Enabled
$locale['global_303'] = "�, ���! ��� <strong>JavaScript</strong>?<br />
 � ����� �������� �� ������� ��� �� �� ������������ JavaScript. ����������, <strong>�������� JavaScript</strong> � ����� �������� ��� ����������� ��������� ����� �����,<br />
 ��� <strong>���������</strong> �� ��� �������, ������� ������������ JavaScript; <a href='http://firefox.com' rel='nofollow' title='Mozilla Firefox'>Firefox</a>, <a href='http://apple.com/safari/' rel='nofollow' title='Safari'>Safari</a>, <a href='http://opera.com' rel='nofollow' title='Opera Web Browser'>Opera</a>, <a href='http://www.google.com/chrome' rel='nofollow' title='Google Chrome'>Chrome</a> ��� ������ <a href='http://www.microsoft.com/windows/internet-explorer/' rel='nofollow' title='Internet Explorer'>Internet Explorer</a> �� ���� ������ 6.";
// User Management
// Member status
$locale['global_400'] = "��������������";
$locale['global_401'] = "��������";
$locale['global_402'] = "���������";
$locale['global_403'] = "������� ������";
$locale['global_404'] = "��������� �������";
$locale['global_405'] = "��������� ������������";
$locale['global_406'] = "��� ������� ������ ���� ��������� �� ��������� ��������:";
$locale['global_407'] = "��� ������� ������ ���� �������������� ";
$locale['global_408'] = " �� ��������� �������:";
$locale['global_409'] = "��� ������� ������ ���� ������������� �� ������������ ������������.";
$locale['global_410'] = "������� � ���������: ";
$locale['global_411'] = "��� ������� ������ ���� ��������� ��-�� ������������";
$locale['global_412'] = "��� ������� ������ ���� ���������� � ���������, ��� ��� ���������.";
// Banning due to flooding
$locale['global_440'] = "�������������� ��� ��� ������������";
$locale['global_441'] = "��� ������� ".$settings['sitename']."�������";
$locale['global_442'] = "Hello [USER_NAME],\n
��� ������� ".$settings['sitename']." ������� � ������� �������� ���������� �������� �� �������� ����� � ������ IP ".USER_IP.", � ������� �� �������. ��� ������ �� ���� �����.\n
����������, ��������� � ��������������� ����� ".$settings['siteemail']." ��� �������������� ������� ������ � ������ ����.\n
".$settings['siteusername'];
// Lifting of suspension
$locale['global_450'] = "�������������� ������ ��������";
$locale['global_451'] = "������ �������� ".$settings['sitename'];
$locale['global_452'] = "������ USER_NAME,\n
��������������� ����� ������� ������ ".$settings['siteurl']." ��������. ��������� � ����� ������� ������:\n
���: USER_NAME
������: ����� � ����� ������������
���� �� ������ ���� ������, �� ������ ������������ ��� ������� �� ������:\n";
$locale['global_453'] = "������ USER_NAME,\n
��������������� ������ �������� ".$settings['siteurl']." ��������.\n\n
�����������,\n
".$settings['siteusername'];
$locale['global_454'] = "���� ����������� ".$settings['sitename'];
$locale['global_455'] = "������ USER_NAME,\n
� ��������� ���� ��������� ��� ������� ������������� ".$settings['siteurl']." � ������� ������ ��� �� �������� ��� ����������.\n\n
�����������,\n
".$settings['siteusername'];

// Function parsebytesize()
$locale['global_460'] = "�����";
$locale['global_461'] = "������";
$locale['global_462'] = "kB";
$locale['global_463'] = "MB";
$locale['global_464'] = "GB";
$locale['global_465'] = "TB";

//Safe Redirect
$locale['global_500'] = "�� ������ �������������� %s, ����������, �����. ���� �� �� ��������������, ������� �����.";
?>
