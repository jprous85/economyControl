<?php

declare(strict_types=1);

namespace Tests\Shared\Infrastructure\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Config;
use Illuminate\Testing\TestResponse;
use Src\User\Infrastructure\Persistence\ORM\UserORMModel;
use Tests\TestCase;

class AcceptTestBase extends TestCase
{
    use WithoutMiddleware;

    protected $faker;

    protected function setUp(): void
    {
        parent::setUp();

        if (Config::get('app.env') == 'production' || Config::get('app.accept_test') == false) {
            $this->markTestSkipped('Those tests are NOT activated, check config file');
        }

        $this->faker = Factory::create();
    }

    protected function httpAction($action, $url, $params = null): TestResponse
    {
        return $this->httpActionResponse($action, $url, $params);
    }

    private function httpActionResponse($action, $url, $params = null): TestResponse
    {
        $url = Config::get('app.url_test') .
               DIRECTORY_SEPARATOR .
               'api' .
               DIRECTORY_SEPARATOR .
               $url;

        $user = UserORMModel::factory()->make();
        $response = $this->actingAs($user, 'api')->withSession(['banned' => false]);

        return match ($action) {
            'get' => $response->getJson(
                $url,
                (!$params) ? [] : $params
            ),
            'post' => $response->postJson(
                $url,
                $params
            ),
            'put' => $response->putJson(
                $url,
                (!$params) ? [] : $params
            ),
            'delete' => $response->deleteJson(
                $url,
                (!$params) ? [] : $params
            ),
        };
    }

    protected function createParams($object_mother)
    {
        return $object_mother::random();
    }
}
