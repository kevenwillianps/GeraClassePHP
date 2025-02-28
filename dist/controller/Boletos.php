<?php

namespace src\controller;

class Boletos {

	private int $boletoId;
	private int $intimacaoId;
	private \DateTime $dataVencimento;
	private float $valor;
	private string $url;
	private string $anexo;

	public function setBoletoId(int $boletoId): void
	{
		$this->boletoId = $boletoId;
	}

	public function getBoletoId(): int
	{
		return $this->boletoId;
	}

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setDataVencimento(\DateTime $dataVencimento): void
	{
		$this->dataVencimento = $dataVencimento;
	}

	public function getDataVencimento(): \DateTime
	{
		return $this->dataVencimento;
	}

	public function setValor(float $valor): void
	{
		$this->valor = $valor;
	}

	public function getValor(): float
	{
		return $this->valor;
	}

	public function setUrl(string $url): void
	{
		$this->url = $url;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function setAnexo(string $anexo): void
	{
		$this->anexo = $anexo;
	}

	public function getAnexo(): string
	{
		return $this->anexo;
	}


}