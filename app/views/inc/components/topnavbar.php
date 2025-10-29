<div class="topnav">
    <a class="active" href="<?php echo URLROOT; ?>">Home</a>

    <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="<?php echo URLROOT; ?>/Users/login">Login</a>
        <a href="<?php echo URLROOT; ?>/Users/register">Register</a>

    <?php else: ?>
        <a href="<?php echo URLROOT; ?>/Users/logout">Logout</a>
    <?php endif; ?>
</div>
