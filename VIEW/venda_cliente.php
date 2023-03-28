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
        <title>Passar uma Locação</title>
        <style>
            .cadastro {
                margin-top: 2%;
                border: 3px outset rgba(0, 0, 0, 0.613);
                background-color: rgba(52, 52, 52, 0.916);
                height: 250px;
                position: relative;
                align-items: center;
                text-align: center;
            }

            .cadastro_clientes {
                margin-top: 2%;
                border: 3px outset rgba(0, 0, 0, 0.613);
                background-color: rgba(52, 52, 52, 0.916);
                height: 450px;
                position: relative;
            }

            body {
                background-color: rgba(146, 7, 146, 0.97);
            }

            h4 {
                text-align: center;
                font-family: 'Courier New', Courier;
                font-size: 20px;
            }

            label {
                color: white;
                display: block;
                font-size: 20px;
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
            <h1 style="color: greenyellow; font-size: 48px; text-align: left;">LOCAÇÃO</h1>
            <form action='/Alltap/VIEW/loc_seg.php' onsubmit="" method="POST">
                <div style="text-align: center;" class="col">
                    <!----------- SELECIONAR PRODUTO-------------->
                    <label class="selecionar_produto_label" for="id_produto">SELECIONE O PRODUTO:</label>
                    <select style="width: 50%; font-size: 18px;" class="selecionar_produto" name="id_produto" id="id_produto" required>
                        <option value=""></option>
                        <?php

                        $query = "SELECT id_produto, nome, cod_etiq FROM produto
                                    WHERE estoque > '0'";

                        $query_run = mysqli_query($conn, $query);

                        foreach ($query_run as $produto) {
                        ?><option id="id_produto" name="id_produto" value="<?php echo $produto['id_produto']; ?>"><?php echo $produto['nome']; ?> || <?php echo $produto['cod_etiq'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div style="text-align: left;" class="row">
                    <!-------------- DIGITA O DESCONTO ---------->
                    <div class="col">
                        <label style="margin-left: 10px;" class="desconto" for="desconto">DESCONTO</label>
                        <input style="width: 50%; font-size: 18px; margin-left: 10px;" type="text" class="desconto" id="desconto" name="desconto" placeholder="R$ 0,0">
                    </div>
                    <!-------------- DIGITA O FRETE ----------------->
                    <div class="col">
                        <label for="frete" class="frete">FRETE</label>
                        <input style="width: 50%; font-size: 18px;" type="text" class="frete" id="frete" name="frete" placeholder="R$ 0,0">
                    </div>
                    <!----- TIPO DE COBRANÇA ------------------------>
                    <div class="col">
                        <label for="cobranca">SELECIONE O TIPO DE COBRANÇA</label>
                        <select style="width: 80%; font-size: 20px;" id="cobranca" name="cobranca" class="selecionar_cliente" required>
                            <option></option>
                            <option value="val_dia">DIARIA</option>
                            <option value="val_sem">SEMANAL</option>
                            <option value="val_mes">MENSAL</option>
                            <option value="val_tri">TRIMESTRAL</option>
                            <option value="val_semestre">SEMESTRAL</option>
                            <option value="val_ano">ANUAL</option>
                        </select>
                    </div>
                </div>
                <!----------------- TRAZ OS POSSIVEIS CLIENTES ----------------->
                <div class="cadastro_clientes">
                    <h1 style="color: greenyellow; font-size: 48px; text-align: left;">DADOS DO CLIENTE</h1>
                    <!--ALINHAMENTO A ESQUERDA ------>
                    <div class="row">
                        <div style="text-align: left;" class="col">
                            <label style="font-size: 20px; text-align: center;" for="data_inicio">DATA DE INICIO DA LOCAÇÃO</label>
                            <input style="width: 40%; font-size: 20px; margin-left: 30%;" type="date" id="data_inicio" name="data_inicio" required>
                            <br><br>
                            <label for="id_cliente">CLIENTE*</label>
                            <select style="width: 80%; font-size: 20px;" class="selecionar_cliente" name="id_cliente" id="id_cliente">
                                <option value=""></option>
                                <?php

                                $query = "SELECT id_cliente, nome_empresa FROM cliente";

                                $query_run = mysqli_query($conn, $query);

                                foreach ($query_run as $cliente) {
                                ?><option value="<?php echo $cliente['id_cliente']; ?>"> <!--- TRAZ OS CLIENTES----><?php echo $cliente['nome_empresa']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <br><br>
                            <label for="contato">PESSOA PARA CONTATO:</label>
                            <input style="width: 80%; font-size: 20px;" type="text" name="contato" id="contato" required>

                        </div>
                        <!---- ALINHAMENTO MEIO ---->
                        <div style="text-align: left;" class="col">
                            <label style="text-align: center;" for="data_fim">DATA DE FIM DA LOCAÇÃO</label>
                            <input style="width: 40%; font-size: 20px; margin-left: 30%;" type="date" id="data_fim" name="data_fim" required>
                            <br><br>
                            <label for="projeto_empre">PROJETO/EMPREENDIMENTO:</label>
                            <input style="width: 80%; font-size: 20px;" type="text" id="projeto_empre" name="projeto_empre">
                            <br><br>
                            <label for="tel_contato">TELEFONE PARA CONTATO:</label>
                            <input style="width: 80%; font-size: 20px;" type="tel" name="tel_contato" id="tel_contato" required>

                        </div>
                        <!---- ALINHAMENTO DIREITA ---->
                        <div class="col">
                            <br><br><br><br>
                            <label for="razao_soc">RAZÃO SOCIAL - PROJETO/EMPREENDIMENTO:</label>
                            <input style="width: 80%; font-size: 20px;" type="text" name="razao_soc" id="razao_soc">
                            <br><br>
                            <label for="cargo">CARGO/SETOR:</label>
                            <input style="width: 80%; font-size: 20px;" type="text" id="cargo" name="cargo">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <br><br>
                        <button type="reset" class="btn btn-danger">LIMPAR</button>
                        <button type="submit" class="btn btn-success">ENVIAR</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        </div>
    </body>

    </html>
<?php
} else {
    echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>