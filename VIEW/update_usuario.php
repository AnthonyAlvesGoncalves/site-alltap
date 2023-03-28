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
        <title>Alterar Usuario</title>
        <style>
            label {
                display: block;
                text-align: left;
                font-family: Arial, Helvetica, sans-serif;
                color: white;
            }

            h1 {
                text-align: center;
                color: whitesmoke;
            }

            input {
                font-size: 15px;
                width: 40%;
                text-align: left;
            }



            body {
                background-color: rgba(146, 7, 146, 0.97);
            }

            a {
                font-size: 20px;
            }

            .cadastro {
                margin-top: 2%;
                border: 3px outset rgba(0, 0, 0, 0.613);
                background-color: rgba(51, 51, 51, 0.85);
                height: 450px;
                width: 900px;
                position: relative;
                margin-left: 15%;
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
        <!---------------------------------------->
        <div class="cadastro">
            <h1 style="color: yellowgreen; text-align: left; margin-left: 10px;">ALTERAÇÃO DO CLIENTE</h1>
            <?php
            require '/xampp/htdocs/Alltap/MODEL/database.php';

            if (isset($_GET['id'])) {
                $id_usuario = mysqli_real_escape_string($conn, $_GET['id']);

                $query = "SELECT * FROM usuario
      WHERE id_usuario ='$id_usuario';";

                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    $usuario = mysqli_fetch_array($query_run);
            ?>
                    <form action='/Alltap/CONTROLLER/alterausuario.php' onsubmit="" method="post">
                        <div class="row">
                            <div style="margin-left: 60px;" class="col-sm-12">
                                <br>
                                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>" required>
                                <label for="nome">Nome Completo</label>
                                <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>
                                <br><br>
                                <label for="nome_acesso">Nome de Acesso</label>
                                <input type="text" id="nome_acesso" value="<?php echo $usuario['nome_acesso']; ?>" name="nome_acesso" required>
                                <br><br>
                                <label for="senha">Senha</label>
                                <input type="password" id="senha" name="senha" value="<?php echo $usuario['senha']; ?>" required>
                                <br><br><br>
                            </div>
                                <div style="text-align: center;" class="col-sm-12">
                                    <button style="text-align: center;" onclick="retornaTela()" type="reset" name="altera_user" class="btn btn-warning">VOLTAR</button>
                                    <button style="text-align: center;" type="submit" name="altera_user" class="btn btn-success">ALTERAR</button>
                                
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
        window.location="/Alltap/VIEW/usuario.php";
    }
</script>
    </html>
<?php
} else {
    echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>