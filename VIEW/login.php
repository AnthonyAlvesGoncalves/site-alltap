<?php
include '/xampp/htdocs/Alltap/MODEL/database.php';

$hash = password_hash('Alltap2023', PASSWORD_DEFAULT);

$query = "SELECT * FROM usuario
          WHERE nome_acesso = 'Administrador'";

$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {

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
  <title>Login</title>
  <style>

    .cadastro_2 {
      margin-top: 7%;
      border: 3px outset rgba(0, 0, 0, 0.613);
      background-color: rgba(69, 21, 75, 0.724);
      height: 400px;
      position: relative;
      width: 800px;
      margin-left: 20%;
      margin-right: 50%;
      align-items: center;
    }

    .cadastro_3 {
      margin-top: -23.5%;
      border: 3px outset rgba(0, 0, 0, 0.613);
      background-color: rgba(69, 21, 75);
      height: 350px;
      position: absolute;
      width: 600px;
      right: 5%;
      align-items: center;
      text-align: center;
    }

    label {
      color: white;
      display: block;
      float: left;
      width: 210px;
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
    }

    h1 {
      text-align: center;
      color: white;
      font-family: 'Courier New', Courier, monospace;
    }

    h3 {
      text-align: center;
      color: whitesmoke;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 24px;
    }

    .cadastro {
      margin-top: 2%;
      border: 3px outset rgba(0, 0, 0, 0.613);
      background-color:  rgba(52, 52, 52);
      height: 630px;
      position: relative;
      align-items: center;
      text-align: center;
    }

    input[type=text] {
      display: inline-block;
      float: left;
      font-size: 15px;
      width: 40%;
    }

    input[type=password] {
      display: inline-block;
      float: left;
      font-size: 15px;
      width: 40%;
    }

    .linha_login {
      font-size: 16px;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      text-align: center;
      position: absolute;
    }

    .breve {
      font-size: 48px;
      font-family: Impact, 'Arial Narrow Bold', sans-serif;
      position: absolute;
      margin-left: 35%;
      color: chocolate;
    }


    p {
      margin-top: 10%;
      text-align: center;
      color: #f1f1f1;
      font-size: 32px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    body {
      background-color: rgba(146, 7, 146, 0.97);
    }

    h4 {
      text-align: center;
      font-family: 'Courier New', Courier;
      font-size: 20px;
    }
  </style>
</head>

<body>
  <!--- CADASTRO DE CLIENTE ------>
  <div class="cadastro">
    <div class="cadastro_2">
      <form action='/Alltap/CONTROLLER/valida_login.php' onsubmit="" method="post">
      <br>
        <h3><i class="material-icons" style="font-size: 19px;">perm_identity</i>USUARIO</h3><br>
        <label for="nome_acesso">LOGIN</label>
        <input type="text" id="nome_acesso" name="nome_acesso" required>
        <br><br>
        <label for="senha">SENHA</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>   
        <button type="reset" class="btn btn-danger">LIMPAR</button>
        <button type="submit" class="btn btn-success">ENTRAR</button>
        <p class="linha_login">Para asceder a área do usuario, é necessario
          possuir cadastro dentro do sistema, se não possuir, entre em contato com os administradores</p>
      </form>
    </div>
    </div>
</body>
</html>
<?php
}
else{
  $sql = "INSERT INTO usuario (nome, nome_acesso, senha , tipo_acesso) VALUES ('Administrador', 'Administrador', '$hash', '1');";

if (mysqli_query($conn, $sql)) {
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
}
?>