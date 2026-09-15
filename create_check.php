<?php
$pages = ['', 'services', 'portfolio', 'team', 'learn', 'community', 'contact', 'login', 'join', 'dashboard', 'dashboard/cv', 'dashboard/profile'];
foreach ($pages as $p) {
    $url = 'http://127.0.0.1:8000' . ($p ? '/' . $p : '');
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $len = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
    curl_close($ch);
    echo sprintf("%-25s -> %d (len=%d)\n", $p ?: 'HOME', $code, $len);
}