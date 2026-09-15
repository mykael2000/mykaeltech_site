<?php
$css = file_get_contents('resources/css/app.css');
if (strlen($css) > 500) {
    echo "CSS OK: " . strlen($css) . " bytes\n";
} else {
    echo "CSS EMPTY or small: " . strlen($css) . " bytes\n";
}

$js = file_get_contents('resources/js/app.js');
if (strlen($js) > 500) {
    echo "JS OK: " . strlen($js) . " bytes\n";
} else {
    echo "JS EMPTY or small: " . strlen($js) . " bytes\n";
}

// Check template files
$templates = [
    'components/app-layout.blade.php',
    'pages/home.blade.php',
    'pages/services.blade.php',
    'pages/portfolio.blade.php',
    'pages/team.blade.php',
    'pages/learn.blade.php',
    'pages/community.blade.php',
    'pages/contact.blade.php',
    'auth/login.blade.php',
    'auth/join.blade.php',
    'dashboard/index.blade.php',
    'dashboard/cv.blade.php',
    'dashboard/profile.blade.php',
    'cv/show.blade.php',
    'components/logo.blade.php',
];

foreach ($templates as $t) {
    $path = "resources/views/$t";
    if (file_exists($path)) {
        $size = filesize($path);
        echo "$t: OK ($size bytes)\n";
    } else {
        echo "$t: MISSING\n";
    }
}