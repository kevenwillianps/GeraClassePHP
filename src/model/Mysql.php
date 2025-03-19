<?php
/**
 * Mysql Class
 *
 * Esta classe é responsável por gerenciar a conexão com o banco de dados MySQL.
 *
 * @package vendor\model
 * @created_by KEVEN
 * @created_date 01/06/2020
 * @created_time 13:20
 *
 */

/** Defino o local onde a classe está localizada **/
namespace src\model;

/** Classe Host necessária para obter as configurações de conexão com o banco de dados **/
use src\model\Host;

class Mysql
{
    /** @var \PDO $pdo Instância do objeto PDO para conexão com o banco de dados **/
    public static $pdo;

    /**
     * Método para conectar ao banco de dados MySQL.
     *
     * Este método estabelece a conexão com o banco de dados MySQL usando as configurações
     * definidas na classe Host e retorna a instância do objeto PDO.
     *
     * @return \PDO Instância do objeto PDO para conexão com o banco de dados.
     */
    public static function connect()
    {
        /**
         * Instância da classe Host para obter as configurações de conexão com o banco de dados.
         */
        $host = new Host();

        /**
         * Verifica se a conexão com o banco de dados ainda não foi estabelecida.
         */
        if (!isset(self::$pdo)) {

            /**
             * Inicia a conexão com o banco de dados usando as configurações obtidas da classe Host.
             */
            self::$pdo = new \PDO($host->getDsn(), $host->getUser(), $host->getPassword());

            /**
             * Habilita a exibição de erros ao executar consultas SQL.
             */
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        }

        /**
         * Retorna a instância do objeto PDO para conexão com o banco de dados.
         */
        return self::$pdo;

    }

}
