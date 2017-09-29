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
				text-align: center;
			}
			h1 {text-align: center;}
		</style>
	</head>

	<body>
		<h1>Calendario</h1>
		<?php
			$mes;
			$any;

			//Calcular que fecha mostrar
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if($_POST['pasar']=="next"){
					$mes = $_POST['mes'] + 1;
					$any = $_POST['any'];
					if($mes > 12){
						$mes -= 12;
						$any ++;
					}
				}else if($_POST['pasar']=="prev"){
					$mes = $_POST['mes'] - 1;
					$any = $_POST['any'];
					if($mes < 1){
						$mes += 12;
						$any --;
					}
				}
			} else {
				$mes = date("m");
				$any = date("Y");
			}

			//Obtener cuantos dias tiene el mes elejido
			$fechaPincipioDelMes = "01-$mes-$any";
			$cantidadDeDiasDelMes = date( "t", strtotime( $fechaPincipioDelMes ));

			//Obtener el dia en que estamos
			$diaActual = date("j");

			//Obtener en que dia de la semana ha iniciado el mes (0-6, 0 = lunes) 
			$diaInicioSemana = date("N", strtotime($fechaPincipioDelMes))-1;
			
			$diaEscrito = 1;
			$maxFilas = 1; //Se autoincrementa sola para adaptarse a los dias del mes
			$maxColumnas = 7;

			echo '<form method="post" action="" style="text-align: center;">
				<input type="submit" name="pasar" value="prev">
				<input type="text" name="mes" value="'.$mes.'" style="width: 40px;">
				<input type="text" name="any" value="'.$any.'" style="width: 40px;">
				<input type="submit" name="pasar" value="next">
			</form>';

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
					if($diaActual == $diaEscrito && $mes == date("m") && $any == date("Y"))
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
