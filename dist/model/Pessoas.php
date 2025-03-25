<?php

namespace src\model;

class Pessoas {

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



	public function get(): array|false
	{

		// Consulta SQL
		$this->sql = 'SELECT * FROM pessoas p WHERE pessoa_id = :pessoaId';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Preencho os parâmetros do SQL
		$this->stmt->bindParam(':pessoaId', $CompaniesValidate->getCompanyId());

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchObject();

	}



	public function save(Pessoas): array|false
	{

		// Consulta SQL
		$this->sql = 'SELECT * FROM pessoas';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchObject();

	}



	public function delete(): array|false
	{

		// Consulta SQL
		$this->sql = 'SELECT * FROM pessoas';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchObject();

	}


}