<?php

namespace App\Http\Controllers;

use App\Services\FakeNewsService;
use Illuminate\Http\Request;


class NewsController extends Controller
{


    protected $listNews = [
        'News 1',
        'News 2',
        'News 3',
        'News 4',
        'News 5',
    ];


    public function index()
    {
        $catNews = (new FakeNewsService())->getNews();
        // dd($catNews);
        return view('news.index', ['catNews' => $catNews]);
    }


    public function all()
    {
        return view('news.all', ['listNews' => $this->listNews]);
    }


    public function catshow(int $id)
    {
        $cat = $this->catNews[$id];
        $allnews = $this->listNews;
        return view('news.cat', ['cat' => $cat, 'allnews' => $allnews]);
    }


    public function show(int $id)
    {
        $news = $this->listNews[$id] ?? 'Not found';
        return view('news.show', ['news' => $news]);
    }
}
