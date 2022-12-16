<?php

declare(strict_types=1);

namespace Src\User\Application\Response;

use Src\User\Domain\User\User;
use Src\User\Domain\User\ValueObjects\UserIdVO;
use Src\User\Domain\User\ValueObjects\UserRoleIdVO;
use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserFirstSurnameVO;
use Src\User\Domain\User\ValueObjects\UserSecondSurnameVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserAgeVO;
use Src\User\Domain\User\ValueObjects\UserGenderVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserLangVO;
use Src\User\Domain\User\ValueObjects\UserApiKeyVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserLastLoginVO;
use Src\User\Domain\User\ValueObjects\UserActiveVO;
use Src\User\Domain\User\ValueObjects\UserVerifiedVO;
use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;


final class UserResponse
{
    public function __construct(
        private ?int     $id,
        private string  $uuid,
        private int     $role,
        private string  $name,
        private ?string $first_surname,
        private ?string $second_surname,
        private string  $email,
        private ?int    $age,
        private ?string $gender,
        private string  $password,
        private string  $lang,
        private string  $api_key,
        private ?string $email_verified_at,
        private ?string $remember_token,
        private ?string $last_login,
        private int     $active,
        private int     $verified,
        private ?string $created_at,
        private ?string $updated_at
    )
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFirstSurname(): ?string
    {
        return $this->first_surname;
    }

    public function getSecondSurname(): ?string
    {
        return $this->second_surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getLang(): string
    {
        return $this->lang;
    }

    public function getApiKey(): string
    {
        return $this->api_key;
    }

    public function getEmailVerifiedAt(): ?string
    {
        return $this->email_verified_at;
    }

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    public function getLastLogin(): ?string
    {
        return $this->last_login;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function getVerified(): int
    {
        return $this->verified;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }


    public function toArray(): array
    {
        return [
            "id"                => $this->id,
            "uuid"              => $this->uuid,
            "role"              => $this->role,
            "name"              => $this->name,
            "first_surname"     => $this->first_surname,
            "second_surname"    => $this->second_surname,
            "email"             => $this->email,
            "age"               => $this->age,
            "gender"            => $this->gender,
            "lang"              => $this->lang,
            "last_login"        => $this->last_login,
            "active"            => $this->active,
            "verified"          => $this->verified,
            "created_at"        => $this->created_at,
            "updated_at"        => $this->updated_at,

        ];
    }

    public static function responseToEntity(self $response): User
    {
        return new User(
            new UserIdVO($response->getId()),
            new UserUuidVO($response->getUuid()),
            new UserRoleIdVO($response->getRole()),
            new UserNameVO($response->getName()),
            new UserFirstSurnameVO($response->getFirstSurname()),
            new UserSecondSurnameVO($response->getSecondSurname()),
            new UserEmailVO($response->getEmail()),
            new UserAgeVO($response->getAge()),
            new UserGenderVO($response->getGender()),
            new UserPasswordVO($response->getPassword()),
            new UserLangVO($response->getLang()),
            new UserApiKeyVO($response->getApiKey()),
            new UserEmailVerifiedAtVO($response->getEmailVerifiedAt()),
            new UserRememberTokenVO($response->getRememberToken()),
            new UserLastLoginVO($response->getLastLogin()),
            new UserActiveVO($response->getActive()),
            new UserVerifiedVO($response->getVerified()),
            new UserCreatedAtVO($response->getCreatedAt()),
            new UserUpdatedAtVO($response->getUpdatedAt()),

        );
    }

    public static function SelfUserResponse($user): self
    {
        return new self(
            $user->getId()->value(),
            $user->getUuid()->value(),
            $user->getRoleId()->value(),
            $user->getName()->value(),
            $user->getFirstSurname()->value(),
            $user->getSecondSurname()->value(),
            $user->getEmail()->value(),
            $user->getAge()->value(),
            $user->getGender()->value(),
            $user->getPassword()->value(),
            $user->getLang()->value(),
            $user->getApiKey()->value(),
            $user->getEmailVerifiedAt()->value(),
            $user->getRememberToken()->value(),
            $user->getLastLogin()->value(),
            $user->getActive()->value(),
            $user->getVerified()->value(),
            $user->getCreatedAt()->value(),
            $user->getUpdatedAt()->value(),
        );
    }

}
