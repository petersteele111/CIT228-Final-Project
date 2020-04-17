<?php
session_start();
require_once '../DB/db_connect.php';
$response = array();
$movies = array();
$sql = 'SELECT * FROM Movie left join Studio S on Movie.studio_id = S.studio_id left join Zipcode Z on S.zipcode_id = Z.zipcode_id';

$result = $connection->query($sql);

if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["movie_id"];
        $studio_id = $row["studio_id"];
        $zipcode_id = $row["zipcode_id"];
        $name = $row["movie_name"];
        $release_date = $row["movie_release_date"];
        $description = $row["movie_description"];
        $image = $row["movie_image_location"];
        $thumbnail = $row["movie_thumbnail"];
        $studio_name = $row["studio_name"];
        $studio_phone = $row["studio_phone"];
        $studio_email = $row["studio_email"];
        $studio_address = $row["studio_address"];
        $zipcode = $row["zipcode"];
        $city = $row["zipcode_city"];
        $state = $row["zipcode_state"];
        $movies[] = array('MovieID'=>$id, 'StudioID'=>$studio_id, 'ZipcodeID'=>$zipcode_id, 'MovieName'=>$name, 'MovieReleaseDate'=>$release_date, 'MovieDescription'=>$description, 'MovieImage'=>$image, 'MovieThumbnail'=>$thumbnail, 'StudioName'=>$studio_name, 'StudioPhone'=>$studio_phone, 'StudioEmail'=>$studio_email, 'StudioAddress'=>$studio_address, 'Zipcode'=>$zipcode, 'City'=>$city, 'State'=>$state);
    }
}

$response['Movie'] = $movies;
$fp = fopen('movies.json', 'w');
if (!fwrite($fp, json_encode($response))) {
    $status = 1;
} else {
    $status = 0;
}

fclose($fp);
$connection->close();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate Movies JSON</title>
    <?php
    require_once '../inc/head/head.html';
    ?>
</head>
<body>
<?php
require_once '../inc/nav/navCheck.php';
?>

<?php
require_once '../inc/header/headerCheck.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h1>Welcome</h1>
            <p>Welcome to my Movie Database! This simple application will show movies stored in the Database, along with
                allowing users to indicate which movies they have seen! Users will be able to view a profile page of
                their information and movies watched. They can also view all the movies listed in the database and
                select a movie they want to know more about. This is a simple concept to show working CRUD operations
                with PHP and MySQL. This is not meant to be a commercial application or to be used in a live
                environment.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h4>Create Movie JSON Data</h4>
            <p class="lead">
                <?php
                    if ($status === 1) {
                        echo "ERROR! Something went wrong and the JSON file was not created!";
                    } else {
                        echo "Success! The JSON data was created and is ready to be viewed";
                    }
                ?>
            </p>
            <a class="btn btn-info" href="https://cit228.pbsteele.com/FinalProject/json/viewMovieJSON.php">View JSON Data</a> <a class="btn btn-danger" href="https://cit228.pbsteele.com/FinalProject/json/movies.json">View RAW JSON Data</a>
        </div>
    </div>
</div>
<?php
require_once '../inc/footer/footer.php';
?>
</body>

</html>