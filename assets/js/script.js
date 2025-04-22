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
            } else {
                console.log(t);
                alert(t);
            }
        }
    }

    r.open("POST", "/fitzone/process/signInProcess.php", true);
    r.send(f);

}

// Login page: End

// Profile page: Start

document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("custom-toggle-btn");
    const sidebar = document.getElementById("custom-sidebar");
    const wrapper = document.getElementById("custom-wrapper");
    const links = document.querySelectorAll(".custom-sidebar-link");
    const sections = document.querySelectorAll(".custom-section");

    if (!sidebar || !wrapper) return;

    // Sidebar toggle
    if (toggleBtn) {
        toggleBtn.addEventListener("click", () => {
            sidebar.classList.toggle("show");
            wrapper.classList.toggle("overlay");
        });
    }

    // Close sidebar on clicking outside
    wrapper.addEventListener("click", (e) => {
        if (wrapper.classList.contains("overlay") && !sidebar.contains(e.target) && e.target !== toggleBtn) {
            sidebar.classList.remove("show");
            wrapper.classList.remove("overlay");
        }
    });

    // Restore section from localStorage
    const savedSection = localStorage.getItem("activeSection") || "profile";

    // Show saved section
    sections.forEach(section => {
        section.classList.toggle("d-none", section.id !== savedSection);
    });

    // Highlight correct nav link
    links.forEach(link => {
        const linkSection = link.getAttribute("data-section");
        link.classList.toggle("active", linkSection === savedSection);
    });

    // Section switching logic
    links.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();

            const targetId = link.getAttribute("data-section");

            // Hide all sections and show the target one
            sections.forEach(section => {
                section.classList.toggle("d-none", section.id !== targetId);
            });

            // Update active link
            links.forEach(l => l.classList.remove("active"));
            link.classList.add("active");

            // Save selected section
            localStorage.setItem("activeSection", targetId);

            // Close sidebar on small screens
            if (window.innerWidth < 768) {
                sidebar.classList.remove("show");
                wrapper.classList.remove("overlay");
            }
        });
    });
});


function activateMembership(user_id) {

    const depositSlip = document.getElementById("depositSlip");
    const membershipPlan = document.getElementById("membershipPlan");

    const file = depositSlip.files[0];

    if (!file) {
        alert("Please upload a deposit slip.");
        return;
    }

    if (!file.type.startsWith("image/")) {
        alert("Only image files are allowed.");
        return;
    }

    if (!membershipPlan.value) {
        alert("Please select a membership plan.");
        return;
    }

    var form = new FormData();
    form.append("depositSlip", file);
    form.append("membershipPlan", membershipPlan.value);
    form.append("user_id", user_id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText.trim();
            if (t == "success") {
                window.location.reload();
            } else {
                console.log(t);
                alert(t);
            }
        }
    };

    r.open("POST", "/fitzone/process/activateMembership.php", true);
    r.send(form);
}

function UpdateProfile(user_id) {


    const gender = document.getElementById("gender");
    const birthday = document.getElementById("birthday");
    const weight = document.getElementById("weight");
    const height = document.getElementById("height");

    console.log(gender);
    console.log(birthday);
    console.log(weight);
    console.log(height);


    // Weight and height validations (optional)
    if (!weight.value || isNaN(weight.value) || weight.value <= 0) {
        alert("Please enter a valid weight.");
        return;
    }

    if (!height.value || isNaN(height.value) || height.value <= 0) {
        alert("Please enter a valid height.");
        return;
    }

    var form = new FormData();

    // Only send gender if it's not disabled
    if (!gender.disabled && gender.value) {
        form.append("gender", gender.value);
    }

    // Only send birthday if it's not disabled
    if (!birthday.disabled && birthday.value) {
        form.append("birthday", birthday.value);
    }

    form.append("weight", weight.value);
    form.append("height", height.value);
    form.append("user_id", user_id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText.trim();
            if (t == "success") {
                window.location.reload();
            } else {
                console.log(t);
                alert(t);
            }
        }
    };

    r.open("POST", "/fitzone/process/updateProfile.php", true); // Make sure path is correct
    r.send(form);
}

