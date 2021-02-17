<?php

foreach ($listNews as $key => $news) {

    echo "$news <a href='" . route('news.show', ['id' => $key]) . "'>Перейти</a><br>";
}
