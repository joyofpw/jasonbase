<?php namespace ProcessWire;

$paths = (object)[
    "root" => $config->urls->root
];

$paths->assets = "{$config->urls->root}assets";
$paths->node = $paths->assets . DIRECTORY_SEPARATOR . "node_modules" .  DIRECTORY_SEPARATOR;
$paths->images = $paths->assets . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR;

$csrf = (object)[
    "name" => $session->CSRF->getTokenName(),
    "value" => $session->CSRF->getTokenValue()
];

$params = [
    "paths" => $paths,
    "upload" => $pages->get("template=upload"),
    "csrf" => $csrf
];

// This is needed for passing down the params to sub views
$params["params"] = $params;