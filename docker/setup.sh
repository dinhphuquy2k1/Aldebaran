#!/bin/bash

docker compose exec -it aldebaran-backend bash -c "composer install"
docker compose exec -it aldebaran-backend bash -c "cp .env.example .env"
docker compose exec -it aldebaran-backend bash -c "php artisan key:generate"
docker compose exec -it aldebaran-backend bash -c "php artisan migrate:fresh --seed"
