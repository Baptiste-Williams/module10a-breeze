# Laravel Breeze Auth Demo — Module 10A

**Author:** Baptiste Williams  
**Course:** CS 85 – PHP Programming @ Santa Monica College  
**Project:** Laravel Authentication Demo  

---

## Overview

This repo is my customized Laravel Breeze authentication project for Assignment 10A. The assignment was to get auth working using Breeze, but I went beyond the checklist—giving the app personality and immersive UX with a countdown timer, alarm effects, and custom styling. From routing to interface behavior, everything was tweaked with intention.

---

## What I Built

- Installed Laravel Breeze and scaffolded all required auth views and routes
- Created login, register, and post-auth dashboard pages
- Customized layout: dark mode theme, neon green input fields, and responsive button styling
- Added “Welcome Agent” heading above login form for dramatic tone
- Implemented a 30-second login countdown timer using vanilla JavaScript
- Triggered siren-style audio and flashing red screen if login wasn’t submitted in time
- Polished frontend and backend integration for Blade, JS, and Tailwind elements

---

## What I Troubleshot

| Problem | Fix |
|--------|-----|
| `404` error on login | Verified Breeze routes in `web.php` were active |
| Tailwind CSS classes not applying | Ran `npm run dev` to rebuild frontend assets |
| Audio autoplay restrictions | Used modal trigger to manually prime audio |
| Sound file not loading | Corrected path to `public/sounds/siren.wav` |
| Git Bash navigation syntax errors | Adjusted `cd` commands for Windows environment |

---

## Screenshots Included

- Login and Register forms with styling
- Post-login dashboard view
- Countdown + alarm visual effects
- VSCode showing routes/auth.php and Blade templates

---

## How to Run Locally

1. Clone the repo:
   ```bash
   git clone https://github.com/Baptiste-Williams/module10a-breeze.git
   cd module10a-breeze

2. composer install
npm install
npm run dev

3. touch database/database.sqlite

4. DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

5. php artisan migrate
php artisan serve
  http://127.0.0.1:8000/login to launch



  Purpose
While the assignment focused on building functional auth with Breeze, I added depth and expression. The visuals, alarm, and countdown bring urgency to login. This project blends cybersecurity awareness with user experience and creative direction—because every login can tell a story.
