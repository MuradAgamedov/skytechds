# SkyTechDS

SkyTechDS is a Laravel-based REST API backend that powers the admin panel and content management system for a multilingual corporate website. It exposes token-authenticated endpoints for managing site content, contacts, and administrative users/roles.

## Tech Stack

- **PHP 8.2+** / **Laravel 12**
- **Laravel Sanctum** — API token authentication
- **Spatie Laravel Permission** — role & permission management
- **Vite** + **Tailwind CSS** — asset bundling for the admin-facing views
- **SQLite/MySQL** (configurable via `.env`)

## Features

- **Authentication** — token-based login via Sanctum, protected by rate limiting
- **Roles & Permissions** — manage admin roles and granular permissions
- **Content management** (with translations for multiple languages):
  - Blog posts, blog categories, tags
  - Portfolio items and services
  - Team members and testimonials
  - FAQs, statistics, and "About" content
  - Static/SEO pages and dynamic SEO metadata
  - Site info (general settings)
  - Dictionary (key/value translation strings)
- **Contacts** — phone numbers, emails, addresses, map locations, social network links
- **Contact messages** — inbound messages submitted through the public site
- **Admin management** — manage administrator accounts

## Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & npm
- A database (SQLite, MySQL, etc.)

### Installation

```bash
git clone <repository-url>
cd skytechds

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Configure your database and other environment variables in `.env`, then run:

```bash
php artisan migrate
npm run build
```

### Development

Run the app, queue worker, log viewer, and Vite dev server together:

```bash
composer dev
```

Or start the server on its own:

```bash
php artisan serve
```

### Testing

```bash
composer test
```

## API Routes

All API routes are grouped under the `admin` prefix and defined in [`routes/api.php`](routes/api.php), with individual route groups organized under [`routes/apis/`](routes/apis) by domain (`auth`, `contacts`, `blogs`, `content`, `admin`, etc.). Most routes require a valid Sanctum token via the `auth:sanctum` middleware.

## License

This project is proprietary software.
