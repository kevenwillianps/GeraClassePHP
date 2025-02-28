<?php

namespace src\controller;

class Logs_types {

	private int $logTypeId;
	private string $name;
	private string $description;

	public function setLogTypeId(int $logTypeId): void
	{
		$this->logTypeId = $logTypeId;
	}

	public function getLogTypeId(): int
	{
		return $this->logTypeId;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	public function getDescription(): string
	{
		return $this->description;
	}


}