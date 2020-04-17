<?php session_start(); require_once '../../DB/db_connect.php'; ?>
<?php

$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

$sql = 'SELECT * FROM Studio S LEFT JOIN Zipcode Z ON S.zipcode_id = Z.zipcode_id WHERE studio_id =' . $id;

$result = $connection->query($sql);

if ($result->num_rows){
    while ($row = $result->fetch_assoc()) {
        $zipcode_id = $row["zipcode_id"];
        $zipcode = $row["zipcode"];
        $city = $row["zipcode_city"];
        $state = $row["zipcode_state"];
        $studio_name = $row["studio_name"];
        $studio_phone = $row["studio_phone"];
        $studio_email = $row["studio_email"];
        $studio_address = $row["studio_address"];
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
    <title>Update Studio</title>
    <?php require_once '../../inc/head/head.html' ?>
</head>

<body>
<?php require_once "../../inc/nav/navCheck.php"; ?>
<div class="container-fluid">
    <div class="d-flex flex-column" style="min-width: 100%;">
        <div class="row justify-content-center mt-5">
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-header">Update Studio</div>
                    <div class="card-body">
                        <form method="POST" action="scripts/processUpdateStudio.php" >
                            <input type="hidden" name="id" id="id" value="<? echo $id; ?>">
                            <div class="form-group row">
                                <label for="studio_name" class="col-md-4 col-form-label text-md-right">Studio Name</label>
                                <div class="col-md-6">
                                    <input id="studio_name" type="text" class="form-control" name="studio_name" value="<? echo $studio_name; ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="studio_phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                <div class="col-md-6">
                                    <input id="studio_phone" type="tel" class="form-control" name="studio_phone" value="<? echo $studio_phone; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="studio_email" class="col-md-4 col-form-label text-md-right">Email Address</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="studio_email" id="studio_email" value="<? echo $studio_email; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="studio_address" class="col-md-4 col-form-label text-md-right">Studio Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="studio_address" id="studio_address" value="<? echo $studio_address; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-right">City, State, Zip</label>
                                <div class="col-md-6">
                                    <select name="zipcode" id="zipcode" class="form-control form-control-chosen">
                                        <?php
                                            if ($zipcode === NULL || $zipcode === "") {
                                                echo '<option selected disabled>Please Select a City, State, Zip</option>';
                                            } else {
                                                echo '<option selected value="'.$zipcode_id.'">'.$city . ', ' .$state. ' ' .$zipcode.'</option>';
                                            }
                                        ?>
                                        <option disabled>----------------------------------------</option>
                                        <?php
                                        unset($sql);
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
                                        Update Studio
                                    </button>
                                    <button type="reset" name="reset" class="btn btn-danger">
                                        Clear
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
