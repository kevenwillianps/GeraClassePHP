<?php

/** Defino o local onde a classe esta localizada **/

namespace src\controller\main;

/**
 * Classe responsável por centralizar as funções compartilhadas em outras funções
 *
 * @category  Gerador de Classes php via linha de comando
 * @package   app\src\controller\main
 * @author    Keven
 * @copyright 2025 CLI
 * @license   MIT
 * @version   1.0.0
 * @link CLI
 */
class Main
{

    /**
     * Obtenho as configurações do serviços
     *
     * @return object|false
     */
    public static function GetConfig(): object|false
    {

        // Retorno os dados em objeto
        return (object)json_decode(file_get_contents('./config.json'));
    }

    /**
     * Retorna uma array de argumentos
     * ["t" => "pessoa", "n" => "PessoaValidate", "make" => "controller"]
     *
     * @param array $arguments
     *
     * @return array|false
     */
    public static function getArguments(array $arguments) : array|false
    {

        $options = [];

        // Processa os argumentos
        foreach ($arguments as $arg) {

            // Verifico se esta dentro do padrão definido
            if (preg_match('/^([\w]+)\.(.+)$/', $arg, $matches)) {

                // Se corresponder ao padrão "letra.palavra" ou "palavra.palavra", armazena como opção
                $options[$matches[1]] = $matches[2];
            }
        }

        return $options;

    }

    /**
     * Retorna uma array de argumentos
     * ["t" => "pessoa", "n" => "PessoaValidate", "make" => "controller"]
     *
     * @param array $arguments
     *
     * @return array|false
     */
    public static function getCommand(array $commands) : array|false
    {
        
        // Pega apenas o primeiro argumento
        $arg = $commands[0];

        // Verifico se está dentro do padrão definido
        if (preg_match('/^([\w]+)\.(.+)$/', $arg, $matches)) {
            // Retorna apenas o primeiro parâmetro encontrado
            return [$matches[1] => $matches[2]];
        }

        return false;
    }

    /**
     * Converte a palavra informada em camel case
     *
     * @param string $string
     *
     * @return string
     */
    public static function toCamelCase(string $string): string
    {

        // Remove caracteres especiais e substitui por espaço
        $string = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $string);

        // Converte para minúsculas e divide em palavras
        $words = explode(' ', strtolower($string));

        // Capitaliza todas as palavras, exceto a primeira
        $camelCase = array_map('ucfirst', $words);

        // Garante que a primeira palavra fique minúscula
        $camelCase[0] = strtolower($camelCase[0]);

        // Junta tudo sem espaços
        return implode('', $camelCase);
    }

    /**
     * Converte a palavra informada em Pascal Case (Upper Camel Case)
     *
     * @param string $string
     * @return string
     */
    public static function toPascalCase(string $string): string
    {
        // Remove caracteres especiais e substitui por espaço
        $string = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $string);

        // Converte para minúsculas e divide em palavras
        $words = explode(' ', strtolower($string));

        // Capitaliza todas as palavras
        $pascalCase = array_map('ucfirst', $words);

        // Junta tudo sem espaços
        return implode('', $pascalCase);
    }

    /**
     * Obtem o tipo de campo de acordo com chave informada
     *
     * @param string $string
     *
     * @return string
     */
    public static function getType(string $string): null|string
    {

        // Remove os tamanhos dos campos, deixando somente o tipo do mesmo
        $string = preg_replace('/\(.*?\)/', '', $string);

        switch ($string) {
            case 'int':
            case 'integer':
            case 'tinyint':
            case 'smallint':
            case 'mediumint':
            case 'bigint':
                $result = 'int';
                break;

            case 'decimal':
            case 'numeric':
            case 'float':
            case 'double':
            case 'real':
                $result = 'float';
                break;

            case 'char':
            case 'varchar':
            case 'text':
            case 'tinytext':
            case 'mediumtext':
            case 'longtext':
            case 'enum':
            case 'set':
                $result = 'string';
                break;

            case 'date':
            case 'datetime':
            case 'timestamp':
            case 'time':
            case 'year':
                $result = '\DateTime';
                break;

            case 'json':
                $result = 'json';
                break;

            case 'blob':
            case 'tinyblob':
            case 'mediumblob':
            case 'longblob':
                $result = 'blob';
                break;

            default:
                $result = null;
                break;
        }

        // Junta tudo sem espaços
        return $result;
    }

    /**
     * Obtem o tipo de campo de acordo com chave informada
     *
     * @param string $string
     *
     * @return string
     */
    public static function generateName(string $string, int $type): null|string
    {

        $result = null;

        switch ($type) {

            // Crio o nome do "SET"
            case 1:

                $result = 'set' . self::toPascalCase($string);
                break;

            // Crio o nome do "SET"
            case 2:

                $result = 'get' . self::toPascalCase($string);
                break;

            default:

                $result = null;
                break;
        }

        // Junta tudo sem espaços
        return $result;
    }

    public static function createFile(string $dir, string $name, string $data): bool
    {

        // Verfica se não existe a pasta desejada
        if (!file_exists($dir)) {

            // Cria a pasta desejada
            mkdir($dir, 0777, true);
        }

        // Cria o arquivo desejado
        file_put_contents($dir . $name, $data);

        // Verifica se o arquivo foi criado
        return (bool) is_file($dir . $name);
    }
}
