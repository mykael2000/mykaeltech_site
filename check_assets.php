<?php
$html = file_get_contents('http://127.0.0.1:8000');
preg_match_all('/(vite|manifest|@vite|asset\.)/i', $html, $matches);
echo "Found " . count($matches[0]) . " asset references\n";
foreach (array_unique($matches[0]) as $m) {
    echo "- $m\n";
}
echo "\n--- Checking for <script> and <link> tags:\n";
preg_match_all('/<(script|link)[^>]*>/i', $html, $tags);
foreach ($tags[0] as $t) {
    echo "$t\n";
}