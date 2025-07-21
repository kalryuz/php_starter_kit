<?php
/*
 * System title
 * use for title in header
 * this url to define your base path
 */

$title = 'PHP Starter Kit';
$url   = 'http://localhost/php_starter_kit/'; // Adjust this base your url root project

// use for url path
function base_url($path = '') {
    global $url;
    return $url . ltrim($path, '/');
}

// use for redirect
function redirect($path = '') {
    header("Location: " . base_url($path));
    exit();
}

// use to escape output from XSS
function esc($output = '') {
    return htmlspecialchars($output, ENT_QUOTES, 'UTF-8');
}

// use to sanitize input data from special characters
function sanitize($data = '') {
    global $con;
    return mysqli_real_escape_string($con, $data);
}

/*
 * This encode & decode using base64
 */

function encode($data = '') {
    return base64_encode($data);
}
function decode($data = '') {
    return base64_decode($data);
}

/*
 * use for session message
 * intergrade with sweetalert
 */

function sessionMessage($status, $message) {
    if ($status == 'success'){
        $_SESSION['message'] = [
            'icon'  => 'success',
            'title' => 'Success!',
        ];
    } else {
        $_SESSION['message'] = [
            'icon'  => 'error',
            'title' => 'Failed!',
        ];
    }

    $_SESSION['message']['text'] = $message;

    return $_SESSION['message'];
}