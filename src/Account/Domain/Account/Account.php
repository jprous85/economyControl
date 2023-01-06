<?php

declare(strict_types=1);

namespace Src\Account\Domain\Account;

use Carbon\Carbon;

use JsonException;
use Ramsey\Uuid\Uuid;
use Src\Account\Domain\Account\ValueObjects\AccountDescriptionVO;
use Src\Account\Domain\Account\ValueObjects\AccountIdVO;
use Src\Account\Domain\Account\ValueObjects\AccountNameVO;
use Src\Account\Domain\Account\ValueObjects\AccountOwnersAccountVO;
use Src\Account\Domain\Account\ValueObjects\AccountUsersVO;
use Src\Account\Domain\Account\ValueObjects\AccountActiveVO;
use Src\Account\Domain\Account\ValueObjects\AccountCreatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUpdatedAtVO;
use Src\Account\Domain\Account\ValueObjects\AccountUuidVO;


final class Account
{
    public function __construct(
        private AccountIdVO            $id,
        private AccountUuidVO          $uuid,
        private AccountNameVO          $name,
        private AccountDescriptionVO   $description,
        private AccountUsersVO         $users,
        private AccountOwnersAccountVO $accountOwnersAccount,
        private AccountActiveVO        $active,
        private ?AccountCreatedAtVO    $created_at,
        private ?AccountUpdatedAtVO    $updated_at,

    )
    {
    }

    public static function create(
        AccountNameVO          $name,
        AccountDescriptionVO   $description,
        AccountUsersVO         $users,
        AccountOwnersAccountVO $accountOwnersAccount
    ): Account
    {
        return new self(
            new AccountIdVO(null),
            new AccountUuidVO(Uuid::uuid4()->toString()),
            $name,
            $description,
            $users,
            $accountOwnersAccount,
            new AccountActiveVO(1),
            new AccountCreatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s')),
            new AccountUpdatedAtVO(null)
        );
    }

    public function update(
        AccountNameVO          $name,
        AccountDescriptionVO   $description,
        AccountActiveVO        $active
    ): void
    {
        $this->name                 = $name;
        $this->description          = $description;
        $this->active               = $active;

        $this->updatedAt();
    }

    public function getPrimitives(): array
    {
        return [
            'id'             => $this->getId()->value(),
            'uuid'           => $this->getUuid()->value(),
            'name'           => $this->getName()->value(),
            'description'    => $this->getDescription()->value(),
            'users'          => $this->getUsers()->value(),
            'owners_account' => $this->getOwnersAccount()->value(),
            'active'         => $this->getActive()->value(),
            'created_at'     => $this->getCreatedAt()->value(),
            'updated_at'     => $this->getUpdatedAt()->value()
        ];
    }

    /**
     * Getters
     */
    public function getId(): AccountIdVO
    {
        return $this->id;
    }

    public function getUuid(): AccountUuidVO
    {
        return $this->uuid;
    }

    public function getName(): AccountNameVO
    {
        return $this->name;
    }

    public function getDescription(): AccountDescriptionVO
    {
        return $this->description;
    }

    public function getUsers(): AccountUsersVO
    {
        return $this->users;
    }

    public function getOwnersAccount(): AccountOwnersAccountVO
    {
        return $this->accountOwnersAccount;
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

    /**
     * @throws JsonException
     */
    public function insertUser(int $userId)
    {
        $arrayUsers = json_decode($this->getUsers()->value(), false, FILTER_FLAG_STRIP_BACKTICK, JSON_THROW_ON_ERROR);

        if (!in_array($userId, $arrayUsers)) {
            $arrayUsers[] = $userId;
            sort($arrayUsers);
            $this->users = new AccountUsersVO(json_encode(array_values($arrayUsers)));
            $this->updatedAt();
        }
    }

    /**
     * @throws JsonException
     */
    public function deleteUser(int $userId): void
    {
        $arrayUsers = json_decode($this->getUsers()->value(), false, FILTER_FLAG_STRIP_BACKTICK, JSON_THROW_ON_ERROR);

        if (count($arrayUsers) > 1) {
            if (($key = array_search($userId, $arrayUsers)) !== false) {
                unset($arrayUsers[$key]);
            }
            $this->users = new AccountUsersVO(json_encode(array_values($arrayUsers)));
            $this->updatedAt();
        }
    }

    /**
     * @throws JsonException
     */
    public function insertOwner(int $userId)
    {
        $arrayOwners = json_decode($this->getOwnersAccount()->value(), false, FILTER_FLAG_STRIP_BACKTICK, JSON_THROW_ON_ERROR);

        if (!in_array($userId, $arrayOwners)) {
            $arrayOwners[] = $userId;
            sort($arrayOwners);
            $this->accountOwnersAccount = new AccountOwnersAccountVO(json_encode(array_values($arrayOwners)));
            $this->updatedAt();
        }
    }

    /**
     * @throws JsonException
     */
    public function deleteOwner(int $userId): void
    {
        $arrayOwners = json_decode($this->getOwnersAccount()->value(), false, FILTER_FLAG_STRIP_BACKTICK, JSON_THROW_ON_ERROR);

        if (count($arrayOwners) > 1) {
            if (($key = array_search($userId, $arrayOwners)) !== false) {
                unset($arrayOwners[$key]);
            }
            $this->accountOwnersAccount = new AccountOwnersAccountVO(json_encode(array_values($arrayOwners)));
            $this->updatedAt();
        }
    }

    private function updatedAt()
    {
        $this->updated_at = new AccountUpdatedAtVO(Carbon::now('Europe/Madrid')->format('Y-m-d H:i:s'));
    }

}
