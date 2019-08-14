<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Steps to setup project


Following are the steps needed to perform to run the project :

- Clone project from git repository  "https://github.com/maab127/studyDrive.git".
- Run composer install.
- Set database variables in .env file.
- Run migrations e.g php artisan migrate.
- Run DB seed for dummy courses e.g php artisan db:seed.
- Run php artisan passport:install.
- Create server or define a server in host file.For artisan serve run the following command php artisan serve --port=8000.
- Now you can test the api's on http://localhost:8000/api/

## NOTE: FOR API DOCUMENTATION VISIT THE FOLLOWING URL "https://documenter.getpostman.com/view/8413791/SVYxnF9N?version=latest"

## Whats Remaning
- auth middleware
- course registration
- access token usage