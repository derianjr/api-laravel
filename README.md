## InvestAPI - API de Gerenciamento de Investimentos

API robusta desenvolvida em PHP utilizando o framework Laravel para facilitar o gerenciamento de investimentos. Esta API oferece funcionalidades essenciais para criar, visualizar, retirar e listar investimentos de uma pessoa.



## Funcionalidades

- Investimentos associados a um proprietário, definindo a data de criação e o valor. A data de criação pode ser configurada como hoje ou uma data passada, garantindo que o investimento não seja ou torne-se negativo.
- Visualize detalhes de um investimento, incluindo o valor inicial e o saldo esperado. O saldo esperado é a soma do valor investido e dos ganhos. Se o investimento foi retirado, o saldo reflete os ganhos desse investimento.
- Realize a retirada total de um investimento, calculando o saque como a soma do valor inicial e dos ganhos. A retirada pode ocorrer no passado ou hoje, mas não antes da criação do investimento ou no futuro. Os impostos são aplicados sobre o saque antes de mostrar o valor final.
- Lista de Investimentos : Recupere uma lista paginada de investimentos de uma pessoa.







## Licença

Este projeto está licenciado sob a [MIT](https://choosealicense.com/licenses/mit/)

