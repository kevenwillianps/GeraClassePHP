<?php

namespace src\controller\commands;

abstract class Command
{
    abstract public function execute(array $args);
}