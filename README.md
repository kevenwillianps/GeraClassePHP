# Gerador de Classes PHP a partir do Banco de Dados

Bem-vindo ao **Gerador de Classes PHP**! 🚀

Este projeto foi criado para agilizar o desenvolvimento de aplicações PHP, permitindo a geração automática de **Controllers** e **Models** com base nas tabelas do banco de dados. Com apenas alguns comandos, você pode estruturar rapidamente sua aplicação.

---

## 📌 Índice
- [📢 Funcionalidades](#-funcionalidades)
- [🛠️ Como Usar](#%EF%B8%8F-como-usar)
  - [Criar um novo Controller](#criar-um-novo-controller)
  - [Criar uma nova Model](#criar-uma-nova-model)
- [📌 Exemplo de Uso](#-exemplo-de-uso)
- [🏗️ Próximos Passos](#%EF%B8%8F-próximos-passos)
- [📜 Licença](#-licença)

---

## 📢 Funcionalidades
✅ Geração automática de **Controllers**
✅ Geração automática de **Models** (em breve)
✅ Facilita a organização do código
✅ Padronização na criação de classes

---

## 🛠️ Como Usar

O gerador funciona através da linha de comando do PHP. Para utilizá-lo, basta executar os seguintes comandos:

### Criar um novo Controller
```bash
php cli.php make.controller t.pessoas n.PessoaController
```
**Explicação dos parâmetros:**
- `t.pessoas` → Define a tabela do banco de dados utilizada como base
- `n.PessoaController` → Define o nome do arquivo que será gerado

---

### Criar uma nova Model
```bash
php cli.php make.model t.pessoas n.Pessoa
```
**Explicação dos parâmetros:**
- `t.pessoas` → Define a tabela do banco de dados utilizada como base
- `n.Pessoa` → Define o nome do arquivo que será gerado

---

## 📌 Exemplo de Uso

Se você deseja criar um controller para a tabela `usuarios` com o nome `UsuarioController.php`, basta rodar o comando:
```bash
php cli.php make.controller t.usuarios n.UsuarioController
```
Isso criará automaticamente um arquivo na pasta apropriada com a estrutura básica do controller.

---

## 🏗️ Próximos Passos
📌 Implementação da geração automática de **Models**
📌 Suporte para diferentes bancos de dados
📌 Melhorias na estrutura dos arquivos gerados

Fique à vontade para contribuir com o projeto e sugerir melhorias! 😊

---

## 📜 Licença

Este projeto é licenciado sob a licença MIT. Consulte o arquivo `LICENSE` para mais detalhes.

📌 **Mantenedor:** [Keven Willian](http://github.com/kevenwillianps/)

