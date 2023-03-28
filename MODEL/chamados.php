<?php
class Chamados{
    public $status_chamado;
    public $id_produto;
    public $id_usuario;
    public $observacao;
    public $locado;
    public $urgencia;
    public $rua;
    public $complemento;
    public $bairro;
    public $cidade;
    public $estado;

    public function __construct($status_chamado, $id_produto, $id_usuario, $observacao, $locado, $urgencia, $rua,
    $complemento, $bairro, $cidade, $estado){
        $this->status_chamado = $status_chamado;
        $this->id_produto = $id_produto;
        $this->id_usuario = $id_usuario;
        $this->observacao = $observacao;
        $this->locado = $locado;
        $this->urgencia = $urgencia;
        $this->rua = $rua;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;

    }

}




?>