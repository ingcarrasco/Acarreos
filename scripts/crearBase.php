<?php
// Se incluye el miniscript de tratamiento de fechas
	include ("../scripts/fechas.php");
	include ("../scripts/UsarBD.php");
// Se crea una consulta para crear la base de datos, si esta no existe aún.
  	$consulta="CREATE DATABASE IF NOT EXISTS acarreos;";
  	$result=mysql_query ($consulta, $conexion);
// Se selecciona la base de datos recién creada.
  	mysql_select_db ("acarreos", $conexion);

// Se elimina la tabla, si esta existiera, para poder crearla nueva.
  	$consulta="DROP TABLE IF EXISTS usuarios;";
  	$result=mysql_query ($consulta, $conexion);
// Se crea la estructura de la tabla.
  	$consulta="CREATE TABLE IF NOT EXISTS usuarios (iduser INT NOT NULL AUTO_INCREMENT PRIMARY KEY, user VARCHAR(255) PRIMARY KEY, nombre VARCHAR(255),	password VARCHAR(255), fechaalta TIME, fechabaja DATE, status BINARY DEFAULT 1);";
  	$result=mysql_query ($consulta, $conexion);

// Se elimina la tabla, si esta existiera, para poder crearla nueva.
	$consulta="DROP TABLE IF EXISTS obras;";
  	$result=mysql_query ($consulta, $conexion);
// Se crea la estructura de la tabla.
	$consulta="CREATE TABLE IF NOT EXISTS obras (idobra INT NOT NULL AUTO_INCREMENT PRIMARY KEY,	cveobra VARCHAR(10) NOT NULL PRIMARY KEY, obra VARCHAR(255) NOT NULL, pep VARCHAR(30) NOT NULL PRIMARY KEY);";
	$result=mysql_query ($consulta, $conexion);
	
// Se crea el usuario admin  
	$consulta="INSERT INTO usuarios (user, nombre, password, fechaalta) VALUES ('Admin','Administrador','admin','".$fechaEnCurso."');";
	$result=mysql_query ($consulta, $conexion);

/* Se comprueba si se ha podido completar correctamente la última operación,
lo que, en este caso, implicará que también se han llevado a cabo, sin problemas,
las operaciones anteriores. El resultado se muestra en la página. */
  if ($result){
	  echo ("La Base de datos y la tabla han sido creadas.");
  } else {
	  echo ("Ha surgido algún problema durante la creación de la BBDD y/o la tabla.<br>");
	  echo ("El problema es el siguiente:<br>");
	  echo ("Código: <b>".mysql_errno ()."</b><br>");
	  echo ("Descripción:: <b>".mysql_error ()."</b><br>");
	  echo (".$result.");
  }

// Se liberan recursos y se cierra la base de datos.
  @mysql_free_result ($result);
  mysql_close ($conexion);
?>
