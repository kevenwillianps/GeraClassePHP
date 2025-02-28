<?php

namespace src\controller;

class Intimacao {

	private int $intimacaoId;
	private int $companyId;
	private int $situationId;
	private int $usersIdCreate;
	private int $usersIdUpdate;
	private int $usersIdDelete;
	private string $prenotacao;
	private string $protocolo;
	private string $idsialf;
	private string $nrcontrato;
	private \DateTime $dtcontrato;
	private \DateTime $dtass;
	private string $idri;
	private string $agencia;
	private string $endereco;
	private \DateTime $dataCadastro;
	private \DateTime $dataUpdate;
	private \DateTime $dataDelete;
	private string $situacao;
	private string $cartorioEstado;
	private string $cartorioCidade;
	private string $cartorioNome;

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setCompanyId(int $companyId): void
	{
		$this->companyId = $companyId;
	}

	public function getCompanyId(): int
	{
		return $this->companyId;
	}

	public function setSituationId(int $situationId): void
	{
		$this->situationId = $situationId;
	}

	public function getSituationId(): int
	{
		return $this->situationId;
	}

	public function setUsersIdCreate(int $usersIdCreate): void
	{
		$this->usersIdCreate = $usersIdCreate;
	}

	public function getUsersIdCreate(): int
	{
		return $this->usersIdCreate;
	}

	public function setUsersIdUpdate(int $usersIdUpdate): void
	{
		$this->usersIdUpdate = $usersIdUpdate;
	}

	public function getUsersIdUpdate(): int
	{
		return $this->usersIdUpdate;
	}

	public function setUsersIdDelete(int $usersIdDelete): void
	{
		$this->usersIdDelete = $usersIdDelete;
	}

	public function getUsersIdDelete(): int
	{
		return $this->usersIdDelete;
	}

	public function setPrenotacao(string $prenotacao): void
	{
		$this->prenotacao = $prenotacao;
	}

	public function getPrenotacao(): string
	{
		return $this->prenotacao;
	}

	public function setProtocolo(string $protocolo): void
	{
		$this->protocolo = $protocolo;
	}

	public function getProtocolo(): string
	{
		return $this->protocolo;
	}

	public function setIdsialf(string $idsialf): void
	{
		$this->idsialf = $idsialf;
	}

	public function getIdsialf(): string
	{
		return $this->idsialf;
	}

	public function setNrcontrato(string $nrcontrato): void
	{
		$this->nrcontrato = $nrcontrato;
	}

	public function getNrcontrato(): string
	{
		return $this->nrcontrato;
	}

	public function setDtcontrato(\DateTime $dtcontrato): void
	{
		$this->dtcontrato = $dtcontrato;
	}

	public function getDtcontrato(): \DateTime
	{
		return $this->dtcontrato;
	}

	public function setDtass(\DateTime $dtass): void
	{
		$this->dtass = $dtass;
	}

	public function getDtass(): \DateTime
	{
		return $this->dtass;
	}

	public function setIdri(string $idri): void
	{
		$this->idri = $idri;
	}

	public function getIdri(): string
	{
		return $this->idri;
	}

	public function setAgencia(string $agencia): void
	{
		$this->agencia = $agencia;
	}

	public function getAgencia(): string
	{
		return $this->agencia;
	}

	public function setEndereco(string $endereco): void
	{
		$this->endereco = $endereco;
	}

	public function getEndereco(): string
	{
		return $this->endereco;
	}

	public function setDataCadastro(\DateTime $dataCadastro): void
	{
		$this->dataCadastro = $dataCadastro;
	}

	public function getDataCadastro(): \DateTime
	{
		return $this->dataCadastro;
	}

	public function setDataUpdate(\DateTime $dataUpdate): void
	{
		$this->dataUpdate = $dataUpdate;
	}

	public function getDataUpdate(): \DateTime
	{
		return $this->dataUpdate;
	}

	public function setDataDelete(\DateTime $dataDelete): void
	{
		$this->dataDelete = $dataDelete;
	}

	public function getDataDelete(): \DateTime
	{
		return $this->dataDelete;
	}

	public function setSituacao(string $situacao): void
	{
		$this->situacao = $situacao;
	}

	public function getSituacao(): string
	{
		return $this->situacao;
	}

	public function setCartorioEstado(string $cartorioEstado): void
	{
		$this->cartorioEstado = $cartorioEstado;
	}

	public function getCartorioEstado(): string
	{
		return $this->cartorioEstado;
	}

	public function setCartorioCidade(string $cartorioCidade): void
	{
		$this->cartorioCidade = $cartorioCidade;
	}

	public function getCartorioCidade(): string
	{
		return $this->cartorioCidade;
	}

	public function setCartorioNome(string $cartorioNome): void
	{
		$this->cartorioNome = $cartorioNome;
	}

	public function getCartorioNome(): string
	{
		return $this->cartorioNome;
	}


}