<?php
$host = "localhost";
$db = "contacts_app";
$user = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$db",$user,$password);
  // foreach ($conn->query("SELECT * FROM contacts") as $row) {
  //   print_r($row);
  // }
  // die();
} catch (PDOException $e) {
  die("PDO connection Error" . $e->getMessage());
}
