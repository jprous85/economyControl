<?php

namespace Src\User\Application\Request;

class CreateUserRequest
{
    public function __construct(
		private int $id,
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
		private string $api_key,
		private ?string $email_verified_at,
		private ?string $remember_token,
		private ?string $last_login,
		private int $active,
		private int $verified,
		private ?string $created_at,
		private ?string $updated_at
    )
    {
    }

	public function getId(): int {
		return $this->id;
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

	public function getApiKey(): string {
		return $this->api_key;
	}

	public function getEmailVerifiedAt(): ?string {
		return $this->email_verified_at;
	}

	public function getRememberToken(): ?string {
		return $this->remember_token;
	}

	public function getLastLogin(): ?string {
		return $this->last_login;
	}

	public function getActive(): int {
		return $this->active;
	}

	public function getVerified(): int {
		return $this->verified;
	}

	public function getCreatedAt(): ?string {
		return $this->created_at;
	}

	public function getUpdatedAt(): ?string {
		return $this->updated_at;
	}


}
