<?php
require_once '../scripts/verifyIsLoggedIn.php';
require_once '../../DB/db_connect.php';

$query = 'SELECT * FROM User U LEFT JOIN Zipcode Z ON U.zipcode_id = Z.zipcode_id WHERE user_id = "'.$_SESSION["id"].'"';
$zipcode = NULL;
$zipcode_id = NULL;
if ($result = $connection->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $zipcode_id = $row["zipcode_id"];
        $zipcode = $row["zipcode"];
        $city = $row["zipcode_city"];
        $state = $row["zipcode_state"];
        $first_name = $row["user_first_name"];
        $last_name = $row["user_last_name"];
        $email = $row["user_email"];
        $phone = $row["user_phone"];
        $address = $row["user_address"];

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
    <title>Update User Profile</title>
    <?php require_once '../../inc/head/head.html' ?>
</head>
<body>
<?php require_once "../../inc/nav/navCheck.php"; ?>
<div class="container-fluid">
    <div class="d-flex flex-column" style="min-width: 100%;">
        <div class="row justify-content-center mt-5">
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-header">Update User Profile</div>
                    <div class="card-body">
                        <form method="POST" action="../scripts/processUserProfileUpdate.php">
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                <div class="col-md-6">
                                    <input id="phone" type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-right">City, State, Zip</label>
                                <div class="col-md-6">
                                    <select name="zipcode" id="zipcode" class="form-control form-control-chosen">
                                        <option value="<?php if ($zipcode === NULL || $zipcode === ""){
                                            echo 'NULL';
                                        } else {echo $zipcode_id;} ?>" selected>
                                            <?php
                                            if ($zipcode === NULL) {
                                                echo "Please Select a City, State, Zipcode";
                                            } else {
                                                echo $city . ', ' . $state . ' ' . $zipcode;
                                            }
                                            ?>
                                        </option>
                                        <option disabled="disabled">---------------------</option>
                                        <?php

                                        $sql = "SELECT zipcode_id, zipcode, zipcode_city, zipcode_state FROM Zipcode";
                                        $result = $connection->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row['zipcode_id'].'">'.$row['zipcode_city'].', '.$row['zipcode_state'].' '.$row['zipcode'].'</option>';
                                        }
                                        $connection->close();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                                <div class="col-12">
                                    <p><?php $msg = ""; ?></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "../../inc/footer/footer.php"; ?>
<script>
    $('.form-control-chosen').chosen();
</script>
</body>
</html>
