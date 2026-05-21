# 🚀 First-Time Setup Guide

Panduan lengkap untuk setup project pertama kali setelah clone dari Git.

## ❓ Kenapa `node_modules` & `vendor` tidak ada di Git?

Kedua folder ini **terlalu besar** dan akan membuat repository lamban. Sebagai gantinya:

- **`composer.json` & `composer.lock`** menyimpan daftar PHP packages
- **`package.json` & `package-lock.json`** menyimpan daftar npm packages

Setiap developer menjalankan `npm install` dan `composer install` untuk download packages lokal mereka.

---

## 📋 Checklist Setup Awal

### ✅ Langkah 1: Clone Repository

```bash
git clone https://github.com/aiyeuh21/Web-Profile---Laravel.git
cd Web-Profile---Laravel
```

### ✅ Langkah 2: Install PHP Packages (Composer)

```bash
composer install
```

**Apa yang terjadi?** Composer membaca `composer.lock` dan download semua PHP packages ke folder `vendor/`.

**Durasi**: ~1-2 menit

### ✅ Langkah 3: Install JavaScript Packages (npm)

```bash
npm install
```

**Apa yang terjadi?** npm membaca `package-lock.json` dan download semua Node packages ke folder `node_modules/`.

**Durasi**: ~2-5 menit (tergantung internet)

### ✅ Langkah 4: Setup Environment File

```bash
cp .env.example .env
```

**Edit `.env`** dengan informasi database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_profile
DB_USERNAME=root
DB_PASSWORD=
```

### ✅ Langkah 5: Generate Application Key

```bash
php artisan key:generate
```

### ✅ Langkah 6: Migrate Database

```bash
php artisan migrate
```

**Apa yang terjadi?** Membuat tabel di database sesuai migrations.

### ✅ Langkah 7: Seed Database (Optional tapi Recommended)

```bash
php artisan db:seed
```

**Apa yang terjadi?** Membuat data default:

- Admin user: `admin@example.com` / `secret123`
- Test user: `test@example.com`

---

## 🎯 Cara Menjalankan Project

### Terminal 1: Laravel Development Server

```bash
php artisan serve
```

Output: `Server running on [http://127.0.0.1:8000]`

### Terminal 2: Frontend Build (Watch Mode)

```bash
npm run dev
```

Ini auto-compile CSS & JS setiap ada perubahan.

---

## 📁 Folder Struktur (Post-Setup)

Setelah setup selesai, folder akan terlihat seperti ini:

```
Web-Profile---Laravel/
├── vendor/                  ← PHP packages (auto-created by composer install)
├── node_modules/           ← npm packages (auto-created by npm install)
├── .env                     ← Environment config (auto-created dari .env.example)
├── public/
│   └── build/              ← Compiled assets (auto-created by npm run build/dev)
├── storage/
│   └── logs/               ← Application logs
├── bootstrap/cache/        ← Cache files
└── ... (other files)
```

**Catatan**: Folder `vendor/`, `node_modules/`, `.env`, dan `public/build/` **TIDAK** ada di Git. Jangan push ke repository!

---

## 🔄 Update Dependencies

Jika `.env` atau dependencies berubah:

```bash
# Update semua packages ke versi terbaru yang compatible
composer update
npm update

# Jika ada migrasi database baru
php artisan migrate
```

---

## 🐛 Troubleshooting

### Error: "Call to undefined class Database\Seeders\DatabaseSeeder"

```bash
# Regenerate composer autoload
composer dump-autoload
php artisan db:seed
```

### Error: "SQLSTATE[HY000]: General error: 1 no such table"

```bash
# Jalankan migrations
php artisan migrate
php artisan migrate:fresh --seed  # Jika reset database
```

### Error: "npm: command not found"

- Install Node.js dari https://nodejs.org/ (versi LTS)
- Restart terminal setelah install

### Error: "composer: command not found"

- Install Composer dari https://getcomposer.org/
- Atau gunakan `php composer.phar` jika file ada

### Port 8000 sudah terpakai

```bash
php artisan serve --port=8001
```

### Asset tidak ter-load (CSS/JS kosong)

```bash
# Build production assets
npm run build
```

### Database connection error

Cek `.env`:

```env
DB_HOST=127.0.0.1        # Bukan localhost jika MySQL di port beda
DB_PORT=3306
DB_DATABASE=laravel_profile  # Pastikan database sudah dibuat
DB_USERNAME=root
DB_PASSWORD=              # Sesuai password MySQL Anda
```

---

## 🔒 Security Notes

1. **Jangan push `.env` ke Git** (sudah di `.gitignore`)
2. **Ubah admin password** setelah login pertama
3. **Generate APP_KEY** dengan `php artisan key:generate`
4. **Setup HTTPS** untuk production

---

## 📚 Useful Commands

```bash
# Database
php artisan migrate              # Run migrations
php artisan migrate:fresh        # Reset database
php artisan migrate:fresh --seed # Reset & seed
php artisan tinker              # Interactive shell

# Assets
npm run dev                      # Development (watch mode)
npm run build                    # Production build

# Server
php artisan serve               # Start dev server
php artisan serve --port=8001   # Custom port

# Cache & Optimization
php artisan cache:clear
php artisan config:cache
php artisan route:cache
```

---

## ✨ First-Time Verification

Setelah setup, verifikasi dengan mengakses:

1. **Home Page**: http://127.0.0.1:8000/
2. **Services**: http://127.0.0.1:8000/services (login required)
3. **Admin Panel**: Login sebagai `admin@example.com`
4. **Contact**: http://127.0.0.1:8000/contact

---

**Happy coding!** 🎉

Jika ada pertanyaan, lihat README.md untuk dokumentasi lebih lengkap.
