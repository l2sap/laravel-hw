<?php

namespace App\Http\Controllers;

use App\Services\FakeNewsService;
use Illuminate\Http\Request;


class NewsController extends Controller
{


    protected $catNews = [
        'Cat 1',
        'Cat 2',
        'Cat 3',
        'Cat 4',
        'Cat 5',
    ];



    public function index()
    {

        return view('news.index', ['catNews' => $this->catNews]);
    }


    public function all()
    {
        return view('news.all', ['listNews' => $this->listNews]);
    }


    public function catshow(FakeNewsService $service, int $id)
    {
        $cat = $this->catNews[$id];
        // $allnews = (new FakeNewsService())->getNews();
        return view('news.cat', ['cat' => $cat, 'allnews' => $service->getNews()]);
    }


    public function show(FakeNewsService $service, int $id)
    {
        $allNews = $service->getNews();
        $news = $allNews[$id] ?? 'Not found';
        return view('news.show', ['news' => $news]);
    }
}
