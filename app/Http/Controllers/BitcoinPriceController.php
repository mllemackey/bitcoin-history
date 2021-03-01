<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class BitcoinPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function index(Request $request)
    {
        $response = Http::get('https://api.coindesk.com/v1/bpi/historical/close.json', [
            'start' => $request->get('start'),
            'end' => $request->get('end')
        ]);
        $response->throw();

        return response($response->json()['bpi']);
    }

}
