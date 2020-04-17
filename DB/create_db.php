<?php

include ("db_connect.php");
$file = 'sql/Movie DB_mysql_create.sql';
$fo = fopen($file, 'r');
$fr = fread($fo, filesize($file));
$sql_array_item = explode(';', $fr);
foreach ($sql_array_item as $sql) {
    if ($connection->query($sql) === true) {
        echo "<h3>Successfully ran query:</h3> <p style='font-weight:bold; color: green'>".$sql."</p>";
    } else {
        echo "<h3>Sorry something went wrong! </h3> <p style='font-weight: bold; color: red'>Error: " . mysqli_error($connection) . "</p>";
    }
}
echo "<p style='color: red; font-weight: bold'>*Can Safely Ignore last warning. Bug in the code that uses a blank query when using the foreach loop. Does not effect creation of tables and DB</p>";
$connection->close();
fclose($fo);