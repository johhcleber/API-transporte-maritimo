<?php


class PortoModel
{
    private $db;

    public function __construct()
    {
        
        $conexao = new Conexao();
        $this->db = $conexao::$conexao;
    }

    public function getAll()
    {
        $sql = "select * from portos p";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function get($codigo = 'NULL') 
    {
        $sql = "select * from portos p where p.ID_PORTO = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function add($request)
    {
        $request->NOME = empty($request->NOME) ? 'NULL' : $request->NOME;
       
        try{

            $sql = "INSERT INTO PORTOS (
                NOME) 
                VALUES(
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
 
        try{

            $sql = "UPDATE PORTOS SET 
                NOME = '{$request->NOME}'
                WHERE ID_PORTO = $codigo";
      
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
        $sql = "DELETE FROM PORTOS WHERE ID_PORTO = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return ["Porto deletado com sucesso"];
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