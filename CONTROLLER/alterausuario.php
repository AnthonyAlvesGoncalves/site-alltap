<?php
require "/xampp/htdocs/Alltap/MODEL/database.php";
require "/xampp/htdocs/Alltap/VIEW/update_usuario.php";


$id_usuario = $_POST['id_usuario'];
$nome = $_POST['nome'];
$nome_acesso = $_POST['nome_acesso'];
$senha = $_POST['senha'];
/// ------- C O D I F I C A --------  A -------- S E N H A ----------
$hash = password_hash($senha, PASSWORD_DEFAULT);
//// VALIDA A QUERY


$sql = "UPDATE usuario  SET
nome = '$nome',
nome_acesso = '$nome_acesso',
senha = '$hash'  WHERE id_usuario = '$id_usuario';";

// VALIDA A QUERY
if ($conn->query($sql) === TRUE) {
    echo '<script>alert("USUARIO ATUALIZADO")
        window.location="/Alltap/VIEW/usuario.php"</script>';
}
// SE N, APRESENTA ERRO
else {
    echo "ERRO: " . $conn->error;
}



?>