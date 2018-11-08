# make dock...

dockphp-artisan-make-auth:
	docker-compose exec php php artisan make:auth

dockphp-artisan-migrate:
	docker-compose exec php php artisan migrate
