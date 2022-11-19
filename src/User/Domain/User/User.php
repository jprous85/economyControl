<?php

declare(strict_types=1);

namespace Src\User\Domain\User;

use Carbon\Carbon;
use Src\Role\Domain\Role\Role;

use Src\User\Domain\User\ValueObjects\UserIdVO;
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
        private Role                   $role,
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
        UserIdVO              $id,
        UserUuidVO            $uuid,
        Role                  $role,
        UserNameVO            $name,
        UserFirstSurnameVO    $first_surname,
        UserSecondSurnameVO   $second_surname,
        UserEmailVO           $email,
        UserAgeVO             $age,
        UserGenderVO          $gender,
        UserPasswordVO        $password,
        UserLangVO            $lang,
        UserApiKeyVO          $api_key,
        UserEmailVerifiedAtVO $email_verified_at,
        UserRememberTokenVO   $remember_token,
        UserLastLoginVO       $last_login,
        UserActiveVO          $active,
        UserVerifiedVO        $verified,
        UserCreatedAtVO       $created_at,
        UserUpdatedAtVO       $updated_at,

    ): User
    {
        $user = new self(
            $id,
            $uuid,
            $role,
            $name,
            $first_surname,
            $second_surname,
            $email,
            $age,
            $gender,
            $password,
            $lang,
            $api_key,
            $email_verified_at,
            $remember_token,
            $last_login,
            $active,
            $verified,
            $created_at,
            $updated_at,

        );

        return $user;
    }

    public function update(
        UserIdVO              $id,
        UserUuidVO            $uuid,
        Role                  $role,
        UserNameVO            $name,
        UserFirstSurnameVO    $first_surname,
        UserSecondSurnameVO   $second_surname,
        UserEmailVO           $email,
        UserAgeVO             $age,
        UserGenderVO          $gender,
        UserPasswordVO        $password,
        UserLangVO            $lang,
        UserApiKeyVO          $api_key,
        UserEmailVerifiedAtVO $email_verified_at,
        UserRememberTokenVO   $remember_token,
        UserLastLoginVO       $last_login,
        UserActiveVO          $active,
        UserVerifiedVO        $verified,
        UserCreatedAtVO       $created_at,
        UserUpdatedAtVO       $updated_at,

    ): void
    {
        $this->id                = $id;
        $this->uuid              = $uuid;
        $this->role              = $role;
        $this->name              = $name;
        $this->first_surname     = $first_surname;
        $this->second_surname    = $second_surname;
        $this->email             = $email;
        $this->age               = $age;
        $this->gender            = $gender;
        $this->password          = $password;
        $this->lang              = $lang;
        $this->api_key           = $api_key;
        $this->email_verified_at = $email_verified_at;
        $this->remember_token    = $remember_token;
        $this->last_login        = $last_login;
        $this->active            = $active;
        $this->verified          = $verified;
        $this->created_at        = $created_at;
        $this->updated_at        = $updated_at;
    }

    public function getPrimitives(): array
    {
        return [
            'id'                => $this->getId()->value(),
            'uuid'              => $this->getUuid()->value(),
            'name'              => $this->getName()->value(),
            'first_surname'     => $this->getFirstSurname()->value(),
            'second_surname'    => $this->getSecondSurname()->value(),
            'email'             => $this->getEmail()->value(),
            'age'               => $this->getAge()->value(),
            'gender'            => $this->getGender()->value(),
            'password'          => $this->getPassword()->value(),
            'lang'              => $this->getLang()->value(),
            'api_key'           => $this->getApiKey()->value(),
            'email_verified_at' => $this->getEmailVerifiedAt()->value(),
            'remember_token'    => $this->getRememberToken()->value(),
            'last_login'        => $this->getLastLogin()->value(),
            'active'            => $this->getActive()->value(),
            'verified'          => $this->getVerified()->value(),
            'created_at'        => $this->getCreatedAt()->value(),
            'updated_at'        => $this->getUpdatedAt()->value(),

        ];
    }

    /**
     * Getters
     */
    public function getId(): UserIdVO
    {
        return $this->id;
    }

    public function getUuid(): UserUuidVO
    {
        return $this->uuid;
    }

    public function getRole(): Role
    {
        return $this->role;
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
        $currentDate = Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s');
        $this->last_login = new UserLastLoginVO($currentDate);
    }


}
