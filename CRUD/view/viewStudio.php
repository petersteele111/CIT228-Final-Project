<?php
session_start();

require_once '../../DB/db_connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Users</title>
    <?php
    require_once '../../inc/head/head.html';
    ?>
</head>
<body>
<?php
require_once '../../inc/nav/navCheck.php';
?>

<?php
require_once '../../inc/header/headerCheck.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Studios</h1>
            <p>This page will show all of the studios that are currently stored in the system. Please login to edit and delete records.</p>
        </div>
    </div>
    <div class="row table-responsive text-nowrap">
        <table class="table table-striped w-auto">
            <thead>
            <tr>
                <th scope="col">Studio Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">City/State/Zip</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once '../../DB/db_connect.php';
            $sql = 'SELECT * FROM Studio LEFT JOIN Zipcode Z on Studio.zipcode_id = Z.zipcode_id';

            $result = $connection->query($sql);
            if ($result->num_rows) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["studio_id"];
                    $name = $row["studio_name"];
                    $phone = $row["studio_phone"];
                    $email = $row["studio_email"];
                    $address = $row["studio_address"];
                    $zipcode = $row["zipcode"];
                    $city = $row["zipcode_city"];
                    $state = $row["zipcode_state"];

                    echo '<tr>';
                    echo '<td>'.$name.'</td>';
                    echo '<td>'.$phone.'</td>';
                    echo '<td>'.$email.'</td>';
                    echo '<td>'.$address.'</td>';
                    if ($zipcode === NULL || $zipcode === "") {
                        echo '<td>'.$zipcode.'</td>';
                    } else {
                        echo '<td>'.$city.', '.$state.' '.$zipcode.'</td>';
                    }

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
<?php
require_once '../../inc/footer/footer.php';
?>
</body>
</html>
