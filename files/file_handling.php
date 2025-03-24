<?php
var_dump(is_file('a_file.txt'));

$file = fopen("file.txt", "r"); // returns false if file not fount
if ($file) {
    echo "File opened successfully!";
    fclose($file); // Always close the file
} else {
    echo "Failed to open the file!";
}

$file = fopen("file.txt", "r");
$content = fread($file, filesize("file.txt")); // Read entire file
echo $content;
fclose($file);

$file = fopen("file.txt", "r");
while (!feof($file)) {  // Loop until end-of-file
    echo fgets($file) . "<br>";
}
fclose($file);

//read entirefile
$content = file_get_contents("file.txt");
echo $content;

//writing
$file = fopen("example.txt", "w");  // Open file in write mode
fwrite($file, "Hello, World!");
fclose($file);

file_put_contents("example.txt", "New content");

file_put_contents("example.txt", "More data\n", FILE_APPEND);

//checking if file exist
if (file_exists("example.txt")) {
    echo "File exists!";
} else {
    echo "File does not exist!";
}

//deleting a file
if (file_exists("example.txt")&& false) {
    unlink("example.txt");
    echo "File deleted!";
} else {
    echo "File not found!";
}

//copying a file
copy("example.txt", "backup.txt");
//renaming a file
rename("oldname.txt", "newname.txt");
//
if (!is_dir('examples')) {
    mkdir('examples');
}

rmdir('examples');;

// Getting File Information
// Function	                    Description
// filesize("file.txt")	        Get file size in bytes
// basename("path/to/file.txt")	Get file name only
// dirname("path/to/file.txt")	Get directory name
// pathinfo("path/to/file.txt")	Get file info as an array
$file = "example.txt";
$info = pathinfo($file);

echo "Filename: " . $info['basename'] . "<br>";
echo "Directory: " . $info['dirname'] . "<br>";
echo "Extension: " . $info['extension'] . "<br>";
//change file permission
chmod("example.txt", 0644); // Read & write for owner, read for others

//list files
$files = scandir("uploads/");
print_r($files);

//fseek
$file = fopen("example.txt", "r");

if ($file) {
    fseek($file, 10, SEEK_SET);  // Move pointer to byte 10 from the beginning
    echo fread($file, 5);        // Read the next 5 bytes
    fclose($file);
} else {
    echo "Error opening file.";
}

ftell($file);//	Returns the current position in the file
rewind($file);//Resets pointer to the beginning

