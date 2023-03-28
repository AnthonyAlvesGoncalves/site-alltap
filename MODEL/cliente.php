<?php

class Cliente{
    public $nome_empresa;
    public $nome_cliente;
    public $ins_est;
    public $tel_cliente;
    public $tel_empresa;
    public $cnpj;
    public $tel_wpp;
    public $cep;
    public $rua;
    public $complemento;
    public $bairro;
    public $cidade;
    public $uf;
    public $email;

    public function __construct($nome_empresa, $nome_cliente, $ins_est, $tel_cliente, $tel_empresa, $cnpj, $tel_wpp, $cep, $rua, $complemento, $bairro, $cidade, $uf, $email)
    {
        $this->nome_empresa = $nome_empresa;
        $this->nome_cliente = $nome_cliente;
        $this->ins_est = $ins_est;
        $this->tel_cliente = $tel_cliente;
        $this->tel_empresa = $tel_empresa;
        $this->cnpj = $cnpj;
        $this->tel_wpp = $tel_wpp;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->email = $email;
    }


    


}
