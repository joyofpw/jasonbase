<?php namespace ProcessWire;
use HJSON\HJSONParser;
use HJSON\HJSONStringifier;

// Outputs the content as is without minimizing

$parent = $page->parent;
$params["parent"] = $parent;

$options = [
    'keepWsc' => true
];

$parser = new HJSONParser();

try
{
    $content = $parser->parse($parent->body, $options);
}
catch(\Exception $e)
{
    $params["message"] = "Something is wrong with this file";
    echo wireRenderFile("views/error", $params);
    return $this->halt("Error");
}

$stringifier = new HJSONStringifier();

$options["quotes"] = "always";
$options["space"] = 4;

$text = $stringifier->stringify($content, $options);

$params["content"] = $text;

echo wireRenderFile("views/pretty", $params);