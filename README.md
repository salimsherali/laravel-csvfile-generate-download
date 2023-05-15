# laravel-csvfile-generate-download
Laravel API code snippet to create a CSV file and generate a download

## Installation

Step 1: Clone the repository
Step 2: Install packages using composer:
```bash
    composer update
```
Step 3 copy the .env.example and rename it .env
```bash
cp .env.example .env
```
Step 4 create the database and update the name in .env under DB_DATABASE key
Step 5 run migrations
```php
    php artisan migrate
```
Step 6 run seeder
```php
    php artisan db:seed   
```
Step 7 install passport
```php
    php artisan passport:install  
```