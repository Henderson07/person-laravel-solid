# 👨‍💻 Person Laravel (S.O.L.I.D + Clean Code)

> Projeto criado por **Henderson Camilo** com o objetivo de estudar e aplicar os princípios **S.O.L.I.D**, Clean Code e boas práticas em Laravel (Pode haver quebra de mágicas do Framework já que o propósito é aprender o que o próprio Framework faz!).
> Mas por que não usar outra linguagem para esse projeto? -> Trabalho com Laravel e acabei notando que estava tão no automático que no fim das contas
> não sabia o que o próprio Framework faz...

---

## 📦 Funcionalidades

-   ✅ Cadastro de pessoa física
-   ✅ Cadastro de pessoa jurídica
-   ✅ Validação de nome (limite de caracteres)
-   ✅ Validação de documento (CPF/CNPJ)
-   ✅ Estrutura de serviços separada por tipo de pessoa
-   ✅ Persistência no banco de dados MySQL via Eloquent
-   ✅ Testes automatizados

---

## 🧱 Estrutura de Pastas

```bash
app/
├── Http/
│   └── Controllers/
│       └── PersonController.php         # Controller principal
├── Helpers/
│   ├── CNPJValidator.php                # Validação Cnpj
│   └── CPFValidator.php                 # Validação Cpf
├── Services/
│   ├── PersonServiceInterface.php       # Interface base
│   ├── PersonFisicService.php           # Serviço para pessoa física
│   ├── PersonJuridicService.php         # Serviço para pessoa jurídica
│   └── PersonServiceResolver.php        # Resolve o tipo de pessoa
├── Models/
│   ├── Person.php                       # Classe abstrata base
│   ├── PersonFisic.php                  # Entidade física
│   └── PersonJuridic.php                # Entidade jurídica
├── Exceptions/
│   └── BusinessRuleException.php        # Regras de negócio violadas
resources/
└── views/
│    └── person/
│        └── create.blade.php             # Formulário para criar pessoa
tests/
├── Unit/
│   ├── Helpers/
│   │   ├── CNPJValidatorTest.php
│   │   └── CPFValidatorTest.php
│   ├── Services/
│   │   ├── PersonFisicServiceTest.php
│   │   ├── PersonJuridicServiceTest.php
│   │   └── PersonServiceResolverTest.php
│   └── Models/
├── Feature/
│   └── Controllers/
│       └── PersonControllerTest.php
```

---

## ⚙️ Como executar o projeto

### 🔧 Requisitos

-   PHP 8.1+
-   Composer
-   MySQL
-   Laravel 10+
-   Docker (opcional)

---

## 🚨 Pré-requisitos importantes para Docker

### 1. **Sistemas Windows**:
   - Certifique-se que o arquivo `entrypoint.sh` tenha terminadores de linha no formato **Unix (LF)**
   - Use editores como VS Code, Notepad++ ou Sublime Text para conversão
   - **No VS Code**: clique no `CRLF` no canto inferior direito e selecione `LF`
   - **No Notepad++**: vá em `Editar` → `Conversão EOL` → `Formato Unix (LF)`

### 2. **Arquivo .env**:
   ```bash
   # ANTES de subir os containers, execute:
   cp .env.example .env
   ```

### 3. **Permissões (Linux/macOS)**:
   ```bash
   # Garanta que o entrypoint.sh seja executável:
   chmod +x entrypoint.sh
   ```

---

### 🚀 Rodando com Docker (recomendado)

```bash
# 1. Clone o repositório
git clone https://github.com/Henderson07/person-laravel-solid.git
cd person-laravel-solid

# 2. Configure o arquivo .env
cp .env.example .env

# 3. Suba os containers com Docker Compose
docker-compose up --build
```

**Acesse**: http://localhost:8000/person/create

⚠️ **O container `laravel-app` já executa automaticamente**:
- `composer install`
- `php artisan key:generate`
- `php artisan migrate`
- Configuração de permissões nas pastas necessárias
- Inicialização do Apache no container

---

### 💻 Rodando manualmente (sem Docker)

```bash
# 1. Clone o repositório
git clone https://github.com/Henderson07/person-laravel-solid.git
cd person-laravel-solid

# 2. Instale as dependências
composer install

# 3. Copie e configure o .env
cp .env.example .env
php artisan key:generate

# 4. Configure o banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=person-laravel
DB_USERNAME=root
DB_PASSWORD=root

# 5. Rode as migrations
php artisan migrate

# 6. Inicie o servidor
php artisan serve
```

**Acesse**: [http://localhost:8000/person/create](http://localhost:8000/person/create)

---

## 🐛 Solucionando problemas comuns

### Docker não sobe ou apresenta erros:
1. **Verifique se o arquivo `entrypoint.sh` está no formato Unix (LF)**
2. **Confirme que o `.env` foi criado** a partir do `.env.example`
3. **Limpe o cache do Docker**:
   ```bash
   docker-compose down
   docker system prune -f
   docker-compose up --build
   ```

### Erro de permissão (Linux/macOS):
```bash
sudo chmod +x entrypoint.sh
sudo chown -R $USER:$USER storage bootstrap/cache
```

---

## 🧪 Teste o fluxo completo

1. Acesse a rota `/person/create`
2. Escolha o tipo de pessoa (física ou jurídica)
3. Informe nome e documento
4. Submeta o formulário
5. Validações serão executadas
6. Dados são salvos no banco

---

## 🧭 Fluxo de Branches (Git Flow Simplificado)

-   `main` → versão estável e pronta para produção
-   `dev` → integração de features
-   `feature/person` → desenvolvimento da criação de pessoa
-   `feature/products` → desenvolvimento futuro de produtos

---

## 🏷️ Versionamento (SemVer)

| Versão | Descrição                              |
| ------ | -------------------------------------- |
| v1.0.0 | Primeira versão funcional do sistema   |
| v1.1.0 | Nova feature: ex. cadastro de produtos |
| v1.1.1 | Correções de bugs                      |

Use:

```bash
git tag -a v1.0.0 -m "Versão estável inicial"
git push origin v1.0.0
```

---

## 👤 Autor

**Henderson Camilo**  
Desenvolvedor PHP/Laravel em ambiente ERP  
[LinkedIn](https://www.linkedin.com/in/henderson-camilo-gomes-da-silva-5468a1211/)

---

## ✅ Licença

Este projeto é **livre para estudo e aprendizado**.
