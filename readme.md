**CARGAS**
----
  Rotas para Cargas.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/app/camadas/Carga/get` | `/codigo` | None | GET
| `/app/camadas/Carga/add` | None | JSON | POST
| `/app/camadas/Carga/update` | `/codigo` | JSON | POST
| `/app/camadas/Carga/delete` | `/codigo` | None | GET
| `/app/camadas/Carga/getAll` | `/codigo` | None | GET


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
| `/app/camadas/Agente/get` | `/codigo` | None | GET
| `/app/camadas/Agente/add` | None | JSON | POST
| `/app/camadas/Agente/update` | `/codigo` | JSON | POST
| `/app/camadas/Agente/delete` | `/codigo` | None | GET
| `/app/camadas/Agente/getAll` | `/codigo` | None | GET


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
| `/app/camadas/Porto/get` | `/codigo` | None | GET
| `/app/camadas/Porto/add` | None | JSON | POST
| `/app/camadas/Porto/update` | `/codigo` | JSON | POST
| `/app/camadas/Porto/delete` | `/codigo` | None | GET
| `/app/camadas/Porto/getAll` | `/codigo` | None | GET


* **Exemplo Data parametros add e Update:**

  ```json
     {
        "PORTO": 1,
        "NOME": "TESTE"
      }
  ```
