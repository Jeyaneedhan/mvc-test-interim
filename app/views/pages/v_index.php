<?php require APPROOT . '/views/inc/public_header.php'; ?>

<!-- Hero Section -->
<section class="hero-section" id="home">
    <div class=" container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="text-primary">Your Complete</span><br>
                    <span class="text-primary">Rental Solution</span>
                </h1>
                <p class="hero-description">
                    Connecting quality tenants with great landlords through professional
                    property management and seamless rental experiences
                </p>
                <div class="hero-buttons">
                    <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-primary btn-lg">
                        Browse Properties
                    </a>
                    <a href="#how-it-works" class="btn btn-outline btn-lg">
                        Learn More
                    </a>
                </div>

                <!-- Quick Stats -->
                <div class="hero-stats">
                    <div class="stat-item">
                        <h3>500+</h3>
                        <p>Properties</p>
                    </div>
                    <div class="stat-item">
                        <h3>10,000+</h3>
                        <p>Happy Tenants</p>
                    </div>
                    <div class="stat-item">
                        <h3>15+</h3>
                        <p>Years Experience</p>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="<?php echo URLROOT; ?>/images/hero-building.png" alt="Modern Properties">
            </div>

            <br>
            <br>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">About Rentigo</h2>
            <p class="section-subtitle">
                Discover Rentigo' s story and our commitment to transforming the rental experience
            </p>
        </div>

        <div class="about-content">
            <div class="about-image">
                <img src="<?php echo URLROOT; ?>/images/about-office.jpg" alt="Rentigo Office">
                <div class="experience-badge">
                    <span class="years">15+</span>
                    <span class="text">Years of Excellence</span>
                </div>
            </div>

            <div class="about-text">
                <h3>Your Trusted Rental Partner</h3>
                <p>
                    Founded in 2025, Rentigo has evolved from a small local operation to the
                    region's leading rental platform, successfully connecting over 10,000 tenants
                    with quality landlords while managing 500+ properties across multiple markets.
                </p>
                <p>
                    Our mission is to create exceptional rental experiences for everyone.
                    We bridge the gap between property owners seeking reliable income and
                    tenants searching for quality homes.
                </p>

                <div class="about-features">
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>Professional Excellence</h4>
                            <p>Licensed rental specialists with years of experience</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>Technology-Driven</h4>
                            <p>Advanced platforms for seamless property management</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <h4>Proven Results</h4>
                            <p>Track record of successful placements and satisfied clients</p>
                        </div>
                    </div>
                </div>

                <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-primary">
                    Learn More About Us <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="features-section" id="services">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Why Choose Rentigo?</h2>
            <p class="section-subtitle">
                We connect quality tenants with great landlords through professional management
            </p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h3>Transparent Pricing</h3>
                <p>Clear, upfront pricing with no hidden fees. Complete transparency in all dealings.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Expert Team</h3>
                <p>Certified professionals with years of experience in property management.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Smart Reporting</h3>
                <p>Detailed monthly reports and real-time dashboards to track performance.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3>Fast Response</h3>
                <p>24/7 emergency support and quick response to all tenant and owner needs.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-file-invoice-dollar"></i>
                </div>
                <h3>Secure Payments</h3>
                <p>Safe and reliable online payment system for hassle-free rent collection and financial management.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <h3>Wide Network</h3>
                <p>Access to a diverse range of premium rental properties across Colombo, tailored to every lifestyle and budget.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="process-section" id="how-it-works">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">How It Works</h2>
            <p class="section-subtitle">
                Our streamlined process makes rental simple and hassle-free
            </p>
        </div>

        <!-- Property Owners Process -->
        <div class="process-wrapper">
            <h3 class="process-title">For Property Owners</h3>
            <div class="process-grid">
                <div class="process-card">
                    <div class="process-number">1</div>
                    <h4>Sign Up</h4>
                    <p>Complete our simple registration and tell us about your property</p>
                </div>

                <div class="process-card">
                    <div class="process-number">2</div>
                    <h4>Property Visit</h4>
                    <p>Our experts assess your property's condition and potential</p>
                </div>

                <div class="process-card">
                    <div class="process-number">3</div>
                    <h4>Agreement</h4>
                    <p>We prepare a tailored management plan for your approval</p>
                </div>

                <div class="process-card">
                    <div class="process-number">4</div>
                    <h4>We Take Over</h4>
                    <p>Handle everything while you collect reliable income</p>
                </div>
            </div>
        </div>

        <!-- Tenants Process -->
        <div class="process-wrapper">
            <h3 class="process-title">For Tenants</h3>
            <div class="process-grid">
                <div class="process-card">
                    <div class="process-number">1</div>
                    <h4>Browse Properties</h4>
                    <p>Search verified listings with detailed photos and info</p>
                </div>

                <div class="process-card">
                    <div class="process-number">2</div>
                    <h4>Apply Online</h4>
                    <p>Submit your application with documents digitally</p>
                </div>

                <div class="process-card">
                    <div class="process-number">3</div>
                    <h4>Quick Approval</h4>
                    <p>Get approval status within 24-48 hours</p>
                </div>

                <div class="process-card">
                    <div class="process-number">4</div>
                    <h4>Move In</h4>
                    <p>Sign lease, receive keys, and enjoy your new home</p>
                </div>
            </div>
        </div>

        <div class="process-cta">
            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-primary btn-lg">
                Start Your Journey
            </a>
        </div>
    </div>
</section>