function registerForClass(user_id) {

    const depositSlip = document.getElementById("classFeeDepositSlip");
    const selectedClass = document.querySelector('input[name="selectedClass"]:checked');

    const file = depositSlip.files[0];

    if (!file) {
        alert("Please upload a deposit slip.");
        return;
    }

    if (!file.type.startsWith("image/")) {
        alert("Only image files are allowed.");
        return;
    }

    if (!selectedClass) {
        alert("Please select a class.");
        return;
    } else {
        const classId = selectedClass.value;

        const form = new FormData();
        form.append("depositSlip", file);
        form.append("classId", classId);
        form.append("user_id", user_id);

        const r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState === 4) {
                const t = r.responseText.trim();
                if (t === "success") {
                    alert("Class registration request submitted!");
                    window.location.reload();
                } else {
                    console.log(t);
                    alert(t);
                }
            }
        };

        r.open("POST", "/fitzone/process/registerClass.php", true);
        r.send(form);
    }
}

function sendInquiry(user_id) {
    const inquiryMessage = document.getElementById("inquiryMessage").value;

    const form = new FormData();
    form.append("inquiryMessage", inquiryMessage);
    form.append("user_id", user_id);

    const r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState === 4) {
            const t = r.responseText.trim();
            if (t === "success") {
                alert("Inquiry submitted!");
                window.location.reload();
            } else {
                console.log(t);
                alert(t);
            }
        }
    };

    r.open("POST", "/fitzone/process/sendInquiry.php", true);
    r.send(form);
}


function logout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            }
        }
    }

    r.open("GET", "/fitzone/process/logOutProccess.php", true);
    r.send();
}

// Profile Page: End

// Admin dashboard: Start

function blockOrUnblockUser(user_id, btnElement) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            const res = xhr.responseText.trim();

            if (res === "2" || res === "3") {
                btnElement.textContent = (res === "3") ? "Unblock" : "Block";
            } else {
                alert("Something went wrong.");
                console.log(res);
            }
        }
    };

    xhr.open("GET", "/fitzone/process/blockOrUnblockUserProccess.php?user_id=" + user_id, true);
    xhr.send();
}

function handleMembershipAction(action, userId, membId) {
    const confirmMsg = `Are you sure you want to ${action} this membership request?`;
    if (!confirm(confirmMsg)) return;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/fitzone/process/membershipActionProcess.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            const res = xhr.responseText.trim();
            if (res === "success") {
                alert(`Membership updated successfully!`);
                location.reload();
            } else {
                alert("Something went wrong");
                console.log(res);
            }
        }
    };

    xhr.send(`action=${action}&user_id=${userId}&memb_id=${membId}`);
}

function handleClassReqAction(action, userId, classId) {

    const confirmMsg = `Are you sure you want to ${action} this class request?`;
    if (!confirm(confirmMsg)) return;

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/fitzone/process/classReqActionProcess.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            const res = xhr.responseText.trim();
            if (res === "success") {
                alert(`Class request updated successfully!`);
                location.reload();
            } else {
                alert("Something went wrong");
                console.log(res);
            }
        }
    };

    xhr.send(`action=${action}&user_id=${userId}&classId=${classId}`);
}

let currentInquiryId = null;

function openReplyModal(inquiryId) {
    document.getElementById("inquiryId").value = inquiryId;
    document.getElementById("replyMessage").value = ""; // optional: clear textarea
    new bootstrap.Modal(document.getElementById("replyModal")).show();
}


function sendReply() {
    const replyMsg = document.getElementById("replyMessage").value.trim();
    const inquiryId = document.getElementById("inquiryId").value;

    if (!replyMsg) {
        alert("Please type a reply message.");
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/fitzone/process/replyInquiryProcess.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status === 200) {
            if (xhr.responseText.trim() === "success") {
                alert("Reply sent successfully!");
                location.reload(); // Refresh to reflect updated status
            } else {
                alert("Failed to send reply: " + xhr.responseText);
            }
        }
    };

    // Send both reply and inquiryId to PHP
    xhr.send(`inquiry_id=${encodeURIComponent(inquiryId)}&reply=${encodeURIComponent(replyMsg)}`);
}




// Admin dashboard: End
