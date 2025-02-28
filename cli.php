<?php

// Importação do autoload para carregar automaticamente as classes necessárias.
require_once __DIR__ . '/autoload.php';

// Importação de classes
use src\controller\cli\CliCommands;
use src\controller\main\Main;

try {

    /**
     * VARIÁVEIS GLOBAIS
     * Quantidade de Argumentos => $argc
     * Lista de Argumentos => $argv
     */

    // Instânciamento de classes
    $CliCommands = new CliCommands();

    // Captura o tempo antes da execução da função
    $inicio = microtime(true);

    // Controle de erros
    $errors = null;

    // Verifica se o script foi chamado com pelo menos um argumento (o comando a ser executado).
    if ($argc < 2) {

        // Informa a exceção
        throw new Exception("Uso: php cli.php <comando> [opções]\n");
    }

    /**
     * t => Tabela
     * n => Name/Nome
     */

    // Captura todos os comandos ignorando o arquivo. Ex.: php cli.php ...
    $options = Main::getArguments(array_slice($argv, 1));

    // Verifica se foi informado o nome do arquivo
    if (isset($options['n']) && empty($options['n']) && empty($options['name'])) {

        // Informa a exceção
        $errors .= "\n \t - Não foi informado o nome do " . $options['make'];
    }

    // Verifica se foi informado o nome do arquivo
    if (isset($options['t']) && empty($options['t']) && empty($options['table'])) {

        // Informa a exceção
        $errors .= "\n \t - Não foi informado a tabela do " . $options['make'];
    }

    // Verifica se foi informado o nome do arquivo
    if (!$CliCommands->CheckCommand('make', $options['make'])) {

        // Informa a exceção
        $errors .= "\n \t - Comando não encontrado " . $options['make'];
    }

    // Verifica se existe erros
    if (!empty($errors)) {

        // Informa a exceção
        throw new Exception($errors);
    }

    // Monta o nome completo da classe, incluindo o namespace "commands\".
    $commandClass = "src\\controller\\commands\\" . $CliCommands->GetCommand('make', $options['make']);

    // Verifica se a classe correspondente ao comando existe.
    if (!class_exists($commandClass)) {

        // Informa a exceção
        throw new Exception("Erro: Classe '$commandClass' não encontrada.");
    }

    // Cria uma instância da classe do comando correspondente.
    $command = new $commandClass();

    // Chama o método execute() da classe do comando, passando os argumentos extras.
    // Exibe todas as mensagens geradas
    foreach ($command->execute($options) as $ke => $result) {

        // Verifica o status
        if ((bool)$result->status) {

            // Mensagem de sucesso
            echo "Controller para a tabela :: " . $result->Tables_in_cdldf . " criado com sucesso! \n";
        } else {

            // Mensagem de erro
            echo "Não foi possível gerar o Controller para a tabela :: " . $result->Tables_in_cdldf . "\n";
        }
    }
} catch (Exception $exception) {

    // Tratamento da mensagem de exeção
    $resultException = "Arquivo: " . $exception->getFile() .  ";\n Linha: " . $exception->getLine() . ";\n Código: " . $exception->getCode() . ";\n Mensagem: " . $exception->getMessage();

    // Exibe da informação
    echo $resultException;
} catch (Error $error) {

    // Tratamento da mensagem de erro
    $resultError = "Arquivo: " . $error->getFile() .  ";\n Linha: " . $error->getLine() . ";\n Código: " . $error->getCode() . ";\n Mensagem: " . $error->getMessage();

    // Exibe da informação
    echo $resultError;
} finally {

    // Captura o tempo após a execução da função
    $fim = microtime(true);

    // Calcula o tempo total em segundos
    $tempoTotal = $fim - $inicio;

    // Exibe o tempo gasto para gerar os arquivos
    echo "\n Tempo de execução: " . number_format($tempoTotal, 3) . " ms\n";

    // Encerra a aplicação
    exit;
}
