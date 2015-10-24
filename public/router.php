<?php

/**
 * Router for the default php server:
 * 
 * php -S 0.0.0.0:8888 router.php
 */

$pathOnly = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (file_exists($_SERVER["DOCUMENT_ROOT"] . $pathOnly)) {
    return false;
} else {
    require "index.php";
}