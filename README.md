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
- <img width="1918" height="1017" alt="The login form" src="https://github.com/user-attachments/assets/352910ee-a29b-4388-abc9-b6b3382732ef" />
<img width="1918" height="1078" alt="The registration form" src="https://github.com/user-attachments/assets/1563c2e2-f467-420b-9d24-b12ef12529a4" />
- Post-login dashboard view
<img width="1897" height="1016" alt="Post-login dashboard screen shot 1" src="https://github.com/user-attachments/assets/cb275a63-aaa5-4796-8c23-331c81ba6c6b" />
<img width="1917" height="1077" alt="Post - log in dashboard screen shot 2" src="https://github.com/user-attachments/assets/f241ed05-e6a0-4922-8993-6c8a7b2bbad3" />

- VSCode showing routes/auth.php and Blade templates
  <img width="1908" height="1078" alt="routes auth screen shot php" src="https://github.com/user-attachments/assets/7a8892a4-6a59-4bee-a98a-afc46ad3ec9c" />
  <img width="1917" height="1000" alt="screen shot of auth views" src="https://github.com/user-attachments/assets/9163f911-4ec1-4db0-b90d-fdf26b8c4658" />
  
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
