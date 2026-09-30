# Task Management System (Laravel + Inertia.js + Vue.js)

A full-stack Task Management application featuring authentication, email verification, password reset capabilities, and a complete Task CRUD system. Built with Laravel, Vue 3, Inertia.js, and Tailwind CSS.

---

## 🛠 Tech Stack & Versions

- **PHP:** `^8.3`
- **Laravel Framework:** `^13.0`
- **Inertia.js (Laravel Adapter):** `^3.0`
- **Inertia.js (Vue 3 Adapter):** `^3.0.3`
- **Vue.js:** `^3.5.33`
- **Tailwind CSS:** `^4.0.0`
- **Vite:** `^8.0.0`

---

## 📋 System Requirements

Ensure your local development environment meets the following requirements:

- **PHP:** `^8.3` or higher
- **Composer:** `^2.0`
- **Node.js:** `^18.0` or higher
- **npm** or **pnpm / yarn**
- **Database:** MySQL / SQLite / PostgreSQL

---

## 📥 Git Clone & Installation Guide

### 1. Clone the Repository
```bash
git clone [https://github.com/hassanroki/laravel-inertia-task.git](https://github.com/hassanroki/laravel-inertia-task.git)
cd laravel-inertia-task


📂 Project Architecture & Route Map
Below is an overview of the key endpoints and functionality built into the project:

1. Public Pages
GET / → Home Page (PageController@homePage)

GET /about → About Page (PageController@aboutPage)

2. Authentication & Account Management
GET /register & POST /register → User registration form and submission (AuthController)

GET /login & POST /login → User login form and authentication (AuthController)

POST /logout → User logout action (AuthController)

3. Password Reset Flow
GET /forgot-password & POST /forgot-password → Request password reset link (PasswordResetController)

GET /reset-password/{token} & POST /reset-password → Reset password form and update (PasswordResetController)

4. Email Verification (auth Middleware)
GET /verify-email & POST /verify-email → Email verification prompt and verification process (EmailVerificationController)

POST /verify-email/resend → Resend verification OTP (EmailVerificationController)

5. Task CRUD Management (auth Middleware)
GET /tasks → Display user tasks list (TaskController@index)

GET /tasks/create & POST /tasks/store → Create new task (TaskController@create, TaskController@store)

GET /tasks/{task}/edit & PUT /tasks/{task} → Edit existing task (TaskController@edit, TaskController@update)

DELETE /tasks/{task}/delete → Delete a task (TaskController@destroy)
