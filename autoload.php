<?php

spl_autoload_register(function ($class) {
    // Converte o namespace em um caminho de arquivo
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Erro: Arquivo da classe '$class' não encontrado em '$file'.\n";
    }
});