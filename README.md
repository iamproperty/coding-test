# Laravel Coding Test

You should have been told which set of tasks to complete. If not please let your contact know.

Feel free to do both sets if you want. 

## Backend

1. Add a page for users to register
2. Use http://postcodes.io/ to ensure that users submit a valid postcode
3. Send a welcome email when a user is registered
4. Add an artisan command to list recently registered users

## Frontend

Start the development server using `php artisan serve` and go to http://127.0.0.1:8000/address

1. Make the address lookup component accessible
2. Style it using bootstrap

## I worked On Backend
## Backend steps
1. Copy .env.example to .env to be sure `POST_CODE_VALID_URL` is exist
2. To register user go to `http://127.0.0.1:8000/users`
3. To list all registered users run command `php artisan users:list`