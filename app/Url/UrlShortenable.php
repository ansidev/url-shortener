<?php

namespace App\Url;

use App\Constant\AppConstant;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait UrlShortenable
{

    /**
     * @param Request $request
     * @return array
     */
    private function createShortenUrl(Request $request)
    {
        $this->validate($request, ['url' => 'required|url']);
        $requestUrl = trim($request->input('url'), AppConstant::BACKSLASH).AppConstant::BACKSLASH;
        $url = DB::table('url')->where('url', $requestUrl)->first();
        if (null === $url) {
            $url = new Url();
            $url->setData($requestUrl);
            $url->save();
            $result = [
                'url' => $url->getUrl(),
                'shortenUrl' => route('url.short', ['key' => $url->getUrlKey()]),
            ];
        } else {
            $result = [
                'url' => $url->url,
                'shortenUrl' => route('url.short', ['key' => $url->key]),
            ];
        }

        return $result;
    }
}
