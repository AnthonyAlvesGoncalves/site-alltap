<?php
require "/xampp/htdocs/Alltap/MODEL/database.php";
require "/xampp/htdocs/Alltap/MODEL/usuario.php";
include "/xampp/htdocs/Alltap/MODEL/database.php";

// TRAZ O PRODUTO
$id_produto = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM produto WHERE id_produto = '$id_produto'";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location="/Alltap/VIEW/produto.php"</script>';
}
// SE N, APRESENTA ERRO
else {
    echo "ERRO: " . $conn->error;
}



?>