<?php

require "/xampp/htdocs/Alltap/MODEL/database.php";

$id_chamado = $_POST['id_chamado'];
$status_chamado = $_POST['status_chamado'];
$id_usuario = $_POST['id_usuario'];

$sql = "UPDATE chamados SET status_chamado = '$status_chamado',
           id_usuario = '$id_usuario' WHERE id_chamado ='$id_chamado'  ";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location="/Alltap/VIEW/chamado.php"</script>';
}
// SE N, APRESENTA ERRO
else {
    echo "ERRO: " . $conn->error;
}
