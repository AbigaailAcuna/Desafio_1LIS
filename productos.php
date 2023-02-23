<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TextilExport - Productos</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <nav class="navbar">
    <img src="img/logo.png" alt="TextilExport">
    <a href="login.php">Iniciar sesión</a>

  </nav>

  <div class="producto-container">
    <?php
      // Cargar el archivo XML
      $xml = simplexml_load_file("Administrador/productos.xml");
      
      // Iterar a través de los productos y mostrarlos en la página
      foreach ($xml->producto as $producto) {
        echo '<div class="producto">';
        echo '<img src="' . $producto->img . '" alt="' . $producto->nombre . '">';
        echo '<h2>' . $producto->nombre . '</h2>';
        echo '<p>' . $producto->descripcion . '</p>';
        echo '<p>' . $producto->categoria . '</p>';
        echo '<p>Precio: $' . $producto->precio . '</p>';
        echo '<p>Existencia: ' . $producto->existencias . '</p>';
        echo '</div>';
      }
    ?>
  </div>

  <footer class="footer">
    <p>&copy; 2023 TextilExport</p>
  </footer>
</body>
</html>
