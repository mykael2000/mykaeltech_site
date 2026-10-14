<?php
/**
 * Data layer - JSON-backed site content
 * Admin panel writes to /data/site/*.json; public site falls back to defaults.
 */

define('SITE_DATA_PATH', dirname(__DIR__) . '/data/site');

function ensure_site_data_dir(): void {
    if (!is_dir(SITE_DATA_PATH)) {
        mkdir(SITE_DATA_PATH, 0755, true);
    }
}

/**
 * Load a named collection (services, technologies, testimonials, stats, ...)
 * from /data/site/<name>.json, falling back to the provided defaults.
 */
function load_collection(string $name, array $default): array {
    $file = SITE_DATA_PATH . '/' . basename($name) . '.json';
    if (file_exists($file)) {
        $data = json_decode((string) file_get_contents($file), true);
        if (is_array($data)) {
            return $data;
        }
    }
    return $default;
}

/**
 * Save a collection to /data/site/<name>.json.
 */
function save_collection(string $name, array $data): bool {
    ensure_site_data_dir();
    $file = SITE_DATA_PATH . '/' . basename($name) . '.json';
    $json = json_encode(array_values($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    return $json !== false && file_put_contents($file, $json, LOCK_EX) !== false;
}

/**
 * Load admin-edited site settings (single associative array).
 */
function load_site_settings(): array {
    static $cache = null;
    if ($cache === null) {
        $file = SITE_DATA_PATH . '/settings.json';
        $cache = [];
        if (file_exists($file)) {
            $data = json_decode((string) file_get_contents($file), true);
            if (is_array($data)) {
                $cache = $data;
            }
        }
    }
    return $cache;
}

/**
 * Persist site settings.
 */
function save_site_settings(array $settings): bool {
    ensure_site_data_dir();
    $file = SITE_DATA_PATH . '/settings.json';
    $json = json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    return $json !== false && file_put_contents($file, $json, LOCK_EX) !== false;
}