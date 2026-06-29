<?php

/*
 * ---------------------------------------------------------------
 * CHECK PHP VERSION
 * ---------------------------------------------------------------
 */
$minPHPVersion = '8.1';
if (version_compare(PHP_VERSION, $minPHPVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPHPVersion,
        PHP_VERSION
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;
    exit(1);
}

/*
 * ---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 * ---------------------------------------------------------------
 */
// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 * ---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 * ---------------------------------------------------------------
 */
// 1. Load our paths config file
// This is the line that might need to be changed, depending on your folder structure.
require FCPATH . '../app/Config/Paths.php';
// ^^^ Change this line if you move your application folder

$paths = new Config\Paths();

// 2. Load the framework bootstrap file.
require $paths->systemDirectory . '/Boot.php';

try {
    exit(CodeIgniter\Boot::bootWeb($paths));
} catch (\Throwable $e) {
    echo "<div style='padding:20px; background:#ffe6e6; border:2px solid red;'>";
    echo "<h1 style='color:red;'>🔥 진짜 에러 원인 발견 🔥</h1>";
    echo "<h3><b>메시지:</b> " . $e->getMessage() . "</h3>";
    echo "<b>발생 파일:</b> " . $e->getFile() . " (라인: " . $e->getLine() . ")<br><br>";
    echo "<b>스택 트레이스:</b><pre style='background:#f8f9fa; padding:10px;'>" . $e->getTraceAsString() . "</pre>";
    echo "</div>";
    exit(1);
}
