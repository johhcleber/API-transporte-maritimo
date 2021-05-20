<?php


class AgenteModel
{
    private $db;

    public function __construct()
    {
        
        $conexao = new Conexao();
        $this->db = $conexao::$conexao;
    }

    public function getAll()
    {
        $sql = "SELECT 
        ag.ID_AGENTE as codigo_agente,
        (select p.nome from portos p where p.ID_PORTO = ag.ID_PORTO) as porto,
        ag.NOME as nome
        FROM AGENTES AG";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function get($codigo = 'NULL') 
    {
        $sql = "SELECT * FROM AGENTES WHERE ID_AGENTE = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function add($request)
    {
        $request->PORTO = empty($request->PORTO) ? 'NULL' : $request->PORTO;
        $request->NOME = empty($request->NOME) ? 'NULL' : $request->NOME;
       
        try{

        
            $sql = "INSERT INTO AGENTES (
                NOME,
                ID_PORTO) 
                VALUES(
                '{$request->NOME}',
                {$request->PORTO})";
      
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
        $request->PORTO = empty($request->PORTO) ? 'NULL' : $request->PORTO;
        $request->NOME = empty($request->NOME) ? 'NULL' : $request->NOME;

       
        try{

            $sql = "UPDATE AGENTES SET
                ID_PORTO = {$request->PORTO}, 
                NOME = '{$request->NOME}'
                WHERE ID_AGENTE = $codigo";
      
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
        $sql = "DELETE FROM AGENTES WHERE ID_AGENTE = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return ["Agente deletada com sucesso"];
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