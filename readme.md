**CARGAS**
----
  Rotas para Cargas.
  
| rotas      | URL parametros                       | Data parametros                   | Verbo 
|:--------------|:----------------------------------|:----------------------------------|:----------------------------------|
| `/app/camadas/cargas/get.php` | `?codigo=1` | None | GET
| `/app/camadas/cargas/add.php` | None | JSON | POST
| `/app/camadas/cargas/update.php` | `?codigo=1` | JSON | POST
| `/app/camadas/cargas/delete.php` | `?codigo=1` | None | GET



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
