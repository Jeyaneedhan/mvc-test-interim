// ============================================
// RENTIGO HOME PAGE JAVASCRIPT
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // MOBILE MENU TOGGLE
    // ============================================
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const navMenu = document.getElementById('navMenu');
    
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            mobileMenuToggle.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileMenuToggle.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
        
        // Close menu when clicking on a link
        const navLinks = navMenu.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }
// ============================================
// ACTIVE NAVIGATION FOR SINGLE PAGE (SCROLL-BASED)
// ============================================
(function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section[id]');
    
    function setActiveNavOnScroll() {
        let currentSection = '';
        const scrollPosition = window.scrollY + 150; // Offset for header
        
        // Check which section is in view
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSection = sectionId;
            }
        });
        
        // If at top of page, set to home
        if (window.scrollY < 100) {
            currentSection = 'home';
        }
        
        // Update nav links
        navLinks.forEach(link => {
            link.classList.remove('active');
            const href = link.getAttribute('href');
            
            if (href === '#' + currentSection || 
                (currentSection === 'home' && link.textContent.trim().toLowerCase() === 'home')) {
                link.classList.add('active');
            }
        });
    }
    
    // Run on scroll
    window.addEventListener('scroll', setActiveNavOnScroll);
    
    // Run on page load
    window.addEventListener('load', setActiveNavOnScroll);
    
    // Run when DOM is ready
    document.addEventListener('DOMContentLoaded', setActiveNavOnScroll);
    
    // Click handlers for smooth scroll
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href.startsWith('#')) {
                e.preventDefault();
                
                // Remove active from all
                navLinks.forEach(l => l.classList.remove('active'));
                
                // Add active to clicked
                this.classList.add('active');
                
                // Scroll to section
                if (href === '#home' || href === '#') {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } else {
                    const target = document.querySelector(href);
                    if (target) {
                        const targetPosition = target.offsetTop - 80; // Offset for fixed header
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            }
        });
    });
})();

    // ============================================
    // HEADER SCROLL EFFECT
    // ============================================
    const header = document.getElementById('mainHeader');
    let lastScroll = 0;
    
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScroll = currentScroll;
    });
    
    // ============================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ============================================
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // ============================================
    // FAQ ACCORDION
    // ============================================
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', function() {
            // Close other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
        });
    });
    
    // ============================================
    // TESTIMONIAL SLIDER
    // ============================================
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const dots = document.querySelectorAll('.dot');
    let currentTestimonial = 0;
    let testimonialInterval;
    
    function showTestimonial(index) {
        testimonialCards.forEach((card, i) => {
            if (window.innerWidth > 768) {
                // Show all cards on desktop
                card.style.display = 'block';
            } else {
                // Show only current card on mobile
                card.style.display = i === index ? 'block' : 'none';
            }
        });
        
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }
    
    function nextTestimonial() {
        currentTestimonial = (currentTestimonial + 1) % testimonialCards.length;
        showTestimonial(currentTestimonial);
    }
    
    function startTestimonialSlider() {
        if (window.innerWidth <= 768) {
            showTestimonial(currentTestimonial);
            testimonialInterval = setInterval(nextTestimonial, 5000);
        } else {
            testimonialCards.forEach(card => {
                card.style.display = 'block';
            });
        }
    }
    
    // Initialize slider
    startTestimonialSlider();
    
    // Handle window resize
    window.addEventListener('resize', function() {
        clearInterval(testimonialInterval);
        startTestimonialSlider();
    });
    
    // Dot click handlers
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            clearInterval(testimonialInterval);
            currentTestimonial = index;
            showTestimonial(currentTestimonial);
            if (window.innerWidth <= 768) {
                testimonialInterval = setInterval(nextTestimonial, 5000);
            }
        });
    });
    
    // ============================================
    // BACK TO TOP BUTTON
    // ============================================
    const backToTop = document.getElementById('backToTop');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });
    
    backToTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // ============================================
    // NEWSLETTER FORM
    // ============================================
    const newsletterForm = document.getElementById('newsletterForm');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            
            // Here you would normally send the email to your server
            // For now, just show a success message
            alert('Thank you for subscribing! We\'ll keep you updated.');
            this.reset();
        });
    }
    
    // ============================================
    // LAZY LOADING IMAGES
    // ============================================
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        lazyImages.forEach(img => {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
        });
    }
    
    // ============================================
    // ANIMATION ON SCROLL
    // ============================================
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    if ('IntersectionObserver' in window) {
        const animateObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, {
            threshold: 0.1
        });
        
        animateElements.forEach(el => animateObserver.observe(el));
    }
    
    // ============================================
    // PROPERTY CARD HOVER EFFECT
    // ============================================
    const propertyCards = document.querySelectorAll('.property-card');
    
    propertyCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // ============================================
    // FORM VALIDATION
    // ============================================
    const forms = document.querySelectorAll('form[data-validate]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('error');
                    
                    // Remove error class after user starts typing
                    input.addEventListener('input', function() {
                        this.classList.remove('error');
                    });
                } else {
                    input.classList.remove('error');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    });
    
    // ============================================
    // COUNTER ANIMATION
    // ============================================
    const counters = document.querySelectorAll('[data-counter]');
    
    function animateCounter(counter) {
        const target = parseInt(counter.getAttribute('data-counter'));
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60 FPS
        let current = 0;
        
        const updateCounter = () => {
            current += step;
            
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    }
    
    if ('IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                    animateCounter(entry.target);
                    entry.target.classList.add('animated');
                }
            });
        }, {
            threshold: 0.5
        });
        
        counters.forEach(counter => counterObserver.observe(counter));
    }
    
    // ============================================
    // PRELOADER (Optional)
    // ============================================
    window.addEventListener('load', function() {
        const preloader = document.getElementById('preloader');
        if (preloader) {
            setTimeout(() => {
                preloader.style.opacity = '0';
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 300);
            }, 500);
        }
    });
    
});

// ============================================
// UTILITY FUNCTIONS
// ============================================

// Debounce function for scroll events
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Format currency
function formatCurrency(amount) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(amount);
}

// Get URL parameter
function getUrlParameter(name) {
    const regex = new RegExp('[?&]' + name + '=([^&#]*)');
    const results = regex.exec(window.location.href);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

// Set cookie
function setCookie(name, value, days) {
    const expires = new Date();
    expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
}

// Get cookie
function getCookie(name) {
    const nameEQ = name + '=';
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Export functions for use in other scripts
window.rentigUtils = {
    debounce,
    isInViewport,
    formatCurrency,
    getUrlParameter,
    setCookie,
    getCookie
};