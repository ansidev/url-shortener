<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Url\UrlShortenable;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UrlController extends Controller
{
    use UrlShortenable;

    public function shortenUrl(Request $request)
    {
        try {
            $result = $this->createShortenUrl($request);
            unset($result['url']);
            $status = 200;
        } catch (ValidationException $e) {
            $errors = json_decode($e->getResponse()->getContent(), true);

            $result = ['code' => 1, 'message' => $errors['url'][0]];
            $status = 400;
        }

        return response()->json($result, $status);
    }
}
