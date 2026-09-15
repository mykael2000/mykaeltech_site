<?php
echo "CSS: " . filesize("resources/css/app.css") . " bytes\n";
echo "JS: " . filesize("resources/js/app.js") . " bytes\n";
foreach(glob("resources/views/components/*.blade.php") as $f) {
    echo basename($f) . " (" . filesize($f) . ") bytes\n";
}
echo "SERVER: " . (fopen("http://127.0.0.1:8000", "r") ? "UP" : "DOWN") . "\n";