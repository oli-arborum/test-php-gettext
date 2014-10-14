<?php
  // replacement for _() which immediately sets the locale from the global variable $lang
  function __($str)
  {
    putenv("LC_MESSAGES=" . $GLOBALS["lang"]);
    setlocale(LC_MESSAGES, $GLOBALS["lang"]);
    return gettext($str); // do not use _() here, would recurse!
  }


  $lang = "de_DE.UTF-8"; // "de_DE" will not work under Linux, must be same as generated locale!
  $dir = dirname(__FILE__);
  if(!defined('LC_MESSAGES')) { // note that under Windows LC_MESSAGES is not defined!
    define('LC_MESSAGES', 6);
  }  
  putenv("LC_MESSAGES=$lang");
  setlocale(LC_MESSAGES, $lang);
  bindtextdomain("messages", "locale");
  bind_textdomain_codeset("messages", "UTF-8");
  textdomain("messages");

  // replace the _() function with our __() function
  runkit_function_redefine( '_', '$str', 'return __($str);' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>PHP gettext test</title>
</head>
<body>
 <h1>PHP gettext test</h1>
 <p><?php echo _("Hello world"); ?></p>
 <p><?php echo _("some more text: umlauts etc."); ?></p>
 <?php echo date('r'); ?>
</body>
</html>

