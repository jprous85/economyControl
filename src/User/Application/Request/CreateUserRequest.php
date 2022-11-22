<?php

namespace Src\User\Application\Request;

class CreateUserRequest
{
    public function __construct(
		private string $uuid,
		private int $role_id,
		private string $name,
		private ?string $first_surname,
		private ?string $second_surname,
		private string $email,
		private ?int $age,
		private ?string $gender,
		private string $password,
		private string $lang,
    )
    {
    }


	public function getUuid(): string {
		return $this->uuid;
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

	public function getPassword(): string {
		return $this->password;
	}

	public function getLang(): string {
		return $this->lang;
	}

}
