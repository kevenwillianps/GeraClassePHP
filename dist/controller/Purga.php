<?php

namespace src\controller;

class Purga {

	private int $purgaId;
	private int $intimacaoId;
	private \DateTime $dataPagamento;
	private float $valorTotal;

	public function setPurgaId(int $purgaId): void
	{
		$this->purgaId = $purgaId;
	}

	public function getPurgaId(): int
	{
		return $this->purgaId;
	}

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setDataPagamento(\DateTime $dataPagamento): void
	{
		$this->dataPagamento = $dataPagamento;
	}

	public function getDataPagamento(): \DateTime
	{
		return $this->dataPagamento;
	}

	public function setValorTotal(float $valorTotal): void
	{
		$this->valorTotal = $valorTotal;
	}

	public function getValorTotal(): float
	{
		return $this->valorTotal;
	}


}