<html>
  <head>
    <script language="javascript" type="text/javascript">
/* Las siguiente funci�n de JavaScript env�a el formulario a la p�gina que corresponda al bot�n pulsado. */
      function saltar(pagina){
        document.formularioCitasPrincipal.action=pagina;
		document.formularioCitasPrincipal.submit();
      }
/* Aqu� termina la funci�n de env�o del formulario. */
    </script>
	<title>Sistema de acarreos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  </head>

  <body>
<?php
// Se incluye el miniscript que abre la base de datos.
      include ("inc/fechas.php");
// Se incluye el miniscript de tratamiento de fechas
      include ("inc/usarBD.php");
/* Se crea una consulta para recuperar todos los datos de las citas con fecha del d�a en curso.
La consulta de selecci�n se crea de tal modo que ordene las citas por la hora. */
      $consulta="SELECT * FROM usuarios";
/* Se ejecuta la consulta de selecci�n.*/
      $hacerConsulta=mysql_query($consulta, $conexion);
/* Se determina el n�mero de registros recuperados por el cursor, porque si es 0 el
dise�o de la p�gina (parte HTML) es diferente que si hay registros. */
      $numeroDeUsuarios=mysql_num_rows($hacerConsulta);
      echo ("Usuarios: ".$numeroDeUsuarios.salto);
    ?>

    AGENDA DEL D&Iacute;A:
    <?php
/* Se muestra la fecha del d�a. */
    echo ($diaActual." del ".$mesActual." de ".$annioActual);
	?>
<!-- El formulario no tiene valor en el par�metro action porque se le
asigna por una funci�n javascript antes de enviarlo. La funci�n que se ejecute
y, por tanto, el valor de este par�metro, depende del bot�n pulsado por el usuario.-->
    <form action="" method="post" name="formularioUsuariosPrincipal" id="formularioUsuariosPrincipal">
<!-- El siguiente campo oculto almacena la fecha en curso, obtenida desde PHP.
Este dato se enviar� a otros formularios y, a su vez, se rcuperar� desde la 
p�gina de cambio de fecha actual. -->
      <input type="hidden" name="fechaEnCurso" id="fechaEnCurso" value="<?php echo($fechaEnCurso); ?>">
      <table width="500" border="0" cellspacing="0" cellpadding="0">
        <tr><th>CITAS</th></tr>
      </table>
      <hr>
      <?php
/* Se comprueba si hay citas en el cursor. Si es as�, se dibujar� una
tabla en la que se mostrar�n las citas y unos botones de selecci�n. */
		if ($numeroDeUsuarios>0){
          echo ("<table width='500' border='0' cellspacing='0' cellpadding='0'>");
          while ($usuario = mysql_fetch_array($hacerConsulta, MYSQL_ASSOC)) {
            echo ("<tr><td>".$usuario["iduser"]."</td>");
//            echo ("<td>".$cita["asuntocita"]."</td>");
			echo ("<tr><td>".$usuario["user"]."</td>");
			echo ("<tr><td>".$usuario["nombre"]."</td>");
			echo ("<tr><td>".$usuario["password"]."</td>");
			echo ("<tr><td>".$usuario["fechaalta"]."</td>");
			echo ("<tr><td>".$usuario["fechabaja"]."</td>");
			echo ("<tr><td>".$usuario["status"]."</td>");
/* Cada cita tiene asociado un bot�n de selecci�n para si el usuario quiere
modificarla o borrarla. El valor del bot�n es el identificativo de la cita,
de modo que se usar� en las correspondientes consultas de actualizaci�n o
eliminaci�n en las p�ginas que proceda.*/
            echo ("<td><input type='radio' id='UsuarioSeleccionado' name='UsuarioSeleccionado' value='".$usuario["iduser"]."'>");
            echo ("</td></tr>");
          }
          echo ("</table>");
/* Si existen citas se mostrar�n los botones de borrar y modificar. */
          echo ("<input name='bajaUsuario' type='button' id='bajaUsuario' value='Baja de Usuario' onClick='javascript:saltar(\"bajaUsuario.php\");'>".salto);
          echo ("<input name='borrarUsuario' type='button' id='borrarUsuario' value='Eliminar Usuario' onClick='javascript:saltar(\"eliminarUsuario.php\");'>".salto);
          echo ("<input name='cambiarCita' type='button' id='cambiarCita' value='Modificar cita' onClick='javascript:saltar(\"cambiarCita.php\");'>".salto);
        }
/* En todo caso se mostrar�n los botones de agregar cita y cambiar la fecha en curso. */
        echo ("<input name='nuevaCita' type='button' id='nuevaCita' value='Agregar cita' onClick='javascript:saltar(\"agregarCita.php\");'>".salto);
        echo ("<input name='cambiarFecha' type='button' id='cambiarFecha' value='Otro d&iacute;a' onClick='javascript:saltar(\"cambiarFecha.php\");'>".salto);
      ?>
    </form>
  </body>
</html>
