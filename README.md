test-php-gettext
================

Simple test code to catch the sometimes strange behaviour of PHP's gettext module
and to evaluate alternatives (currently only Zend Framework's Zend_Translate class).

A GNU Makefile is supplied in the LC_MESSAGES subdirectory in order to update the
.po file from changed sources and to create the .mo file from the .po file.

### Testing Environments: ###
  - Linux: Ubuntu 14.04 LTS with
    - Apache 2.4.7
    - PHP 5.5.9-1ubuntu4.4
    - Zend Framework 1.12.9 (locally unpacked)
    - PHP runkit: zenovich/runkit@27f33f55eae4459448fc39fac49daba26bb6b575 (current master)
  - Windows: Windows 7 x64 with
    - Apache 2.4.10 win32-VC11 [x86] from Apache Lounge
    - PHP 5.6.1 win32-VC11 [x86] from php.net
    - Zend Framework 1.12.9 (locally unpacked)
    - PHP runkit: https://github.com/Crack/runkit-windows/blob/master/php_runkit-1.0.4-5e179e978a-5.5-vc11.dll

### installing runkit under Ubuntu 14.04 LTS ###
 - `pecl install runkit` or `pecl install channel://pecl.php.net/runkit-0.9` **does not work**!
 - `git clone https://github.com/zenovich/runkit.git`
 - `mv runkit runkit-1.0.4`
 - `cd runkit-1.0.4`
 - `mv package.xml ..`
 - `cd ..`
 - `tar cvz --exclude-vcs -f /tmp/runkit-master.tgz .`
 - `sudo pecl install /tmp/runkit-master.tgz`
 - create the file `/etc/php5/mods-available/runkit.ini` with this content:
   `
   ; configuration for php runkit module
   ; priority=20
   extension=runkit.so
   `
 - add these lines to `/etc/php5/apache2/php.ini`:
   `
   [runkit]
   runkit.internal_override=1
   `
 - `sudo service apache2 restart`

### Links ###
 - http://stackoverflow.com/questions/1473207/php-gettext-on-windows
 - http://stackoverflow.com/questions/12356987/gettext-on-windows-7-doesnt-translate?rq=1
 - http://stackoverflow.com/questions/11598263/apache-gettext-windows-does-not-work-translate
 - http://stackoverflow.com/questions/7091724/gettext-php-and-windows-2008
 - http://stackoverflow.com/questions/10486857/php-gettext-no-translation
 - http://stackoverflow.com/questions/6925736/how-to-redefine-a-function-in-php
 - http://framework.zend.com/manual/1.12/de/zend.translate.html
 - http://blog.ghost3k.net/articles/php/11/gettext-caching-in-php
