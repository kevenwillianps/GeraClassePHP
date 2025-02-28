<?php

namespace src\controller;

class Users {

	private int $userId;
	private int $companyId;
	private string $name;
	private string $email;
	private string $password;
	private string $position;
	private string $team;
	private string $token;

	public function setUserId(int $userId): void
	{
		$this->userId = $userId;
	}

	public function getUserId(): int
	{
		return $this->userId;
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

	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function setPassword(string $password): void
	{
		$this->password = $password;
	}

	public function getPassword(): string
	{
		return $this->password;
	}

	public function setPosition(string $position): void
	{
		$this->position = $position;
	}

	public function getPosition(): string
	{
		return $this->position;
	}

	public function setTeam(string $team): void
	{
		$this->team = $team;
	}

	public function getTeam(): string
	{
		return $this->team;
	}

	public function setToken(string $token): void
	{
		$this->token = $token;
	}

	public function getToken(): string
	{
		return $this->token;
	}


}