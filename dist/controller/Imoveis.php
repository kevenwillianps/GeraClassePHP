<?php

namespace src\controller;

class Imoveis {

	private int $imovelId;
	private int $intimacaoId;
	private string $cpfCnpjParticipante;
	private string $matricula;
	private string $registroTranscricao;
	private string $endereco;
	private string $numero;
	private string $complemento;
	private string $bairro;
	private string $enderecoAntigo;
	private string $numeroAntigo;
	private string $complementoAntigo;
	private string $bairroAntigo;

	public function setImovelId(int $imovelId): void
	{
		$this->imovelId = $imovelId;
	}

	public function getImovelId(): int
	{
		return $this->imovelId;
	}

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setCpfCnpjParticipante(string $cpfCnpjParticipante): void
	{
		$this->cpfCnpjParticipante = $cpfCnpjParticipante;
	}

	public function getCpfCnpjParticipante(): string
	{
		return $this->cpfCnpjParticipante;
	}

	public function setMatricula(string $matricula): void
	{
		$this->matricula = $matricula;
	}

	public function getMatricula(): string
	{
		return $this->matricula;
	}

	public function setRegistroTranscricao(string $registroTranscricao): void
	{
		$this->registroTranscricao = $registroTranscricao;
	}

	public function getRegistroTranscricao(): string
	{
		return $this->registroTranscricao;
	}

	public function setEndereco(string $endereco): void
	{
		$this->endereco = $endereco;
	}

	public function getEndereco(): string
	{
		return $this->endereco;
	}

	public function setNumero(string $numero): void
	{
		$this->numero = $numero;
	}

	public function getNumero(): string
	{
		return $this->numero;
	}

	public function setComplemento(string $complemento): void
	{
		$this->complemento = $complemento;
	}

	public function getComplemento(): string
	{
		return $this->complemento;
	}

	public function setBairro(string $bairro): void
	{
		$this->bairro = $bairro;
	}

	public function getBairro(): string
	{
		return $this->bairro;
	}

	public function setEnderecoAntigo(string $enderecoAntigo): void
	{
		$this->enderecoAntigo = $enderecoAntigo;
	}

	public function getEnderecoAntigo(): string
	{
		return $this->enderecoAntigo;
	}

	public function setNumeroAntigo(string $numeroAntigo): void
	{
		$this->numeroAntigo = $numeroAntigo;
	}

	public function getNumeroAntigo(): string
	{
		return $this->numeroAntigo;
	}

	public function setComplementoAntigo(string $complementoAntigo): void
	{
		$this->complementoAntigo = $complementoAntigo;
	}

	public function getComplementoAntigo(): string
	{
		return $this->complementoAntigo;
	}

	public function setBairroAntigo(string $bairroAntigo): void
	{
		$this->bairroAntigo = $bairroAntigo;
	}

	public function getBairroAntigo(): string
	{
		return $this->bairroAntigo;
	}


}