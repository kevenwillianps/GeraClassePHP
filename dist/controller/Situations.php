<?php

namespace src\controller;

class Situations {

	private int $situationId;
	private string $description;

	public function setSituationId(int $situationId): void
	{
		$this->situationId = $situationId;
	}

	public function getSituationId(): int
	{
		return $this->situationId;
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