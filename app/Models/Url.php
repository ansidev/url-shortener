<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

final class Url extends Eloquent
{
    protected $table = 'url';
    public $timestamps = false;

    /**
     * @param string $url
     */
    public function setData(string $url)
    {
        $url = trim($url, '/').'/';
        $this->attributes['url'] = $url;
        $this->attributes['key'] = md5(uniqid().'|'.$url);
        $this->setCreatedAt(new \DateTime());
    }

    public function getUrl()
    {
        return $this->attributes['url'];
    }

    public function getUrlKey()
    {
        return $this->attributes['key'];
    }
}
