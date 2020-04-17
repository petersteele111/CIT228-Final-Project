<?php
require_once '../../../admin/scripts/verifyIsLoggedIn.php';
require_once '../../../DB/db_connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Users - Admin</title>
    <?php
    require_once '../../../inc/head/head.html';
    ?>
</head>
<body>
<?php
require_once '../../../inc/nav/navCheck.php';
?>

<?php
require_once '../../../inc/header/headerCheck.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Movies</h1>
            <p>This page will show all of the movies that are currently stored in the system. This page will be tweaked for the final project to show movies a grid system like the front page with pagination.</p>
        </div>
    </div>
    <div class="row">

        <?php
        $sql = 'SELECT * FROM Movie LEFT JOIN Studio S on Movie.studio_id = S.studio_id';

        $result = $connection->query($sql);
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["movie_id"];
                $name = $row["movie_name"];
                $release_date = date('F d, Y', strtotime($row["movie_release_date"]));
                $description = $row["movie_description"];
                $thumbnail = $row["movie_thumbnail"];
                $studio = $row["studio_name"];
                $shortened_description = substr($description, 0, 250) . ' . . . . . .';

                echo '<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">';
                echo '<div class="card mt-5">';
                if ($thumbnail === "" || $thumbnail === NULL) {
                    echo '<img class="card-img-top" src="https://via.placeholder.com/286x406.jpg?text=Please+Upload+An+Image" alt="Placeholder Image for '.$name.'">';
                } else {
                    echo '<img class="card-img-top" src="https://cit228.pbsteele.com/FinalProject/' . $thumbnail . '" alt=" '.$name.'">';
                }
                echo ' <div class="card-body">';
                echo '<h5 class="card-title">' . $name . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted">Release Date: ' . $release_date . '</h6>';
                echo '<p class="card-text">' . $shortened_description . '</p>';
                echo '<a href="https://cit228.pbsteele.com/FinalProject/CRUD/view/movie/viewMovie.php?id=' . $id . '" class="btn btn-primary">View More</a>';
                echo ' <a href="https://cit228.pbsteele.com/FinalProject/admin/scripts/addMovieToUserConfirm.php?id=' . $id . '" class="btn btn-danger">Add Movie</a>';
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
require_once '../../../inc/footer/footer.php';
?>
</body>
</html>
