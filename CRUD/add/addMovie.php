<?php session_start(); require_once '../../DB/db_connect.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Movie</title>
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
                    <div class="card-header">Add Movie</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="scripts/processAddMovie.php" >
                            <div class="form-group row">
                                <label for="movie_name" class="col-md-4 col-form-label text-md-right">Movie Name</label>
                                <div class="col-md-6">
                                    <input id="movie_name" type="text" class="form-control" name="movie_name" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="movie_release_date" class="col-md-4 col-form-label text-md-right">Movie Release Date</label>
                                <div class="col-md-6">
                                    <input id="movie_release_date" type="date" class="form-control" name="movie_release_date" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="movie_description" class="col-md-4 col-form-label text-md-right">Movie Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="movie_description" name="movie_description" rows="10" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="movie_thumbnail" class="col-md-4 col-form-label text-md-right">Movie Image</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="userFile">
                                    <p style="color: red; font-size: .8rem;">Note: JPG or JPEG only</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="studio" class="col-md-4 col-form-label text-md-right">Studio</label>
                                <div class="col-md-6">
                                    <select name="studio" id="studio" class="form-control form-control-chosen" required>
                                        <?php
                                        $sql = "SELECT studio_id, studio_name FROM Studio";
                                        $result = $connection->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="'.$row['studio_id'].'">'.$row['studio_name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Add Movie
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


