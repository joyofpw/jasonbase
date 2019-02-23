<?php namespace ProcessWire;

$token = trim($input->urlSegment1);
$token = $sanitizer->text($token);

$parent = $page->parent;
if($token == "" || $token != $parent->token)
{
    $session->redirect($parent->url);
    return $this->halt("No Valid Token Found");
}

$params["parent"] = $parent;
echo wireRenderFile("views/edit", $params);