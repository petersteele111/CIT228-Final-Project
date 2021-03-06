<?php session_start(); require_once '../../DB/db_connect.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Studio</title>
    <link rel="stylesheet" href="../../css/component-chosen.css">
    <?php require_once '../../inc/head/head.html' ?>
</head>
<body>
<?php require_once "../../inc/nav/navCheck.php"; ?>
<div class="container-fluid">
    <div class="d-flex flex-column" style="min-width: 100%;">
        <div class="row justify-content-center mt-5">
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-header">Add Studio</div>
                    <div class="card-body">
                        <form method="POST" action="scripts/processAddStudio.php" >
                            <div class="form-group row">
                                <label for="studio_name" class="col-md-4 col-form-label text-md-right">Studio Name</label>
                                <div class="col-md-6">
                                    <input id="studio_name" type="text" class="form-control" name="studio_name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="studio_phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                <div class="col-md-6">
                                    <input id="studio_phone" type="tel" class="form-control" name="studio_phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="studio_email" class="col-md-4 col-form-label text-md-right">Email Address</label>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="studio_email" id="studio_email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="studio_address" class="col-md-4 col-form-label text-md-right">Studio Address</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="studio_address" id="studio_address">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-right">City, State, Zip</label>
                                <div class="col-md-6">
                                    <select name="zipcode" id="zipcode" class="form-control form-control-chosen">
                                        <option value="">Please Select a City, State, Zip</option>
                                        <option disabled>-------------------------</option>
                                        <?php
                                        $sql = "SELECT zipcode_id, zipcode, zipcode_city, zipcode_state FROM Zipcode";
                                        $result = $connection->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row['zipcode_id'].'">'.$row['zipcode_city'].', '.$row['zipcode_state'].' '.$row['zipcode'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Add Studio
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
