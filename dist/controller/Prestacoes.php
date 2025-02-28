<?php

namespace src\controller;

class Prestacoes {

	private int $prestacaoId;
	private int $intimacaoId;
	private string $numero;
	private \DateTime $data;
	private float $valor;

	public function setPrestacaoId(int $prestacaoId): void
	{
		$this->prestacaoId = $prestacaoId;
	}

	public function getPrestacaoId(): int
	{
		return $this->prestacaoId;
	}

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setNumero(string $numero): void
	{
		$this->numero = $numero;
	}

	public function getNumero(): string
	{
		return $this->numero;
	}

	public function setData(\DateTime $data): void
	{
		$this->data = $data;
	}

	public function getData(): \DateTime
	{
		return $this->data;
	}

	public function setValor(float $valor): void
	{
		$this->valor = $valor;
	}

	public function getValor(): float
	{
		return $this->valor;
	}


}