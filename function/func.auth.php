<?php
require_once '../includes/config.php';

// Sign In
if (isset($_POST['sign-in'])) {
    $email    = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    $query  = "SELECT * FROM admins WHERE Email = '$email' LIMIT 1";
    $result = mysqli_query($con, $query);

    // Check if email exists
    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $admin['Password'])) {
            $_SESSION['admin_id'] = $admin['id'];

            // update logs table
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $status  = 'success';

            $query_log  = "INSERT INTO logs (IP, Name, status) VALUES ( '$user_ip', '". $admin['FullName'] ."', '$status')";
            mysqli_query($con, $query_log);

            sessionMessage('success', 'Login successful!');
            redirect('dashboard.php');

        } else {
            // update logs table
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $status  = 'failed';

            $query_log  = "INSERT INTO logs (IP, Name, status) VALUES ( '$user_ip', 'Anonymous', '$status')";
            mysqli_query($con, $query_log);

            sessionMessage('error', 'Email or password invalid!');
            
        }
    } else {
        sessionMessage('error', 'Email or password invalid!');
    }

    redirect('./');
}

