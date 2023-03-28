<?php
require "/xampp/htdocs/Alltap/MODEL/database.php";

$id_locacao = $_POST['id_locacao'];
$status_locacao = $_POST['status_locacao'];
$id_produto = $_POST['id_produto'];

$sql = "UPDATE locacao SET status_locacao = '$status_locacao'
        WHERE id_locacao = '$id_locacao'";

if ($conn->query($sql) === TRUE) {
    if($status_locacao = 'fechado'){
        $sql = "UPDATE produto SET estoque = '1'
                  WHERE id_produto = $id_produto";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location="/Alltap/VIEW/consulta_loc.php"</script>';
        }

    } else {
        echo '<script>window.location="/Alltap/VIEW/consulta_loc.php"</script>';
    }
}
else {
    echo "ERRO: " . $conn->error;
}
