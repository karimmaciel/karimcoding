<!-- html/listadoPrestamos.php -->

<!DOCTYPE html>
<html>
<head>
   
    <title>Listado de Prestamos</title>
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
    <h1>Listado de Prestamos</h1>
    
         <form action="" method="post" class="frm">
            <label for="buscador">Ingresar Nro de socio: </label>
            <input type="text" name="buscar" class="field">
            <br><br>
            <input type="submit" value="Buscar" class="btn btn-green">
        </form>
        <br><br>
        <a href="Prestamos">Mostrar todos</a>
    
    <div id="main-container">
    <table>
        <form action="" method="post">
        <thead>
        <tr><th>Nro Socio</th> <th>Nombres</th> <th>Apellidos</th> <th>Tipo de prestamo</th> <th>Fecha</th> <th>Devolver</th> <th></th></tr>  
        </thead>
        <?php foreach($this->prestamos as $p) { ?>
        <tr><td><?= $p['id_socio'] ?></td> <td><?= $p['nombres'] ?></td> <td><?= $p['apellidos'] ?></td> <td><?= $p['tipo_prestamo'] ?></td> <td><?= $p['fecha_prestamo'] ?></td> <td><input type="radio" name="devolver" value="<?= $p['id_prestamo'] ?>"></td> <td><input type="submit"  value="Go"></td>  </tr>
        <?php }?>
        </form>
    </table>
	</div>
   
</body>
</html>