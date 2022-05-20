<?php

//error_reporting( E_ALL );
//ini_set('display_errors', 1);

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

$latest = trim(file_get_contents("latest"));

if (!preg_match('/([a-z0-9\-\.]+)/', $_GET['localVersion'], $matches)) {
    http_response_code(400);
    echo "Unable to detect current version\n";
    exit;
}

$version = $matches[1];

if ($version >= $latest) {
    http_response_code(204);
    exit;
}
?>
{
    "url": "https://packages.riot.im/nightly/update/macos/Element%20Nightly-<?php echo $latest; ?>-universal-mac.zip"
}
