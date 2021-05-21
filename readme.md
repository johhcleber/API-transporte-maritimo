**CARGAS**
----
  Rotas para Cargas.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/api/Carga/get` | `/codigo` | None | GET
| `/api/Carga/add` | None | JSON | POST
| `/api/Carga/update` | `/codigo` | JSON | POST
| `/api/Carga/delete` | `/codigo` | None | GET
| `/api/Carga/getAll` | None | None | GET


* **Exemplo Data parametros add e Update:**

  ```json
   {
    "NAVIO": 1,
    "PORTO": 1,
    "PESO": 50,
    "DATADESEMBARQUE": "2021-04-04",
    "CODIGOAGENTE": 1,
    "DATAVALIDADE": "2021-04-04",
    "TEMPERATURAMAXIMA": 50,
    "PERECIVEL" : "false",
    "SENSIVEL" : "false",
    "ETIQUETA": "D"
  }
  ```



**AGENTES**
----
  Rotas para Agentes.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/api/Agente/get` | `/codigo` | None | GET
| `/api/Agente/add` | None | JSON | POST
| `/api/Agente/update` | `/codigo` | JSON | POST
| `/api/Agente/delete` | `/codigo` | None | GET
| `/api/Agente/getAll` | None | None | GET


* **Exemplo Data parametros add e Update:**

  ```json
    {
      "PORTO": 1,
      "NOME": "Teste"
    }
  ```


**PORTOS**
----
  Rotas para Portos.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/api/Porto/get` | `/codigo` | None | GET
| `/api/Porto/add` | None | JSON | POST
| `/api/Porto/update` | `/codigo` | JSON | POST
| `/api/Porto/delete` | `/codigo` | None | GET
| `/api/Porto/getAll` | None | None | GET


* **Exemplo Data parametros add e Update:**

  ```json
     {
        "NOME": "TESTE"
      }
  ```


**NAVIOS**
----
  Rotas para Navios.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/api/Navio/get` | `/codigo` | None | GET
| `/api/Navio/add` | None | JSON | POST
| `/api/Navio/update` | `/codigo` | JSON | POST
| `/api/Navio/delete` | `/codigo` | None | GET
| `/api/Navio/getAll` | None | None | GET


* **Exemplo Data parametros add e Update:**

  ```json
    {
      "CAPACIDADE": 200,
      "NOME": "TESTE"
    }
  ```


**ROTAS**
----
  Rotas para as Rotas existente.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/api/Rota/get` | `/codigo` | None | GET
| `/api/Rota/add` | None | JSON | POST
| `/api/Rota/update` | `/codigo` | JSON | POST
| `/api/Rota/delete` | `/codigo` | None | GET
| `/api/Rota/getAll` | None | None | GET


* **Exemplo Data parametros add e Update:**

  ```json
    {
      "NOME": "TESTE",
      "PORTO_EMBARQUE": 1,
      "PORTO_DESEMBARQUE": 1
    }
  ```


**ROTAS_NAVIO**
----
  Rotas para relacionamento de navios com as rotas existentes.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/api/RotaNavio/get` | `/codigo` | None | GET
| `/api/RotaNavio/add` | None | JSON | POST
| `/api/RotaNavio/update` | `/codigo` | JSON | POST
| `/api/RotaNavio/delete` | `/codigo` | None | GET
| `/api/RotaNavio/getAll` | None | None | GET


* **Exemplo Data parametros add e Update:**

  ```json
    {
      "ID_NAVIO": 8,
      "ID_ROTA": 8
    }
  ```