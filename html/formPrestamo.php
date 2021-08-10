<!-- html/formPrestamo.php-->

<!DOCTYPE html>
<html>
<head>
	<title>Nuevo prestamo</title>
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
	<h1>NUEVO PRESTAMO</h1>

	<form action="" method="post" class="frm">

        <label for="d">Dia:</label>
		<input type="text" name="dia" id="d"  class="field"/>
		<label for="m">Mes:</label>
		<input type="text" name="mes" id="m"  class="field"/>
		<label for="a">Año:</label>
		<input type="text" name="anio" id="a"  class="field"/>

        <br/><br/>

        <label for="socio">Numero de socio:</label>
        <select name="socio" id="socio" class="field">
        <?php foreach($this->socios as $s) { ?>
        <option class="field" value="<?= $s['id_socio'] ?>" ><?= $s['id_socio'] ?></option>
        <?php } ?>
        </select>

		<br/><br/>

        <label for="tipo">Tipo de prestamo:</label>
		<select name="tipo_prestamo" id="tipo_prestamo" class="field">
        <option value="sala" class="field">SALA</option>
        <option value="retiro" class="field">RETIRO</option>
        </select>

		<br/><br/>

        <input type="submit" value="Confirmar" class="btn btn-green">

	</form>
    <br><br>
    <form action="" method="post">
        <label for="nuevop">Nro de Prestamo: <?= $this->nuevop ?></label>
        <input type="hidden" name="nuevop" value="<?= $this->nuevop ?>">
        <a href="Nuevo-prestamo">Otro Prestamo</a>
        <h2>LISTADO DE LIBROS</h2>
        <div id="main-container" class="prestamo">
        <table>
        <thead>
        <tr><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Ejemplar nro</th><th>Selecciòn de libro</th><th></th></tr>
        </thead>
        <?php foreach($this->ejemplares as $l) { ?>
        <tr><td><?= $l['titulo'] ?></td><td><?= $l['autor'] ?></td><td><?= $l['editorial'] ?><td><?= $l['id_ejemplar'] ?></td><td><input type="radio" name="prestar" value="<?= $l['id_ejemplar'] ?>"></td><td><input type="submit"  value="Go" ></td></tr>
        <?php } ?>
        </table>
    </form>
    </div>
	
</body>
</html>
