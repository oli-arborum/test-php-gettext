<?php
  // If Zend Framework includes are not configured globally
  // (i.e. the include_path in php.ini does not contain the library
  // folder of the Zend Framework installation) add it here locally:
  $dir = dirname(__FILE__);
  set_include_path(get_include_path() . PATH_SEPARATOR . "$dir/zf/library");
  // (I unpacked the Zend Framework 1.12.9 to zf/ subfolder of my test project's folder.)

  require_once( 'Zend/Translate.php' );
  require_once "test_perf.inc.php";

  $err = "";

  if( isset($_GET['cache']) and ($_GET['cache'] == 1) ) {
    require_once( 'Zend/Cache.php' );
    try {
      $cache = Zend_Cache::factory('Core', 'File', 
        array(
          'lifetime' => 10,
          'automatic_serialization' => true
        ),
        array(
          'cache_dir' => './cache'
        )
      );
      Zend_Translate::setCache($cache);
    } catch( Exception $e ) {
      $err .= $e->getMessage() . "\n";
    }
  }

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
    $err .= "error: " . $e->getMessage() . "\n";
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
      $err .= $e->getMessage() . "\n";
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
   if( $err != "" ) echo "error: $err";
   $messageIds = $translate->getMessageIds();
   print_r($messageIds);
 ?>
 </pre>
 <?php
   if( isset($_GET['testperf']) and ($_GET['testperf'] == 1) ) {
     $calls = 1000000;
     $duration = test_perf( $calls, function() { global $translate; $foo = $translate->_("Hello world"); } );
     echo "<p><b>Performance:</b> $calls calls took $duration s</p>";
   }
 ?>
</body>
</html>

