<?PHP
$hostname_localhost = "68.70.164.26";
$database_localhost = "polizona_37";
$username_localhost = "polizona_37";
$password_localhost = "Doce+Doce=24";
include("index.php");
	
$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
$empresa="37";
$consultaBalance="select empresa, mercado, industria, infraestructura, bancos, enproceso, mercancias, clientes, hipotecas, proveedores, capitalsocial, utilidades from balances where empresa='$empresa';";
$consultaInsA="select cantidad, precio from embarque where idempresa='$empresa' and idalmacen=1;";
$consultaInsB="select cantidad, precio from embarque where idempresa='$empresa' and idalmacen=2;";
	$resultado=mysqli_query($conexion,$consultaBalance);
	$almacenA=mysqli_query($conexion,$consultaInsA);
	$almacenB=mysqli_query($conexion,$consultaInsB);
	if($conexion){
		//inicia el objeto empresa y escribe el balance
		while($registro=mysqli_fetch_array($resultado)){
			$result["empresa"]=$registro['empresa'];
			$result["mercado"]=$registro['mercado'];
			$result["industria"]=$registro['industria'];
			$result["infraestructura"]=$registro['infraestructura'];
			$result["bancos"]=$registro['bancos'];
			$result["enproceso"]=$registro['enproceso'];
			$result["mercancias"]=$registro['mercancias'];
			$result["clientes"]=$registro['clientes'];
			$result["hipotecas"]=$registro['hipotecas'];
			$result["proveedores"]=$registro['proveedores'];
			$result["capitalsocial"]=$registro['capitalsocial'];
			$result["utilidades"]=$registro['utilidades'];
				echo "atributo. empresa. objeto."."<br>";
				echo "atributo. nbempresa. cadena. ".$registro['empresa'].".<br>";					
				echo "atributo. balance. objeto."."<br>";
				echo "atributo. activo. objeto."."<br>";
				echo "atributo. infraestructura. numero. ".$registro['infraestructura'].".<br>";
				echo "atributo. bancos. numero. ".$registro['bancos'].".<br>";
				echo "atributo. insumoA. cadena. ". rand()*100. .""."<br>";
				echo "atributo. insumoB. cadena. sumar_el_atributo_cantidad_de_los_embarques_del_almacenB."."<br>";
				echo "atributo. enproceso. numero. ".$registro['enproceso'].".<br>";
				echo "atributo. mercancias. numero. ".$registro['mercancias'].".<br>";					
				echo "atributo. clientes. numero. ".$registro['clientes'].".<br>";
				echo "fin. ";
				echo "atributo. pasivo. objeto."."<br>";
			   echo "atributo. hipotecas. numero. ".rand()*100. .""."<br>";
				echo "atributo. proveedores. numero. ".rand()*100. .""."<br>";
				echo "fin. ";
				echo "atributo. capital. objeto."."<br>";
				echo "atributo. capitalsocial. numero. ".$registro['capitalsocial'].".<br>";
				echo "atributo. utilidades. numero. ".$registro['utilidades'].".<br>";
				echo "fin. ";
				echo "fin. ";
		} 
		//crea el objeto almacen A
		echo "atributo. almacenA. objeto. "."<br>";
		echo "atributo. maxA. numero. 5000. "."<br>";
		echo "atributo. totalA. cadena. sumatoria_de_cantidad. "."<br>";
		echo "atributo. unitarioA. cadena. sumatoria_de_precio_entre_sumatoria_de_cantidad. "."<br>";
		echo "atributo. inventario. arreglo. "."<br>";
		// llena el arreglo de inventarioA con objetos embarque
		while($registro2=mysqli_fetch_array($almacenA)){
			$result2["cantidad"]=$registro2['cantidad'];
			$result2["precio"]=$registro2['precio'];
				echo "valor. objeto. atributo. embarque. objeto."."<br>";
				echo "atributo. cantidad. numero. ".$registro2['cantidad'].".<br>";
				echo "atributo. precio. numero. ".$registro2['precio'].".<br>";
				echo "fin. fin. ";
		} echo "fin. fin. "."<br>";

		//crea el objeto almacen B
		echo "atributo. almacenB. objeto. "."<br>";
		echo "atributo. maxB. numero. 5000. "."<br>";
		echo "atributo. totalB. cadena. sumatoria_de_cantidad. "."<br>";
		echo "atributo. unitarioB. cadena. sumatoria_de_precio_entre_sumatoria_de_cantidad. "."<br>";
		echo "atributo. inventario. arreglo. "."<br>";
		// llena el arreglo de inventarioB con objetos embarque
		while($registro3=mysqli_fetch_array($almacenB)){
			$result3["cantidad"]=$registro3['cantidad'];
			$result3["precio"]=$registro3['precio'];
				echo "valor. objeto. atributo. embarque. objeto."."<br>";
				echo "atributo. cantidad. numero. ".$registro3['cantidad'].".<br>";
				echo "atributo. precio. numero. ".$registro3['precio'].".<br>";
				echo "fin. fin. ";
		}
		
		echo "fin. fin. fin. fin. "; 			

		mysqli_close($conexion);
	}
	else{
		echo "no hay conexión con el servidor bd.polizona.com";
	}


?>