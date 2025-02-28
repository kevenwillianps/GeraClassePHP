<?php

namespace src\controller;

class Pagamentos {

	private int $pagamentoId;
	private int $intimacaoId;
	private string $descricao;
	private string $protocolo;
	private int $status;
	private \DateTime $dataVencimento;
	private \DateTime $dataEfetivacao;
	private float $valor;

	public function setPagamentoId(int $pagamentoId): void
	{
		$this->pagamentoId = $pagamentoId;
	}

	public function getPagamentoId(): int
	{
		return $this->pagamentoId;
	}

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setDescricao(string $descricao): void
	{
		$this->descricao = $descricao;
	}

	public function getDescricao(): string
	{
		return $this->descricao;
	}

	public function setProtocolo(string $protocolo): void
	{
		$this->protocolo = $protocolo;
	}

	public function getProtocolo(): string
	{
		return $this->protocolo;
	}

	public function setStatus(int $status): void
	{
		$this->status = $status;
	}

	public function getStatus(): int
	{
		return $this->status;
	}

	public function setDataVencimento(\DateTime $dataVencimento): void
	{
		$this->dataVencimento = $dataVencimento;
	}

	public function getDataVencimento(): \DateTime
	{
		return $this->dataVencimento;
	}

	public function setDataEfetivacao(\DateTime $dataEfetivacao): void
	{
		$this->dataEfetivacao = $dataEfetivacao;
	}

	public function getDataEfetivacao(): \DateTime
	{
		return $this->dataEfetivacao;
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