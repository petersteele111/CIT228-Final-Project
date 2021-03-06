<?php
session_start();
require_once 'DB/db_connect.php';
function isLoggedIn()
{
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
        return true;
    } else {
        return false;
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
    <title>Final Project</title>
    <?php
    require_once 'inc/head/head.html';
    ?>
</head>
<body>
<?php
if (isLoggedIn()) {
    require_once 'inc/nav/nav-loggedin.php';
} else {
    require_once 'inc/nav/nav.html';
}

?>

<?php

if (isLoggedIn()) {
    require_once 'inc/header/header-loggedin.php';
} else {
    require_once 'inc/header/header.html';
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
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
        <div class="col-12">
            <h1>Popular Movies</h1>
        </div>
    </div>
    <div class="row">
        <?php
        $sql = 'SELECT * FROM Movie LIMIT 4';
        $result = $connection->query($sql);
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["movie_id"];
                $studio_id = $row["studio_id"];
                $name = $row["movie_name"];
                $release_date = date('F d, Y', strtotime($row["movie_release_date"]));
                $description = $row["movie_description"];
                $thumbnail = $row["movie_thumbnail"];

                if (strlen($description) > 250) {
                    $shortened_description = substr($description, 0, 250) . ' . . . . . .';
                } else {
                    $shortened_description = $description;
                }


                echo '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">';
                echo '<div class="card mt-5">';
                if ($thumbnail === "" || $thumbnail === NULL) {
                    echo '<img class="card-img-top" src="https://via.placeholder.com/286x406.jpg?text=Please+Upload+An+Image" alt="Placeholder Image for '.$name.'">';
                } else {
                    echo '<a href="https://cit228.pbsteele.com/FinalProject/CRUD/view/movie/viewMovie.php?id='.$id.'"><img class="card-img-top" src=" ' . $thumbnail . '" alt=" '.$name.'"></a>';
                }
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $name . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted">Release Date: ' . $release_date . '</h6>';
                echo '<p class="card-text">' . $shortened_description . '</p>';
                echo '<a href="https://cit228.pbsteele.com/FinalProject/CRUD/view/movie/viewMovie.php?id=' . $id . '" class="btn btn-primary">View More</a>';
                echo '</div></div></div>';
            }
        } else {
            echo "<p>Sorry, no results were found</p>";
        }
        $connection->close();
        ?>
    </div>
</div>
<?php
require_once 'inc/footer/footer.php';
?>
</body>

</html>