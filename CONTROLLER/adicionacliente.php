    <?php

    require "/xampp/htdocs/Alltap/MODEL/cliente.php";
    require "/xampp/htdocs/Alltap/MODEL/database.php";
    include "/xampp/htdocs/Alltap/MODEL/database.php";

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
    $query = "SELECT nome_empresa, cnpj_cpf FROM cliente
          WHERE cnpj_cpf = '$cliente->cnpj'";

    $query_run = mysqli_query($conn, $query);

// VALIDA SE JÁ EXISTE UM CLIENTE COOM ESSE NUMERO
    if(mysqli_num_rows($query_run)>0){

        // SE JÁ EXISTIR RETORNA PARA A TELA PRINCIPAL
        echo '<script> alert("CLIENTE JÁ CADASTRADO")
        window.location="/Alltap/VIEW/cliente.php"</script>';
    }

    else{

        $sql = "INSERT INTO cliente (nome_empresa, cnpj_cpf, tel_empresa, ins_est, nome_cliente, 
    tel_cliente, tel_wpp, rua, complemento, cidade, estado, cep, bairro, email) VALUES ('$cliente->nome_empresa',
'$cliente->cnpj',
'$cliente->tel_empresa',
'$cliente->ins_est',
'$cliente->nome_cliente', 
'$cliente->tel_cliente',
'$cliente->tel_wpp',
'$cliente->rua',
'$cliente->complemento',
'$cliente->cidade',
'$cliente->uf',
'$cliente->cep',
'$cliente->bairro',
'$cliente->email');";

    // SE PASSAR, VOLTA PARA A TELA USUARIO
    if ($conn->query($sql) === TRUE) {
        echo '<script>window.location="/Alltap/VIEW/cliente.php"</script>';
    }
    // SE N, APRESENTA ERRO
    else {
        echo "ERRO: " . $conn->error;
    }

    }

    ?>