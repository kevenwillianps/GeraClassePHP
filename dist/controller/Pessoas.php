<?php

namespace src\controller;

class Pessoas {

	private int $pessoaId;
	private int $pessoaTipoId;
	private int $companyId;
	private int $intimacaoId;
	private string $nome;
	private string $cpfCnpj;
	private string $participacao;
	private string $inscricaoMunicipal;
	private string $tipoLogradouro;
	private string $endereco;
	private string $numero;
	private string $complemento;
	private string $bairro;
	private string $cidade;
	private string $uf;
	private string $cep;
	private string $ddd;
	private string $telefone;
	private string $email;

	public function setPessoaId(int $pessoaId): void
	{
		$this->pessoaId = $pessoaId;
	}

	public function getPessoaId(): int
	{
		return $this->pessoaId;
	}

	public function setPessoaTipoId(int $pessoaTipoId): void
	{
		$this->pessoaTipoId = $pessoaTipoId;
	}

	public function getPessoaTipoId(): int
	{
		return $this->pessoaTipoId;
	}

	public function setCompanyId(int $companyId): void
	{
		$this->companyId = $companyId;
	}

	public function getCompanyId(): int
	{
		return $this->companyId;
	}

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setNome(string $nome): void
	{
		$this->nome = $nome;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	public function setCpfCnpj(string $cpfCnpj): void
	{
		$this->cpfCnpj = $cpfCnpj;
	}

	public function getCpfCnpj(): string
	{
		return $this->cpfCnpj;
	}

	public function setParticipacao(string $participacao): void
	{
		$this->participacao = $participacao;
	}

	public function getParticipacao(): string
	{
		return $this->participacao;
	}

	public function setInscricaoMunicipal(string $inscricaoMunicipal): void
	{
		$this->inscricaoMunicipal = $inscricaoMunicipal;
	}

	public function getInscricaoMunicipal(): string
	{
		return $this->inscricaoMunicipal;
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

	public function setCidade(string $cidade): void
	{
		$this->cidade = $cidade;
	}

	public function getCidade(): string
	{
		return $this->cidade;
	}

	public function setUf(string $uf): void
	{
		$this->uf = $uf;
	}

	public function getUf(): string
	{
		return $this->uf;
	}

	public function setCep(string $cep): void
	{
		$this->cep = $cep;
	}

	public function getCep(): string
	{
		return $this->cep;
	}

	public function setDdd(string $ddd): void
	{
		$this->ddd = $ddd;
	}

	public function getDdd(): string
	{
		return $this->ddd;
	}

	public function setTelefone(string $telefone): void
	{
		$this->telefone = $telefone;
	}

	public function getTelefone(): string
	{
		return $this->telefone;
	}

	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	public function getEmail(): string
	{
		return $this->email;
	}


}