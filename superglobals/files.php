<?php
//$_FILES["file_input_name"]["key"]

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fileError = $_FILES["uploadFile"]["error"];

    if ($fileError !== 0) {
        $errorMessages = [
            1 => "File size exceeds `upload_max_filesize` in php.ini.",
            2 => "File size exceeds `MAX_FILE_SIZE` in HTML form.",
            3 => "File was only partially uploaded.",
            4 => "No file was uploaded.",
            6 => "Missing temporary folder.",
            7 => "Failed to write file to disk.",
            8 => "A PHP extension stopped the file upload."
        ];
        
        echo $errorMessages[$fileError] ?? "Unknown error.";
    }

    if (isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["error"] === 0) {
        $fileName = $_FILES["uploadFile"]["name"];
        $fileTmp = $_FILES["uploadFile"]["tmp_name"];
        $fileSize = $_FILES["uploadFile"]["size"];
        $fileType = $_FILES["uploadFile"]["type"];

        // Set upload directory
        $uploadDir = "uploads/";
        $destination = $uploadDir . basename($fileName);

        // Move file to the target folder
        if (move_uploaded_file($fileTmp, $destination)) {
            echo "File uploaded successfully: $destination";
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "File upload failed. Error: " . $_FILES["uploadFile"]["error"];
    }
}
