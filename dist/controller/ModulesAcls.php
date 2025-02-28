<?php

namespace src\controller;

class Modules_acls {

	private int $moduleAclId;
	private int $moduleId;
	private string $description;
	private string $preferences;

	public function setModuleAclId(int $moduleAclId): void
	{
		$this->moduleAclId = $moduleAclId;
	}

	public function getModuleAclId(): int
	{
		return $this->moduleAclId;
	}

	public function setModuleId(int $moduleId): void
	{
		$this->moduleId = $moduleId;
	}

	public function getModuleId(): int
	{
		return $this->moduleId;
	}

	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function setPreferences(string $preferences): void
	{
		$this->preferences = $preferences;
	}

	public function getPreferences(): string
	{
		return $this->preferences;
	}


}