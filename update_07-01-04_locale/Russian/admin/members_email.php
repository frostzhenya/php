<?php
$locale['email_create_subject'] = "��� ������� ������ ";
$locale['email_create_message'] = "������ [USER_NAME],\n
��� ������� ".$settings['sitename']." ������.\n
��� ����� �� ���� �� ������ ������������ ��������� ���������:\n
�����: [USER_NAME]\n
������: [PASSWORD]\n\n
Regards,\n
".$settings['siteusername'];

$locale['email_activate_subject'] = "������� �����������";
$locale['email_activate_message'] = "����������� [USER_NAME],\n
��� ������� ".$settings['sitename']." �����������.\n
�� ������ ������������, ��������� ��� ����� � ������:\n
� ���������,\n
".$settings['siteusername'];

$locale['email_deactivate_subject'] = "�������. ��������� ���������  ".$settings['sitename'];
$locale['email_deactivate_message'] = "������ [USER_NAME],\n
������� ".$settings['deactivation_period']." ����(����) � ������� ���������� ����� ".$settings['sitename'].". ��� ������� ��� ������� ��� ����������, �� ��� ������ ������� ������ � ���������� �������� ����������.\n
����� ������������ ������� ������ ������ ������� �� ��������� ������:\n
".$settings['siteurl']."reactivate.php?user_id=[USER_ID]&code=[CODE]\n
� ���������,\n\n
".$settings['siteusername'];

$locale['email_ban_subject'] = "��� ������� ".$settings['sitename']."�������";
$locale['email_ban_message'] = "Hello [USER_NAME],\n
��� ������� ".$settings['sitename']." ��� �������� ".$userdata['user_name']." ��-�� ��������� ������:\n
[REASON].\n
���� �� ������ �������� ������ ���������� �� ���� �������, ����������, ����������� � �������������� ����� ".$settings['siteemail'].".\n
".$settings['siteusername'];

$locale['email_secban_subject'] = "��� ������� ".$settings['sitename']."��� ��������";
$locale['email_secban_message'] = "Hello [USER_NAME],\n
��� ������� ".$settings['sitename']." ��� �������� ".$userdata['user_name']." ��-�� �����-���� ����� ��������, ������� ������������ ������ ������������ ��� ������ �����.\n
���� �� ������ �������� ������ �������� �� ���� �������, ����������, ����������� � �������������� ����� ".$settings['siteemail'].".\n
".$settings['siteusername'];

$locale['email_suspend_subject'] = "��� ������� ".$settings['sitename']."��� �������������";
$locale['email_suspend_message'] = "Hello [USER_NAME],\n
��� ������� ".$settings['sitename']." ��� ������������� ".$userdata['user_name']." �� [DATE] ��-�� ��������� ������:\n
[REASON].\n
���� �� ������ �������� ������ ���������� �� ���� ��������, ����������, ����������� � �������������� ����� ".$settings['siteemail'].".\n
".$settings['siteusername'];
?>