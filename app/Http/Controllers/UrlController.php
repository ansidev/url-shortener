<?php

namespace App\Http\Controllers;

use App\Url\UrlShortenable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UrlController extends Controller
{
    use UrlShortenable;

    public function createForm()
    {
        return view('url.create');
    }

    public function createUrl(Request $request)
    {
        try {
            $result = $this->createShortenUrl($request);
            $result = array_merge($result, [
                'alertType' => 'success',
            ]);
        } catch (ValidationException $e) {
            $errors = json_decode($e->getResponse()->getContent(), true);

            $result = ['alertType' => 'danger', 'message' => $errors['url'][0]];
        }

        return view('url.create', $result);
    }

    public function redirect($key)
    {
        $url = DB::table('url')->where('key', $key)->first();

        return view('url.link', ['url' => $url->url]);
    }


}
