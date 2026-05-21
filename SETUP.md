# 🚀 First-Time Setup Guide

Panduan lengkap untuk setup project pertama kali setelah clone dari Git.

## ❓ Kenapa `node_modules` & `vendor` TIDAK ada di Git?

### 🚫 Folder yang TIDAK di-upload ke Git:

| Folder             | Ukuran      | Alasan                             | Solusi                          |
| ------------------ | ----------- | ---------------------------------- | ------------------------------- |
| `vendor/`          | ~200-500 MB | PHP packages - terlalu besar       | `composer install`              |
| `node_modules/`    | ~300-800 MB | npm packages - terlalu besar       | `npm install`                   |
| `.env`             | ~ 1 KB      | Sensitive data (password, API key) | Buat `.env` dari `.env.example` |
| `storage/logs/`    | Variable    | Application logs - temporary       | Auto-generated saat runtime     |
| `bootstrap/cache/` | Variable    | Cache files - temporary            | Auto-generated saat runtime     |

### ✅ Solusi: File Lock & Config

Sebagai gantinya, Git menyimpan **file konfigurasi** yang berisi **daftar packages**:

- **`composer.json` & `composer.lock`** → Daftar lengkap PHP packages & versinya
- **`package.json` & `package-lock.json`** → Daftar lengkap npm packages & versinya

### 🔄 Workflow Setiap Developer:

1. Clone repository → **Hanya file source + config diterima**
2. Jalankan `composer install` → **Download dan buat folder `vendor/` lokal**
3. Jalankan `npm install` → **Download dan buat folder `node_modules/` lokal**
4. Sekarang siap mengembangkan!

**Keuntungan:**

- Repository tetap kecil & cepat di-clone
- Setiap developer bisa punya versi packages yang sama (dari lock file)
- Tidak ada conflict antara developer
- `.env` tidak ter-share = keamanan terjaga

---

## 🔥 WAJIB Jalankan Pertama Kali Setelah Clone

Jika Anda baru clone repository, **HARUS** jalankan 2 command ini:

```bash
# WAJIB #1: Install PHP packages
composer install

# WAJIB #2: Install JavaScript packages
npm install
```

**Jika tidak**, folder `vendor/` dan `node_modules/` tidak akan ada, dan aplikasi akan error!

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
├── vendor/                  ← 🚫 NOT IN GIT (PHP packages - auto-created by composer install)
├── node_modules/           ← 🚫 NOT IN GIT (npm packages - auto-created by npm install)
├── .env                     ← 🚫 NOT IN GIT (Environment config - create from .env.example)
├── public/
│   └── build/              ← 🚫 NOT IN GIT (Compiled assets - auto-created by npm run build/dev)
├── storage/
│   ├── logs/               ← 🚫 NOT IN GIT (Application logs - auto-generated)
│   └── cache/
│       └── ... (cache files)
├── bootstrap/cache/        ← 🚫 NOT IN GIT (Cache files - auto-generated)
│
├── app/                     ✅ IN GIT (Source code)
├── config/                  ✅ IN GIT (Configuration files)
├── database/                ✅ IN GIT (Migrations & seeders)
├── resources/               ✅ IN GIT (Views, CSS, JS)
├── routes/                  ✅ IN GIT (Route definitions)
├── tests/                   ✅ IN GIT (Test files)
│
├── .gitignore              ✅ IN GIT (Specifies what to ignore)
├── composer.json           ✅ IN GIT (PHP packages list)
├── composer.lock           ✅ IN GIT (PHP packages lock file)
├── package.json            ✅ IN GIT (npm packages list)
├── package-lock.json       ✅ IN GIT (npm packages lock file)
├── README.md               ✅ IN GIT (Documentation)
└── ... (other config files)
```

### 🚫 TIDAK Ada di Git (di `.gitignore`):

- `vendor/` - PHP packages
- `node_modules/` - npm packages
- `.env` - Environment variables
- `public/build/` - Compiled assets
- `storage/logs/` - Application logs
- `bootstrap/cache/` - Cache files

**⚠️ PENTING**: Jangan coba push folder ini ke GitHub. Mereka sudah di `.gitignore` dan akan di-reject oleh Git.

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
