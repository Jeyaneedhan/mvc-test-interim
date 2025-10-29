<?php
// Note that helpers are not classes
// These are just bunch of functions that helps to other clasess

// Simple page redirect
function redirect($page)
{
    header('location: ' . URLROOT . '/' . $page);
}
