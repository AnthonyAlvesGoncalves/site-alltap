 <?php
  require '/xampp/htdocs/Alltap/MODEL/usuario.php';
  require '/xampp/htdocs/Alltap/MODEL/database.php';

  // INSERINDO NA CLASSE CLIENTE
  $usuario = new Usuario($_POST['nome_acesso'], $_POST['senha'], $_POST['nome'], $_POST['acesso']);

  // VALIDA SE JA EXISTE
  $query = "SELECT nome_acesso FROM usuario
  WHERE nome_acesso = '$usuario->nome_acesso';";

  $query_run = mysqli_query($conn, $query);
  // SE JÁ EXISTIR NA TABELA UM USUARIO COM O MESMO ACESSO
  if (mysqli_num_rows($query_run)>0) {
    echo '<script> alert("USUARIO JÁ EXISTE");
         window.location="/Alltap/VIEW/usuario.php"</script>';
  }
  //SE NÃO ->
  else {
   $hash = password_hash($usuario->senha, PASSWORD_DEFAULT);

    // INSERT NA TABELA 
    $sql = "INSERT INTO usuario(nome, nome_acesso, senha, tipo_acesso) 
  VALUES('$usuario->nome',
  '$usuario->nome_acesso',
  '$hash',
  '$usuario->tipo_acesso');";
    // SE PASSAR, VOLTA PARA A TELA USUARIO
    if ($conn->query($sql) === TRUE) {
      echo '<script>window.location="/Alltap/VIEW/usuario.php"</script>';
    }
    // SE N, APRESENTA ERRO
    else {
      echo "ERRO: " . $conn->error;
    }
  }
  ?>
