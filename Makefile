# https://github.com/deworkerpro/demo-auction/blob/dfdabfcbbf0fb5b3d18f5a4696a3fa6bedc273e1/Makefile

init: docker-down-clear docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up

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

api-install:
	docker compose run --rm api-php-cli composer install
