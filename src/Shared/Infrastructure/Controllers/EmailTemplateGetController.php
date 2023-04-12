<?php

declare(strict_types=1);


namespace Src\Shared\Infrastructure\Controllers;



use Src\User\Application\Request\ShowUserUuidRequest;
use Src\User\Application\UseCases\ShowUserByUuid;

final class EmailTemplateGetController
{

    public function __construct(private readonly ShowUserByUuid $showUserByUuid)
    {
    }

    /**
     * @throws \Exception
     */
    public function showEmailTemplate(string $template, string $uuid)
    {
        $user = ($this->showUserByUuid)(
            new ShowUserUuidRequest($uuid)
        );

        try {
            $templateView = 'email.' . $template;
            $params = $this->$template();
            return view($templateView, $params);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    private function welcome(): array {
        return [
            'name' => 'Jordi'
        ];
    }
}
