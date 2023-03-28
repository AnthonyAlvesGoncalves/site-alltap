<?php
$servername = "localhost:8080";
$username = "root";
$password = "";

// Cria Ponto de Conexão
$conn = new mysqli($servername, $username, $password);

// Trigger de Erro
if ($conn->connect_error) {
  trigger_error(mysqli_connect_error());
}
// CREATE DA DATABASE E TABELAS
$sql = "CREATE database IF NOT EXISTS alltap;";

// SELECT DATABASE
$retval = mysqli_select_db( $conn, 'alltap' );

      if(! $retval ) {
         die('Could not select database: ' . mysqli_error($conn));
      }
// TABELA USUARIO
$sql = "CREATE TABLE IF NOT EXISTS usuario(
  id_usuario INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  nome_acesso VARCHAR(45) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  tipo_acesso INT(1) NOT NULL,
  PRIMARY KEY (id_usuario)
);";
if (mysqli_query($conn, $sql)) {
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
// TABELA CLIENTE
$sql = "CREATE TABLE IF NOT EXISTS cliente(
  id_cliente INT NOT NULL AUTO_INCREMENT,
  nome_empresa VARCHAR(45) NULL,
  cnpj_cpf VARCHAR(14) NULL,
  tel_empresa VARCHAR(11) NULL,
  ins_est VARCHAR(15) NULL,
  nome_cliente VARCHAR(50) NULL,
  tel_cliente VARCHAR(11) NULL,
  tel_wpp VARCHAR(11) NULL,
  email VARCHAR(30) NULL,
  rua VARCHAR(45) NULL,
  complemento VARCHAR(45) NULL,
  bairro VARCHAR(30) NULL,
  cidade VARCHAR(45) NULL,
  estado VARCHAR(45) NULL,
  cep VARCHAR(10) NULL,
  PRIMARY KEY (id_cliente)
  );";
  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }

  
// TABELA PRODUTO
$sql = "CREATE TABLE IF NOT EXISTS produto (
  id_produto INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  estoque INT NULL DEFAULT 1,
  cod_etiq VARCHAR(20) NULL,
  val_dia FLOAT NULL,
  val_sem FLOAT NULL,
  val_mes FLOAT NULL,
  val_tri FLOAT NULL,
  val_semestre FLOAT NULL,
  val_ano FLOAT NULL,
  PRIMARY KEY (id_produto)
  );";
  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error creating table: " . mysqli_error($conn);
  }
$sql = "CREATE TABLE IF NOT EXISTS locacao (
  id_locacao INT NOT NULL AUTO_INCREMENT,
  status_locacao VARCHAR(11) NOT NULL,
  usuario_criador VARCHAR(25) NOT NULL,
  id_cliente INT NULL,
  id_produto INT NOT NULL,
  desconto FLOAT NULL,
  frete FLOAT NULL,
  cobranca VARCHAR(10) NULL,
  contato VARCHAR(80) NULL,
  tel_contato VARCHAR(18) NULL,
  projeto_empre VARCHAR(60) NULL,
  razao_soc VARCHAR(80) NULL,
  cargo VARCHAR(60) NULL,
  valor_total FLOAT NULL,
  data_inicio DATE NOT NULL,
  data_fim DATE NOT NULL,
  
  status_inst VARCHAR(20) NOT NULL,
  data_hr_inst DATETIME NULL,
  data_hr_retirada DATETIME NULL,
  local_entr VARCHAR(30) NULL,
  logr_entr VARCHAR(60) NULL,
  bairro_ent VARCHAR(60) NULL,
  comp_ent VARCHAR(60) NULL,
  numb_entr VARCHAR(5) NULL,
  cidade_entr VARCHAR(20) NULL,
  uf_entrega VARCHAR(45) NULL,
  form_pagamento VARCHAR(10) NULL,
  PRIMARY KEY (id_locacao),
  CONSTRAINT id_produto
    FOREIGN KEY (id_produto)
    REFERENCES produto (id_produto)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION );";
    if (mysqli_query($conn, $sql)) {
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }

    $sql = "CREATE TABLE IF NOT EXISTS chamados (
      id_chamado INT NOT NULL AUTO_INCREMENT,
      status_chamado VARCHAR(20) NOT NULL,
      data_abertura DATETIME NULL,
      id_produto INT NOT NULL,
      id_usuario INT NOT NULL,
      observacao TEXT(300) NOT NULL,
      locado VARCHAR(4) NOT NULL,
      urgencia VARCHAR(45) NULL,
      rua VARCHAR(45) NULL,
      complemento VARCHAR(45) NULL,
      bairro VARCHAR(45) NULL,
      cidade VARCHAR(45) NULL,
      estado VARCHAR(45) NULL,
      PRIMARY KEY (id_chamado))";
    
    if (mysqli_query($conn, $sql)) {
    } else {
      echo "Error creating table: " . mysqli_error($conn);
    }  

?>
