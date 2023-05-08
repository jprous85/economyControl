<?php

declare(strict_types=1);

namespace Src\User\Domain\User;

use Carbon\Carbon;

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


final class User
{
    public function __construct(
        private UserIdVO               $id,
        private UserUuidVO             $uuid,
        private UserRoleIdVO           $role_id,
        private UserNameVO             $name,
        private ?UserFirstSurnameVO    $first_surname,
        private ?UserSecondSurnameVO   $second_surname,
        private UserEmailVO            $email,
        private ?UserAgeVO             $age,
        private ?UserGenderVO          $gender,
        private UserPasswordVO         $password,
        private UserLangVO             $lang,
        private UserApiKeyVO           $api_key,
        private ?UserEmailVerifiedAtVO $email_verified_at,
        private ?UserRememberTokenVO   $remember_token,
        private ?UserLastLoginVO       $last_login,
        private UserActiveVO           $active,
        private UserVerifiedVO         $verified,
        private ?UserCreatedAtVO       $created_at,
        private ?UserUpdatedAtVO       $updated_at,

    )
    {
    }

    public static function create(
        UserUuidVO          $uuid,
        UserRoleIdVO        $role_id,
        UserNameVO          $name,
        UserFirstSurnameVO  $first_surname,
        UserSecondSurnameVO $second_surname,
        UserEmailVO         $email,
        UserAgeVO           $age,
        UserGenderVO        $gender,
        UserLangVO          $lang,
    ): User
    {
        return new self(
            new UserIdVO(null),
            $uuid,
            $role_id,
            $name,
            $first_surname,
            $second_surname,
            $email,
            $age,
            $gender,
            new UserPasswordVO(bcrypt('password')),
            $lang,
            new UserApiKeyVO(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 11)),
            null,
            null,
            null,
            new UserActiveVO(1),
            new UserVerifiedVO(0),
            new UserCreatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s')),
            new UserUpdatedAtVO(null),
        );
    }

    public function update(
        UserRoleIdVO          $role_id,
        UserNameVO            $name,
        UserFirstSurnameVO    $first_surname,
        UserSecondSurnameVO   $second_surname,
        UserEmailVO           $email,
        UserAgeVO             $age,
        UserGenderVO          $gender,
        UserLangVO            $lang,
        UserActiveVO          $active,
        UserVerifiedVO        $verified,

    ): void
    {
        $this->role_id           = $role_id;
        $this->name              = $name;
        $this->first_surname     = $first_surname;
        $this->second_surname    = $second_surname;
        $this->email             = $email;
        $this->age               = $age;
        $this->gender            = $gender;
        $this->lang              = $lang;
        $this->active            = $active;
        $this->verified          = $verified;
        $this->updated_at        = new UserUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));
    }

    public function getPrimitives(): array
    {
        return [
            'id'                => $this->getId()->value(),
            'uuid'              => $this->getUuid()->value(),
            'role_id'           => $this->getRoleId()->value(),
            'name'              => $this->getName()->value(),
            'first_surname'     => $this->getFirstSurname()->value(),
            'second_surname'    => $this->getSecondSurname()->value(),
            'email'             => $this->getEmail()->value(),
            'age'               => $this->getAge()->value(),
            'gender'            => $this->getGender()->value(),
            'password'          => $this->getPassword()->value(),
            'lang'              => $this->getLang()->value(),
            'last_login'        => $this->getLastLogin()->value(),
            'api_key'           => $this->getApiKey()->value(),
            'active'            => $this->getActive()->value(),
            'verified'          => $this->getVerified()->value(),
            'created_at'        => $this->getCreatedAt()->value(),
            'updated_at'        => $this->getUpdatedAt()->value()
        ];
    }

    /**
     * Getters
     */
    public function getId(): ?UserIdVO
    {
        return $this->id;
    }

    public function getUuid(): UserUuidVO
    {
        return $this->uuid;
    }

    public function getRoleId(): UserRoleIdVO
    {
        return $this->role_id;
    }

    public function getName(): UserNameVO
    {
        return $this->name;
    }

    public function getFirstSurname(): ?UserFirstSurnameVO
    {
        return $this->first_surname;
    }

    public function getSecondSurname(): ?UserSecondSurnameVO
    {
        return $this->second_surname;
    }

    public function getEmail(): UserEmailVO
    {
        return $this->email;
    }

    public function getAge(): ?UserAgeVO
    {
        return $this->age;
    }

    public function getGender(): ?UserGenderVO
    {
        return $this->gender;
    }

    public function getPassword(): UserPasswordVO
    {
        return $this->password;
    }

    public function getLang(): UserLangVO
    {
        return $this->lang;
    }

    public function getApiKey(): UserApiKeyVO
    {
        return $this->api_key;
    }

    public function getEmailVerifiedAt(): ?UserEmailVerifiedAtVO
    {
        return $this->email_verified_at;
    }

    public function getRememberToken(): ?UserRememberTokenVO
    {
        return $this->remember_token;
    }

    public function getLastLogin(): ?UserLastLoginVO
    {
        return $this->last_login;
    }

    public function getActive(): UserActiveVO
    {
        return $this->active;
    }

    public function getVerified(): UserVerifiedVO
    {
        return $this->verified;
    }

    public function getCreatedAt(): ?UserCreatedAtVO
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?UserUpdatedAtVO
    {
        return $this->updated_at;
    }


    public function updateLastLogin()
    {
        $currentDate      = Carbon::now()->format('Y-m-d h:i:s');
        $this->last_login = new UserLastLoginVO($currentDate);
        $this->updated_at = new UserUpdatedAtVO(
            ($this->updated_at->value() !== '') ?
                Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at->value()) :
                null
        );
    }


}
