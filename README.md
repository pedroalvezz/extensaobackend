# Profissoes API

Este é o repositório da API de **Profissoes** desenvolvida em Laravel. Ela fornece uma interface para realizar operações CRUD (Create, Read, Update, Delete) para gerenciar profissões.

---

## Pré-requisitos

Antes de rodar o projeto, certifique-se de ter os seguintes requisitos instalados:

1. **PHP** (>= 8.1)
2. **Composer** (gerenciador de dependências do PHP)
3. **MySQL** ou outro serviço de banco de dados configurado
4. **Laravel** (v10 ou superior)

---

## Configuração do Projeto

### 1. Clonar o Repositório

Clone o projeto para sua máquina local:
```bash
git clone <url-do-repositorio>
cd profissao-api
```

### 2. Instalar Dependências

Instale as dependências do Laravel utilizando o Composer:
```bash
composer install
```

### 3. Configurar o Ambiente

Renomeie o arquivo `.env.example` para `.env`:
```bash
cp .env.example .env
```

Configure as variáveis de ambiente no arquivo `.env`, incluindo as informações do banco de dados:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=profissao
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 4. Gerar a Chave da Aplicação

Execute o comando para gerar a chave única da aplicação:
```bash
php artisan key:generate
```

### 5. Configurar o Banco de Dados

Certifique-se de que o serviço de banco de dados esteja rodando e execute as migrations para criar as tabelas necessárias:
```bash
php artisan migrate
```

---

## Rodando a API

### 1. Servidor Local

Para iniciar o servidor de desenvolvimento, execute:
```bash
php artisan serve
```

Por padrão, a API estará acessível em: `http://127.0.0.1:8000`

---

## Endpoints Disponíveis

| Método HTTP | URL                    | Descrição                       |
|-------------|------------------------|---------------------------------|
| GET         | /api/profissoes        | Listar todas as profissões      |
| GET         | /api/profissoes/{id}   | Exibir uma profissão específica |
| POST        | /api/profissoes        | Criar uma nova profissão        |
| PUT         | /api/profissoes/{id}   | Atualizar uma profissão         |
| DELETE      | /api/profissoes/{id}   | Deletar uma profissão           |

---

## Exemplo de Requisições

### 1. Criar uma Profissão

**Endpoint:** `POST /api/profissoes`

**Corpo da Requisição (JSON):**
```json
{
  "nome": "Desenvolvedor Web",
  "descricao": "Profissional responsável por criar e manter sites.",
  "salario": 5000.00,
  "empresa": "Tech Company"
}
```

**Resposta (201 Created):**
```json
{
  "id": 1,
  "nome": "Desenvolvedor Web",
  "descricao": "Profissional responsável por criar e manter sites.",
  "salario": 5000.00,
  "empresa": "Tech Company",
  "created_at": "2024-12-03T18:52:00.000000Z",
  "updated_at": "2024-12-03T18:52:00.000000Z"
}
```

### 2. Listar Profissões

**Endpoint:** `GET /api/profissoes`

**Resposta (200 OK):**
```json
[
  {
    "id": 1,
    "nome": "Desenvolvedor Web",
    "descricao": "Profissional responsável por criar e manter sites.",
    "salario": 5000.00,
    "empresa": "Tech Company",
    "created_at": "2024-12-03T18:52:00.000000Z",
    "updated_at": "2024-12-03T18:52:00.000000Z"
  }
]
```

### 3. Atualizar uma Profissão

**Endpoint:** `PUT /api/profissoes/{id}`

**Corpo da Requisição (JSON):**
```json
{
  "nome": "Engenheiro de Software",
  "descricao": "Profissional especializado em desenvolver softwares.",
  "salario": 8000.00,
  "empresa": "Tech Company Advanced"
}
```

**Resposta (200 OK):**
```json
{
  "id": 1,
  "nome": "Engenheiro de Software",
  "descricao": "Profissional especializado em desenvolver softwares.",
  "salario": 8000.00,
  "empresa": "Tech Company Advanced",
  "created_at": "2024-12-03T18:52:00.000000Z",
  "updated_at": "2024-12-03T19:00:00.000000Z"
}
```

### 4. Deletar uma Profissão

**Endpoint:** `DELETE /api/profissoes/{id}`

**Resposta (200 OK):**
```json
{
  "message": "Profissão deletada com sucesso"
}
```

---

## Observações Importantes

1. **Banco de Dados:** Certifique-se de que o serviço de banco de dados esteja rodando antes de iniciar o projeto.
2. **Servidor:** O comando `php artisan serve` inicia apenas um servidor local para testes e desenvolvimento. Em produção, utilize um servidor web como **Apache** ou **Nginx**.

---

## Contribuição
Sinta-se à vontade para contribuir com melhorias para o projeto. Envie um pull request ou reporte problemas na seção de issues.