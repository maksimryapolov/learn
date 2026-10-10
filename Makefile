# https://github.com/deworkerpro/demo-auction/blob/dfdabfcbbf0fb5b3d18f5a4696a3fa6bedc273e1/Makefile

init: docker-down-clear docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up
lint: api-lint api-stan api-cs-check


docker-up:
	docker compose up -d

docker-down:
	docker compose down --remove-orphans

docker-down-clear:
	docker compose down -v --remove-orphans

docker-pull:
	docker compose pull

docker-build:
	docker compose build

api-init:
	docker compose run --rm api-php-cli composer install

api-install:
	docker compose run --rm -e COMPOSER_IPRESOLVE=4 api-php-cli composer require $(PACKAGE)

api-lint:
	docker compose run --rm api-php-cli composer lint

api-stan:
	docker compose run --rm api-php-cli composer stan

api-cs-check:
	docker compose run --rm api-php-cli composer cs-fixer-check

api-cs-fix:
	docker compose run --rm api-php-cli composer cs-fixer-fix