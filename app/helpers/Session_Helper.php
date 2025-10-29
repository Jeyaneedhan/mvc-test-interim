<?php
session_start(); // Now $_SESSION works everywhere

// Flash message helper
// EXAMPLE - flash('register_success', 'You are now registered', 'alert alert-success');
// DISPLAY IN VIEW - <?php echo flash('register_success');
function flash($name = '', $message = '', $class = 'msg-flash')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            // Unsetting
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }

            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            // Setting
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } else if (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="' . $class . '">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}
