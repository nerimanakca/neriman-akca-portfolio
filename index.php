<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Neriman Akça | Software Engineering Portfolio</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- HEADER / NAVBAR -->
    <header class="header">
        <nav class="navbar">

            <div class="logo">
                Neriman<span>Akça</span>
            </div>

            <ul class="nav-links" id="navLinks">
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#experience">Experience</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>

            <div class="nav-actions">
                <button id="darkModeBtn" class="theme-btn">🌙</button>
                <button id="menuBtn" class="menu-btn">☰</button>
            </div>

        </nav>
    </header>

    <!-- HERO SECTION -->
    <main>

        <section id="home" class="hero section">
            <div class="hero-content">
                <p class="hero-subtitle">Software Engineering Student</p>

                <h1>
                    Hi, I'm <span>Neriman Akça</span>
                </h1>

                <p class="hero-description">
                    I design and develop modern, responsive and user-friendly web applications.
                    This portfolio showcases my academic projects, technical skills and software development journey.
                </p>

                <div class="hero-buttons">
                    <a href="#projects" class="btn primary-btn">View Projects</a>
                    <a href="#contact" class="btn secondary-btn">Contact Me</a>
                </div>
            </div>

            <div class="hero-card">
                <div class="profile-circle">
                    NA
                </div>

                <h2>Full-Stack Portfolio</h2>
                <p>HTML • CSS • JavaScript • PHP • MySQL</p>
            </div>
        </section>

        <!-- ABOUT SECTION -->
        <section id="about" class="about section">
            <h2 class="section-title">About Me</h2>

            <div class="about-container">
                <div class="about-text">
                    <p>
                        I am a Software Engineering student interested in web development,
                        mobile applications, database systems and artificial intelligence.
                        I enjoy building practical projects that combine clean design with functional backend systems.
                    </p>

                    <p>
                        This portfolio is developed as a full-stack web application using HTML5,
                        CSS3, JavaScript, PHP and MySQL.
                    </p>
                </div>

                <table class="info-table">
                    <tr>
                        <th>Name</th>
                        <td>Neriman Akça</td>
                    </tr>

                    <tr>
                        <th>Field</th>
                        <td>Software Engineering</td>
                    </tr>

                    <tr>
                        <th>Focus</th>
                        <td>Web Development, Databases, AI</td>
                    </tr>

                    <tr>
                        <th>Technologies</th>
                        <td>HTML, CSS, JS, PHP, MySQL</td>
                    </tr>
                </table>
            </div>
        </section>

        <!-- SKILLS SECTION -->
        <section id="skills" class="skills section">
            <h2 class="section-title">Skills</h2>

            <div class="skills-grid">

                <article class="skill-card">
                    <h3>Frontend</h3>
                    <p>HTML5, CSS3, JavaScript, Responsive Design</p>
                </article>

                <article class="skill-card">
                    <h3>Backend</h3>
                    <p>PHP, MySQL, Sessions, Cookies</p>
                </article>

                <article class="skill-card">
                    <h3>Database</h3>
                    <p>MySQL, SQL Queries, CRUD Operations</p>
                </article>

                <article class="skill-card">
                    <h3>Tools</h3>
                    <p>GitHub, VS Code, XAMPP, phpMyAdmin</p>
                </article>

            </div>
        </section>

        <!-- PROJECTS SECTION -->
        <section id="projects" class="projects section">
            <h2 class="section-title">Projects</h2>

            <div class="project-filters">
                <button class="filter-btn active" data-category="all">All</button>
                <button class="filter-btn" data-category="web">Web</button>
                <button class="filter-btn" data-category="database">Database</button>
                <button class="filter-btn" data-category="ai">AI</button>
            </div>

            <div class="projects-grid" id="projectsGrid">
                <p>Loading projects...</p>
            </div>
        </section>

        <!-- EXPERIENCE SECTION -->
        <section id="experience" class="experience section">
            <h2 class="section-title">Experience / Blog</h2>

            <div class="timeline">

                <article class="timeline-item">
                    <h3>Software Engineering Education</h3>
                    <p>
                        Gaining academic and practical experience in programming, algorithms,
                        databases, computer networks and software architecture.
                    </p>
                </article>

                <article class="timeline-item">
                    <h3>Web Development Practice</h3>
                    <p>
                        Developing responsive websites and full-stack applications using modern web technologies.
                    </p>
                </article>

            </div>
        </section>

        <!-- CONTACT SECTION -->
        <section id="contact" class="contact section">
            <h2 class="section-title">Contact Me</h2>

            <form class="contact-form" id="contactForm">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name">
                    <small class="error-message"></small>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your email">
                    <small class="error-message"></small>
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Message subject">
                    <small class="error-message"></small>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Your message"></textarea>
                    <small class="error-message"></small>
                </div>

                <button type="submit" class="btn primary-btn">Send Message</button>

                <p id="formStatus" class="form-status"></p>

            </form>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <p>© 2026 Neriman Akça. All rights reserved.</p>
        <a href="admin/login.php">Admin Login</a>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>