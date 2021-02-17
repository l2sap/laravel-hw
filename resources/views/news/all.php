<?php

foreach ($listNews as $key => $list) {

    echo "<a href='" . route('news.show', ['id' => $key]) . "'>$list</a><br>";
}
