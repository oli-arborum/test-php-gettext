test-php-gettext
================

Simple test code to catch the sometimes strange behaviour of PHP's gettext module
and to evaluate alternatives (currently only Zend frameworks's Zend_Translate class).

A GNU Makefile is supplied in the LC_MESSAGES subdirectory in order to update the
.po file from changed sources and to create the .mo file from the .po file.
