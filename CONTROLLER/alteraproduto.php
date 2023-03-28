<?php
require "/xampp/htdocs/Alltap/MODEL/database.php";
require "/xampp/htdocs/Alltap/VIEW/update_produto.php";
require "/xampp/htdocs/Alltap/MODEL/produto.php";

// ADICIONA PRODUTO A CLASSE
$produto = new Produto(
    $_POST['nome_produto'],
    $_POST['estoque'],
    $_POST['etiqueta'],
    $_POST['val_dia'],
    $_POST['val_sem'],
    $_POST['val_mes'],
    $_POST['val_tri'],
    $_POST['val_semestre'],
    $_POST['val_ano']
);

//ADCIONA O ID
$id_produto = $_POST['id_produto'];

// SE NÃO, PROCEDE PARA VALIDAR A QUERRY
$sql = "UPDATE produto SET
 nome = '$produto->nome_produto',
 estoque = '$produto->estoque',
 val_dia = '$produto->val_dia',
 val_sem = '$produto->val_sem',
 val_mes = '$produto->val_mes',
 val_tri = '$produto->val_tri',
 val_semestre = '$produto->val_semestre',
 val_ano = '$produto->val_ano' 
 WHERE id_produto = '$id_produto'";


// VALIDA A QUERY
if ($conn->query($sql) === TRUE) {
    echo '<script>alert("ALTERAÇÃO REALIZADA");
            window.location="/Alltap/VIEW/produto.php"</script>';
}
// SE N, APRESENTA ERRO
else {
    echo "ERRO: " . $conn->error;
}
