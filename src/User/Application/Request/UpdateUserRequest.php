<?php

namespace Src\User\Application\Request;

class UpdateUserRequest
{
    public function __construct(
		private int $role_id,
		private string $name,
		private ?string $first_surname,
		private ?string $second_surname,
		private string $email,
		private ?int $age,
		private ?string $gender,
		private string $lang,
		private int $active,
		private int $verified
    )
    {
    }

	public function getRoleId(): int {
		return $this->role_id;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getFirstSurname(): ?string {
		return $this->first_surname;
	}

	public function getSecondSurname(): ?string {
		return $this->second_surname;
	}

	public function getEmail(): string {
		return $this->email;
	}

	public function getAge(): ?int {
		return $this->age;
	}

	public function getGender(): ?string {
		return $this->gender;
	}

	public function getLang(): string {
		return $this->lang;
	}

	public function getActive(): int {
		return $this->active;
	}

	public function getVerified(): int {
		return $this->verified;
	}

}
