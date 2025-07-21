<?php
function upload($file_image, $folder) {
    $image_name  = $file_image['name'];
    $image_tmp   = $file_image['tmp_name'];
    $image_error = $file_image['error'];

    $image_ext          = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    $image_folder = "../assets/img/$folder/" . basename($image_name);

    if (in_array($image_ext, $allowed_extensions)) {
        if ($image_error === 0) {
            if (move_uploaded_file($image_tmp, $image_folder)) {
                $data = [
                    'status'     => true,
                    'image_name' => basename($image_name)
                ];
                
                return $data;
            } else {
                return 'Failed to move uploaded image.';
            }
        } else {
            return 'Upload error code: ' . $image_error;
        }
    } else {
        return 'Only JPG, JPEG, PNG, and WEBP formats are allowed.';
    }
}