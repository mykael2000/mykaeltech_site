<?php
$ch = curl_init('http://127.0.0.1:8000');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$html = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "HTTP Code: $code\n";
echo "Length: " . strlen($html) . "\n";

// Extract title
if (preg_match('/<title>(.*?)<\/title>/is', $html, $m)) {
    echo "Title: " . $m[1] . "\n";
}

// Extract meta description
if (preg_match('/<meta name="description" content="(.*?)"/is', $html, $m)) {
    echo "Description: " . $m[1] . "\n";
}

// Check for key sections
echo "\n--- Page sections found ---\n";
$patterns = [
    'Hero section' => '/class="bg-glow"/',
    'Stats section' => '/data-counter=/',
    'Services grid' => '/What we do/',
    'Portfolio section' => '/Recent portfolios/',
    'Team section' => '/Meet the team/',
    'Testimonials' => '/What members say/',
    'Newsletter' => '/Stay in the loop/',
    'Footer' => '/Built with Laravel/',
    'Alpine.js' => '/window.Alpine=/',
    'Vite manifest' => '/manifest.json/',
];

foreach ($patterns as $name => $pat) {
    echo ($pat ? '✓' : '✗') . " $name\n";
}
