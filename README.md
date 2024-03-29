# Customer Browser
The goal of this assignment is to demonstrate your familiarity with building an application that consumes a JSON API
and displays aggregated data. There is no time limit for this assignment but we would advise time boxing the exercise
to 1-3 hours. Even if you do not complete all of the tasks please submit the assignment.

You will be assessed on the design skills you demonstrate, rather than your proficiency with PHP as a language. Whilst
the requirements are simple, you should aim to deliver a product that can be easily extended in the future. Feel free
to provide notes with your submission explaining any decisions or shortcuts you deem appropriate.

This application is to connect to a [live BigCommerce store](https://store-velgoi8q0k.mybigcommerce.com) via the
[V2 API](https://developer.bigcommerce.com/api/v2/). The application will consist of the following screens:
* A list of Customers, including the total number of orders they have placed
* A Customer Details screen that displays the Order History for that Customer and their Lifetime Value (defined as the
  total value of all of their orders)

## How to run the application and run tests

You will also need to install [Composer](https://getcomposer.org/download/). Once setup, install dependencies:
```
composer install
```

## Configuration
Copy the included `.env.example` file:
```
cp .env.example .env
```

Open the newly created `.env` file and fill in the `API_KEY` field
Before you can run the application, you need to generate an application key. You can do so by running:
```
php artisan key:generate
```

## Developing

To serve the application:
```
php -S localhost:8000 -t public
```                               

To run the unit tests:
```
./vendor/bin/phpunit
```