<?php
session_start();
if (isset($_SESSION['nome_acesso'])) {
include_once '/xampp/htdocs/Alltap/MODEL/consumir_cep.php';
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
  <title>Area dos Produtos</title>
  <style>

    td {
      color: black;
      background-color: white;
    }
    a{
      font-size: 20px;
    }

    .cadastro {
      margin-top: 2%;
      border: 3px outset rgba(0, 0, 0, 0.613);
      background-color: rgba(52, 52, 52, 0.916);
      height: 600px;
      position: relative;
      align-items: center;
      text-align: center;
    }
    .cadastro_lista {
      margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: auto;
        position: relative;
    }

    input[type=text] {
      display: inline-block;
      float: left;
      font-size: 15px;
      width: 40%;
    }

    input[type=number] {
      display: inline-block;
      float: left;
      font-size: 15px;
      width: 40%;
    }


    body {
      background-color: rgba(146, 7, 146, 0.97);
    }
    label{
      color: white;
      font-size: 18px;
      text-align: left;
      display: block;
    }


  </style>
  <script>
    function retornaPagina() {
      window.location="/Alltap/VIEW/produto.php"
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
  <!--- CADASTRO DE PRODUTO ------>
  <div class="cadastro">
    <br>
    <h1 style="color: greenyellow; font-size: 48px; text-align: left; margin-left: 10px;">CADASTRO DE PRODUTO</h1>
    <form action='/Alltap/CONTROLLER/adicionaproduto.php' onsubmit="" method="post">
      <!-------- DIVISÃO ESQUERDA ------>
      <div class="row">
      <div style="margin-left: 100px;" class="col">
        <br><br>
        <label for="nome_produto">NOME DO PRODUTO :</label>
        <input type="text" id="nome_produto" name="nome_produto" required>
        <br><br><br>
        <label for="estoque">QUANTIDADE EM ESTOQUE</label>
        <input style="pointer-events: none; width: 10%;" type="number" id="estoque" name="estoque" value="1">
        <br><br><br>
        <label for="estiqueta">CODIGO DA ETIQUETA</label>
        <input type="text" id="etiqueta" name="etiqueta" required>  
      </div>
      <!------ DIVISÃO DIREITA ------>
      <div style="margin-top: -4%;" class="col">
        <label for="val_dia">VALOR DA DIARIA :</label>
        <input type="number" step="any" id="val_dia" name="val_dia" placeholder="R$0,0" required>
        <br><br>
        <label for="val_sem">VALOR DA SEMANA :</label>
        <input type="number" step="any"  id="val_sem" name="val_sem" placeholder="R$0,0" required>
        <br><br>
        <label for="val_mes">VALOR MENSAL :</label>
        <input type="number" step="any"  id="val_mes" name="val_mes" placeholder="R$0,0" required>
        <br><br>
        <label for="val_tri">VALOR DA TRIMESTRE :</label>
        <input type="number" step="any"  id="val_tri" name="val_tri" placeholder="R$0,0" required>
        <br><br>
        <label for="val_semestre">VALOR DA SEMESTRE :</label>
        <input type="number" step="any" id="val_semestre" name="val_semestre" placeholder="R$0,0" required>
        <br><br>
        <label for="val_ano">VALOR ANUAL :</label>
        <input type="number" step="any" id="val_ano" name="val_ano" placeholder="R$0,0" required>
      </div>
      </div>
      <div class="col-sm-12">
        <br>
       <button type="reset" class="btn btn-danger">LIMPAR</button>
       <button type="submit" class="btn btn-success">ENVIAR</button>
      </div>
    </form>
    <br><br>
  </div>
  </div>
  <!---------- Lista de Cliente ------------->
  <div class="cadastro_lista">
    <h1 style="color: greenyellow; font-size: 48px; text-align: left; margin-left: 10px;"> LISTA DE PRODUTOS </h1>
    <br>
    <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>NOME DO PRODUTO</th>
        <th>CODIGO DA ETIQUETA</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';
        $query = "SELECT id_produto, nome, cod_etiq FROM produto";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $produtos) {
        ?>
        <tbody>
      <tr>
        <td><?= $produtos['id_produto']; ?></td>
        <td><?= $produtos['nome']; ?></td>
        <td><?= $produtos['cod_etiq']; ?></td>
        <td><a href="/Alltap/VIEW/view_produto.php?id=<?= $produtos['id_produto'] ?>" class="btn btn-primary">VISUALIZAR</a></td>
        <td><a href="/Alltap/VIEW/update_produto.php?id=<?= $produtos['id_produto'] ?>" class="btn btn-success">EDITAR</a></td>
        <td><a href="/Alltap/CONTROLLER/deleta_produto.php?id=<?= $produtos['id_produto'] ?>" class="btn btn-danger">DELETAR</a></td>
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
  </div>
</body>
</html>
<?php
}
else{
  echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>