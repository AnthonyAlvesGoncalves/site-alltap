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
    <script>
      function retornaPagina(){
        window.location="/Alltap/VIEW/produto.php";
      }
    </script>
    <title>Editar Produto</title>
    <style>
      .cadastro {
        margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: 600px;
      }

      input[type=text] {
        font-size: 18px;
        width: 40%;
      }

      body {
        background-color: rgba(146, 7, 146, 0.97);
      }

      h4 {
        text-align: center;
        font-family: 'Courier New', Courier;
        font-size: 20px;
      }
      a{
        font-size: 20px;
      }

      label {
        color: white;
        display: block;
        text-align: left;
      }
    </style>
    <script>
    </script>
  </head>

  <body>
    <!------------- MENU BAR    ----------------->
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
    <!--------------------- S E P A R A D O R--------------------->
    <?php
    require '/xampp/htdocs/Alltap/MODEL/database.php';

    if (isset($_GET['id'])) {
      $id_produto = mysqli_real_escape_string($conn, $_GET['id']);

      $query = "SELECT * FROM produto
      WHERE id_produto ='$id_produto';";

      $query_run = mysqli_query($conn, $query);

      if (mysqli_num_rows($query_run) > 0) {
        $produto = mysqli_fetch_array($query_run);

    ?>
        <!--- CADASTRO DE PRODUTO ------>
        <div class="cadastro">
          <br>
          <h1 style="color: greenyellow; font-size: 48px; text-align: left;">ALTERAÇÃO DE PRODUTO</h1>
          <form action='/Alltap/CONTROLLER/alteraproduto.php' onsubmit="" method="post">
            <!-------- DIVISÃO ESQUERDA ------>
            <div class="row">
              <div style="margin-top: 5%; margin-left: 15px;" class="col">
                <input type="hidden" id="id_produto" name="id_produto" value="<?php echo $produto['id_produto']; ?>">
                <label for="nome_produto">NOME DO PRODUTO :</label>
                <input type="text" id="nome_produto" value="<?php echo $produto['nome']; ?>" name="nome_produto" required>
                <br><br><br>
                <label for="estoque">QUANTIDADE EM ESTOQUE</label>
                <input style="pointer-events: none; width: auto;" type="text" id="estoque" value="<?php echo $produto['estoque']; ?>" name="estoque" value="1">
                <br><br><br>
                <label for="estiqueta">CODIGO DA ETIQUETA</label>
                <input style="pointer-events: none; width: auto;" type="text" id="etiqueta" value="<?php echo $produto['cod_etiq']; ?>" name="etiqueta" required>
              </div>
              <!------ DIVISÃO DIREITA ------>
              <div style="margin-top: -5.5%;" class="col">
                <label style="font-size: 24px;" for="val_dia">VALOR DA DIARIA :</label>
                <input type="text" step="any" value="<?php echo $produto['val_dia']; ?>" id="val_dia" name="val_dia" required>
                <br><br>
                <label style="font-size: 24px;" for="val_sem">VALOR DA SEMANA :</label>
                <input type="text" step="any" value="<?php echo $produto['val_sem']; ?>" id="val_sem" name="val_sem" required>
                <br><br>
                <label style="font-size: 24px;" for="val_mes">VALOR MENSAL :</label>
                <input type="text" step="any" value="<?php echo $produto['val_mes']; ?>" id="val_mes" name="val_mes" required>
                <br><br>
                <label style="font-size: 24px;" for="val_tri">VALOR DA TRIMESTRE :</label>
                <input type="text" step="any" value="<?php echo $produto['val_tri']; ?>" id="val_tri" name="val_tri" required>
                <br><br>
                <label style="font-size: 24px;" for="val_semestre">VALOR DA SEMESTRE :</label>
                <input type="text" step="any" value="<?php echo $produto['val_semestre']; ?>" id="val_semestre" name="val_semestre" required>
                <br><br>
                <label style="font-size: 24px;" for="val_ano">VALOR ANUAL :</label>
                <input type="text" step="any" value="<?php echo $produto['val_ano']; ?>" id="val_ano" name="val_ano" required>
                <br><br>
              </div>
            </div>
            <div style="margin-left: 15%; margin-top: -5%;" class="col-sm-12">
              <button type="button" onclick="retornaPagina()" class="btn btn-danger">RETORNAR</button>
              <button type="submit" class="btn btn-success">ALTERAR</button>
            </div>
        </div>
        </form>
    <?php
      } else {
        echo "ID NÃO EXISTENTE";
      }
    }
    ?>
    <br><br>
    </div>
    </div>
    </tr>
    </table>
    </div>
    </div>
  </body>

  </html>
<?php
} else {
  echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>