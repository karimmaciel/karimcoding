<!-- html/listadoEjemplares.php -->

<!DOCTYPE html>
<html>
<head>
   
    <title>Listado de Ejemplares</title>
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
   <h1>Ingresar nuevo ejemplar</h1>

    <form action="" method="post" class="frm">
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" class="field"> 
        <br><br>
        <label for="editorial">Editorial:</label>
        <input type="text" name="editorial" id="editorial" class="field"> 
        <br><br>
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" class="field"> 
        <br><br>
        <input type="submit" value="Alta" class="btn btn-green"> 
    </form> 
    <h2>Listado de Ejemplares</h2>

    <div id="main-container">
    <table>
        <thead>
        <tr><th>ID</th>  <th>Libro</th> <th>Estado</th> <th>Eliminar</th> <th></th></tr>  
        </thead>
        <form action="" method="post">
        <?php foreach($this->ejemplares as $e) { ?>
        <tr><td><?= $e['id_ejemplar'] ?></td> <td><?= $e['titulo'] ?></td> <td><?= $e['estado_ejem'] ?></td> <td><input type="radio" name="eliminar" value="<?= $e['id_ejemplar'] ?>"></td> <td><input type="submit"  value="Go"></td> </tr>
        <?php }?>
        </form>
    </table>
    </div>


</body>
</html>