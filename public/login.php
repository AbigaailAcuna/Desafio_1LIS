<?php
  session_start();

  $usernameErr = $passwordErr = "";
  $username = $password = "";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function validateLogin($usuario, $contrasena) {
    $usuarios = simplexml_load_file("../xml/usuarios.xml");

    foreach ($usuarios->usuario as $u) {
      if ($u->nombre == $usuario && $u->contrasena == $contrasena) {
        return true;
      }
    }

    return false;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
    } else {
      $username = test_input($_POST["username"]);
    }

    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } else {
      $password = test_input($_POST["password"]);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($usernameErr == "" && $passwordErr == "") {
        if (validateLogin($username, $password)) {
          // Redirect to admin page on successful login
          header("Location: ../admin/index.php");
          exit();
        } else {
          $_SESSION["error_msg"] = "Usuario o Contraseña invalida";
          header("Location: login.php");
          exit();
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/estilologin.css">
</head>
<body>
  <div class="login-box">
     <img src="css/logo.png" alt="TextilExport">
    <h2>Inicio de sesión</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="user-box">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required="">
        <span class="error"><?php echo $usernameErr;?></span>
      </div>
      <div class="user-box">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required="">
        <span class="error"><?php echo $passwordErr;?></span>
      </div>
      <div class="btn-box">
        <button type="submit" name="login">Login</button>
      </div>
      <?php
        if (isset($_SESSION["error_msg"])) {
          echo '<p class="error">' . $_SESSION["error_msg"] . '</p>';
          unset($_SESSION["error_msg"]);
        }
      ?>
    </form>
  </div>
</body>
</html>
