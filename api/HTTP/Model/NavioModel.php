<?php


class NavioModel
{
    private $db;

    public function __construct()
    {
        
        $conexao = new Conexao();
        $this->db = $conexao::$conexao;
    }

    public function getAll()
    {
        $sql = "select * from navios";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function get($codigo = 'NULL') 
    {
        $sql = "select * from navios where ID_NAVIO = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function add($request)
    {
        $request->NOME = empty($request->NOME) ? 'NULL' : $request->NOME;
        $request->CAPACIDADE = empty($request->CAPACIDADE) ? 'NULL' : $request->CAPACIDADE;
       
        try{

            $sql = "INSERT INTO navios (
                CAPACIDADE,
                NOME) 
                VALUES(
                {$request->CAPACIDADE},
                '{$request->NOME}')";
      
            $pre = $this->db->prepare($sql);
            
            $pre->execute();
        } catch(PDOException $e) {
            return json_encode([
                "Exception" => $e->getMessage()
            ]);
        }

        return $this->get($this->db->lastInsertId());
        
    }

    public function update($codigo, $request) 
    {
        $request->NOME = empty($request->NOME) ? 'NULL' : $request->NOME;
        $request->CAPACIDADE = empty($request->CAPACIDADE) ? 'NULL' : $request->CAPACIDADE;
 
        try{

            $sql = "UPDATE navios SET 
                NOME = '{$request->NOME}',
                CAPACIDADE = '{$request->CAPACIDADE}'
                WHERE ID_NAVIO = $codigo";
      
            $pre = $this->db->prepare($sql);
            
            $pre->execute();

        } catch(PDOException $e) {
            return json_encode([
                "Exception" => $e->getMessage()
            ]);
        }

        return $this->get($codigo);
        
    }

    public function delete($codigo) 
    {
        $sql = "DELETE FROM NAVIOS WHERE ID_NAVIO = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return ["Navio deletado com sucesso"];
    }

    private function removeColumnsNumeric($rows) 
    {
        $return = $rows;

        foreach($return as $keyRow => $row){

            foreach($row as $keyColumn => $column) {

                if(is_numeric($keyColumn)){
                    unset($return[$keyRow][$keyColumn]);
                }else{
                    unset($return[$keyRow][$keyColumn]);
                    $return[$keyRow][strtoupper($keyColumn)] = $column;
                }
            }
        }

        return $return;
    }
}