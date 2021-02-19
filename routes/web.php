<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;


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


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('news', AdminNewsController::class);
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
