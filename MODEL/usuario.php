<?php
class Usuario
{
    public $nome_acesso;
    public $senha;
    public $nome;

    public $tipo_acesso;

// GETTERS E SETTERS
    public function set_nome_acesso()
    {
        $this->nome_acesso = $_POST['nome_acesso'];
    }
    public function get_nome_acesso()
    {
        return $this->nome_acesso;
    }

    public function set_nome()
    {
        $this->nome = $_POST['nome'];
    }

    public function get_nome()
    {
        return $this->nome;
    }


    public function set_senha()
    {
        $this->senha = $_POST['senha'];

    }
    // CONSTRUCTOR
    function __construct($nome_acesso, $senha, $nome, $tipo_acesso)
    {
        $this->nome_acesso = $nome_acesso;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->tipo_acesso = $tipo_acesso;
    }

}
?>