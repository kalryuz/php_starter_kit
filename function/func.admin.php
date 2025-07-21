<?php
require_once '../includes/config.php';
require_once '../function/upload_image.php';

// add admin
if (isset($_POST['add-admin'])) {
    $fullName         = sanitize($_POST['fullName']);
    $email            = sanitize($_POST['email']);
    $password         = sanitize($_POST['password']);
    $confirmPassword  = sanitize($_POST['confirmPassword']);

    // check password & confirm password
    if ($password !== $confirmPassword) {
        sessionMessage('error', 'Password and Confirm Password do not match.');
        redirect('admin/create.php');

    } else {
        $imageName    = sanitize($_FILES['image']['name']);

        // check name image exist
        $checkImage   = "SELECT Image FROM admins WHERE Image LIKE '%$imageName%'";
        $executeCheck = mysqli_query($con, $checkImage);

        $image = '';

        // if image already exists, use existing image
        if (mysqli_num_rows($executeCheck) > 0) {
            $data = mysqli_fetch_assoc($executeCheck);
            $image = $data['Image'];
            
        } else {
            // upload image
            $upload_image = upload($_FILES['image'], 'admin');

            if ($upload_image['status'] === true) {
                $image = $upload_image['image_name'];

            } else {
                sessionMessage('error', $upload_image);
                redirect('admin/create.php');

            }
        }

        if (!empty($image)) {
            $hashPassword   = password_hash($password, PASSWORD_DEFAULT);

            // insert admin data
            $insertAdmin    = "INSERT INTO admins (FullName, Email, Password, Image) VALUES ('$fullName', '$email', '$hashPassword', '$image')";
            $executeInsert  = mysqli_query($con, $insertAdmin);

            if ($executeInsert) {
                sessionMessage('success', 'Successfully Created Admin.');
                redirect('admin/');
            } else {
                sessionMessage('error', 'Error: ' . mysqli_error($con));
                redirect('admin/create.php');
            }
        }
    }
}

// edit admin
if (isset($_POST['edit-admin'])) {
    $admin_id  = decode($_POST['id'] ?? '');

    $fullName  = sanitize($_POST['fullName']);
    $email     = sanitize($_POST['email']);

    // old image
    $q_oldImage = "SELECT Image FROM admins WHERE id = '$admin_id' LIMIT 1";
    $e_oldImage = mysqli_query($con, $q_oldImage);
    $oldImage   = mysqli_fetch_assoc($e_oldImage)['Image'] ?? '';

    $image = $oldImage;

    // upload image if exists
    if (!empty($_FILES['image']['name'])) {
        $upload_image = upload($_FILES['image'], 'admin');

        if ($upload_image['status'] === true) {
            $image = $upload_image['image_name'];

        } else {
            sessionMessage('error', $upload_image);
            redirect("admin/edit.php?id=" . encode($admin_id));

        }
    }

    // update admin data
    $updateAdmin   = "UPDATE admins SET FullName='$fullName', Email='$email', Image='$image' WHERE id='$admin_id'";
    $executeUpdate = mysqli_query($con, $updateAdmin);

    if ($executeUpdate) {
        sessionMessage('success', 'Successfully Updated Admin.');
        redirect('admin/edit.php?id=' . encode($admin_id));

    } else {
        sessionMessage('error', 'Error: ' . mysqli_error($con));
        redirect("admin/edit.php?id=" . encode($admin_id));

    }
}

// delete > use AJAX
header('Content-Type: application/json'); 
if (isset($_POST['delete'])) {
    $admin_id = sanitize($_POST['id']);

    // delete admin
    $deleteAdmin   = "DELETE FROM admins WHERE id = '$admin_id'";
    $executeDelete = mysqli_query($con, $deleteAdmin);

    if ($executeDelete) {
        echo json_encode([
            'status'  => 'success',
            'message' => 'Successfully Deleted Admin.'
        ]);
        
    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Error: ' . mysqli_error($con)
        ]);
    }

    exit();
}

