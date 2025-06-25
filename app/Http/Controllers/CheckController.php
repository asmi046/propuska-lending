<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckController extends Controller
{
    public function index(Request $request)
    {
        $pass = $request->input('pass');
        $token = $request->input('token');

        if (!$pass) return json_encode([]);

        $regexRu = '/^[А-Я]{1}\d{3}[А-Я]{2}(\d{3}|\d{2})$/u';
        $regexEn = '/^[A-Z]{1}\d{3}[A-Z]{2}(\d{3}|\d{2})$/';

        $zagUrl = config('pass_ch.zag_url');
        $rusUrl = config('pass_ch.rus_url');

        $isRu = preg_match($regexRu, $pass);
        $isEn = preg_match($regexEn, $pass);



        if (!$isRu && !$isEn) {
            $response = Http::get($zagUrl, ['number' => $pass, 'token' => $token]);
        } else {
            $response = Http::get($rusUrl, ['number' => $pass, 'token' => $token]);
        }
        if ($response->failed()) {
            abort($response->status(), $response->body());
        }

        return $response->json();
    }
}
