<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "caps_owu"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

try
{
$conn=new PDO("mysql:host=localhost;dbname=caps_owu","root","");
} catch (PDOException $ex) {
echo 'Exception'.$ex->getMessage();
}
