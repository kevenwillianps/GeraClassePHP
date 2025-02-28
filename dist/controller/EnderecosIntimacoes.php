<?php

namespace src\controller;

class Enderecos_intimacoes {

	private int $enderecoIntimacaoId;
	private int $intimacaoId;
	private string $cpfCnpjParticipante;
	private string $tipoLogradouro;
	private string $endereco;
	private string $numero;
	private string $complemento;
	private string $bairro;
	private string $municipio;
	private string $estado;
	private string $cep;

	public function setEnderecoIntimacaoId(int $enderecoIntimacaoId): void
	{
		$this->enderecoIntimacaoId = $enderecoIntimacaoId;
	}

	public function getEnderecoIntimacaoId(): int
	{
		return $this->enderecoIntimacaoId;
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

	public function setTipoLogradouro(string $tipoLogradouro): void
	{
		$this->tipoLogradouro = $tipoLogradouro;
	}

	public function getTipoLogradouro(): string
	{
		return $this->tipoLogradouro;
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

	public function setMunicipio(string $municipio): void
	{
		$this->municipio = $municipio;
	}

	public function getMunicipio(): string
	{
		return $this->municipio;
	}

	public function setEstado(string $estado): void
	{
		$this->estado = $estado;
	}

	public function getEstado(): string
	{
		return $this->estado;
	}

	public function setCep(string $cep): void
	{
		$this->cep = $cep;
	}

	public function getCep(): string
	{
		return $this->cep;
	}


}