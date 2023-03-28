<?php
include "/xampp/htdocs/Alltap/MODEL/database.php";
include "/xampp/htdocs/Alltap/MODEL/chamados.php";

$observacao = trim($_POST['observacao']);
$_SESSION['date'] = date("Y-m-d");
$data_hoje = $_SESSION['date'];

$chamado = new Chamados($_POST["status_chamado"], $_POST["id_produto"], $_POST["id_usuario"], $observacao, $_POST["locado"], $_POST["urgencia"], $_POST["rua"], $_POST["complemento"], $_POST["bairro"], $_POST["cidade"], $_POST["uf"]);

$id_produto = $chamado->id_produto;

$query = "SELECT * FROM chamados
        WHERE id_produto = '$id_produto'";

$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run)>0){
    echo '<script>window.location="/Alltap/VIEW/abrir_chamado.php"</script>';
}
else{

    $sql = "INSERT INTO chamados(status_chamado, data_abertura, id_produto, id_usuario, observacao, locado, urgencia, rua, complemento, bairro, cidade, estado)
    VALUES ('$chamado->status_chamado',
    '$data_hoje',
    '$chamado->id_produto', 
    '$chamado->id_usuario', 
    '$chamado->observacao', 
    '$chamado->locado', 
    '$chamado->urgencia', 
    '$chamado->rua', 
    '$chamado->complemento', 
    '$chamado->bairro', 
    '$chamado->cidade', 
    '$chamado->estado')";


    if ($conn->query($sql) === TRUE) {
        echo '<script>window.location="/Alltap/VIEW/chamado.php"</script>';
      }
      // SE N, APRESENTA ERRO
      else {
        echo "ERRO: " . $conn->error;
      }
}
