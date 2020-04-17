<?php

$id = filter_var($_GET["id"], FILTER_SANITIZE_NUMBER_INT);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete</title>
    <link rel="stylesheet" href="../../../css/bootstrap.css">
    <link rel="stylesheet" href="../../../css/jquery-ui.min.css">
</head>
<body>
<div id="delete-confirm">Are you sure you want to Delete?</div>
<div style="display: none" id="id"><?php echo $id; ?></div>
</body>
<script src="../../../js/jquery-3.4.1.min.js"></script>
<script src="../../../js/jquery-ui.js"></script>
<script src="../../../js/deleteConfirm/deleteUserConfirm.js"></script>
</html>