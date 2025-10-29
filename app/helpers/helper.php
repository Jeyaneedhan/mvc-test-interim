<?php
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function logout()
{
    // Clear all memory of the user
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_type']);

    session_destroy();

    // Redirect to login page
    redirect('users/login');
}
