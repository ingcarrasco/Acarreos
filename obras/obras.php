<html>
	<head>
		<title>Sistema de acarreos</title>
    	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    	<?php
	    	// Se incluye el miniscript de tratamiento de fechas
			include ("../scripts/fechas.php");
			// Se incluye el miniscript que abre la BBDD.
			include ("../scripts/usarBD.php");
    	?>
	</head>
	<body>
		<td><a href="../index.php">Incio</a></td>
		<td><a href="../obras/obras.php">Obras</a></td>
		<td><a href="../obras/agregar.php">Agregar Obras</a></td>
		<td><a href="Usuarios.php">Usuarios</a></td>
		
		<?php
			$consulta="SELECT * FROM obras;";
			$result = mysql_query($consulta,$conexion);
			if (!$result){
				echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    			exit;
			}
			echo "<table align='center' border='1'>";
			echo "<tr> <th>idobra</th> <th>cveobra</th> <th>obra</th> <th>PEP</th> </tr>";
			while($row = mysql_fetch_array($result)) {
  				echo ("<tr><td>"); 
  				echo $row['idobra'];
  				echo ("</td><td>"); 
  				echo $row['cveobra'];
  				echo ("</td><td>");  
  				echo $row['obra'];
  				echo ("</td><td>");  
  				echo $row['pep'];
  				echo ("</td></tr>"); 
  			}
  			echo "</table>";
  		?>

	</body>
</html>