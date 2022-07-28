<pre>
<?php
require_once "db.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"]) || empty($_POST["password"])) {
    $error = "Los campos no pueden estar vacios";
  } else if (!str_contains($_POST["email"], "@")) {
    $error = "El correo es incorrecto";
  } else {
    $sql = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $sql->bindParam(":email", $_POST["email"]);
    $sql->execute();

    if ($sql->rowCount() == 0) {
      $error = "Invalid credentials.";
    } else {
      $user = $sql->fetch(PDO::FETCH_ASSOC);
      if (!password_verify($_POST["password"], $user["password"])) {
        $error = "invalid credentials.";
      } else {
        session_start();

        unset($user["password"]);
        
        $_SESSION["user"] = $user;
        header("Location: home.php");
      }
    }
  }
}
?>
</pre>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css" integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <!-- static content -->
  <link rel="stylesheet" href="static/css/style.css">

  <title>Contats App</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!--Esto es para dar margen -->
      <a class="navbar-brand font-weight-bold" href="#">
        <img class="mr-2" src="static/img/logo.png" />
        ContactsApp
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contacts-app/add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
              <?php if ($error) : ?>
                <p class="text-danger">
                  <?= $error ?>
                </p>
              <?php endif ?>
              <form method="POST" action="login.php">
                <div class="mb-3 row">

                  <div class="mb-3 row">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>

                    <div class="col-md-6">
                      <input id="email" type="tel" class="form-control" name="email" required autocomplete="email" autofocus>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Password:</label>

                    <div class="col-md-6">
                      <input id="password" type="tel" class="form-control" name="password" required autocomplete="password" autofocus>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
