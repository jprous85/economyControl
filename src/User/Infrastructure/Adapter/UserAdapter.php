<?php

namespace Src\User\Infrastructure\Adapter;

use Src\User\Domain\User\Repositories\UserAdapterRepository;
use Src\User\Domain\User\User;
use Src\User\Domain\User\ValueObjects\UserActiveVO;
use Src\User\Domain\User\ValueObjects\UserAgeVO;
use Src\User\Domain\User\ValueObjects\UserApiKeyVO;
use Src\User\Domain\User\ValueObjects\UserCreatedAtVO;
use Src\User\Domain\User\ValueObjects\UserEmailVerifiedAtVO;
use Src\User\Domain\User\ValueObjects\UserEmailVO;
use Src\User\Domain\User\ValueObjects\UserFirstSurnameVO;
use Src\User\Domain\User\ValueObjects\UserGenderVO;
use Src\User\Domain\User\ValueObjects\UserIdVO;
use Src\User\Domain\User\ValueObjects\UserLangVO;
use Src\User\Domain\User\ValueObjects\UserLastLoginVO;
use Src\User\Domain\User\ValueObjects\UserNameVO;
use Src\User\Domain\User\ValueObjects\UserPasswordVO;
use Src\User\Domain\User\ValueObjects\UserRememberTokenVO;
use Src\User\Domain\User\ValueObjects\UserRoleIdVO;
use Src\User\Domain\User\ValueObjects\UserSecondSurnameVO;
use Src\User\Domain\User\ValueObjects\UserUpdatedAtVO;
use Src\User\Domain\User\ValueObjects\UserUuidVO;
use Src\User\Domain\User\ValueObjects\UserVerifiedVO;
use Src\User\Infrastructure\Persistence\ORM\UserORMModel;

class UserAdapter implements UserAdapterRepository
{
    public function __construct(
        private UserORMModel $user
    )
    {
    }

    private function getId(): int
    {
        return $this->user['id'];
    }

    private function getUuid(): string
    {
        return $this->user['uuid'];
    }

    private function getRole(): int
    {
        return $this->user['role_id'];
    }

    private function getName(): string
    {
        return $this->user['name'];
    }

    private function getFirstSurname(): ?string
    {
        return $this->user['first_surname'];
    }

    private function getSecondSurname(): ?string
    {
        return $this->user['second_surname'];
    }

    private function getEmail(): string
    {
        return $this->user['email'];
    }

    private function getAge(): ?int
    {
        return $this->user['age'];
    }

    private function getGender(): ?string
    {
        return $this->user['gender'];
    }

    private function getPassword(): string
    {
        return $this->user['password'];
    }

    private function getLang(): string
    {
        return $this->user['lang'];
    }

    private function getApiKey(): string
    {
        return $this->user['api_key'];
    }

    private function getEmailVerifiedAt(): ?string
    {
        return $this->user['email_verified_at'];
    }

    private function getRememberToken(): ?string
    {
        return $this->user['remember_token'];
    }

    private function getLastLogin(): ?string
    {
        return $this->user['last_login'];
    }

    private function getActive(): int
    {
        return $this->user['active'];
    }

    private function getVerified(): int
    {
        return $this->user['verified'];
    }

    private function getCreatedAt(): ?string
    {
        return $this->user['created_at'];
    }

    private function getUpdatedAt(): ?string
    {
        return $this->user['updated_at'];
    }

    public function userModelAdapter(): ?User
    {
        if ($this->user == null) {
            return null;
        }

        return new User(
            new UserIdVO($this->getId()),
            new UserUuidVO($this->getUuid()),
            new UserRoleIdVO($this->getRole()),
            new UserNameVO($this->getName()),
            new UserFirstSurnameVO($this->getFirstSurname()),
            new UserSecondSurnameVO($this->getSecondSurname()),
            new UserEmailVO($this->getEmail()),
            new UserAgeVO($this->getAge()),
            new UserGenderVO($this->getGender()),
            new UserPasswordVO($this->getPassword()),
            new UserLangVO($this->getLang()),
            new UserApiKeyVO($this->getApiKey()),
            new UserEmailVerifiedAtVO($this->getEmailVerifiedAt()),
            new UserRememberTokenVO($this->getRememberToken()),
            new UserLastLoginVO($this->getLastLogin()),
            new UserActiveVO($this->getActive()),
            new UserVerifiedVO($this->getVerified()),
            new UserCreatedAtVO($this->getCreatedAt()),
            new UserUpdatedAtVO($this->getUpdatedAt() ?? ''),
        );
    }

}
