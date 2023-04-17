<?php

declare(strict_types=1);


namespace Src\Shared\Infrastructure\Controllers;


use Illuminate\Contracts\Foundation\Application as ApplicationAliasFoundation;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Support\Facades\App;
use Src\Shared\Infrastructure\CommonFunctions\CommonFunctions;
use Src\User\Application\Request\ShowUserUuidRequest;
use Src\User\Application\UseCases\ShowUserByUuid;


final class EmailTemplateGetController
{

    public function __construct(private readonly ShowUserByUuid $showUserByUuid)
    {
        $this->language('es');
    }

    /**
     * @throws \Exception
     */
    public function showEmailTemplate(string $template, string $uuid):
    FactoryAlias|ApplicationAlias|ViewAlias|ApplicationAliasFoundation
    {
        $user = ($this->showUserByUuid)(
            new ShowUserUuidRequest($uuid)
        );

        if ($user->getRole() !== 1) {
            throw new \Exception('Not authorized');
        }

        try {
            $templateView = 'email.' . $template;
            $params = $this->$template();



            return view($templateView, $params);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @throws \Exception
     */
    private function welcome(): array {
        return [
            'email' => 'Jordi',
            'password' => CommonFunctions::generateRandomString(),
            'url' => 'https://programandoconcabeza.com'
        ];
    }

    private function language($lang): void
    {
        App::setLocale($lang);
    }
}
