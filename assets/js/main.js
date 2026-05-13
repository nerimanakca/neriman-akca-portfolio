// Mobile menu toggle
const menuBtn = document.getElementById("menuBtn");
const navLinks = document.getElementById("navLinks");

menuBtn.addEventListener("click", function () {
    navLinks.classList.toggle("active");
});


// Dark mode toggle with cookie
const darkModeBtn = document.getElementById("darkModeBtn");

darkModeBtn.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
        document.cookie = "theme=dark; path=/; max-age=2592000";
        darkModeBtn.textContent = "☀️";
    } else {
        document.cookie = "theme=light; path=/; max-age=2592000";
        darkModeBtn.textContent = "🌙";
    }
});


// Read cookie function
function getCookie(name) {
    let cookies = document.cookie.split(";");

    for (let cookie of cookies) {
        let [key, value] = cookie.trim().split("=");

        if (key === name) {
            return value;
        }
    }

    return "";
}


// Apply saved theme on page load
window.addEventListener("load", function () {
    const savedTheme = getCookie("theme");

    if (savedTheme === "dark") {
        document.body.classList.add("dark-mode");
        darkModeBtn.textContent = "☀️";
    }
});


// Load projects from MySQL database using Fetch API
const projectsGrid = document.getElementById("projectsGrid");
const filterButtons = document.querySelectorAll(".filter-btn");

let allProjects = [];

async function loadProjects() {
    try {
        const response = await fetch("api/get_projects.php");
        const data = await response.json();

        if (data.status === "success") {
            allProjects = data.projects;
            displayProjects(allProjects);
        } else {
            projectsGrid.innerHTML = "<p>Projects could not be loaded.</p>";
        }

    } catch (error) {
        projectsGrid.innerHTML = "<p>An error occurred while loading projects.</p>";
    }
}

function displayProjects(projects) {
    projectsGrid.innerHTML = "";

    if (projects.length === 0) {
        projectsGrid.innerHTML = "<p>No projects found.</p>";
        return;
    }

    projects.forEach(function (project) {
        const card = document.createElement("article");

        card.className = "project-card";
        card.setAttribute("data-category", project.category);

        card.innerHTML = `
            <h3>${project.title}</h3>
            <p>${project.description}</p>
            <span>${project.technologies}</span>

            <div class="project-links">
                <a href="${project.github_link}" target="_blank">GitHub</a>
                <a href="${project.live_demo_link}" target="_blank">Live Demo</a>
            </div>
        `;

        projectsGrid.appendChild(card);
    });
}

// Project filter system
filterButtons.forEach(function (button) {
    button.addEventListener("click", function () {

        filterButtons.forEach(function (btn) {
            btn.classList.remove("active");
        });

        button.classList.add("active");

        const category = button.getAttribute("data-category");

        if (category === "all") {
            displayProjects(allProjects);
        } else {
            const filteredProjects = allProjects.filter(function (project) {
                return project.category === category;
            });

            displayProjects(filteredProjects);
        }

    });
});

// Load projects when page opens
loadProjects();


// Contact form validation
const contactForm = document.getElementById("contactForm");
const formStatus = document.getElementById("formStatus");

contactForm.addEventListener("submit", function (event) {
    event.preventDefault();

    let isValid = true;

    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const subject = document.getElementById("subject");
    const message = document.getElementById("message");

    clearErrors();

    if (name.value.trim() === "") {
        showError(name, "Name is required.");
        isValid = false;
    }

    if (email.value.trim() === "") {
        showError(email, "Email is required.");
        isValid = false;
    } else if (!validateEmail(email.value.trim())) {
        showError(email, "Please enter a valid email address.");
        isValid = false;
    }

    if (subject.value.trim() === "") {
        showError(subject, "Subject is required.");
        isValid = false;
    }

    if (message.value.trim() === "") {
        showError(message, "Message is required.");
        isValid = false;
    }

    if (isValid) {
    const formData = new FormData(contactForm);

    fetch("api/contact_submit.php", {
        method: "POST",
        body: formData
    })
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        if (data.status === "success") {
            formStatus.style.color = "green";
            formStatus.textContent = data.message;
            contactForm.reset();
        } else {
            formStatus.style.color = "red";
            formStatus.textContent = data.message;
        }
    })
    .catch(function () {
        formStatus.style.color = "red";
        formStatus.textContent = "An error occurred. Please try again.";
    });
}
});


// Show error under input
function showError(input, message) {
    const formGroup = input.parentElement;
    const errorMessage = formGroup.querySelector(".error-message");

    errorMessage.textContent = message;
}


// Clear all error messages
function clearErrors() {
    const errors = document.querySelectorAll(".error-message");

    errors.forEach(function (error) {
        error.textContent = "";
    });

    formStatus.textContent = "";
}


// Email validation
function validateEmail(email) {
    const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
}