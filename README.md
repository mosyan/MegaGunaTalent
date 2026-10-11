# 🇩🇪 German Language Study — Mega Guna Talent

> **1:1 Pixel-Perfect Website Builder Duplicate** dari template *German Language Courses* ([Design.com](https://www.design.com/website-builder/c1c8a5a1-74be-488b-80f4-53bc8509bb38?isDraftSaved=True&contentKey=49220961-dd25-4c1b-963b-88d1d7308c0f&contentKeyType=UserPrompt&searchTerm=german+courses)) yang dibangun di atas fondasi **Laravel 13**, **PHP 8.4**, **MySQL**, dan **Redis**.

---

## 🚀 Tech Stack & Engine

* **Backend Engine:** [Laravel 13.35.0](https://laravel.com)
* **PHP Runtime:** PHP 8.4.7+
* **Database:** MySQL 8.x / 9.x (Database: `megagunatalent`)
* **In-Memory Cache & Session & Queue:** Redis via `predis/predis`
* **Frontend Toolchain:** [Vite 8](https://vitejs.dev) + [Tailwind CSS v4](https://tailwindcss.com)
* **AI Dev Assistance:** [Laravel Boost](https://laravel.com/docs/ai) MCP Server & Guidelines
* **Testing:** PHPUnit Feature & Unit Test Suite

---

## 🎨 Design & Asset Specification (1:1 Exact Match)

Desain menduplikasi struktur, tipografi, warna, dan aset asli dari canvas Design.com secara presisi:

### 1. Typography
* **Headings / Hero Titles:** [`Yeseva One`](https://fonts.google.com/specimen/Yeseva+One) (Serif elegan & berbobot)
* **Body / Subtitles / Paragraphs:** [`Arsenal`](https://fonts.google.com/specimen/Arsenal) (Sans-serif ramping & modern)
* **UI Controls & Navigation:** [`Lato`](https://fonts.google.com/specimen/Lato) & [`Arsenal`](https://fonts.google.com/specimen/Arsenal)

### 2. Color Palette
| Token | Hex Code | Deskripsi |
| :--- | :--- | :--- |
| `--palette-0` | `#fdc04f` | Warm Gold / Golden Amber (Aksen utama, tombol & background program) |
| `--palette-1` | `#321f47` | Deep Dark Plum Purple (Teks kontras & footer) |
| `--palette-2` | `#736143` | Muted Warm Brown |
| `--palette-3` | `#f2ebfd` | Lavender Tint Off-White |
| `--overlay` | `rgba(0,0,0,0.35)` | 34% Black Overlay pada Bridge CTA |

### 3. Asli Asset & Graphic Elements
* **Hero Background:** `public/images/global-bg.jpg` (Langit senja berawan dusk/teal)
* **Brandenburg Gate Landmark:** `public/images/hero-gate.jpg` (Cutout illuminated Brandenburg Gate Quadriga di perbatasan hero)
* **Bottom CTA Landmark:** `public/images/cta-bridge.jpg` (Skyline malam Frankfurt am Main dengan jembatan lengkung)
* **Vector Program Icons:**
  * 🎒 `public/images/shape-beginner.svg` — Ikon Ransel (Beginner A1–A2)
  * 📚 `public/images/shape-intermediate.svg` — Ikon Rak Buku (Intermediate B1–B2)
  * 💬 `public/images/shape-advanced.svg` — Ikon Speech Bubbles (Advanced C1–C2)
* **Branding Logo:** `public/images/logo.png` (Logo transparan resolusi tinggi *Education Slogan Here*)

---

## 🌟 Fitur Halaman & Interaktivitas

### 1. Landing Page (`/`)
* **Hero Section:** *"Speak German With Confidence"* dengan deskripsi, tombol *"Enroll Now"*, dan Brandenburg Gate di batas bawah.
* **Navigation & Hamburger Menu:** Tombol circular emas `#fdc04f` dengan slide-out drawer menu interaktif (backdrop blur, tombol close, keyboard `Esc` listener, dan auto-close link).
* **Our Programs (3 Pillars):**
  * **Beginner:** Praktik komunikasi dasar untuk traveler dan pemula.
  * **Intermediate:** Penguatan tata bahasa (grammar), kosakata, dan kelancaran percakapan.
  * **Advanced:** Spesialisasi bahasa Jerman bisnis, karir, dan teknikal.
* **Call to Action Section:** *"Achieve Your German Language Goals"* berlatar illuminated river bridge.
* **Footer:** Hak cipta `© 2025 . All Rights Reserved.` dan tautan sosial media Facebook, Instagram, dan X.

### 2. Enrollment Page (`/enroll-now`)
* Halaman formulir pendaftaran kursus bahasa Jerman yang fungsional.
* Validasi lengkap (First Name, Last Name, Email, Phone, Program Level, Message).
* Data otomatis tersimpan ke tabel MySQL `enrollments`.
* Entri pendaftaran dicatat dan di-push ke Redis list (`recent_enrollments`) secara real-time.
* Flash message alert konfirmasi pendaftaran.

---

## 🛠️ Panduan Instalasi & Menjalankan Lokal

### 1. Prasyarat Sistem
Pastikan toolchain berikut telah terpasang di sistem:
* **PHP:** `>= 8.4.0`
* **Composer:** `>= 2.8.0`
* **MySQL:** Server aktif di `127.0.0.1:3306`
* **Redis:** Server aktif di `127.0.0.1:6379`
* **Node.js:** `>= 20.x` & `npm`

### 2. Kloning & Install Dependensi
```bash
# Clone atau buka direktori proyek
cd /Users/mosyans/Sites/megagunatalent

# Install dependensi PHP
composer install

# Install dependensi JavaScript (Vite & Tailwind CSS v4)
npm install
```

### 3. Konfigurasi Environment (`.env`)
Pastikan konfigurasi database dan Redis telah sesuai:
```env
APP_NAME="German Language Study"
APP_ENV=local
APP_KEY=base64:...
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=megagunatalent
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=redis
CACHE_STORE=redis
QUEUE_CONNECTION=redis

REDIS_CLIENT=predis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### 4. Database Migration
Jalankan migrasi tabel ke MySQL:
```bash
php artisan migrate
```

### 5. Compile Frontend Assets
```bash
# Build production bundle
npm run build

# Atau jalankan dev server vite untuk HMR saat development
npm run dev
```

### 6. Jalankan Server Aplikasi
```bash
php artisan serve
```
Buka browser di **http://127.0.0.1:8000** 🚀

---

## 🧪 Testing & Code Quality

Proyek ini dilengkapi dengan Feature Tests lengkap untuk memverifikasi fungsionalitas rendering landing page, form enrollment, dan integrasi database:

```bash
# Menjalankan PHPUnit test suite
php artisan test --compact

# Memastikan standar format kode (Laravel Pint)
vendor/bin/pint --format agent
```

---

## 📂 Struktur Direktori Utama

```text
megagunatalent/
├── app/
│   ├── Http/Controllers/
│   │   └── GermanCourseController.php   # Handle landing page, enroll form, MySQL & Redis
│   └── Models/
│       └── Enrollment.php               # Eloquent model pendaftaran
├── database/
│   └── migrations/
│       └── 2026_10_11_163436_create_enrollments_table.php
├── public/
│   └── images/
│       ├── global-bg.jpg                # Sky dusk hero background
│       ├── hero-gate.jpg                # Brandenburg Gate landmark cutout
│       ├── cta-bridge.jpg               # Frankfurt bridge night skyline
│       ├── logo.png                     # Transparent Education logo
│       ├── shape-beginner.svg           # Backpack vector icon
│       ├── shape-intermediate.svg       # Bookshelf vector icon
│       └── shape-advanced.svg           # Chat bubbles vector icon
├── resources/
│   ├── css/
│   │   └── app.css                      # Tailwind CSS v4 + custom palette & button double border
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php            # Base layout, navbar, hamburger drawer, footer
│       ├── home.blade.php               # 1:1 Landing page
│       └── enroll.blade.php             # Halaman pendaftaran
├── routes/
│   └── web.php                          # Web route definitions
└── tests/
    └── Feature/
        └── GermanCourseTest.php         # Automated feature test suite
```

---

## 📄 Lisensi
Open-source software berlisensi [MIT License](https://opensource.org/licenses/MIT).
