<?php
require "/xampp/htdocs/Alltap/MODEL/database.php";
require "/xampp/htdocs/Alltap/VIEW/update_cliente.php";
require "/xampp/htdocs/Alltap/MODEL/cliente.php";

$cliente = new Cliente(
    $_POST['nome_empresa'],
    $_POST['nome_cliente'],
    $_POST['ins_est'],
    $_POST['tel_cliente'],
    $_POST['tel_empresa'],
    $_POST['cnpj'],
    $_POST['tel_wpp'],
    $_POST['cep'],
    $_POST['rua'],
    $_POST['complemento'],
    $_POST['bairro'],
    $_POST['cidade'],
    $_POST['uf'],
    $_POST['email']
);

$id_cliente = $_POST['id_cliente'];

$sql = "UPDATE cliente SET nome_empresa = '$cliente->nome_empresa', 
nome_cliente = '$cliente->nome_cliente',
ins_est = '$cliente->ins_est',
tel_cliente='$cliente->tel_cliente', 
tel_empresa='$cliente->tel_empresa', 
cnpj_cpf='$cliente->cnpj', 
tel_wpp='$cliente->tel_wpp',
cep='$cliente->cep',
rua='$cliente->rua', 
complemento='$cliente->complemento',
bairro='$cliente->bairro', 
cidade='$cliente->cidade', 
estado='$cliente->uf', 
email='$cliente->email' WHERE id_cliente = '$id_cliente';";

// VALIDA A QUERY
if ($conn->query($sql) === TRUE) {
    echo '<script>window.location="/Alltap/VIEW/cliente.php"</script>';
}
// SE N, APRESENTA ERRO
else {
    echo "ERRO: " . $conn->error;
}



?>