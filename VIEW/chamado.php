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
      }

      i {
        position: relative;
        align-items: center;
        align-self: center;
      }

      h1 {
        color: mintcream;
        font-size: 32px;
      }

      p {
        color: #f1f1f1;
        font-size: 18px;
      }

      h2 {
        color: greenyellow;
      }

      .cadastro {
        margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: 400px;
        position: relative;
        align-items: center;
        text-align: center;
      }

      td {
        color: black;
        background-color: white;
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
    <!--------- CHAMADOS ------------->
    <div class="cadastro">
      <br>
      <h1 style="color: greenyellow; font-size: 48px;">CHAMADOS</h1>
      <a href="/Alltap/VIEW/abrir_chamado.php" style="float: left;" class="btn btn-danger btn-lg"><i class="material-icons" style=" align-self: center;font-size: 19px;">add_circle</i> ABRIR CHAMADO</a>
      <table style="margin-top: 5%;" class="table">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>DATA DE ABERTURA</th>
            <th>PRODUTO</th>
            <th>STATUS</th>
            <th>LOCADO</th>
            <th>ATRIBUIDO PARA</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';

        $query = "SELECT chamados.id_chamado, chamados.locado, chamados.data_abertura, produto.nome as produto, produto.cod_etiq, chamados.status_chamado, usuario.nome FROM chamados
                  INNER JOIN produto ON chamados.id_produto = produto.id_produto
                  INNER JOIN usuario ON chamados.id_usuario = usuario.id_usuario";

        $query_run = mysqli_query($conn, $query);

        foreach ($query_run as $chamados) {
          $data_abertura = new DateTime($chamados['data_abertura']);
          $status = $chamados['status_chamado'];
        ?>
          <tbody>
            <tr>
              <td><?= $chamados['id_chamado']; ?></td>
              <td><?= date_format($data_abertura, "d / m / Y") ?></td>
              <td><?= $chamados['produto']; ?> || <?= $chamados['cod_etiq']; ?> </td>
              <?php
              switch ($status) {
                case 'aberto':
                  echo '<td style="color: black;background-color: red;font-size: 20px;">ABERTO </td>';
                  break;
                case 'processando':
                  echo '<td style="color: black;background-color: yellow;font-size: 20px;">PROCESSANDO </td>';
                  break;
                case 'concluido':
                  echo '<td style="color: black;background-color: green;font-size: 20px;">CONCLUIDO </td>';
                  break;
                case 'fechado':
                  echo '<td style="color: black;background-color: grey;font-size: 20px;">FECHADO </td>';
                  break;
              }
              ?>
              <?php

              switch($chamados['locado']){
                case 'sim':
                  echo '<td>SIM</td>';
                case 'nao':
                  echo '<td>NÃO</td>';
              }
              ?>
              <td><?= $chamados['nome']; ?></td>
              <td><a href="/Alltap/VIEW/view_chamado.php?id=<?= $chamados['id_chamado'] ?>" class="btn btn-info">VISUALIZAR</a></td>
              <td><a href="/Alltap/VIEW/update_chamado.php?id=<?= $chamados['id_chamado'] ?>" class="btn btn-success">EDITAR</a></td>
            </tr>
          </tbody>
        <?php } ?>
      </table>
    </div>
  </body>

  </html>
<?php
} else {
  echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>