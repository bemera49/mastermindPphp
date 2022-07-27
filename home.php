<?php
require_once "db.php";

$contacts = $conn->query("SELECT * FROM contacts");
?>

<?php require "partial/header.php" ?>
<div class="container pt-4 pt-3">
  <div class="row">

    <?php if ($contacts->rowCount() == 0) : ?>
      <!--rowCount recorre lo que trae de la consulta -->
      <div class="col-md-4 mx-auto">
        <div class="card card-body text-center">
          <p>No contacts saved yet</p>
          <a href="add.php">Add One!</a>
        </div>
      </div>
    <?php endif ?>
    <?php foreach ($contacts as $contact) : ?>
      <div class="col-md-4 mb-3">
        <div class="card text-center">
          <div class="card-body">
            <h3 class="card-title text-capitalize"><?php echo $contact['name'] ?></h3>
            <p class="m-2"><?php echo $contact['phone_number'] ?></p>
            <a href="update.php?id=<?= $contact['id']; ?>" class="btn btn-secondary mb-2">Edit Contact</a>
            <a href="delete.php?id=<?= $contact['id']; ?>" class="btn btn-danger mb-2">Delete Contact</a>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

<?php require "partial/footer.php";