# HEISEN GROUP COMPANY LIMITED — Official Website

A professional corporate website built with **Laravel 13** (PHP 8.5) for **HEISEN GROUP COMPANY LIMITED**, a Dar es Salaam based company offering environmental cleaning, fumigation, pest control and general supply services.

The project includes:

- A full public-facing marketing site (Home, About, Services, Pricing, Gallery, Contact with a working enquiry form)
- A password-protected Admin Panel to manage Services, Pricing Packages and incoming Contact Messages
- A MySQL database layer (migrations + seeders) pre-loaded with the company's real services, pricing and contact details
- A responsive, branded design (Tailwind CSS) matching the HEISEN GROUP logo colours

---

## 1. Requirements

- **WAMP Server** (or any Apache + MySQL + PHP stack) with:
  - **PHP 8.5.0** (PHP 8.3+ also works — Laravel 13 supports PHP 8.3 – 8.5)
  - **MySQL** (bundled with WAMP)
- **Composer** — https://getcomposer.org/download/ (required to install Laravel's dependencies)
- (Optional) Node.js — **not required**. This project uses the Tailwind CSS CDN build, so there is no `npm install` / asset build step needed to run the site.

> This zip contains the full Laravel application source code **without** the `vendor/` folder (standard practice — vendor files are rebuilt by Composer, keeping the zip small and clean). You must run `composer install` once before the site will work.

---

## 2. Installation (WAMP, step by step)

1. **Unzip the project** into your WAMP `www` folder, e.g.:
   ```
   C:\wamp64\www\heisen-group-website
   ```

2. **Start WAMP** and make sure Apache + MySQL services are running (WAMP tray icon should be green).

3. **Open a terminal** (PowerShell / CMD) inside the project folder:
   ```
   cd C:\wamp64\www\heisen-group-website
   ```

4. **Install PHP dependencies with Composer:**
   ```
   composer install
   ```

5. **Create your environment file:**
   ```
   copy .env.example .env
   ```
   (on macOS/Linux use `cp .env.example .env`)

6. **Generate the application key:**
   ```
   php artisan key:generate
   ```

