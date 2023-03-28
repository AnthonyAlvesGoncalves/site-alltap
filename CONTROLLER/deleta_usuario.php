<?php
require "/xampp/htdocs/Alltap/MODEL/database.php";
require "/xampp/htdocs/Alltap/MODEL/usuario.php";
include "/xampp/htdocs/Alltap/MODEL/database.php";


$id_usuario = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location="/Alltap/VIEW/usuario.php"</script>';
}
// SE N, APRESENTA ERRO
else {
    echo "ERRO: " . $conn->error;
}



?>