<?php

class Locacao{
 public $usuario_criador;
 public $id_cliente;
 public $id_produto;
 public $desconto;
 public $frete;
 public $cobranca;
 public $contato;  
 public $tel_contato; 
 public $projeto_empre;
 public $razao_soc;  
 public $cargo;
 public $valor_total; 
 public $data_inicio; 
 public $data_fim; 
 public $status_inst;  
 public $data_hr_inst;  
 public $data_hr_retirada; 
 public $local_entr;  
 public $logr_entr;  
 public $bairro_ent;
public $comp_ent; 
 public $numb_entr;  
 public $cidade_entr;  
 public $uf_entrega;
public $form_pagamento;

    public function __construct($usuario_criador, $id_cliente, $id_produto,$desconto,
     $frete, $cobranca, $contato, $tel_contato, $projeto_empre, $razao_soc, $cargo, $valor_total, 
     $data_inicio, $data_fim, $status_inst, $data_hr_inst, $data_hr_retirada, 
     $local_entr, $logr_entr, $bairro_ent, $comp_ent, $numb_entr, $cidade_entr, $uf_entrega, $form_pagamento)
    {
        $this->usuario_criador = $usuario_criador;
        $this->id_cliente = $id_cliente;
        $this->id_produto = $id_produto;
        $this->desconto = $desconto;
        $this->frete = $frete;
        $this->cobranca = $cobranca;
        $this->contato = $contato;
        $this->tel_contato = $tel_contato;
        $this->projeto_empre = $projeto_empre;
        $this->razao_soc = $razao_soc;
        $this->cargo = $cargo;
        $this->valor_total = $valor_total;
        $this->data_inicio = $data_inicio;
        $this->data_fim = $data_fim;
        $this->status_inst = $status_inst;
        $this->data_hr_inst = $data_hr_inst;
        $this->data_hr_retirada = $data_hr_retirada;
        $this->local_entr = $local_entr;
        $this->logr_entr = $logr_entr;
        $this->bairro_ent = $bairro_ent;
        $this->comp_ent = $comp_ent;
        $this->numb_entr = $numb_entr;
        $this->cidade_entr = $cidade_entr;
        $this->uf_entrega = $uf_entrega;
        $this->form_pagamento = $form_pagamento;
        
        
    }
}
