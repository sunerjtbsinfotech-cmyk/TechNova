# TechNova Solutions — Laravel Business Management System

## Project Overview
TechNova Solutions is a Laravel-based business website and management system designed for a technology services company. It demonstrates a complete CRUD-based business workflow suitable for an academic Laravel project.

## Included Modules
- Public responsive business website
- Services catalog
- Products / inventory catalog
- Product search and pagination
- Project inquiry/contact form stored in the database
- Administrator login using session authentication
- Admin dashboard with business statistics
- Product CRUD (create, read, update, delete)
- Service CRUD
- Inquiry management and status tracking
- Inventory report by category
- Seeded demo account and sample data

## Technologies
- Laravel 12
- PHP 8.2+
- Blade templates
- SQLite (default) / MySQL compatible migrations
- HTML5, CSS3, JavaScript

## Demo Administrator
Email: `admin@technova.test`
Password: `password`

## Installation
1. Install PHP 8.2+, Composer, and Laravel requirements.
2. Extract the project.
3. Copy `.env.example` to `.env`.
4. Run `composer install`.
5. Run `php artisan key:generate`.
6. Run `php artisan migrate --seed`.
7. Run `php artisan serve`.
8. Open `http://127.0.0.1:8000`.
9. Open `/admin/login` for the management system.

## Database
The project uses SQLite by default. The empty `database/database.sqlite` file is included. For MySQL, change the DB_* values in `.env` and run the same migration and seed commands.

## Academic System Flow
Customer visits TechNova → views services/products → submits project inquiry → administrator signs in → reviews inquiry → manages services/products → checks inventory and reports.

## Suggested Project Title
**TechNova Solutions: A Laravel-Based Technology Services and Business Management System**
