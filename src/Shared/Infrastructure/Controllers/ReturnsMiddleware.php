<?php

declare(strict_types=1);


namespace Src\Shared\Infrastructure\Controllers;


use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReturnsMiddleware
{
    public function successArrayResponse(array $response): JsonResponse
    {
        return response()->json($response, Response::HTTP_OK);
    }

    public function successResponse(string $response): JsonResponse
    {
        return response()->json($response, Response::HTTP_OK);
    }

    public function createdResponse(string $response): JsonResponse
    {
        return response()->json($response, Response::HTTP_CREATED);
    }

    public function error500Response(string $response): JsonResponse
    {
        return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function error404Response(string $response): JsonResponse
    {
        return response()->json($response, Response::HTTP_NOT_FOUND);
    }
}
