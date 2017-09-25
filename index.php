<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<title>Calendario</title>
		<style>
			table, th, td {
			    border: 1px solid black;
			    border-collapse: collapse;
			}
			td, th{
				padding: 5px 10px;
			}
			h1 {text-align: center;}
		</style>
	</head>

	<body>
		<h1>Calendario</h1>
		<?php
			//obtener cuantos dias tiene el mes actual
			$mes = date("m");
			$any = date("Y");
			$fechaPincipioDelMes = "01-$mes-$any";
			$cantidadDeDiasDelMes = date( "t", strtotime( $fechaPincipioDelMes )); 

			//obtener el dia en que estamos
			$diaActual = date("j");

			//obtener en que dia de la semana ha iniciado el mes (0-6)
			$diaInicioSemana = date("N", time() - $diaActual*24*60*60);
			
			$diaEscrito = 1;
			$maxFilas = 1; $maxColumnas = 7;

			echo "<table style='margin: 30px auto;'>";
			echo "<tr>";
			echo "<th>Lunes</th>";
			echo "<th>Martes</th>";
			echo "<th>Miércoles</th>";
			echo "<th>Jueves</th>";
			echo "<th>Viernes</th>";
			echo "<th>Sábado</th>";
			echo "<th>Domingo</th>";
			echo "</tr>";
			for($fila = 1; $fila <= $maxFilas; $fila++){
				echo "<tr>";
				for($columna = 1; $columna <= $maxColumnas; $columna++){
					if($diaActual == $diaEscrito)
						echo "<td style='background-color: blue; color: white;'>";
					else
						echo "<td>";

					if(($columna > $diaInicioSemana || $fila > 1) && $cantidadDeDiasDelMes >= $diaEscrito){
						echo $diaEscrito ++;
					}
					echo "</td>";
				}
				echo "</tr>";
				if($cantidadDeDiasDelMes < $diaEscrito) break;
				else $maxFilas ++;
			}
			echo "</table>";
		?>
	</body>
</html>
