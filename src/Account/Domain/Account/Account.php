<?php

declare(strict_types=1);

namespace Src\Account\Domain\Account;

use Carbon\Carbon;

use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;


final class Account
{
    public function __construct(
        private AccountIdVO         $id,
        private AccountNameVO       $name,
        private AccountUsersVO      $users,
        private AccountActiveVO     $active,
        private ?AccountCreatedAtVO $created_at,
        private ?AccountUpdatedAtVO $updated_at,

    )
    {
    }

    public static function create(
        AccountNameVO  $name,
        AccountUsersVO $users
    ): Account
    {
        return new self(
            new AccountIdVO(null),
            $name,
            $users,
            new AccountActiveVO(1),
            new AccountCreatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s')),
            new AccountUpdatedAtVO(null)
        );
    }

    public function update(
        AccountNameVO   $name,
        AccountUsersVO  $users,
        AccountActiveVO $active
    ): void
    {
        $this->name       = $name;
        $this->users      = $users;
        $this->active     = $active;
        $this->updated_at = new AccountUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));
    }

    public function getPrimitives(): array
    {
        return [
            'id'         => $this->getId()->value(),
            'name'       => $this->getName()->value(),
            'users'      => $this->getUsers()->value(),
            'active'     => $this->getActive()->value(),
            'created_at' => $this->getCreatedAt()->value(),
            'updated_at' => $this->getUpdatedAt()->value(),

        ];
    }

    /**
     * Getters
     */
    public function getId(): AccountIdVO
    {
        return $this->id;
    }

    public function getName(): AccountNameVO
    {
        return $this->name;
    }

    public function getUsers(): AccountUsersVO
    {
        return $this->users;
    }

    public function getActive(): AccountActiveVO
    {
        return $this->active;
    }

    public function getCreatedAt(): ?AccountCreatedAtVO
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): ?AccountUpdatedAtVO
    {
        return $this->updated_at;
    }


}
