<?php
$server = "localhost";
$username = "root";
$password ="";
$database = "users";

$conn = mysqli_connect($server, $username, $password, $database);        // database connect
if(!$conn)
{
//     echo  "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>
