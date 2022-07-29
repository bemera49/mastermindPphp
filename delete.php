<?php 

require_once "db.php";
session_start();
if(!isset($_SESSION["user"])){
  header("Location: login.php");
  return;
}
$id = $_GET['id'];

$sql = $conn->prepare("SELECT * FROM contacts WHERE id=:id LIMIT 1");
$sql->execute([":id" => $id]);

if($sql ->rowCount() == 0){
  http_response_code(404);
  echo "HTTP 404 NOT FOUND";
  return;
}

$contact = $sql->fetch(PDO::FETCH_ASSOC);
if($contact["user_id"] != $_SESSION["user_id"]["id"]){
  http_response_code(403);
  echo "HTTP 404 NOT FOUND";
  return;
}

$sql= $conn->prepare("DELETE FROM contacts WHERE id=:id");
$sql->bindParam(":id", $id);
$sql->execute();

header("Location: home.php");

?>
