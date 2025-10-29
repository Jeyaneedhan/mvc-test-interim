<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rentigo - Professional rental property management services">
    <title><?php echo $data['title'] ?? 'Rentigo - Your Complete Rental Solution'; ?></title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home-responsive.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Navigation Header -->
    <header class="main-header" id="mainHeader">
        <nav class="navbar">
            <div class="nav-container container">
                <!-- Logo -->
                <a href="<?php echo URLROOT; ?>/pages" class="nav-logo">
                    <div class="logo"><img src="<?php echo URLROOT; ?>/images/logo.png" alt=" Rentigo Logo">
                    </div>
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- Navigation Links -->
                <ul class="nav-menu" id="navMenu">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#about" class="nav-link ">About</a></li>
                    <li><a href="#services" class="nav-link">Services</a></li>
                    <li><a href="#properties" class="nav-link">Properties</a></li>
                    <li><a href="#testimonials" class="nav-link">Testimonials</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>

                <!-- Auth Buttons -->
                <div class="nav-auth">
                    <!-- Guest User - Login and Sign-up buttons -->
                    <a href="<?php echo URLROOT; ?>/users/login" class="btn-login">Login</a>
                    <a href="<?php echo URLROOT; ?>/users/usertype" class="btn-signup">Sign-up</a>
                </div>
            </div>
        </nav>
    </header>