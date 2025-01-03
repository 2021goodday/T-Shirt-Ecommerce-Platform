<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/ecommerce/public/css/auth-style.css">
    <link rel="stylesheet" href="/ecommerce/public/css/navbar-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="/ecommerce/public/js/auth-script.js" defer></script>

    <script>
        // Function to toggle forms based on URL
        function toggleFormBasedOnURL() {
            const container = document.getElementById('container');
            const currentPath = window.location.pathname;

            if (currentPath.includes('/auth/customer/register')) {
                // Show Register Form
                container.classList.add('right-panel-active');
            } else if (currentPath.includes('/auth/customer/login')) {
                // Show Login Form
                container.classList.remove('right-panel-active');
            }
        }

        document.addEventListener('DOMContentLoaded', toggleFormBasedOnURL);
    </script>
</head>

<body class="auth-page">
    <header>
        <?php include(APPPATH . 'Views/shared/navbar.php'); ?>
    </header>
    <div class="container-wrapper">

    <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible">
        <strong>Registration successful!</strong> <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible">
        <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>


        <div class="container" id="container">
            <!-- Register Form -->
            <div class="form-container sign-up-container">

                <form action="<?= base_url('auth/customer/register') ?>" method="post">
                    <h1>Create Account</h1>
                    <span>or use your email for registration</span>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <button type="submit">Register</button>
                </form>


            </div>

            <!-- Log In Form -->
            <div class="form-container sign-in-container">

                <form action="<?= base_url('auth/login') ?>" method="post">
                    <h1>Log in</h1>
                    <span>or use your account</span>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>"> <!-- CSRF Token -->
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <a href="#">Forgot your password?</a>
                    <button type="submit">Log In</button>
                </form>

            </div>

            <!-- Overlay -->
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Already have an account</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start your journey with us</p>
                        <button class="ghost" id="signUp">Create an account</button>
                    </div>
                </div>
            </div>

            <script>
                document.getElementById('signIn').addEventListener('click', function () {
                    window.location.href = 'http://localhost/ecommerce/public/auth/customer/login';
                });

                document.getElementById('signUp').addEventListener('click', function () {
                    window.location.href = 'http://localhost/ecommerce/public/auth/customer/register';
                });
            </script>

        </div>
    </div>
    <script>
        function validatePasswords() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                const errorSpan = document.getElementById('passwordError');
                errorSpan.style.display = 'block';
                return false;
            }

            return true;
        }
    </script>
    <!-- Auto-dismiss Flash Messages -->
    <script>
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => alert.style.display = 'none');
        }, 10000); // 10 seconds
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>