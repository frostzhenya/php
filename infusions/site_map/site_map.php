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
| Modified site_map
| for php-fusion v.7.0.x
| site_map - ver. 2.1
| Powered by modEx  © 2008
+--------------------------------------------------------+*/

require_once "../../maincore.php";
require_once THEMES."templates/header.php";

if (file_exists(INFUSIONS."site_map/locale/".$settings['locale'].".php")) {

	include INFUSIONS."site_map/locale/".$settings['locale'].".php";
} else {
	include INFUSIONS."site_map/locale/English.php";
}


{
	opentable($locale['SM100'].": ".$settings['sitename']);
}
//news
$result = dbquery("SELECT * FROM ".DB_NEWS." ORDER BY news_datestamp DESC");
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM120']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."news.php?readmore=".$data['news_id']."'>".$data['news_subject']."</a> - <span class='small'>".showdate("longdate", $data['news_datestamp'])."</span><br  />";
	}
	echo "</p>";
}
//articles cats
$result = dbquery("SELECT * FROM ".DB_ARTICLE_CATS." ORDER BY article_cat_name ASC");
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM121']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		$articles_count = dbcount("(*)",DB_ARTICLES,"article_cat=".$data['article_cat_id']);
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."articles.php?cat_id=".$data['article_cat_id']."'>".$data['article_cat_name']."</a> - <span class='small'>[".$articles_count." ".$locale['SM148']."]</span><br  />";
	}
	echo "</p>";
}
//articles
{
	$result = dbquery("
	SELECT * FROM ".DB_ARTICLES."
	INNER JOIN ".DB_ARTICLE_CATS." ON article_cat_id = article_cat
	ORDER BY article_name ASC");
}
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM122']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."articles.php?article_id=".$data['article_id']."'>".$data['article_subject']."</a> - <span class='small'>".showdate("longdate", $data['article_datestamp'])."</span><br  />";
	}
	echo "</p>";
}
//custom pages
$result = dbquery("SELECT * FROM ".DB_CUSTOM_PAGES." ORDER BY page_title ASC");
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM123']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."viewpage.php?page_id=".$data['page_id']."'>".$data['page_title']."</a><br  />";
	}
	echo "</p>";
}
//faq cats
if (!defined("LANGUAGE")) {
	$result = dbquery("SELECT * FROM ".DB_FAQ_CATS." ORDER BY faq_cat_name ASC");
}
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM124']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
      if (!defined("LANGUAGE")) {
      	$faqcats_count=dbcount("(*)",DB_FAQS,"faq_cat_id=".$data['faq_cat_id']);
      } else {
	      $res = dbarray(dbquery("
	      SELECT Count(*) AS num FROM ".DB_FAQS." ff
	      INNER JOIN ".DB_FAQ_CATS." fc ON fc.faq_cat_id = ff.faq_cat_id
	      WHERE ff.faq_cat_id='".$data['faq_cat_id']."'
	      "));
	      $faqcats_count = $res['num'];
	   }
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."faq.php?cat_id=".$data['faq_cat_id']."'>".$data['faq_cat_name']."</a> - <span class='small'>[".$faqcats_count."]</span><br  />";
	}
	echo "</p>";
}
//faqs
if (!defined("LANGUAGE")) {
   $result = dbquery("SELECT * FROM ".DB_FAQS);
} else {
   $result = dbquery("
   SELECT * FROM ".DB_FAQS." ff
   INNER JOIN ".DB_FAQ_CATS." fc ON fc.faq_cat_id = ff.faq_cat_id
   ");
}
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM125']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."faq.php?cat_id=".$data['faq_cat_id']."'>".$data['faq_question']."</a><br  />";
	}
	echo "</p>";
}
//downloads categories
$result = dbquery("SELECT * FROM ".DB_DOWNLOAD_CATS." ORDER BY download_cat_name ASC");
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM126']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		$downloads_count = dbcount("(*)",DB_DOWNLOADS,"download_cat=".$data['download_cat_id']);
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."downloads.php?cat_id=".$data['download_cat_id']."'>".$data['download_cat_name']."</a> - <span class='small'>[".$downloads_count." ".$locale['SM145']."]</span><br  />";
	}
	echo "</p>";
}
//downloads files
if (!defined("LANGUAGE")) {
	$result = dbquery("SELECT * FROM ".DB_DOWNLOADS." ORDER BY download_title ASC");
} else {
	$result = dbquery("
	SELECT * FROM ".DB_DOWNLOADS."
	INNER JOIN ".DB_DOWNLOAD_CATS." ON download_cat_id = download_cat
	ORDER BY download_title ASC
	");
}
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM127']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."downloads.php?cat_id=".$data['download_cat']."&download_id=".$data['download_id']."'>".$data['download_title']."</a> - <span class='small'>[".$locale['SM140'].": ".$data['download_count']." ".$locale['SM146']."]</span><br  />";
	}
	echo "</p>";
}
//weblinks cats
$result = dbquery("SELECT * FROM ".DB_WEBLINK_CATS." ORDER BY weblink_cat_name ASC");

