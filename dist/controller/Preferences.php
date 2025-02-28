<?php

namespace src\controller;

class Preferences {

	private int $preferenceId;
	private int $companyId;
	private string $name;
	private string $description;
	private string $value;

	public function setPreferenceId(int $preferenceId): void
	{
		$this->preferenceId = $preferenceId;
	}

	public function getPreferenceId(): int
	{
		return $this->preferenceId;
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

	public function setValue(string $value): void
	{
		$this->value = $value;
	}

	public function getValue(): string
	{
		return $this->value;
	}


}