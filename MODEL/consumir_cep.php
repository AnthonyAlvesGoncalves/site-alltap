<?php

$endereço = (object)[
    'logradouro' => '',
    'complemento' => '',
    'bairro' =>'',
    'localidade' =>'',
    'cep'=>'',
    'uf'=> ''
];

if (isset($_GET['cep'])) {

    $cep = $_GET['cep'];
    $url = "https://viacep.com.br/ws/{$cep}/json/";

    $endereço = json_decode(file_get_contents($url));
} 


?>