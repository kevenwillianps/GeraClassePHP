<?php

namespace src\controller;

class Companies {

	private int $companyId;
	private string $name;

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


}