<?php
  $dir = dirname(__FILE__);
  set_include_path(get_include_path() . PATH_SEPARATOR . "$dir/zf/library");

  require_once( 'Zend/Translate.php' );

  try {
    $translate = new Zend_Translate(
      array(
        'adapter' => 'gettext',
        // 'content' => "$dir/locale/de_DE/LC_MESSAGES/messages.mo", // absolute path
        'content' => "locale/de_DE/LC_MESSAGES/messages.mo", // relative path, also ok
        'locale'  => 'de_DE'
      )
    );
  } catch( Exception $e ) {
    $err = "error: " . $e->getMessage();
  }
  if( !isset($translate) ) {
    try {
      $de_DE = array(); // use empty array to display all strings in original language (i.e. untranslated)
      $translate = new Zend_Translate(
        array(
          'adapter' => 'array',
          'content' => $de_DE,
          'locale'  => 'de_DE'
        )
      );
    } catch( Exception $e ) {
      $err = "error: " . $e->getMessage();
    }
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>PHP gettext test</title>
</head>
<body>
 <h1>PHP gettext test</h1>
 <p><?php echo $translate->_("Hello world"); ?></p>
 <p><?php echo $translate->_("some more text: umlauts etc."); ?></p>
 <p><?php echo $translate->_("some more text..."); ?></p>
 <?php echo date('r'); ?>
 <pre>
 <?php
   if( isset($err) ) echo "$err\n";
   $messageIds = $translate->getMessageIds();
   print_r($messageIds);
 ?>
 </pre>
</body>
</html>

