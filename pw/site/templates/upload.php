<?php namespace ProcessWire;

if(count($input->post()) <= 0)
{
    $session->redirect($paths->root);
    return $this->halt("Method not Allowed");
}

$content = trim($input->post("content"));

try
{
    $session->CSRF->validate();

    if($content == "")
    {
        throw new \Exception("Content is Empty");
    }

    $isEdit = (bool) $sanitizer->text($input->post("edit"));
    
    if($isEdit)
    {
        $token = $sanitizer->text($input->post("token"));
        $item = $pages->get("template=item, token=${token}");
        if($item instanceof NullPage)
        {
            throw new \Exception("No Item Found");
        }

        $item->of(false);
        $item->body = $content;
        $item->save();
        $edit = $item->child("template=item-edit");
    }
    else
    {

        $item = new Page();
        $item->template = "item";
        $item->save();

        $item->body = $content;
        $item->save();

        $edit = new Page();
        $edit->template = "item-edit";
        $edit->title = "Edit";
        $edit->name = "edit";
        $edit->parent = $item;
        $edit->save();

        $pretty = new Page();
        $pretty->template = "item-pretty";
        $pretty->title = "Pretty";
        $pretty->name = "pretty";
        $pretty->parent = $item;
        $pretty->save();
    }
}
catch(\Exception $e)
{
    $params["content"] = $content;
    $params["message"] = $e->getMessage();
    echo wireRenderFile("views/error", $params);
    return;
}

$session->redirect("{$edit->url}{$item->token}");
return $this->halt("Redirected");