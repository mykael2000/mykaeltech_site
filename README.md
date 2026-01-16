# Mykaeltech Website

A modern Laravel-based website for Mykaeltech - Tech & Accounting Strategic Partners.

## About

Mykaeltech specializes in integrated solutions that bridge technology and accounting, providing transformative services from modern cloud infrastructure to precise financial modeling.

## Features

- Modern, responsive design using Tailwind CSS
- Interactive service showcase
- Portfolio and case studies with tabbed interface
- Blog/insights section
- FAQ accordion
- Contact form and session booking

## Requirements

- PHP >= 8.2
- Composer
- Laravel 12.x

## Installation

1. Clone the repository:
```bash
git clone https://github.com/mykael2000/mykaeltech_site.git
cd mykaeltech_site
```

2. Install dependencies:
```bash
composer install
```

3. Copy the environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Set up permissions:
```bash
chmod -R 775 storage bootstrap/cache
```

## Running the Application

### Development Server

Start the Laravel development server:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

### Production Deployment

For production deployment, ensure you:

1. Set `APP_ENV=production` in your `.env` file
2. Set `APP_DEBUG=false` in your `.env` file
3. Configure your web server (Apache/Nginx) to point to the `public` directory
4. Run `composer install --optimize-autoloader --no-dev`
5. Run `php artisan config:cache`
6. Run `php artisan route:cache`

## Project Structure

```
mykaeltech_site/
├── app/                 # Application core
├── bootstrap/           # Framework bootstrap files
├── config/             # Configuration files
├── database/           # Database migrations and seeds
├── public/             # Public assets (entry point)
├── resources/          # Views, CSS, and JS
│   └── views/         # Blade templates
├── routes/             # Route definitions
├── storage/            # Application storage
└── vendor/             # Composer dependencies
```

## License

Proprietary - All rights reserved by Mykaeltech

## Contact

- Email: info@mykaeltech.com
- Phone: +1 (555) 987-6543
