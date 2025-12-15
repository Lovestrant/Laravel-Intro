If it’s a first-time Laravel project (brand new, not cloned), this is the correct clean setup flow 👇

1️⃣ Create a new Laravel project

Choose one method:

Using Composer (recommended)
` composer create-project laravel/laravel project-name `

Or using Laravel Installer
` laravel new project-name `

- When setting up a Laravel project from scratch or after cloning, these are the essential commands you should run in order 👇

1️⃣ Install dependencies
` composer install `

2️⃣ Create environment file
` cp .env.example .env `


➡️ Then update DB name, user, password in .env

3️⃣ Generate application key
` php artisan key:generate `

4️⃣ Run migrations
` php artisan migrate `


Or if seeders are included:

` php artisan migrate --seed `

5️⃣ (Optional but common) Clear & cache config
` php artisan config:clear php artisan cache:clear php artisan config:cache `

6️⃣ Storage link (if project uses uploads)
` php artisan storage:link `

7️⃣ Start the development server
` php artisan serve `

🔁 If the project uses frontend assets (React/Vue)

Since you work with React/Next often, check if the project has package.json:

` npm install `
` npm run dev `

⚠️ If you get migration issues

Existing tables:

` php artisan migrate:fresh `


Check migration state:

php artisan migrate:status

✅ Quick setup checklist
` composer install cp .env.example .env php artisan key:generate php artisan migrate --seed php artisan serve `