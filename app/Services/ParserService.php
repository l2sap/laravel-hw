<?php

declare(strict_types=1);

namespace App\Services;

use XmlParser;


class ParserService
{
    protected array $parsingLinks = [
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/music.rss',
        'https://news.yandex.ru/auto.rss'
    ];

    public function start(string $url): array
    {
        $xml = XmlParser::load($url);

        return $xml->parse([
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
    }
}
