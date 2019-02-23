<?php namespace ProcessWire;

$params["message"] = "Not Found";

echo wireRenderFile("views/error", $params);