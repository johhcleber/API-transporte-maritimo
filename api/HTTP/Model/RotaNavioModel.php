<?php


class RotaNavioModel
{
    private $db;

    public function __construct()
    {
        
        $conexao = new Conexao();
        $this->db = $conexao::$conexao;
    }

    public function getAll()
    {
        $sql = "select * from navio_rota";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function get($codigo = 'NULL') 
    {
        $sql = "select * from navio_rota where ID_NAVIO_ROTA = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function add($request)
    {
        $request->ID_NAVIO = empty($request->ID_NAVIO) ? 'NULL' : $request->ID_NAVIO;
        $request->ID_ROTA = empty($request->ID_ROTA) ? 'NULL' : $request->ID_ROTA;
       
        try{

            $sql = "INSERT INTO NAVIO_ROTA (
                ID_NAVIO,
                ID_ROTA) 
                VALUES(
                {$request->ID_NAVIO},
                {$request->ID_ROTA})";
      
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
        $request->ID_NAVIO = empty($request->ID_NAVIO) ? 'NULL' : $request->ID_NAVIO;
        $request->ID_ROTA = empty($request->ID_ROTA) ? 'NULL' : $request->ID_ROTA;
 
        try{

            $sql = "UPDATE navio_rota SET 
                ID_NAVIO = {$request->ID_NAVIO},
                ID_ROTA = {$request->ID_ROTA}
                WHERE ID_NAVIO_ROTA = $codigo";
      
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
        $sql = "DELETE FROM navio_rota WHERE ID_NAVIO_ROTA = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return ["navio_rota deletado com sucesso"];
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