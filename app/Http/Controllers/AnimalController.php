<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
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

    public function random($number)
    {
        $response = null;
        $request = Http::get($this->uri_api . $number);

        if ($request->status() === 200)
        {
            $request = Response()
                ->json([
                    'status' => $request->status(),
                    'number' => $number,
                    'data' => json_decode($request->body(), true),
                ])
                ->setStatusCode($request->status());
        }
        else
        {
            $request = Response()
                ->json([
                    'status' => $request->status(),
                    'number' => $number,
                    'message' => 'Set `number` between 1 - 10 to get data animal(s)',
                ])
                ->setStatusCode($request->status());
        }

        return $request;
    }
}
