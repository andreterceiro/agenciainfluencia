<?php
class Registry
{
    private static $singleton;

    function __construct()
    {  
        if (isset(self::$singleton)) {
            return self::$singleton;    
        }

        self::$singleton = $this;
        $_SESSION['registry'] = array();
    }

    /**
     * Seta uma chave (com seu valor) no registry
     *
     * @param $string $chave Chave a ser setada
     * @param mixed   $valor Valor a ser setado
     *
     * @return null
     */
    public function set($chave, $valor)
    {
        global $registro;
        $registro[$chave] = $valor;
    }
    /**
     * Retorna o valor de uma chave (com seu valor) do registry
     *
     * @param string  $chave Chave a ser obtida
     * @param boolean $exceptionParaChaveNaoEncontrada Se true lança uma exception se a chave não for encontrada
     *a
     * @return mixed O valor relacionado à chave
     */
    public function get($chave, $exceptionParaChaveNaoEncontrada = false) 
    {
        global $registro;
 
        if (! is_string($chave)) {
            throw new InvalidArgumentException('A chave deve ser uma string');
        }

        if (array_key_exists($chave, $registro)) {
            return $registro[$chave];
        }

       if ($exceptionParaChaveNaoEncontrada) {
           throw new InvalidArgumentException('A chave ' . $chave . ' não foi encontrada');
       }
    }
}
