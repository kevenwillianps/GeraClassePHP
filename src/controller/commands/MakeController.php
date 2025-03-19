<?php

namespace src\controller\commands;

// Importação de classes
use src\controller\main\Main;
use src\model\Database;
use stdClass;

class MakeController extends Command
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
            $array['Tables_in_poupeira'] = $args['t'];

            // Converte os dados para array
            $this->tables[0] = (object)$array;
        }

        // Percorre todas as tabelas localizadas
        foreach ($this->tables as $keyTables => $result) {

            // Objeto para criação da estrutura
            $this->data = new stdClass();
            $this->data->name_class = $args['t'] === '*' ? ucfirst($result->Tables_in_poupeira) : $args['n'];
            $this->data->name_file = $args['t'] === '*' ? Main::toPascalCase($result->Tables_in_poupeira) . '.php' : $args['n'] . '.php';
            $this->data->table = strtolower($result->Tables_in_poupeira);
            $this->data->private_variables = null;
            $this->data->functions = null;

            // Percorre todos os campos encontrados
            foreach ($this->dataBase->DescribeTable($this->data->table) as $key => $result) {

                // Escreve as váriaveis privadas
                $this->data->private_variables .= str_repeat("\t", $this->tabQuantity) . 'private ' . Main::getType($result->Type) . ' ' . '$' . Main::toCamelCase($result->Field) . ';' . PHP_EOL;
            }

            // Percorre todos os campos encontrados
            foreach ($this->dataBase->DescribeTable($this->data->table) as $key => $result) {

                // nome interno da variavel
                $var = Main::toCamelCase($result->Field);

                // Escrevo a váriaveis
                $this->data->functions .= str_repeat("\t", $this->tabQuantity) . 'public function ' . Main::generateName($result->Field, 1) . '(' . Main::getType($result->Type) . ' $' . $var . '): void' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    str_repeat("\t", 2) . '$this->' . $var . ' = $' . $var . ';' .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}' .
                    PHP_EOL .
                    PHP_EOL;

                // Escrevo a váriaveis
                $this->data->functions .= str_repeat("\t", $this->tabQuantity) . 'public function ' . Main::generateName($result->Field, 2) . '(): ' . Main::getType($result->Type) . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    str_repeat("\t", 2) . 'return $this->' . $var . ';' .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}' .
                    PHP_EOL .
                    PHP_EOL;
            }

            // Template a ser gerado no arquivo
            $template = "<?php" .
                PHP_EOL .
                PHP_EOL .
                "namespace " . $this->config->dist->namespace . "\controller;" .
                PHP_EOL .
                PHP_EOL .
                "class " . $this->data->name_class . " {" .
                PHP_EOL .
                PHP_EOL .
                $this->data->private_variables .
                PHP_EOL .
                $this->data->functions .
                PHP_EOL .
                "}";

            // Retorna o resultado da operação da criação do arquivo
            if (Main::createFile($this->config->dist->path . '/controller/', $this->data->name_file, $template)) {

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
