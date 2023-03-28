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
    <title>Area do Usuario</title>
    <style>
      th {
        color: green;
      }

      td {
        color: black;
        background-color: white;
      }


      .cadastro {
        margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: auto;
        position: relative;
        right: -15%;
        margin-right: 40%;
      }

      .cadastro_lista {
        margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: auto;
        position: relative;

      }

      label {
        display: inline-block;
        float: left;
        clear: left;
        width: 250px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: medium;
        color: aliceblue;
      }

      input[type=password] {
        display: inline-block;
        float: left;
        width: 40%;
      }

      h2 {
        color: white;
      }

      body {
        background-color: rgba(146, 7, 146, 0.97);
      }
      a{
        font-size: 20px;
      }
    </style>
    <script>
      //     VALIDA SENHA
      function passwordValidation() {
        var password = document.getElementById("senha");
        var password2 = document.getElementById("confirma_senha");
        if (password = password2) {
          alert("USUARIO CRIADO COM SUCESSO");
          return true;
        } else {
          alert("SENHAS NAO CONFEREM, VERIFIQUE E TENTE NOVAMENTE");
          return false;
        }
      }
    </script>
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
                                <a class="nav-link" href="/Alltap/CONTROLLER//sair.php"><i class="material-icons" style="font-size: 19px;">exit_to_app</i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
    <!--- CADASTRO DE USUARIO ------>
    <div class="cadastro">
      <br>
      <h1 style="color: greenyellow; text-align: left; margin-left: 10px; font-size: 48px;">CADASTRO DE USUARIO</h1>
      <br>
      <form action='/Alltap/CONTROLLER/adicionausuario.php' onsubmit="" method="post">
        <div class="row">
        <div class="col-sm-12">
          <label for="nome">Nome Completo</label>
          <input style="float: left; font-size: 15px; width: 400px;" type="text" id="nome" name="nome" required>
          <br>
          <label for="nome_acesso">Nome de Acesso</label>
          <input style="float: left; font-size: 15px; width: 400px;" type="text" id="nome_acesso" name="nome_acesso" required>
          <br>
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha" required>
          <br>
          <label for="confirma_senha">Confirma Senha</label>
          <input type="password" id="confirma_senha" name="confirma_senha" required>
          <!--------- RADIOS DA SELEÇÃO ------->
        </div>
        <div class="col-sm-12">
          <br>
          <h3 style="text-align: center; color: greenyellow;">TIPOS DE CONTA</h3>
          <input type="radio" id="ADM" name="acesso" value="1" required>
          <label for="ADM">ADMINISTRADOR</label><br><br>
          <input type="radio" id="COM" name="acesso" value="2">
          <label for="COM">COMERCIAL</label><br><br>
          <input type="radio" id="SUP" name="acesso" value="3">
          <label for="SUP">SUPORTE</label>
        </div>
    </div>
        <div style="text-align: center; margin-top: 10px;" class="col-sm-12">
          <button type="reset" class="btn btn-danger">LIMPAR</button>
          <button type="submit" class="btn btn-success">ENVIAR</button>
        </div>
      </form>
    </div>
      <!---------- Lista de Usuarios ------------->
      <div class="cadastro_lista">
        <br>
        <h2 style="color: greenyellow; text-align: left; font-size: 48px; margin-left: 10px;"> Lista de Usuarios </h2>
        <br>
        <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>NOME DE ACESSO</th>
            <th>TIPO ACESSO</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
            <?php
            require '/xampp/htdocs/Alltap/MODEL/database.php';
            $query = "SELECT id_usuario, nome, nome_acesso, tipo_acesso FROM usuario";
            $query_run = mysqli_query($conn, $query);
            if (mysqli_num_rows($query_run) > 0) {
              foreach ($query_run as $usuario) {
            ?>
            <tbody>
          <tr>
            <td><?= $usuario['id_usuario']; ?></td>
            <td><?= $usuario['nome']; ?></td>
            <td><?= $usuario['nome_acesso']; ?></td>
            <?php
            
            switch($usuario['tipo_acesso']){
              case '1':
                echo "<td>ADMINISTRADOR</td>";
                break;
              case '2':
                echo "<td>COMERCIAL</td>";
                break;
              case '3':
                echo "<td>SUPORTE</td>";
                break;
            }
            ?>
            <td><a href="/Alltap/VIEW/update_usuario.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-info">EDITAR</a></td>
            <td><a href="/Alltap/CONTROLLER/deleta_usuario.php?id=<?= $usuario['id_usuario'] ?>" class="btn btn-danger">DELETAR</a></td>
          </tr>
          </tbody>
        <?php
              }
            } else {
        ?>
        <div class="lista_user_zero">
          <h1>SEM CLIENTE CADASTRADO</h1>
        </div>
      <?php
            }
      ?>
      </tr>
        </table>
      </div>
      <!------------------------------------------->
    </div>
  </body>

  </html>
<?php
} else {
  echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>