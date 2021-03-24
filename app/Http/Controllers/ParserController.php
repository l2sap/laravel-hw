<?php

namespace App\Http\Controllers;

use App\Jobs\NewsJob;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke()
    {
        $parsingLinks = [
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
        ];

        foreach ($parsingLinks as $link) {
            NewsJob::dispatch($link);
        }

        echo "Задачи добавились";
    }
}
