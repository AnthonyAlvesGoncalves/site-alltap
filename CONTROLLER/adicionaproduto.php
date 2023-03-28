<?php

require "/xampp/htdocs/Alltap/MODEL/database.php";
require "/xampp/htdocs/Alltap/MODEL/produto.php";

$produto = new Produto($_POST['nome_produto'], 
$_POST['estoque'], 
$_POST['etiqueta'], 
$_POST['val_dia'], 
$_POST['val_sem'], 
$_POST['val_mes'],
 $_POST['val_tri'], 
 $_POST['val_semestre'], 
 $_POST['val_ano']);

$query = " SELECT cod_etiq FROM produto
            WHERE cod_etiq = '$produto->etiqueta'";

$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
    echo '<script> alert("PRODUTO JÁ CADASTRADO")
           window.location="/Alltap/VIEW/produto.php" </script>';
} 

else {
    echo "passou";
    $sql = "INSERT INTO produto (nome, estoque, cod_etiq, val_dia,
    val_sem, val_mes, val_tri, val_semestre, val_ano) VALUES ('$produto->nome_produto',
        '$produto->estoque',
        '$produto->etiqueta',
        '$produto->val_dia',
        '$produto->val_sem',
        '$produto->val_mes',
        '$produto->val_tri',
        '$produto->val_semestre',
        '$produto->val_ano')";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location="/Alltap/VIEW/produto.php"</script>';
  }
  // SE N, APRESENTA ERRO
  else {
    echo "ERRO: " . $conn->error;
  }
}
