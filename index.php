<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>PHP gettext test</title>
</head>
<body>
 <h1>PHP gettext test</h1>
 <p><a href="index_gt.php">using PHP's gettext module</a> <a href="index_gt.php?testperf=1">[test performance]</a></p>
 <p><a href="index_gt_fix.php">using PHP's gettext module with a workaround</a> <a href="index_gt_fix.php?testperf=1">[test performance]</a></p>
 <p><a href="index_php_gt.php">using php-gettext (PHP implementation of gettext)</a> <a href="index_php_gt.php?testperf=1">[test performance]</a></p>
 <p><a href="index_zf.php">using Zend Framework's Translation class</a> <a href="index_zf.php?testperf=1">[test performance]</a></p>
 <p><a href="index_zf.php?cache=1">using Zend Framework's Translation class Zend_Cache</a> <a href="index_zf.php?cache=1&testperf=1">[test performance]</a> (<i>does not work currently!</i>)</p>
 <?php echo date('r'); ?>
</body>
</html>

