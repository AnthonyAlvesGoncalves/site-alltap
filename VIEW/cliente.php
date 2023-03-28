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
    <title>Área do Cliente</title>
    <style>
      td {
        color: black;
        background-color: white;
      }

      .lista_user {
        margin-top: 7%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: auto;

      }

      .cadastro {
        margin-top: 2%;
        border: 3px outset rgba(0, 0, 0, 0.613);
        background-color: rgba(52, 52, 52, 0.916);
        height: 780px;
        position: relative;
        align-items: center;
        text-align: center;
      }

      label {
        color: white;
        font-size: 16px;
        display: block;
        text-align: left;
        font-family: sans-serif;
      }

      input {
        float: left;
        font-size: 15px;
        width: 70%;
      }

      h3 {
        margin-top: -15%;
        position: absolute;
        top: 90%;
        left: 55%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      }

      .endereco {
        margin-top: 3%;
        border: 2px outset rgba(0, 0, 0, 0.613);
        background-color: green;
        height: 300px;
        width: auto;
      }

      body {
        background-color: rgba(146, 7, 146, 0.97);
      }

      h4 {
        text-align: center;
        font-family: 'Courier New', Courier;
        font-size: 20px;
      }

      a {
        font-size: 20px;
        overflow: auto;
      }

      .input_text {
        width: 60%;
        background-color: white;
        color: black;
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
      <br>
      <h1 style="color: greenyellow; margin-left: 10px; text-align: left; font-size: 48px;">CADASTRO DE CLIENTE</h1>
      <form action='/Alltap/CONTROLLER/adicionacliente.php' onsubmit="" method="post">
        <!-------- DIVISÃO ESQUERDA ------>
        <br><br>
        <div class="row">
          <div style="margin-left: 7px;" class="col-sm">
            <label for="nome_empresa">NOME DA EMPRESA :</label>
            <input type="text" id="nome_empresa" name="nome_empresa" required>
            <br><br>
            <label for="nome_cliente">NOME DO CLIENTE :</label>
            <input type="text" id="nome_cliente" name="nome_cliente" required>
            <br><br>
            <label for="ins_est">INSCRIÇÃO ESTADUAL :</label>
            <input type="text" id="ins_est" name="ins_est" required>
          </div>
          <!------- Divisão Meio ------->
          <div class="col-sm">
            <label for="tel_cliente">TELEFONE DE CONTATO :</label>
            <input type="tel" id="tel_cliente" name="tel_cliente" required>
            <br><br>
            <label for="tel_empresa">TELEFONE DA EMPRESA :</label>
            <input type="tel" id="tel_empresa" name="tel_empresa" data-mask="(00) 00000-0000" data-mask-selectonfocus="true" required>
            <br><br>
            <label for="cnpj">CNPJ/CPF :</label>
            <input type="text" id="cnpj" name="cnpj" placeholder="Sem ponto/espaço" required>
          </div>
          <!------ DIVISÃO DIREITA ------>
          <div class="col-sm">
            <label for="tel_wppo">WHATSAPP :</label>
            <input type="tel" id="tel_wpp" name="tel_wpp" required>
            <br><br>
            <label for="email">EMAIL :</label>
            <input type="email" id="email" name="email" required>
          </div>
        </div>
        <!--------ENDEREÇO ----------->
        <div class="endereco">
          <!---- ALINHAMENTO A ESQUERDA DO ENDEREÇO ------>
          <div class="row">
            <div style="margin-left: 15px;" class="col">
            <br>
              <label for="cep">CEP:</label>
              <input class="input_text" type="text" id="cep" name="cep" required>
            </div>
            <div class="col">
              <br>
              <label for="rua">LOGRADOURO</label>
              <input class="input_text" type="text" id="rua" name="rua">
              <br><br>
              <label for="bairro">BAIRRO</label>
              <input class="input_text" type="text" id="bairro" name="bairro">
              <br><br>
              <label for="complemento">COMPLEMENTO</label>
              <input class="input_text" type="text" id="complemento" name="complemento">
            </div>
            <!---ALINHAMENTO A DIREITA DOS ENDEREÇOS --->
            <div class="col">
              <br>
              <label for="localidade">CIDADE</label>
              <input class="input_text" type="text" id="cidade" name="cidade">
              <br><br>
              <label for="uf">ESTADO</label><input class="input_text" type="text" id="uf" name="uf">
            </div>
          </div>
          <div class="row">
            <div style="margin-top: 75px;" class="col-sm-12">
              <button type="reset" class="btn btn-danger">LIMPAR FORMULARIO</button>
              <button type="submit" class="btn btn-success">ENVIAR</button>
            </div>
          </div>
      </form>
    </div>
    <!---------- Lista de Cliente ------------->
    <div class="lista_user">
      <br>
      <h1 style="text-align: left; color: greenyellow; font-size: 48px; margin-left: 10px;"> Lista de Clientes </h1>
      <br>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>NOME EMPRESA</th>
            <th>INSCRIÇÃO ESTADUAL</th>
            <th>NOME CLIENTE</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <?php
        require '/xampp/htdocs/Alltap/MODEL/database.php';
        $query = "SELECT id_cliente, nome_empresa, ins_est, nome_cliente FROM cliente";
        $query_run = mysqli_query($conn, $query);
        if (mysqli_num_rows($query_run) > 0) {
          foreach ($query_run as $clientes) {
        ?>
            <tbody>
              <tr>
                <td><?= $clientes['id_cliente']; ?></td>
                <td><?= $clientes['nome_empresa']; ?></td>
                <td><?= $clientes['ins_est']; ?></td>
                <td><?= $clientes['nome_cliente']; ?></td>
                <td><a href="/Alltap/VIEW/update_cliente.php?id=<?= $clientes['id_cliente'] ?>" class="btn btn-info">EDITAR</a></td>
                <td><a href="/Alltap/CONTROLLER/deleta_cliente.php?id=<?= $clientes['id_cliente'] ?>" class="btn btn-danger">DELETAR</a></td>
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
</script>
  </html>
<?php
} else {
  echo '<script>window.location="/Alltap/VIEW/login.php"</script>';
}
?>