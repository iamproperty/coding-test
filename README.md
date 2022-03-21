# Steps to run project locally

1. Clone project
2. Go to the folder application using cd command on your cmd or terminal
3. Run composer install on your cmd or termial
4. Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
5. Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
6. Run php artisan key:generate
7. Run php artisan migrate
8. Run php artisan serve
9. Go to localhost:8000/register
10. Enter your data and check the entered email to preview the mail notification
11. Check your database to preview registration functionality
12. Try different data with wrong postal code to review postcode api
13. In your command line try php artisan list-recently-registered-users
