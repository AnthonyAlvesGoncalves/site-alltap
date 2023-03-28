<?php
session_start();
if (isset($_SESSION['nome_acesso'])) {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!------ ICON --------------->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Editar Cliente</title>
    <style>
      label {
        color: white;
        display: block;
        font-size: 20px;
        text-align: left;
        font-family: Arial, Helvetica, sans-serif;
      }

      .cadastro {
        margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: 650px;
        position: relative;
      }

      input {
        font-size: 15px;
        width: 60%;
      }


      .endereco {
        margin-top: 2%;
        border: 2px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(36, 134, 0, 0.724);
        height: 250px;
        position: relative;

      }

      body {
        background-color: rgba(146, 7, 146, 0.97);
      }

      a {
        font-size: 20px;
      }
    </style>
  </head>

  <body>
    <!------------- MENU BAR    ----------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
      <img src="logo.png" width="100x100">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php"><i class="material-icons" style="font-size: 19px;">home</i> Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="cliente.php"><i class="material-icons" style="font-size: 19px;">public</i> Cliente</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="usuario.php"><i class="material-icons" style="font-size: 19px;">people_outline</i> Usuario</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="produto.php"><i class="material-icons" style="font-size: 19px;">desktop_windows</i> Produtos</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="chamado.php"><i class="material-icons" style="font-size: 19px;">tap_and_play</i>Chamados</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons" style="font-size: 19px;">business</i> Locação
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="consulta_loc.php"><i class="material-icons" style="font-size: 19px;">content_paste</i> Ver Locações</a>
              <a class="dropdown-item" href="venda_cliente.php"><i class="material-icons" style="font-size: 19px;">add_box</i> Passar Locação</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Procurar na Pagina" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
          </form>
          <li class="nav-item active">
            <a class="nav-link" href="/Alltap/CONTROLLER/sair.php"><i class="material-icons" style="font-size: 19px;">exit_to_app</i></a>
          </li>
        </ul>
      </div>
    </nav>
    <!---------------------------------------->
    <?php
    require '/xampp/htdocs/Alltap/MODEL/database.php';

    if (isset($_GET['id'])) {
      $id_cliente = mysqli_real_escape_string($conn, $_GET['id']);

      $query = "SELECT * FROM cliente
      WHERE id_cliente ='$id_cliente';";

      $query_run = mysqli_query($conn, $query);

      if (mysqli_num_rows($query_run) > 0) {
        $cliente = mysqli_fetch_array($query_run);
    ?>
        <!----------------------------------------------------------------------------------->
        <div class="cadastro">
          <h1 style="color: yellowgreen; text-align: left; margin-left: 10px;">ALTERAÇÃO DO CLIENTE</h1>
          <form action="/Alltap/CONTROLLER/alteracliente.php" method="post">
            <div class="row">
              <div style="margin-left: 10px;" class="col">
                <input type="hidden" id="id_cliente" value="<?php echo $cliente['id_cliente']; ?>" name="id_cliente">
                <label for="nome_empresa">NOME DA EMPRESA :</label>
                <input type="text" id="nome_empresa" value="<?php echo $cliente['nome_empresa']; ?>" name="nome_empresa" required>
                <br><br>
                <label for="nome_cliente">NOME DO CLIENTE :</label>
                <input type="text" id="nome_cliente" value="<?php echo $cliente['nome_cliente']; ?>" name="nome_cliente" required>
                <br><br>
                <label for="ins_est">INSCRIÇÃO ESTADUAL :</label>
                <input type="text" id="ins_est" value="<?php echo $cliente['ins_est']; ?>" name="ins_est" required>
              </div>
              <div class="col">
                <label for="tel_cliente">TELEFONE DE CONTATO :</label>
                <input type="tel" id="tel_cliente" value="<?php echo $cliente['tel_cliente']; ?>" name="tel_cliente" required>
                <br><br>
                <label for="tel_empresa">TELEFONE DA EMPRESA :</label>
                <input type="tel" id="tel_empresa" value="<?php echo $cliente['tel_empresa']; ?>" name="tel_empresa" data-mask="(00) 00000-0000" data-mask-selectonfocus="true" required>
                <br><br>
                <label for="cnpj">CNPJ/CPF :</label>
                <input type="text" id="cnpj" name="cnpj" value="<?php echo $cliente['cnpj_cpf']; ?>" data-mask="00.000.000/0001-00" data-mask-selectonfocus="true" required>
              </div>
              <div class="col">
                <label for="tel_wppo">WHATSAPP :</label>
                <input type="tel" id="tel_wpp" value="<?php echo $cliente['tel_wpp']; ?>" name="tel_wpp" required>
                <br><br>
                <label for="email">EMAIL :</label>
                <input type="email" id="email" value="<?php echo $cliente['email']; ?>" name="email" required>
              </div>
            </div>
            <!--------ENDEREÇO ----------->
            <div class="endereco">
              <!---- ALINHAMENTO A ESQUERDA DO ENDEREÇO ------>
              <div class="row">
                <div style="margin-left: 10px;" class="col">
                  <label for="cep">CEP:</label>
                  <input type="text" id="cep" name="cep" value="<?php echo $cliente['cep'] ?>" required>
                </div>
                <div class="col">
                  <!------ FORM DE ENDEREÇO ------>
                  <label style="font-size: 18px;" for="rua">RUA</label>
                  <input  type="text" id="rua" value="<?php echo $cliente['rua'] ?>" name="rua">
                  <br><br>
                  <label style="font-size: 18px;" for="complemento">COMPLEMENTO</label>
                  <input type="text" id="complemento" name="complemento" value="<?php echo $cliente['complemento'] ?>">
                </div>
                <!---ALINHAMENTO A DIREITA DOS ENDEREÇOS --->
                <div class="col">
                  <label style="font-size: 18px;" for="bairro">BAIRRO</label>
                  <input type="text" id="bairro" name="bairro" value="<?php echo $cliente['bairro'] ?>">
                  <br><br>
                  <label style="font-size: 18px;" for="cidade">CIDADE</label>
                  <input type="text" id="cidade" name="cidade" value="<?php echo $cliente['cidade'] ?>">
                  <br><br>
                  <label style="font-size: 18px;" for="uf">ESTADO</label>
                  <input type="text" id="uf" name="uf" value="<?php echo $cliente['estado'] ?>">
                </div> 
                <div style="text-align: center;" class="col-sm-12">
                <br>
                  <button style="text-align: center;" onclick="retornaTela()" type="reset" name="altera_user" class="btn btn-warning">VOLTAR</button>
                  <button style="text-align: center;" type="submit" name="altera_user" class="btn btn-success">ALTERAR</button>

                </div>
              </div>

          </form>
      <?php
      } else {
        echo "ID NÃO EXISTENTE";
      }
    }
      ?>
        </div>
  </body>
  <script>
    function retornaTela(){
        window.location="/Alltap/VIEW/cliente.php";
    }
</script>

  </html>
<?php
} else {
  echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>