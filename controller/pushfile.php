<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $allowUpload = 0;
    if ($_POST['submit']) {
        if ($_FILES['file']['error'] > 0) {
            echo "<script>alert('data upload error');window.history.back()</script>";
        }
        $filename = $_FILES["file"]["name"];
        $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
        $file_ext = substr($filename, strripos($filename, '.')); // get file name
        // $newfilename = md5($file_basename) . $file_ext;
        $allowed_file_types = array(".xml");
        if (in_array($file_ext, $allowed_file_types)) {
            if (file_exists("../uploads/" . $filename)) {
                echo "<script>alert('FILE EXISTS');window.history.back();</script>";
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], "../uploads/" . $filename)) {
                    echo "<script>alert('The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded');window.history.back()</script>";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
        else{
            echo "<script>alert('Invalid file type');window.history.back()</script>";
        }
    }
}
