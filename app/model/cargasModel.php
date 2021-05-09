<?php

use app\db\Conexao;

class cargasModel
{
    private $db;

    public function __construct()
    {
        
        $conexao = new Conexao();
        $this->db = $conexao::$conexao;
    }

    public function getAll()
    {
        $sql = "SELECT C.ID_CARGA as codigo,
        (select n.nome from navios n) as navio,
        (select p.nome from portos p) as porto,
        c.peso,
        c.DATA_DESEMBARQUE,
        (select a.nome from agentes a) agente,
        c.DATA_VALIDADE,
        case when c.PERECIVEL = 1 then 'SIM' when c.PERECIVEL = 0 then 'NÃO' end as perecivel, 
        c.TEMPERATURA_MAXIMA,
        case when c.SENSIVEL = 1 then 'SIM' when c.SENSIVEL = 0 then 'NÃO' end as sensivel, 
        c.ETIQUETA 
        FROM CARGAS C";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        return $pre->fetchAll();
    }

    public function get($codigo = 'NULL') 
    {
        $sql = "SELECT * FROM CARGAS WHERE ID_CARGA = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return json_encode($rows);
    }

    public function add($request)
    {
        $request->NAVIO = empty($request->NAVIO) ? 'NULL' : $request->NAVIO;
        $request->PORTO = empty($request->PORTO) ? 'NULL' : $request->PORTO;
        $request->PESO = empty($request->PESO) ? 'NULL' : $request->PESO;
        $request->DATADESEMBARQUE = empty($request->DATADESEMBARQUE) ? 'NULL' : $request->DATADESEMBARQUE;
        $request->CODIGOAGENTE = empty($request->CODIGOAGENTE) ? 'NULL' : $request->CODIGOAGENTE;
        $request->DATAVALIDADE = empty($request->DATAVALIDADE) ? 'NULL' : $request->DATAVALIDADE;
        $request->PERECIVEL = empty($request->PERECIVEL) ? 'NULL' : $request->PERECIVEL;
        $request->TEMPERATURAMAXIMA = empty($request->TEMPERATURAMAXIMA) ? 'NULL' : $request->TEMPERATURAMAXIMA;
        $request->SENSIVEL = empty($request->SENSIVEL) ? 'NULL' : $request->SENSIVEL;
        $request->ETIQUETA = empty($request->ETIQUETA) ? 'NULL' : $request->ETIQUETA;

       
        try{

        
            $sql = "INSERT INTO CARGAS (
                ID_NAVIO,
                ID_PORTO, 
                PESO, 
                DATA_DESEMBARQUE,
                CODIGO_AGENTE, 
                DATA_VALIDADE, 
                PERECIVEL, 
                TEMPERATURA_MAXIMA, 
                SENSIVEL, 
                ETIQUETA) 
                VALUES(
                    {$request->NAVIO}, 
                    {$request->PORTO}, 
                    {$request->PESO}, 
                    {$request->DATADESEMBARQUE},
                    {$request->CODIGOAGENTE}, 
                    {$request->DATAVALIDADE}, 
                    {$request->PERECIVEL}, 
                    {$request->TEMPERATURAMAXIMA}, 
                    {$request->SENSIVEL}, 
                    {$request->ETIQUETA})";
      
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
        $request->NAVIO = empty($request->NAVIO) ? 'NULL' : $request->NAVIO;
        $request->PORTO = empty($request->PORTO) ? 'NULL' : $request->PORTO;
        $request->PESO = empty($request->PESO) ? 'NULL' : $request->PESO;
        $request->DATADESEMBARQUE = empty($request->DATADESEMBARQUE) ? 'NULL' : $request->DATADESEMBARQUE;
        $request->CODIGOAGENTE = empty($request->CODIGOAGENTE) ? 'NULL' : $request->CODIGOAGENTE;
        $request->DATAVALIDADE = empty($request->DATAVALIDADE) ? 'NULL' : $request->DATAVALIDADE;
        $request->PERECIVEL = empty($request->PERECIVEL) ? 'NULL' : $request->PERECIVEL;
        $request->TEMPERATURAMAXIMA = empty($request->TEMPERATURAMAXIMA) ? 'NULL' : $request->TEMPERATURAMAXIMA;
        $request->SENSIVEL = empty($request->SENSIVEL) ? 'NULL' : $request->SENSIVEL;
        $request->ETIQUETA = empty($request->ETIQUETA) ? 'NULL' : $request->ETIQUETA;

       
        try{

            $sql = "UPDATE CARGAS SET
                ID_NAVIO = {$request->NAVIO},
                ID_PORTO = {$request->PORTO}, 
                PESO = {$request->PESO}, 
                DATA_DESEMBARQUE = {$request->DATADESEMBARQUE},
                CODIGO_AGENTE = {$request->CODIGOAGENTE}, 
                DATA_VALIDADE = {$request->DATAVALIDADE}, 
                PERECIVEL = {$request->PERECIVEL}, 
                TEMPERATURA_MAXIMA = {$request->TEMPERATURAMAXIMA}, 
                SENSIVEL = {$request->SENSIVEL}, 
                ETIQUETA = {$request->ETIQUETA}
                WHERE ID_CARGA = $codigo";
      
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
        $sql = "DELETE FROM CARGAS WHERE ID_CARGA = $codigo";

        $pre = $this->db->prepare($sql);
        $pre->execute();

        $rows = $pre->fetchAll();

        return json_encode(["success" => "carga deletada com sucesso"]);
    }
}