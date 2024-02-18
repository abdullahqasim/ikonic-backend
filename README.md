# Ikonic feedback

This is Ikonic feedback system

## Installation

Clone the Project:

```bash
git clone git@github.com:abdullahqasim/ikonic-backend.git
```

Install composer:

```bash
composer install
```
Create .env file:

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```
Migrate database (Note: connect your project with database first then run the following command)

```bash
php artisan migrate
```
Run server

```bash
php artisan serve
```
