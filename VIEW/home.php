<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
$_SESSION['date'] = date("Y-m-d");
if (isset($_SESSION['nome_acesso'])) {


?>

  <!DOCTYPE html>
  <html>

  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!------ ICON --------------->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Bem Vindo a Alltap</title>
    <style>
      body {
        background-color: rgba(146, 7, 146, 0.97);
      }

      a {

        font-size: 20px;
        overflow: auto;
      }

      p {
        color: #f1f1f1;
        font-size: 18px;
      }

      td {
        text-align: center;
      }

      h2 {
        color: greenyellow;
      }

      .cadastro {
        margin-top: 1%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: auto;
        position: relative;
        text-align: center;

      }

      .cadastro_2 {
        margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: auto;
        position: relative;
        text-align: center;

      }

      table {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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

    <!------------------ C L I E N T E S ------------------------------>

    <div class="row">
      <div style="margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(70, 70, 70, 0.8);
        height: 200px;
        width: auto; text-align: center; position: relative;" class="col-sm-4">
        <h2>CLIENTES</h2>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';

        $query = "SELECT count(*) FROM cliente";

        $query_run = mysqli_query($conn, $query);

        $cliente = mysqli_fetch_assoc($query_run)

        ?>
        <p>TEMOS UM TOTAL DE </p>
        <h2> <?php echo $cliente['count(*)'] ?> </h2>
        <p>CLIENTES</p>
      </div>
      <!-------------------- P R O D U T O S---------------->
      <div style="margin-top: 2%; border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(70, 70, 70, 0.8);height: 200px;
        width: auto; text-align: center; position: relative;" class="col-sm-4">
        <h2>PRODUTOS</h2>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';

        $query = "SELECT count(*) FROM produto";

        $query_run = mysqli_query($conn, $query);

        $produto = mysqli_fetch_assoc($query_run)

        ?>
        <p>TEMOS UM TOTAL DE </p>
        <h2> <?php echo $produto['count(*)'] ?> </h2>
        <p>PRODUTOS CADASTRADOS</p>
      </div>
      <!---------------------- U S U A R I O -------------------------->
      <div style="margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(70, 70, 70, 0.8);
        height: 200px;
        width: 150px; text-align: center; position: relative;" class="col-sm-4">
        <h2>USUARIOS</h2>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';

        $query = "SELECT count(*) FROM usuario";

        $query_run = mysqli_query($conn, $query);

        $usuario = mysqli_fetch_assoc($query_run)

        ?>
        <p>TEMOS UM TOTAL DE </p>
        <h2> <?php echo $usuario['count(*)']; ?></h2>
        <p>USUARIOS</p>
      </div>
    </div>
    <!--------- LOCACAO ------------->
    <div class="cadastro">
      <br>
      <h1 style="color: greenyellow; text-align: center;">LOCAÇÕES ATIVAS</h1>
      <table class="table table-bordered table-dark">
        <thead class="thead-dark">
          <tr>
            <th>PRODUTO</th>
            <th>DATA DE FINALIZAÇÃO DO CONTRATO</th>
            <th>DIAS ATÉ O FINAL DO CONTRATO</th>
          </tr>
        </thead>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';

        $query = "SELECT locacao.data_fim, produto.cod_etiq, produto.nome FROM locacao
            INNER JOIN produto ON locacao.id_produto = produto.id_produto WHERE status_locacao = 'ativa'; ";

        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $locacao) {
        ?>

            <tbody>
              <tr class="table-light">
                <td style="color: black;"><?= $locacao['nome']; ?> || <?= $locacao['cod_etiq'] ?></td>
            <?php

            $data_final = new DateTime($locacao['data_fim']);
            $data_atual = new DateTime($_SESSION['date']);
            $intervalo = date_diff($data_final, $data_atual);

            if ($intervalo->format("%R%a") <= -10) {
              echo '<td style="background-color: green; color: black;">' .  date_format($data_final, "d / m / Y") . '</td>';
              echo '<td style="color: black;">' . $intervalo->format("%a") . '</td>';
            } else if ($intervalo->format("%R%a") < 0) {
              echo '<td style="background-color: yellow; color: black;">' .  date_format($data_final, "d / m / Y") . '</td>';
              echo '<td style="color: black;">' . $intervalo->format("%a") . '</td>';
            } else {
              echo '<td style="background-color: red; color: black;">' .  date_format($data_final, "d / m / Y") . '</td>';
              echo '<td style="color: black;" >' . $intervalo->format("%R%a") . '</td>';
            }
          }
        }
            ?>
              </tr>
            </tbody>
      </table>
    </div>
    <!------------------------------>
    <div class="cadastro_2">
      <br>
      <h1 style="color: greenyellow; text-align: center;">CHAMADOS ATIVOS</h1>
      <table class="table table-bordered table-dark">
        <thead class="thead-dark">
          <tr>
            <th>PRODUTO</th>
            <th>DATA DO CHAMADO</th>
            <th>RESPONSAVEL</th>
            <th>URGÊNCIA</th>
          </tr>
        </thead>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';

        $query = "SELECT chamados.data_abertura, chamados.urgencia,produto.cod_etiq, produto.nome as produto, usuario.nome FROM chamados
        INNER JOIN produto ON chamados.id_produto = produto.id_produto
        INNER JOIN usuario ON chamados.id_usuario = usuario.id_usuario
        WHERE status_chamado IN ('aberto', 'processando')";

        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $chamados) {
            $data_chamado = new DateTime($chamados['data_abertura']);
        ?>

            <tbody>
              <tr class="table-light">
                <td style="color: black;"><?= $chamados['produto']; ?> || <?= $chamados['cod_etiq'] ?></td>
                <td style="color: black;"><?= date_format($data_chamado, "d / m / Y"); ?></td>
                <td style="color: black;"><?= $chamados['nome'] ?></td>
            <?php
            switch ($chamados['urgencia']) {
              case 'sim':
                echo '<td style="color: black;"> SIM </td>';
                break;
              case 'nao':
                echo '<td style="color: black;"> NÃO </td>';
                break;
            }
          }
        }
            ?>
              </tr>
            </tbody>
      </table>
    </div>
  </body>

  </html>
<?php
} else {
  echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>