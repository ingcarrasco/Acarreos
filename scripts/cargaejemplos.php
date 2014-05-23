<?php
// Se incluye el miniscript de tratamiento de fechas
	include ("../scripts/fechas.php");
// Se incluye el miniscript que abre la BBDD.
	include ("../scripts/usarBD.php");
// Se muestra la fecha en curso.
  echo ("Fecha: ".$diaActual." del ".$mesActual." de ".$annioActual.salto);
// Se crea una consulta para crear la base de datos, si esta no existe aún.
  $consulta="INSERT INTO obras (idobra, cveobra, obra, pep) VALUES (1,'GDL1-RS-E3','Real del Sol E3','C1010106');";
  $consulta="INSERT INTO obras (idobra, cveobra, obra, pep) VALUES (2,'GDL1-VT-E1','Valle de Tejeda E1','C1080106');";
  $consulta="INSERT INTO obras (idobra, cveobra, obra, pep) VALUES (3,'GDL1-RV-E2','Real del Valle E2','C1020106');";
  $consulta="INSERT INTO obras (idobra, cveobra, obra, pep) VALUES (4,'GDL1-CB-E3','Campo Bello E5','C1050106');";
  $hacerConsulta=mysql_query ($consulta, $conexion);

/* Se comprueba si se ha podido completar correctamente la última operación,
lo que, en este caso, implicará que también se han llevado a cabo, sin problemas,
las operaciones anteriores. El resultado se muestra en la página. */
  if ($hacerConsulta){
	  echo ("Ejemplos cargados satisfactoriamente.");
  } else {
	  echo ("Ha surgido algún problema durante la creación de la BBDD y/o la tabla.<br>");
	  echo ("El problema es el siguiente:<br>");
	  echo ("Código: <b>".mysql_errno ()."</b><br>");
	  echo ("Descripción:: <b>".mysql_error ()."</b><br>");
  }
// Se liberan recursos y se cierra la base de datos.
  @mysql_free_result ($hacerConsulta);
  mysql_close ($conexion);
?>
