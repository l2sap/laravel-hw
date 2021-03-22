<?php

namespace App\Http\Controllers;

use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(ParserService $service)
    {
        dd($service->start('https://news.yandex.ru/music.rss'));
    }
}
