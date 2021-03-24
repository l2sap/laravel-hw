<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use XmlParser;


class ParserService
{

    protected string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function start(string $this->url): void
    {
        $xml = XmlParser::load($this->url);

    $dats = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'chanel.link'
            ],
            'description' => [
                'uses' => 'chanel.description'
            ],
            'image' => [
                'uses' => 'chanel.image.url'
            ],
            'news' => [
                'uses' => 'chanel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        Storage::disk('public')
        ->put('news/' . $this->url .".txt", json_encode($data));
    }
}
