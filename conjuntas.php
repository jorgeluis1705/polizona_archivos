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
    $campo1 = $_POST["campo1"];
    $campo2 = $_POST["campo2"];

    echo json_encode($_POST);
    if ($tabla && $campo1 && $campo2) {
        $consulta = "create view conjuntas as select mercado, industria, count(*)/(select count(*) from balances) as Probabilidad from balances where mercado in(select distinct mercado from balances) and industria in(select distinct industria from balances) group by industria, mercado order by mercado, industria;";
    }
}
$conexionA = mysqli_connect($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);
$resultadoA = mysqli_query($conexionA, $consulta);
