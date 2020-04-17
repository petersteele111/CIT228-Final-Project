<?php
session_start();
require_once '../../../DB/db_connect.php';

$id = $_GET["id"];

$sql = 'SELECT * FROM Movie m LEFT JOIN Studio s on m.studio_id = s.studio_id LEFT JOIN Zipcode z on s.zipcode_id = z.zipcode_id WHERE movie_id = '.$id.'';

$result = $connection->query($sql);
if($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["movie_name"];
        $release_date = date('F d, Y', strtotime($row["movie_release_date"]));
        $description = $row["movie_description"];
        $thumbnail_location = $row["movie_thumbnail"];
        $image = $row["movie_image_location"];
        $studio_name = $row["studio_name"];
        $studio_phone = $row["studio_phone"];
        $studio_email = $row["studio_email"];
        $studio_address = $row["studio_address"];
        $zipcode = $row["zipcode"];
        $city = $row["zipcode_city"];
        $state = $row["zipcode_state"];
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $name; ?></title>
    <?php
    require_once '../../../inc/head/head.html';
    ?>
</head>
<body>
<?php
require_once '../../../inc/nav/navCheck.php';
?>

<?php
require_once '../../../inc/header/checkMovieHeader.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <figure>
                <?php
                    if ($thumbnail_location === "" || $thumbnail_location === NULL) {
                        echo '<img src="https://via.placeholder.com/286x406.jpg?text=Please+Upload+An+Image" alt="Placeholder Image for '.$name.'" class=" d-block img-fluid mx-auto">';
                    } else {
                        echo '<a href="https://cit228.pbsteele.com/FinalProject/'.$image.'" data-lightbox="'.$name.'" data-title="'.$name.'"><img src="https://cit228.pbsteele.com/FinalProject/'.$thumbnail_location.'" alt="'.$name.'" class=" d-block img-fluid mx-auto"></a>';
                    }
                ?>
                <figcaption class="text-center">Movie Cover for <?php echo $name; ?></figcaption>
            </figure>
        </div>
        <div class="col-sm-12 col-md-9">
            <h1>Description</h1>
            <p><?php echo $description; ?></p>
            <h4>Studio Information</h4>
            <h6>Studio Name</h6>
            <p><?php echo $studio_name; ?></p>
            <h6>Phone Number</h6>
            <p><?php echo $studio_phone; ?></p>
            <h6>Email Address</h6>
            <p><?php echo $studio_email; ?></p>
            <h6>Studio Address</h6>
            <p><?php
                if ($zipcode === NULL || $zipcode === "") {
                    echo $studio_address;
                } else {
                    echo $studio_address . '<br>' . $city . ', ' . $state . ' ' . $zipcode;
                }
                ?>
            </p>
        </div>
    </div>
</div>
<?php
require_once '../../../inc/footer/footer.php';
?>
</body>
</html>


