<!-- html/listadoInscripciones.php -->

<!DOCTYPE html>
<html>
<head>
   
    <title>Listado de Inscripciones</title>
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
    <h1>Listado de Inscripciones</h1>
    <div id="main-container">
    <table>
        <thead>
        <tr><th>Nombres</th> <th>Apellidos</th> <th>Dirección</th> <th>Email</th> <th>DNI</th> <th>Estado</th></tr>  
        </thead>
        <?php foreach($this->inscripciones as $i) { ?>
        <tr><td><?= $i['nombres'] ?></td> <td><?= $i['apellidos'] ?></td> <td><?= $i['direccion_postal'] ?></td> <td><?= $i['email'] ?></td> <td><?= $i['id_dni'] ?></td> <td><?= $i['estado_ins'] ?></td> </tr>
        <?php }?>
    </table>
    </div>

</body>
</html>