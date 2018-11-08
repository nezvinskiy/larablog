# make dock...

dockphp-artisan-make-auth:
	docker-compose exec php php artisan make:auth

dockphp-artisan-migrate:
	docker-compose exec php php artisan migrate

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
