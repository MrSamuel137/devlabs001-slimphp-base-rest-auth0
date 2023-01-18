<?php

namespace App\Service;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Service\RequestService;

final class TokenAuthValidate
{
    public function __construct()
    {
    }

    public function __invoke(Request $request, Response $response, $next)
    {
        $auth = $request->getHeaderLine('xxx-api-token');

        if ($auth != "6fbfc4ee-41e9-48ab-b691-a5a8854f5245") {
            return $response->withStatus(403);
        }

        return $next($request, $response);
    }
}
