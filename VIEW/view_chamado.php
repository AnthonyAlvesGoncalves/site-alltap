<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
$_SESSION['date'] = date("Y-m-d");
include '/xampp/htdocs/Alltap/MODEL/database.php';
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
        <title>Abrir Chamado</title>
        <script>
            function retornarPagina(){
                window.location="/Alltap/VIEW/chamado.php";
            }
        </script>
        <style>
            body {
                background-color: rgba(146, 7, 146, 0.97);
            }

            a {
                font-size: 20px;
            }

            h1 {
                color: mintcream;
                font-size: 32px;
            }

            h2 {
                color: greenyellow;
            }

            .cadastro {
                margin-top: 2%;
                border: 3px outset rgba(0, 0, 0, 0.613);
                background-color: rgba(52, 52, 52, 0.916);
                height: 630px;
                position: relative;
                align-items: center;
            }

            select {
                font-size: 18px;
                width: 70%;
            }

            label {
                color: white;
                font-size: 16px;
                display: block;
            }

            input{
                font-size: 20px;
                width: 70%;
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
<?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';

        if (isset($_GET['id'])) {
            $id_chamado = mysqli_real_escape_string($conn, $_GET['id']);

            $query = "SELECT chamados.status_chamado, chamados.data_abertura, produto.nome as produto, produto.cod_etiq, usuario.nome ,chamados.observacao,
            chamados.locado, chamados.urgencia, chamados.rua, chamados.complemento, chamados.bairro,chamados.cidade,
            chamados.estado FROM chamados
            INNER JOIN produto ON chamados.id_produto = produto.id_produto
            INNER JOIN usuario ON chamados.id_usuario = usuario.id_usuario
            WHERE id_chamado = '$id_chamado';";

            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $chamado = mysqli_fetch_array($query_run);

                ?>


        <!-------------------------------->
        <div class="cadastro">
            <form method="post" action="/Alltap/CONTROLLER/adiciona_chamado.php">
                <h1 style="text-align: left; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 48px; color: greenyellow; margin-left: 10px;">ABERTURA DE CHAMADO</h1>
                <div class="row">
                    <div class="col-sm-4">
                        <br>
                        <label for="status_chamado">STATUS:</label>
                        <select style="pointer-events: none;" id="status_chamado" name="status_chamado" required>
                            <option value=""><?php echo $chamado['status_chamado']?></option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <label for="id_produto">PRODUTO</label>
                        <select style="pointer-events: none;" name="id_produto" id="id_produto" required>
                        <option value=""><?php echo $chamado['produto']?> || <?php echo $chamado['cod_etiq']?></option>
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <br>
                        <label for="id_usuario">ATRIBUIDO À:</label>
                        <select style="pointer-events: none;" name="id_usuario" id="id_usuario" required>
                            <option value=""><?php echo $chamado['nome']?></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label style="text-align: left;" for="observacao">Observação</label>
                    <textarea style="font-size: 20px; pointer-events: none;" valu class="form-control" name="observacao" rows="4"><?php echo $chamado['observacao']?></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label style="float:inline-start" for="locado">PRODUTO LOCADO:</label>
                        <select style="pointer-events: none;" id="locado" name="locado" required>
                            <option  value=""><?php echo $chamado['locado']?></option>
                        </select>
                        <br>
                        <label for="bairro">BAIRRO</label>
                        <input style="pointer-events: none;" value="<?php echo $chamado['bairro']?>" type="text" id="bairro" name="bairro">
                        <br>
                        <label for="uf">ESTADO</label>
                        <input style="pointer-events: none;" type="text" id="uf" value="<?php echo $chamado['estado']?>" name="uf">
                    </div>
                    <div class="col-sm-4">
                        <label style="float:inline-start" for="urgencia">ESTÁ AFETANDO A EXIBIÇÃO ? </label>
                        <select style="pointer-events: none;" id="urgencia" name="urgencia" required>
                            <option value=""><?php echo $chamado['urgencia']?></option>
                        </select>
                        <br>
                        <label for="rua">RUA</label>
                        <input style="pointer-events: none;" value="<?php echo $chamado['rua']?>" type="text" id="rua" name="rua">
                        <br>
                        <label for="complemento">COMPLEMENTO</label>
                        <input style="pointer-events: none;" value="<?php echo $chamado['complemento']?>" type="text" id="complemento" name="complemento">
                    </div>
                    <div class="col-sm-4">
                        <label for="cep">CEP DA LOCALIDADE(SE ESTIVER LOCADO)</label>
                        <input style="pointer-events: none;" type="text" id="cep" name="cep">
                        <br><br>
                        <label for="localidade">CIDADE</label>
                        <input style="pointer-events: none;" value="<?php echo $chamado['cidade']?>" type="text" id="cidade" name="cidade">
                    </div>
                </div>
                <div style="text-align: center; margin-top: 50px;" class="col-sm-12">
                    <button type="button" onclick="retornarPagina()" class="btn btn-warning">RETORNAR</button>
                </div>
        </div>
        </form>
    </body>

    </html>
<?php
            }
        }
} else {
    echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>