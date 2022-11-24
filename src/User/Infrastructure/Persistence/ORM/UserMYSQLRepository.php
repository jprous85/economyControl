<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Persistence\ORM;

use http\Exception\InvalidArgumentException;
use Src\User\Domain\User\Exceptions\InvalidArgumentUserException;
use Src\User\Domain\User\Exceptions\UserNotFoundException;
use Src\User\Domain\User\User;
use Src\User\Domain\User\Repositories\UserRepository;

use Src\User\Domain\User\ValueObjects\UserIdVO;
use Src\User\Infrastructure\Adapter\UserAdapter;


final class UserMYSQLRepository implements UserRepository
{

    public function __construct(private UserORMModel $model)
    {
    }

    /**
     * @throws UserNotFoundException
     */
    public function show(UserIdVO $id): ?User
    {
        $eloquent_user = $this->model->find($id->value());
        if (!$eloquent_user) {
            throw new UserNotFoundException($id->value());
        }
        return (new UserAdapter($eloquent_user))->userModelAdapter();
    }

    public function showAll(): array
    {
        $eloquent_users = $this->model->all();

        $users               = [];
        foreach ($eloquent_users as $eloquent_user) {
            $users[] = (new UserAdapter($eloquent_user))->userModelAdapter();
        }
        return $users;
    }

    public function getAccountUsers(array $users): array
    {
        if (count($users) === 0) {
            throw new InvalidArgumentUserException();
        }

        $eloquent_users = $this->model;
        foreach ($users as $user) {
            $eloquent_users = $eloquent_users->orWhere('id', $user);
        }
        $eloquent_users = $eloquent_users->get();

        $users               = [];
        foreach ($eloquent_users as $eloquent_user) {
            $users[] = (new UserAdapter($eloquent_user))->userModelAdapter();
        }
        return $users;
    }

    public function save(User $user): UserIdVO
    {
        $response = $this->model->create($user->getPrimitives());
        return new UserIdVO($response->id);
    }

    public function update(User $user): void
    {
        $update_user = $this->model->find($user->getId()->value());
        $update_user->update($user->getPrimitives());

    }

    public function delete(UserIdVO $id): void
    {
        $user = $this->model->find($id->value());
        $user->delete();
    }
}
