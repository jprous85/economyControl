<?php

declare(strict_types=1);


namespace Src\Role\Infrastructure\Adapter;


use Carbon\Carbon;
use Src\Role\Domain\Role\Repositories\RoleAdapterRepository;
use Src\Role\Domain\Role\Role;
use Src\Role\Domain\Role\ValueObjects\RoleActiveVO;
use Src\Role\Domain\Role\ValueObjects\RoleCreatedAtVO;
use Src\Role\Domain\Role\ValueObjects\RoleIdVO;
use Src\Role\Domain\Role\ValueObjects\RoleNameVO;
use Src\Role\Domain\Role\ValueObjects\RoleUpdatedAtVO;
use Src\Role\Infrastructure\Persistence\ORM\RoleORMModel;

final class RoleAdapter implements RoleAdapterRepository
{

    public function __construct(private RoleORMModel $role)
    {
    }

    private function getId(): int {
        return $this->role['id'];
    }

    private function getName(): string {
        return $this->role['name'];
    }

    private function getActive(): int {
        return $this->role['active'];
    }

    private function getCreatedAt(): ?string {
        return ''; //$this->role['created_at'];
    }

    private function getUpdatedAt(): ?string {
        return $this->role['updated_at'];
    }

    public function roleModelAdapter(): ?Role
    {
        return new Role(
            new RoleIdVO($this->getId()),
            new RoleNameVO($this->getName()),
            new RoleActiveVO($this->getActive()),
            new RoleCreatedAtVO($this->getCreatedAt()),
            new RoleUpdatedAtVO($this->getUpdatedAt() ?? ''),
        );
    }
}
