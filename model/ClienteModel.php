<?php
require_once "BaseModel.php";

class ClienteModel extends BaseModel
{
    private $nome;
    private $nis;
    private $email;
    private $telefone;

    public function __construct()
    {
        parent::__construct('clientes');
    }

    public function consultarTodos($tabela = 'clientes') 
    {
        return parent::consultarTodos($tabela);
    }

    public function consultar($id, $tabela="clientes") 
    {
        return parent::consultar($id, $tabela);
    }

    public function getNome()
    {
        return $this->nome;    
    }

    public function setNome($nome)
    {
         $this->nome = $nome;

         if (empty($nome)) {
             return "O nome deve ser preenchido";
         }
    }

    public function getTelefone()
    {
        return $this->telefone;
    }
    
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
         
        if (empty($telefone)) {
             return "O telefone deve ser preenchido";
         }
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email) 
    {
        if (empty($email)) {
            return "O e-mail deve ser preechido"; 
	} else {
           $posicaoArroba = strpos($email, "@");
           if ($posicaoArroba < 1) {
               return "O e-mail não tem @ no lugar certo";
           } else {
               $posicaoPrimeiroPonto = strpos ($email, ".");
               if ($posicaoPrimeiroPonto < $posicaoArroba) {
                    return "O e-mail não tem . no lugar certo";
               } else {
                   $posicaoSegundoPonto = strpos($email, ".", $posicaoPrimeiroPonto);
                   if ($posicaoPrimeiroPonto < $posicaoSegundoPonto) {
                       return "O e-mail não tem . no lugar certo";
                   }
               }
               
               $ultimoCaracter = mb_substr($email, -1, 1);
               if ($ultimoCaracter == "." || $ultimoCaracter == "@") {
                   return "O e-mail não deve terminar em '.' ou '@'";
               }
           }

           $this->email = $email;
        }
    }

    public function getNis()
    {
        return $this->nis;
    }

    public function setNis($nis)
    {
        if (! empty($nis)) {
            global $registry;
            $cURL = curl_init();
            curl_setopt($cURL, CURLOPT_URL, "https://www.nif.pt/?json=1&q=" . $nis . "&key=" . $registry->get('apiKeyNis'));
            curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true); 
            $resultadoConsulta = json_decode(curl_exec($cURL));  
            curl_close($cURL);
            if ($resultadoConsulta->result != 'success') {
                throw new InvalidArgumentException("A validação do NIS falhou. O retorno foi '" . $resultadoConsulta->message . "'"); 
            }
        }
         
        $this->nis = $nis;
    }

    public function gravar($dados, $tabelaClientes="clientes")
    {
        return parent::gravar($dados, $tabelaClientes);
    }
}

