<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up / Sign In</title>
    <link rel="icon" href="../assets/images/fitzone-logo.png" type="image/png" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Add Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #1c1c1c;
            color: white;
            font-family: 'Segoe UI', sans-serif;
            background-image: url('../assets/images/login-bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        /* Form Container */
        .form-container {
            background-color: rgba(0, 0, 0, 0.85);
            padding: 2rem;
            padding-top: 2rem;
            padding-bottom: 3rem;
            border-radius: 1rem;
            width: 100%;
            max-width: 850px;
        }

        /* Form Wrapper */
        .form-wrapper {
            display: none;
        }

        .form-wrapper.active {
            display: block;
        }

        .login-title {
            font-family: Montserrat Alternates, sans-serif;
        }

        .modal {
            position: fixed;
            inset: 0;
            /* shorthand for top: 0; right: 0; bottom: 0; left: 0; */
            background-color: rgba(0, 0, 0, 0.5);
            /* dark overlay */
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .modal.active {
            display: flex;
            /* This is crucial */
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            min-width: 300px;
            text-align: center;
        }
    </style>
</head>

<body onload="toggleAuth('signup')">
    <?php
    require_once "../includes/db.php";
    ?>
    <div class="form-container">
        <!-- Sign Up Form -->
        <div id="signup" class="form-wrapper active">

            <h1 class="text-center mb-4 login-title">Be a Member</h1>
            <form onsubmit="validateSignUp(event)">

                <div class="row g-4 mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label login-title">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="John" maxlength="30" required />
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label login-title">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Doe" maxlength="30" required />
                    </div>
                    <div class="col-md-6">
                        <label for="emailSignUp" class="form-label login-title">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="emailSignUp"
                            placeholder="john@example.com"
                            required
                            pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                            title="Please enter a valid email address like john@example.com" />
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label login-title">Contact Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="07XXXXXXXX" pattern="^07[01245678][0-9]{7}$" required />
                    </div>
                    <div class="col-md-6">
                        <label for="passwordSignUp" class="form-label login-title">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="passwordSignUp" minlength="5" maxlength="15" required />
                            <span class="input-group-text" id="togglePasswordSignUp" style="cursor: pointer;">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="confirmPassword" class="form-label login-title">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirmPassword" minlength="5" maxlength="15" required />
                            <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="text-danger d-none" id="passwordMismatch">Passwords do not match.</div>
                <div class="d-grid mt-4">
                    <button type="submit" id="register_btn" class="btn btn-warning btn-rounded login-title fw-bold" data-mdb-ripple-init>Register</button>
                </div>
            </form>
            <div class="text-center mt-4 login-title">
                <a href="#" onclick="toggleAuth('signin')" class="link-light">Already a member? Log in</a>
            </div>
        </div>

        <div id="verificationModal" class="modal">
            <div class="modal-content w-25">
                <span class="close" onclick="closeVerificationModal()">&times;</span>
                <h2 class="text-black">Email Verification</h2>
                <p class="text-black">Verification code sent to: <span id="modalEmail"></span></p>
                <input type="text" id="verificationCodeInput" class="form-control bg-white text-black border" placeholder="Enter code">
                <button onclick="verifyCode()" class="btn btn-warning mt-2">Verify</button>
                <div id="codeError" class="hidden alert-danger"></div>
            </div>
        </div>

        <!-- Sign In Form -->
        <div id="signin" class="form-wrapper">
            <h1 class="text-center mb-4 login-title">Welcome back!</h1>

            <?php

            $email = "";
            $password = "";

            if (isset($_COOKIE["email"])) {
                $email = $_COOKIE["email"];
            }

            if (isset($_COOKIE["password"])) {
                $password = $_COOKIE["password"];
            }

            ?>
            <form>
                <div class="mb-3">
                    <label for="emailSignIn" class="form-label login-title">Email</label>
                    <input type="email" class="form-control" id="emailSignIn" placeholder="john@example.com" value="<?php echo $email; ?>" required />
                </div>
                <div class="mb-3">
                    <label for="passwordSignIn" class="form-label login-title">Password</label>
                    <div class="input-group">
                        <input type="password" value="<?php echo $password; ?>" class="form-control" id="passwordSignIn" minlength="5" maxlength="15" required />
                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                            <i class="fas fa-eye-slash" id="eyeIcon"></i> <!-- Eye-slash icon by default -->
                        </span>
                    </div>
                </div>

                <div class="row justify-content-between align-items-center mb-4">
                    <div class="col-auto">
                        <input class="form-check-input" type="checkbox" id="rememberMe" checked />
                        <label class="form-check-label login-title" for="rememberMe">Remember me</label>
                    </div>
                    <div class="col-auto">
                        <a href="#" class="link-light text-decoration-underline login-title">Forgot password?</a>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-warning login-title fw-bold" onclick="signIn(event)">Log In</button>
                </div>
            </form>
            <div class="text-center mt-4 login-title">
                <a href="#" onclick="toggleAuth('signup')" class="link-light">Not a member? Join now</a>
            </div>
        </div>
    </div>




    <script src="../assets/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle visibility for passwordSignUp
        document.getElementById('togglePasswordSignUp').addEventListener('click', function() {
            const passwordField = document.getElementById('passwordSignUp');
            const icon = this.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordField = document.getElementById('confirmPassword');
            const icon = this.querySelector('i');

            if (confirmPasswordField.type === 'password') {
                confirmPasswordField.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                confirmPasswordField.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });

        document.getElementById("togglePassword").addEventListener("click", function() {
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
    </script>

</body>

</html>