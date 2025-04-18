// Login page: Start

function toggleAuth(formId) {
    const signupForm = document.getElementById("signup");
    const signinForm = document.getElementById("signin");

    if (formId === "signup") {
        signupForm.classList.add("active");
        signinForm.classList.remove("active");
    } else {
        signinForm.classList.add("active");
        signupForm.classList.remove("active");
    }
}

function validateSignUp(event) {
    event.preventDefault();

    const password = document.getElementById("passwordSignUp").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const mismatchText = document.getElementById("passwordMismatch");

    if (password !== confirmPassword) {
        mismatchText.classList.remove("d-none");
    } else {
        mismatchText.classList.add("d-none");
        alert("Form submitted successfully!");
        // Add your backend submission logic here
    }
}

// Login page: End

// Profile Page: Start

const toggleBtn = document.getElementById("custom-toggle-btn");
const sidebar = document.getElementById("custom-sidebar");
const wrapper = document.getElementById("custom-wrapper");
const links = document.querySelectorAll(".custom-sidebar-link");
const sections = document.querySelectorAll(".custom-section");

// Open sidebar
toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("show");
    wrapper.classList.toggle("overlay");
});

// Close sidebar if clicking outside of it
wrapper.addEventListener("click", (e) => {
    if (wrapper.classList.contains("overlay") && !sidebar.contains(e.target) && e.target !== toggleBtn) {
        sidebar.classList.remove("show");
        wrapper.classList.remove("overlay");
    }
});

// Section switching logic
links.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();

        const targetId = link.getAttribute("data-section");

        // Hide all sections
        sections.forEach(section => section.classList.add("d-none"));

        // Show selected section
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.classList.remove("d-none");
        }

        // Collapse sidebar on small screens
        if (window.innerWidth < 768) {
            sidebar.classList.remove("show");
            wrapper.classList.remove("overlay");
        }
    });
});

// Profile Page: End
