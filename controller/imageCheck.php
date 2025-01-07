<?php
session_start();
require_once('../model/userModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] === UPLOAD_ERR_OK) {
        $src = $_FILES['myfile']['tmp_name'];
        $fileName = $_FILES['myfile']['name'];
        $folder = '../image/' . $fileName;

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {

            updateImage($_SESSION['user']['username'], $fileName);

            move_uploaded_file($src, $folder);
            header('Location: ../view/profile.php');
        } else {
            echo "Invalid file type. Please upload a valid image.";
        }
    } else {
        echo "Error uploading file. Please try again.";
    }
}

?>