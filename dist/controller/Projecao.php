<?php

namespace src\controller;

class Projecao {

	private int $id;
	private int $intimacaoId;
	private string $nomeprojecao;

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

	public function setNomeprojecao(string $nomeprojecao): void
	{
		$this->nomeprojecao = $nomeprojecao;
	}

	public function getNomeprojecao(): string
	{
		return $this->nomeprojecao;
	}


}