$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM128']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		$weblinks_count = dbcount("(*)",DB_WEBLINKS,"weblink_cat=".$data['weblink_cat_id']);
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."weblinks.php?cat_id=".$data['weblink_cat_id']."'>".$data['weblink_cat_name']."</a> - <span class='small'>[".$weblinks_count." ".$locale['SM147']."]</span><br  />";
	}
	echo "</p>";
}
//weblinks
if (!defined("LANGUAGE")) {
	$result = dbquery("SELECT * FROM ".DB_WEBLINKS." ORDER BY weblink_name ASC");
} else {
	$result = dbquery("
	SELECT * FROM ".DB_WEBLINKS."
	INNER JOIN ".DB_WEBLINK_CATS." ON weblink_cat_id=weblink_cat
	ORDER BY weblink_name ASC
	");
}
$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM129']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."weblinks.php?cat_id=".$data['weblink_cat']."&weblink_id=".$data['weblink_id']."'>".$data['weblink_name']."</a> - <span class='small'>[".$locale['SM141'].": ".$data['weblink_count']."]</span><br  />";
	}
	echo "</p>";
}
//forums cats
$result = dbquery("SELECT * FROM ".DB_FORUMS." WHERE forum_cat=0 ORDER BY forum_order ASC");

$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM130']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		$forums_count = dbcount("(*)",DB_FORUMS, "forum_cat='".$data['forum_id']."'");
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."forum/viewforum.php?forum_id=".$data['forum_id']."'>".$data['forum_name']."</a> - <span class='small'>[".$locale['SM142'].": ".$forums_count."]</span><br  />";
	}
	echo "</p>";
}
//forums
$result = dbquery("SELECT * FROM ".DB_FORUMS." WHERE forum_cat!=0 ORDER BY forum_order ASC");

$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM131']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		$threads_count = dbcount("(*)",DB_THREADS, "forum_id='".$data['forum_id']."'");
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> <a href='".BASEDIR."forum/viewforum.php?forum_id=".$data['forum_id']."'>".$data['forum_name']."</a> - <span class='small'>[".$locale['SM143'].": ".$threads_count."]</span><br  />";
	}
	echo "</p>";
}
//polls
$result = dbquery("SELECT * FROM ".DB_POLLS." ORDER BY poll_started DESC");

$rows = dbrows($result);
if ($rows!=0) {
   echo "<b>".$locale['SM132']."</b>";
	echo "<p style='margin-left:20px'>";
	while ($data = dbarray($result)) {
		$polls_count = dbcount("(*)",DB_POLL_VOTES,"poll_id=".$data['poll_id']);
		echo "<img src='".THEME."images/bullet.gif' alt='bullet' /> ".$data['poll_title']." - <span class='small'>[".$locale['SM144'].": ".$polls_count."]</span><br  />";
	}
	echo "</p>";
}
closetable();

require_once THEMES."templates/footer.php";
?>