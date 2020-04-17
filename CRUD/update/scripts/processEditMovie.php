<?php
require_once '../../../DB/db_connect.php';
$target_dir = "../../../img/";
$target_file = $target_dir . basename($_FILES["userFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $movie_name = filter_var($_POST["movie_name"], FILTER_SANITIZE_STRING);
    $movie_release_date = $_POST["movie_release_date"];
    $movie_description = filter_var($_POST["movie_description"], FILTER_SANITIZE_STRING);
    $studio = filter_var($_POST["studio"], FILTER_SANITIZE_NUMBER_INT);
    $id = $_POST["id"];

    // Check if a new photo is being uploaded
    if (isset($_FILES["userFile"]) && $_FILES["userFile"]["name"]) {
        $check = getimagesize($_FILES["userFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG or JPEG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["userFile"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["userFile"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $movie_image = ltrim($target_file,"./");

        list($width, $height) = getimagesize($target_file);
        $newImage = imagecreatefromjpeg($target_file);
        $newWidth = 286;
        $newHeight = 406;
        $thumb = "../../../img/thumbnails/" . $_FILES["userFile"]["name"];
        $truecolor = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($truecolor, $newImage, 0,0,0,0, $newWidth, $newHeight, $width, $height);
        imagejpeg($truecolor, $thumb, 100);
        $movie_thumbnail = ltrim($thumb, "./");
    }
}

if (isset($_FILES["userFile"]) && $_FILES["userFile"]["name"]) {
    $sql = 'UPDATE Movie SET studio_id = '.$studio.', movie_name = "'.$movie_name.'", movie_release_date = "'.$movie_release_date.'", movie_description = "'.$movie_description.'", movie_image_location = "'.$movie_image.'", movie_thumbnail = "'.$movie_thumbnail.'" WHERE movie_id = '.$id;
} else {
    $sql = 'UPDATE Movie SET studio_id = '.$studio.', movie_name = "'.$movie_name.'", movie_release_date = "'.$movie_release_date.'", movie_description = "'.$movie_description.'" WHERE movie_id = '.$id;
}


if (!$connection->query($sql)) {
    echo "ERROR: " . mysqli_error($connection);
} else {
    header("location: https://cit228.pbsteele.com/FinalProject/CRUD/view/movie/viewMovie-loggedin.php");
}
