<?php
/*
Quick config file for helper scripts, so not to tie into CI
*/
date_default_timezone_set("America/New_York");
$db_host = 'localhost';
$db_user = 'tst8';
$db_pass = 'chtps9y9';
$db_name = 'tst8_main';

$_TEMPLATE_PATH = "/home/tst1/domains/lemeno.com/public_html/modules/templates";

$_READER_URL = "http://www.lemeno.com/profile";
$_READER_IMAGE_URL = "http://www.lemeno.com/media/assets";

define("CHAT_MAX_PENDING", 120); // in seconds, pending mode only lock for 5 mins
define("CHAT_MAX_WAIT", 45); // in seconds
define("MANUAL_QUIT_DISABLE_PERIOD", 600); // 10 minutes
define("MANUAL_QUIT_DISABLE_MAX_TIME", 3); // 3 times. 
define("END_SESSION_BREAK_TIME", 120); 
define("MANUAL_BREAK_TIME", 600);
define("ABORT_TIME_DIFF", 120); // in seconds.  The period that if 2 abort occurs, and trigger abort logic & take reader offline.
?>