# Changelog - Role-Based Service Management & UI Updates

## Overview

Implemented role-based authentication system with admin and regular user roles. Admin users can manage (CRUD) services/jasa, while regular users can only view services and order via WhatsApp.

## Changes Made

### 1. Database Migrations

- **File**: `database/migrations/2026_05_21_000005_add_role_to_users_table.php`
  - Added `role` column to users table
  - Default value: `'user'`
  - Allows future expansion to other roles (super-admin, moderator, etc.)

### 2. Models

- **File**: `app/Models/User.php`
  - Added `'role'` to `$fillable` array
  - Added `$attributes` property with default `'role' => 'user'`

### 3. Authentication

- **File**: `app/Http/Controllers/Auth/RegisterController.php`
  - Automatically assigns new registrants `role => 'user'`
  - Admin users must be created manually or via seeder

### 4. Database Seeding

- **File**: `database/seeders/DatabaseSeeder.php`
  - Seeder creates two users:
    1. **Test User** (regular user)
       - Email: `test@example.com`
       - Role: `user`
    2. **Admin User** (for managing services)
       - Email: `admin@example.com`
       - Password: `secret123`
       - Role: `admin`

### 5. Service Controller

- **File**: `app/Http/Controllers/ServiceController.php`
  - Protected actions (`create`, `store`, `edit`, `update`, `destroy`)
  - Only allow users with `role === 'admin'`
  - Returns 403 (Forbidden) for non-admin users

### 6. Service Views - Index

- **File**: `resources/views/services/index.blade.php`
  - Admin users see:
    - "Tambah Jasa" (Add Service) button
    - Edit and Delete action buttons
  - Regular users see:
    - "Pesan" (Order) button
    - Links to WhatsApp: `https://wa.me/6289660329648`
    - Message format: "saya tertarik menggunakan jasa {service_name}"

### 7. Service Views - Show Detail

- **File**: `resources/views/services/show.blade.php`
  - Admin users see:
    - Edit button
    - Delete button
  - Regular users see:
    - "Pesan via WA" button linking to WhatsApp

### 8. UI Updates

- **File**: `resources/views/index.blade.php`
  - Removed `hero-section` class from hero section
  - Both "Get in Touch" and "Learn More" buttons now route to `contact` page

- **File**: `public/css/style.css`
  - Updated `.hero-section` to use `background-image: url("/img/eybanner1.jpg")`
  - Added dark overlay `rgba(0,0,0,0.55)` for text readability
  - Applied same styling to `.lets-connect-section`

- **File**: `resources/views/contact.blade.php`
  - Added Login and Register buttons for guest users
  - Cleaned up duplicate HTML structure
  - Improved form layout with proper Blade structure

## How to Use

### For Admin

1. Login with:
   - Email: `admin@example.com`
   - Password: `secret123`

2. Navigate to "Jasa" (Services) menu
3. Create, edit, or delete services

### For Regular Users

1. Register a new account (auto-assigned `user` role)
2. Navigate to "Jasa" menu
3. View available services
4. Click "Pesan" button to order via WhatsApp
5. Message will pre-fill: "saya tertarik menggunakan jasa {service_name}"

## Database Setup

After deployment, run:

```bash
php artisan migrate
php artisan db:seed
```

This will:

- Add `role` column to users table
- Create test user and admin user accounts

## Security Recommendations

1. Change admin password after first login
2. Consider implementing role-based middleware for route protection
3. Add authorization policies for service management
4. Implement proper WhatsApp API integration if needed (currently uses direct link)

## Files Modified

- `database/migrations/2026_05_21_000005_add_role_to_users_table.php` (NEW)
- `app/Models/User.php`
- `app/Http/Controllers/Auth/RegisterController.php`
- `app/Http/Controllers/ServiceController.php`
- `database/seeders/DatabaseSeeder.php`
- `resources/views/services/index.blade.php`
- `resources/views/services/show.blade.php`
- `resources/views/index.blade.php`
- `resources/views/contact.blade.php`
- `public/css/style.css`

## Test Accounts

| Role  | Email             | Password      |
| ----- | ----------------- | ------------- |
| Admin | admin@example.com | secret123     |
| User  | test@example.com  | (via factory) |

---

**Date**: May 21, 2026
**Version**: 1.0
