# Laravel Coding Test
Kindly follow these steps to make the project working after pulling:

1. run `composer install`
2. run `npm install`
3. setup your database connection and mail configuration at .env file
4. run `php artisan migrate`
5. run `php artisan config:cache`
6. run `php artisan serve`
7. Enjoy!

## Backend Tasks

1. Add a page for users to register
    - I've used laravel authentication system
2. Use http://postcodes.io/ to ensure that users submit a valid postcode
    - I've Used LaravelPostcodes package https://github.com/JustSteveKing/LaravelPostcodes to validate post codes
3. Send a welcome email when a user is registered
    - I've done this using the predefined events provided by laravel Illuminate\Auth\Events\Registered
4. Add an artisan command to list recently registered users
    - To use it just use the command `php artisan users:list_recently_registered`

## Frontend Tasks

Start the development server using `php artisan serve` and go to http://127.0.0.1:8000/address

1. Make the address lookup component accessible
2. Style it using bootstrap
- Used list-group and collapse data-toggle to manage the addresses list
