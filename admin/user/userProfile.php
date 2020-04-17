<?php require_once '../scripts/verifyIsLoggedIn.php' ?>
<?php
require_once '../../DB/db_connect.php';
$sql = 'SELECT * FROM User WHERE user_id = "'.$_SESSION["id"].'"';
if ($result = $connection->query($sql)) {
    while ($row = $result->fetch_row()) {
        $zipcode_id = $row[1];
        $first_name = $row[2];
        $last_name = $row[3];
        $email = $row[5];
        $phone = $row[6];
        $address = $row[7];
    }
}
unset($sql);
$sql = 'SELECT * FROM Zipcode WHERE zipcode_id = "'.$zipcode_id.'"';
if ($result = $connection->query($sql)) {
    while ($row = $result->fetch_row()) {
        $zipcode = $row[1];
        $city = $row[2];
        $state = $row[3];
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
    <title>User Profile</title>
<?php require_once '../../inc/head/head.html' ?>
</head>
<body>
<?php require_once '../../inc/nav/navCheck.php'; ?>
<?php require_once '../../inc/header/userHeader.php' ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="col-sm-12">
                <h1>User Information <a href="https://cit228.pbsteele.com/FinalProject/admin/user/updateUserProfile.php"><i style="font-size: 1rem" class="fas fa-edit"></i></a></h1>
            </div>
            <h5>Name</h5>
            <p><?php echo $first_name . " " . $last_name; ?></p>
            <h5>Email</h5>
            <p><?php echo $email; ?></p>
            <h5>Phone</h5>
            <p><?php
                if ($phone === NULL || $phone == "") {
                    echo "No Phone Number Set";
                } else {
                   echo $phone;
                } ?>
            </p>
            <h5>Address</h5>
            <p><?php
                if ($address === NULL || $address === "") {
                    echo "No Address Set";
                } else if ($zipcode === NULL || $zipcode === "") {
                    echo $address;
                } else {
                    echo $address . "<br>" . $city . ", " . $state . " " . $zipcode;
                }
                ?>
            </p>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="col-sm-12">
                <h1>Movies Watched</h1>
            </div>
            <div class="row">
            <?php
            unset($sql);
            $sql = 'SELECT * FROM User_Movie U LEFT JOIN Movie M on U.movie_id = M.movie_id WHERE user_id = '.$_SESSION["id"];
            $result = $connection->query($sql);
            if ($result->num_rows) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["movie_id"];
                    $studio_id = $row["studio_id"];
                    $name = $row["movie_name"];
                    $release_date = date('F d, Y', strtotime($row["movie_release_date"]));
                    $description = $row["movie_description"];
                    $thumbnail = $row["movie_thumbnail"];

                    $shortened_description = substr($description, 0, 250) . ' . . . . . .';

                    echo '<div class="col-sm-12 col-md-4">';
                    echo '<h6 class="my-3">'.$name.'</h6>';
                    if ($thumbnail === "" || $thumbnail === NULL) {
                        echo '<img src="https://via.placeholder.com/286x406.jpg?text=Please+Upload+An+Image" alt="Placeholder Image for '.$name.'">';
                    } else {
                        echo '<a href="https://cit228.pbsteele.com/FinalProject/CRUD/view/movie/viewMovie.php?id='.$id.'"><img class="img-fluid mb-3" src="https://cit228.pbsteele.com/FinalProject/' . $thumbnail . '" alt=" '.$name.'"></a>';
                    }
                    echo '</div>';
                }
            } else {
                echo "<p>Sorry, no results were found</p>";
            }
            $connection->close();
            ?>
            </div>
        </div>
    </div>
</div>
<?php require_once '../../inc/footer/footer.php'; ?>
</body>
</html>
