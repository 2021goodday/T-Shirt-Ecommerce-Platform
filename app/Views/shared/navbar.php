<div class="navbar-wrapper">
    <nav class="navbar">
        <div class="logo">
            <a href="<?= site_url('/') ?>" target="_blank" rel="noopener noreferrer">
                <span class="l-initial">Minimalist</span>Navbar
            </a>
        </div>
        <div class="nav-link">
            <ul>
                <li><a href="<?= site_url('/') ?>">Home</a></li>
                <li><a href="<?= site_url('about') ?>">About</a></li>
                <li><a href="<?= site_url('blog') ?>">Blog</a></li>
                <li><a href="<?= site_url('contact') ?>">Contact</a></li>
            </ul>
        </div>
        <div class="cta-btn">
            <?php if (session()->get('user')): ?>
                <button class="btn s-btn">
                    <a href="<?= site_url('auth/logout') ?>">Logout</a>
                </button>
            <?php else: ?>
                <?php if (isset($userType) && $userType === 'admin'): ?>
                    <button class="btn s-btn">
                        <a href="<?= site_url('auth/admin/login') ?>">Login</a>
                    </button>
                    <button class="btn p-btn">
                        <a href="<?= site_url('auth/admin/register') ?>" style="color:rgb(251, 251, 251);">Register</a>
                    </button>
                <?php else: ?>
                    <button class="btn s-btn">
                        <a href="<?= site_url('auth/customer/login') ?>">Login</a>
                    </button>
                    <button class="btn p-btn">
                        <a href="<?= site_url('auth/customer/register') ?>" style="color:rgb(251, 251, 251);">Register</a>
                    </button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </nav>
</div>
