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
            $(document).ready(function() {

                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $("#rua").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#uf").val("");
                    $("#ibge").val("");
                }

                //Quando o campo cep perde o foco.
                $("#cep").blur(function() {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if (validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $("#rua").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#uf").val("...");

                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#rua").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#uf").val(dados.uf);
                                    $("#ibge").val(dados.ibge);
                                } //end if.
                                else {
                                    //CEP pesquisado não foi encontrado.
                                    limpa_formulário_cep();
                                    alert("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            limpa_formulário_cep();
                            alert("Formato de CEP inválido.");
                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });
            });

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

            input[type=text] {
                font-size: 15px;
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
                        <a class="nav-link" href="chamado.php">Chamados</a>
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
        <!--------- CHAMADOS ------------->
        <div class="cadastro">
            <form method="post" action="/Alltap/CONTROLLER/adiciona_chamado.php">
                <h1 style="text-align: left; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-size: 48px; color: greenyellow; margin-left: 10px;">ABERTURA DE CHAMADO</h1>
                <div class="row">
                    <div class="col-sm-4">
                        <br>
                        <label for="status_chamado">STATUS:</label>
                        <select id="status_chamado" name="status_chamado" required>
                            <option value="aberto">ABERTO</option>
                            <option value="processando">PROCESSANDO</option>
                            <option value="concluido">CONCLUIDO</option>
                            <option value="fechado">FECHADO</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <label for="id_produto">PRODUTO</label>
                        <select name="id_produto" id="id_produto" required>
                            <option value=""></option>
                            <?php

                            $query = "SELECT id_produto, nome, cod_etiq FROM produto";

                            $query_run = mysqli_query($conn, $query);

                            foreach ($query_run as $produto) {
                            ?><option id="id_produto" name="id_produto" value="<?php echo $produto['id_produto']; ?>"><?php echo $produto['nome']; ?> || <?php echo $produto['cod_etiq'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <br>
                        <label for="id_usuario">ATRIBUIDO À:</label>
                        <select name="id_usuario" id="id_usuario" required>
                            <option value=""></option>
                            <?php
                            $query = "SELECT * FROM usuario
                                  WHERE tipo_acesso = '3'";

                            $query_run = mysqli_query($conn, $query);

                            foreach ($query_run as $usuario) {
                            ?>
                                <option id="id_usuario" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>"><?php echo $usuario['nome']; ?> || <?php echo $usuario['nome_acesso'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label style="text-align: left;" for="observacao">Observação</label>
                    <textarea style="font-size: 20px;" class="form-control" name="observacao" rows="4"></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label style="float:inline-start" for="locado">PRODUTO LOCADO:</label>
                        <select id="locado" name="locado" required>
                            <option style="background-color: yellow; color: black; " value="nao">NÃO</option>
                            <option style="background-color: red; color: black;" value="sim">SIM</option>
                        </select>
                        <br>
                        <label for="bairro">BAIRRO</label>
                        <input type="text" id="bairro" name="bairro">
                        <br>
                        <label for="uf">ESTADO</label>
                        <input type="text" id="uf" name="uf">
                    </div>
                    <div class="col-sm-4">
                        <label style="float:inline-start" for="urgencia">ESTÁ AFETANDO A EXIBIÇÃO ? </label>
                        <select id="urgencia" name="urgencia" required>
                            <option value="nao">NÃO</option>
                            <option value="sim">SIM</option>
                        </select>
                        <br>
                        <label for="rua">RUA</label>
                        <input type="text" id="rua" name="rua">
                        <br>
                        <label for="complemento">COMPLEMENTO</label>
                        <input type="text" id="complemento" name="complemento">
                    </div>
                    <div class="col-sm-4">
                        <label for="cep">CEP DA LOCALIDADE(SE ESTIVER LOCADO)</label>
                        <input type="text" id="cep" name="cep">
                        <br><br>
                        <label for="localidade">CIDADE</label>
                        <input type="text" id="cidade" name="cidade">
                    </div>
                </div>
                <div style="text-align: center; margin-top: 50px;" class="col-sm-12">
                    <button type="button" onclick="retornarPagina()" class="btn btn-warning">RETORNAR</button>
                    <button type="reset" class="btn btn-danger">RESETAR</button>
                    <button type="submit" class="btn btn-success">ENVIAR</button>
                </div>
        </div>
        </form>
    </body>

    </html>
<?php
} else {
    echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>