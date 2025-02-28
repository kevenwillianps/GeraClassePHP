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

            'make:migration' => 'MakeMigration',  // O comando "make:migration" será tratado pela classe "MakeMigration".
            'make:controller' => 'MakeController', // O comando "make:controller" será tratado pela classe "MakeController".
            'make:model' => 'MakeModel' // O comando "make:controller" será tratado pela classe "MakeController".

        ];

    }

    public function CheckCommand(string $command){

        // Verifica e retorna se existe o comando desejado
        return (bool)in_array($command, $this->commands);

    }

    public function GetCommand(string $command){

        // Verifica e retorna se existe o comando desejado
        return $this->commands[$command];

    }

}
