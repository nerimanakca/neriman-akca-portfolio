Web Portfolio

> *"Your portfolio is the bridge between your academic life and your professional career. Build it strong."*

---

## 📌 Project Overview

This is a comprehensive **Full-Stack Web Portfolio** developed as part of the **SEN 3002 – Internet and Web Programming** course at **Haliç Üniversitesi**.

The project integrates the main web technologies covered throughout the semester to create a dynamic, database-driven personal portfolio. It serves both as a course deliverable and as a professional career asset for showcasing academic projects, technical skills, and software development experience.

---

## 🚀 Live Demo

🔗 https://nerimanportfolio.infinityfreeapp.com/

---

## 🛠️ Tech Stack

| Layer | Technologies |
|---|---|
| **Frontend** | HTML5, CSS3, JavaScript |
| **Backend** | PHP |
| **Database** | MySQL |
| **Async Communication** | Fetch API / AJAX |
| **State Management** | PHP Sessions & Cookies |
| **Tools** | XAMPP, phpMyAdmin, VS Code, GitHub |

---

## ✨ Features

### 🎨 Semantic HTML & Advanced CSS

- Proper use of HTML5 semantic tags such as `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, and `<footer>`
- Responsive design using Flexbox and CSS Grid
- External stylesheet with consistent colors, spacing, layout, and typography
- Contact form and table structures included in the project

---

### ⚡ Client-Side Interactivity

- Dark/light mode toggle
- Responsive mobile navigation menu
- Project filtering system
- JavaScript contact form validation
- DOM manipulation based on user events
- Smooth scrolling behavior

---

### 🖥️ Server-Side Logic & Database

- Contact form messages are saved into a MySQL database
- Portfolio projects are stored in the database
- Projects are fetched dynamically from MySQL and displayed on the homepage
- PHP is used for backend logic and database operations
- PDO and prepared statements are used for database security

---

### 🔄 AJAX Integration

AJAX is used in two main parts of the project:

1. Loading projects dynamically from the database without refreshing the page
2. Submitting the contact form asynchronously using Fetch API

Related API files:

```text
api/get_projects.php
api/contact_submit.php
````

---

### 🔐 State Management & Admin Dashboard

* Admin login system with PHP sessions
* Protected admin dashboard
* Cookie-based dark mode preference
* Admin can add, edit, and delete projects
* Admin can view contact messages

Default admin account:

```text
Username: admin
Password: admin123
```

---

## 📁 Project Structure

```text
portfolio_project/
│
├── index.php
├── README.md
├── Project_Report.md
│
├── admin/
│   ├── login.php
│   ├── dashboard.php
│   ├── add_project.php
│   ├── edit_project.php
│   ├── delete_project.php
│   └── logout.php
│
├── api/
│   ├── get_projects.php
│   └── contact_submit.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── main.js
│
├── config/
│   └── db.php
│
└── database/
    └── portfolio.sql
```

---

## 🗄️ Database Schema

The project uses a MySQL database named:

```text
portfolio_db
```

The database contains three main tables:

### `admins` table

Stores admin login information.

Fields:

* id
* username
* password
* created_at

---

### `projects` table

Stores portfolio project entries.

Fields:

* id
* title
* category
* description
* technologies
* github_link
* live_demo_link
* created_at

---

### `messages` table

Stores visitor messages submitted through the contact form.

Fields:

* id
* name
* email
* subject
* message
* created_at

---

> 📦 Full SQL export is located at:

```text
database/portfolio.sql
```

---

## ⚙️ Setup & Installation

### Prerequisites

* PHP
* MySQL
* XAMPP, WAMP, MAMP, Laragon, or another local server environment
* phpMyAdmin
* Web browser

---

### Local Installation Steps

```bash
# 1. Clone the repository
git clone https://github.com/nerimanakca/neriman-akca-portfolio
```

Move the project folder into your local server directory.

For XAMPP on Mac:

```text
/Applications/XAMPP/htdocs/portfolio_project
```

For XAMPP on Windows:

```text
C:\xampp\htdocs\portfolio_project
```

---

### Database Setup

1. Open phpMyAdmin.
2. Create a database named:

```text
portfolio_db
```

3. Import the SQL file:

```text
database/portfolio.sql
```

4. Make sure the following tables are created:

```text
admins
projects
messages
```

---

### Database Connection

The database connection file is:

```text
config/db.php
```

Default local configuration:

```php
$host = "localhost";
$dbname = "portfolio_db";
$username = "root";
$password = "";
```

---

### Run the Project

Open the project in your browser:

```text
http://localhost/portfolio_project/
```

Open the admin panel:

```text
http://localhost/portfolio_project/admin/login.php
```

Admin login information:

```text
Username: admin
Password: admin123
```

---

## 📋 Submission Checklist

* [ ] Source code zipped and uploaded to LMS
* [ ] Project report included in the `.zip` folder
* [ ] SQL export file included in the `.zip` folder
* [ ] GitHub repository made public
* [ ] GitHub commit history shows step-by-step development
* [ ] Live demo link is working and accessible

---

## 🔗 Submission Links

| Item                 | Link                                    |
| -------------------- | --------------------------------------- |
| 📦 LMS Upload        | Submitted via LMS                       |
| 🐙 GitHub Repository | https://github.com/nerimanakca/neriman-akca-portfolio |
| 🌐 Live Demo         | https://nerimanportfolio.infinityfreeapp.com/         |

---

## 📊 Grading Criteria

| Component                         | Weight                        |
| --------------------------------- | ----------------------------- |
| Minimum Technical Requirements    | 50 pts                        |
| Technical Q&A Session             | 50 pts                        |
| **Final Project / Lab Component** | **20% of total course grade** |

**Deadline:** `14 / 05 / 2026`

---

## 👤 Author

**Neriman Akça**
Haliç Üniversitesi – Software Engineering
Course: SEN 3002 – Internet and Web Programming

---

## 📝 License

This project was created for academic purposes. All code in this repository is written and maintained by the repository owner.