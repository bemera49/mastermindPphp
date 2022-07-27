<?php 

require_once "db.php";

$id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM contacts WHERE id=:id");
$sql->execute([":id" => $id]);

if($sql ->rowCount() == 0){
  http_response_code(404);
  echo "HTTP 404 NOT FOUND";
  return;
}

$conn->prepare("DELETE FROM contacts WHERE id=:id")->execute([":id", $id]);

header("Location: home.php");
