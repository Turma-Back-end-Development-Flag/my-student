
/clubes
/clubes/benfica
/clubes/benfica/jogadores === /jogadores?clube=benfica

SELECT * FROM Jogadores WHERE clube_id = 'benfica'

/jogadores
/jogadores/:id

/epoca/2020/jogadores === /jogadores?epoca=2020

SELECT * FROM Jogadores WHERE epoca IN(2020);

-----------------

GET /people --> Lista de pessoas
POST /people --> Adicionar mais uma pessoa
OPTIONS /people --> Allow: GET, POST
(PUT /people --> Remove todas as pessoas e cria novas pessoas que estão no body)
(DELETE /people --> Remove todas as pessoas)

GET /people/2 --> Recebo a representação deste recurso
PUT /people/2 --> Modificar todas as propriedades da pessoa
PATCH /people/2 --> Modificar apenas as propriedades que seleciono
DELETE /people/2 --> Remove esta pessoa em concreto

POST /people/2/suspend  --> Correr uma ação em concreto


PUT /people/2

{
  "name": "Vitor",
  "email": "vitor@example.org"
}


