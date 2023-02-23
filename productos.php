<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TextilExport - Productos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="estilo.css">
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
        echo '<p>' . $producto->categoria . '</p>';
        echo '<p>Precio: $' . $producto->precio . '</p>';
        echo '<p>Existencia: ' . $producto->existencias . '</p>';
        echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-' . $producto->codigo . '">Ver descripción</button>';
        echo '</div>';
        
        // Modal con la descripción del producto
        echo '<div class="modal fade" id="modal-' . $producto->codigo . '" tabindex="-1" role="dialog" aria-labelledby="modal-' . $producto->codigo . '-label" aria-hidden="true">';
        echo '<div class="modal-dialog modal-dialog-centered" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title">' . $producto->nombre . '</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">' . $producto->descripcion . '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    ?>
  </div>

  <footer class="footer">
    <p>&copy; 2023 TextilExport</p>
  </footer>
</body>
</html>
