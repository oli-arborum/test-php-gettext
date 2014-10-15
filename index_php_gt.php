<?php
  require_once('php-gettext/gettext.inc');
  $lang = "de_DE.UTF-8"; // "de_DE" will not work under Linux, must be same as generated locale!
  if(!defined('LC_MESSAGES')) { // note that under Windows LC_MESSAGES is not defined!
    define('LC_MESSAGES', 6);
  }  
  putenv("LC_MESSAGES=$lang");
  T_setlocale(LC_MESSAGES, $lang);
  T_bindtextdomain("messages", "locale");
  T_bind_textdomain_codeset("messages", "UTF-8");
  T_textdomain("messages");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>PHP gettext test</title>
</head>
<body>
 <h1>PHP gettext test</h1>
 <p><?php echo T_("Hello world"); ?></p>
 <p><?php echo T_("some more text: umlauts etc."); ?></p>
 <?php echo date('r'); ?>
</body>
</html>
