<?php

// Defino o local onde esta a classe
namespace src\model;

/**
 * Classe responsável para manipular os dados
 * da tabela de arquivos
 * 
 * @category  Gestão de Intimação
 * @package   app\src\model
 * @author    Keven
 * @copyright 2025 CDL_DF
 * @license   MIT
 * @version   1.0.0
 * @link https://www.cdldf.souza.inf.br/
 */
class Database
{
	// Declaro as variáveis da classe 
	private $connection = null;
	private $sql = null;
	private $stmt = null;

	/**
	 * Contrutor da classe
	 */
	function __construct()
	{
		// Cria o objeto de conexão com o banco de dados
		$this->connection = new Mysql();
	}

	/**
	 * Lista todas as tabelas do banco de dados
	 *
	 * @return array|false
	 */
	public function ShowTables(string $database) : array|false
	{

		// Consulta SQL
		$this->sql = 'SELECT table_name AS `table`
					  FROM information_schema.tables
					  WHERE table_schema = :database;';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Preenchimento de parâmetros
		$this->stmt->bindParam(':database', $database);

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchAll(\PDO::FETCH_OBJ);

	}

	/**
	 * Obtem uma listagem de todos os campos da tabela em questão
	 *
	 * @return object|false
	 */
	public function DescribeTable(string $table) : array|false
	{

		// Consulta SQL
		$this->sql = 'describe ' . $table;

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchAll(\PDO::FETCH_OBJ);

	}
	
	/**
	 * Obtenho o nome da chave primária da tabela	
	 *
	 * @return string
	 */
	public function getConstraint(string $database, string $table, string $type) : string
	{

		// Consulta SQL
		$this->sql = 'SELECT COLUMN_NAME
					  FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
					  WHERE TABLE_SCHEMA = :database
					  AND TABLE_NAME = :table
					  AND CONSTRAINT_NAME = :type;';

		// Preparo o SQL para execução
		$this->stmt = $this->connection->connect()->prepare($this->sql);

		// Preenchimento de parâmetros
		$this->stmt->bindParam(':database', $database);
		$this->stmt->bindParam(':table', $table);
		$this->stmt->bindParam(':type', $type);

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchObject()->COLUMN_NAME;

	}

	/**
	 * Encerra conexões abertas
	 */
	function __destruct()
	{
		$this->connection = null;
    }
}
