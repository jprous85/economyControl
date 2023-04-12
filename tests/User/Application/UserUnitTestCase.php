<?php

namespace Tests\User\Application;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\Request\ShowUserUuidRequest;
use Src\User\Application\Request\UpdateUserRequest;
use Src\User\Application\Response\UserResponse;
use Src\User\Application\Response\UserResponses;
use Src\User\Application\UseCases\CreateUser;
use Src\User\Application\UseCases\GetAccountUsers;
use Src\User\Application\UseCases\ShowUser;
use Src\User\Application\UseCases\ShowAllUser;
use Src\User\Application\UseCases\ShowUserByUuid;
use Src\User\Application\UseCases\UpdateUser;
use Src\User\Application\UseCases\DeleteUser;
use Src\User\Domain\User\Repositories\UserRepository;

use Src\User\Application\Request\CreateUserRequest;
use Src\User\Application\Request\DeleteUserRequest;

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
use Tests\User\Domain\User\ValueObjects\UserIdVOMother;


use Mockery;
use Mockery\MockInterface;
use Tests\User\Domain\User\UserMother;
use Tests\TestCase;

abstract class UserUnitTestCase extends TestCase
{
    private MockInterface $mock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock = $this->repository();
    }

    protected function shouldCreate(CreateUserRequest $request)
    {
        $user_id = UserIdVOMother::random();
        $this->mock->shouldReceive('save')->andReturn($user_id);

        $creator = new CreateUser($this->mock);
        $creator->__invoke($request);
    }

    protected function shouldFind(ShowUserUuidRequest $request)
    {
        $user = UserMother::random();
        $userResponse = UserResponse::SelfUserResponse($user);

        $this->mock->shouldReceive('byUuid')->andReturn($user);

        $finder = new ShowUserByUuid($this->mock);
        $result = $finder->__invoke($request);

        $this->assertEquals($result, $userResponse);
    }

    protected function shouldFindAll()
    {
        $user1 = UserMother::random();
        $user2 = UserMother::random();

        $userResponse1 = UserResponse::SelfUserResponse($user1);
        $userResponse2 = UserResponse::SelfUserResponse($user2);

        $userResponses = new UserResponses($userResponse1, $userResponse2);

        $this->mock->shouldReceive('showAll')->andReturns([$user1, $user2]);

        $finder = new ShowAllUser($this->mock);
        $result = $finder->__invoke();

        $this->assertEquals($result, $userResponses);
    }

    protected function shouldGetAccountUsers(array $users)
    {
        $user1 = UserMother::random();
        $user2 = UserMother::random();
        $user3 = UserMother::random();

        $userResponse1 = UserResponse::SelfUserResponse($user1);
        $userResponse2 = UserResponse::SelfUserResponse($user2);
        $userResponse3 = UserResponse::SelfUserResponse($user3);

        $userResponses = new UserResponses($userResponse1, $userResponse2, $userResponse3);

        $this->mock->shouldReceive('getAccountUsers')->andReturn([$user1, $user2, $user3]);
        $finder = new GetAccountUsers($this->mock);
        $result = $finder->__invoke($users);

        $this->assertEquals($result, $userResponses);
    }

    protected function shouldUpdate(int $id, UpdateUserRequest $request)
    {
        $user_mother = UserMother::random();
        $this->mock->shouldReceive('show')->andReturn($user_mother);

        $this->mock->shouldReceive('update');

        $update = new UpdateUser($this->mock);
        $update->__invoke($id, $request);
    }

    protected function shouldDelete(DeleteUserRequest $id)
    {
        $user = UserMother::random();

        $this->mock->shouldReceive('show')->andReturns($user);
        $this->mock->shouldReceive('delete');

        $delete = new DeleteUser($this->mock);
        $delete->__invoke($id);
    }

    private function repository(): MockInterface|UserRepository
    {
        return Mockery::mock(UserRepository::class);
    }
}
