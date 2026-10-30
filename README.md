# Laravel POS System — TFA6

A Laravel application that displays customer and user accounts stored in MySQL. Database tables are created through migrations, populated through a seeder, and queried using Eloquent models.

## Live Website

http://laravelposbuen.fwh.is

## Pages

- Home: `/`
- About: `/about`
- Customer Accounts: `/customers`
- User Accounts: `/users`

## Requirements

- PHP 8.2 or a compatible newer version
- Composer
- MySQL

## Local Setup

1. Clone the repository and open its folder.
2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Copy `.env.example` to `.env`.

   On Windows Command Prompt:

   ```bat
   copy .env.example .env
   ```

4. Create an empty MySQL database named `laravel_pos`.
5. Set the database connection in `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_pos
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Adjust the username and password for your MySQL installation.

6. Generate the application key and clear cached configuration:

   ```bash
   php artisan key:generate
   php artisan config:clear
   ```

7. Create the tables and insert sample records:

   ```bash
   php artisan migrate --seed
   ```

8. Start the local server:

   ```bash
   php artisan serve
   ```

9. Open http://127.0.0.1:8000.

## Database

- Customers: ID, full name, email, phone, and timestamps.
- Users: ID, unique username, full name, and timestamps.
- PosSeeder creates five sample customers and five sample users.

## Application Structure

- Migrations define the database tables.
- PosSeeder inserts sample records.
- Customer and User models retrieve database records.
- Controllers pass records to Blade views.
- Blade views display the account tables.

## Configuration

The `.env` file contains environment-specific settings and is excluded from Git. Configure hosted database credentials separately on the hosting server.