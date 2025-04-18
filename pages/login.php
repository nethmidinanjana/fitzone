<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up / Sign In</title>
    <link rel="icon" href="../assets/images/fitzone-logo.png" type="image/png" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

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
    </style>
</head>

<body onload="toggleAuth('signup')">

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
                        <input type="email" class="form-control" id="emailSignUp" placeholder="john@example.com" required />
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label login-title">Contact Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="07XXXXXXXX" pattern="^07[01245678][0-9]{7}$" required />
                    </div>
                    <div class="col-md-6">
                        <label for="passwordSignUp" class="form-label login-title">Password</label>
                        <input type="password" class="form-control" id="passwordSignUp" minlength="5" maxlength="15" required />
                    </div>
                    <div class="col-md-6">
                        <label for="confirmPassword" class="form-label login-title">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" minlength="5" maxlength="15" required />
                    </div>
                </div>
                <div class="text-danger d-none" id="passwordMismatch">Passwords do not match.</div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-warning btn-rounded login-title fw-bold" data-mdb-ripple-init>Register</button>
                </div>
            </form>
            <div class="text-center mt-4 login-title">
                <a href="#" onclick="toggleAuth('signin')" class="link-light">Already a member? Log in</a>
            </div>
        </div>

        <!-- Sign In Form -->
        <div id="signin" class="form-wrapper">
            <h1 class="text-center mb-4 login-title">Welcome back!</h1>

            <form>
                <div class="mb-3">
                    <label for="emailSignIn" class="form-label login-title">Email</label>
                    <input type="email" class="form-control" id="emailSignIn" placeholder="john@example.com" required />
                </div>
                <div class="mb-3">
                    <label for="passwordSignIn" class="form-label login-title">Password</label>
                    <input type="password" class="form-control" id="passwordSignIn" minlength="5" maxlength="15" required />
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
                    <button type="submit" class="btn btn-warning login-title fw-bold">Log In</button>
                </div>
            </form>
            <div class="text-center mt-4 login-title">
                <a href="#" onclick="toggleAuth('signup')" class="link-light">Not a member? Join now</a>
            </div>
        </div>
    </div>

    <script src="../assets/js/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>