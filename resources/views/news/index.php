<?php

foreach ($catNews as $key => $cat) {

    echo "<a href='" . route('news.catshow', ['id' => $key]) . "'>$cat</a><br>";
}
