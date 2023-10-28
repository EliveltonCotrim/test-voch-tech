# Voch Tech | Teste back-end Jr PHP/Laravel

O objetivo deste teste é criar um sistema para gerenciar o cadastro de unidades, cargos e colaboradores, bem como a capacidade de registrar e atualizar o desempenho dos colaboradores. Além disso, o sistema oferecerá funcionalidade para a geração de relatórios, incluindo: 

- Relatório de Colaboradores:Nome, CPF, E-mail, Unidade, Cargo.
- Total de Colaboradores por Unidade: Nome Fantasia, Razão Social, CNPJ, Total de 
Colaboradores.
- Ranking de Colaboradores melhores avaliados (da maior nota a menor): Nome, CPF, Email, Unidade, Cargo, Nota de Desempenho.

![image](https://github.com/EliveltonCotrim/nlw_ia/assets/images/system.png)
  
# Instalação

Por favor, siga os comandos abaixo para realizar a configuração inicial e instalação das dependências do projeto, seguindo a ordem indicada:

```
Clone o repositório para seu ambiente de desenvolvimento, lembrando que o desenvolvimento deste teste foi feito
```
```
composer install
```
```
cp .env.example
```
```
php artisan key:generate
```
```
php artisan migrate
```

