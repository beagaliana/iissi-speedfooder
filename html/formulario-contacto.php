<?php
	session_start();

// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("gestionBD.php");

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION["formulario"])) {
		$formulario['nombre'] = "";
		$formulario['email'] = "";
	
		$_SESSION["formulario"] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION["formulario"];
			
	// Si hay errores de validación, hay que mostrarlos y marcar los campos (El estilo viene dado y ya se explicará)
	if (isset($_SESSION["errores"])){
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
	}
		
	// Creamos una conexión con la BD
	$conexion = crearConexionBD();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>¡Contáctanos!</title>
    <link rel="stylesheet" type="text/css" href="../css/signinform.css">
    <script src="../js/validacion_cliente_alta_usuario.js" type="text/javascript"></script>
	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed|Overpass" rel="stylesheet">
</head>
<body>

  <div class="d-inicio">
    <button class="btn-main-icon" ><a href="index.php"><img src="../images/speedfooder-icon.png"></a></button>
    
  </div>
  <script>
	$(document).ready(function() {
		$("#contacto").on("submit", function() {
				return validateFormContacto();
		});
	});
  </script>
<section id="formulario">
<p id="titulo">¡Contáctanos!</p>
  <form action="formulario-contacto.php" method="post">
      <input class="form" type="text" id="nombre" name="nombre" size="40" placeholder="Escribe tu nombre" value="<?php echo $formulario['nombre'];?>" required oninput="nameValidation(); ">
      <input class="form" type="mail" id="email" name="email" size="40" placeholder="Escribe tu email" value="<?php echo $formulario['email'];?>" required oninput="mailValidation(); ">
	  <textarea name="opinion" rows="5" cols="10" placeholder="Cuéntanos tu opinión..."></textarea>
  
    <input type="submit" value="Enviar">
    
  
</form>
</section>
     <?php
		cerrarConexionBD($conexion);
	?>
</body>
</html>
