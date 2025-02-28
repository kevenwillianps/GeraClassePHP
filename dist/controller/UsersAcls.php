<?php

namespace src\controller;

class Users_acls {

	private int $userAclId;
	private int $moduleAclId;
	private int $userId;

	public function setUserAclId(int $userAclId): void
	{
		$this->userAclId = $userAclId;
	}

	public function getUserAclId(): int
	{
		return $this->userAclId;
	}

	public function setModuleAclId(int $moduleAclId): void
	{
		$this->moduleAclId = $moduleAclId;
	}

	public function getModuleAclId(): int
	{
		return $this->moduleAclId;
	}

	public function setUserId(int $userId): void
	{
		$this->userId = $userId;
	}

	public function getUserId(): int
	{
		return $this->userId;
	}


}