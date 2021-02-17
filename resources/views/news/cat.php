<?php

echo $cat . '<br>';

foreach ($allnews as $key => $news) {

    echo "<a href=/news/$key.html>$news</a><br>";
}
