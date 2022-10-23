.PHONY: helpers
helpers:
	php artisan ide-helper:generate
	php artisan ide-helper:models -F ./helpers/ModelHelper.php -M
	php artisan ide-helper:meta

.PHONY: analyse
analyse:
	./vendor/bin/phpstan analyse --memory-limit=512M

.PHONY: pint
pint:
	./vendor/bin/pint

.PHONY: prepare
prepare:
	php artisan migrate:fresh --seed
	php artisan --env=test migrate:fresh --seed

.PHONY: test
test:
	php artisan test --parallel

.PHONY: all
all: prepare helpers pint analyse test