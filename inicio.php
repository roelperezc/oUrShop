<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>oUrShop</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">

</head>
<body>
	<?php 
	  include 'db_connection.php';
	  $conn = OpenCon();
	?>

	<div class="contenedor">
		
		<header>
			<nav>
				<div class="marca_logo">
					<p>oUrShop<p>
				</div>
				<ul>
					<li><a href="#">Login</a> </li>
					<li><a href="#">Sing up</a></li>
					<li><a href="#">Misión y Visión</a></li>
					<li><a href="#"><img src="./imagenes/carrito.jpg" width="25"></a></li>
				</ul>
			</nav>
		</header>

		<table id="carrusel">	
		<tr>
			<td>
				<div><button onclick="preImg()" class="botonCarr" ><img src="./imagenes/last.png" class="imgCarr"></button></div>
			</td>
			<td>
				<img id="imagen" src="./imagenes/carru1.png" style="width:1000px; height: 400px; float: left;"></img>	
			</td>
			<td>	
				<div><button onclick="nextImg()" class="botonCarr"><img src="./imagenes/next.png" class="imgCarr"></button></div>
			</td>	
		</tr>
		<div id="carrusel">
					
    	</div>
    	</table>

		<?php
			
			$productosByVentasTop6 = "SELECT * FROM PRODUCTOS ORDER BY VENTAS LIMIT 6";
			$mas_vendidos = $conn->query($productosByVentasTop6);
			
			echo '<table class="tablaObjetos">';
			for($i = 0; $i<3; $i++){
				echo '<tr>';
				for($j = 0; $j<2; $j++){
					$row = mysqli_fetch_assoc($mas_vendidos);
					echo '<td><div class="producto">';
						echo '<img src="'.$row['IMAGEN_PATH'].'" class="imagenProducto">';
						echo '<div class="productoInfo">';
							echo '<p class="descripcion">'.$row["NOMBRE"].'</p>';
							echo '<p class="precio">'.$row['PRECIO'].'</p>';
							echo '<p>Cantidad: </p>';
							echo '<form class="cantidades">';
								echo '<input type="number" title="num" class="numProducto">';
								echo '<input type="button" name="agregar" value="Agregar" class="botonAgregar" >';
							echo '</form>';
						echo '</div>';
					echo '</div></td>';
				}
				echo '</tr>';
			}

			echo '</table>';

		?>
		
	</div>
	<script src="carrusel.js"></script>

	<?php 
	  CloseCon($conn);
	?>

</body>
</html>