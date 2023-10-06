<?php
session_start ();
$login=$_GET["login"];
$pwd=$_GET["password"];

// Database configuration
$host = "127.0.0.1";
$username = "root";
$password = "";
$database_name = "ecam";

$mysqli = new mysqli($host,$username,$password,$database_name);
if ($mysqli->connect_errno) {
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    die();
}


$query='SELECT * from users where USER_LOGIN="'.$login.'" AND USER_PWD="'.$pwd.'"';

if (!$result = $mysqli->query($query))
{
    print $query;
    die("Erreur SQL");
}
if ($result->num_rows === 0) {
    // Aucun résultat
    print "Aucun résultat";
    print "<br/>";
    print $query;
}
else
{
    $row=$result->fetch_assoc();
    print $query."<br/>";
    print "Welcome ".$row["USER_NAME"]."<br/>";
}
?>