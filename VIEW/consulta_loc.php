<?php
session_start();
if (isset($_SESSION['nome_acesso'])) {
include_once '/xampp/htdocs/Alltap/MODEL/database.php';

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
    <title>Consultar Locação</title>
    <style>
        table {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 20px;
            border: 3px outset rgba(0, 0, 0, 0.500);
            background-color: rgba(228, 228, 228, 0.724);
            border-collapse: collapse;
            text-align: center;
            width: 100%;
        }

        .cadastro {
            margin-top: 2%;
            border: 3px outset rgba(0, 0, 0, 0.613);
            background-color: rgba(52, 52, 52, 0.916);
            height: auto;
            position: relative;
        }


        body {
            background-color:  rgba(146, 7, 146, 0.97);
        }

        h4 {
            text-align: center;
            font-family: 'Courier New', Courier;
            font-size: 20px;
        }

        .lista_user_zero {
            margin-top: 2%;
            border: 3px outset rgba(0, 0, 0, 0.613);
            background-color: rgba(52, 52, 52, 0.916);
            height: 80px;
            text-align: center;
            align-self: baseline;

        }
        td{
            color: black;
            background-color: white;
        }
        a{
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
                                <a class="nav-link" href="/Alltap/CONTROLLER//sair.php"><i class="material-icons" style="font-size: 19px;">exit_to_app</i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
    <!--- CADASTRO DE CLIENTE ------>
    <div class="cadastro">
    <h1 style="color: greenyellow; font-size: 48px; text-align: left;"> LISTA DE LOCAÇÃO </h1>
    <!----------- TABELA DAS LOCACOES ABERTAS ------------------->
    <br>
    <h1 style="color: greenyellow; font-size: 32px; text-align: left;"> LOCAÇÕES ABERTAS </h1>
    <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>PRODUTO</th>
        <th>PROJETO/EMPREENDIMENTO</th>
        <th>DATA DE INICIO</th>
        <th>DATA DE FIM</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';
        $query = "SELECT locacao.id_locacao, produto.nome, produto.cod_etiq, locacao.projeto_empre, locacao.data_inicio, locacao.data_fim FROM locacao
                  INNER JOIN produto ON locacao.id_produto = produto.id_produto WHERE status_locacao = 'ativa'";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $locacao) {
            $data_inicio = new DateTime($locacao['data_inicio']);
            $data_fim = new DateTime($locacao['data_fim']);
        ?>
      <tr>
        <td><?= $locacao['id_locacao'];?></td>
        <td><?= $locacao['nome'] ?> || <?= $locacao['cod_etiq'] ?></td>
        <td><?= $locacao['projeto_empre'];?></td>
        <td><?= date_format($data_inicio,"d / m / Y");?></td>
        <td><?= date_format($data_fim,"d / m / Y");?></td>
        <td><a href="/Alltap/VIEW/view_locacao.php?id=<?php echo $locacao['id_locacao'];?>" class="btn btn-primary">VISUALIZAR</a></td>
        <td><a href="/Alltap/VIEW/update_locacao.php?id=<?php echo $locacao['id_locacao'];?>" class="btn btn-danger">EDITAR</a></td>
      </tr>
    <?php
          }
        } else {
    ?>
    <div>
      <h1>SEM CLIENTE CADASTRADO</h1>
    </div>
  <?php
        }
  ?>
  </tr>
    </table>
    <!----------- TABELA DAS LOCACOES FECHADAS ------------------->
    <h1 style="color: greenyellow; font-size: 32px; text-align: left;"> LOCAÇÕES FECHADAS </h1>
    <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>PRODUTO</th>
        <th>PROJETO/EMPREENDIMENTO</th>
        <th>DATA DE INICIO</th>
        <th>DATA DE FIM</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';
        $query = "SELECT locacao.id_locacao, produto.nome, produto.cod_etiq, locacao.projeto_empre, locacao.data_inicio, locacao.data_fim FROM locacao
                  INNER JOIN produto ON locacao.id_produto = produto.id_produto WHERE status_locacao = 'finalizada'";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $locacao) {
            $data_inicio = new DateTime($locacao['data_inicio']);
            $data_fim = new DateTime($locacao['data_fim']);
        ?>
      <tr>
        <td><?= $locacao['id_locacao'];?></td>
        <td><?= $locacao['nome'] ?> || <?= $locacao['cod_etiq'] ?></td>
        <td><?= $locacao['projeto_empre'];?></td>
        <td><?= date_format($data_inicio,"d / m / Y");?></td>
        <td><?= date_format($data_fim,"d / m / Y");?></td>
        <td><a href="/Alltap/VIEW/view_locacao.php?id=<?php echo $locacao['id_locacao'];?>" class="btn btn-primary">VISUALIZAR</a></td>
        <td></td>
      </tr>
    <?php
          }
        } else {
    ?>
    <div>
      <h1>SEM CLIENTE CADASTRADO</h1>
    </div>
  <?php
        }
  ?>
  </tr>
    </table>
        </form>
    </div>
    </div>
    </div>
</body>
</html>
<?php
}
else{
  echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>
