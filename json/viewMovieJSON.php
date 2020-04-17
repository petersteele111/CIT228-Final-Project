<?php
session_start();
$movies = file_get_contents('https://cit228.pbsteele.com/FinalProject/json/movies.json');
$movies = utf8_encode($movies);

$movieObj = json_decode($movies);

foreach ($movieObj->Movie as $m) {
    $movie_id = $m->MovieID;
    $studio_id = $m->StudioID;
    $zipcode_id = $m->ZipcodeID;
    $movie_name = $m->MovieName;
    $movie_release_date = date('F d, Y',strtotime($m->MovieReleaseDate));
    $movie_description = $m->MovieDescription;
    $movie_image = $m->MovieImage;
    $movie_thumbnail = $m->MovieThumbnail;
    $studio_name = $m->StudioName;
    $studio_phone = $m->StudioPhone;
    $studio_email = $m->StudioEmail;
    $studio_address = $m->StudioAddress;
    $zipcode = $m->Zipcode;
    $city = $m->City;
    $state = $m->State;

    $display .= '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3"><div class="card my-5">' . '<a href="https://cit228.pbsteele.com/FinalProject/'.$movie_image.'" data-lightbox="JSON Movies" data-title="'.$movie_name.'"><img class="card-img-top" src="https://cit228.pbsteele.com/FinalProject/'.$movie_thumbnail.'" alt="'.$movie_name.'"></a>' . '<div class="card-body"><h5 class="card-title">'.$movie_name.'<h6 class="card-subtitle mb-2 text-muted">Release Date: ' .$movie_release_date. '</h6><p class="card-text">'.$movie_description.'</p>' . '<p>Studio Name: '.$studio_name.'</p>' . '<p>Studio Phone: '.$studio_phone.'</p>' . '<p>Studio Email: '.$studio_email.'</p>' . '<p>Studio Address: <br>'.$studio_address. '<br>'. $city.', '.$state.' '.$zipcode.'</p>'.'<p>Movie ID: '.$movie_id.'</p>'. '<p>Studio ID: '.$studio_id.'</p>' . '<p> Zipcode ID: '.$zipcode_id.'</p>' . '</div></div></div>';
}


?>
<!doctype html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Movies JSON</title>
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
            <h3>JSON Movie Data</h3>
        </div>
    </div>
    <div class="row">
        <? echo $display; ?>
    </div>
</div>
<?php
require_once '../inc/footer/footer.php';
?>
</body>
</html>