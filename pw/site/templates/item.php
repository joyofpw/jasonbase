<?php namespace ProcessWire;

use HJSON\HJSONParser;

$parser = new HJSONParser();

$content = $parser->parse($page->body);

header("Content-type: application/json");

echo json_encode($content);