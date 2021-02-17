<?php

namespace App\Http\Controllers;

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

    protected $listNews = [
        'News 1',
        'News 2',
        'News 3',
        'News 4',
        'News 5',
    ];


    // public function cat()
    // {
    //     return view('news.cat', ['catNews' => $this->catNews]);
    // }


    public function index()
    {
        return view('news.index', ['catNews' => $this->catNews]);
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
