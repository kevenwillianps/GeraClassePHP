<?php

/** Defino o local onde a classe esta localizada **/
namespace src\controller\cli;

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
class CliCommands
{

    private array $commands = [];

    function __construct()
    {
        
        $this->commands = [

            'make' => [
                'controller' => 'MakeController',
                'model' => 'MakeModel'
            ],
            'update' => [
                'controller' => 'UpdateCOntroller'
            ]

        ];

    }

    public function CheckCommand(string $command, string $value){

        return isset($this->commands[$command][$value]);
    }

    public function GetCommand(string $command, string $value){

        // Verifica e retorna se existe o comando desejado
        return $this->commands[$command][$value];

    }

}
