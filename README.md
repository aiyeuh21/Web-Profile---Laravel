# Web Profile - Laravel

Personal professional web profile built with Laravel 11, featuring role-based service management and authentication system.

## 📋 Project Overview

A modern web portfolio application with:

- **Role-based authentication** (Admin & User roles)
- **Service/Jasa management** (Create, Read, Update, Delete)
- **WhatsApp integration** for service orders
- **Professional portfolio sections** (Home, About, Contact, Services)
- **Responsive design** with Bootstrap 5

## 🔧 Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Bootstrap 5, Blade templating
- **Database**: MySQL/MariaDB
- **Package Manager**: Composer (PHP), npm (Node)
- **PHP Version**: 8.2+

## 📦 Installation & Setup

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & npm
- MySQL/MariaDB

### Step 1: Clone Repository

```bash
git clone https://github.com/aiyeuh21/Web-Profile---Laravel.git
cd Web-Profile---Laravel
```

### Step 2: Install Dependencies

**⚠️ IMPORTANT**: Folders `vendor/` and `node_modules/` are **NOT** included in Git (see `.gitignore`). You MUST install them locally.

#### Backend (PHP/Composer)

```bash
composer install
```

This downloads all PHP packages listed in `composer.lock` into the `vendor/` folder.

#### Frontend (Node/npm)

```bash
npm install
```

This downloads all JavaScript packages listed in `package-lock.json` into the `node_modules/` folder.

### Step 3: Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate
```

Edit `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 4: Database Setup

```bash
# Run migrations
php artisan migrate

# Seed database (creates admin & test users)
php artisan db:seed
```

### Step 5: Start Development Server

```bash
# Terminal 1: Run Laravel development server
php artisan serve

# Terminal 2: Build assets (watch mode)
npm run dev
```

The application will be available at: `http://127.0.0.1:8000`

## 👥 User Roles & Access

### Admin User

- Email: `admin@example.com`
- Password: `secret123`
- Permissions: Full CRUD for services/jasa

### Test User

- Email: `test@example.com`
- Permissions: View services, order via WhatsApp

### Regular Users (via Registration)

- Auto-assigned `user` role upon registration
- Can only view and order services via WhatsApp

## 🎯 Key Features

### Services (Jasa) Management

- **Admins only**: Create, edit, delete services
- **All users**: View available services
- **Regular users**: Order via WhatsApp with pre-filled message

### Authentication

- Registration (auto-assigns `user` role)
- Login/Logout
- Role-based access control

### WhatsApp Integration

- Service orders link directly to: `https://wa.me/6289660329648`
- Pre-filled message format: `"saya tertarik menggunakan jasa {service_name}"`

## 🏗️ Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Auth/                    # Authentication controllers
│   │   └── ServiceController.php    # Service CRUD (admin-protected)
│   └── Models/
│       ├── User.php                 # User model with role field
│       └── Service.php              # Service model
├── database/
│   ├── migrations/                  # Database migrations
│   └── seeders/                     # Database seeders
├── resources/
│   ├── views/
│   │   ├── layouts/                 # Layout templates
│   │   ├── services/                # Service views
│   │   ├── auth/                    # Auth views
│   │   └── index.blade.php          # Home page
│   └── css/
│       └── app.css                  # Tailwind/custom styles
├── routes/
│   └── web.php                      # Web routes
├── .gitignore                       # Git ignore rules
├── package.json                     # npm dependencies
├── composer.json                    # PHP dependencies
└── CHANGES.md                       # Detailed changelog
```

## 🔒 .gitignore Rules

The following directories/files are **NOT** committed to Git:

- `node_modules/` - npm packages (run `npm install`)
- `vendor/` - Composer packages (run `composer install`)
- `.env` - Environment variables (create locally)
- `storage/logs/` - Application logs
- `bootstrap/cache/` - Cache files

## 🚀 Deployment

### Production Build

```bash
# Build frontend assets
npm run build

# Run migrations on production database
php artisan migrate --force
```

### Environment Setup for Production

```bash
php artisan key:generate
php artisan config:cache
php artisan route:cache
```

## 📝 API Endpoints

### Public Routes

- `GET /` - Home page
- `GET /about` - About page
- `GET /contact` - Contact page

### Authentication Routes

- `GET/POST /register` - User registration
- `GET/POST /login` - User login
- `POST /logout` - User logout

### Service Routes (Protected by auth middleware)

- `GET /services` - List services
- `GET /services/create` - Create service form (admin only)
- `POST /services` - Store service (admin only)
- `GET /services/{id}` - View service detail
- `GET /services/{id}/edit` - Edit service form (admin only)
- `PUT /services/{id}` - Update service (admin only)
- `DELETE /services/{id}` - Delete service (admin only)

## 🐛 Troubleshooting

### Missing node_modules

```bash
npm install
```

### Missing vendor (Composer packages)

```bash
composer install
```

### Database connection error

- Verify `.env` database credentials
- Ensure MySQL/MariaDB service is running
- Check database name exists

### Port 8000 already in use

```bash
# Use different port
php artisan serve --port=8001
```

## 📄 Additional Documentation

See `CHANGES.md` for detailed changelog and feature descriptions.

## 📞 Contact

For inquiries or collaborations:

- WhatsApp: https://wa.me/6289660329648
- Contact Form: `/contact` page

## 📅 Project Info

- **Created**: May 21, 2026
- **Framework**: Laravel 11
- **License**: MIT

