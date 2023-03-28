<?php
session_start();

if (isset($_SESSION['nome_acesso'])) {
    include '/xampp/htdocs/Alltap/MODEL/database.php';

    $tempo = $_POST['cobranca'];

    #CASOS DE CALCULO DO TEMPO DE USO DOS TOTENS
    switch ($tempo) {
        case 'val_dia':
            $data_inicio = new DateTime($_POST['data_inicio']);
            $data_fim = new DateTime($_POST['data_fim']);
            $intervalo = $data_inicio->diff($data_fim);
            /////////////////////////////////////////////
            $val = $_POST['cobranca'];
            $id_produto = $_POST['id_produto'];
            $query = "SELECT $val FROM produto
                      WHERE id_produto = '$id_produto'";
            $query_run = mysqli_query($conn, $query);
            $valor = mysqli_fetch_array($query_run);
            /////////////////////////// VALOR FINAL ////////////////////////////
            $valor_total = $valor[$val] * $intervalo->days + $_POST['frete'] - $_POST['desconto'];
            break;
        case 'val_sem':
            $data_inicio = new DateTime($_POST['data_inicio']);
            $data_fim = new DateTime($_POST['data_fim']);
            $intervalo = $data_inicio->diff($data_fim);
            /////////////////////////////////////////////
            $val = $_POST['cobranca'];
            $id_produto = $_POST['id_produto'];
            $query = "SELECT $val FROM produto
                      WHERE id_produto = '$id_produto'";
            $query_run = mysqli_query($conn, $query);
            $valor = mysqli_fetch_array($query_run);
            /////////////////////////// VALOR FINAL ////////////////////////////
            $tempo_final = round($intervalo->days / 7.609375, 2);
            if ($tempo_final < 1) {
                $valor_total = $valor[$val]  + $_POST['frete'] - $_POST['desconto'];
            } else {
                $valor_total = $valor[$val] *  $tempo_final + $_POST['frete'] - $_POST['desconto'];
            }
            break;
        case 'val_mes':
            $data_inicio = new DateTime($_POST['data_inicio']);
            $data_fim = new DateTime($_POST['data_fim']);
            $intervalo = $data_inicio->diff($data_fim);
            /////////////////////////////////////////////
            $val = $_POST['cobranca'];
            $id_produto = $_POST['id_produto'];
            $query = "SELECT $val FROM produto
                  WHERE id_produto = '$id_produto'";
            $query_run = mysqli_query($conn, $query);
            $valor = mysqli_fetch_array($query_run);
            /////////////////////////// VALOR FINAL ////////////////////////////
            $tempo_final = round($intervalo->days / 30.4375, 2);
            if ($tempo_final < 1) {
                $valor_total = $valor[$val]  + $_POST['frete'] - $_POST['desconto'];
            } else {
                $valor_total = $valor[$val] *  $tempo_final + $_POST['frete'] - $_POST['desconto'];
            }
            break;
        case 'val_tri':
            $data_inicio = new DateTime($_POST['data_inicio']);
            $data_fim = new DateTime($_POST['data_fim']);
            $intervalo = $data_inicio->diff($data_fim);
            /////////////////////////////////////////////
            $val = $_POST['cobranca'];
            $id_produto = $_POST['id_produto'];
            $query = "SELECT $val FROM produto
                  WHERE id_produto = '$id_produto'";
            $query_run = mysqli_query($conn, $query);
            $valor = mysqli_fetch_array($query_run);
            /////////////////////////// VALOR FINAL ////////////////////////////
            $tempo_final = round($intervalo->days / 91.3125, 2);
            if ($tempo_final < 1) {
                $valor_total = $valor[$val]  + $_POST['frete'] - $_POST['desconto'];
            } else {
                $valor_total = $valor[$val] *  $tempo_final + $_POST['frete'] - $_POST['desconto'];
            }
            break;
        case 'val_semestre':
            $data_inicio = new DateTime($_POST['data_inicio']);
            $data_fim = new DateTime($_POST['data_fim']);
            $intervalo = $data_inicio->diff($data_fim);
            /////////////////////////////////////////////
            $val = $_POST['cobranca'];
            $id_produto = $_POST['id_produto'];
            $query = "SELECT $val FROM produto
              WHERE id_produto = '$id_produto'";
            $query_run = mysqli_query($conn, $query);
            $valor = mysqli_fetch_array($query_run);
            /////////////////////////// VALOR FINAL ////////////////////////////
            $tempo_final = round($intervalo->days / 182.625, 2);
            if ($tempo_final < 1) {
                $valor_total = $valor[$val]  + $_POST['frete'] - $_POST['desconto'];
            } else {
                $valor_total = $valor[$val] *  $tempo_final + $_POST['frete'] - $_POST['desconto'];
            }
            break;
        case 'val_ano':
            $data_inicio = new DateTime($_POST['data_inicio']);
            $data_fim = new DateTime($_POST['data_fim']);
            $intervalo = $data_inicio->diff($data_fim);
            /////////////////////////////////////////////
            $val = $_POST['cobranca'];
            $id_produto = $_POST['id_produto'];
            $query = "SELECT $val FROM produto
              WHERE id_produto = '$id_produto'";
            $query_run = mysqli_query($conn, $query);
            $valor = mysqli_fetch_array($query_run);
            /////////////////////////// VALOR FINAL ////////////////////////////
            $tempo_final = round($intervalo->days / 365, 2);
            if ($tempo_final < 1) {
                $valor_total = $valor[$val]  + $_POST['frete'] - $_POST['desconto'];
            } else {
                $valor_total = $valor[$val] *  $tempo_final + $_POST['frete'] - $_POST['desconto'];
            }
            break;
    }
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
            table {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 20px;
                border: 3px outset rgba(0, 0, 0, 0.984);
                background-color: rgba(255, 255, 255, 0.724);
                border-collapse: collapse;
                text-align: center;
                width: auto;
                position: relative;
            }

            th {
                border: 3px outset rgb(255, 255, 255);
            }

            td {
                border: 3px outset rgb(255, 255, 255);
            }


            h1 {
                text-align: center;
                color: whitesmoke;
            }

            .cadastro {
                margin-top: 2%;
                border: 3px outset rgba(0, 0, 0, 0.613);
                background-color: rgba(52, 52, 52, 0.916);
                height: 170px;
                position: relative;
            }

            .cadastro_etapa_2 {
                margin-top: 3%;
                border: 3px outset rgba(0, 0, 0, 0.613);
                background-color: rgba(52, 52, 52, 0.916);
                height: 260px;
                position: relative;
            }

            .cadastro_etapa_3 {
                margin-top: 1%;
                border: 3px outset rgba(0, 0, 0, 0.613);
                background-color: rgba(52, 52, 52, 0.916);
                height: 500px;
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
        <!--- CADASTRO DE LOCAÇÃO ------>
        <!--------- INICIO FORM ---------->
        <form action='/Alltap/CONTROLLER/adiciona_loca.php' onsubmit="" method="POST">
            <!---------- DADOS DE INSTALÇÃO ------------>
            <div class="cadastro">
                <h1 style="font-size: 48px; color: greenyellow; text-align: left;">DADOS DA ENTREGA</h1>
                <input type="hidden" id="usuario_criador" name="usuario_criador" value="<?php echo $_SESSION['nome_acesso'] ?>">
                <input type="hidden" id="id_produto" name="id_produto" value="<?php echo $_POST['id_produto'] ?>">
                <input type="hidden" id="desconto" name="desconto" value="<?php echo $_POST['desconto'] ?>">
                <input type="hidden" id="frete" name="frete" value="<?php echo $_POST['frete'] ?>">
                <input type="hidden" id="cobranca" name="cobranca" value="<?php echo $_POST['cobranca'] ?>">
                <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $_POST['id_cliente'] ?>">
                <input type="hidden" id="contato" name="contato" value="<?php echo $_POST['contato'] ?>">
                <input type="hidden" id="data_inicio" name="data_inicio" value="<?php echo $_POST['data_inicio'] ?>">
                <input type="hidden" id="data_fim" name="data_fim" value="<?php echo $_POST['data_fim'] ?>">
                <input type="hidden" id="projeto_empre" name="projeto_empre" value="<?php echo $_POST['projeto_empre'] ?>">
                <input type="hidden" id="tel_contato" name="tel_contato" value="<?php echo $_POST['tel_contato'] ?>">
                <input type="hidden" id="razao_soc" name="razao_soc" value="<?php echo $_POST['razao_soc'] ?>">
                <input type="hidden" id="cargo" name="cargo" value="<?php echo $_POST['cargo'] ?>">
                <input type="hidden" id="valor_total" name="valor_total" value="<?php echo $valor_total ?>">
                <!--- STATUS DA ENTREGA / PARTE DA ESQUERDA---->
                <div class="row">
                    <div class="col">
                        <label style="margin-left: 10px;" for="status_inst">STATUS DA INSTALAÇÃO</label>
                        <select style="margin-left: 10px; font-size: 18px; width: 50%;" id="status_inst" class="option" name="status_inst" required>
                            <option value="a_definir">A DEFINIR</option>
                            <option value="agendada">AGENDADA</option>
                            <option value="cancelada">CANCELADA</option>
                            <option value="instalado">INSTALADO</option>
                        </select>
                    </div>
                    <!--- DADOS DA ENTREGA / PARTE DO MEIO---->
                    <div class="col">
                        <label for="data_hr_inst">PERIDO DE INSTALAÇÃO</label>
                        <input style="font-size: 20px;" type="datetime-local" id="data_hr_inst" name="data_hr_inst">
                    </div>
                    <!--- DADOS DA ENTREGA / PARTE DA DIREITA---->
                    <div class="col">
                        <label for="data_hr_retirada">PERIODO DE RETIRADA</label>
                        <input style="font-size: 20px;" type="datetime-local" id="data_hr_retirada" name="data_hr_retirada">
                    </div>
                </div>
                <!--------- DADOS DE ENTREGA------------>
                <div class="cadastro_etapa_2">
                    <h1 style="font-size: 48px; color: greenyellow; text-align: left;">ENDEREÇO DA ENTREGA</h1>
                    <!----- PARTE ESQUERDA ----->
                    <div class="row">
                        <div class="col">
                            <label style="margin-left: 10px;" for="local_entr">LOCAL DE INSTALAÇÃO</label>
                            <input style="margin-left: 10px; font-size: 18px; width: 60%;" type="text" id="local_entr" name="local_entr">
                        </div>
                        <!----- PARTE DO MEIO ----->
                        <div class="col">
                            <label for="logr_entr">RUA</label>
                            <input style="width: 90%;" type="text" id="logr_entr" name="logr_entr">
                            <br>
                            <label for="bairro_entr">BAIRRO</label>
                            <input style="width: 90%;" type="text" id="bairro_entr" name="bairro_entr">
                        </div>
                        <!----- PARTE DA DIREITA ----->
                        <div class="col">
                            <label for="numb_entr">NUMERO</label>
                            <input style="width: 90%;" type="number" id="numb_entr" name="numb_entr">
                            <br>
                            <label for="cidade_entr">CIDADE ENTREGA</label>
                            <input style="width: 90%;" type="text" id="cidade_entr" name="cidade_entr">
                        </div>
                        <div class="col">
                            <label for="comp_ent">COMPLEMENTO</label>
                            <input style="width: 90%;" type="text" id="comp_ent" name="comp_ent">
                            <br>
                            <label for="uf_entrega">UF</label>
                            <select class="option" id="uf_entrega" name="uf_entrega">
                                <option></option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!----------------- DADOS DE VALORES / PAGAMENTO ----------------->
                <div class="cadastro_etapa_3">
                    <h1 style="font-size: 48px; color: greenyellow; text-align: left;">TOTAL</h1>
                    <div style="text-align: right;" class="col-sm-12">
                        <label for="form_pagamento">FORMA DE PAGAMENTO</label>
                        <select style="width: 20%; font-size: 24px;" id="form_pagamento" name="form_pagamento" class="selecionar_cliente" required>
                            <option></option>
                            <option value="avista">A VISTA</option>
                            <option value="30ddl">30 DDL</option>
                            <option value="45ddl">45 DDL</option>
                            <option value="parc1">PARCELAMENTO X1</option>
                            <option value="parc2">PARCELAMENTO X2</option>
                            <option value="parc3">PARCELAMENTO X3</option>
                            <option value="parc4">PARCELAMENTO X4</option>
                            <option value="parc5">PARCELAMENTO X5</option>
                            <option value="parc6">PARCELAMENTO X6</option>
                            <option value="parc7">PARCELAMENTO X7</option>
                            <option value="parc8">PARCELAMENTO X8</option>
                            <option value="parc9">PARCELAMENTO X9</option>
                            <option value="parc10">PARCELAMENTO X10</option>
                            <option value="parc10">PARCELAMENTO X11</option>
                            <option value="parc12">PARCELAMENTO X12</option>
                        </select>
                    </div>
                    <!----------- TRAZ OS VALORES-------------->
                    <table style="margin-top: 1%;" class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>DESCONTO</th>
                                <th style="color: red;">R$<?php echo $_POST['desconto']; ?></th>
                            </tr>
                            <tr>
                                <th>FRETE</th>
                                <th style="color: green;">R$<?php echo $_POST['frete']; ?></th>
                            </tr>
                            <tr>
                                <th>VALOR DO PRODUTO</th>
                                <th>R$<?php echo $valor[$val]; ?></th>
                            </tr>
                            <tr>
                                <th>VALOR TOTAL</th>
                                <th style="color: black; background-color: white;"> R$<?php echo $valor_total ?></th>
                            </tr>
                        </thead>
                    </table>
                    <div style="text-align: center;" class="col-sm-12">
                        <button type="button" onclick="retornaPagina()" class="btn btn-warning">RETORNAR</button>
                        <button type="reset" class="btn btn-danger">LIMPAR</button>
                        <button type="submit" class="btn btn-success">ENVIAR</button>
                    </div>
                </div>
        </form>
        </div>
        </div>
    </body>
    <script>
    function retornaPagina(){
        window.window.location="/Alltap/VIEW/venda_cliente.php";
      }
      </script>
    </html>
<?php
} else {
    echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>