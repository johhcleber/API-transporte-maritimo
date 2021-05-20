<?php

class Request
{
    /**
     * open faz a chamada para as respectivas classes/metodos passados na URI sendo que a partir do terceiro parametro, trata-se dos dados esperados pelos metodos
     *
     * @param array $requisicao
     * @return void
     */
	public static function open($requisicao, $dadosBody)
	{
		$url = explode('/', $requisicao['url']);
		
		$classe = ucfirst($url[0]);
		array_shift($url);

		$metodo = $url[0];
		array_shift($url);

		$parametros = [];
		$parametros = $url;
		$parametros[] = json_decode($dadosBody);

		try {

			if (class_exists($classe)) {

				if (method_exists($classe, $metodo)) {

					$retorno = call_user_func_array([new $classe, $metodo], $parametros);

					return json_encode([
                        'status' => 'sucesso', 
                        'dados' => $retorno]);

				} else {

					return json_encode([
                        'status' => 'erro', 
                        'dados' => 'Método inexistente!']);
				}
                
			} else {

				return json_encode([
                    'status' => 'erro',
                    'dados' => 'Classe inexistente!']);
			}	
		} catch (Exception $e) {
            
			return json_encode([
                'status' => 'erro',
                'dados' => $e->getMessage()]);
		}
		
	}
}