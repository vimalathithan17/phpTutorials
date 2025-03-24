foreach ($_FILES['files']['name'] as $key => $name) {
    $tmp_name = $_FILES['files']['tmp_name'][$key];
    $target_file = "uploads/" . basename($name);

    if (move_uploaded_file($tmp_name, $target_file)) {
        echo "Uploaded: $name <br>";
    } else {
        echo "Failed to upload: $name <br>";
    }
}
