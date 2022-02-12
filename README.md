# Laravel Coding Test
Please follow the following steps to start using the application:

1. run `composer install`
2. Copy .env.example to .env
3. Run `php artisan key:generate`
4. Setup the database and mail configurations at .env file
5. Run `php artisan migrate`
6. Run `php artisan serve`
7. Access user register page http://localhost:8000/users/create

## Backend Tasks

1. Add a page for users to register
2. Use http://postcodes.io/ to ensure that users submit a valid postcode
3. Send a welcome email when a user is registered
4. Add an artisan command to list recently registered users
    - Command `php artisan users:latest`
    - You can pass optional argument for command to get the desired number of users `php artisan users:latest 3`.
    - If no argument passed to the command it will display the default count which is `10`.