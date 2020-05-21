<?php
// Sem o static d 5.3 vou fazer um singleton
// o singletong deu segment fault. Vai sem... 
class Conexao
{
    private $conexao;
 
   // Não vou colocar em um arquivo externo para ganhar tempo 
    private $settings = array(
        'database' => array(
            'host' => '187.45.196.210',
            'login' => 'agenciainflue2',
            'password' => 'Senha4t56#@',
            'database' => 'agenciainflue2'
        )
    );
    
    public function conectarESelecionar() 
    {

        $this->conectar();
        $this->selectDb();
    }  

    public function conectar()
    {
        $settings = $this->settings;
        
        $this->conexao = mysqli_connect(
            $settings['database']['host'],
            $settings['database']['login'],
            $settings['database']['password']
        );
    }
    
    public function selectDb()
    {
        $settings = $this->settings;

        mysqli_select_db($settings['database']['database'], $this->conexao);
    }
}
