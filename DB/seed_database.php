<?php



include("db_connect.php");

$file = 'seeds/db_seed.sql';

$fo = fopen($file, 'r');

$fr = fread($fo, filesize($file));

$sql_array_item = explode(';', $fr);

$result = '';

foreach ($sql_array_item as $sql) {

    if ($connection->multi_query($sql) === true) {

        $result .= "<h3>Successfully ran query:</h3> <p style='font-weight:bold; color: green'>" . $sql . "</p>";

    } else {

        $result .= "<h3>Sorry something went wrong! </h3> <p style='font-weight: bold; color: red'>Error: " . mysqli_error($connection) . "</p>";

    }

}

echo $result;

$connection->close();

fclose($fo);