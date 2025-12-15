In Laravel, the command to run migrations is:

*** php artisan migrate ***

Common migration-related commands you might need

Since you’ve worked with migrations before, these are especially useful:

Run fresh migrations (drop all tables and re-run):

*** php artisan migrate:fresh ***


Rollback the last batch of migrations:

*** php artisan migrate:rollback ***


Rollback all migrations:

*** php artisan migrate:reset ***


Rollback and re-run migrations:

*** php artisan migrate:refresh ***


Run migrations with seeders:

*** php artisan migrate --seed ***


Check migration status:

*** php artisan migrate:status ***

- Database uses eloquent ORM
A Model in Laravel represents a database table and is used to interact with it.

Example
*** php artisan make:model Product ***


This creates:

*** app/Models/Product.php ***

class Product extends Model
{
    protected $table = 'products';
}

- Model + Migration (most common)

When creating database tables, you almost always do:
This createa Model and creates migrations, but you still have to run that migration

*** php artisan make:model Product -m ***

# FACTORIES USAGE
Factories are used to define how dummy data that will be fed to the db with the help of seeders should look like

# SEEDER USAGE
In Laravel, a seeder is used to populate your database with data, usually sample or default data for testing, development, or initial setup.

Think of it as:

“A way to automatically insert records into your database without typing them manually.”

1️⃣ Where seeders live
database/seeders/


Example:

DatabaseSeeder.php → main entry point

CustomerSeeder.php → seeds customers

InvoiceSeeder.php → seeds invoices

2️⃣ Creating a seeder
*** php artisan make:seeder CustomerSeeder ***