<!-- html/formInscripcion.php-->

<!DOCTYPE html>
<html>
<head>
	<title>Nueva Inscripción</title>
	<link rel="stylesheet" href="css/stylesheet.css" type="text/css">
</head>
<body>
    <a href="Iniciar-sesion">Inicio</a> 
	<a href="Nueva-inscripcion">Nueva inscripciòn</a>
	<a href="Nuevo-prestamo">Nuevo prestamo </a>
	<a href="Ejemplares">Ejemplares</a>
	<a href="Inscripciones">Inscripciones</a>
	<a href="Prestamos">Prestamos</a>
	<a href="Cerrar-sesion">Cerrar sesiòn</a>
	<h1>Nueva Inscripción</h1>

	<form action="" method="post" class="frm">

		<label for="apellidos">Apellidos:</label>
		<input type="text" name="apellidos" id="apellidos" class="field">

		<br/><br/>

        <label for="nombres">Nombres:</label>
		<input type="text" name="nombres" id="nombres" class="field">

		<br/><br/>

        <label for="dni">DNI:</label>
		<input type="text" name="dni" id="dni" class="field">

		<br/><br/>

        <label for="direccion">Dirección:</label>
		<input type="text" name="direccion" id="direccion" class="field">

		<br/><br/>

        <label for="email">E-mail:</label>
		<input type="text" name="email" id="email" class="field">

		<br/><br/>

		<br/><br/>
		<input type="submit" value="Crear"  class="btn btn-green"/>
    </form>
	
	
</body>
</html>