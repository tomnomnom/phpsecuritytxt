test:
	./vendor/bin/phpunit --colors --verbose

dev-deps:
	composer install --dev

.PHONY: test dev-deps
