messages.mo: messages.po
	msgfmt -v -c messages.po
messages.po: ../../../*.php
	xgettext ../../../*.php -L PHP -c -j

