<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= esc($metaDesc ?? '888Jets — Premium Private Jet Charter Service') ?>">
    <title><?= esc($title ?? '888Jets') ?></title>

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- GSAP + ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>

    <!-- Base CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

    <?= $this->renderSection('head') ?>
</head>
<body>

<!-- Navigation -->
<header class="site-header" id="site-header">
    <div class="header-inner">

        <!-- Logo -->
        <a href="<?= base_url() ?>" class="logo" aria-label="888Jets Home">
            <span class="logo-number">888</span><span class="logo-text">JETS</span>
        </a>

        <!-- Desktop Nav -->
        <nav class="main-nav" id="main-nav" aria-label="Main navigation">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Private Jet Charter</a>
                </li>
                <li class="nav-item has-dropdown">
                    <button class="nav-link nav-link--dropdown" aria-expanded="false" aria-haspopup="true">
                        Aircraft
                        <svg class="dropdown-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li role="none"><a href="#" class="dropdown-item" role="menuitem">Fleet Details</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Destinations</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Empty Legs</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact Us</a>
                </li>
            </ul>
        </nav>

        <!-- Header CTA -->
        <div class="header-actions">
            <a href="#booking" class="btn btn-primary">Book Now</a>
        </div>

        <!-- Hamburger -->
        <button class="nav-toggle" id="nav-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-drawer">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>

    </div>
</header>

<!-- Mobile Drawer -->
<div class="mobile-drawer" id="mobile-drawer" aria-hidden="true">
    <nav aria-label="Mobile navigation">
        <ul class="mobile-nav-list">
            <li class="mobile-nav-item">
                <a href="<?= base_url() ?>" class="mobile-nav-link">Home</a>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">Private Jet Charter</a>
            </li>
            <li class="mobile-nav-item has-accordion">
                <button class="mobile-nav-link mobile-nav-link--accordion" aria-expanded="false">
                    Aircraft
                    <svg class="accordion-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <ul class="mobile-accordion-menu">
                    <li><a href="#" class="mobile-accordion-link">Fleet Details</a></li>
                </ul>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">Destinations</a>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">Empty Legs</a>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">About Us</a>
            </li>
            <li class="mobile-nav-item">
                <a href="#" class="mobile-nav-link">Contact Us</a>
            </li>
        </ul>
        <div class="mobile-drawer-footer">
            <a href="#booking" class="btn btn-primary mobile-book-btn">Book Now</a>
        </div>
    </nav>
</div>

<!-- Backdrop -->
<div class="nav-backdrop" id="nav-backdrop" aria-hidden="true"></div>

<!-- Page Content -->
<main id="main-content">
    <?= $this->renderSection('content') ?>
</main>

<!-- Footer -->
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <a href="<?= base_url() ?>" class="logo" aria-label="888Jets Home">
                <span class="logo-number">888</span><span class="logo-text">JETS</span>
            </a>
            <p>The pinnacle of luxury air travel</p>
        </div>
        <div class="footer-links">
            <div class="footer-col">
                <h4>Services</h4>
                <ul>
                    <li><a href="#">Charter a Jet</a></li>
                    <li><a href="#">Our Fleet</a></li>
                    <li><a href="#">Membership</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Safety Policy</a></li>
                    <li><a href="#">Customer Support</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><a href="tel:+1-800-888-5387">+1 800 888 JETS</a></li>
                    <li><a href="mailto:concierge@888jets.com">concierge@888jets.com</a></li>
                    <li>24/7 Concierge Service</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; <?= date('Y') ?> 888Jets. All rights reserved.</p>
        <div class="footer-legal">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<?= $this->renderSection('scripts') ?>

</body>
</html>
