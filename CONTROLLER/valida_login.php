<?php

use function PHPSTORM_META\type;

require '/xampp/htdocs/Alltap/MODEL/database.php';
/// ALOCA AS VARIAVEIS
$acesso = $_POST['nome_acesso'];
$entrar = $_POST['senha'];

// EXECUTA A QUERY
$query = "SELECT nome_acesso, senha FROM usuario
          WHERE nome_acesso = '$acesso'";

$query_run = mysqli_query($conn, $query);
//ATRIBUI A QUERY A VARIAVEL
$login = mysqli_fetch_array($query_run);

// SE TIVER RETORNO ->
if(isset($login)){
    //VERIFICA SE A SENHA É VALIDA
        if(password_verify($entrar, $login['senha'])){
                session_start();
                $_SESSION['nome_acesso'] = $acesso;
                 header("Location: /Alltap/VIEW/home.php");
        }
        // SE NÃO
        else{ 
              echo '<script>alert(" USUARIO OU SENHA ERRADA")
              window.location="/Alltap/VIEW/login.php"</script>';
        }

}
// SE NÃO, APARECE ERRO
else{
    echo '<script>alert("LOGIN OU SENHA INVALIDA")
        window.location="/Alltap/VIEW/login.php"</script>';
        
}
