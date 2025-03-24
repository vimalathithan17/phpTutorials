<?php
if ($_FILES["file"]["error"] === UPLOAD_ERR_OK) {
    $target = "uploads/" . basename($_FILES["file"]["name"]);
    
    if (mmove_uploaded_file($_FILES["file"]["tmp_name"], $target)) {
        echo "File uploaded successfully: " . $target_file;
    } else {
        echo "File upload failed.";
    }

} else {
    echo "Upload failed!";
}
// UPLOAD_ERR_OK	        0	No error, file uploaded successfully.
// UPLOAD_ERR_INI_SIZE	    1	File exceeds upload_max_filesize in php.ini.
// UPLOAD_ERR_FORM_SIZE	    2	File exceeds MAX_FILE_SIZE in the HTML form.
// UPLOAD_ERR_PARTIAL	    3	File was only partially uploaded.
// UPLOAD_ERR_NO_FILE	    4	No file was uploaded.
// UPLOAD_ERR_NO_TMP_DIR	6	Missing temporary folder (upload_tmp_dir is missing).
// UPLOAD_ERR_CANT_WRITE	7	Failed to write file to disk (permission issue).
// UPLOAD_ERR_EXTENSION	    8	Upload stopped due to a PHP extension.