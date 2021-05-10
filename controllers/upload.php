<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>


<?php
$conn = "";
$sql = "SELECT `account_ID` FROM `files` WHERE 1;";
// pdo etc
// Get the user id which will be the path

$UserId = "Tycho";

$target_dir = "../Files/" . $UserId . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".<br><br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "File with this name already exists. <br>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large. <br>";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "webp" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Your file was not uploaded because one or multiple errors. ";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file. <br>";
    }


}

echo "<br>";
echo "<br> File size: ";

$bytes = $_FILES["fileToUpload"]["size"];
if ($_FILES["fileToUpload"]["size"] >= 1073741824) {
            echo number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            echo number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            echo number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            echo $bytes . ' bytes';
        } elseif ($bytes == 1) {
            echo '1 byte';
        } else {
            echo '0 bytes';
}

echo "<br> Filetype: ";
echo $imageFileType;
echo "<br> File name: ";
echo $_FILES["fileToUpload"]["name"];


?>

</body>
</html>
