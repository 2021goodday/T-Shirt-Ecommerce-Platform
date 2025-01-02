<link rel="stylesheet" href="/ecommerce/public/css/auth-style.css">
<link rel="stylesheet" href="/ecommerce/public/css/navbar-style.css">
<script src="/ecommerce/public/js/auth-script.js" defer></script>
<?php include(APPPATH . 'Views/shared/navbar.php'); ?>
<div class="container" id="container">
    <!-- Register Form -->
    <div class="form-container sign-up-container">
        <form action="<?= base_url('auth/admin/register') ?>" method="post" onsubmit="return validatePasswords()">
            <h1>Admin Registration</h1>
            <span>Register your admin account</span>
            <input type="text" name="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" id="password" name="password" placeholder="Password" required />
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required />
            <span id="passwordError" style="color: red; display: none;">Passwords do not match!</span>
            <button type="submit">Register</button>
        </form>
    </div>

    <!-- Log In Form -->
    <div class="form-container sign-in-container">
        <form action="<?= base_url('auth/admin/login') ?>" method="post">
            <h1>Admin Log in</h1>
            <span>Log in to your admin account</span>
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
                <p>To manage the platform, log in with your admin credentials</p>
                <button class="ghost" id="signIn">Already have an account</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Welcome, Admin!</h1>
                <p>Create your admin account to manage the platform effectively</p>
                <button class="ghost" id="signUp">Create an account</button>
            </div>
        </div>
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
