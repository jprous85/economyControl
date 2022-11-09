<?php

declare(strict_types=1);

namespace __BasePath__\__ModuleName__\Infrastructure\Controllers;

use __BasePath__\__ModuleName__\Application\Request\Show__ModuleName__Request;
use __BasePath__\__ModuleName__\Application\UseCases\ShowAll__ModuleName__;
use __BasePath__\__ModuleName__\Application\UseCases\Show__ModuleName__;

use Src\Shared\Infrastructure\Controllers\ReturnsMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;

final class __ModuleName__GetController extends ReturnsMiddleware
{
    public function __construct(
        private Show__ModuleName__ $show___ModuleMinUnderscoreName__,
        private ShowAll__ModuleName__ $show_all___ModuleMinUnderscoreName__
    ) {
    }

    public function show(int $id): JsonResponse
    {
        $request = new Show__ModuleName__Request($id);
        return $this->successArrayResponse(($this->show___ModuleMinUnderscoreName__)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return $this->successArrayResponse(($this->show_all___ModuleMinUnderscoreName__)()->toArray());
    }
}
