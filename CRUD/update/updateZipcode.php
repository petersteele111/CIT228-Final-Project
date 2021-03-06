<?php require_once '../../admin/scripts/verifyIsLoggedIn.php';?>
<?php
require_once '../../DB/db_connect.php';
$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

$sql = 'SELECT * FROM Zipcode WHERE zipcode_id =' . $id;

$result = $connection->query($sql);
if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        $zipcode = $row["zipcode"];
        $city = $row["zipcode_city"];
        $state = $row["zipcode_state"];
    }
}
$connection->close();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Zipcode</title>
    <?php require_once '../../inc/head/head.html' ?>
</head>
<body>
<?php require_once "../../inc/nav/navCheck.php"; ?>
<div class="container-fluid">
    <div class="d-flex flex-column" style="min-width: 100%;">
        <div class="row justify-content-center mt-5">
            <div class="col-xs-12 col-md-6">
                <div class="card">
                    <div class="card-header">Update Zipcode</div>
                    <div class="card-body">
                        <form method="POST" action="scripts/processUpdateZipcode.php" >
                            <input type="hidden" name="_token" value="s08l2iZnTeSxoqxxJClwam8RfFw8zvmcmvrPqZUM">
                            <input type="hidden" name="id" id="id" value="<? echo $id; ?>">
                            <div class="form-group row">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-right">Zipcode</label>
                                <div class="col-md-6">
                                    <input id="zipcode" type="number" class="form-control" name="zipcode" value="<? echo $zipcode; ?>" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipcode_city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <input id="zipcode_city" type="text" class="form-control" name="zipcode_city" value="<? echo $city; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipcode_state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="zipcode_state" id="zipcode_state" value="<? echo $state ?>" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Update Zipcode
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
</body>
</html>
