# teste MiniSistemaProfessores

# desafio realizado.

# Instalar as depedencias.


```
npm install ou yarn install
```

- instalar o pacote vendor caso não tenha no projeto.

```
composer install
```
- iniciar o servidor

```
npm run start ou yarn run start
```

- iniciar o php artisan

```
php artisan serve
```

# iniciar mysql linux e windows

- no linux

```
sudo service mysql start
```

- no windows

```
inicie o xampp
```

# verifique o arquivo .ENV se está correnramente conectado ao banco de dados mysql 

- exemplo do arquivo .ENV tendo conexão ao banco de dados:
- sempre a senha padrão e vazia porem se criou acrescente no password

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=MiniSistemaProfessores
DB_USERNAME=root
DB_PASSWORD=
```


# abra a pasta MiniSistemaProfessores e execute para subir a tabelas ao banco de dados

```
php artisan migrate
```

# para cadastrar mensagens e professor

- utlize o postman ou insomnia para fazer as requisições

- o servidor estará rodando na porta 8000

```
localhost:8000
```

# use o postman ou insomnia para as requisições 

- rota para criar novo professor

```
localhost:8000/professors/create
```

- exemplo de json para  o cadastro do professor

```
{
  "name": "Nome do Professor"
}
```

- envio das mensagens ao professor:

```
localhost:8000/messages/create
```

- excluir professor criado

```
localhost:8000/professors/messages/{message}
```

- exemplo de json para o envio da mensagem

```
{
  "student_name": "Alice Johnson",
  "birth_date": "1995-05-15",
  "city": "Dourados",
  "state": "Mato Grosso do Sul",
  "email": "alice.johnson@gmail.com",
  "whatsapp": "67998581226",
  "professor_id": 2
}
```


- atualizar a mensagem

```
localhost:8000/professors/messages/{message}/edit
```

- exemplo de json para o envio da mensagem

```
{
  "nome_aluno": "Alice Johnson",
  "data_nascimento": "1995-08-27",
  "cidade": "Canpo Grande",
  "estado": "Mato Grosso do Sul",
  "email": "alice.johnson@hotmail.com",
  "whatsapp": "67998581226",
  "id_professor": 2
}

```

