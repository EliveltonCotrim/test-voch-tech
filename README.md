# Voch Tech | Teste back-end Jr PHP/Laravel

O objetivo deste teste é criar um sistema para gerenciar o cadastro de unidades, cargos e colaboradores, bem como a capacidade de registrar e atualizar o desempenho dos colaboradores. Além disso, o sistema oferecerá funcionalidade para a geração de relatórios, incluindo: 

- Relatório de Colaboradores:Nome, CPF, E-mail, Unidade, Cargo.
- Total de Colaboradores por Unidade: Nome Fantasia, Razão Social, CNPJ, Total de 
Colaboradores.
- Ranking de Colaboradores melhores avaliados (da maior nota a menor): Nome, CPF, Email, Unidade, Cargo, Nota de Desempenho.

![image](https://github.com/EliveltonCotrim/test-voch-tech/blob/ffe3cc8f6a859c55c8e4cbce28943a1b0ef4e8da/public/assets/images/system.png)

  
# Instalação

Por favor, siga os comandos abaixo para realizar a configuração inicial e instalação das dependências do projeto, seguindo a ordem indicada:


Clone o repositório para seu ambiente de desenvolvimento.

```
composer install
```
```
npm install
```
```
cp .env.example .env
```
```
php artisan key:generate
```
```
Definir APP_URL=http://localhost/pasta_do_projeto/public
```

```
php artisan migrate --seed
```
```
npm run dev
```


