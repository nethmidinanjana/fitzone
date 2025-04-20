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

// Register/ Sign Up
function validateSignUp(event) {
    event.preventDefault();

    const registerBtn = document.getElementById("register_btn");
    const originalBtnText = registerBtn.innerHTML;

    registerBtn.disabled = true;
    registerBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Registering...`;

    const password = document.getElementById("passwordSignUp").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const mismatchText = document.getElementById("passwordMismatch");

    if (password !== confirmPassword) {
        mismatchText.classList.remove("d-none");

        registerBtn.disabled = false;
        registerBtn.innerHTML = originalBtnText;
        return;
    } else {
        mismatchText.classList.add("d-none");

        const first_name = document.getElementById("firstName").value;
        const last_name = document.getElementById("lastName").value;
        const email = document.getElementById("emailSignUp").value;
        const phone = document.getElementById("phone").value;

        const form = new FormData();
        form.append("first_name", first_name);
        form.append("last_name", last_name);
        form.append("email", email);
        form.append("phone", phone);
        form.append("password", password);

        const request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState === 4) {
                const response = request.responseText.trim();
                console.log("Server response:", response);

                // Restore the button state
                registerBtn.disabled = false;
                registerBtn.innerHTML = originalBtnText;

                if (response === "success") {
                    openVerificationModal(email);
                } else {
                    alert(response);
                }
            }
        }

        request.open("POST", "/fitzone/process/signUpProcess.php", true);
        request.send(form);
    }
}


function openVerificationModal(email) {

    const modal = document.getElementById("verificationModal");

    if (!modal) {
        alert("Modal element not found!");
        return;
    }

    document.getElementById("modalEmail").innerText = email;

    modal.classList.add("active");

    const input = document.getElementById("verificationCodeInput");
    if (input) input.focus();
}


function verifyCode() {
    const email = document.getElementById("modalEmail").innerText;
    const code = document.getElementById("verificationCodeInput").value;

    const form = new FormData();
    form.append("email", email);
    form.append("code", code);

    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            const response = request.responseText.trim();
            console.log(response);
            if (response === "verified") {
                alert("Email verified! You can now log in.");
                document.getElementById("verificationModal").classList.remove("active");

                toggleAuth("signin");
                document.getElementById("firstName").value = "";
                document.getElementById("lastName").value = "";
                document.getElementById("emailSignUp").value = "";
                document.getElementById("phone").value = "";
                document.getElementById("passwordSignUp").value = "";
                document.getElementById("confirmPassword").value = "";

            } else {
                alert("Invalid verification code.");
            }
        }
    };

    request.open("POST", "/fitzone/process/verifyEmail.php", true);
    request.send(form);
}

// Sign In/Log In
document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordField = document.getElementById("passwordSignIn");
    const eyeIcon = document.getElementById("eyeIcon");

    // Toggle password visibility
    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    }
});


function signIn(event) {
    event.preventDefault();
    var email = document.getElementById("emailSignIn");
    var password = document.getElementById("passwordSignIn");
    var rememberme = document.getElementById("rememberMe");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            // If the response is success and the role is returned
            if (t === "customer") {
                window.location.href = "/fitzone/pages/profile.php"; // Redirect to profile for customer
            } else if (t === "staff" || t === "admin") {
                window.location.href = "/fitzone/admin/dashboard.php"; // Redirect to admin dashboard for staff/admin
            } else if (t === "Invalid username or password") {
                alert(t); 
            }
        }
    }

    r.open("POST", "/fitzone/process/signInProcess.php", true);
    r.send(f);

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
