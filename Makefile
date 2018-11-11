# make dock...

docker-up:
	docker-compose up -d

docker-ps:
	docker-compose ps

docker-build:
	docker-compose up --build -d

docker-stop:
	docker-compose stop

composer-install:
	docker-compose exec php php composer.phar install

dockphp-artisan-make-auth:
	docker-compose exec php php artisan make:auth

dockphp-artisan-migrate:
	docker-compose exec php php artisan migrate

dockphp-artisan-storage-link:
	docker-compose exec php php artisan storage:link

docknpm-install:
	docker-compose exec node npm install

dockyarn-install:
	docker-compose exec node yarn install

dockyarn-run-dev:
	docker-compose exec node yarn run dev

dockyarn-run-prod:
	docker-compose exec node yarn run prod

dockyarn-run-watch:
	docker-compose exec node yarn run watch
