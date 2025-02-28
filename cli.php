<?php

// Importação do autoload para carregar automaticamente as classes necessárias.
require_once __DIR__ . '/autoload.php';

// Importação de classes
use src\controller\cli\CliCommands;

try {

    // Instânciamento de classes
    $CliCommands = new CliCommands();

    // Captura o tempo antes da execução da função
    $inicio = microtime(true);

    // Controle de erros
    $errors = null;

    // Verifica se o script foi chamado com pelo menos um argumento (o comando a ser executado).
    if ($argc < 2) {
        echo "Uso: php cli.php <comando> [opções]\n"; // Mensagem de uso quando o comando é inválido ou não fornecido.
        exit(1); // Sai do script com código de erro 1 (indica falha).
    }

    /**
     * t => Tabela
     * n => Name/Nome
     */

    // Obtém o nome do comando passado como argumento no terminal.
    $commandName = $argv[1];

    // Captura os argumentos extras passados após o comando.
    $rawArguments = array_slice($argv, 2);
    $arguments = [];
    $options = [];

    // Processa os argumentos
    foreach ($rawArguments as $arg) {
        if (preg_match('/^([\w]+)\.(.+)$/', $arg, $matches)) {
            // Se corresponder ao padrão "letra.palavra" ou "palavra.palavra", armazena como opção
            $options[$matches[1]] = $matches[2];
        } else {
            // Caso contrário, adiciona como argumento normal
            $arguments[] = $arg;
        }
    }

    // Verifica se foi informado o nome do arquivo
    if (isset($options['n']) && empty($options['n']) && empty($options['name'])) {

        // Informa a exceção
        $errors .= "\n \t - Não foi informado o nome do " . $commandName;
    }

    // Verifica se foi informado o nome do arquivo
    if (isset($options['t']) && empty($options['t']) && empty($options['table'])) {

        // Informa a exceção
        $errors .= "\n \t - Não foi informado a tabela do " . $commandName;
    }

    // Verifica se foi informado o nome do arquivo
    if ($CliCommands->CheckCommand($commandName)) {

        // Informa a exceção
        $errors .= "\n \t - Comando não encontrado " . $commandName;
    }

    // Verifica se existe erros
    if (!empty($errors)) {

        // Informa a exceção
        throw new Exception($errors);
    }

    // Monta o nome completo da classe, incluindo o namespace "commands\".
    $commandClass = "src\\controller\\commands\\" . $CliCommands->GetCommand($commandName);

    // Verifica se a classe correspondente ao comando existe.
    if (!class_exists($commandClass)) {
        echo "Erro: Classe '$commandClass' não encontrada.\n"; // Mensagem de erro caso a classe não seja encontrada.
        exit(1); // Sai do script com código de erro 1.
    }

    // Cria uma instância da classe do comando correspondente.
    $command = new $commandClass();

    // Chama o método execute() da classe do comando, passando os argumentos extras.
    // Exibe todas as mensagens geradas
    foreach($command->execute($options) as $ke => $result)
    {

        // Verifica o status
        if((bool)$result->status)
        {

            // Mensagem de sucesso
            echo "Controller para a tabela :: " . $result->Tables_in_cdldf . " criado com sucesso! \n";

        }
        else
        {

            // Mensagem de erro
            echo "Não foi possível gerar o Controller para a tabela :: " . $result->Tables_in_cdldf . "\n";

        }
        
    }

    // Captura o tempo após a execução da função
    $fim = microtime(true);
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

    // Calcula o tempo total em segundos
    $tempoTotal = $fim - $inicio;

    // Exibe o tempo gasto para gerar os arquivos
    echo "Tempo de execução: " . number_format($tempoTotal, 3) . " ms\n";

    // Encerra a aplicação
    exit;
}
