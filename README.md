# Laravel Coding Test
## Coding Test


##### Setup project  

1. Clone project
2. Copy .env.example file to .env on the root folder.
```shell
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve
#make sure to run queue:work in order to receive notifications
$ php artisan queue:work
#you can add limit to users:list command 
$ php artisan users:list 10
```