<!-- Featured Properties Section -->
<section class="properties-section" id="properties">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Featured Properties</h2>
            <p class="section-subtitle">
                Discover quality rentals available through Rentigo's professional management
            </p>
        </div>

        <div class="properties-grid">
            <?php
            // This would normally come from the controller
            $featured_properties = [
                [
                    'title' => 'Skyline Residences',
                    'type' => 'Luxury Apartment',
                    'location' => 'Colombo 07',
                    'price' => 'Rs.150,000 - Rs.200,000',
                    'image' => 'property-1.jpg'
                ],
                [
                    'title' => 'Mediterranean Villa',
                    'type' => 'Vacation Property',
                    'location' => 'Colombo 05',
                    'price' => 'Rs.250,000 - Rs.300,000',
                    'image' => 'property-2.jpg'
                ],
                [
                    'title' => 'Urban Loft',
                    'type' => 'Modern Apartment',
                    'location' => 'Colombo 07',
                    'price' => 'Rs.50,000 - Rs.100,000',
                    'image' => 'property-3.jpg'
                ],

                [
                    'title' => 'Lakeview Apartments',
                    'type' => 'Modern Apartment',
                    'location' => 'Colombo 05',
                    'price' => 'Rs.50,000 - Rs.100,000',
                    'image' => 'property-4.jpg'
                ],

                [
                    'title' => 'Ocean Breeze Residence',
                    'type' => 'Luxury Condo',
                    'location' => 'Colombo 06',
                    'price' => 'Rs.50,000 - Rs.100,000',
                    'image' => 'property-5.jpg'
                ],

                [
                    'title' => 'Greenwood Villas',
                    'type' => 'Family Home',
                    'location' => 'Colombo 03',
                    'price' => 'Rs.80,000 - Rs.100,000',
                    'image' => 'property-6.jpg'
                ]
            ];

            foreach ($featured_properties as $property): ?>
                <div class="property-card">
                    <div class="property-image">
                        <img src="<?php echo URLROOT; ?>/images/properties/<?php echo $property['image']; ?>"
                            alt="<?php echo $property['title']; ?>">
                        <span class="property-badge">Featured</span>
                    </div>
                    <div class="property-content">
                        <h3><?php echo $property['title']; ?></h3>
                        <p class="property-type"><?php echo $property['type']; ?></p>
                        <div class="property-details">
                            <span class="property-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo $property['location']; ?>
                            </span>
                            <span class="property-price">
                                <?php echo $property['price']; ?>/month
                            </span>
                        </div>
                        <a href="<?php echo URLROOT; ?>/properties/view/1" class="btn btn-outline btn-block">
                            View Details
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="properties-cta">
            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-primary">
                View All Properties
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section" id="testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">What Our Clients Say</h2>
            <p class="section-subtitle">
                Hear from property owners and tenants about their Rentigo experience
            </p>
        </div>

        <div class="testimonials-slider">
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Rentigo's property management has been exceptional. Transparent communication,
                        prompt maintenance responses, and detailed financial reporting have made managing
                        my rental properties completely stress-free."
                    </p>
                    <div class="testimonial-author">
                        <img src="<?php echo URLROOT; ?>/images/testimonials/user1.jpg" alt="Client">
                        <div>
                            <h4>Artful Dodger</h4>
                            <p>Property Investor</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Since switching to Rentigo, my rental income increased by 15% and tenant
                        turnover decreased significantly. Their market knowledge and tenant screening
                        process are unmatched."
                    </p>
                    <div class="testimonial-author">
                        <img src="<?php echo URLROOT; ?>/images/testimonials/user2.jpg" alt="Client">
                        <div>
                            <h4>Robert William</h4>
                            <p>Real Estate Developer</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "As a first-time property owner, I was overwhelmed until I found Rentigo.
                        They guided me through every step and now my property generates consistent
                        income with minimal effort."
                    </p>
                    <div class="testimonial-author">
                        <img src="<?php echo URLROOT; ?>/images/testimonials/user3.jpg" alt="Client">
                        <div>
                            <h4>Victoria Wotton</h4>
                            <p>Property Owner</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonial-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">
                Find answers to common questions about Rentigo's rental services
            </p>
        </div>

        <div class="faq-accordion">
            <div class="faq-item active">
                <div class="faq-question">
                    <h3>What services do you offer?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>
                        We provide complete rental solutions including tenant screening and placement,
                        rent collection, property maintenance, financial reporting, and lease management.
                        We serve both property owners seeking professional management and tenants looking
                        for quality rentals.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How much do your services cost?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>
                        Our pricing is transparent and competitive, typically ranging from 8-10% of
                        monthly rent for property management services. We offer customized packages
                        based on your specific needs and property portfolio size.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How do you screen tenants?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>
                        We conduct comprehensive background checks including credit history, employment
                        verification, previous rental history, and criminal background checks to ensure
                        reliable and responsible tenants for your property.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How quickly do you respond to maintenance requests?</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>
                        We provide 24/7 emergency maintenance support with immediate response.
                        For non-emergency requests, we typically respond within 24 hours and
                        schedule repairs within 48-72 hours based on urgency.
                    </p>
                </div>
            </div>
        </div>

        <div class="faq-cta">
            <p>Still have questions? We're here to help.</p>
            <a href="<?php echo URLROOT; ?>/pages/contact" class="btn btn-primary">
                Contact Us
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Get Started?</h2>
            <p>
                Whether you're a property owner seeking maximum returns or a tenant searching
                for your ideal home, Rentigo makes the rental process simple and professional.
            </p>
            <div class="cta-buttons">
                <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-white btn-lg">
                    Get Started Today
                </a>
                <a href="<?php echo URLROOT; ?>/pages/contact" class="btn btn-outline-white btn-lg">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/public_footer.php'; ?>