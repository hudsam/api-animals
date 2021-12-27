<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class AnimalController extends Controller
{
    public function __construct()
    {
        $this->uri_api = env('URI_API', true);
    }

    public function index()
    {
        return Response()
            ->json([
                'status' => Response::HTTP_OK,
                'data' => [
                    'name' => 'API Animals from Zoo',
                    'source' => $this->uri_api,
                    'author' => 'hudsam Labs',
                ],
            ])
            ->setStatusCode(Response::HTTP_OK);
    }
}
