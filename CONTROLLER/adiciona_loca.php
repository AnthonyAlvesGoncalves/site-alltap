<?php
include '/xampp/htdocs/Alltap/MODEL/database.php';
include '/xampp/htdocs/Alltap/MODEL/locacao.php';

// ALTERA 
$id_produto = $_POST['id_produto'];

$query = "UPDATE produto SET estoque = '0'
        WHERE id_produto = '$id_produto' ";

mysqli_query($conn, $query);

//ADICIONA A LOCAÇÃO AO MODELO

$locacao = new Locacao($_POST['usuario_criador'], $_POST['id_cliente'], $_POST['id_produto'], $_POST['desconto'], $_POST['frete'],
$_POST['cobranca'], $_POST['contato'], $_POST['tel_contato'], $_POST['projeto_empre'], $_POST['razao_soc'], $_POST['cargo'],
$_POST['valor_total'], $_POST['data_inicio'], $_POST['data_fim'], $_POST['status_inst'], $_POST['data_hr_inst'], $_POST['data_hr_retirada'],
$_POST['local_entr'], $_POST['logr_entr'], $_POST['bairro_entr'], $_POST['comp_ent'], $_POST['numb_entr'], $_POST['cidade_entr'], $_POST['uf_entrega'], $_POST['form_pagamento'] );

// FAZ O INSERT NO BANCO DE DADOS

$sql = "INSERT INTO locacao (status_locacao, usuario_criador, id_cliente, id_produto, desconto, frete, cobranca, contato, 
tel_contato, projeto_empre, razao_soc, cargo, valor_total, data_inicio, data_fim, 
status_inst, data_hr_inst, data_hr_retirada, local_entr, 
logr_entr, bairro_ent, comp_ent, numb_entr, cidade_entr, uf_entrega, form_pagamento ) VALUES ('ativa',
        '$locacao->usuario_criador',
        '$locacao->id_cliente', 
        '$locacao->id_produto',
        '$locacao->desconto',
        '$locacao->frete',
        '$locacao->cobranca',
        '$locacao->contato',
        '$locacao->tel_contato',
        '$locacao->projeto_empre',
        '$locacao->razao_soc',
        '$locacao->cargo',
        '$locacao->valor_total',
        '$locacao->data_inicio',
        '$locacao->data_fim',
        '$locacao->status_inst',
        '$locacao->data_hr_inst',
        '$locacao->data_hr_retirada',
        '$locacao->local_entr',
        '$locacao->logr_entr',
        '$locacao->bairro_ent',
        '$locacao->comp_ent',
        '$locacao->numb_entr',
        '$locacao->cidade_entr',
        '$locacao->uf_entrega',
        '$locacao->form_pagamento')";
        
        if ($conn->query($sql) === TRUE) {
          echo '<script> alert("LOCAÇÃO REALIZADA")
          window.location="/Alltap/VIEW/consulta_loc.php"</script>';
      }
      // SE N, APRESENTA ERRO
      else {
        echo "ERRO: " . $conn->error;
      }



?>
