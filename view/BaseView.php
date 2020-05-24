<?php
class BaseView 
{
    private $cabecalhosExtras = array(
        'javascripts' => array(),
        'css' => array()
    );
 
    public function render($view, $exit = true)
    {
        $view = $view . ".phtml";
        
        if (! is_file(getcwd() . '/../view' . $view)) {
             throw new InvalidArgumentException("A view " . $view . " não foi encontrada");
        }
        
        if (! is_bool($exit)) {
             throw new InvalidArgumentException("O parâmetro 'exit' deve ser um booleano (opcional)");
        }
       
       
        require_once (getcwd() . '/../view/' . $view);

        if ($exit) {
            exit;
        }
    }

    public function set($chave, $valor)
    {
        $registry = new Registry;
        $registry->set(
            'view/' . $chave,
             $valor
       );
    }

    public function get($chave)
    {
        $registry = new Registry;
        return $registry->get('view/' . $chave);
    }

    public function setCabecalhosExtras(array $cabecalhos)  
    {
        $this->cabecalhosExtras = $cabecalhos;
    }
 
    public function addCabecalhosExtras(array $cabecalhos)  
    {
        $this->cabecalhosExtras = array_push($cabecalhos);
    }

    public function getCabecalhosExtras()
    {
        return $this->cabecalhosExtras;
    }
   
    public function setJavascriptsExtras(array $cabecalhos)
    {
        $itens = array();
        foreach ($cabecalhos as $cabecalho) {
            array_push($itens, 'public/javascripts/' . $cabecalho . ".js");
        }

        $this->cabecalhosExtras['javascripts'] = $itens;
    }
 
    public function addJavascriptsExtras(array $cabecalhos)  
    {
        $itens = array();
        foreach ($cabecalhos as $cabecalho) {
            array_push($itens, 'public/javascripts/' . $cabecalho . ".js");
        }

        array_push(
            $this->cabecalhosExtras['javascripts'],
            $itens
        );
    }

    public function getJavascriptsExtras()
    {
        return $this->cabecalhosExtras['javascripts'];
    }

    public function setCSSExtras(array $cabecalhos)
    {
        $itens = array();
        foreach ($cabecalhos as $cabecalho) {
            array_push($itens, 'public/css/' . $cabecalho . ".css");
        }

        $this->cabecalhosExtras['css'] = $itens;
    }
 
    public function addCSSExtras(array $cabecalhos)  
    {
        $itens = array();
        foreach ($cabecalhos as $cabecalho) {
            array_push($itens, 'public/css/' . $cabecalho . ".css");
        }

        array_push(
            $this->cabecalhosExtras['css'],
            $itens
        );
    }

    public function getCSSExtras()
    {
        return $this->cabecalhosExtras['css'];
    }
}
