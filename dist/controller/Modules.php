<?php

namespace src\controller;

class Modules {

	private int $moduleId;
	private int $companyId;
	private string $name;
	private string $description;

	public function setModuleId(int $moduleId): void
	{
		$this->moduleId = $moduleId;
	}

	public function getModuleId(): int
	{
		return $this->moduleId;
	}

	public function setCompanyId(int $companyId): void
	{
		$this->companyId = $companyId;
	}

	public function getCompanyId(): int
	{
		return $this->companyId;
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