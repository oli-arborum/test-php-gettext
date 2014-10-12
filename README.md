test-php-gettext
================

Simple test code to catch the sometimes strange behaviour of PHP's gettext module
and to evaluate alternatives (currently only Zend Framework's Zend_Translate class).

A GNU Makefile is supplied in the LC_MESSAGES subdirectory in order to update the
.po file from changed sources and to create the .mo file from the .po file.

### Test Environment: ###
  - Apache 2.4.7
  - PHP 5.5.9-1ubuntu4.4
  - Zend Framework 1.12.9 (locally unpacked)
