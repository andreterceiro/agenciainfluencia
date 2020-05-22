<?php
class BaseModel
{
    private $db;

    function __construct($bd) 
    {
        $conexao = new Conexao;
        $conexao->conectarESelecionar();
        $this->db = $conexao->getConexao();
    }

    public function consultar($id, $tabela) 
    {
        if (! is_numeric($id)) {
            throw new InvalidArgumentException("O ID não é numérico");
        }

        return mysqli_query($this->db, "select * from $tabela where id='" . $id . "'");
    }

    public function consultarTodos($tabela)
    {
        return mysqli_query($this->db, "select * from $tabela");
    }

    public function gravar($dados, $tabela)
    {
        mysqli_query(
            $this->db,
            "insert into clientes(
                 nome,
                 nis,
                 email,
                 telefone
             ) values (
             " 
                 . '"' . $dados['nome'] . '",'
                 . '"' . $dados['nis'] . '",'
                 . '"' . $dados['email'] . '",'
                 . '"' . $dados['telefone'] . '"' . 
             ")"
        ) or die(mysqli_error($this->db));
    }
}

