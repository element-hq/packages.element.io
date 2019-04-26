<?php

//error_reporting( E_ALL );
//ini_set('display_errors', 1);

require_once("Composer/Semver/autoload.php");
use Composer\Semver\Comparator;

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

$latest = trim(file_get_contents("latest"));

if (!preg_match('/Riot\/([a-z0-9\-\.]+) .*/', $_SERVER['HTTP_USER_AGENT'], $matches)) {
    http_response_code(400);
    echo "Unable to detect current version\n";
    exit;
}

$version = $matches[1];

if (Comparator::greaterThanOrEqualTo($version, $latest)) {
    http_response_code(204);
    exit;
}
?>
{
    "url": "https://packages.riot.im/desktop/update/macos/Riot-<?php echo $latest; ?>-mac.zip"
}
