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

            // Define o nome do arquivo
            $this->data->name_file = $args['t'] === '*' ? Main::toPascalCase($result->table) . '.php' : $args['n'] . '.php';

            // Define a tabela que esta sendo utilizada
            $this->data->table = strtolower($result->table);

            // Define um apelido para a tabela
            $this->data->table_nickname = Main::primeirasLetras($this->data->table);

            // Guardo as variaveis privadas
            $this->data->private_variable = str_repeat("\t", 1) . '// Declara as variáveis da classe ' . PHP_EOL .
                                             str_repeat("\t", 1) . 'private Mysql $mysql;' . PHP_EOL .
                                             str_repeat("\t", 1) . 'private null|string $sql;' . PHP_EOL .
                                             str_repeat("\t", 1) . 'private object $stmt;';

            // Obtenho todos os campos da tabela
            $this->data->inputs = $this->dataBase->DescribeTable($this->data->table);

            // Defino o nome da classe como parâmetro
            $this->data->class_parameter = Main::toPascalCase($this->data->table) . Main::toPascalCase($this->config->model->class_parameter_suffix);

            // Objeto para guardar as funções a serem geradas
            $this->data->functions = new stdClass();

            // OBjeto para guardas as cahves da tabela
            $this->data->constraint = new stdClass();

            // Obtenho a chave primária
            $this->data->constraint->primary_key = $this->dataBase->getConstraint($this->config->database->name, $result->table, 'PRIMARY');
            
            $this->data->inputs_str = null;
            $this->data->inputs_values_str = null;
            $this->data->inputs_bindParam = null;

            // Cria uma string de inputs
            foreach($this->data->inputs as $key => $result)
            {

                // Crio a lista de campos em string da tabela
                $this->data->inputs_str .= '`'. $result->Field . '`' . (($key + 1) >= count($this->data->inputs) ? '' : ', ');

                // Crio os bind params em string
                $this->data->inputs_values_str .= Main::toBindParam(Main::toCamelCase($result->Field)) . (($key + 1) >= count($this->data->inputs) ? '' : ', ');

                // Crio o preenchimento dos bindparam em string
                $this->data->inputs_bindParam .= str_repeat("\t", 2) . '$this->stmt->bindParam(\'' . Main::toBindParam(Main::toCamelCase($result->Field)) . '\', $' .  $this->data->class_parameter . '->get' . Main::toPascalCase($result->Field) . '());' . PHP_EOL;

            }

            // Escritra do Método construtor
            $this->data->functions->construct = str_repeat("\t", $this->tabQuantity) . 'public function __construct()' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Cria o objeto de conexão com o banco de dados' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->mysql = new Mysql();' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '}';

            // Inicializa o método
            $this->data->functions->all = null;

            // Verifico se devo incluir o comentário
            if(!empty($this->config->model->dockblock->all))
            {

                // Escrita da documentação da função
                $this->data->functions->all .= str_repeat("\t", 1) . '/**' . PHP_EOL . 
                                               str_repeat("\t", 1) . '* ' . $this->config->model->dockblock->all . PHP_EOL . 
                                               str_repeat("\t", 1) . '*' . PHP_EOL . 
                                               str_repeat("\t", 1) . '* @return array' . PHP_EOL . 
                                               str_repeat("\t", 1) . '*/' . PHP_EOL;

            }

            // Escrita da função que lista todos os itens
            $this->data->functions->all .= str_repeat("\t", $this->tabQuantity) . 'public function all(): array|false' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Consulta SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->sql = \'SELECT ' . $this->data->table_nickname . '.* FROM ' . $this->data->table . ' ' .  $this->data->table_nickname . '\';' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preparo o SQL para execução' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt = $this->mysql->connect()->prepare($this->sql);' .
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
                    str_repeat("\t", $this->tabQuantity) . '}';

            // Inicializa o método
            $this->data->functions->get = null;

            // Verifico se devo incluir o comentário
            if(!empty($this->config->model->dockblock->get))
            {

                // Escrita da documentação da função
                $this->data->functions->get .= str_repeat("\t", 1) . '/**' . PHP_EOL . 
                                               str_repeat("\t", 1) . '* ' . $this->config->model->dockblock->get . PHP_EOL . 
                                               str_repeat("\t", 1) . '*' . PHP_EOL . 
                                               str_repeat("\t", 1) . '* @param ' . $this->data->class_parameter . ' $' . $this->data->class_parameter . PHP_EOL . 
                                               str_repeat("\t", 1) . '*' . PHP_EOL . 
                                               str_repeat("\t", 1) . '* @return object|null' . PHP_EOL . 
                                               str_repeat("\t", 1) . '*/' . PHP_EOL;

            }

            // Escrita da função que obtem um item
            $this->data->functions->get .= str_repeat("\t", $this->tabQuantity) . 'public function get(' . $this->data->class_parameter . ' $' . $this->data->class_parameter . '): object|false' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Consulta SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->sql = \'SELECT * FROM ' . $this->data->table . ' ' . $this->data->table_nickname . ' WHERE ' .  $this->data->table_nickname . '.' . $this->data->constraint->primary_key . ' = ' . Main::toBindParam(Main::toCamelCase($this->data->constraint->primary_key)) .'\';' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preparo o SQL para execução' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt = $this->mysql->connect()->prepare($this->sql);' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preencho os parâmetros do SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt->bindParam(\'' . Main::toBindParam(Main::toCamelCase($this->data->constraint->primary_key)) . '\', $' .  $this->data->class_parameter . '->get' . Main::toPascalCase($this->data->constraint->primary_key) . '());' .
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
                    str_repeat("\t", $this->tabQuantity) . '}';

                // Inicializa o método
                $this->data->functions->save = null;

                // Verifico se devo incluir o comentário
                if(!empty($this->config->model->dockblock->save))
                {

                    // Escrita da documentação da função
                    $this->data->functions->save .= str_repeat("\t", 1) . '/**' . PHP_EOL . 
                                                str_repeat("\t", 1) . '* ' . $this->config->model->dockblock->save . PHP_EOL . 
                                                str_repeat("\t", 1) . '*' . PHP_EOL . 
                                                str_repeat("\t", 1) . '* @param ' . $this->data->class_parameter . ' $' . $this->data->class_parameter . PHP_EOL . 
                                                str_repeat("\t", 1) . '*' . PHP_EOL . 
                                                str_repeat("\t", 1) . '* @return boolean|string' . PHP_EOL . 
                                                str_repeat("\t", 1) . '*/' . PHP_EOL;

                }

                // Escrita do método que salva o registro
                $this->data->functions->save .= str_repeat("\t", $this->tabQuantity) . 'public function save(' . $this->data->class_parameter . ' $' . $this->data->class_parameter . '): bool|string' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Consulta SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->sql = \'INSERT INTO ' . $this->data->table . '(' . $this->data->inputs_str . ')' .
                    PHP_EOL .
                    str_repeat("\t", 6) . 'VALUES(' . $this->data->inputs_values_str . ');\';' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preparo o SQL para execução' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt = $this->mysql->connect()->prepare($this->sql);' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preencho os parâmetros do SQL' .
                    PHP_EOL . 
                    $this->data->inputs_bindParam .
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
                    str_repeat("\t", $this->tabQuantity) . '}';

                // Inicializa o método
                $this->data->functions->delete = null;

                // Verifico se devo incluir o comentário
                if(!empty($this->config->model->dockblock->delete))
                {

                    // Escrita da documentação da função
                    $this->data->functions->delete .= str_repeat("\t", 1) . '/**' . PHP_EOL . 
                                                str_repeat("\t", 1) . '* ' . $this->config->model->dockblock->delete . PHP_EOL . 
                                                str_repeat("\t", 1) . '*' . PHP_EOL . 
                                                str_repeat("\t", 1) . '* @param ' . $this->data->class_parameter . ' $' . $this->data->class_parameter . PHP_EOL . 
                                                str_repeat("\t", 1) . '*' . PHP_EOL . 
                                                str_repeat("\t", 1) . '* @return boolean|string' . PHP_EOL . 
                                                str_repeat("\t", 1) . '*/' . PHP_EOL;

                }

                // Escrita do método que remove o registro
                $this->data->functions->delete .= str_repeat("\t", $this->tabQuantity) . 'public function delete(' . $this->data->class_parameter . ' $' . $this->data->class_parameter . '): bool|string' . PHP_EOL .
                    str_repeat("\t", $this->tabQuantity) . '{' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Consulta SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->sql = \'DELETE FROM ' . $this->data->table . ' ' . $this->data->table_nickname . ' WHERE ' . $this->data->table_nickname . '.' . $this->data->constraint->primary_key . ' = ' . Main::toBindParam(Main::toCamelCase($this->data->constraint->primary_key)) . '\';' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preparo o SQL para execução' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt = $this->mysql->connect()->prepare($this->sql);' .
                    PHP_EOL .
                    PHP_EOL .
                    str_repeat("\t", 2) . '// Preencho os parâmetros do SQL' .
                    PHP_EOL . 
                    str_repeat("\t", 2) . '$this->stmt->bindParam(\'' . Main::toBindParam(Main::toCamelCase($this->data->constraint->primary_key)) . '\', $' .  $this->data->class_parameter . '->get' . Main::toPascalCase($this->data->constraint->primary_key) . '());' .
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

            // Inicialização da função
            $this->data->functions->class = null;

            // Verifico se devo incluir o comentário
            if(!empty($this->config->model->dockblock->class->description))
            {

                // Escrita da documentação da função
                $this->data->functions->class .= str_repeat("\t", 0) . '/**' . PHP_EOL . 
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
                "namespace " . $this->config->dist->namespace . "\model;" .
                PHP_EOL .
                PHP_EOL .
                '// Importação de Classe' . PHP_EOL .
                'use ' . $this->config->dist->namespace . '\controller\\' . $this->data->table . '\\' . $this->data->class_parameter . ';' .
                PHP_EOL .
                PHP_EOL .
                $this->data->functions->class . PHP_EOL .
                "class " . $this->data->name_class . " extends " . $this->data->class_parameter . " {" .
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
