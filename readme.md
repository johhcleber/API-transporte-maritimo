**CARGAS**
----
  Rotas para Cargas.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/api/Carga/get` | `/codigo` | None | GET
| `/api/Carga/add` | None | JSON | POST
| `/api/Carga/update` | `/codigo` | JSON | POST
| `/api/Carga/delete` | `/codigo` | None | GET
| `/api/Carga/getAll` |  | None | GET


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
| `/api/Agente/getAll` |  | None | GET


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
| `/api/Porto/getAll` |  | None | GET


* **Exemplo Data parametros add e Update:**

  ```json
     {
        "PORTO": 1,
        "NOME": "TESTE"
      }
  ```
