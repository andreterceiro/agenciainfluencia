<?php
// Sem o static d 5.3 vou fazer um singleton
// o singletong deu segment fault. Vai sem... 
class Conexao
{
    private $conexao;
 
   // Não vou colocar em um arquivo externo para ganhar tempo 
    private $settings = array(
        'database' => array(
            'host' => 'sql10.freemysqlhosting.net',
            'bd' => 'sql10342384',
            'usuario' => 'sql10342384',
            'senha' => 'ZS5ktuinVb'           
        )
    );
    
    public function conectarESelecionar() 
    {
        $this->conectar();
        $this->selecionarDB();
    }

    public function selecionarDB() 
    {
        mysqli_select_db($this->conexao, $this->settings['database']['bd']);
    }    

    public function conectar()
    {
        $settings = $this->settings;

        $this->conexao = mysqli_connect(
            $settings['database']['host'],
            $settings['database']['usuario'],
            $settings['database']['senha']
        );
    }
    
    public function query($sql) 
    {
        $query = mysqli_query($sql);
        return mysqli_fetch_array($query);
    }    

    public function getConexao() 
    {
        return $this->conexao;
    }
}
