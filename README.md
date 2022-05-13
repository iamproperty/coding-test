## Coding Test

### Includes

* Laravel 7
* Vue 2

### Prerequisites

Before getting started you should have the following installed and running:

- [X] PHP >= 7.2 - [instructions](https://www.php.net/downloads.php)
- [X] Composer - [instructions](https://getcomposer.org/download/)
- [X] NPM - [instructions](https://docs.npmjs.com/getting-started/installing-node)

### Setup

##### Clone the project
```shell
$ git clone https://github.com/khalidzeiter/coding-test.git
$ cd coding-test
```

##### Setup backend app
```shell
$ composer install
$ cp .env.example .env   # Then update .env configurations
$ php artisan migrate
```
##### Setup frontend app
```shell
$ npm install
$ npm run dev
```

### Running 

```shell
$ php artisan serve
```

The application will be served from [`127.0.0.1:8080`](http://127.0.0.1:8000/).

#### For sending emails you should run

```shell
$ php artisan queue:work
```
