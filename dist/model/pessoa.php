<?php

namespace src\model;

class pessoa {

	// Declara as variáveis da classe 
	private Mysql $connection;
	private null|string $sql;
	private object $stmt;

	public function __construct()
	{

		// Cria o objeto de conexão com o banco de dados
		$this->connection = new Mysql();

	}



	public function all(): array|false
	{

		// Consulta SQL
		$this->sql = 'SELECT * FROM pessoas';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchAll(\PDO::FETCH_OBJ);

	}



	public function get(PessoasValidate $PessoasValidate): array|false
	{

		// Consulta SQL
		$this->sql = 'SELECT * FROM pessoas p WHERE pessoa_id = :pessoaId';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Preencho os parâmetros do SQL
		$this->stmt->bindParam(':pessoaId', $PessoasValidate->getPessoaId());

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchObject();

	}



	public function save(PessoasValidate $PessoasValidate): array|false
	{

		// Consulta SQL
		$this->sql = 'INSERT INTO pessoas(`pessoa_id`, `pessoa_tipo_id`, `company_id`, `intimacao_id`, `nome`, `cpf_cnpj`, `participacao`, `inscricao_municipal`, `tipo_logradouro`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `ddd`, `telefone`, `email`)
						VALUES(:pessoaId, :pessoaTipoId, :companyId, :intimacaoId, :nome, :cpfCnpj, :participacao, :inscricaoMunicipal, :tipoLogradouro, :endereco, :numero, :complemento, :bairro, :cidade, :uf, :cep, :ddd, :telefone, :email);';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Preencho os parâmetros do SQL
		$this->stmt->bindParam(':pessoaId', $PessoasValidate->getPessoaId());
		$this->stmt->bindParam(':pessoaTipoId', $PessoasValidate->getPessoaTipoId());
		$this->stmt->bindParam(':companyId', $PessoasValidate->getCompanyId());
		$this->stmt->bindParam(':intimacaoId', $PessoasValidate->getIntimacaoId());
		$this->stmt->bindParam(':nome', $PessoasValidate->getNome());
		$this->stmt->bindParam(':cpfCnpj', $PessoasValidate->getCpfCnpj());
		$this->stmt->bindParam(':participacao', $PessoasValidate->getParticipacao());
		$this->stmt->bindParam(':inscricaoMunicipal', $PessoasValidate->getInscricaoMunicipal());
		$this->stmt->bindParam(':tipoLogradouro', $PessoasValidate->getTipoLogradouro());
		$this->stmt->bindParam(':endereco', $PessoasValidate->getEndereco());
		$this->stmt->bindParam(':numero', $PessoasValidate->getNumero());
		$this->stmt->bindParam(':complemento', $PessoasValidate->getComplemento());
		$this->stmt->bindParam(':bairro', $PessoasValidate->getBairro());
		$this->stmt->bindParam(':cidade', $PessoasValidate->getCidade());
		$this->stmt->bindParam(':uf', $PessoasValidate->getUf());
		$this->stmt->bindParam(':cep', $PessoasValidate->getCep());
		$this->stmt->bindParam(':ddd', $PessoasValidate->getDdd());
		$this->stmt->bindParam(':telefone', $PessoasValidate->getTelefone());
		$this->stmt->bindParam(':email', $PessoasValidate->getEmail());

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchObject();

	}



	public function delete(PessoasValidate $PessoasValidate): array|false
	{

		// Consulta SQL
		$this->sql = 'DELETE FROM pessoas p WHERE p.pessoa_id = :pessoaId';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Preencho os parâmetros do SQL
		$this->stmt->bindParam(':pessoaId', $PessoasValidate->getPessoaId());

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchObject();

	}


}