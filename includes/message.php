<?php
function message($icon, $title, $text)
{
    echo "<script>
            Swal.fire({
                title: '". $title ."',
                text: '". $text ."',
                icon: '". $icon ."'
            });
        </script>";
        

    unset($_SESSION['message']);
}

// message in page
if (isset($_SESSION['message'])) {
    $icon  = $_SESSION['message']['icon'];
    $text  = $_SESSION['message']['text'];
    $title = $_SESSION['message']['title'];

    message($icon, $title, $text);
}