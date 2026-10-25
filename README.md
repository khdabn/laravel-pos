# Laravel POS System

A basic Point of Sale website created for the Technical 5 Assessment using Laravel, Blade, and PHP arrays.

## Pages

- Home — application landing page.
- About — information about the application.
- Customer Accounts — displays five sample customer records.
- User Accounts — displays five sample user records.

## Requirements

- PHP compatible with the project's Laravel version
- Composer
- Git

## Local Setup

1. Clone this repository.
2. Open a terminal in the project folder.
3. Install dependencies:

   ```bash
   composer install
   ```

4. Create the environment file:

   ```bash
   cp .env.example .env
   ```

   On Windows Command Prompt, use `copy .env.example .env` instead.

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Start the development server:

   ```bash
   php artisan serve
   ```

7. Open http://127.0.0.1:8000 in your browser.

## Routes

| Page | URL |
|---|---|
| Home | `/` |
| About | `/about` |
| Customer Accounts | `/customers` |
| User Accounts | `/users` |

## Data Source

Customer and user records are stored in PHP arrays.

## Live Website

http://laravelposbuen.fwh.is