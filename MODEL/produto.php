<?php

class Produto{

    public $nome_produto;
    public $estoque;
    public $etiqueta;
    public $val_dia;  
    public $val_sem; 
    public  $val_mes;  
    public $val_tri ; 
    public $val_semestre ;
    public $val_ano;

    function __construct($nome_produto, $estoque, $etiqueta, $val_dia, $val_sem, $val_mes, $val_tri, $val_semestre, $val_ano)
    {
        $this->nome_produto = $nome_produto;
        $this->estoque = $estoque;
        $this->etiqueta = $etiqueta;
        $this->val_dia = $val_dia;
        $this->val_sem = $val_sem;
        $this->val_mes = $val_mes;
        $this->val_tri = $val_tri;
        $this->val_semestre = $val_semestre;
        $this->val_ano = $val_ano;
        
    }


}


?>