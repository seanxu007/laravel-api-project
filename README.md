# Laravel api project

## Installation

1. Install docker, docker-compose

    - Mac: [Docker for Mac](https://docs.docker.com/docker-for-mac/)
    - Mac (better performance): Parallels
    - Windows: [Docker for Windows](https://docs.docker.com/docker-for-windows/)
    - Linux: package manager

2. Run project container

    $ docker-compose up -d

3. Seeding the user table for postman testing

    $ docker-compose exec laravel.test php artisan db:seed

4. Run unit test

    $ docker-compose exec laravel.test php artisan test

## Others

/laravel-api.postman_collection.json for postman documentation

/ideas/* for project's structure and advice