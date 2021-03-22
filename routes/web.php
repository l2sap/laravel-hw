<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ParserController;
use App\Models\Category;
use \App\Controllers\SocialiteController;

$title = 'Новостной блог';
$content = 'Здравствуйте, дорогой посетитель! Данный новостной сайт, создан в целях публикации последних мировых новостей! Ежедневно на нашем сайте вы сможете узнать новую информацию о том, что сейчас происходит в мире. Ежедневно заходите на наш сайт electro-news.net и наслаждайтесь порцией информации!<br> <a href="/news">Категории новостей</a>';


Route::get('/', function () use ($title, $content) {

    return <<<php
        
        <!doctype html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>$title</title>
        </head>
        
        <body>
        <h1>$title</h1>
        <p>$content</p>
        </body>
        </html>
    php;
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::group(['middleware' => 'admin'], function () {
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/', IndexController::class, 'index')->name('admin');
            Route::resource('news', AdminNewsController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('feedback', FeedbackController::class);
        });

        Route::group(['prefix' => 'news', 'as' => 'news.'], function () {

            Route::get('/', [NewsController::class, 'index'])
                ->name('index');

            Route::get('/catshow{id}', [NewsController::class, 'catshow'])
                ->name('catshow');

            Route::get('/{id}.html', [NewsController::class, 'show'])
                ->where('id', '\d+')
                ->name('show');
        });
    });
});


Route::get('/example/{category}', fn (\App\Models\Category $category) => $category);

Route::get('/collection', function () {
    $array = ['name' => 'Test', 'age' => 26, 'company' => 'Example', 'work' => 'Programmer', 'country' => 'Russia', 'city' => 'MSC', 'rules' => [
        ['id' => 1, 'title' => 'All previleges'],
        ['id' => 2, 'title' => 'Example data']
    ]];

    $collect = collect($array);
    dd($collect->has('work'));
});


Route::get('/session', function () {
    session(['testsession' => 'value']);
    return redirect('/');
});

Route::get('/parser/news', ParserController::class);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/vk', [SocialiteController::class, 'init'])->name('vk.init');
    Route::get('/auth/vk/callback', [SocialiteController::class, 'callback'])->name('vk.callback');
});

// Route::get('/hello/{name}', function(string $name){
//     return 'Hello, '. $name;
// });

// $title = 'Страница с содержимым';
// $text = 'Здравствуйте!';
// $content = 'Равным образом реализация намеченных плановых заданий позволяет оценить значение систем массового участия. Повседневная практика показывает, что постоянный количественный рост и сфера нашей активности позволяет выполнять важные задания по разработке форм развития. Разнообразный и богатый опыт консультация с широким активом обеспечивает широкому кругу (специалистов) участие в формировании модели развития. Равным образом реализация намеченных плановых заданий влечет за собой процесс внедрения и модернизации системы обучения кадров, соответствует насущным потребностям. Не следует, однако забывать, что постоянный количественный рост и сфера нашей активности способствует подготовки и реализации системы обучения кадров, соответствует насущным потребностям. Не следует, однако забывать, что рамки и место обучения кадров позволяет выполнять важные задания по разработке позиций, занимаемых участниками в отношении поставленных задач.';


// $title = 'Страница qwerty';
// $text = 'Qwerty!';
// $content = 'Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty Qwerty!!!';


// Route::get('/qwerty', function() use ($title, $text, $content){


//     return <<<php

//         <!doctype html>
//         <html lang="en">
//         <head>
//         <meta charset="UTF-8">
//         <title>$title</title>
//         </head>

//         <body>
//         <h1>$text</h1>
//         <p>$content</p>
//         </body>
//         </html>
//     php;

// });



// $title = 'Страница bla bla bla';
// $text = 'bla bla bla!';
// $content = 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla!!!';


// Route::get('/bla', function() use ($title, $text, $content){


//     return <<<php

//         <!doctype html>
//         <html lang="en">
//         <head>
//         <meta charset="UTF-8">
//         <title>$title</title>
//         </head>

//         <body>
//         <h1>$text</h1>
//         <p>$content</p>
//         </body>
//         </html>
//     php;

// });


// $title = 'Страница ololo';
// $text = 'ololo!';
// $content = 'ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo ololo !!!';

// Route::get('/ololo', function() use ($title, $text, $content){


//     return <<<php

//         <!doctype html>
//         <html lang="en">
//         <head>
//         <meta charset="UTF-8">
//         <title>$title</title>
//         </head>

//         <body>
//         <h1>$text</h1>
//         <p>$content</p>
//         </body>
//         </html>
//     php;

// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
