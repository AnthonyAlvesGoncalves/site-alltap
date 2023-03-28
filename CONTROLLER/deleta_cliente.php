<?php
require "/xampp/htdocs/Alltap/MODEL/database.php";
require "/xampp/htdocs/Alltap/MODEL/cliente.php";
include "/xampp/htdocs/Alltap/MODEL/database.php";


$id_cliente = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM cliente WHERE id_cliente = '$id_cliente'";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location="/Alltap/VIEW/cliente.php"</script>';
}
// SE N, APRESENTA ERRO
else {
    echo "ERRO: " . $conn->error;
}



?>