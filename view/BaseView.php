<?php
class BaseView 
{
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
}
