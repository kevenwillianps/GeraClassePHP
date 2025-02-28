<?php

namespace src\controller;

class Messages {

	private int $messageId;
	private int $fromId;
	private int $toId;
	private string $table;
	private int $registerId;
	private int $viewed;
	private string $data;
	private \DateTime $dateRegister;

	public function setMessageId(int $messageId): void
	{
		$this->messageId = $messageId;
	}

	public function getMessageId(): int
	{
		return $this->messageId;
	}

	public function setFromId(int $fromId): void
	{
		$this->fromId = $fromId;
	}

	public function getFromId(): int
	{
		return $this->fromId;
	}

	public function setToId(int $toId): void
	{
		$this->toId = $toId;
	}

	public function getToId(): int
	{
		return $this->toId;
	}

	public function setTable(string $table): void
	{
		$this->table = $table;
	}

	public function getTable(): string
	{
		return $this->table;
	}

	public function setRegisterId(int $registerId): void
	{
		$this->registerId = $registerId;
	}

	public function getRegisterId(): int
	{
		return $this->registerId;
	}

	public function setViewed(int $viewed): void
	{
		$this->viewed = $viewed;
	}

	public function getViewed(): int
	{
		return $this->viewed;
	}

	public function setData(string $data): void
	{
		$this->data = $data;
	}

	public function getData(): string
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