<?php
$settings['database'] = array(
    'host' => '187.45.196.191',
    'login' => 'agenciainfluen',
    'password' => 'Senha4t56#@',
    'database' => 'agenciainfluen',
);

// Sem o static d 5.3 vou fazer um singleton
// o singletong deu segment fault. Vai sem... 
class Conexao
{
    // Não vou colocar em um arquivo externo para ganhar tempo 
    private $settings = array(
        'database' => array(
            'host' => '187.45.196.191',
            'login' => 'agenciainfluen',
            'password' => 'Senha4t56#@',
            'database' => 'agenciainfluen'
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
        
        mysql_connect(
            $settings['database']['host'],
            $settings['database']['login'],
            $settings['database']['password']
        );
    }
    
    public function selectDb()
    {
        $settings = $this->settings;

        mysql_select_db($settings['database']['database']);
    }
}
