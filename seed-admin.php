<?php
require_once 'includes/config.php';

$FullName  = 'Administrator';
$Email     = 'admin@admin.com';
$Password  = password_hash('admin', PASSWORD_DEFAULT);

// check if email already exists
$checkEmail = "SELECT * FROM admins WHERE Email = '$Email'";
$checkResult = mysqli_query($con, $checkEmail);

if (mysqli_num_rows($checkResult) == 0) {
    // Add to database
    $insertAdmin    = "INSERT INTO admins (FullName, Email, Password) VALUES ('$FullName', '$Email', '$Password')";
    $executeInsert  = mysqli_query($con, $insertAdmin);

    if ($executeInsert) {
        echo "Admin account created successfully.";
        echo "<br><br><a href='". base_url() ."' style='padding:5px; border-radius:5px; text-decoration:none; background-color:red; color: white;'>Back</a>";
    } else {
        echo "Error creating admin account: " . mysqli_error($con);
    }
} else {
    echo "Email already exists. Please use a different email.";
    echo "<br><br><a href='". base_url() ."' style='padding:5px; border-radius:5px; text-decoration:none; background-color:red; color: white;'>Back</a>";
}