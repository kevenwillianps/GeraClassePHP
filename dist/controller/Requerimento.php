<?php

namespace src\controller;

class Requerimento {

	private int $id;
	private int $intimacaoId;
	private string $nomeanexo;

	public function setId(int $id): void
	{
		$this->id = $id;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setNomeanexo(string $nomeanexo): void
	{
		$this->nomeanexo = $nomeanexo;
	}

	public function getNomeanexo(): string
	{
		return $this->nomeanexo;
	}


}