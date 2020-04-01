<?php

namespace app;

class Post
{
    private $id;
    private $title;
    private $content;
    private $linkToImage;

    function __construct(int $id = 0, string $title, string $content, string $linkToImage) 
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->linkToImage = $linkToImage;
        $this->isDeleted = false;
    }

    public function getPost() 
    {
        return ['id' => $this->id, 'title' => $this->title,
                'content' => $this->content, 'linktoimage' => $this->linkToImage];
    }
}