7. **Create the database.** Open **phpMyAdmin** (`http://localhost/phpmyadmin`) and create a new database named:
   ```
   heisen_group_db
   ```
   (This matches the default `DB_DATABASE` value in `.env.example`. WAMP's default MySQL user is `root` with no password, which is also already set.)

   If your WAMP MySQL uses a different username/password, update these lines in `.env`:
   ```
   DB_DATABASE=heisen_group_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```

8. **Run the migrations and seed the database** with the company's real services, pricing and the admin account:
   ```
   php artisan migrate --seed
   ```

9. **Link the storage folder** (used if you later upload images through the admin panel):
   ```
   php artisan storage:link
   ```

10. **Visit the site:**
    ```
    http://localhost/heisen-group-website/public
    ```

    > Tip: For a cleaner URL you can create an Apache **Virtual Host** pointing to the `public/` folder (e.g. `http://heisengroup.local`). WAMP → left-click tray icon → Apache → httpd-vhosts.conf.

---

## 3. Admin Panel Access

```
URL:      http://localhost/heisen-group-website/public/admin/login
Email:    admin@heisengroup.test
Password: Heisen@12345
```

**Please change this password** after your first login in a production environment (you can add a "change password" feature, or update it directly via `php artisan tinker`).

From the admin panel you can:
- Add, edit, publish/unpublish and delete **Services** (with an icon picker — see "Icon System" below)
- Add, edit and delete **Pricing Packages** (grouped by category)
- **Upload, edit and delete Gallery / Activity Photos** — real photos from service visits and events, shown instantly on the public Gallery page with captions and dates
- View and reply to **Contact Messages** submitted through the website's contact form

The admin panel is fully responsive: on tablets/phones, tap the menu icon (top-left) to open the sidebar navigation.

> **Important for photo uploads:** step 9 of the installation (`php artisan storage:link`) must be run, or uploaded photos will return broken image links. If you skip it initially, just run that command any time and refresh the page.

### Icon System

Every icon across the site (navigation, service cards, footer, admin sidebar, buttons) is a hand-built inline SVG component — no emoji and no external icon-font dependency, so icons always render crisply and match the brand colours. You'll find the full icon set at:
```
resources/views/components/icon.blade.php
```
Used anywhere in a Blade view as:
```blade
<x-icon name="leaf" class="w-5 h-5" />
```
To add a new icon, add a new `@case('your-name')` block inside that file, then reference it the same way. Service icons specifically are chosen from a dropdown when adding/editing a Service in the admin panel.

### Visitor Analytics

Admin → Visitor Analytics shows real traffic to your public site: total views, unique visitors, a 30-day trend chart, top countries, a world map of visitor locations (OpenStreetMap, no API key needed), top pages and recent visits. Location data comes from a free IP-geolocation lookup (`ip-api.com`) that runs automatically in the background — if the server has no internet access (or a visitor is on localhost), that visit is still counted but shown as "Unknown location" rather than breaking anything. No visits are tracked for `/admin/*` pages, bots/crawlers, or non-GET requests.

### Leadership Page

Admin → Leadership lets you add each leader's name, title, short bio and photo. These appear publicly at `/leadership`. The real organisational structure from your company profile (CEO, Finance & Procurement Manager, HR Manager, Operations Manager) is pre-seeded — just edit each entry to add the real person's name and photo.

### Quick Help Chat (AI assistant, site-wide)

A floating "Quick Help" chat button appears in the bottom-right corner of every public page. Visitors can type any question in plain English (or Swahili) and get an instant answer — no admin needs to be online or pre-write every possible question.

**How it works:**
- If you add an `ANTHROPIC_API_KEY` to `.env` (get one free to start at [console.anthropic.com](https://console.anthropic.com)), the widget is powered by real AI (Claude). Its knowledge is built automatically, on every request, from your live site content — current services, current pricing, and your Quick Answers library — so it always reflects what's actually on the site, and it's instructed to only discuss HEISEN GROUP and never invent prices or facts.
- **Without an API key**, it automatically falls back to smart keyword matching against the Quick Answers library (Admin → Quick Answers), so the widget still works immediately with zero configuration — it just won't handle free-form phrasing as well as the AI mode.

To turn on AI mode:
1. Create a key at https://console.anthropic.com
2. Add to `.env`: `ANTHROPIC_API_KEY=your-key-here`
3. That's it — no code changes, no restart beyond normal `.env` reload (WAMP picks it up on the next request).

Cost note: this uses a small/cheap Claude model by default (`claude-3-5-haiku-20241022`, configurable via `ANTHROPIC_MODEL` in `.env`) and only runs when a visitor actually sends a chat message — it's not called on normal page loads.

### Site Settings (Admin)

Admin → Settings lets you update the company name, tagline, phone numbers, email, address and social handles at any time — changes apply across the whole site immediately, no code changes or redeploy needed. The same page lets you change your admin password (current password + new password required).

---

## 4. Project Structure (key folders)

```
app/Http/Controllers/          Public site controllers (Home, About, Services, Pricing, Gallery, Contact)
app/Http/Controllers/Admin/    Admin panel controllers (Auth, Dashboard, Services, Pricing, Messages)
app/Models/                    Eloquent models (User, Service, PricingPackage, ContactMessage)
database/migrations/           Database table definitions
database/seeders/               Seed data: 10 real company services, pricing table, admin account
resources/views/               Blade templates (public site + admin panel)
routes/web.php                 All website & admin routes
public/images/                 Logo and gallery photos
```

---

## 5. Regular / Day-to-day Use

- **Public visitors** browse the site freely — no login required.
- **Staff / admin** log in at `/admin/login` to update services, prices, or read enquiries sent from the Contact page.
- All enquiries submitted via the **Contact** page are saved to the `contact_messages` table and visible instantly in the admin panel (Messages).
- The homepage, Services page and Pricing page automatically reflect whatever is marked "Published" / "Active" in the admin panel — no code changes needed for routine content updates.

---

## 6. Updating Company Details

Default contact details, address and social handles are stored in `.env` and `config/app.php` (under the `company` key), so you can update them in one place:

```
COMPANY_PHONE_PRIMARY="0714 535 329"
COMPANY_PHONE_SECONDARY="0673 351 810"
COMPANY_EMAIL="heisengroup.tz@gmail.com"
COMPANY_ADDRESS="Bibi Titi Road, Nyerere Tower, 2nd Floor, near DIT College, Dar es Salaam, Tanzania"
COMPANY_FACEBOOK="Heisen_group"
COMPANY_INSTAGRAM="Heisen_group"
```

After editing `.env`, run:
```
php artisan config:clear
```

---

## 7. Troubleshooting

| Problem | Solution |
|---|---|
| Blank/white page | Check `storage/logs/laravel.log`; ensure `php artisan key:generate` was run |
| "could not find driver" | Enable `pdo_mysql` extension in WAMP's PHP settings (WAMP tray → PHP → PHP extensions → php_pdo_mysql) |
| "SQLSTATE[HY000] [1049] Unknown database" | Create the `heisen_group_db` database in phpMyAdmin first |
| CSS not loading / unstyled page | Check your internet connection — Tailwind CSS and Google Fonts load from a CDN |
| Admin login fails | Confirm you ran `php artisan migrate --seed` so the admin account exists |
| Visitor map/location shows "Unknown" for everyone | Normal for local testing (localhost has no public IP to geolocate). It will populate correctly once visited over the internet on a live server |
| `setting()` function not found | Run `composer dump-autoload` once after installing — this project registers a small helpers file via Composer's autoloader |

---

## 8. License

Proprietary — built exclusively for HEISEN GROUP COMPANY LIMITED.
