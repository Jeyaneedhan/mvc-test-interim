</div> <!-- Close content-wrapper -->
</main>
</div>

<script src="<?php echo URLROOT; ?>/js/manager.js"></script>
<script>
    // Initialize sidebar functionality
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');

        // Desktop sidebar toggle
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
            });
        }

        // Mobile menu toggle
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('mobile-open');
            });
        }

        // Restore sidebar state
        if (localStorage.getItem('sidebarCollapsed') === 'true') {
            sidebar.classList.add('collapsed');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 768 &&
                !sidebar.contains(e.target) &&
                !mobileMenuToggle.contains(e.target)) {
                sidebar.classList.remove('mobile-open');
            }
        });

        // Initialize tooltips for collapsed sidebar
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            const link = item.querySelector('.nav-link');
            const tooltip = item.querySelector('.tooltip');

            if (link && tooltip) {
                link.addEventListener('mouseenter', function() {
                    if (sidebar.classList.contains('collapsed')) {
                        tooltip.style.display = 'block';
                    }
                });

                link.addEventListener('mouseleave', function() {
                    tooltip.style.display = 'none';
                });
            }
        });
    });
</script>
</body>

</html>