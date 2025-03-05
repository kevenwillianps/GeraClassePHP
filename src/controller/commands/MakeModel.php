<?php

namespace src\controller\commands;

// Importação de classes
use src\controller\main\Main;
use src\model\Database;
use stdClass;

class MakeModel extends Command
{

    private Database $dataBase;
    private object $data;
    private object $config;
    private array $tables = [];
    private array $tables_ = [];

    private int $tabQuantity = 1;

    /**
     * Contrutor da classe
     */
    function __construct()
    {
        // Cria o objeto de conexão com o banco de dados
        $this->dataBase = new dataBase();

        // Busco as configurações da aplicação
        $this->config = Main::GetConfig();
    }

    public function execute(array $args)
    {

        // Verifica se deve buscar todas as tabelas
        if ($args['t'] === '*') {

            // Obtem todas as tbelas do banco de dados
            $this->tables = $this->dataBase->ShowTables();

        } else {
            // Armazena apenas a tabela informada
            $array['Tables_in_cdldf'] = $args['t'];

            // Converte os dados para array
            $this->tables[0] = (object)$array;
        }

        // Percorre todas as tabelas localizadas
        foreach ($this->tables as $keyTables => $result) {

            // Objeto para criação da estrutura
            $this->data = new stdClass();
            $this->data->name_class = $args['t'] === '*' ? ucfirst($result->Tables_in_cdldf) : $args['n'];
            $this->data->name_file = $args['t'] === '*' ? Main::toPascalCase($result->Tables_in_cdldf) . '.php' : $args['n'] . '.php';
            $this->data->table = strtolower($result->Tables_in_cdldf);
            $this->data->private_variables = null;
            $this->data->functions = new stdClass();

            $this->data->private_variable .= str_repeat("\t", 1) . '// Declara as variáveis da classe ' . PHP_EOL .
                                             str_repeat("\t", 1) . 'private Mysql $connection;' . PHP_EOL .
                                             str_repeat("\t", 1) . 'private null|string $sql;' . PHP_EOL .
                                             str_repeat("\t", 1) . 'private object $stmt;';

            $this->data->functions->construct .= str_repeat("\t", $this->tabQuantity) . 'public function __construct()' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Cria o objeto de conexão com o banco de dados' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->connection = new Mysql();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}' .
                    PHP_EOL .
                    PHP_EOL;

            $this->data->functions->all .= str_repeat("\t", $this->tabQuantity) . 'public function all(): array|false' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Consulta SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->sql = \'SELECT * FROM ' . $this->data->table . '\';' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preparo o SQL para execução' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt = $this->connection->connect()->prepare($this->sql);' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Executa o SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt->execute();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Retorno do resultado' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . 'return $this->stmt->fetchAll(\PDO::FETCH_OBJ);' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}' .
                    PHP_EOL .
                    PHP_EOL;

            $this->data->functions->get .= str_repeat("\t", $this->tabQuantity) . 'public function get(): array|false' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Consulta SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->sql = \'SELECT * FROM ' . $this->data->table . '\';' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preparo o SQL para execução' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt = $this->connection->connect()->prepare($this->sql);' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Executa o SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt->execute();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Retorno do resultado' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . 'return $this->stmt->fetchObject();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}' .
                    PHP_EOL .
                    PHP_EOL;

                $this->data->functions->save .= str_repeat("\t", $this->tabQuantity) . 'public function save(' . $this->data->name_class . '): array|false' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Consulta SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->sql = \'SELECT * FROM ' . $this->data->table . '\';' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preparo o SQL para execução' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt = $this->connection->connect()->prepare($this->sql);' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Executa o SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt->execute();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Retorno do resultado' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . 'return $this->stmt->fetchObject();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}' .
                    PHP_EOL .
                    PHP_EOL;

                $this->data->functions->delete .= str_repeat("\t", $this->tabQuantity) . 'public function delete(): array|false' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Consulta SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->sql = \'SELECT * FROM ' . $this->data->table . '\';' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preparo o SQL para execução' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt = $this->connection->connect()->prepare($this->sql);' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Executa o SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt->execute();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Retorno do resultado' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . 'return $this->stmt->fetchObject();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}' .
                    PHP_EOL .
                    PHP_EOL;

            // Template a ser gerado no arquivo
            $template = "<?php" .
                PHP_EOL .
                PHP_EOL .
                "namespace " . $this->config->dist->namespace . "\model;" .
                PHP_EOL .
                PHP_EOL .
                "class " . $this->data->name_class . " {" .
                PHP_EOL .
                PHP_EOL .
                $this->data->private_variable . 
                PHP_EOL .
                PHP_EOL .
                $this->data->functions->construct .
                PHP_EOL .
                PHP_EOL .
                $this->data->functions->all .
                PHP_EOL .
                PHP_EOL .
                $this->data->functions->get .
                PHP_EOL .
                PHP_EOL .
                $this->data->functions->save .
                PHP_EOL .
                PHP_EOL .
                $this->data->functions->delete .
                PHP_EOL .
                "}";

            // Retorna o resultado da operação da criação do arquivo
            if (Main::createFile($this->config->dist->path . '/model/', $this->data->name_file, $template)) {

                // Obtenh os dados da array na posição atual
                $table = $this->tables[$keyTables];

                // Informa que o arquivo para aquela tabela foi criado
                $table->status = true;

                // Atualizo minha listagem de tabelas
                array_push($this->tables_, $table);
            }
        }

        return $this->tables_;
    }
}
