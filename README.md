# Gerador de Classes PHP a partir do Banco de Dados  

Bem-vindo ao **Gerador de Classes PHP**! 🚀  

Este projeto foi criado para agilizar o desenvolvimento de aplicações PHP, permitindo a geração automática de **Controllers** e **Models** com base nas tabelas do banco de dados. Com apenas alguns comandos, você pode estruturar rapidamente sua aplicação.  

---

## 📌 Índice  
- [📢 Funcionalidades](#-funcionalidades)  
- [🛠️ Como Usar](#%EF%B8%8F-como-usar)  
  - [Gerar arquivos para todas as tabelas](#gerar-arquivos-para-todas-as-tabelas)  
  - [Criar um novo Controller](#criar-um-novo-controller)  
  - [Criar uma nova Model](#criar-uma-nova-model)  
- [⚙️ Configuração de Comentários](#%EF%B8%8F-configuração-de-comentários)  
- [📌 Exemplo de Uso](#-exemplo-de-uso)  
- [🏗️ Próximos Passos](#%EF%B8%8F-próximos-passos)  
- [📜 Licença](#-licença)  

---

## 📢 Funcionalidades  
✅ Geração automática de **Controllers**  
✅ Geração automática de **Models**  
✅ Geração de arquivos para **todas as tabelas** com um único comando  
✅ Escrita automática de **comentários** nas classes e funções  
✅ Configuração de **comentários personalizados** via `config.json`  
✅ Padronização na criação de classes  

---

## 🛠️ Como Usar  

O gerador funciona através da linha de comando do PHP. Para utilizá-lo, basta executar os seguintes comandos:  

### Gerar arquivos para todas as tabelas  
Agora é possível gerar arquivos para todas as tabelas do banco de dados de uma vez. Basta rodar:  
```bash
php cli.php make.model t.*
```
Isso criará automaticamente **Controllers** e **Models** para todas as tabelas do banco.  

---

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

## ⚙️ Configuração de Comentários  

Agora é possível adicionar comentários automaticamente às classes e funções geradas. A configuração é feita no arquivo `config.json`.  

Exemplo de configuração de comentários para controllers:  
```json
"controller": {
  "dockblock": {
    "get": "Recuperação da informação",
    "set": "Validação da informação",
    "class": {
      "description": "Classe responsável para manipular os dados da tabela de ",
      "author": "Keven",
      "license": "MIT",
      "version": "1.0.0"
    }
  }
}
```
Caso os valores no `config.json` estejam **vazios**, os comentários **não serão gerados**.  

---

## 📌 Exemplo de Uso  

Se você deseja criar um **Controller** e um **Model** para a tabela `usuarios` e incluir comentários personalizados, basta rodar:  
```bash
php cli.php make.controller t.usuarios n.UsuarioController  
php cli.php make.model t.usuarios n.Usuario  
```
Isso criará automaticamente os arquivos na pasta apropriada com a estrutura básica e os comentários configurados.  

---

## 🏗️ Próximos Passos  
📌 Melhorias na configuração dos arquivos gerados  
📌 Suporte para diferentes bancos de dados  
📌 Opção de personalização avançada dos arquivos gerados  

Fique à vontade para contribuir com o projeto e sugerir melhorias! 😊  

---

## 📜 Licença  

Este projeto é licenciado sob a licença MIT. Consulte o arquivo `LICENSE` para mais detalhes.  

📌 **Mantenedor:** [Keven Willian](http://github.com/kevenwillianps/)  

---

Esse README reflete todas as novas funcionalidades de forma clara e organizada. 🚀
