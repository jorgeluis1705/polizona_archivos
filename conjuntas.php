<?PHP
$hostname_localhost = "68.70.164.26";
$database_localhost = "polizona_37";
$username_localhost = "polizona_37";
$password_localhost = "Doce+Doce=24";
$json = array();
include("index.php");


//realiza conexion
$conexion = mysqli_connect($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);

$consulta = "";
if ($conexion) {
    $tabla = $_POST["tabla"];
    $vista_nombre = $_POST["Vista"];
    $campo1 = $_POST["campo1"];
    $campo2 = $_POST["campo2"];

    if ($tabla && $campo1 && $campo2) {
        /*        $consulta_2 = "
        create view red as select mercado, industria, count(*)/(select count(*) from
        balances) as Probabilidad from balances where mercado
        in(select distinct mercado from balances) and industria
        in(select distinct industria from balances) group by
        industria, mercado order by mercado, industria;
        ";*/
        $consulta = " create view " . $vista_nombre . " as select " . $campo1 . ", " . $campo2 . ", count(*)/(select count(*) from
        " . $tabla . ") as Probabilidad from " . $tabla . " where " . $campo1 . "
        in(select distinct " . $campo1 . " from " . $tabla . ") and " . $campo2 . "
        in(select distinct " . $campo2 . " from " . $tabla . ") group by
        " . $campo2 . ", " . $campo1 . " order by " . $campo1 . ", " . $campo2 . ";";

        $registro = mysqli_query($conexion, $consulta);
        if ($registro) {
            mysqli_close($conexion);
            echo "Registro almacenado. <br>";
        } else {
            echo "error en la ejecución del registro <br>";
        }
    }
}
