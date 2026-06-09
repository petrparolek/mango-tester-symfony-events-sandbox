.PHONY: install qa cs csf phpstan tests coverage-clover coverage-html

install:
	composer install --no-interaction --no-progress --optimize-autoloader

qa: phpstan cs

cs:
	vendor/bin/codesniffer app tests

csf:
	vendor/bin/codefixer app tests

phpstan:
	vendor/bin/phpstan analyse -l 8 -v -c phpstan.neon app

tests:
	vendor/bin/tester -C tests/cases

coverage-clover:
	vendor/bin/tester -C tests/cases --coverage ./temp/coverage.xml --coverage-src app --coverage-src tests/src

coverage-html:
	vendor/bin/tester -C tests/cases --coverage ./temp/coverage.html --coverage-src app --coverage-src tests/src
