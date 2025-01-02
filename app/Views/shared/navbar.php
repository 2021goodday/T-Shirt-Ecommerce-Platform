<nav class="navbar">
    <div class="logo">
        <a href="<?= base_url('/') ?>" target="_blank" rel="noopener noreferrer">
            <span class="l-initial">Minimalist</span>Navbar
        </a>
    </div>
    <div class="nav-link">
        <ul>
            <li><a href="<?= base_url('/') ?>">Home</a></li>
            <li><a href="<?= base_url('about') ?>">About</a></li>
            <li><a href="<?= base_url('blog') ?>">Blog</a></li>
            <li><a href="<?= base_url('contact') ?>">Contact</a></li>
        </ul>
    </div>
    <div class="cta-btn">
    <?php if (session()->get('user')): ?>
        <button class="btn s-btn"><a href="<?= base_url('auth/logout') ?>">Logout</a></button>
    <?php else: ?>
        <button class="btn s-btn"><a href="<?= base_url('auth/login') ?>">Login</a></button>
        <button class="btn p-btn"><a href="<?= base_url('auth/register') ?>" style="color:rgb(251, 251, 251);">Register</a></button>
    <?php endif; ?>
</div>

</nav>
