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
            $this->tables = $this->dataBase->ShowTables($this->config->database->name);

        } else {
            // Armazena apenas a tabela informada
            $array['table'] = $args['t'];

            // Converte os dados para array
            $this->tables[0] = (object)$array;
        }

        // Percorre todas as tabelas localizadas
        foreach ($this->tables as $keyTables => $result) {

            // Objeto para criação da estrutura
            $this->data = new stdClass();

            // Define o nome da classe
            $this->data->name_class = $args['t'] === '*' ? ucfirst($result->table) : $args['n'];

            // Concatena com o sufixo
            $this->data->name_class .= $this->config->controller->file_suffix;

            // Define o nome do arquivo
            $this->data->name_file = $args['t'] === '*' ? Main::toPascalCase($result->table) : $args['n'];

            // Concatena com o sufixo
            $this->data->name_file .= $this->config->controller->file_suffix . '.php';

            // Define a tabela que esta sendo utilizada
            $this->data->table = strtolower($result->table);

            // Define um apelido para a tabela
            $this->data->table_nickname = Main::primeirasLetras($this->data->table);

            $this->data->private_variables = null;
            $this->data->functions = null;
            $this->data->class = null;

            // Percorre todos os campos encontrados
            foreach ($this->dataBase->DescribeTable($this->data->table) as $key => $result) {

                // Escreve as váriaveis privadas
                $this->data->private_variables .= str_repeat("\t", $this->tabQuantity) . 'private ' . Main::getType($result->Type) . ' ' . '$' . Main::toCamelCase($result->Field) . ';' . PHP_EOL;
            }

            // Percorre todos os campos encontrados
            foreach ($this->dataBase->DescribeTable($this->data->table) as $key => $result) {

                // nome interno da variavel
                $var = Main::toCamelCase($result->Field);

                // Verifico se devo inserir o comentário
                if(!empty($this->config->controller->dockblock->set)){
                
                    // Define o comentário para o set
                    $this->data->functions .= str_repeat("\t", 1) . '/** ' . PHP_EOL . 
                                              str_repeat("\t", 1) . ' * ' . $this->config->controller->dockblock->set . ' "' . $var . '" ' . PHP_EOL .
                                              str_repeat("\t", 1) . ' * ' . PHP_EOL .
                                              str_repeat("\t", 1) . ' * @param ' . Main::getType($result->Type) . ' ' . $var . ' ' . PHP_EOL .
                                              str_repeat("\t", 1) . ' * ' . PHP_EOL .
                                              str_repeat("\t", 1) . ' * @return void ' . PHP_EOL .
                                              str_repeat("\t", 1) . ' */' . PHP_EOL;

                }

                // Escrevo a váriaveis
                $this->data->functions .= str_repeat("\t", $this->tabQuantity) . 'public function ' . Main::generateName($result->Field, 1) . '(' . Main::getType($result->Type) . ' $' . $var . '): void' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    str_repeat("\t", 2) . '$this->' . $var . ' = $' . $var . ';' .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}' .
                    PHP_EOL .
                    PHP_EOL;

                // Verifico se devo inserir o comentário
                if(!empty($this->config->controller->dockblock->get)){
                
                    // Define o comentário para o get
                    $this->data->functions .= str_repeat("\t", 1) . '/** ' . PHP_EOL . 
                                              str_repeat("\t", 1) . ' * ' . $this->config->controller->dockblock->get . ' "' . $var . '" ' . PHP_EOL .
                                              str_repeat("\t", 1) . ' * ' . PHP_EOL .
                                              str_repeat("\t", 1) . ' * @return ' .  Main::getType($result->Type) . ' ' . PHP_EOL .
                                              str_repeat("\t", 1) . ' */' . PHP_EOL;

                }

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

            // Verifico se devo incluir o comentário
            if(!empty($this->config->model->dockblock->class->description))
            {

                // Escrita da documentação da função
                $this->data->class = str_repeat("\t", 0) . '/**' . PHP_EOL . 
                                     str_repeat("\t", 0) . '* ' . $this->config->model->dockblock->class->description . $this->data->table . PHP_EOL . 
                                     str_repeat("\t", 0) . '*' . PHP_EOL . 
                                     str_repeat("\t", 0) . '* @category ' . $this->config->model->dockblock->class->category . PHP_EOL . 
                                     str_repeat("\t", 0) . '* @package ' . $this->config->model->dockblock->class->package . PHP_EOL . 
                                     str_repeat("\t", 0) . '* @author ' . $this->config->model->dockblock->class->author . PHP_EOL . 
                                     str_repeat("\t", 0) . '* @copyright ' . $this->config->model->dockblock->class->copyright . PHP_EOL . 
                                     str_repeat("\t", 0) . '* @license ' . $this->config->model->dockblock->class->license . PHP_EOL . 
                                     str_repeat("\t", 0) . '* @version ' . $this->config->model->dockblock->class->version . PHP_EOL . 
                                     str_repeat("\t", 0) . '* @link ' . $this->config->model->dockblock->class->link . PHP_EOL . 
                                     str_repeat("\t", 0) . '*' . PHP_EOL . 
                                     str_repeat("\t", 0) . '*/' . PHP_EOL;

            }

            // Template a ser gerado no arquivo
            $template = "<?php" .
                PHP_EOL .
                PHP_EOL .
                "namespace " . $this->config->dist->namespace . "\controller;" .
                PHP_EOL .
                PHP_EOL .
                $this->data->class . 
                "class " . $this->data->name_class . " {" .
                PHP_EOL .
                PHP_EOL .
                $this->data->private_variables .
                PHP_EOL .
                $this->data->functions .
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
