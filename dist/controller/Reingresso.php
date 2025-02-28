<?php

namespace src\controller;

class Reingresso {

	private int $reingressoId;
	private int $intimacaoId;
	private string $protocolo;
	private \DateTime $protocoloData;

	public function setReingressoId(int $reingressoId): void
	{
		$this->reingressoId = $reingressoId;
	}

	public function getReingressoId(): int
	{
		return $this->reingressoId;
	}

	public function setIntimacaoId(int $intimacaoId): void
	{
		$this->intimacaoId = $intimacaoId;
	}

	public function getIntimacaoId(): int
	{
		return $this->intimacaoId;
	}

	public function setProtocolo(string $protocolo): void
	{
		$this->protocolo = $protocolo;
	}

	public function getProtocolo(): string
	{
		return $this->protocolo;
	}

	public function setProtocoloData(\DateTime $protocoloData): void
	{
		$this->protocoloData = $protocoloData;
	}

	public function getProtocoloData(): \DateTime
	{
		return $this->protocoloData;
	}


}