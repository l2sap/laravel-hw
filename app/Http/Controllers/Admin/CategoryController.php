<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $categories = Category::with('newsTmp')->get();
        // dd($categories->map(function ($category) {
        //     return [
        //         'id' => $category->id,
        //         'categoryTitle' => $category->title,
        //         'news' => $category->newsTmp->map(function ($news) {
        //             return [
        //                 'id' => $news->id,
        //                 'title' => $news->title
        //             ];
        //         })
        //     ];
        // }));

        $categories = Category::select('id', 'title', 'slug', 'description', 'created_at')
            ->with('news')
            ->orderBy('id', 'asc')
            ->paginate(5);


        return view('admin.news.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {

        $data = $request->validated();
        $data['slug'] = \Str::slug($data['title']);

        $create = Category::create($data);

        if ($create) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно добавленя');
        }

        return back()->with('errors', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.news.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('admin.news.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, Category $category)
    {

        $data = $request->validated();
        $data['slug'] = \Str::slug($data['title']);

        // $category->title = "New Data";
        // $category->description = "data description";
        // $category->save();

        $save = $category->fill($data)->save();

        if ($save) {
            return redirect()->route('admin.categories.index')->with('success', 'Запись успешно обновилась');
        }

        return back()->with('errors', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
