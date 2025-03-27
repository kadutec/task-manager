# Task Manager

## Configuração do Projeto

Para rodar o projeto, siga os passos abaixo:

1. **Clone o repositório:**
   ```sh
   git clone https://github.com/kadutec/task-manager.git
   ```
2. **Entre na pasta do projeto:**
   ```sh
   cd task-manager
   ```
3. **Instale as dependências necessárias para rodar um projeto Laravel:**
   - PHP (versão 8 ou superior)
   - Composer
   - MySQL ou outro banco de dados compatível
   - Node.js e npm (opcional, caso utilize assets frontend)
   - Instale as dependências do projeto:
     ```sh
     composer install
     ```
   - Copie o arquivo de exemplo do ambiente:
     ```sh
     cp .env.example .env
     ```
   - Gere a chave da aplicação:
     ```sh
     php artisan key:generate
     ```
   - Configure seu banco de dados no arquivo `.env` e rode as migrações:
     ```sh
     php artisan migrate
     ```

4. **Inicialize o servidor Laravel:**
   ```sh
   php artisan serve
   ```
   Se tudo estiver correto, você verá a seguinte mensagem:
   ```
   Starting Laravel development server: http://127.0.0.1:8000
   ```

## Testando a API

Para testar a API, você pode utilizar o Postman ou qualquer outro aplicativo de sua preferência.

### Exemplo de requisição:

- **URL:** `http://127.0.0.1:8000/api/admin/tasks`
- **Métodos suportados:** `GET`, `POST`, `PUT`, `DELETE`

#### Criando um novo registro

- **Método:** `POST`
- **Body (JSON):**
  ```json
  {
    "title": "Minha Tarefa",
    "description": "Descrição da minha tarefa",
    "status": "pendente",
    "due_date": "2025-01-01"
  }
  ```

## Desafios Encontrados

Durante o desenvolvimento, encontrei algumas dificuldades com configurações por ser minha primeira experiência com Laravel. Um dos principais desafios foi que as rotas não estavam funcionando corretamente. Para solucionar isso, precisei instalar o pacote API:
```sh
php artisan install:api
```
E também modificar o arquivo `bootstrap/app.php` para configurar o roteamento corretamente.

No geral, Laravel se mostrou uma ferramenta poderosa e intuitiva, apesar do desafio inicial de entender suas camadas MVC, roteamento e métodos de manipulação de dados no controller (insert, delete, select, update).

