<?php
namespace App\Action;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Service\RequestService;

final class HomeAction2
{
    public function __construct()
    {
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $rs = RequestService::SendRequest("GET", "https://api.publicapis.org/entries");
        
        $response->getBody()->write($rs->getResponseBody());

        return $response;
    }
}
