<html>
	<body>
		<?php
			// Se incluye el miniscript de tratamiento de fechas
			include ("../scripts/fechas.php");
			// Se incluye el miniscript que abre la BBDD.
			include ("../scripts/usarBD.php");
			// Se muestra la fecha en curso.
			if (( $_POST['cveobra'] == NULL and  $_POST['cveobra'] == '' )
				OR ($_POST['obra'] == NULL and  $_POST['obra'] == '')
				OR ($_POST['pep'] == NULL and  $_POST['pep'] == '')){
			    if( $_POST['cveobra'] == NULL and  $_POST['cveobra'] == ''){
					echo "Falta clave de obra";	
				}
			    if( $_POST['obra'] == NULL and  $_POST['obra'] == ''){
					echo "Falta nombre de obra";	
				}
				if( $_POST['pep'] == NULL and  $_POST['pep'] == ''){
					echo "Falta PEP";	
				}
			}else{
				$consulta="INSERT INTO obras (cveobra, obra, pep)
				VALUES
				('$_POST[cveobra]','$_POST[obra]','$_POST[pep]')";

				if (!mysql_query($consulta,$conexion)){
					die('Error: ' . mysql_error());
				}
				echo "1 record added";
				mysql_close($conexion);
			}

		?>
	</body>
</html>