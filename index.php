<?php /*
Haga un programa que lea N tarjetas de datos A, B, C, D, E.
A = Número de cédula de identidad del alumno.
B = Nombre del Alumno 
C = Nota de matemáticas
D= Nota de física
E = Nota de programación
Hallar:
Nota promedio de cada materia.
Número de alumnos aprobados en cada materia.
Número de alumnos aplazados en cada materia.
Número de alumnos que aprobaron todas las materias. Número de alumnos que aprobaron una sola materia.
Número de alumnos que aprobaron dos materias.
Nota máxima en cada materia.
Subir el código al GitHub y enviar el enlace del mismo al correo juan.medina@urbe.edu.ve
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2
    </title>

         <!--Import Google Icon Font-->
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
    <div class= "container">
        <h2> <strong>Introduzca los siguientes datos del alumno</strong> </h2>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <label for=""><b>Número de Cédula</b></label>
            <input type="text" name="txtCedula" id="" placeholder="XXXXXXXX" pattern="^[0-9]+([,]?[0-9]+)*$" required><br>
            <label for=""><b>Nombre</b></label>
            <input type="text" name="txtNombre" id="" required>
            <label for=""><b>Nota de matemáticas</b></label>
            <input type="text" name="txtNotaMate" id="" placeholder="<?php $mensaje ?>1-20" required>
            <label for=""><b>Nota de física</b></label>
            <input type="text" name="txtNotaFis" id="" placeholder="1-20" required>
            <label for=""><b>Nota de programación</b></label>
            <input type="text" name="txtNotaProg" id="" placeholder="1-20" required>
    
            <br><button class="btn waves-effect waves-light" type="submit" value="Guardar datos" name="btnG">
                Guardar datos
                <i class="material-icons right">send</i>
            </button>
        </form>

        <br>
        <form action="masinfo.php">
            <button class="btn waves-effect waves-light" type="submit"  value="Más opciones" name="btnM">
                Más opciones
                <i class="material-icons right">add</i>
            </button>
        </form>

        <?php
            include_once('PHP/ingresar.php');
        ?>
    </div>



    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
	
    <br><br>
</body>

<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">FABIAN ALVAREZ</h5>
                <p class="grey-text text-lighten-4">Programación Web N-1013.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://fabialvajr.space/tareas-sep-dic/Ejercicio%201/">Ejercicio 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://fabialvajr.space/tareas-sep-dic/Ejercicio%202/">Ejercicio 2</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2023 Fabian Alvarez. All rights reserved.
            <a class="grey-text text-lighten-4 right" href="https://youtu.be/KTbynh5cRcQ?si=7uUJ0u55pMxph2QO">zzz</a>
            </div>
          </div>
</footer>
</html>