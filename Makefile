app:
	@docker-compose run --rm app sh

setup:
	@docker-compose run --rm app composer install

pint:
	@docker-compose run --rm app php ./vendor/laravel/pint/builds/pint

pint-test:
	@docker-compose run --rm app php ./vendor/laravel/pint/builds/pint --test

pint-dirty:
	@docker-compose run --rm app php ./vendor/laravel/pint/builds/pint --dirty

phpstan:
	@docker-compose run --rm app php ./vendor/phpstan/phpstan/phpstan analyse --memory-limit 1G
