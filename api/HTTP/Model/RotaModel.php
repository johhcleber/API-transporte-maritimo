<?php


class RotaModel
{
    private $db;

    public function __construct()
    {
        
        $conexao = new Conexao();
        $this->db = $conexao::$conexao;
    }

    public function getAll()
    {
        $sql = "select * from rotas";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function get($codigo = 'NULL') 
    {
        $sql = "select * from rotas where ID_ROTA = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return $this->removeColumnsNumeric($rows);
    }

    public function add($request)
    {
        $request->NOME = empty($request->NOME) ? 'NULL' : $request->NOME;
        $request->PORTO_EMBARQUE = empty($request->PORTO_EMBARQUE) ? 'NULL' : $request->PORTO_EMBARQUE;
        $request->PORTO_DESEMBARQUE = empty($request->PORTO_DESEMBARQUE) ? 'NULL' : $request->PORTO_DESEMBARQUE;
       
        try{

            $sql = "INSERT INTO rotas (
                NOME,
                PORTO_EMBARQUE,
                PORTO_DESEMBARQUE) 
                VALUES(
                '{$request->NOME}',
                {$request->PORTO_EMBARQUE}, 
                {$request->PORTO_DESEMBARQUE})";
      
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
        $request->PORTO_EMBARQUE = empty($request->PORTO_EMBARQUE) ? 'NULL' : $request->PORTO_EMBARQUE;
        $request->PORTO_DESEMBARQUE = empty($request->PORTO_DESEMBARQUE) ? 'NULL' : $request->PORTO_DESEMBARQUE;
 
        try{

            $sql = "UPDATE rotas SET 
                NOME = '{$request->NOME}',
                PORTO_EMBARQUE = {$request->PORTO_EMBARQUE},
                PORTO_DESEMBARQUE = {$request->PORTO_DESEMBARQUE}
                WHERE ID_ROTA = $codigo";
      
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
        $sql = "DELETE FROM ROTAS WHERE ID_ROTA = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return ["Rota deletado com sucesso"];
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