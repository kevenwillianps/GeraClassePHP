<?php

namespace src\controller;

class Logs {

	private int $logId;
	private int $logTypeId;
	private int $companyId;
	private int $userId;
	private int $parentId;
	private int $registerId;
	private string $request;
	private string $hash;
	private json $data;
	private \DateTime $dateRegister;

	public function setLogId(int $logId): void
	{
		$this->logId = $logId;
	}

	public function getLogId(): int
	{
		return $this->logId;
	}

	public function setLogTypeId(int $logTypeId): void
	{
		$this->logTypeId = $logTypeId;
	}

	public function getLogTypeId(): int
	{
		return $this->logTypeId;
	}

	public function setCompanyId(int $companyId): void
	{
		$this->companyId = $companyId;
	}

	public function getCompanyId(): int
	{
		return $this->companyId;
	}

	public function setUserId(int $userId): void
	{
		$this->userId = $userId;
	}

	public function getUserId(): int
	{
		return $this->userId;
	}

	public function setParentId(int $parentId): void
	{
		$this->parentId = $parentId;
	}

	public function getParentId(): int
	{
		return $this->parentId;
	}

	public function setRegisterId(int $registerId): void
	{
		$this->registerId = $registerId;
	}

	public function getRegisterId(): int
	{
		return $this->registerId;
	}

	public function setRequest(string $request): void
	{
		$this->request = $request;
	}

	public function getRequest(): string
	{
		return $this->request;
	}

	public function setHash(string $hash): void
	{
		$this->hash = $hash;
	}

	public function getHash(): string
	{
		return $this->hash;
	}

	public function setData(json $data): void
	{
		$this->data = $data;
	}

	public function getData(): json
	{
		return $this->data;
	}

	public function setDateRegister(\DateTime $dateRegister): void
	{
		$this->dateRegister = $dateRegister;
	}

	public function getDateRegister(): \DateTime
	{
		return $this->dateRegister;
	}


}