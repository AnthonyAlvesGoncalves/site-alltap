<?php
session_start();
if (isset($_SESSION['nome_acesso'])) {
    include_once '/xampp/htdocs/Alltap/MODEL/database.php';

    if (isset($_GET['id'])) {
        $id_locacao = mysqli_real_escape_string($conn, $_GET['id']);

        $query = "SELECT * FROM locacao
      WHERE id_locacao ='$id_locacao';";

        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $locacao = mysqli_fetch_array($query_run);

            #TRAZ OS PRODUTOS E O CLIENTE

            $id_produto = $locacao['id_produto'];
            $id_cliente = $locacao['id_cliente'];

            $query = "SELECT nome, cod_etiq FROM produto
                      WHERE id_produto = '$id_produto';";

            $query_run = mysqli_query($conn, $query);
            $produto = mysqli_fetch_row($query_run);

            $query = "SELECT nome_empresa FROM cliente
                       WHERE id_cliente = '$id_cliente'";

            $query_run = mysqli_query($conn, $query);

            $cliente = mysqli_fetch_row($query_run);

            #TRANSFORMAÇÃO DA DATA#
            $data_final = new DateTime($locacao['data_fim']);
            $data_inicio = new DateTime($locacao['data_inicio']);

            #SWITCH CASE PARA O TEMPO DE PAGAMENTO

            switch ($locacao['cobranca']) {
                case 'val_dia':
                    $cobranca = "DIARIA";
                    break;
                case 'val_sem':
                    $cobranca = "SEMANAL";
                    break;
                case 'val_mes':
                    $cobranca = "MENSAL";
                    break;
                case 'val_tri':
                    $cobranca = "TRIMESTRAL";
                    break;
                case 'val_semestre':
                    $cobranca = "SEMESTRAL";
                    break;
                case 'val_ano':
                    $cobranca = "ANUAL";
                    break;
            }


?>
            <!DOCTYPE html>
            <html>

            <head>
                <script>
                    function retornarPagina() {
                        window.location = "/Alltap/VIEW/consulta_loc.php";
                    }
                </script>
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
                        height: 1150px;
                        position: relative;
                        align-items: center;
                        text-align: center;
                    }

                    body {
                        background-color: rgba(146, 7, 146, 0.97);
                    }

                    a {
                        font-size: 20px;
                    }

                    label {
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
                    <h1 style="color: greenyellow; text-align: left; font-size: 48px; margin-left: 10px;"> LISTA DE LOCAÇÃO </h1>
                    <br> <br>
                    <div class="row">
                        <div class="col">
                            <label style="color: white;" for="data_inicio">DATA DE INICIO: </label>
                            <input style="pointer-events: none; font-size: 24px; width: 40%; text-align: center;" type="text" id="data_inicio" name="data_inicio" value="<?php echo date_format($data_inicio, "d / m / Y") ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="produto">PRODUTO</label>
                            <input style="pointer-events: none; text-align: center; width: 70%; font-size: 20px; " type="text" id="produto" name="produto" value="<?php echo $produto['0'] ?> || <?php echo $produto['1'] ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="desconto">DESCONTO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="desconto" name="desconto" value="R$ <?php echo $locacao['desconto'] ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="contato">CONTATO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="contato" name="contato" value="<?php echo $locacao['contato'] ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="cobranca">COBRANCA</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="cobranca" name="cobranca" value="<?php echo $cobranca?>">
                        </div>
                        <div class="col">
                            <label style="color: white;" for="data_fim">DATA DE FINALIZAÇÃO: </label>
                            <input style="pointer-events: none; font-size: 24px; width: 40%; text-align: center;" type="text" id="data_fim" name="data_fim" value="<?php echo date_format($data_final, "d / m / Y") ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="cliente">CLIENTE</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="cliente" name="cliente" value="<?php echo $cliente['0'] ?>">
                            <br><br>
                            <label style="color: white; display: block;" for="contato">CONTATO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="contato" name="contato" value="<?php echo $locacao['contato'] ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="frete">FRETE</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="frete" name="frete" value="R$ <?php echo $locacao['frete'] ?>">
                            <br><br>
                            <label style="color: white; display: block;" for="tel_contato">TELEFONE DE CONTATO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="tel_contato" name="tel_contato" value="<?php echo $locacao['tel_contato'] ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="form_pagamento">FORMA DE PAGAMENTO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="form_pagamento" name="form_pagamento" value="<?php echo $locacao['form_pagamento'] ?>">
                        </div>
                        <div style="margin-top: 18px;" class="col">
                            <br><br>
                            <label style="color: white; display: block;" for="usuario_criador">USUARIO QUE REALIZOU A LOCAÇÃO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="usuario_criador" name="usuario_criador" value="<?php echo $_SESSION['nome_acesso'] ?>">
                            <br><br>
                            <label style="color: white; display: block;" for="projeto_empre">PROJETO/EMPREENDIMENTO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="projeto_empre" name="projeto_empre" value="<?php echo $locacao['projeto_empre'] ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="razao_soc">RAZÃO SOCIAL</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="razao_soc" name="razao_soc" value="<?php echo $locacao['razao_soc'] ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="cargo">CARGO DO CONTATO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="cargo" name="cargo" value="<?php echo $locacao['cargo'] ?>">
                            <br> <br>
                            <label style="color: white; display: block;" for="valor_total">VALOR TOTAL DA LOCAÇÃO</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="valor_total" name="valor_total" value="R$ <?php echo $locacao['valor_total'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <h1 style="color: greenyellow; text-align: left; font-size: 48px;">ENDEREÇO DO PRODUTO</h1>
                    </div>
                    <div class="row">
                        <div class="col">
                            <br><br>
                            <label style="color: white; display: block;" for="local_entr">LOCAL DE ENTREGA</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="local_entr" name="local_entr" value="<?php echo $locacao['local_entr'] ?>">
                        </div>
                        <div class="col">
                            <br><br>
                            <label style="color: white; display: block;" for="logr_entr">RUA DE ENTREGA</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="logr_entr" name="logr_entr" value="<?php echo $locacao['logr_entr'] ?>">
                            <br><br>
                            <label style="color: white; display: block;" for="bairro_ent">BAIRRO DE ENTREGA</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="bairro_ent" name="bairro_ent" value="<?php echo $locacao['bairro_ent'] ?>">
                            <br><br>
                            <label style="color: white; display: block;" for="cidade_entr">CIDADE DE ENTREGA</label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="cidade_entr" name="cidade_entr" value="<?php echo $locacao['cidade_entr'] ?>">

                        </div>
                        <div class="col">
                            <br><br>
                            <label style="color: white; display: block;" for="comp_ent">COMPLEMENTO </label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="comp_ent" name="comp_ent" value="<?php echo $locacao['comp_ent'] ?>">
                            <br><br>
                            <label style="color: white; display: block;" for="numb_entr">NUMERO </label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="numb_entr" name="numb_entr" value="<?php echo $locacao['numb_entr'] ?>">
                            <br><br>
                            <label style="color: white; display: block;" for="uf_entrega">ESTADO DA ENTREGA </label>
                            <input style="pointer-events: none; text-align: center; font-size: 20px;" type="text" id="uf_entrega" name="uf_entrega" value="<?php echo $locacao['uf_entrega'] ?>">
                        </div>
                    </div>
                    <div style="margin-top: 2%;" class="col-sm-12">
                        <button type="button" onclick="retornarPagina()" class="btn btn-warning">RETORNAR</button>
                    </div>
                </div>
            </body>

            </html>
<?php
        }
    }
} else {
    echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>