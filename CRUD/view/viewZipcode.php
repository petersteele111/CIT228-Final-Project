<?php
require_once '../../admin/scripts/verifyIsLoggedIn.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Zipcode - Admin</title>
    <?php
    require_once '../../inc/head/head.html';
    ?>
</head>
<body>
<?php
require_once '../../inc/nav/navCheck.php';
?>

<?php
require_once '../../inc/header/header-loggedin.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Zipcodes</h1>
            <p>This page will show all of the zipcodes that are currently stored in the system. Since this is an admin page, you can directly edit or delete zipcodes from this page.</p>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped table-responsive-sm">
            <thead>
            <tr>
                <th scope="col">Zipcode</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Edit/Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once '../../DB/db_connect.php';
            $sql = 'SELECT * FROM Zipcode';

            $result = $connection->query($sql);
            if ($result->num_rows) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["zipcode_id"];
                    $zipcode = $row["zipcode"];
                    $zipcode_city = $row["zipcode_city"];
                    $zipcode_state = $row["zipcode_state"];

                    echo '<tr>';
                    echo '<td>'.$zipcode.'</td>';
                    echo '<td>'.$zipcode_city.'</td>';
                    echo '<td>'.$zipcode_state.'</td>';
                    echo '<td><a href="https://cit228.pbsteele.com/FinalProject/CRUD/update/updateZipcode.php?id='.$id.'"><i class="fas fa-edit"></i></a> | <a href="https://cit228.pbsteele.com/FinalProject/CRUD/delete/scripts/deleteZipcodeConfirmation.php?id='.$id.'"><i class="fas fa-trash" style="color: red"></i></a> </td>';
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