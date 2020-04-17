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
    <title>View Movies - Admin</title>
    <?php
    require_once '../../../inc/head/head.html';
    ?>
</head>
<body>
<?php
require_once '../../../inc/nav/navCheck.php';
?>

<?php
require_once '../../../inc/header/header-loggedin.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Movies</h1>
            <p>This page will show all of the movies that are currently stored in the system. Since this is an admin page, you can directly edit or delete movies from this page. This page will be tweaked for the final project to show movies a grid system like the front page with pagination.</p>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped  table-responsive">
            <thead>
            <tr class="text-nowrap">
                <th scope="col">Movie Name</th>
                <th scope="col">Release Date</th>
                <th scope="col">Description</th>
                <th scope="col">Movie Image</th>
                <th scope="col">Studio</th>
                <th scope="col">Edit/Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = 'SELECT * FROM Movie LEFT JOIN Studio S on Movie.studio_id = S.studio_id';

            $result = $connection->query($sql);
            if ($result->num_rows) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["movie_id"];
                    $name = $row["movie_name"];
                    $release_date = $row["movie_release_date"];
                    $description = $row["movie_description"];
                    $thumbnail_location = $row["movie_thumbnail"];
                    $studio = $row["studio_name"];
                    $shortened_description = substr($description, 0, 250) . ' . . . . . .';

                    echo '<tr>';
                    echo '<td class="text-nowrap">'.$name.'</td>';
                    echo '<td class="text-nowrap">'.$release_date.'</td>';
                    echo '<td>'.$shortened_description.'</td>';
                    if ($thumbnail_location === "" || $thumbnail_location === NULL) {
                        echo '<td>Image not currently uploaded!</td>';
                    } else {
                        echo '<td><img src="https://cit228.pbsteele.com/FinalProject/'.$thumbnail_location.'" alt="'.$name.'"></td>';
                    }
                    echo '<td class="text-nowrap">'.$studio.'</td>';
                    echo '<td><a href="https://cit228.pbsteele.com/FinalProject/CRUD/update/updateMovie.php?id='.$id.'"><i class="fas fa-edit"></i></a> | <a href="https://cit228.pbsteele.com/FinalProject/CRUD/delete/scripts/deleteMovieConfirmation.php?id='.$id.'"<i class="fas fa-trash" style="color: red"></i></a> </td>';
                    echo '</tr>';
                }
            } else {
                echo "<p>Sorry, no results were found</p>";
            }
            $connection->close();

            ?>
            </tbody>
        </table>
    </div>
</div>
<div id="delete-confirm-movie" style="display: none">Are you sure you wish to delete the movie <?php echo $name; ?></div>
<?php
require_once '../../../inc/footer/footer.php';
?>
</body>
</html>
