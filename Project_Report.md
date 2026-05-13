# Project Report

## Full-Stack Web Portfolio

**SEN 3002 – Internet and Web Programming**  
Haliç Üniversitesi – Department of Software Engineering

---

| | |
|---|---|
| **Student Name** | Neriman Akça |
| **Student ID** | [Your Student ID] |
| **Instructor** | [Instructor Name] |
| **Submission Date** | 14 / 05 / 2026 |
| **Live Demo** | [your-live-url.com] |
| **GitHub Repository** | [github.com/YOUR_USERNAME/YOUR_REPO] |

---

## Table of Contents

1. [Project Overview](#1-project-overview)
2. [Project Structure](#2-project-structure)
3. [Technologies Used](#3-technologies-used)
4. [Feature Implementation](#4-feature-implementation)
   - 4.1 [Semantic HTML and CSS](#41-semantic-html-and-css)
   - 4.2 [JavaScript and DOM Manipulation](#42-javascript-and-dom-manipulation)
   - 4.3 [PHP Backend and MySQL Database](#43-php-backend-and-mysql-database)
   - 4.4 [AJAX Integration](#44-ajax-integration)
   - 4.5 [Admin Dashboard and State Management](#45-admin-dashboard-and-state-management)
5. [Database Design](#5-database-design)
6. [Security Measures](#6-security-measures)
7. [Testing](#7-testing)
8. [Challenges and Solutions](#8-challenges-and-solutions)
9. [Conclusion](#9-conclusion)

---

## 1. Project Overview

This project is a dynamic full-stack personal portfolio website developed as the final project for the **SEN 3002 – Internet and Web Programming** course.

The main objective of the project is to design and develop a professional portfolio website using the technologies covered throughout the semester: **HTML5, CSS3, JavaScript, PHP, and MySQL**.

The website serves two main purposes. First, it fulfills the academic requirements of the course. Second, it works as a professional digital portfolio that can be used to showcase academic projects, technical skills, experience, and contact information.

The application allows visitors to:

- View personal and academic information
- Browse technical skills
- View portfolio projects dynamically
- Filter projects by category
- Send contact messages through a contact form

The project also includes a protected admin dashboard. After logging in, the admin can manage portfolio projects and view messages submitted by visitors.

---

## 2. Project Structure

The project files are organized in a clean and understandable structure:

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
````

### Folder Explanations

* `index.php`: Main portfolio homepage.
* `assets/css/style.css`: External stylesheet for layout, colors, responsiveness, and visual design.
* `assets/js/main.js`: JavaScript file for DOM manipulation, form validation, dark mode, project filtering, and AJAX requests.
* `config/db.php`: Database connection file using PDO.
* `api/get_projects.php`: API endpoint that fetches project data from the database.
* `api/contact_submit.php`: API endpoint that saves contact form messages into the database.
* `admin/login.php`: Admin login page.
* `admin/dashboard.php`: Admin dashboard page.
* `admin/add_project.php`: Page for adding new projects.
* `admin/edit_project.php`: Page for editing existing projects.
* `admin/delete_project.php`: File for deleting projects.
* `admin/logout.php`: Ends the admin session and logs out the user.
* `database/portfolio.sql`: SQL export file containing the database structure and sample data.

---

## 3. Technologies Used

| Technology     | Purpose                                                               |
| -------------- | --------------------------------------------------------------------- |
| **HTML5**      | Creating the semantic structure of the web pages                      |
| **CSS3**       | Styling, layout design, responsive design, and visual appearance      |
| **JavaScript** | DOM manipulation, form validation, dark mode, filtering, and AJAX     |
| **PHP**        | Server-side logic, database operations, login system, and admin panel |
| **MySQL**      | Storing admins, projects, and contact messages                        |
| **PDO**        | Secure database connection and prepared statements                    |
| **Fetch API**  | AJAX requests for loading projects and submitting contact forms       |
| **Sessions**   | Admin authentication and protected dashboard access                   |
| **Cookies**    | Remembering the dark mode preference                                  |
| **XAMPP**      | Local development server                                              |
| **phpMyAdmin** | Database creation and management                                      |
| **VS Code**    | Code editor                                                           |

---

## 4. Feature Implementation

### 4.1 Semantic HTML and CSS

The website uses semantic HTML5 elements to improve readability, structure, and accessibility.

Used semantic elements include:

* `<header>`
* `<nav>`
* `<main>`
* `<section>`
* `<article>`
* `<footer>`

The design is responsive and adapts to different screen sizes. CSS Flexbox and CSS Grid are used for layout management.

The project includes:

* Responsive navigation bar
* Hero section
* About section
* Skills section
* Projects section
* Experience section
* Contact section
* Footer
* Admin panel tables and forms

An external stylesheet is used:

```text
assets/css/style.css
```

This file controls the complete visual appearance of the website, including colors, spacing, typography, buttons, cards, tables, forms, and responsive behavior.

---

### 4.2 JavaScript and DOM Manipulation

All client-side JavaScript is written in:

```text
assets/js/main.js
```

JavaScript is used for several interactive features.

#### Dark Mode Toggle

The website includes a dark mode button. When the user clicks the button, JavaScript adds or removes the `dark-mode` class from the `<body>` element.

The selected theme is saved in a cookie, so the website remembers the user's preference when the page is opened again.

#### Mobile Menu

A mobile menu button is used for smaller screens. JavaScript toggles the navigation menu by adding or removing an active class.

#### Project Filtering

Project filter buttons allow users to filter projects by category.

Categories include:

* All
* Web
* Database
* AI
* Network

JavaScript listens to button clicks and dynamically displays only the projects that match the selected category.

#### Contact Form Validation

Before the contact form is submitted, JavaScript validates the form fields.

The validation checks:

* Name is required
* Email is required
* Email format must be valid
* Subject is required
* Message is required

If there is an error, JavaScript displays an error message under the related input field.

---

### 4.3 PHP Backend and MySQL Database

PHP is used for backend logic and communication with the MySQL database.

The database connection is created in:

```text
config/db.php
```

The project uses PDO for database connection:

```php
$conn = new PDO(
    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
    $username,
    $password
);
```

PDO is preferred because it supports prepared statements and helps reduce SQL injection risks.

#### Contact Form Backend

The contact form data is sent to:

```text
api/contact_submit.php
```

This file receives the form data using the POST method, validates the data on the server side, and inserts the message into the `messages` table.

#### Dynamic Projects Backend

The projects displayed on the homepage are loaded from the MySQL database.

The file responsible for this operation is:

```text
api/get_projects.php
```

This file selects project records from the `projects` table and returns them as JSON.

---

### 4.4 AJAX Integration

AJAX is implemented using the JavaScript Fetch API.

The project uses AJAX in two important parts.

#### Loading Projects

Projects are not written statically in HTML. Instead, they are stored in the MySQL database and loaded dynamically using Fetch API.

JavaScript sends a request to:

```text
api/get_projects.php
```

The PHP file returns project data as JSON. Then JavaScript creates project cards dynamically and inserts them into the page using DOM manipulation.

This allows projects to be loaded without refreshing the page.

#### Submitting Contact Form

The contact form is also submitted asynchronously.

JavaScript sends form data to:

```text
api/contact_submit.php
```

The page does not fully reload after submission. Instead, the user receives a success or error message dynamically.

This improves the user experience and demonstrates AJAX integration.

---

### 4.5 Admin Dashboard and State Management

The project includes a basic admin login system and admin dashboard.

#### Admin Login

The admin login page is:

```text
admin/login.php
```

The default admin account is:

```text
Username: admin
Password: admin123
```

When the admin submits the login form, PHP checks the username in the `admins` table. The password is verified using:

```php
password_verify()
```

If the login is successful, PHP creates session variables:

```php
$_SESSION["admin_id"]
$_SESSION["admin_username"]
```

#### Session Protection

Admin pages are protected with PHP sessions. If a user tries to access the dashboard without logging in, they are redirected to the login page.

Example session check:

```php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}
```

#### Admin Dashboard Features

The admin dashboard allows the admin to:

* View all projects
* Add a new project
* Edit an existing project
* Delete a project
* View contact messages

Related files:

```text
admin/dashboard.php
admin/add_project.php
admin/edit_project.php
admin/delete_project.php
```

#### Cookie Usage

Cookies are used to store the dark mode preference. This provides basic persistence for the user's interface preference.

---

## 5. Database Design

The project uses a MySQL database named:

```text
portfolio_db
```

The database contains three main tables:

```text
admins
projects
messages
```

---

### 5.1 admins Table

The `admins` table stores admin login information.

| Column       | Type                             | Description           |
| ------------ | -------------------------------- | --------------------- |
| `id`         | INT, AUTO_INCREMENT, PRIMARY KEY | Unique admin ID       |
| `username`   | VARCHAR(100)                     | Admin username        |
| `password`   | VARCHAR(255)                     | Hashed admin password |
| `created_at` | TIMESTAMP                        | Record creation time  |

The password is stored as a hashed value, not as plain text.

---

### 5.2 projects Table

The `projects` table stores portfolio project information.

| Column           | Type                             | Description                      |
| ---------------- | -------------------------------- | -------------------------------- |
| `id`             | INT, AUTO_INCREMENT, PRIMARY KEY | Unique project ID                |
| `title`          | VARCHAR(150)                     | Project title                    |
| `category`       | VARCHAR(50)                      | Project category                 |
| `description`    | TEXT                             | Project description              |
| `technologies`   | VARCHAR(255)                     | Technologies used in the project |
| `github_link`    | VARCHAR(255)                     | GitHub repository link           |
| `live_demo_link` | VARCHAR(255)                     | Live demo link                   |
| `created_at`     | TIMESTAMP                        | Record creation time             |

Projects displayed on the homepage are fetched from this table.

---

### 5.3 messages Table

The `messages` table stores contact form submissions.

| Column       | Type                             | Description             |
| ------------ | -------------------------------- | ----------------------- |
| `id`         | INT, AUTO_INCREMENT, PRIMARY KEY | Unique message ID       |
| `name`       | VARCHAR(100)                     | Sender's name           |
| `email`      | VARCHAR(150)                     | Sender's email address  |
| `subject`    | VARCHAR(150)                     | Message subject         |
| `message`    | TEXT                             | Message content         |
| `created_at` | TIMESTAMP                        | Message submission time |

When a visitor submits the contact form, the message is saved into this table.

---

## 6. Security Measures

The project includes several basic security practices.

### 6.1 Prepared Statements

All database operations use PDO prepared statements. This helps prevent SQL injection attacks.

Example:

```php
$sql = "INSERT INTO messages (name, email, subject, message)
        VALUES (:name, :email, :subject, :message)";
$stmt = $conn->prepare($sql);
```

### 6.2 Password Hashing

The admin password is stored as a hashed value in the database.

During login, the entered password is checked with:

```php
password_verify()
```

This prevents storing plain-text passwords.

### 6.3 Session-Based Protection

Admin pages can only be accessed after a successful login.

If the admin session does not exist, the user is redirected to the login page.

### 6.4 Output Escaping

Database content displayed in the admin panel is printed using:

```php
htmlspecialchars()
```

This helps prevent unsafe HTML output.

### 6.5 Client-Side and Server-Side Validation

The contact form is validated twice:

* On the client side with JavaScript
* On the server side with PHP

This improves reliability and prevents invalid data from being saved.

---

## 7. Testing

The project was tested locally using XAMPP.

### 7.1 Frontend Testing

The following frontend features were tested:

| Feature                       | Result |
| ----------------------------- | ------ |
| Homepage opens correctly      | Passed |
| Responsive layout works       | Passed |
| Navigation links work         | Passed |
| Mobile menu opens and closes  | Passed |
| Dark mode toggle works        | Passed |
| Project filter buttons work   | Passed |
| Contact form validation works | Passed |

---

### 7.2 Backend Testing

The following backend features were tested:

| Feature                                     | Result |
| ------------------------------------------- | ------ |
| Database connection works                   | Passed |
| Projects are fetched from database          | Passed |
| Contact form messages are saved to database | Passed |
| Admin login works                           | Passed |
| Admin session protection works              | Passed |
| Admin dashboard opens after login           | Passed |
| Project add operation works                 | Passed |
| Project edit operation works                | Passed |
| Project delete operation works              | Passed |
| Logout works                                | Passed |

---

### 7.3 Database Testing

The database was tested using phpMyAdmin.

The following tables were checked:

```text
admins
projects
messages
```

Inserted projects appeared on the portfolio homepage. Contact form submissions appeared in the `messages` table.

---

## 8. Challenges and Solutions

| Challenge                    | Solution                                                                   |
| ---------------------------- | -------------------------------------------------------------------------- |
| Connecting PHP to MySQL      | A separate `config/db.php` file was created using PDO                      |
| Loading projects dynamically | `api/get_projects.php` was created and Fetch API was used                  |
| Saving contact form messages | `api/contact_submit.php` was created and connected to the `messages` table |
| Protecting admin pages       | PHP sessions were used to restrict access                                  |
| Remembering dark mode        | Cookies were used to store the selected theme                              |
| Preventing SQL injection     | Prepared statements were used in SQL operations                            |
| Making the layout responsive | CSS Grid, Flexbox, and media queries were used                             |

---

## 9. Conclusion

This project successfully demonstrates the development of a full-stack web portfolio using HTML5, CSS3, JavaScript, PHP, and MySQL.

The project includes a responsive frontend, JavaScript interactivity, AJAX integration, PHP backend logic, MySQL database operations, contact form management, admin login system, session control, cookie usage, and CRUD operations for projects.

The portfolio is both an academic final project and a professional career asset. It can be improved in the future by adding more advanced features such as blog management, image upload, advanced admin roles, and deployment improvements.

Overall, this project helped improve understanding of full-stack web development, database-driven applications, and the connection between frontend and backend technologies.

---

*Report prepared by Neriman Akça — Haliç Üniversitesi, 2026*
