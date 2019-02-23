<?php namespace ProcessWire;

use \Ramsey\Uuid\UUid;
use \Ramsey\Uuid\Validator\Validator;

use HJSON\HJSONParser;

function pageIsItem($page) 
{
    return $page->template == "item";
}

function getUuid($length = null) 
{
    $uuid = Uuid::uuid4();
    $uuid = $uuid->toString();

    if($length > 0)
    {
        $uuid = \substr($uuid, 0, $length - 1);
    }

    return wire("sanitizer")->name($uuid);
}

// Only call this function when truly needed
// it will send to trash all items
function cleanUp()
{
    $pages = wire("pages");
    $items = $pages->find("template=item");
    foreach($items as $item)
    {
        $pages->trash($item);
    }
}

// Fill the token field on items if not found
$pages->addHookBefore("saveReady", function($event) {

    // See https://github.com/processwire/processwire/blob/master/wire/core/Pages.php#L1524
    $page = $event->arguments(0);

    if(!pageIsItem($page))
    {
        return;
    }
    
    // See https://github.com/ramsey/uuid
    $validator = new Validator();
    if(!$validator->validate($page->token))
    {
        $page->token = getUuid();
    }
});

// Title and name should be random up to 8 chars
$pages->addHookBefore("saveReady", function($event) {

    $page = $event->arguments(0);

    if(!pageIsItem($page))
    {
        return;
    }
    
    $name = getUuid(9);
    if(trim($page->title) == "")
    {
        $page->title = $name;
    }

    if(trim($page->name) == "")
    {
        $page->name = $name;
    }
});

// Validates the body to be HJson Valid
$pages->addHookBefore("saveReady", function($event) {

    $page = $event->arguments(0);

    if(!pageIsItem($page))
    {
        return;
    }

    $parser = new HJSONParser();

    try
    {
        $content = $parser->parse($page->body);
    } 
    catch(\Exception $e)
    {
        throw new \Exception("Json: {$e->getMessage()}");
    }
});