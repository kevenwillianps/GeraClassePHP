<?php

namespace src\controller;

class Arquivos {

	private int $arquivoId;
	private int $registroId;
	private string $tabela;
	private string $nome;
	private string $descricao;
	private string $caminho;

	public function setArquivoId(int $arquivoId): void
	{
		$this->arquivoId = $arquivoId;
	}

	public function getArquivoId(): int
	{
		return $this->arquivoId;
	}

	public function setRegistroId(int $registroId): void
	{
		$this->registroId = $registroId;
	}

	public function getRegistroId(): int
	{
		return $this->registroId;
	}

	public function setTabela(string $tabela): void
	{
		$this->tabela = $tabela;
	}

	public function getTabela(): string
	{
		return $this->tabela;
	}

	public function setNome(string $nome): void
	{
		$this->nome = $nome;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	public function setDescricao(string $descricao): void
	{
		$this->descricao = $descricao;
	}

	public function getDescricao(): string
	{
		return $this->descricao;
	}

	public function setCaminho(string $caminho): void
	{
		$this->caminho = $caminho;
	}

	public function getCaminho(): string
	{
		return $this->caminho;
	}


}