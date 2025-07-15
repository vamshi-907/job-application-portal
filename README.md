# 🧑‍💼 Job Application Portal

A full-stack Job Application Portal built using **PHP**, **MySQL**, **Bootstrap 5**, and **JavaScript**.  
Admins can post jobs and manage applications. Users can view jobs and apply with resumes (PDF only).

---

## 🚀 Features Implemented

### 🔐 Admin Panel
- Admin login (hardcoded)
- Post new jobs (title, description, skills, location, salary, deadline)
- View & delete job listings
- View applicants per job
- Download applicant resumes (PDF)

### 🌐 Public Pages
- Job listings with filter (keyword, location, salary)
- Job detail page with “Apply Now” form
- Resume upload with duplicate application prevention (same email per job)

---

## 🛠 Tech Stack

- **PHP** (Native)
- **MySQL** (XAMPP)
- **HTML/CSS + Bootstrap 5**
- **JavaScript** (Vanilla)
- **phpMyAdmin** for database

---

## ⚙️ Setup Instructions

1.  Download and install [XAMPP](https://www.apachefriends.org/index.html)
2.  Place this folder inside `C:/xampp/htdocs/` as `job-portal/`
3.  Start Apache and MySQL using XAMPP
4.  Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
5.  Create a new database: `job_portal`
6.  Import `database.sql` file provided
7.  Visit in browser:
   - Admin login: [http://localhost/job-portal/admin/login.php](http://localhost/job-portal/admin/login.php)
   - Public jobs: [http://localhost/job-portal/public/index.php](http://localhost/job-portal/public/index.php)

---

## 🔑 Admin Credentials

- **Username:** `admin`
- **Password:** `admin123`

---

## 📁 Folder Structure
job-portal/
├── admin/
├── public/
├── uploads/
├── db.php
├── database.sql
└── README.md

